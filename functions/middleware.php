<?php
// Load Authentication Model
getModel('authentication');

function checkPermission(array $allowedRoles)
{
    // Ensure that the user is logged in
    if (isUserLoggedIn()) {
        $userRoles = getCurrentUserData()['permission'];

        // Ensure that $userRoles is set before checking permissions
        if ($userRoles !== null && is_array($userRoles)) {
            // Check if any of the user's roles match the allowed roles
            return array_intersect($userRoles, $allowedRoles) !== [];
        }
    }

    return false; // Return false if user is not logged in or roles are not set
}
