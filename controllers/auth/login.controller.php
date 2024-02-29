<?php

// Load Model File
getModel('authentication');


if (isUserLoggedIn()) {
    echo 'Already Logged In!!!';
} else {
    // Load View File
    getView('login', 'auth/');
}
