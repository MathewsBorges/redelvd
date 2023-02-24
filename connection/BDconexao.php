<?php

class BDconexao
{
    public static function getConexao()
    {
        $bd = null;
        try {
            $dsn = 'pgsql:host=localhost;dbname=farmacia-teste';
            $user = 'postgres';
            $password = 'postgres';
            $bd = new \PDO($dsn, $user, $password);
        } catch (\Throwable $th) {
            print($th);
        }

        return $bd;
    }
}
