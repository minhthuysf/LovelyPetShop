<?php
 require 'lib/nusoap.php';
 require 'data.php';
 $server = new nusoap_server();
 $server->configureWSDL("Soap Demo","urn:soapdemo");
 $server->register(
         "getUserByName",
         array("name"=>"xsd:string"),
         array("return"=>"xsd:string")
         );
//  $server->register(
//         "getUserByID",
//         array("id"=>"xsd:integer"),
//          array("name"=>"xsd:string"),
//         array("return"=>"xsd:string")
//         );
 $server->service(file_get_contents("php://input"));
?>

