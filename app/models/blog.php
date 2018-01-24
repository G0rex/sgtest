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
        $stmt->prepare("SELECT * FROM `comments` WHERE `post_id` = ? AND `activated`=1 AND `deleted` =0 ORDER BY `created_at` ASC");
        $stmt->bind_param('i', $post_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $arr = array();
        while ($row = $result->fetch_row()) {
            $arr[] = $row;
        }
        return $arr ? $arr : false;

    }
}