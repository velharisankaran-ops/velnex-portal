import os
import pathlib
import re
import sys

ROOT = pathlib.Path(__file__).resolve().parents[1]
LOCAL_PACKAGES = ROOT / ".codex-tools" / "python"

if LOCAL_PACKAGES.exists():
    sys.path.insert(0, str(LOCAL_PACKAGES))

import pymysql


def require_env(name):
    value = os.environ.get(name)
    if not value:
        raise RuntimeError(f"Missing required environment variable: {name}")
    return value


def read_php_array_config(path):
    if not path.exists():
        return {}

    text = path.read_text(encoding="utf-8")
    pairs = re.findall(r"'([^']+)'\s*=>\s*'([^']*)'", text)
    return dict(pairs)


def split_sql(sql):
    statements = []
    current = []

    for line in sql.splitlines():
        stripped = line.strip()
        if not stripped or stripped.startswith("--"):
            continue

        current.append(line)
        if stripped.endswith(";"):
            statements.append("\n".join(current).rstrip(";"))
            current = []

    if current:
        statements.append("\n".join(current))

    return statements


def main():
    schema_path = ROOT / "database" / "schema.sql"
    sql = schema_path.read_text(encoding="utf-8")
    local_config = read_php_array_config(ROOT / "config" / "database.local.php")

    connection = pymysql.connect(
        host=os.environ.get("VELNEX_DB_HOST", local_config.get("host", "srv1947.hstgr.io")),
        port=int(os.environ.get("VELNEX_DB_PORT", local_config.get("port", "3306"))),
        user=os.environ.get("VELNEX_DB_USER", local_config.get("username", "")) or require_env("VELNEX_DB_USER"),
        password=os.environ.get("VELNEX_DB_PASSWORD", local_config.get("password", "")) or require_env("VELNEX_DB_PASSWORD"),
        database=os.environ.get("VELNEX_DB_NAME", local_config.get("database", "u658377134_portal")),
        charset=os.environ.get("VELNEX_DB_CHARSET", local_config.get("charset", "utf8mb4")),
        autocommit=True,
    )

    try:
        with connection.cursor() as cursor:
            for statement in split_sql(sql):
                cursor.execute(statement)
    finally:
        connection.close()

    print(f"Applied schema from {schema_path}")


if __name__ == "__main__":
    main()
