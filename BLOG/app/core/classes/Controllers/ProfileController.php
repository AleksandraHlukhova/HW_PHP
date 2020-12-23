<?php

namespace App\Core\Classes\Controllers;
use App\Core\Models\User;

/**
 * ProfileController class
 */
class ProfileController extends Controller
{

    /**
     * show profile
     * @param 
     * @return 
     **/
    public function index()
    {
        $user = User::select("SELECT * FROM users WHERE id = ?", [$_SESSION['auth']]); 
        return $this->view->render('profile', 'profile-main', [
            'user' => $user
        ]);
    }
    
}