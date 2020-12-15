<?php

namespace App\Core\Classes\Controllers;

use App\Core\Classes\Database\PdoConnection;
use App\Core\Models\User;
use App\Core\Classes\Request;
use App\Core\Classes\Errors\CustomException;

/**
 * AuthController class
 */
class AuthController extends Controller
{

    public PdoConnection $DB;
    public Request $request;

    use PassHash;

    public function __construct()
    {
        parent::__construct();

        $this->DB = new PdoConnection();
        $this->request = new Request();
    }

    /**
     * show profile
     * @param 
     * @return 
     **/
    public function profile()
    {
        return $this->view->render('profile', $data = [], 'profile-main');
    }
    
}