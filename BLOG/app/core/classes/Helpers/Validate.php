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


    //clean data
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
     * @return bool true/false
     **/
    public function validate($data, $rules)
    {
        $result = [];
        
        foreach($rules as $key => $rule)
        {
            foreach($rule as $method => $value)
            {
                if(!array_key_exists($method, $result))
                {
                    if(is_string($value))
                    {
                        $result[] = $this->$method($data[$key], $data[$value]);
                    }else if(is_array($value))
                    {
                        $result[] = $this->$method($value);
                    }else{
                        $result[] = $this->$method($data[$key]);

                    }
            
                }
            }
        }
        //if array has false, return false, else all input is correct
        foreach($result as $bool)
        {
            if(!$bool)
            {
                return false;
            }            
        }
                    
        return true;
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
        return true;
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
        if (!preg_match("/^[a-zA-Z-' ]*/",$nick)) {
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
            $this->oldInput['user_pass'] = '';

            return false;
        }

        $this->oldInput['user_pass'] = '';
        return true;
    }

    //passRep validate
    public function passRepValidate($passRep)
    {
        if(empty($passRep))
        {
            $this->err['user_passRep'] = "Can`t be empty";
            $this->oldInput['user_passRep'] = '';
            return false;
        }

        $this->oldInput['user_passRep'] = '';
        return true;
    }

    //check if passes match
    public function passMatches($pass, $passRep)
    {
        if($pass !== $passRep)
        {
            $this->err['user_passRep'] = "Passes don`t matches";
            $this->oldInput['user_passRep'] = '';

            return false;
        }
        $this->oldInput['user_passRep'] = '';
        return true;
    }

    //check if email is unick
    public function emailUnique($email)
    {
        $result = $this->select('SELECT email FROM users WHERE email = ?', [$email]);
        if(!empty($result[0]))
        {
            $this->err['user_email'] = "This email is not unique";
            $this->oldInput['user_email'] = $email;
            return false;
        }

        $this->oldInput['user_email'] = $email;
        return true;
    }

    //check if pass is correct
    public function passMatchEmail($email, $pass)
    {
        $result = $this->select('SELECT pass FROM users WHERE email = ?', [$email]);
        foreach($result as $key => $value)
        {
            if(!password_verify($pass, $value->pass))
            {
                $this->err['user_pass'] = "It`s not correct pass";
                $this->oldInput['user_pass'] = '';
                return false;
            }
        }
        
        return true;
    }

    //check if email is unick
    public function userExists($email)
    {
        $result = $this->select('SELECT email FROM users WHERE email = ?', [$email]);
        if(empty($result[0]))
        {
            $this->err['user_email'] = "Please, signup";
            $this->oldInput['user_email'] = '';
            return false;
        }

        return true;
    }

    // check title length
    public function checkLengthTitle($title)
    {

        if(strlen($title) < ConfigLoader::get('POST_TITLE_MIN_LENGTH'))
        {
            $this->err['title'] = "Too short title";
            $this->oldInput['title'] = $title;
            return false;
        }
        $this->oldInput['title'] = $title;
        return true;
    }

    // check description length
    public function checkLengthDescription($description)
    {
        if(strlen($description) < ConfigLoader::get('POST_DESCRIPTION_MIN_LENGTH'))
        {
            $this->err['description'] = "Too short description";
            $this->oldInput['description'] = $description;
            return false;
        }
        $this->oldInput['description'] = $description;
        return true;
    }

    //check mime type of photo
    public function checkMimeType($files)
    {

        foreach($files as $type)
        {

            // $type = mime_content_type($file);
            if($type === 'image/png' || $type === 'image/jpeg')
            {
                continue;
            }else{
                $this->err['photo'] = "This is not a photo";
                return false;
            }
        }         
        return true;
    }

    // check img size
    public function checkImageSize($sizes)
    {

        foreach($sizes as $size)
        {
            if($size > ConfigLoader::get('PHOTO_SIZE'))
            {
                $this->err['photo'] = "Too big photo";

                return false;
            }
        }

        return true;
    }
  

 
}