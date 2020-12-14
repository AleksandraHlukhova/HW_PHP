<?php

namespace App\Core\Classes\Controllers;

use App\Core\Classes\Database\PdoConnection;
use App\Core\Models\User;
use App\Core\Traites\Validate;
use App\Core\Traites\PassHash;
use App\Core\Classes\Request;


/**
 * AuthController class
 */
class AuthController extends Controller
{

    public PdoConnection $DB;
    public Request $request;
    public Validate $validate;
    // use Validate;
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

        // $name = $this->validate->nameValidate($_POST['user_name']);
        // $email = $this->validate->emailValidate($_POST['user_email']);
        // $phone = $this->validate->phoneValidate($_POST['user_phone']);
        // $login = $this->validate->nickValidate($_POST['user_nick']);
        // $pass = $this->validate->passValidate($_POST['user_pass']);
        // $passHash = $this->makeHash($pass);

        // $passRep = $this->validate->passMatches($pass, $_POST['user_passRep']);
        // $emailUnique = $this->validate->emailUnique('SELECT email FROM USER WHERE email = ?', [$email]);
        
        if(count($this->err) > 0)
        {
            $data = [
                'errors' => $this->err,
                'oldInput' => $this->oldInput
            ];

            return $this->view->render('signup', $data, 'auth-main');
        }else{
            $USER = new User($name, $email, $phone, $login, $passHash);
            
            $stmt = $this->DB->dbh->prepare("INSERT INTO user (name, email, phone, login, pass) 
                        VALUES (:name, :email, :phone, :login, :pass)");

            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':phone', $phone);
            $stmt->bindValue(':login', $login);
            $stmt->bindValue(':pass', $passHash);

            if($stmt->execute())
            {
                $_SESSION['auth'];
                return $this->view->render('profile', $data = [], 'profile-main');

            }else{
                new CustomException('You were not registred!');
            }
        }

    }

    /**
     * undocumented function summary
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
    public function profile()
    {
        return $this->view->render('profile', $data = [], 'profile-main');
    }


    /**
     * undocumented function summary
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
            $email = $this->emailValidate($_POST['user_email']);
            $pass = $this->passValidate($_POST['user_pass']);
            
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
     * undocumented function summary
     * @param 
     * @return 
     **/
    public function logout()
    {
        unset($_SESSION['auth']);
        return $this->view->render('login', $data = [], 'auth-main');
    }
    
}
