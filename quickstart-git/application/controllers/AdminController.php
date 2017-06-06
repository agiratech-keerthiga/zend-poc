<?php

class AdminController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function addAction()
    {
        $request = $this->getRequest();
        $form    = new Application_Form_RegistrationForm();
        $form->setAttrib('id','register_form');

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $data = new Application_Model_User($form->getValues());     
                $mapper  = new Application_Model_UserMapper();
                $mapper->save($data);
                return $this->_helper->redirector('index');
            }
        }

        $this->view->form = $form;
    }

    public function dashboardAction()
    {
        $user = new Application_Model_UserMapper();
        $this->view->entries = $user->fetchAll();
        // action body
    }

    public function editAction()
    {
        $request = $this->getRequest();
        $id = $this->getRequest()->getParam('id');
        $form = new Application_Form_EditForm();
        $form->setAttrib('id','edit_form');
        $form->getElement('email')
             ->addValidator('Db_NoRecordExists',
                false,
                array('table' => 'user',
                'field' => 'email',
                'exclude' => array ('field' => 'id', 'value' => $id)));

        $this->view->form = $form;
       

            if ($this->getRequest()->isPost()) {
                  $formData = $this->getRequest()->getpost();
                if ($form->isValid($request->getPost())) {
                    $data['id'] = $id;
                    $email = $form->getValue('email');
                    $data = new Application_Model_User($form->getValues());     
                    $mapper  = new Application_Model_UserMapper();
                    $mapper->updateUser($id);
                    return $this->_helper->redirector('index');
                }

                else
                {
                 $form->populate($formData);
                }    
            }  

            else
            {
                $id = $this->getRequest()->getparam('id');
                if($id > 0)
                {
                  $file = new Application_Model_DbTable_User();
                  $files = $file->getUser($id);
                  $form->populate($files);
                  
                }
            }

             
    }

    public function deleteAction()
    {
        //action body
            
            $id = $this->getrequest()->getparam('id');
            $mapper  = new Application_Model_UserMapper();
            $mapper->deleteUser($id);
          
         $this->_helper->redirector('index');
    }

    public function updateAction()
    {
        // action body
    }

    


}













