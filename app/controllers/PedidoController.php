<?php
namespace App\Controllers;

class PruebaController  {


    public function hello(\Slim\Http\Request $req, \Slim\Http\Response $response, $args = [])  {
        echo "<pre>";
        var_dump($args);
        echo "</pre>";
    }





}