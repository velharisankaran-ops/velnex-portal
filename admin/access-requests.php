<?php

require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/admin-auth.php';

$pageTitle = 'Access Requests - Velnex Portal Admin';
$requests = array();
$error = null;

portal_admin_require_login();

try {
  $requests = portal_db()
    ->query('SELECT * FROM access_requests ORDER BY created_at DESC LIMIT 100')
    ->fetchAll();
} catch (Throwable $exception) {
  error_log($exception->getMessage());
  $error = 'Could not load access requests. Check the database configuration and schema.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo portal_e($pageTitle); ?></title>
  <link rel="stylesheet" href="../assets/css/portal.css">
</head>
<body>
  <main class="portal-page-shell portal-admin-shell">
    <header class="portal-page-header">
      <div class="portal-admin-topline">
        <a href="../index.php">Back to portal</a>
        <a href="logout.php">Logout</a>
      </div>
      <p class="portal-kicker">Admin Review</p>
      <h1>Access requests</h1>
      <p>Review the latest submitted access requests and update approval status.</p>
    </header>

    <?php if ($error): ?>
      <section class="portal-panel">
        <h2>Setup needed</h2>
        <p><?php echo portal_e($error); ?></p>
      </section>
    <?php else: ?>
      <section class="portal-panel portal-table-panel">
        <?php if (!$requests): ?>
          <p>No access requests found yet.</p>
        <?php else: ?>
          <div class="portal-table-wrap">
            <table class="portal-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Type</th>
                  <th>Name</th>
                  <th>Organization</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Status</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($requests as $request): ?>
                  <tr>
                    <td><?php echo portal_e($request['id']); ?></td>
                    <td><?php echo portal_e($request['request_type']); ?></td>
                    <td><?php echo portal_e($request['contact_name']); ?></td>
                    <td><?php echo portal_e($request['organization_name']); ?></td>
                    <td><a href="mailto:<?php echo portal_e($request['email']); ?>"><?php echo portal_e($request['email']); ?></a></td>
                    <td><?php echo portal_e($request['phone']); ?></td>
                    <td><?php echo portal_e($request['status']); ?></td>
                    <td><?php echo portal_e($request['created_at']); ?></td>
                    <td>
                      <form class="portal-inline-actions" action="update-request-status.php" method="post">
                        <input type="hidden" name="id" value="<?php echo portal_e($request['id']); ?>">
                        <button type="submit" name="status" value="approved">Approve</button>
                        <button type="submit" name="status" value="rejected">Reject</button>
                        <button type="submit" name="status" value="pending">Reset</button>
                      </form>
                    </td>
                  </tr>
                  <?php if (!empty($request['notes'])): ?>
                    <tr class="portal-table-note">
                      <td></td>
                      <td colspan="8"><?php echo nl2br(portal_e($request['notes'])); ?></td>
                    </tr>
                  <?php endif; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php endif; ?>
      </section>
    <?php endif; ?>
  </main>
</body>
</html>
