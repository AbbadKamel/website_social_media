<?php
require_once('Image.php');
interface ImageStorage{

    public function createImage(Image $image,$login);
    public function readAllImage();
    public function deleteImageBD($id);

}




?>
