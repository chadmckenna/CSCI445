<?php
class Connect {
  private $db_host   = '127.0.0.1';
  private $db_user   = 'cmckenna';
  private $db_pass   = 'rosetta';
  private $db_name   = 'cs445';
  
  private $con    = false;
  private $result = array();
  
  function __construct() {
    $this->connect();
  }
 
  function __destruct() {
    @mysql_close();
  }
 
  private function connect() {
    if(!$this->con) {
      
      $myconn = @mysql_connect($this->db_host,$this->db_user,$this->db_pass);
      
      if($myconn) {
        $seldb = @mysql_select_db($this->db_name, $myconn);
        
        if($seldb) {
          $this->con = true;
          return true;
        } else {
          return false;
        }
        
      } else {
        return false;
      }
    } else {
      return true;
    }
    
  }
}
?>