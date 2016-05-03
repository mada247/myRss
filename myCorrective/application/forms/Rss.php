<?php

class Application_Form_Rss extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post');

=        $rName = new Zend_Form_Element_Text("rName");
        $rName->setRequired();
        $rName->setlabel("Rss Name:");
        $rName->setAttrib("class",array("form-control","col-lg-9" ));



        $rUrl = new Zend_Form_Element_Text("rUrl");
        $rUrl->setRequired();
        $rUrl->setlabel("Rss URL:");
        $rUrl->setAttrib("class",array("form-control","col-lg-9" ));
       

        $rDesc= new Zend_Form_Element_Textarea("rDesc");
        $rDesc->setRequired();
        $rDesc->setlabel("Rss Description:");
        $rDesc->setAttrib("class",array("form-control","col-lg-9" ));
        $rDesc->setAttrib('cols', '20')->setAttrib('rows', '2');




        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib("class","btn-lg btn-primary");
        $this->setAttrib('enctype', 'multipart/form-data');
        $this->setAttrib('class','form-horizontal');
        $this->addElements(array($rName,$rUrl,$rDesc,$submit));
    }
}

