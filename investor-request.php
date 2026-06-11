<?php
$pageTitle = 'Investor Access Request - Velnex Portal';
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
  <main class="portal-page-shell portal-form-shell">
    <header class="portal-page-header">
      <a href="request-access.php">Back</a>
      <p class="portal-kicker">Investor Client</p>
      <h1>Investor access request</h1>
      <p>Use this if you need business review, operational visibility, risk understanding, and reporting before or after investment.</p>
    </header>

    <form class="portal-panel portal-form" action="pending.php" method="get">
      <input type="hidden" name="type" value="investor">
      <label><span>Name</span><input name="name" required></label>
      <label><span>Email</span><input type="email" name="email" required></label>
      <label><span>Phone / WhatsApp</span><input name="phone" required></label>
      <label><span>Investor type</span><input name="investor_type" placeholder="Individual, family office, company, advisor..."></label>
      <label><span>Preferred market</span><input name="market" placeholder="UAE, India, both..."></label>
      <label><span>Interest area</span><input name="interest" placeholder="SMEs, operations, sector review, portfolio monitoring..."></label>
      <label class="portal-span"><span>What do you want Velnex to help you understand?</span><textarea name="notes" rows="5"></textarea></label>
      <button type="submit">Submit request</button>
    </form>
  </main>
</body>
</html>
