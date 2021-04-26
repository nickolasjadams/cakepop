<?php

/**
 * Routes can be called one of 2 ways.
 * A controller and method
 * e.g. $router->post('login', 'app/controllers/UserController.php', 'index');
 * or simply a controller
 * e.g. $router->get('login', 'app/controllers/login.php');
 */

 
/**
 * Login Page
 */

// show login page
$router->get('', 'app/controllers/EntryPointsController.php', 'login');
$router->get('login', 'app/controllers/EntryPointsController.php', 'login');

// user logging in
$router->post('login', 'app/controllers/UserController.php', 'index');

// user signing up
$router->post('signup', 'app/controllers/UserController.php', 'store');



/**
 * Dashboard routes
 */

$router->get('dashboard', 'app/controllers/EntryPointsController.php', 'dashboard');

$router->get('my-account', 'app/controllers/MyAccountController.php', 'index');
$router->post('my-account-password', 'app/controllers/MyAccountController.php', 'updatePassword');
$router->post('my-account-info', 'app/controllers/MyAccountController.php', 'updateInfo');

$router->get('logout', 'app/helpers/Session.php', 'logout');