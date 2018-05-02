<?php

class Connexion {
    private static $_instance = null;
    
    public static function getInstance($dsn,$user,$pass){
        if(!self::$_instance){
            try{
                self::$_instance = new PDO($dsn,$user,$pass);
               // print "Connecté";
            } catch (PDOException $e) {
                print $e->getMessage();

            }
        }
        return self::$_instance;
    }
}
