<?php

/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 12:09
 */
class Model
{
    /** Связь с БД
     * @return mysqli
     */
    public static function connectDb()
    {
//       return new PDO('mysql:host='.DbSettings::DB_HOST.';dbname='.DbSettings::DB_NAME.'' , ''.DbSettings::DB_USER.'', ''.DbSettings::DB_PASS.'');
        $db_connect = new mysqli(DbSettings::DB_HOST, DbSettings::DB_USER, DbSettings::DB_PASS, DbSettings::DB_NAME);
        if ($db_connect->connect_errno) {
            printf("Не удалось подключиться: %s\n", $db_connect->connect_error);
            exit();
        }
        return $db_connect;

    }

    /**
     *
     */
    public function getData()
    {

    }

}