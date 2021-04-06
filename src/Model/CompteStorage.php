<?php

require_once("Compte.php");

interface CompteStorage {

  public function create(Compte $c);
  public function readuser();

}

?>
