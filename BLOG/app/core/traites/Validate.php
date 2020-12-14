<?php


namespace App\Core\Traites;
use App\Core\Models\Model;

use App\Core\Classes\ConfigLoader;

/**
 * undocumented class
 */
class Validate extends Model
{
    public $err = [];
    public $oldInput = [];

    public function textInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function nameValidate($name)
    {
        $name = $this->textInput($name);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $this->err['user_name'] = "Only letters and white space allowed";
            $this->oldInput['user_name'] = $name;
            return [
                'err' => $this->err,
                'oldInput' => $this->oldInput
            ];
        }else if(strlen($name) < ConfigLoader::get('NAME_LEN'))
        {
            $this->err['user_name'] = "Too short name";
            $this->oldInput['user_name'] = $name;
            return [
                'err' => $this->err,
                'oldInput' => $this->oldInput
            ];
        }
        return $name;
    }

    public function emailValidate($email)
    {
        $email = $this->textInput($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->err['user_email'] = "Invalid email format";
            $this->oldInput['user_email'] = $email;
            return [
                'err' => $this->err,
                'oldInput' => $this->oldInput
            ];
        }
        return $email;
    }

    public function phoneValidate($phone)
    {
        $phone = $this->textInput($phone);
        if(!preg_match("/[0-9]/", $phone))
        {
            $this->err['user_phone'] = "Invalid phone format";
            $this->oldInput['user_phone'] = $phone;
            return [
                'err' => $this->err,
                'oldInput' => $this->oldInput
            ];
        }
        else if(strlen($phone) == ConfigLoader::get('PHONE_LEN'))
        {   
            $len = ConfigLoader::get('PHONE_LEN');
            $this->err['user_phone'] = "Phone need to be $len symbols";
            $this->oldInput['user_phone'] = $phone;
            return [
                'err' => $this->err,
                'oldInput' => $this->oldInput
            ];
        }

        return $phone;

       
    }

    public function nickValidate($nick)
    {
        $nick = $this->textInput($nick);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$nick)) {
            $this->err['user_nick'] = "Only letters and white space allowed";
            $this->oldInput['user_nick'] = $nick;
            return [
                'err' => $this->err,
                'oldInput' => $this->oldInput
            ];
        }else if(strlen($nick) < ConfigLoader::get('NICK_LEN'))
        {
            $this->err['user_nick'] = "Too short nick";
            $this->oldInput['user_nick'] = $nick;
            return [
                'err' => $this->err,
                'oldInput' => $this->oldInput
            ];
        }
        return $nick;
    }

    public function passValidate($pass)
    {
        if(strlen($pass) < ConfigLoader::get('PASS_LEN'))
        {
            $this->err['user_pass'] = "Too short pass";
            $this->oldInput['user_pass'] = $pass;
            return [
                'err' => $this->err,
                'oldInput' => $this->oldInput
            ];
        }

        return $pass;
    }

    public function passMatches($pass, $passRep)
    {
        $passRep = $this->textInput($passRep);

        if($pass !== $passRep)
        {
            $this->err['user_passRep'] = "Passes don`t matches";
            $this->oldInput['user_passRep'] = $passRep;
            return [
                'err' => $this->err,
                'oldInput' => $this->oldInput
            ];

        }

        return $passRep;
    }

    public function emailUnique($stmt, $email)
    {
        $result = $this->select($stmt, $email);
        if(empty($result))
        {
            $this->err['email_unique'] = "This email is not unique";
            return [
                'err' => $this->err
            ];
        }
        return false;
    }
  

 
}
