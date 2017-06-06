<?php

class Application_Form_ResetPasswordForm extends Zend_Form
{

    public function init()
    {
        $this->setAttrib('method', 'post');
		
        $password = $this->addElement('password', 'password', array(
            'filters'    => array('StringTrim'),
            'validators' => array(
                'Alnum',
                array('StringLength', false, array(6, 20)),
            ),
            'required'   => true,
            'label'      => 'Password:',
        ));

		
        $submit = $this->createElement('submit','submit');
        $submit->setLabel('submit')
        ->setIgnore(true);

        $this->addElements(array(
        
        $password,
        $submit
        ));
    }


}

