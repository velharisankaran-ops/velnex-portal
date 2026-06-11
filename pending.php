<?php
require_once __DIR__ . '/includes/helpers.php';

$type = isset($_GET['type']) ? preg_replace('/[^a-zA-Z0-9_-]/', '', $_GET['type']) : 'request';
$pageTitle = 'Request Pending - Velnex Portal';
$labels = portal_request_labels();
$label = isset($labels[$type]) ? $labels[$type] : $labels['request'];
$saved = isset($_GET['saved']) && $_GET['saved'] === '1';
$loginPrototype = isset($_GET['login']) && $_GET['login'] === 'prototype';
$error = isset($_GET['error']) ? preg_replace('/[^a-zA-Z0-9_-]/', '', $_GET['error']) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo portal_e($pageTitle); ?></title>
  <link rel="stylesheet" href="assets/css/portal.css">
</head>
<body>
  <main class="portal-shell">
    <section class="portal-card portal-status-card">
      <p class="portal-kicker"><?php echo portal_e($label); ?></p>
      <?php if ($loginPrototype): ?>
        <h1>Login flow is being prepared.</h1>
        <p>This role login will be connected after approved users and dashboards are added.</p>
      <?php elseif ($saved): ?>
        <h1>Request received for review.</h1>
        <p>Your request has been stored and will be reviewed by Velnex before access is approved.</p>
      <?php elseif ($error === 'database'): ?>
        <h1>Database setup needed.</h1>
        <p>The form is connected, but the database is not ready yet. Configure the database and run the schema before collecting live requests.</p>
      <?php elseif ($error === 'validation'): ?>
        <h1>Please check the required fields.</h1>
        <p>Name and a valid email address are required before the request can be submitted.</p>
      <?php elseif ($error === 'invalid'): ?>
        <h1>Invalid request type.</h1>
        <p>Please go back and choose one of the supported access request types.</p>
      <?php else: ?>
        <h1>Request flow ready.</h1>
        <p>Submit one of the access request forms to store it in the database and start the review flow.</p>
      <?php endif; ?>
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
