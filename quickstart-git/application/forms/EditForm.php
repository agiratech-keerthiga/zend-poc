<?php

class Application_Form_EditForm extends Zend_Form
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
            'label'      => 'Firstname:',
        ));

        $lastname = $this->addElement('text', 'lastname', array(
            'filters'    => array('StringTrim', 'StringToLower'),
            'validators' => array(
                'Alpha',
                array('StringLength', false, array(3, 20)),
            ),
            'required'   => true,
            'label'      => 'Lastname:',
        ));

       

        $email = $this->addElement('text', 'email', array(
            'label'      => 'Your email address:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'EmailAddress'
        )));

        $update = $this->addElement('submit', 'update', array(
            'required' => false,
            'ignore'   => true,
            'label'    => 'Update',
        ));


        $this->setDecorators(array('FormElements', array('HtmlTag', array('tag' => 'table')), 'Form'));   

        $this->setElementDecorators(array( 
            'ViewHelper', 
            'Errors', 
            array('decorator' => array('td' => 'HtmlTag'), 'options' => array('tag' => 'td')), 
            array('Label', array('tag' => 'td')), 
            array('decorator' => array('tr' => 'HtmlTag'), 'options' => array('tag' => 'tr')), 
        )); 
    }

}

