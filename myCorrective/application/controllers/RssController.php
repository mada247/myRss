<?php

class RssController extends Zend_Controller_Action
{


    private $auth=null;
    private $user=null;

    public function init()
    {
        $this->auth = Zend_Auth::getInstance();
        if($this->auth->hasIdentity()){
            $this->view->user=$this->auth->getIdentity();
        }
        $this->model = new Application_Model_Rss();


        if($action = $this->getRequest()->getActionName() != "login" &&  !$this->auth->hasIdentity())
        {
            $this->redirect('user/login');
        }

    }

    public function addAction()
    {
        $authorization = Zend_Auth::getInstance();
        if(!$authorization -> hasIdentity()) {
        $this->redirect('/');
    }
    else
        {
            $data = $this->getRequest()->getParams();
            $request = $this->getRequest();
            $form = new Application_Form_Rss();
            if($this->getRequest()->isPost()){
                $data['user_id']=$this->auth->getIdentity()->id;

                $data['id']=null;
                if($form->isValid($data))
                {
                    $this->model->addAction($data);
                    $this->redirect('rss/list');

                }

            }else{

                $this->view->form = $form;
                    }
  }
}

    public function editAction()
    {
        $id = $this->getRequest()->getParam('rssid');
        $form = new Application_Form_Rss();
        $rss = $this->model->getRssById($id);
        $form->populate($rss[0]);
       
        $data = $this->getRequest()->getParams();
        if($this->getRequest()->isPost()){
            if($form->isValid($data)){

                $this->model->editRss($data,$id);
                $this->redirect('rss/list');
            }
        }
        $this->view->form = $form;
    }

   

    public function deleteAction()
    {

        $id = $this->getRequest()->getParam('rssid');
        if($id){
            if ($this->model->deleteRss($id))
                $this->redirect('rss/list');

        } else {
            $this->redirect('rss/list');
        }

        }


    public function listAction()
    {
        $uid=$this->auth->getIdentity()->id;
        $this->view->rss = $this->model->listRss($uid);
        }




    public function rssAction()
    {


        try{

            $rss_id = $this->getRequest()->getParam('rssid');

        $rss = $this->model->getRssById($rss_id);
        $this->view->rsstitle=$rss[0]['rName'];
        $this->view->rssdesc=$rss[0]['rDesc'];
        
        $rssFeed = Zend_Feed_Reader::import($rss[0]['rUrl']);
        $data = array(
            'title'        => $rssFeed->getTitle(),
            'link'         => $rssFeed->getLink(),
            'dateModified' => $rssFeed->getDateModified(),
            'description'  => $rssFeed->getDescription(),
            'language'     => $rssFeed->getLanguage(),
            'entries'      => array(),
        );

        foreach ($rssFeed as $entry) {
            $dataa = array(
                'title'        => $entry->getTitle(),
                'description'  => $entry->getDescription(),
                'dateModified' => $entry->getDateModified(),
                'authors'       => $entry->getAuthors(),
                'link'         => $entry->getLink(),
                'content'      => $entry->getContent()
            );
            $data['entries'][] = $dataa;
            }
            $this->view->rssdata=$data;
    
        }catch(Zend_Exception $e){   

                echo "<center><h4>Bad Url</h4></center>";
        }
        }
    

}











