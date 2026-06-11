<?php

require_once __DIR__ . '/../includes/admin-auth.php';

portal_admin_require_login();
portal_redirect('access-requests.php');
