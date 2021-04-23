<?php

class Client
{
    private $username;
    private $password;
    private $email;
    private $phone;
    private $sexe;
    

    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getSexe()
    {
        return $this->sexe;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    public function __construct($username , $password , $email , $phone , $sexe)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->phone = $phone;
        $this->sexe = $sexe;
    }
}
