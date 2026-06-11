<?php

if (PHP_SAPI !== 'cli') {
  http_response_code(404);
  exit;
}

$password = isset($argv[1]) ? (string) $argv[1] : '';

if ($password === '') {
  fwrite(STDERR, "Usage: php scripts/make_admin_hash.php \"your-admin-password\"\n");
  exit(1);
}

echo password_hash($password, PASSWORD_DEFAULT) . PHP_EOL;
