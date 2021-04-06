<?php

Class Compte{

      private $nom;
      private $genre;
      private $password;
      private $mode;
      private $mob_email;

      public function __construct($nom,$genre,$pass,$mode,$mob_email) {
          $this->nom = $nom;
          $this->genre = $genre;
          $this->password = $pass;
          $this->mode = $mode;
          $this->mob_email= $mob_email;
      }

      public function getnom() {
          return $this->nom;
      }

      public function getgenre() {
          return $this->genre;
      }


      public function getpass() {
          return $this->password;
      }

      public function getmode() {
          return $this->mode;
      }

      public function getmob_email() {
          return $this->mob_email;
      }
    }

?>
