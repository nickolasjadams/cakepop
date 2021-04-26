<?php

namespace App\Controllers;

use App\Helpers\Facades\Auth;
use App\Helpers\View;
use App\Helpers\Session;

class EntryPointsController
{

    public function login()
    {
        session_start();

        View::render('login', [
            'form_data' => Session::getFormData(),
            'errors' => Session::getErrors()
        ]);
    }

    public function dashboard()
    {
        Session::check();

        $current_user = Auth::currentUser();

        $user = $_SESSION['user'];
        View::render('dashboard', [
            'user' => $user,
        ]);
    }

}