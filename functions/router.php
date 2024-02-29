<?php

function router(array $routes, $path)
{
    if (isPathExist($routes, $path)) {
        loadController($routes, $path);
    } else {
        showNotFound();
    }
}

function isPathExist(array $routes, $path)
{
    return array_key_exists($path, $routes);
}

function loadController(array $routes, $path)
{
    $controllerInfo = $routes[$path];
    $controllerName = $controllerInfo['controller'];
    $controllerDir = $controllerInfo['dir'] ?? '';
    $routePermission = $controllerInfo['auth'] ?? '';

    includeController($controllerName, $controllerDir, $routePermission);
}

function includeController($name, $dirname, $routePermission)
{
    global $mainDir;

    // Set the title in the $_SERVER array
    $_SERVER['title'] = $name;

    // Construct the path to the controller file
    $controllerPath = $mainDir . '/controllers/' . $dirname . $name . '.controller.php';

    // Check if the controller file exists
    if (is_file($controllerPath)) {
        // Check route permission
        if (hasPermission($routePermission)) {
            renderControllerView($controllerPath);
        } else {
            // Display a message for not having authorization
            showControllerNotAuthorized();
        }
    } else {
        // Display a message for controller not found
        showControllerNotFound();
    }
}

function hasPermission($routePermission)
{
    // Check if the user has the required permission
    return empty($routePermission) || checkPermission($routePermission);
}

function includePart($name)
{
    global $mainDir;
    require $mainDir . '/views/partials/' . $name . '.php';
}

function showNotFound()
{
    echo '<h1>Page Not Found!</h1>';
}

function showControllerNotFound()
{
    echo '<h1>Controller Not Found!</h1>';
}

function showControllerNotAuthorized()
{
    echo '<h1>Controller Not Authorized!</h1>';
}

function renderControllerView($controllerPath, $templateType = '')
{
    // Include the header
    includePart($templateType . 'header');
    // Include the navigation bar
    includePart($templateType . 'navbar');
    // Require the controller file
    require_once $controllerPath;
    // Include the footer
    includePart($templateType . 'footer');
}
