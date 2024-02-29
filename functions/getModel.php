<?php

/**
 * Load a model file based on the provided model name and optional directory.
 *
 * @param string $modelName The name of the model to load.
 * @param string|null $dir The directory where the model is located (optional).
 * @return void
 */
function getModel($modelName, $dir = null)
{
    global $mainDir;

    $modelPath = $mainDir . '/models/' . $dir . $modelName . '.model.php';
    if (is_file($modelPath)) {
        require_once $modelPath;
    } else {
        echo '<h1>Error: Model Not Found!</h1>';
    }
}
