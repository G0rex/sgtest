<?php

/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 14:38
 */
class User extends Model
{

    /** Возвращаем список юзеров
     * @return users array
     */
    public function getData()
    {
        $dbh = self::connectDb();
        $result = $dbh->query("SELECT * FROM users");
        $user_arr[] = array();
        if ($result) {
            while ($row = $result->fetch_object()) {
                $user_arr[] = $row;
            }
            $result->close();
            $dbh->next_result();
        }
        $dbh->close();
        return $user_arr;
    }

}