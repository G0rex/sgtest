<?php

/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 16:28
 */
class Blog_Controller extends Controller
{


    /**
     *Формируем главную страницу Блога/ по умолчанию
     */
    function index()
    {
        $blog = new Blog;
        $comments = $blog->getCommentsByIdPost(10);
        $this->view->generate('blog_view.php', SiteSettings::LAYOUT_FILE . '.php', $comments);
    }

    /**
     *Обрабатываем ajax запрос на добавление/редактирование комментария
     */
    function ajax()
    {

        $text = $_POST['text'];
        $post_id = $_POST['post_id'];
        $parent_id = $_POST['parent_id'];
        $author_id = $_POST['author_id'] ? $_POST['author_id'] : null;
        $comment = new Blog();

        echo $comment->createComment($text, $post_id, $parent_id, $author_id);
    }

    /**
     *Обрабатываем ajax запрос на удаление
     */
    function ajax_delete()
    {

        $comment_id = $_POST['comment_id'];
        $comment = new Blog();

        echo $comment->deleteComment($comment_id);
    }

    /**
     *Обрабатываем ajax запрос на удаление
     */
    function ajax_update()
    {
        $text = $_POST['text'];
        $parent_id = $_POST['parent_id'];
        $comment = new Blog();

        echo $comment->updateComment($text, $parent_id);
    }

}