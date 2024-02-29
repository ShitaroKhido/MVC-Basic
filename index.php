<?php
session_start();

// Initialize Main directory path
$mainDir = dirname(__FILE__) ?? '';

// Load Constant Variables
require_once $mainDir . '/constants.php';

// Load Support Function Files
loadSupportFunctionFiles($mainDir);

// Require Routes
$publicRoutes = require $mainDir . '/routes/public.php';
$privateRoutes = require $mainDir . '/routes/private.php';

// Merge Public & private routes into one array
$routes = array_merge($publicRoutes, $privateRoutes);

// Get URI
$uri = $_SERVER['PATH_INFO'] ?? '/';

// Initiate Router
router($routes, $uri);

function loadSupportFunctionFiles($mainDir)
{
    $functionFiles = glob($mainDir . '/functions/*.php');
    foreach ($functionFiles as $file) {
        if (is_file($file)) {
            require $file;
        }
    }
}
