<?php

namespace Model;

abstract class Connect {

    const HOST = "localhost";
    const DB = "cinema_malkom";
    const USER = "root";
    const PASS = "";

    public static function seConnecter() {
        try {
            return new \PDO(
                "mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8",self::USER, self::PASS);
        } catch(\PDOExeption $ex) {
            return $ex->getMessage();
        }
    } // tout
}