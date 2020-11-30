<?php

namespace App\Models;

use App\Classes\Model;

/**
 * class RegisterModel
 */
class RegisterModel extends Model
{
    public string $user_name;
    public string $user_email;
    public string $user_pass;
    public string $user_passConf;
    
    /**
     * undocumented function summary
     * @return 
     **/
    public function register()
    {
        echo 'creating new user';
        return true;
    }

    /**
     * undocumented function summary
     * @return 
     **/
    public function rules() : array
    {
        return [
            'user_name' => [self::RULE_REQUIRED],
            'user_email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'user_pass' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 20]],
            'user_passConf' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'user_pass']],
        ];
    }
}
