<?php
require_once __DIR__ . '/includes/helpers.php';

$type = isset($_GET['type']) ? preg_replace('/[^a-zA-Z0-9_-]/', '', $_GET['type']) : '';

$routes = array(
  'business' => 'business-request.php',
  'investor' => 'investor-request.php',
  'vendor' => 'vendor-request.php',
  'internal' => 'pending.php?type=internal',
);

if (!isset($routes[$type])) {
  portal_redirect('request-access.php');
}

portal_redirect($routes[$type]);
