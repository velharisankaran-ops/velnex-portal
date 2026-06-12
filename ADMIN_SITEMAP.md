# Velnex Portal Admin Sitemap

This document defines the planned admin control layer before building user dashboards and role-specific data.

## Full Admin Sitemap

```text
Admin Login
└── Admin Dashboard
    ├── Access Requests
    │   ├── Pending Requests
    │   ├── Approved Requests
    │   ├── Rejected Requests
    │   └── Request Detail
    │       ├── Applicant Details
    │       ├── Business / Investor / Vendor / Partner Details
    │       ├── Notes
    │       ├── Status History
    │       └── Approve / Reject / Request More Info
    │
    ├── Users
    │   ├── All Users
    │   ├── Business Clients
    │   ├── Investors
    │   ├── Vendors
    │   ├── Partners
    │   └── User Detail
    │       ├── Profile
    │       ├── Role
    │       ├── Account Status
    │       ├── Linked Company / Entity
    │       └── Reset Password / Disable User
    │
    ├── Organizations
    │   ├── Businesses
    │   ├── Investor Entities
    │   ├── Vendor Companies
    │   ├── Partner Organizations
    │   └── Organization Detail
    │       ├── Overview
    │       ├── Contacts
    │       ├── Documents
    │       ├── Activity
    │       └── Assigned Velnex Team
    │
    ├── Workspaces
    │   ├── Business Workspaces
    │   ├── Investor Workspaces
    │   ├── Vendor Workspaces
    │   ├── Partner Workspaces
    │   └── Workspace Detail
    │       ├── Dashboard
    │       ├── Tasks
    │       ├── Reports
    │       ├── Documents
    │       ├── Messages / Updates
    │       └── Permissions
    │
    ├── Admin Team
    │   ├── Admin Users
    │   ├── Roles & Permissions
    │   └── Activity Log
    │
    ├── Settings
    │   ├── Portal Settings
    │   ├── Email Templates
    │   ├── Request Form Fields
    │   ├── User Roles
    │   └── Security
    │
    └── Reports
        ├── Request Pipeline
        ├── User Growth
        ├── Active Workspaces
        └── Admin Activity
```

## Recommended Build Order

1. Admin dashboard shell
2. Access request list
3. Request detail page
4. Approve / reject / request-more-info workflow
5. Convert approved request into user account
6. User management
7. Organization / workspace management
8. Roles and permissions
9. Activity log
10. Reports and settings

## First Admin MVP

```text
Admin Login
└── Admin Dashboard
    ├── Overview cards
    ├── Pending access requests
    ├── Recent approved/rejected requests
    └── Request detail page
```

The first MVP should focus on onboarding control before creating role-specific user dashboards.
