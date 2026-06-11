<?php

require_once __DIR__ . '/../includes/admin-auth.php';

portal_admin_logout();
portal_redirect('login.php');
