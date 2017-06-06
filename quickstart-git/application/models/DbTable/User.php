<?php

class Application_Model_DbTable_User extends Zend_Db_Table_Abstract
{

    protected $_name = 'user';

    public function getUser($id)
    
    {       
      $id = (int)$id;
      
      $row = $this->fetchRow('id = '.$id) ;
      
      if(!$row)
      {
      throw new Exception("Error could not find row $id");
      }
      
      return $row->toArray();
    }

    public function getUserByEmail($email)
    {
        /** @var Default_Model_UserRow|null $user */
        $user = $this->fetchRow(['email = ?' => $email]);
        return $user;
    }

     public function getUserByCode($code)
    {
        /** @var Default_Model_UserRow|null $user */
        $user = $this->fetchRow(['confirmation_code = ?' => $code]);
        return $user;
    }
      
    


}

