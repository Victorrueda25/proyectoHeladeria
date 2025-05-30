<?php

    class Conexion{

        static public function conectar(){

            $link = new PDO("mysql:host=localhost:3306;dbname=heladeria","root","root");
            return $link;

        }

    }