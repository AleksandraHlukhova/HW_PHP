<?php

namespace App\Core\Models;

/**
 * User class
 */
class User extends Model
{
    public integer $id;
    public string $name;
    public string $email;
    public string $phone;
    public string $nick;
    public string $pass;


    public function __construct($name, $email, $phone, $nick, $passHash)
    {
        parent::__construct();
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->nick = $nick;
        $this->pass = $passHash;

    }
    
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of login
     */ 
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */ 
    public function setNick($nick)
    {
        $this->nick = $nick;

        return $this;
    }

    /**
     * Get the value of pass
     */ 
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set the value of pass
     *
     * @return  self
     */ 
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }
}
