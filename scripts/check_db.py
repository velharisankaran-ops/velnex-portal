import pathlib
import re
import sys

ROOT = pathlib.Path(__file__).resolve().parents[1]
LOCAL_PACKAGES = ROOT / ".codex-tools" / "python"

if LOCAL_PACKAGES.exists():
    sys.path.insert(0, str(LOCAL_PACKAGES))

import pymysql


def read_php_array_config(path):
    text = path.read_text(encoding="utf-8")
    pairs = re.findall(r"'([^']+)'\s*=>\s*'([^']*)'", text)
    return dict(pairs)


def main():
    config = read_php_array_config(ROOT / "config" / "database.local.php")
    connection = pymysql.connect(
        host=config["host"],
        port=int(config.get("port", "3306")),
        user=config["username"],
        password=config["password"],
        database=config["database"],
        charset=config.get("charset", "utf8mb4"),
    )

    try:
        with connection.cursor() as cursor:
            cursor.execute("SHOW TABLES LIKE 'access_requests'")
            row = cursor.fetchone()
            if not row:
                raise RuntimeError("access_requests table was not found")

            cursor.execute("SELECT COUNT(*) FROM access_requests")
            count = cursor.fetchone()[0]
    finally:
        connection.close()

    print(f"OK: access_requests table exists with {count} rows")


if __name__ == "__main__":
    main()
