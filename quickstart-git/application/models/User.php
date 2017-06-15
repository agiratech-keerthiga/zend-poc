<?php

class Application_Model_User
{

    protected $_id;
    protected $_role;
    protected $_firstname;
    protected $_lastname;
	protected $_password;
    protected $_email;
    protected $_salt;
   
    
    

    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid  property');
        }
        $this->$method($value);
    }

    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid User');
        }
        return $this->$method();
    }

    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    public function setPassword($text)
    {
        $this->_password = (string) $text;
        return $this;
    }

    public function getPassword()
    {
        return $this->_password;
    }

    public function setEmail($email)
    {
        $this->_email = (string) $email;
        return $this;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function setFirstname($text)
    {
        $this->_firstname = (string) $text;
        return $this;
    }

    public function getRole()
    {
        return $this->_role;
    }

    public function setRole($text)
    {
        $this->_role = (string) $text;
        return $this;
    }


    public function getLastname()
    {
        return $this->_lastname;
    }

    public function setId($id)
    {
        $this->_id = (int) $id;
        return $this;
    }

    public function getFirstname()
    {
        return $this->_firstname;
    }

    public function setLastname($text)
    {
        $this->_lastname = (string) $text;
        return $this;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setConfirmationCode($code)
    {
        $this->_code = (int) $code;
        return $this;
    }

    public function getConfirmationCode()
    {
        return $this->_confirmation_code;
    }

    public function setSalt($text)
    {
        $this->_salt = (string) $text;
        return $this;
    }

    public function getSalt()
    {
        return $this->_salt;
    }

    public static function generateSalt($max = 15) {
        $characterList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $i = 0;
        $salt = "";
        do {
            $salt .= $characterList{mt_rand(0,strlen($characterList)-1)};
            $i++;
        } while ($i <= $max);
        return $salt;
    }
}


