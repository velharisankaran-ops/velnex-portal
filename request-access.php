<?php
$pageTitle = 'Request Access - Velnex Portal';
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
  <main class="portal-page-shell">
    <header class="portal-page-header">
      <a href="index.php">Back to login</a>
      <p class="portal-kicker">Request Access</p>
      <h1>Select account type</h1>
      <p>Choose the correct role. Velnex will review the request before giving dashboard access.</p>
    </header>

    <section class="portal-choice-grid">
      <a href="business-request.php"><strong>Business Client</strong><span>For SMEs and business owners who need study, reports, service coordination, and execution tracking.</span></a>
      <a href="investor-request.php"><strong>Investor Client</strong><span>For investors who need business review, risk visibility, reporting, and portfolio-level updates.</span></a>
      <a href="vendor-request.php"><strong>Vendor / Partner</strong><span>For agencies, consultants, freelancers, specialists, and service partners who want to work with Velnex.</span></a>
      <a href="pending.php?type=internal"><strong>Velnex Internal Team</strong><span>Internal team accounts will be created by admin invitation only.</span></a>
    </section>
  </main>
</body>
</html>
