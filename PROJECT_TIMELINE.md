# Velnex Portal Timeline

## 2026-06-12

- Created the custom PHP portal project for `portal.velnex.in`.
- Added the first public login/request-access frontend flow for Business, Investor, Vendor / Partner, and Internal Team access paths.
- Added the backend foundation for request capture:
  - `database/schema.sql` with the `access_requests` table.
  - `config/database.template.php` and ignored `config/database.local.php` pattern.
  - `config/app.php`, `config/app.local.template.php`, and ignored `config/app.local.php` pattern.
  - `includes/db.php` for PDO database connections.
  - `includes/helpers.php` for shared escaping, config, redirect, and request-label helpers.
  - `submit-request.php` to validate and store request form submissions.
  - `admin/access-requests.php` to review submitted requests.
  - `admin/update-request-status.php` to approve, reject, or reset request status.
- Updated request forms to use `POST` instead of prototype `GET` submissions.
- Updated the login prototype to avoid sending passwords through the URL.
- Added `SETUP.md` with Hostinger database setup and test steps.
- Installed `PyMySQL` into ignored local folder `.codex-tools/python` so Codex can connect to the Hostinger MySQL database after remote access is allowed and credentials are provided.
- Added `scripts/apply_schema.py` to apply `database/schema.sql` to the remote Hostinger MySQL database using environment variables instead of committed credentials.
- Made the database schema idempotent with `CREATE TABLE IF NOT EXISTS` so the setup script can be rerun safely.
- Created ignored local config placeholders for the Hostinger database host/name and admin review key.
- Switched the local database config to the separate portal database `u658377134_portal`.
- Updated `scripts/apply_schema.py` so it can read ignored local database config, avoiding credentials in terminal commands.
- Confirmed remote MySQL network access reaches Hostinger from public IP `120.89.74.57`, but schema import is blocked by MySQL authentication error 1045 for the provided database user details.
- Confirmed Hostinger requires the prefixed MySQL username `u658377134_portalvelnexin`.
- Applied `database/schema.sql` successfully to the separate portal database `u658377134_portal`.
- Added `scripts/check_db.py` for repeatable remote database connectivity and table checks.
- Replaced admin URL-key access with session-based admin login, logout, and password-hash configuration.
- Added a CLI-only `scripts/make_admin_hash.php` helper for generating admin password hashes on a PHP host.
- Simplified admin login configuration so the server-only config can use either `admin_password` or `admin_password_hash`, and the login form remains visible even before config is complete.
- Renamed committed config template files and added `config/.htaccess` to block direct browser access to config files.
- Updated committed config templates with the real Hostinger portal database name and username, while keeping passwords out of Git.
- Added support for private server config in `/public_html/portal-private` so Hostinger Git deploys can update `/public_html/portal` without overwriting credentials.
- Redesigned `index.php` as the portal opening page with Velnex logo assets, category-based login dropdown, and category-based signup/request access dropdown.
- Added `login.php` and `start-request.php` routing files for the new opening-page flows.
- Connected the homepage Admin login category to the existing session-based admin authentication flow.
- Added `ADMIN_SITEMAP.md` to define the planned admin control layer, build order, and first admin MVP scope.
