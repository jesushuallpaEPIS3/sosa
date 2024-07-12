<?php

namespace DB;

class Conectar {
    private static $connection;

    public static function conexion() {
        if (!self::$connection) {
            self::$connection = new \mysqli('localhost', 'user', 'password', 'database');
            if (self::$connection->connect_error) {
                die("Connection failed: " . self::$connection->connect_error);
            }
        }
        return self::$connection;
    }
}
