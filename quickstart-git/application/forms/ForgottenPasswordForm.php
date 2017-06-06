<?php

class Application_Form_ForgottenPasswordForm extends Zend_Form
{

     public function init()
    {
        $this->setAttrib('method', 'post');
		
        $email = $this->addElement('text', 'email', array(
            'label'      => 'Your email address:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'EmailAddress',
            )
        ));

        $EmailExists = new Zend_Validate_Db_NoRecordExists(
            array(
                'table' => 'user',
                'field' => 'email'
        ));

        $EmailExists->setMessage('This e-mail is already taken');
		
        $submit = $this->createElement('submit','submit');
        $submit->setLabel('submit')
        ->setIgnore(true);

        $this->addElements(array(
        
        $email,
        $submit
        ));
    }


}

