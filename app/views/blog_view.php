<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 16:29
 */
?>
<div class="post_section"><span class="bottom"></span>

    <h2>Aliquam lorem ante dapibus in viverra </h2>

    <strong>Date:</strong> 25 August 2048 | <strong>Author:</strong> Michael

    <img src="images/templatemo_image_01.jpg" alt="image 1"/>

    <p>Validate <a href="" rel="nofollow">XHTML</a> &amp; <a href="" rel="nofollow">CSS</a>. Phasellus mattis tellus eu
        risus consequat id hendrerit ipsum molestie. Morbi quis lorem tellus. Curabitur vitae risus sem. Mauris
        venenatis quam non nunc convallis tincidunt. Aliquam tempus neque nec nisl pellentesque nec dignissim lorem
        cursus. Integer cursus ultrices massa non vehicula. </p>
    <p>Etiam vitae lacus eu arcu rutrum fermentum. Nullam fringilla imperdiet magna, id sagittis nisl feugiat at. Donec
        eget lacus eros, et blandit odio. Maecenas et urna vitae sapien dictum dapibus. Aliquam id sem metus. Aenean
        sapien felis, congue porttitor elementum quis, pretium sit amet urna. Curabitur libero sapien, sollicitudin in
        pellentesque id, auctor id nisl.</p>
    <div class="cleaner"></div>
    <div class="category">Category: <a href="#">Freebies</a>, <a href="#">Templates</a></div>
    <div class="cleaner"></div>

    <div class="comment_tab">
        5 Comments
    </div>
    <div id="comment_section">
        <?php if (isset($data) && !empty($data)) { ?>
            <ol class="comments first_level">
                <?php
                $id_first_parent = null;
                $id_second_parent = null;
                foreach ($data as $row) {

                    if ($row['created_at'] == $row['updated_at']) {
                        $dateYearMonthDay = date('Y-m-d', strtotime($row['created_at']));
                        $dayHoursMinute = date('H:i', strtotime($row['created_at']));
                    } else {
                        $dateYearMonthDay = date('Y-m-d', strtotime($row['updated_at']));
                        $dayHoursMinute = date('H:i', strtotime($row['updated_at']));
                    };
                    $comment = '<div class="comment_text"  >
                                                    <div class="comment_author">' . $row['email'] . '<span
                                                            class="date">' . $dateYearMonthDay . '</span><span
                                                            class="time">' . $dayHoursMinute . '</span></div>
                                                    <p>' . $row['text'] . '</p>
                                                    <div class="reply"><a href="#comment_form" class="reply_button" id="' . $row['comm_id'] . '">Reply</a></div>
                                                ';

                    if ($_SESSION['id'] == $row['author_id']) {
                        $comment .= '<div class="edit"><a href="#comment_form" class="edit_button" id="' . $row['comm_id'] . '" >Edit</a></div><div class="drop"><a  class="drop_button" id="' . $row['comm_id'] . '">Drop</a></div>';
                    };
                    $comment .= '</div>';
                    if ($row['parent_id']) { ?>
                        <li comment_id='<?php echo $row['comm_id'] ?>'>
                            <ol class="comments">
                                <?php
                                if ($id_second_parent == $row['parent_id']) { ?>
                                    <ol class="comments">

                                        <li>
                                            <div class="comment_box commentbox1">

                                                <div class="gravatar">
                                                    <img src="images/avator1.png" alt="author 3"/>
                                                </div>
                                                <?php echo $comment ?>

                                                <div class="cleaner"></div>
                                            </div>


                                        </li>

                                    </ol>
                                <?php } else { ?>
                                    <div class="comment_box commentbox2">

                                        <div class="gravatar">
                                            <img src="images/avator2.png" alt="author 2"/>
                                        </div>
                                        <?php echo $comment ?>

                                        <div class="cleaner"></div>
                                    </div>
                                <?php } ?>
                            </ol>

                        </li>
                        <?php $id_second_parent = $row['comm_id'];
                    } else {
                        ?>

                        <li comment_id='<?php echo $row['comm_id'] ?>'>
                            <div class="comment_box commentbox1">

                                <div class="gravatar">
                                    <img src="images/avator1.png" alt="author 1"/>
                                </div>

                                <?php echo $comment ?>
                                <div class="cleaner"></div>
                            </div>

                        </li>
                        <?php

                    }
                    $id_first_parent = $row['comm_id'];
                } ?>
            </ol>
        <?php }
        ?>
    </div>

    <?php if ($_SESSION['id']) { ?>
        <div id="comment_form">
            <h3>Leave A Comment</h3>
            <div></div>
            <form id="add_comment_form" action="#" method="post">
                <div class="form_row">
                    <label>Your comment</label><br/>
                    <textarea name="comment" id="text" rows="" cols=""></textarea>
                    <input type="hidden" id="commment_id" value="">
                    <input type="hidden" id="reply_id" value="">
                </div>

                <input type="submit" id="name" name="Submit" value="Submit" class="submit_btn"/>
            </form>

        </div>
    <?php } else { ?>
        <h3>Чтобы оставлять комментарии, пожалуйста, Войдите в свою учетную запись или Зарегистрируйтесь</h3>
    <?php } ?>
</div>
<script src="/js/jquery.min.js"></script>
<script type="text/javascript">

    $("#add_comment_form").submit(function (e) {
        var text = $('#text').val();
        var author_id = <?php echo $_SESSION['id']?>;
        var parent_id = $("input#commment_id").val();

        if ($("input#commment_id").val() && !$("input#reply_id").val()) {
            var url = 'blog/ajax_update';
        } else {
            var url = 'blog/ajax';
        }
        $.ajax({
            type: "POST",
            url: url,
            data: "text=" + text + "&post_id=" + 10 + "&parent_id=" + parent_id + "&author_id=" + author_id,
            success: function (data) {
                if ($("input#reply_id").val()) {
                    $("li[comment_id=" + reply_id + "]").append(data)
                    alert("Прибыли данные1: " + data);
                } else if ($("input#commment_id").val()) {
                    alert("Прибыли данные2: " + data);
                    $("li[comment_id=" + parent_id + "] .comment_text p").html(text);
                } else {
                    alert("Прибыли данные3: " + data);
                    $('.first_level').append(data);
                }


            }
        });
        return false;
    });
    $(".reply_button").click(function (e) {

        var comment_id = event.target.id;

        $("input#reply_id").val(comment_id);
        $("input#commment_id").val(comment_id);
    });
    $(".drop_button").click(function (e) {
        var comment_id = event.target.id;
        $.ajax({
            type: "POST",
            url: "/blog/ajax_delete",
            data: "comment_id=" + comment_id,
            success: function () {
                $("li[comment_id=" + comment_id + "]").remove();
            }
        });
    });
    $(".edit_button").click(function (e) {
        var comment_id = event.target.id;

        $("textarea[name='comment']").val($("li[comment_id=" + comment_id + "] .comment_text p").html());

        $("input#commment_id").val(comment_id);

    });
</script>