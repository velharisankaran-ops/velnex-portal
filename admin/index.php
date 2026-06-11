<?php

require_once __DIR__ . '/../includes/helpers.php';

$suffix = isset($_GET['key']) ? '?key=' . urlencode((string) $_GET['key']) : '';
portal_redirect('access-requests.php' . $suffix);
