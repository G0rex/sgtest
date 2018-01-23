<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 17:28
 */
class Auth extends Model{

    public  function registerUser($login , $password){
        $db = self::connectDb();
        $sql ="INSERT INTO users (`login`,`password`) VALUES ('".$login."','".$password."')";


        if ($db->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }

        $db->close();

    }
    public function checkLoginUser($login,$password){
        $db = self::connectDb();
        $result = $db->query('SELECT * FROM users WHERE login = "'.$login.'" AND password="'.$password.'"');
        $db->close();

        if($result->num_rows !== 0){

            return true;
        }
        return false;
        
    }
}