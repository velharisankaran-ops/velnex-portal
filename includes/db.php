<?php

require_once __DIR__ . '/helpers.php';

function portal_database_config()
{
  $localPath = portal_base_path('config/database.local.php');

  if (file_exists($localPath)) {
    $config = require $localPath;
    return is_array($config) ? $config : null;
  }

  return null;
}

function portal_db()
{
  static $pdo = null;

  if ($pdo instanceof PDO) {
    return $pdo;
  }

  $config = portal_database_config();

  if (!$config) {
    throw new RuntimeException('Database is not configured. Create config/database.local.php from config/database.example.php.');
  }

  $charset = isset($config['charset']) ? $config['charset'] : 'utf8mb4';
  $port = isset($config['port']) ? (int) $config['port'] : 3306;
  $dsn = sprintf(
    'mysql:host=%s;port=%d;dbname=%s;charset=%s',
    $config['host'],
    $port,
    $config['database'],
    $charset
  );

  $pdo = new PDO($dsn, $config['username'], $config['password'], array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
  ));

  return $pdo;
}
