<?php
  // codificação utf-8
  function __autoload($strNomeClasse){
    $strStrDir = array(
       $_SERVER["DOCUMENT_ROOT"]."/carros/classes/basicas/",
       $_SERVER["DOCUMENT_ROOT"]."/carros/classes/fachadas/",
       $_SERVER["DOCUMENT_ROOT"]."/carros/classes/negocios/",
       $_SERVER["DOCUMENT_ROOT"]."/carros/classes/repositorios/"
    );

    for($intI=0; $intI<count($strStrDir);$intI++){
      if(file_exists($strStrDir[$intI].$strNomeClasse.".php")){
        require_once $strStrDir[$intI].$strNomeClasse.".php";
      }
    }
  }
?>