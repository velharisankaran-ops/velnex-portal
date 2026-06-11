<?php

require_once __DIR__ . '/helpers.php';

function portal_admin_start_session()
{
  if (session_status() !== PHP_SESSION_ACTIVE) {
    session_name('velnex_portal_admin');
    session_start();
  }
}

function portal_admin_credentials_configured()
{
  $config = portal_config();
  return !empty($config['admin_username']) && !empty($config['admin_password_hash']);
}

function portal_admin_check_credentials($username, $password)
{
  $config = portal_config();
  $configuredUsername = isset($config['admin_username']) ? (string) $config['admin_username'] : '';
  $passwordHash = isset($config['admin_password_hash']) ? (string) $config['admin_password_hash'] : '';

  if ($configuredUsername === '' || $passwordHash === '') {
    return false;
  }

  return hash_equals($configuredUsername, $username) && password_verify($password, $passwordHash);
}

function portal_admin_login($username)
{
  portal_admin_start_session();
  session_regenerate_id(true);
  $_SESSION['admin_logged_in'] = true;
  $_SESSION['admin_username'] = $username;
}

function portal_admin_logout()
{
  portal_admin_start_session();
  $_SESSION = array();

  if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
  }

  session_destroy();
}

function portal_admin_is_logged_in()
{
  portal_admin_start_session();
  return !empty($_SESSION['admin_logged_in']);
}

function portal_admin_require_login()
{
  if (!portal_admin_is_logged_in()) {
    portal_redirect('login.php');
  }
}
