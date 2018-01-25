<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 14:38
 */
class User extends Model{

    public  function getData(){
        $dbh = self::connectDb();
        $result = $dbh->query("SELECT * FROM users");
        $user_arr[] = array();
        if($result){
            while ($row = $result->fetch_object()){
                $user_arr[] = $row;
            }
            $result->close();
            $dbh->next_result();
        }
        $dbh->close();
        return $user_arr;
    }
//    function getIdByEmail($email){
//        $db = self::connectDb();
//        $stmt = $db->stmt_init();
//        $stmt->prepare("SELECT * FROM users WHERE email = ?");
//        $stmt->bind_param('i', $email);
//        $stmt->execute();
//        $result = $stmt->get_result();
//        $stmt->close();
//        $arr = array();
//        while ($row = $result->fetch_assoc()) {
//            $arr[] = $row;
//        }
//        return $arr ? $arr : false;
//       
//    }
}