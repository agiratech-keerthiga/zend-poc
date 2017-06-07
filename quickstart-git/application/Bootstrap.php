<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    public function init()
    {
        parent::init();

        $config = Zend_Registry::get('config')->configPage;
        
    }
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }


    protected function _initSession() {
        Zend_Session::start();
        ini_set('session.gc_maxlifetime', 45);  // set session max lifetime to 45 seconds
        ini_set('session.gc_divisor', 1); 
        if (!Zend_Registry::isRegistered('session')) {
            $session = new Zend_Session_Namespace('userIdentity');
            Zend_Registry::set('session', $session);
            Zend_Registry::set('login', 'true');
        }
    }

    protected function _initMail()
    {
        try {
            $config = array(
                'auth' => 'login',
                'username' => 'keerthiga@agiratech.com',
                'password' => 'keerthiga123',
                'ssl' => 'tls',
                'port' => 587
            );

            $mailTransport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', $config);
            Zend_Mail::setDefaultTransport($mailTransport);
        } catch (Zend_Exception $e){
            //Do something with exception
        }
    }

    protected function _initUser() // @codingStandardsIgnoreLine
    {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            Zend_Registry::set('identity', $auth->getIdentity());
        }
    }

}

