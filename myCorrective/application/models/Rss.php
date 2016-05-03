<?php

class Application_Model_Rss extends Zend_Db_Table_Abstract
{

    protected $_name = 'rss';
	



    public function addAction($data)
    {
        $row = $this->createRow();
        $row->rName = $data['rName'];
        $row->rDesc = $data['rDesc'];
        $row->rUrl = $data['rUrl'];
        $row->user_id = $data['user_id'];
        return $row->save();
    }


    function listRss($uid){
       	$db = Zend_Db_Table::getDefaultAdapter();
        $select=$db->select()
            ->from(array('r' => 'rss'))
            ->where('r.user_id='.$uid);
        return $select->query()->fetchAll();
	}
	

	function getRssById($rssid){
		return $this->find($rssid)->toArray();
	}


	function deleteRss($rssid){
		return $this->delete('id='.$rssid);
	}


    public function editRss($data,$id)
    {

        $mydata = array(
            'rName' => $data['rName'],
            'rUrl' => $data['rUrl'],
            'rDesc' => $data['rDesc']
        );

        $where = "id = " . $id;
        return $this->update($mydata, $where);


    }


}

