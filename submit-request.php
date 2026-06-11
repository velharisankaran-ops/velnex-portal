<?php

require_once __DIR__ . '/includes/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  portal_redirect('request-access.php');
}

$allowedTypes = array('business', 'investor', 'vendor');
$type = portal_post('type');

if (!in_array($type, $allowedTypes, true)) {
  portal_redirect('pending.php?error=invalid');
}

$contactName = portal_post('name');
$email = portal_post('email');
$phone = portal_post('phone');

if ($contactName === '' || $email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  portal_redirect('pending.php?type=' . urlencode($type) . '&error=validation');
}

$organizationName = null;
$location = portal_post('location');
$category = null;
$notes = null;

if ($type === 'business') {
  $organizationName = portal_post('business_name');
  $category = portal_post('sector');
  $notes = portal_post('problem');
} elseif ($type === 'investor') {
  $organizationName = portal_post('investor_type');
  $location = portal_post('market');
  $category = portal_post('interest');
  $notes = portal_post('notes');
} elseif ($type === 'vendor') {
  $organizationName = portal_post('vendor_name');
  $category = portal_post('category');
  $notes = portal_post('services');
}

$payload = $_POST;
unset($payload['password']);

try {
  $stmt = portal_db()->prepare(
    'INSERT INTO access_requests
      (request_type, organization_name, contact_name, email, phone, location, category, notes, payload_json)
     VALUES
      (:request_type, :organization_name, :contact_name, :email, :phone, :location, :category, :notes, :payload_json)'
  );

  $stmt->execute(array(
    ':request_type' => $type,
    ':organization_name' => $organizationName,
    ':contact_name' => $contactName,
    ':email' => $email,
    ':phone' => $phone,
    ':location' => $location,
    ':category' => $category,
    ':notes' => $notes,
    ':payload_json' => json_encode($payload),
  ));

  portal_redirect('pending.php?type=' . urlencode($type) . '&saved=1');
} catch (Throwable $exception) {
  error_log($exception->getMessage());
  portal_redirect('pending.php?type=' . urlencode($type) . '&error=database');
}
