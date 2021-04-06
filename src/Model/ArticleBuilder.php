<?php

class ArticleBuilder{

    private $data;
    private $error;
    const ARTICLE  ='article';
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

    public function createArticleBuilder(){
      return new Article($this->data[self::ARTICLE],$this->data[self::LOCATION],"",$this->data[self::DATECREATION]);
    }


}

?>
