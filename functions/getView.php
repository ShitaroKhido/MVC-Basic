<?php

/**
 * Load a view file based on the provided view name and optional directory.
 *
 * @param string $viewName The name of the view to load.
 * @param string|null $dir The directory where the view is located (optional).
 * @return void
 */
function getView($viewName, $dir = null)
{
    global $mainDir;

    $viewPath = $mainDir . '/views/' . $dir . $viewName . '.view.php';
    if (is_file($viewPath)) {
        require_once $viewPath;
    } else {
        echo '<h1>Error: Model Not Found!</h1>';
    }
}
