<?php

class My_Controller_Plugin_ACL extends Zend_Controller_Plugin_Abstract
{
    protected $_defaultRole = 'user';
 
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $controller = $request->getControllerName();

        $action = $request->getActionName();
        
        $auth = Zend_Auth::getInstance();
        $acl = new My_Acl();
        $mysession = new Zend_Session_Namespace('Zend_Auth');
 
        if($auth->hasIdentity()) {
            $user = $auth->getIdentity();
           
            // if(!$acl->isAllowed('admin','index::index')) {

            //     return Zend_Controller_Action_HelperBroker::getStaticHelper('redirector')->setGotoUrl('admin/dashboard');
            // }

            // else if(!$acl->isAllowed('user', 'index::index')) {
                
            //     return Zend_Controller_Action_HelperBroker::getStaticHelper('redirector')->setGotoUrl('index/home');
            // }
        }
    }
}

?>