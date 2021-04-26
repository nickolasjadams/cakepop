<?php

namespace App\Controllers;

use App\Helpers\Facades\Log;
use App\Helpers\Session;
use App\Models\User;
use Exception;

class UserController
{

    public function __construct() {
        session_start();
    }

    /**
     * User Login authentication process.
     */
    public function index() {

        Session::clearErrors();

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user_search = User::where('email', '=', $email);

        // Try to find a matching user.
        if (count($user_search) === 0) {
            Session::pushError('login_mismatch', 'Incorrect email or password.');
            header('Location: /login');
            exit;
        }

        // Check the password.
        $user = $user_search[0];
        if (password_verify($password, $user->password())) {
            Session::clearErrors();
            $_SESSION['user'] = $user;
            header('Location: /dashboard');
            exit;
        } else {
            Session::pushError('login_mismatch', 'Incorrect email or password.');
            header('Location: /login');
            exit;
        }

    }

    /**
     * User signup processing.
     */
    public function store() {

        Session::clearErrors();
        Session::clearFormData();
        Session::snapshotFormData();

        $required_fields = (
            !empty($_POST['first_name']) &&
            !empty($_POST['last_name']) &&
            !empty($_POST['email']) &&
            !empty($_POST['password'])
        );

        if ($required_fields) {

            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $hash_password = password_hash($password, PASSWORD_DEFAULT);

            if (User::exists($email)) {
                Session::pushError('email', 'Account already exists for this email.');
            }

            if (Session::getErrors() != null) {
                if (sizeof(Session::getErrors() > 0)) {
                    header("Location: /login?signup=failed");
                    exit;
                }
            }

            try {
                $user = new User;
                $user->create($first_name, $last_name, $email, $hash_password);
                $user->save();
            } catch (Exception $e) {
                Session::pushError('signup_errors', 'Something unexpected happened. Please try again later.');
                Log::debug("Exception when trying to create and save new user to a database. " . $e);
                header("Location: /login?signup=failed");
                exit;
            }

            Session::clearFormData();
            Session::clearErrors();
            $_SESSION['user'] = $user;

            header("Location: /dashboard");
            exit;

        } else {
            Session::pushError('signup_errors', 'Please fill in all required fields.');
            header("Location: /login?signup=failed");
            exit;
        }

    }
}