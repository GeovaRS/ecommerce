<?php
 session_start();
 require_once("vendor/autoload.php");
 use \Slim\Slim;
 use \GeovaRS\Page;
 use \GeovaRS\PageAdmin;
 use \GeovaRS\Model\User;

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

 $app->get
 ('/admin',
  function()
  {
   User::verifyLogin();
   $page = new PageAdmin();
   $page->setTpl("index");
  }
 );

 $app->get
 ('/admin/login',
  function()
  {
   $page = new PageAdmin(["header"=>false, "footer"=>false]);
   $page->setTpl("login");
  }
 );

 $app->post
 ('/admin/login',
  function()
  {
   User::login($_POST["login"], $_POST["password"]);
   header("Location: /admin");
   exit;
  }
 );

 $app->get
 ('/admin/logout',
  function()
  {
   User::logout();
   
   header("Location: /admin/login");
   exit;
  }
 );
 $app->run();

 // Quando chamarem via get o / do meu site,
 // Carregue a função que carrega o Cabeçalho no método __construct()
 // Carregue o Template index.
 // Carregue o método __destruct() da classe Page
 // Quando tudo estiver carregado Execute $app->run();.
?>