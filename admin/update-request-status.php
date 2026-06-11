<?php

require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/admin-auth.php';

portal_admin_require_login();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  portal_redirect('access-requests.php');
}

$id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
$status = isset($_POST['status']) ? (string) $_POST['status'] : '';
$allowedStatuses = array('pending', 'approved', 'rejected');

if ($id <= 0 || !in_array($status, $allowedStatuses, true)) {
  portal_redirect('access-requests.php');
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

portal_redirect('access-requests.php');
