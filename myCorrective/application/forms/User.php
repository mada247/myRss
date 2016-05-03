<?php

class Application_Form_User extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $id = new Zend_Form_Element_Hidden("id");

        $fname = new Zend_Form_Element_Text("firstname");
        $fname->setRequired();
        $fname->setlabel("First Name:");
        $fname->setAttrib("class","form-control");
        $fname->setAttrib("placeholder","Enter your First Name");


        $lname = new Zend_Form_Element_Text("lastname");
        $lname->setRequired();
        $lname->setlabel("Last Name:");
        $lname->setAttrib("class","form-control");
        $lname->setAttrib("placeholder","Enter your Last Name");

        $uname = new Zend_Form_Element_Text("username");
        $uname->setRequired();
        $uname->setlabel("User Name:");
        $uname->setAttrib("class","form-control");
        $uname->setAttrib("placeholder","Enter your User Name");


        $email = new Zend_Form_Element_Text("email");
        $email->setRequired();
        $email->addValidator(new Zend_Validate_EmailAddress());
        $email->setlabel("Email:");
        $email->setAttrib("class","form-control");
        $email->setAttrib("placeholder","Enter your Email");


        $password = new Zend_Form_Element_Password("password");
        $password->setRequired();
        $password->setlabel("Password:");
        $password->addValidator(new Zend_Validate_StringLength(array('min' => 5, 'max' => 10)));
        $password->setAttrib("class","form-control");

        $prof_pic = new Zend_Form_Element_File("prof_pic");
        //$prof_pic->setRequired();
        $destination = APPLICATION_PATH.'/../public/uploads/users';
        $prof_pic->setLabel('Profile Picture :');
        $prof_pic->setDestination($destination);
        $prof_pic->setAttrib("class","form-control");
        $prof_pic->addValidator('Count', false, 1);
        $prof_pic->addValidator('Size', false, 10240000);
        $prof_pic->addValidator('Extension', false, 'jpg,jpeg,png,gif');


        $submit = new Zend_Form_Element_Submit('submit');


        $this->addElements(array($id,$fname,$lname,$email,$uname,$password,$prof_pic));

        // ---------- Adding Captcha -------------//
        $this->addElement('captcha','captcha',
            array(
                'label'=>'Ensure that you are not a robot',
                'required'=>true,
                'captcha'=>array(
                    'captcha'=>'Figlet',
                    'wordLen'=>6,
                    'timeout'=>200,
                ),
            )
        );

        $this->addElements(array($submit ));


    }


}

