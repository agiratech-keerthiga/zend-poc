<?php

class My_Acl extends Zend_Acl
{
    public function __construct()
    {
        $this->addRole(new Zend_Acl_Role('guest'));
        
        // Add a role called user, which inherits from guest
        $this->addRole(new Zend_Acl_Role('user'));
        // Add a role called admin, which inherits from user
        $this->addRole(new Zend_Acl_Role('admin'));
 
        // Add some resources in the form controller::action
       
        $this->add(new Zend_Acl_Resource('index::login'));
        $this->add(new Zend_Acl_Resource('index::logout'));
        $this->add(new Zend_Acl_Resource('index::index'));
 
        // Allow guests to see the error, login and index pages
        $this->allow('user', 'index::login');
        $this->allow('user', 'index::index');
        // Allow users to access logout and the index action from the user controller
        $this->allow('user', 'index::logout');
        $this->allow('user', 'index::index');
        // Allow admin to access admin controller, index action
        $this->allow('admin', 'index::index');
 
        // You will add here roles, resources and authorization specific to your application, the above are some examples
    }
}

?>