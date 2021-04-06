<?php
require_once('Article.php');
interface ArticleStorage{

  public function createArticle(Article $article,$login);
  public function readAllArticle();
  public function deleteArticleBD($id);

}




?>
