<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger'); 
    }

    public function indexAction()
	{
		$user = new Application_Model_UserMapper();
		$form = new Application_Form_LoginForm();
		$form->setAttrib('id','login_form');

		$this->view->form = $form;

		if($this->getRequest()->isPost()){
			if($form->isValid($_POST)){
				$data = $form->getValues();
				$authAdapter = $this->getAuthAdapter();
				
            	$email = $form->getValue('email');
            	$password = $form->getValue('password');
            	$salt = 'rR1qnRIHzhs6vYEs';
            	// echo SHA1($password.$salt);
            	// die;

            	$authAdapter->setIdentity($email)
                        ->setCredential($password);

                $auth = Zend_Auth::getInstance();

	            try
	            {
	                $result = $auth->authenticate($authAdapter);
	            }
	            catch (Exception $e) 
	            {
	                echo 'Caught exception: ',  $e->getMessage(), "\n";
	            }

				 if ($result->isValid()) 
                {
    
                    $identity = $authAdapter->getResultRowObject();
                    //converting object into an array
                    $identity = json_decode(json_encode($identity), true);

                    
                    //remember me for 7 days
                    $authstorage = $auth->getStorage();
                    Zend_Session::rememberMe(7*86400); //7 days

                    //initialise the session
 					$session = new Zend_Session_Namespace('Zend_Auth');
 					$storage = new Zend_Auth_Storage_Session();
					$data = $storage->read();
					
                    $authstorage->write($identity);
                    if (Zend_Auth::getInstance()->hasIdentity()) 
                    	$this->view->hasIdentity = true;

         
                	$this->_flashMessenger->addMessage(array('message' => 'Successful Login', 'status' => 'succMsg'));
                	if($identity['role'] == 'admin'){
                    	$this->_redirect('/admin/dashboard');
                	}
                	else{
                    	$this->_redirect('/index/home');
                	}
                }
				else {
					
					$form->getErrorMessages(); //any custom error messages
					$this->view->errorMessage = "Invalid username or password. Please try again.";
				}

			}
		}
	}

    public function homeAction()
	{
		$storage = new Zend_Auth_Storage_Session();
		if (Zend_Auth::getInstance()->hasIdentity()) 
            $this->view->hasIdentity = true;
                    	
		$data = $storage->read();
		if(!$data)
		{
        return $this->_helper->redirector('index');
		}
		$this->view->email = $data['email'];
	}

     public function signupAction()
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

    public function logoutAction()
	{
		$storage = new Zend_Auth_Storage_Session();
		$storage->clear();
		
		// Zend_Auth::getInstance()->clearIdentity());
             
        return $this->_helper->redirector('index');
	}

	public function forgottenpasswordAction()
	{
		$form = new Application_Form_ForgottenPasswordForm();
		$form->setAttrib('id','forgot_form');
		// $form->get('submit')->setValue('Send');
		$request = $this->getRequest();
		if($this->getRequest()->isPost()){

			 if ($form->isValid($request->getPost())) {
				$data = $form->getValues();
				$usr_email = $data['email'];
				// $mapper  = new Application_Model_UserMapper();
    //             $user = $mapper->getUserByEmail($usr_email);
				$user = new Application_Model_DbTable_User();
               
				$code = rand(100,999);
				$resetPassLink = 'http://local.zend.com/index/resetpassword?code='.$code;
				$email = $usr_email;
				 $mailContent = 'To reset your password, visit the following link: <a href="'.$resetPassLink.'">'.'reset link'.'</a>';
				

				//sending email via smtp
				$mail = new Zend_Mail();
				$mail->addTo($email);
				$mail->setSubject("Reset Password");
				$mail->setBodyHtml($mailContent);
				$mail->setFrom('keerthiga@agiratech.com', 'Admin');

				$sent = true;
				try {
				    $mail->send();
				} catch (Exception $e){
				    $sent = false;
				}
				if($sent){
					$data = new Application_Model_User($form->getValues()); 
					$mapper  = new Application_Model_UserMapper();
					$mapper->updateConfirmationCode($email,$code,$data);
					// $usersTable = new Application_Model_DbTable_User();
					// $getuser = $usersTable->getUserByEmail('keerthiga@agiratech.com');
					// print_r($getuser);
					echo "Kindly check your inbox to reset your password";
					$this->_redirect('/index');

				}
				else{
					$this->view->errorMessage = "Invalid username or password. Please try again.";
				}
				
//				$usersTable->changePassword($auth->usr_id, $password);

			}					
		}		
		$this->view->form = $form;		
	}

	public function resetpasswordAction()
	{
		$form = new Application_Form_ResetPasswordForm();
		$request = $this->getRequest();
		$mapper  = new Application_Model_UserMapper();
		$code = $this->getRequest()->getparam('code');
		$users = new Application_Model_DbTable_User();
        $userExists = $users->getUserByCode($code);
        // print_r($userExists);

		if($userExists){
			// $getuser = $usersTable->getUserByCode($code);
			// print_r($getuser);
				if($code != NULL){
					if($this->getRequest()->isPost()){
						if ($form->isValid($request->getPost())) {
							
							$data = new Application_Model_User($form->getValues());    
							$password = $form->getValue('password');
							$mapper->changePassword($password,$code,$data);
						}
					}
				}	
				$this->view->form = $form;
		}
		else{
			$this->view->errorMessage = "Code has been Expired.";
		}
	}	

	private function getAuthAdapter()
	{
	    $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
	    $authAdapter->setTableName('user')
	                ->setIdentityColumn('email')
	                ->setCredentialColumn('password')
	                ->setCredentialTreatment('SHA1(CONCAT(?, salt))');

	    return $authAdapter;
	}

}







