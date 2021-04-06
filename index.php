<?php

set_include_path("./src");

require_once("Router.php");
require_once("Model/CompteStorageMysql.php");
require_once("Model/ArticleStorageMysql.php");
require_once("Model/ImageStorageMysql.php");

try {
     $bd = new PDO("mysql:host=mysql.info.unicaen.fr;port=3306;dbname=22009791_1;charset=utf8", "22009791", "Mae6toivohqu9fai");
 } catch (Exception $e) {
     echo "ERROR CONNEXION";
 }

$compte_bd = new CompteStorageMysql($bd);
$article_bd = new ArticleStorageMysql($bd);
$image_bd = new ImageStorageMysql($bd);
$router = new Router();
$router->main($compte_bd,$article_bd,$image_bd);

?>
