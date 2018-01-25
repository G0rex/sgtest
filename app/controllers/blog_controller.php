<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 16:28
 */
class Blog_Controller extends Controller {

    function index()
    {
        $blog = new Blog;
        $comments = $blog->getCommentsByIdPost(10);
        $this->view->generate('blog_view.php', SiteSettings::LAYOUT_FILE.'.php',$comments);
    }
    function ajax()
    {

            $text = $_POST['text'];
            $post_id = $_POST['post_id'];
            $parent_id = $_POST['parent_id'];
            $author_id = $_POST['author_id']?$_POST['author_id']:null;
            $comment = new Blog();

        return array('data' => $comment->createComment($text,$post_id,$parent_id,$author_id));
    }
}