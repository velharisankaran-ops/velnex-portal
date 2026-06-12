<?php

require_once __DIR__ . '/../includes/admin-auth.php';

$pageTitle = 'Admin Login - Velnex Portal';
$error = '';

if (portal_admin_is_logged_in()) {
  portal_redirect('access-requests.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = portal_post('username');
  $password = portal_post('password');

  if (portal_admin_check_credentials($username, $password)) {
    portal_admin_login($username);
    portal_redirect('access-requests.php');
  }

  $error = 'Invalid admin login details.';
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
<body class="portal-admin-login-page">
  <main class="portal-admin-login-shell">
    <section class="portal-admin-login-copy" aria-labelledby="admin-login-title">
      <a class="portal-brand portal-brand-icon-only" href="../index.php" aria-label="Velnex Portal">
        <img src="https://velnex.in/wp-content/uploads/2026/05/cropped-velnex_vx_icon_blue_transparent-Copy.png" alt="" width="42" height="42">
      </a>
      <p class="portal-kicker">Admin Access</p>
      <h1 id="admin-login-title">Review and manage portal requests.</h1>
      <p>Use your Velnex admin account to review access requests and update approval status.</p>
    </section>

    <section class="portal-admin-login-card" aria-label="Admin login form">
      <?php if (!portal_admin_credentials_configured()): ?>
        <p class="portal-alert">Admin login is not configured on the server yet.</p>
      <?php endif; ?>
      <?php if ($error !== ''): ?>
        <p class="portal-alert"><?php echo portal_e($error); ?></p>
      <?php endif; ?>
      <p class="portal-kicker">Login</p>
      <h2>Admin workspace</h2>
      <form class="portal-form" action="login.php" method="post">
        <label>
          <span>Username</span>
          <input type="email" name="username" placeholder="admin@velnex.in" required autofocus>
        </label>
        <label>
          <span>Password</span>
          <input type="password" name="password" placeholder="Password" required>
        </label>
        <button type="submit">Login</button>
      </form>
      <a class="portal-admin-back-link" href="../index.php">Back to portal</a>
    </section>
  </main>
</body>
</html>
