<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
//        $this->model = new Application_Model_User;

        /*$this->auth = Zend_Auth::getInstance();
        if($this->auth->hasIdentity()){
            $this->view->user=$this->auth->getIdentity();
        }*/
        $this->model = new Application_Model_User();


        /*if($action = $this->getRequest()->getActionName() != "login" &&  !$this->auth->hasIdentity())
        {
            $this->redirect('user/login');
        }
*/

    }

    /*public function_exists(function_name)on indexAction()
    {
        // action body
    }
*/
    public function registrationAction()
    {
        // action body
        $data = $this->getRequest()->getParams();
        $form = new Application_Form_User();
        if ($this->getRequest()->isPost()) {

            if($form->isValid($data))
            {

                $data['prof_pic'] = "";

                if($form->getElement('prof_pic')->receive())
                {
                    $data['prof_pic'] = $form->getElement('prof_pic')->getValue();

                }

                if ($this->model->addUser($data))
                {
                    $this->redirect('rss/list');
                }
            }else{

                $this->view->form = $form;

            }
    }else{
            $this->view->form = $form;

        }
    }






public function loginAction()
{

    if($this->getRequest()->isPost()){
        $username= $this->_request->getParam('username'); // da gayly men el form
        $password= $this->_request->getParam('password'); // da gayly men el form

        // get the default db adapter
        $db =Zend_Db_Table::getDefaultAdapter();

        //create the auth adapter
        $authAdapter = new Zend_Auth_Adapter_DbTable($db,'Users','username', 'password');
        //($db,'table_name' , 'user name' , 'password')
        // asama2hom fe le db

        //set the email and password
        $authAdapter->setIdentity($username);
        $authAdapter->setCredential(md5($password));
        $result = $authAdapter->authenticate();

        if ($result->isValid()) {

            //if the user is valid register his info in session
            $auth = Zend_Auth::getInstance();
            $storage = $auth->getStorage();
            $storage->write($authAdapter->getResultRowObject(array('email' , 'id' , 'username' , 'password')));
            $this->redirect('rss/list');

        }else{

            echo "user doesnt exist !!" ;
            $formLogObj = new Application_Form_Login();
            $this->view->form=$formLogObj;
        }

    }else{

        $formLogObj = new Application_Form_Login();
        $this->view->form=$formLogObj;
    }

}

    public function successloginAction()
    {
        // action body

        $auth = Zend_Auth::getInstance();
        $storage = $auth->getStorage();
        $storage->read();//($authAdapter->getResultRowObject(array('email' , 'id' , 'name')));
        //$this->redirect('users/login-Success');
        //var_dump($storage->read());
        $username= $storage->read()->username;
        $email = $storage->read()->email;
        $id=$storage->read()->id;
        $this->view->username=$username;
        $this->view->id=$id;
        $this->view->email=$email;
        //die();
        $this->render('successlogin');
    }

    public function logoutAction()
    {
        //On every init() of controlleryou have to check is authenticated or not
        $authorization = Zend_Auth::getInstance();
        if(!$authorization -> hasIdentity()) {
            $this->redirect('/user/login');
        }
        else
        {
            // Check if user is Admin
            $authorization->clearIdentity();
            $this->redirect('/user/login');

        }
    }

}