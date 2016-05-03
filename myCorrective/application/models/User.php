<?php

class Application_Model_User extends Zend_Db_Table_Abstract
{

    protected $_name = 'Users';

    public function addUser($data){


        $row = $this -> createRow();
        $row -> firstname = $data['firstname'];
        $row -> lastname = $data['lastname'];
        $row -> username = $data['username'];
        $row -> password = md5($data['password']);
        $row -> email = $data['email'];
        $row -> prof_pic = $data['prof_pic'];
        return $row -> save();
   }
}



