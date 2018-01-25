<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 17:28
 */
class Auth extends Model{

    public  function registerUser( $password, $email){
        $db = self::connectDb();
        $sql ="INSERT INTO users (`password`,`email`) VALUES ('".$password."','".$email."')";


        if ($db->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }

        $db->close();

    }
    public function checkLoginUser($login,$password){
        $db = self::connectDb();
        $result = $db->query('SELECT * FROM users WHERE login = "'.$login.'" AND password="'.$password.'" LIMIT 1');
        $db->close();

        if($result->num_rows !== 0){

            return true;
        }
        return false;
        
    }
    public function returnUserId($email,$password){
        $db = self::connectDb();
        $result = $db->query('SELECT id FROM users WHERE email = "'.$email.'" AND password="'.$password.'" LIMIT 1');
        $id = 0;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id =  $row["id"];
            }
        } else {
            return 0;
        }
        return $id;


    }
}