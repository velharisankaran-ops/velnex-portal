<?php
$pageTitle = 'Velnex Portal';
$logoUrl = 'https://velnex.in/wp-content/uploads/2026/05/velnex_compact_stacked_1080_transparent-Copy.png';
$iconUrl = 'https://velnex.in/wp-content/uploads/2026/05/cropped-velnex_vx_icon_blue_transparent-Copy.png';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
  <link rel="stylesheet" href="assets/css/portal.css">
</head>
<body class="portal-home-page">
  <main class="portal-home-shell">
    <nav class="portal-home-nav" aria-label="Portal navigation">
      <a class="portal-brand portal-brand-icon-only" href="index.php" aria-label="Velnex Portal">
        <img src="<?php echo htmlspecialchars($iconUrl, ENT_QUOTES, 'UTF-8'); ?>" alt="" width="42" height="42">
      </a>
      <a class="portal-admin-link" href="admin/login.php">Admin</a>
    </nav>

    <section class="portal-home-hero" aria-labelledby="portal-home-title">
      <div class="portal-editorial-copy">
        <p class="portal-kicker">Velnex Portal.</p>
        <p class="portal-audience-line">For Business | Investors | Vendor/Partner</p>
        <h1 id="portal-home-title">Business &amp; Investment Management</h1>
        <p>Sign in to continue your workspace, or request access for Velnex review.</p>
        <a class="portal-secondary-text-link" href="request-access.php">Request Access</a>
      </div>

      <form class="portal-hero-login portal-form" action="login.php" method="post" aria-label="Existing account login">
        <p class="portal-kicker">Existing Account</p>
        <label>
          <span>User type</span>
          <select name="type" required>
            <option value="">Choose user type</option>
            <option value="business">Business Client</option>
            <option value="investor">Investor Client</option>
            <option value="vendor">Vendor / Partner</option>
            <option value="internal">Velnex Internal Team</option>
            <option value="admin">Admin</option>
          </select>
        </label>
        <label>
          <span>Username</span>
          <input type="email" name="email" placeholder="name@company.com" required>
        </label>
        <label>
          <span>Password</span>
          <input type="password" name="password" placeholder="Password" required>
        </label>
        <button type="submit">Login</button>
        <a class="portal-request-inline" href="request-access.php">Request Access</a>
      </form>
    </section>
  </main>
</body>
</html>
