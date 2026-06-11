<?php
$pageTitle = 'Velnex Portal Login';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
  <link rel="stylesheet" href="assets/css/portal.css">
</head>
<body class="portal-auth-page">
  <main class="portal-auth-shell">
    <section class="portal-auth-copy">
      <p class="portal-kicker">Velnex Portal</p>
      <h1>Access for business clients, investors, internal team, and vendor partners.</h1>
      <p>Use this portal to request access, review work status, submit information, and manage execution visibility once approved by Velnex.</p>
      <div class="portal-role-strip">
        <span>Business</span>
        <span>Investors</span>
        <span>Velnex Team</span>
        <span>Vendors / Partners</span>
      </div>
    </section>

    <section class="portal-login-card" aria-labelledby="login-title">
      <div class="portal-mark">VX</div>
      <p class="portal-kicker">Account Login</p>
      <h2 id="login-title">Sign in to Velnex Portal</h2>
      <form class="portal-form" action="pending.php" method="get">
        <label>
          <span>Email address</span>
          <input type="email" name="email" placeholder="name@example.com" required>
        </label>
        <label>
          <span>Password</span>
          <input type="password" name="password" placeholder="Password" required>
        </label>
        <div class="portal-form-row">
          <label class="portal-check"><input type="checkbox" name="remember"> Remember me</label>
          <a href="request-access.php">Need access?</a>
        </div>
        <button type="submit">Login</button>
      </form>
      <p class="portal-note">Login is a frontend prototype now. Database and real authentication will be connected after the flow is approved.</p>
    </section>
  </main>
</body>
</html>
