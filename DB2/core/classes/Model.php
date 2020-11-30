<?php


namespace App\Classes;
/**
 * class Model
 */
abstract class Model
{

    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';

    public array $errors = [];
    /**
     * undocumented function summary
     * @return 
     **/
    public function loadData($data)
    {
        foreach($data as $key => $value)
        {
            
            if(property_exists($this, $key))
            {
                $this->{$key} = $value; // ??? obj RegisterModel

            }
        }
    }

    /**
     * undocumented function summary
     * @return 
     **/
    abstract public function rules() : array;

    /**
     * undocumented function summary
     * @return 
     **/
    public function validate()
    {
        // var_dump($this->rules());
        // exit;
        foreach($this->rules() as $attribute => $rules)
        {
            $value = $this->{$attribute};
            foreach($rules as $rule)
            {
                $ruleName = $rule;

                if(!is_string($ruleName))
                {
                    $ruleName = $rule[0];
                }

                if($ruleName === self::RULE_REQUIRED && !$value)
                {
                    $this->addError($attribute, self::RULE_REQUIRED);
                }

                if($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL))
                {
                    $this->addError($attribute, self::RULE_EMAIL);
                }
                if($ruleName === self::RULE_MIN && strlen($value) < $rule['min'])
                {
                    $this->addError($attribute, self::RULE_MIN, $rule);
                }
                if($ruleName === self::RULE_MAX && strlen($value) > $rule['max'])
                {
                    $this->addError($attribute, self::RULE_MAX, $rule);
                }
                if($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']})
                {
                    $this->addError($attribute, self::RULE_MATCH, $rule);
                }
            }
        }

        return empty($this->errors);
    }

    /**
     * undocumented function summary
     * @return 
     **/
    public function addError(string $attribute, string $rule, $params=[])
    {
        $message = $this->errorMessages()[$rule] ?? '';
        foreach($params as $key => $value)
        {
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->errors[$attribute][] = $message;
    }

    /**
     * undocumented function summary
     * @return 
     **/
    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_EMAIL => 'This field have to has valid email',
            self::RULE_MIN => 'Min length of this field have to be {min}',
            self::RULE_MAX => 'Min length of this field have to be {max}',
            self::RULE_MATCH => 'This field have to be the same as {match}',
        ];
    }

    /**
     * undocumented function summary
     * @return 
     **/
    public function hasError($attribute)
    {   
        return $this->errors[$attribute] ?? false;
    }

    /**
     * undocumented function summary
     * @return 
     **/
    public function getFirstError($attribute)
    {   
        return $this->errors[$attribute][0] ?? false;
    }
    
}
