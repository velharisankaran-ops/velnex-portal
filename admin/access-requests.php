<?php

require_once __DIR__ . '/../includes/db.php';

$pageTitle = 'Access Requests - Velnex Portal Admin';
$config = portal_config();
$adminKey = isset($config['admin_review_key']) ? (string) $config['admin_review_key'] : '';
$providedKey = isset($_GET['key']) ? (string) $_GET['key'] : '';
$isConfigured = $adminKey !== '';
$isAuthorized = $isConfigured && hash_equals($adminKey, $providedKey);
$requests = array();
$error = null;

if ($isAuthorized) {
  try {
    $requests = portal_db()
      ->query('SELECT * FROM access_requests ORDER BY created_at DESC LIMIT 100')
      ->fetchAll();
  } catch (Throwable $exception) {
    error_log($exception->getMessage());
    $error = 'Could not load access requests. Check the database configuration and schema.';
  }
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
      <a href="../index.php">Back to portal</a>
      <p class="portal-kicker">Admin Review</p>
      <h1>Access requests</h1>
      <p>Review the latest submitted access requests. This first admin screen is intentionally simple until login roles are added.</p>
    </header>

    <?php if (!$isConfigured): ?>
      <section class="portal-panel">
        <h2>Admin key not configured</h2>
        <p>Create <code>config/app.local.php</code> from <code>config/app.local.example.php</code>, set a long secret key, then open this page with <code>?key=your-secret</code>.</p>
      </section>
    <?php elseif (!$isAuthorized): ?>
      <section class="portal-panel">
        <h2>Admin key required</h2>
        <p>Open this page with the configured review key. Example: <code>admin/access-requests.php?key=your-secret</code>.</p>
      </section>
    <?php elseif ($error): ?>
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
                        <input type="hidden" name="key" value="<?php echo portal_e($providedKey); ?>">
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
