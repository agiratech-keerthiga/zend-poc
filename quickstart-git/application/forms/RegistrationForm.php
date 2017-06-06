<?php

class Application_Form_RegistrationForm extends Zend_Form
{

   public function init()
	{
		$this->setMethod('post');

		$id = $this->createElement('hidden','id');
		$firstname = $this->addElement('text', 'firstname', array(
            'filters'    => array('StringTrim', 'StringToLower'),
            'validators' => array(
                'Alpha',
                array('StringLength', false, array(3, 20)),
            ),
            'required'   => true,
            'label'      => 'First Name:',
        ));

		$lastname = $this->addElement('text', 'lastname', array(
            'filters'    => array('StringTrim', 'StringToLower'),
            'validators' => array(
                'Alpha',
                array('StringLength', false, array(3, 20)),
            ),
            'required'   => true,
            'label'      => 'Last Name:',
        ));

        $EmailExists = new Zend_Validate_Db_NoRecordExists(
            array(
                'table' => 'user',
                'field' => 'email'
        ));

        $EmailExists->setMessage('This e-mail is already taken');

		$email = $this->addElement('text', 'email', array(
            'label'      => 'Your email address:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'EmailAddress'
        )));

        $email =  $this->email->addValidator($EmailExists);



        $password = $this->addElement('password', 'password', array(
            'label' => 'Password', 
            'required' => true
        ));
        $password->setAttrib( "id", "password" );

        //password_confirm
        $confirmpassword = $this->addElement('password', 'confirmpassword', array(
            'label' => 'Confirm Password', 
            'required' => true
        ));
        $confirmpassword = $this->confirmpassword->addValidator('Identical', false, array(
            'token' => 'password'
        ));


		$signup = $this->addElement('submit', 'signup_button', array(
            'required' => false,
            'ignore'   => true,
            'label'    => 'Signup',
        ));

        $this->setDecorators(array('FormElements', array('HtmlTag', array('tag' => 'table')), 'Form'));   

        $this->setElementDecorators(array( 
            'ViewHelper', 
            'Errors', 
            array('decorator' => array('td' => 'HtmlTag'), 'options' => array('tag' => 'td')), 
            array('Label', array('tag' => 'td')), 
            array('decorator' => array('tr' => 'HtmlTag'), 'options' => array('tag' => 'tr')), 
        )); 

        $element = $this->getElement('signup_button');
        // $element->removeDecorator('td');  
        $element->removeDecorator('label');
	}


}

