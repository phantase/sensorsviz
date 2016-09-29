<?php

  session_start();

  // Stuff for the i18n (translation/internationalization)
  $lang = isset($_GET['lang']) ? $_GET['lang'] : 'fr';
  switch($lang){
    case 'en':
      $locale = 'en_US';
      break;
    case 'fr':
    default:
      $locale = 'fr_FR';
      break;
  }
  // Arbitrary set
  date_default_timezone_set('Europe/Paris');

  include_once("mvc/models/sql_connection.php");

  $jsLibraries = array("dist"=>array(),"assets"=>array());
  $cssLibraries = array("dist"=>array(),"assets"=>array());

  $retropath = "";
  for($i=0;$i<count(split("/",$_SERVER['REDIRECT_URL']))-2;$i++){
    $retropath .= "../";
  }

  // Retrieve the parameter action which is used to navigate in the MVC
  $action = isset($_GET['action']) ? $_GET['action'] : "home";

  switch($action) {
    case "circularheat":
      $include_page = $action;
      break;
    default:
      $include_page = "home";
  }

  include_once('mvc/controllers/'.$include_page.'.php');
