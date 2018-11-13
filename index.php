<?php
 require_once("vendor/autoload.php");
 use \Slim\Slim;
 use \GeovaRS\Page;
 $app = new Slim();
 $app->config('debug', false);
 $app->get
 ('/',
  function()
  {
   $page = new Page();
   $page->setTpl("index");
  }
 );
 $app->run();

 // Quando chamarem via get o / do meu site,
 // Carregue a função que carrega o Cabeçalho no método __construct()
 // Carregue o Template index.
 // Carregue o método __destruct() da classe Page
 // Quando tudo estiver carregado Execute $app->run();.
?>