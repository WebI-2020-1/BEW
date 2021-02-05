<?php
    class DB{
        private static $db;

        public function __construct(){
            $env = parse_ini_file('env.ini');
            self::$db = new PDO('mysql:host='.$env['DB_CONNECTION'].';dbname='.$env['DB_DATABASE'], $env['DB_USERNAME'], $env['DB_PASSWORD'],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$db->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }

        public static function getFirst($sql){
            $execute = self::$db->prepare($sql);
            $execute->execute();
            return $execute->fetch(PDO::FETCH_ASSOC);
        }

        public static function getAll($sql){
            $execute = self::$db->prepare($sql);
            $execute->execute();
            return $execute->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function execute($sql){
            return self::$db->exec($sql);
        }

    }
?>