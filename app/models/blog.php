<?php

/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 24.01.18
 * Time: 12:01
 */
class Blog extends Model
{
    public function getCommentsByIdPost($post_id)
    {

        $db = self::connectDb();
        $stmt = $db->stmt_init();
        $stmt->prepare("SELECT * FROM `comments` LEFT JOIN users ON comments.author_id = users.id WHERE `post_id` = ? AND `activated`=1 AND `deleted` =0 ORDER BY `comm_id` ASC");
        $stmt->bind_param('i', $post_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $arr = array();
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr ? $arr : false;

    }

    function createComment($text, $post_id,  $parent_id, $author_id)
    {

        $db = self::connectDb();
        $result = $db->query('SELECT email FROM users WHERE id = "' . $author_id . '" LIMIT 1');
        $id = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["email"];
            }
        } else {
            return c;
        }
        $db->close();
        $db = self::connectDb();

        $sql ="INSERT INTO comments (`parent_id`,`post_id`,`author_id`,`text`) VALUES (".$parent_id.",'".$post_id."','".$author_id."','".$text."')";


        if ($db->query($sql) === TRUE) {
            $dateYearMonthDay =  date('Y-m-d', strtotime('now'));
            $dayHoursMinute = date('H:i', strtotime('now'));
            $comment = ' <li>
                            <div class="comment_box commentbox1">
                                    
                                <div class="gravatar">
                                    <img src="images/avator1.png" alt="author 1" />
                                </div>
                                
                                <div class="comment_text">
                                    <div class="comment_author">'. $id .'<span class="date">'. $dateYearMonthDay .'</span><span class="time">'. $dayHoursMinute .'</span></div>
                                    <p>'.$text.'</p>
                                    <div class="reply"><a href="#">Reply</a></div>
                                </div>
                                <div class="cleaner"></div>
                            </div>                        
                            
                        </li>';

        } else {
            return "Error" ;
        }

        $db->close();
        echo  $comment;exit;
    }
}