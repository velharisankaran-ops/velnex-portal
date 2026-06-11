<?php

function portal_base_path($path = '')
{
  $base = dirname(__DIR__);
  return $path === '' ? $base : $base . DIRECTORY_SEPARATOR . $path;
}

function portal_private_config_path($filename)
{
  $envDir = getenv('VELNEX_PORTAL_CONFIG_DIR');

  if ($envDir) {
    return rtrim($envDir, DIRECTORY_SEPARATOR . '/\\') . DIRECTORY_SEPARATOR . $filename;
  }

  return dirname(portal_base_path()) . DIRECTORY_SEPARATOR . 'portal-private' . DIRECTORY_SEPARATOR . $filename;
}

function portal_config()
{
  static $config = null;

  if ($config !== null) {
    return $config;
  }

  $config = require portal_base_path('config/app.php');
  $privatePath = portal_private_config_path('app.local.php');
  $localPath = portal_base_path('config/app.local.php');

  foreach (array($privatePath, $localPath) as $configPath) {
    if (!file_exists($configPath)) {
      continue;
    }

    $localConfig = require $configPath;
    if (is_array($localConfig)) {
      $config = array_merge($config, $localConfig);
    }

    break;
  }

  return $config;
}

function portal_e($value)
{
  return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function portal_post($key, $default = '')
{
  return isset($_POST[$key]) ? trim((string) $_POST[$key]) : $default;
}

function portal_redirect($path)
{
  header('Location: ' . $path);
  exit;
}

function portal_request_labels()
{
  return array(
    'business' => 'Business client request',
    'investor' => 'Investor client request',
    'vendor' => 'Vendor / partner request',
    'internal' => 'Internal team access',
    'request' => 'Portal request',
  );
}
