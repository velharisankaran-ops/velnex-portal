# Velnex Portal Project Notes

This folder is for the custom Velnex portal application.

## Local Folder

`C:\Users\kannan\OneDrive\Documents\portal.velnex.in`

## Live Subdomain

`https://portal.velnex.in`

## Hostinger Deployment Path

`/public_html/portal`

## Recommended GitHub Repo

`velharisankaran-ops/velnex-portal`

## Deployment Flow

Local code -> GitHub -> Hostinger Git deploy -> `/public_html/portal` -> `https://portal.velnex.in`

## User Types

1. Business Client
2. Investor Client
3. Velnex Internal Team
4. Vendors / Partners
5. Advisors / Consultants later if needed
6. Investor representatives later if needed
7. Client business employees later if needed
8. Super Admin

## Build Decision

The public website stays in WordPress.

The portal will be a separate custom application under `/public_html/portal`.

This avoids WordPress plugin confusion and keeps the public website safe.

## Initial File Structure

```text
portal.velnex.in/
  index.php
  login.php
  request-access.php
  business-signup.php
  investor-signup.php
  vendor-signup.php
  pending-approval.php
  dashboard.php
  config/
    app.php
    database.example.php
    database.local.php
  includes/
    auth.php
    db.php
    helpers.php
  assets/
    css/
      portal.css
    js/
      portal.js
  admin/
    index.php
    access-requests.php
```

## Security Rule

Do not commit real database passwords to GitHub.

Use:

`config/database.local.php`

Keep it ignored in `.gitignore`.

Commit only:

`config/database.example.php`

## First Backend Direction

Start simple:

1. Landing/login screen
2. Request access form
3. Store request in MySQL
4. Admin review page
5. Approval status
6. Basic role-based dashboard

## Current Status

Project folder created locally. Git initialized locally. GitHub remote still needs to be added after the repo is created.
