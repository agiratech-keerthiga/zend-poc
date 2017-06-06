<?php

class Application_Form_LoginForm extends Zend_Form
{

  public function init()
  {
        $email = $this->addElement('text', 'email', array(
            'filters'    => array('StringTrim', 'StringToLower'),
            'validators' => array(
                'EmailAddress',
            ),
            'required'   => true,
            'label'      => 'Email:',
        ));

        $password = $this->addElement('password', 'password', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                'Alnum',
                array('StringLength', false, array(6, 20)),
            ),
            'required'   => true,
            'label'      => 'Password:',
        ));

        $login = $this->addElement('submit', 'login_button', array(
            'required' => false,
            'ignore'   => true,
            'label'    => 'Sign in to Your Account',
        ));

       

        $this->setDecorators(array('FormElements', array('HtmlTag', array('tag' => 'table')), 'Form'));   

        $this->setElementDecorators(array( 
            'ViewHelper', 
            'Errors', 
            array('decorator' => array('td' => 'HtmlTag'), 'options' => array('tag' => 'td')), 
            array('Label', array('tag' => 'td')), 
            array('decorator' => array('tr' => 'HtmlTag'), 'options' => array('tag' => 'tr')), 
        )); 

        $element = $this->getElement('login_button');
        // $element->removeDecorator('td');  
        $element->removeDecorator('label');
    }


}

