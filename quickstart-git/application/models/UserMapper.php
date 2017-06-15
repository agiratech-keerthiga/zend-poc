<?php

class Application_Model_UserMapper
{

 protected $_dbTable;

    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_User');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_User $user)
    {
        $role = 'user';
        $password = $user->getPassword();
        $salt = $user->generateSalt();
        $data = array(
            'role'             => $role,
        	'firstname'        => $user->getFirstname(),
        	'lastname'         => $user->getLastname(),
            'email'   	       => $user->getEmail(),
            'password'         => SHA1($password.$salt),
            'salt'             => $salt
            );
         // print_r(SHA1($pwd.'Ax3xRm5DtOQlGrug'))

        if (null === ($id = $user->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

    public function updateUser($id)
    {
    
        $data = array(
            'firstname'        => $user->getFirstname(),
            'lastname'         => $user->getLastname(),
            'email'         => $user->getEmail()
        );

        $this->getDbTable()->update( $data, 'id='.(int)$id);
        
    }

   public function deleteUser($id)
    {
    
        $this->getDbTable()->delete('id ='.(int)$id);
    } 

     public function updateConfirmationCode($email, $code)
    {
        if($code != NULL){
       
            $data = array(
                'confirmation_code' => $code,  
            );
        }

        $this->getDbTable()->update($data, array('email = ?' => $email));
    }   

    public function changePassword($password,$code,Application_Model_User $user)
    {
        $salt = $user->generateSalt();
        $data = array(
            'confirmation_code' => NULL,
            'salt'              => $salt,
            'password' => SHA1($password.$salt),
            
        );

        $this->getDbTable()->update($data, array('confirmation_code = ?' => $code));
    }   

    public function find($id, Application_Model_User $user)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $user ->setId($row->id)
              ->setRole($row->role)
        	  ->setFirstname($row->firstname)
        	  ->setLastname($row->lastname)
              ->setEmail($row->email)
              ->setPassword($row->password);
    }

    

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_User();
            $entry->setId($row->id)
                  ->setRole($row->role)
            	  ->setFirstname($row->firstname)
            	  ->setLastname($row->lastname)
                  ->setEmail($row->email)
                  ->setPassword($row->password);
            $entries[] = $entry;
        }
        return $entries;
    }
}


