<?php

class ImageBuilder{

    private $data;
    private $error;
    const LIEN  ='lien';
    const LOCATION='location';
    const DATECREATION ='date_creation';


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

    public function createImageBuilder(){
      return new Image($this->data[self::LIEN],$this->data[self::LOCATION],"",$this->data[self::DATECREATION]);
    }


}

?>
