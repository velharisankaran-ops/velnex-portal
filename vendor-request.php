<?php
$pageTitle = 'Vendor Partner Request - Velnex Portal';
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
      <p class="portal-kicker">Vendor / Partner</p>
      <h1>Vendor partner request</h1>
      <p>Use this if you are a service provider, agency, freelancer, consultant, or specialist team who can support Velnex client work.</p>
    </header>

    <form class="portal-panel portal-form" action="pending.php" method="get">
      <input type="hidden" name="type" value="vendor">
      <label><span>Company / professional name</span><input name="vendor_name" required></label>
      <label><span>Contact person</span><input name="name" required></label>
      <label><span>Email</span><input type="email" name="email" required></label>
      <label><span>Phone / WhatsApp</span><input name="phone" required></label>
      <label><span>Service category</span><input name="category" placeholder="Marketing, finance, legal, HR, IT, operations..."></label>
      <label><span>Location served</span><input name="location" placeholder="UAE, India, remote..."></label>
      <label class="portal-span"><span>What services can you execute?</span><textarea name="services" rows="5"></textarea></label>
      <button type="submit">Submit request</button>
    </form>
  </main>
</body>
</html>
