<?php

class Client
{
    private $username;
    private $password;
    private $email;
    private $phone;
    private $idAdmin;   

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
    public function getIdAdmin()
    {
        return $this->idAdmin;
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
    public function setIdAdmin($idAdmin)
    {
        $this->idAdmin = $idAdmin;
    }


    public function __construct($username , $password , $email , $phone , $idAdmin)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->phone = $phone;
        $this->idAdmin = $idAdmin;
    }
}
