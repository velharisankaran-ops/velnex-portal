<?php
$pageTitle = 'Business Access Request - Velnex Portal';
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
      <p class="portal-kicker">Business Client</p>
      <h1>Business access request</h1>
      <p>Use this if you are a business owner or manager looking for business study, structure, reporting, and execution support.</p>
    </header>

    <form class="portal-panel portal-form" action="submit-request.php" method="post">
      <input type="hidden" name="type" value="business">
      <label><span>Business name</span><input name="business_name" required></label>
      <label><span>Your name</span><input name="name" required></label>
      <label><span>Email</span><input type="email" name="email" required></label>
      <label><span>Phone / WhatsApp</span><input name="phone" required></label>
      <label><span>Location</span><input name="location" placeholder="City, Country"></label>
      <label><span>Sector</span><input name="sector" placeholder="Retail, healthcare, interiors, tourism..."></label>
      <label class="portal-span"><span>Main problem you want to solve</span><textarea name="problem" rows="5"></textarea></label>
      <button type="submit">Submit request</button>
    </form>
  </main>
</body>
</html>
