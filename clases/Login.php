<?php
include_once 'Database.php';
class Login extends Database
{
    private $_pass;
    private $_user;
    public $data;

    function __construct($user, $pass) {
        parent::__construct();
        $this->_user = $user;
        $this->_pass = md5($pass);
        $this->data = $this->_consultar($this->_getQuery(1));
    }

    private function _consultar($sql) {
        $result = $this->select($sql);
        return $result;
    }

    private function _getQuery($query) {
        switch ($query) {
            case 1:
                return "SELECT user_id, user_type_id, user_name, first_name, last_name, password
					FROM users
				   WHERE user_name = '".$this->_user."'
					 AND password = '".$this->_pass."'";
        }
    }

    public function isUser($data){
        if (count($data)<>0){
            if (($data[0]['user_name']==$this->_user) and ($data[0]['password']==$this->_pass)) {
                return true;
            }
        }
        else{
            return false;
        }
    }

}