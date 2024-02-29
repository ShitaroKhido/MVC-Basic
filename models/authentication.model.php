<?php

function signin(array $request)
{
    $credentials = [
        'email' => $request['email'],
        'password' => $request['password'],
    ];
    // Perform signin logic with $credentials
    // ...

}

function signup(array $request)
{
    $credentials = [
        'email' => $request['email'],
        'password' => $request['password'],
    ];
    // Perform signup logic with $credentials
    // ...
}

function signout()
{
    clearUserSession();
}

function isUserLoggedIn()
{
    return isset($_SESSION['user']) && !empty($_SESSION['user']);
}

function getCurrentUserData()
{
    return $_SESSION['user'];
}

function startUserSession($userData)
{
    $_SESSION['user'] = $userData;
}

function clearUserSession()
{
    unset($_SESSION['user']);
}
