<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$page = preg_replace('/[^a-zA-Z0-9\/_-]/', '', $page);

$module = __DIR__ . '/modules/' . $page . '.php';
$view   = __DIR__ . '/views/' . $page . '.php';

if (file_exists($module)) {
    require __DIR__ . '/views/header.php';
    require $module;
    require __DIR__ . '/views/footer.php';
} elseif (file_exists($view)) {
    require __DIR__ . '/views/header.php';
    require $view;
    require __DIR__ . '/views/footer.php';
} else {
    require __DIR__ . '/views/header.php';
    echo "<h2>404 - Page Not Found</h2>";
    require __DIR__ . '/views/footer.php';
}
