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
}