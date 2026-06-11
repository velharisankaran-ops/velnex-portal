<?php

require_once __DIR__ . '/../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  portal_redirect('access-requests.php');
}

$config = portal_config();
$adminKey = isset($config['admin_review_key']) ? (string) $config['admin_review_key'] : '';
$providedKey = isset($_POST['key']) ? (string) $_POST['key'] : '';

if ($adminKey === '' || !hash_equals($adminKey, $providedKey)) {
  portal_redirect('access-requests.php');
}

$id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
$status = isset($_POST['status']) ? (string) $_POST['status'] : '';
$allowedStatuses = array('pending', 'approved', 'rejected');

if ($id <= 0 || !in_array($status, $allowedStatuses, true)) {
  portal_redirect('access-requests.php?key=' . urlencode($providedKey));
}

try {
  $stmt = portal_db()->prepare(
    'UPDATE access_requests SET status = :status, reviewed_at = CURRENT_TIMESTAMP WHERE id = :id'
  );
  $stmt->execute(array(
    ':status' => $status,
    ':id' => $id,
  ));
} catch (Throwable $exception) {
  error_log($exception->getMessage());
}

portal_redirect('access-requests.php?key=' . urlencode($providedKey));
