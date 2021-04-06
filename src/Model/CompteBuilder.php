<?php

require_once("CompteStorageMysql.php");
class CompteBuilder{
    private $data;
    private $error;
    const NOM  ='nom';
    const GENRE ='genre';
    const MOBEMAIL= 'mob_mail';
    const PASSWORD = 'password';
    const CONFIRM_PASSWORD='confirm_password';

    public function __construct($data){
      $this->data = $data;
      $this->error = array();
    }

    public function getdata(){
      return $this->data;
    }

    public function geterror(){
      return $this->error;
    }

    public function CreateCompte(){
      return new Compte($this->data[self::NOM],$this->data[self::GENRE],$this->data[self::PASSWORD],"user",$this->data[self::MOBEMAIL]);
    }


}

?>
