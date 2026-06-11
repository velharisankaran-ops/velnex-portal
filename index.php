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
    <section class="portal-home-hero" aria-labelledby="portal-home-title">
      <nav class="portal-home-nav" aria-label="Portal navigation">
        <a class="portal-brand" href="index.php">
          <img src="<?php echo htmlspecialchars($iconUrl, ENT_QUOTES, 'UTF-8'); ?>" alt="" width="42" height="42">
          <span>Velnex Portal</span>
        </a>
        <a class="portal-admin-link" href="admin/">Admin</a>
      </nav>

      <div class="portal-home-intro">
        <img class="portal-home-logo" src="<?php echo htmlspecialchars($logoUrl, ENT_QUOTES, 'UTF-8'); ?>" alt="Velnex">
        <p class="portal-kicker">Business Execution Portal</p>
        <h1 id="portal-home-title">One place for Velnex clients, investors, partners, and internal teams.</h1>
        <p>Request access, sign in by role, and manage reviewed work after approval.</p>
      </div>

      <div class="portal-home-status" aria-label="Portal workflow">
        <span>Request</span>
        <span>Review</span>
        <span>Approve</span>
        <span>Access</span>
      </div>
    </section>

    <section class="portal-entry-grid" aria-label="Portal account actions">
      <article class="portal-entry-card">
        <p class="portal-kicker">Login</p>
        <h2>Access your portal</h2>
        <form class="portal-form" action="login.php" method="post">
          <label>
            <span>User category</span>
            <select name="type" required>
              <option value="">Choose category</option>
              <option value="business">Business Client</option>
              <option value="investor">Investor Client</option>
              <option value="vendor">Vendor / Partner</option>
              <option value="internal">Velnex Internal Team</option>
              <option value="admin">Admin</option>
            </select>
          </label>
          <label>
            <span>Email address</span>
            <input type="email" name="email" placeholder="name@company.com" required>
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
      </article>

      <article class="portal-entry-card portal-entry-card-accent">
        <p class="portal-kicker">Signup / Request Access</p>
        <h2>Start a new request</h2>
        <form class="portal-form" action="start-request.php" method="get">
          <label>
            <span>Request category</span>
            <select name="type" required>
              <option value="">Choose category</option>
              <option value="business">Business Client</option>
              <option value="investor">Investor Client</option>
              <option value="vendor">Vendor / Partner</option>
              <option value="internal">Velnex Internal Team</option>
            </select>
          </label>
          <div class="portal-entry-summary">
            <span>Business study and execution tracking</span>
            <span>Investor review and reporting visibility</span>
            <span>Vendor and partner collaboration</span>
            <span>Internal team invitation flow</span>
          </div>
          <button type="submit">Continue to signup</button>
        </form>
      </article>
    </section>
  </main>
</body>
</html>
