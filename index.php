<?php
$pageTitle = 'Velnex Portal';
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
    <section class="portal-card">
      <p class="portal-kicker">Velnex Portal</p>
      <h1>Portal deployment is working.</h1>
      <p>
        This subdomain will become the login and dashboard area for business clients,
        investor clients, Velnex internal team, and vendor partners.
      </p>
      <div class="portal-grid">
        <span>Business</span>
        <span>Investors</span>
        <span>Internal Team</span>
        <span>Vendors / Partners</span>
      </div>
    </section>
  </main>
</body>
</html>
