<?php


namespace App\Core\Classes\Helpers;

use App\Core\Models\Model;
use App\Core\Classes\ConfigLoader;

/**
 * Validate class
 */
class Validate extends Model
{
    public $err = [];
    public $oldInput = [];


    //claen data
    public function clean($data) {
        $result = [];

        foreach($data as $key => $value)
        {

            $value = trim($value);
            $value = stripslashes($value);
            $value = htmlspecialchars($value);
            $result[$key] = $value;
        }

        return $result;
    }

    /**
     * validate data
     * @param
     * @return bool
     **/
    public function validate($name, $email, $phone, $nick, $pass, $passRep, $method = [])
    {
       //valid name
        $name = $this->nameValidate($name);

       //valid email
        $email = $this->emailValidate($email);
            if($email)
            {  
                //if signup
                if($method === 'signup')
                {
                    $email = $this->emailUnique($email);
                }
            }

       //valid phone
        $phone = $this->phoneValidate($phone);

       //valid nick
        $nick = $this->nickValidate($nick);
       
        //valid pass
        $pass = $this->passValidate($pass);
        
        //valid passRep
        $passRep = $this->passRepValidate($passRep);
        //valid passMatches
        $passMatches = $this->passMatches($pass, $passRep);

        if($name &&  $email &&  $phone &&  $nick &&  $passMatches)
        {
            return true;
        }

        return false;
    }

    //name validate
    public function nameValidate($name)
    {
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $this->err['user_name'] = "Only letters and white space allowed";
            $this->oldInput['user_name'] = $name;

            return false;

        }else if(strlen($name) < ConfigLoader::get('NAME_LEN'))
        {
            $this->err['user_name'] = "Too short name";
            $this->oldInput['user_name'] = $name;

            return false;

        }

        $this->oldInput['user_name'] = $name;
        return true;
    }

    //email validate
    public function emailValidate($email)
    {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->err['user_email'] = "Invalid email format";
            $this->oldInput['user_email'] = $email;

            return false;

        }

        $this->oldInput['user_email'] = $email;
        return $email;
    }

    //phone validate
    public function phoneValidate($phone)
    {
        if(!preg_match("/[0-9]/", $phone))
        {
            $this->err['user_phone'] = "Invalid phone format";
            $this->oldInput['user_phone'] = $phone;

            return false;
        }
        else if(strlen($phone) == ConfigLoader::get('PHONE_LEN'))
        {   
            $len = ConfigLoader::get('PHONE_LEN');
            $this->err['user_phone'] = "Phone need to be $len symbols";
            $this->oldInput['user_phone'] = $phone;

            return false;
        }

        $this->oldInput['user_phone'] = $phone;
        return true;
  
    }

    //nick validate
    public function nickValidate($nick)
    {
        if (!preg_match("/^[a-zA-Z-' ]*$/",$nick)) {
            $this->err['user_nick'] = "Only letters and white space allowed";
            $this->oldInput['user_nick'] = $nick;

            return false;

        }else if(strlen($nick) < ConfigLoader::get('NICK_LEN'))
        {
            $this->err['user_nick'] = "Too short nick";
            $this->oldInput['user_nick'] = $nick;

            return false;
        }

        $this->oldInput['user_nick'] = $nick;
        return true;
    }

    //pass validate
    public function passValidate($pass)
    {
        if(strlen($pass) < ConfigLoader::get('PASS_LEN'))
        {
            $this->err['user_pass'] = "Too short pass";
            $this->oldInput['user_pass'] = $pass;

            return false;
        }

        $this->oldInput['user_pass'] = $pass;
        return true;
    }

    //passRep validate
    public function passRepValidate($passRep)
    {
        if(empty($passRep))
        {
            $this->err['user_passRep'] = "Can`t be empty";
            $this->oldInput['user_passRep'] = $passRep;
            return false;
        }

        $this->oldInput['user_passRep'] = $passRep;
        return true;
    }

    //check if passes match
    public function passMatches($pass, $passRep)
    {
        if($pass !== $passRep)
        {
            $this->err['user_passRep'] = "Passes don`t matches";
            $this->oldInput['user_passRep'] = $passRep;

            return false;

        }

        $this->oldInput['user_passRep'] = $passRep;
        return $passRep;
    }

    //check if email is unick
    public function emailUnique($email)
    {
        $result = $this->select('SELECT email FROM USER WHERE email = ?', [$email]);
        if(!empty($result))
        {
            $this->err['user_email'] = "This email is not unique";
            $this->oldInput['user_email'] = $email;
            return false;
        }

        $this->oldInput['user_email'] = $email;
        return true;
    }
  

 
}