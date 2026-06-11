<?php
$type = isset($_GET['type']) ? preg_replace('/[^a-zA-Z0-9_-]/', '', $_GET['type']) : 'request';
$pageTitle = 'Request Pending - Velnex Portal';
$labels = array(
  'business' => 'Business client request',
  'investor' => 'Investor client request',
  'vendor' => 'Vendor / partner request',
  'internal' => 'Internal team access',
  'request' => 'Portal request'
);
$label = $labels[$type] ?? $labels['request'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
  <link rel="stylesheet" href="assets/css/portal.css">
</head>
<body>
  <main class="portal-shell">
    <section class="portal-card portal-status-card">
      <p class="portal-kicker"><?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?></p>
      <h1>Request received for review.</h1>
      <p>This is the prototype pending screen. In the real version, your request will be stored in the database and reviewed by Velnex before access is approved.</p>
      <div class="portal-status-list">
        <span>Request submitted</span>
        <span>Velnex review</span>
        <span>Approval decision</span>
        <span>Dashboard access</span>
      </div>
      <a class="portal-link-button" href="index.php">Back to login</a>
    </section>
  </main>
</body>
</html>
