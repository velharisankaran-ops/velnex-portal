# Velnex Portal Setup

## 1. Create the MySQL database

In Hostinger, create a MySQL database and database user for the portal.

Suggested names:

- Database: `velnex_portal`
- User: `velnex_portal_user`

Use the actual names Hostinger gives you if it adds an account prefix.

## 2. Import the schema

Open phpMyAdmin for the new database and run:

```sql
CREATE TABLE access_requests (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  request_type ENUM('business', 'investor', 'vendor', 'internal') NOT NULL,
  organization_name VARCHAR(190) NULL,
  contact_name VARCHAR(190) NOT NULL,
  email VARCHAR(190) NOT NULL,
  phone VARCHAR(80) NULL,
  location VARCHAR(190) NULL,
  category VARCHAR(190) NULL,
  notes TEXT NULL,
  payload_json JSON NULL,
  status ENUM('pending', 'approved', 'rejected') NOT NULL DEFAULT 'pending',
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  reviewed_at TIMESTAMP NULL DEFAULT NULL,
  INDEX idx_access_requests_status_created (status, created_at),
  INDEX idx_access_requests_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

The same SQL is saved in `database/schema.sql`.

Alternatively, after Hostinger remote MySQL access is enabled for your public IP, run the schema from this workspace:

```powershell
$env:VELNEX_DB_HOST = 'srv1947.hstgr.io'
$env:VELNEX_DB_NAME = 'u658377134_portal'
$env:VELNEX_DB_USER = 'your_hostinger_database_user'
$env:VELNEX_DB_PASSWORD = 'your_database_password'
& 'C:\Users\kannan\.cache\codex-runtimes\codex-primary-runtime\dependencies\python\python.exe' scripts\apply_schema.py
```

## 3. Add private config on the server

Create `config/database.local.php` on the server:

```php
<?php

return array(
  'host' => 'localhost',
  'port' => 3306,
  'database' => 'your_hostinger_database_name',
  'username' => 'your_hostinger_database_user',
  'password' => 'your_database_password',
  'charset' => 'utf8mb4',
);
```

Create `config/app.local.php` on the server:

```php
<?php

return array(
  'admin_review_key' => 'replace-with-a-long-random-secret',
);
```

Both local config files are ignored by Git and should not be committed.

## 4. Test the request flow

1. Open `https://portal.velnex.in/request-access.php`.
2. Submit a Business, Investor, or Vendor request.
3. Confirm that the pending page says the request was received.
4. Open `https://portal.velnex.in/admin/access-requests.php?key=YOUR_SECRET_KEY`.
5. Confirm the request appears in the admin table.

## Current limits

This setup stores request submissions and lets admin review them. It does not yet approve/reject requests, create user accounts, or authenticate dashboard users.
