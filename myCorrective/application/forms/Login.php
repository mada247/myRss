<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */

        $this->setMethod('post');
		
		$this->addElement('text', 'username',
		 array(
		'label' => 'Username:',
		'class' => 'form-control',
		'required' => true,
		'filters' =>
		array('StringTrim'),
		));

		$this->addElement('password', 'password',
		array(
		'label' => 'Password:',
		'required' => true,
			'class' => 'form-control',
			));

		$this->addElement('submit', 'submit', array(
		'ignore'=> true,
			'class'=>'btn btn-success',
		'label'=> 'Login',
		));
    }


}

