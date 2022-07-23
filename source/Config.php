<?php

//timezone
date_default_timezone_set('America/Recife');

const SITE = "TESTE VAGA";

// postgresql connection
const DATA_LAYER_CONFIG = [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "teste-vaga",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
];

//URL
const ROOT = "http://localhost/teste_vaga";

function url( string $uri = null ): string
{
    if ( $uri ) {
        return ROOT . "/{$uri}";
    }

    return ROOT;
}
