<?php
require_once __DIR__ . '/includes/helpers.php';
require_once __DIR__ . '/includes/admin-auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  portal_redirect('index.php');
}

$type = portal_post('type');
$email = portal_post('email');
$password = portal_post('password');

if ($type === 'admin') {
  if (portal_admin_check_credentials($email, $password)) {
    portal_admin_login($email);
    portal_redirect('admin/access-requests.php');
  }

  portal_redirect('admin/login.php');
}

$allowedTypes = array('business', 'investor', 'vendor', 'internal');

if (!in_array($type, $allowedTypes, true)) {
  portal_redirect('index.php');
}

portal_redirect('pending.php?type=' . urlencode($type) . '&login=prototype');
