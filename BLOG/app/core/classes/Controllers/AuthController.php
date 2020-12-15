<?php

namespace App\Core\Classes\Controllers;

use App\Core\Classes\Database\PdoConnection;
use App\Core\Models\User;
use App\Core\Classes\Helpers\Validate;
use App\Core\Traites\PassHash;
use App\Core\Classes\Request;
use App\Core\Classes\Errors\CustomException;

/**
 * AuthController class
 */
class AuthController extends Controller
{

    public PdoConnection $DB;
    public Request $request;
    public Validate $validate;

    use PassHash;

    public function __construct()
    {
        parent::__construct();

        $this->DB = new PdoConnection();
        $this->request = new Request();
        $this->validate = new Validate();
    }


    /**
     * show form to signup
     * @param 
     * @return 
     **/
    public function index()
    {

        return $this->view->render('signup', $data = [], 'auth-main');
    }

    /**
     * handle signup
     * @param 
     * @return 
     **/
    public function signup()
    {
        //clean data
        $data = $this->validate->clean($_POST);

        $name = $_POST['user_name'];
        $email = $_POST['user_email'];
        $phone = $_POST['user_phone'];
        $login = $_POST['user_nick'];
        $pass = $_POST['user_pass'];
        $passRep = $_POST['user_passRep'];

        /**
         * validate data
         * @return bool
         **/
        $result = $this->validate->validate($name, $email, $phone, $login, $pass, $passRep, $method = 'signup');
        
        if(!$result)
        {
            $data = [
                'errors' => $this->validate->err,
                'oldInput' => $this->validate->oldInput
            ];

            return $this->view->render('signup', $data, 'auth-main');

        }else{
            //generate pass hash
            $passhash = $this->makeHash($pass);

            //make model user
            $USER = new User($name, $email, $phone, $login, $passhash);

            //add to db
            $stmt = $USER->insert("INSERT INTO user (name, email, phone, login, pass) 
            VALUES (:name, :email, :phone, :login, :pass)", [':name' => $name, ':email' => $email, ':phone' => $phone, 
            ':login' => $login, ':pass' => $passhash]);
            
            //if was added to db, user is auth
            if($stmt)
            {
                $_SESSION['auth'] = true;
                return $this->view->render('profile', $data = [], 'profile-main');

            }else{
                new CustomException('You were not registred!');
            }
        }

    }

    /**
     * login
     * @param 
     * @return 
     **/
    public function login()
    {
        if($this->request->getMethod() === 'GET')
        {
            return $this->view->render('login', $data = [], 'auth-main');
        }else if($this->request->getMethod() === 'POST')
        {
            //clean data
            $data = $this->validate->clean($_POST);
            die('Stop coding: ' . __FILE__. ' on line:' . __LINE__ . '! make signin tomorrow!');
            $email = $_POST['user_email'];
            $pass = $_POST['user_pass'];

            /**
             * validate data
             * @return bool
             **/
            $result = $this->validate->validate($email, $pass);
            
            
            if(count($this->err) > 0)
            {
                $data = [
                    'errors' => $this->err,
                    'oldInput' => $this->oldInput
                ];

                return $this->view->render('login', $data, 'auth-main');
            }
            else{
                
                $USER = new User($email, $pass);

                var_dump( $this->USER );

            }
        }
    }


    /**
     * chack if auth
     * @param 
     * @return 
     **/
    public static function issetAuth()
    {
        if(isset($_SESSION['auth']))
        {
            return true;
        }
        return false;
    }


    /**
     * undocumented function summary
     * @param 
     * @return 
     **/
    public function logout()
    {
        $_SESSION['auth'] = false;
        unset($_SESSION['auth']);
        return $this->view->render('login', $data = [], 'auth-main');
    }
    
}