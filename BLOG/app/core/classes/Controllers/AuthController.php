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
        //get data
        $data = $this->request->getData();
        
        //clean data
        $data = $this->validate->clean($data);

        $name = $data['user_name'];
        $email = $data['user_email'];
        $phone = $data['user_phone'];
        $login = $data['user_nick'];
        $pass = $data['user_pass'];
        $passRep = $data['user_passRep'];

        //return bool
        $result = $this->validate->validate($data, [
            'user_name' => [
                'nameValidate' => true,
            ],
            'user_email' => [
                'emailValidate' => true,
                'emailUnique' => true,
            ],
            'user_phone' => [
                'phoneValidate' => true,
            ],
            'user_nick' => [
                'nickValidate' => true,
            ],
            'user_pass' => [
                'passValidate' => true,
                'emailUnique' => true,
            ],
            'user_passRep' => [
                'passRepValidate' => true,
                'passMatches' => 'user_pass',
            ],

        ]);
        
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
            //get data
            $data = $this->request->getData();

            //clean data
            $data = $this->validate->clean($data);

            // die('Stop coding: ' . __FILE__. ' on line:' . __LINE__ . '! make signin tomorrow!');
            $email = $data['user_email'];
            $pass = $data['user_pass'];

            $result = $this->validate->validate($data, [
                'user_email' => [
                    'emailValidate' => true,
                    'emailUnique' => true,
                ]
            ]);
            
            if(!$result)
            {
                $data = [
                    'errors' => $this->validate->err,
                    'oldInput' => $this->validate->oldInput
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