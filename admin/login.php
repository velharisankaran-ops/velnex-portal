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
<body>
  <main class="portal-shell">
    <section class="portal-login-card" aria-labelledby="admin-login-title">
      <div class="portal-mark">VX</div>
      <p class="portal-kicker">Admin Login</p>
      <h1 id="admin-login-title">Velnex portal admin</h1>

      <?php if (!portal_admin_credentials_configured()): ?>
        <p class="portal-alert">Admin login is not configured. Create <code>config/app.local.php</code> from <code>config/app.local.example.php</code> and set an admin username and password hash.</p>
      <?php else: ?>
        <?php if ($error !== ''): ?>
          <p class="portal-alert"><?php echo portal_e($error); ?></p>
        <?php endif; ?>
        <form class="portal-form" action="login.php" method="post">
          <label>
            <span>Email address</span>
            <input type="email" name="username" required autofocus>
          </label>
          <label>
            <span>Password</span>
            <input type="password" name="password" required>
          </label>
          <button type="submit">Login</button>
        </form>
      <?php endif; ?>
    </section>
  </main>
</body>
</html>
