<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 16:29
 */
print_r($data)
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
                      $dateYearMonthDay =  date('Y-m-d', strtotime($row['created_at']));
                    } else {
                      $dateYearMonthDay =  date('Y-m-d', strtotime($row['updated_at']));
                    };
                    if ($row['created_at'] == $row['updated_at']) {
                        $dayHoursMinute = date('H:i', strtotime($row['created_at']));
                    } else {
                        $dayHoursMinute = date('H:i', strtotime($row['updated_at']));
                    }
                    $comment = '<div class="comment_text">
                                                    <div class="comment_author">'.$row['login'].'<span
                                                            class="date">'. $dateYearMonthDay.'</span><span
                                                            class="time">'. $dayHoursMinute .'</span></div>
                                                    <p>'. $row['text'].'</p>
                                                    <div class="reply"><a href="#">Reply</a></div>
                                                </div>';
                     if ($row['parent_id']) { ?>
                        <li>
                            <ol class="comments">
                                <?php
                                if ($id_second_parent == $row['parent_id']) { ?>
                                    <ol class="comments">

                                        <li>
                                            <div class="comment_box commentbox1">

                                                <div class="gravatar">
                                                    <img src="images/avator1.png" alt="author 3"/>
                                                </div>
                                               <?php echo $comment?>

                                                <div class="cleaner"></div>
                                            </div>


                                        </li>

                                    </ol>
                                <?php } else { ?>
                                    <div class="comment_box commentbox2">

                                        <div class="gravatar">
                                            <img src="images/avator2.png" alt="author 2"/>
                                        </div>
                                        <?php echo $comment?>

                                        <div class="cleaner"></div>
                                    </div>
                                <?php } ?>
                            </ol>

                        </li>
                        <?php $id_second_parent = $row['comm_id'];
                    } else {
                        ?>

                        <li>
                            <div class="comment_box commentbox1">

                                <div class="gravatar">
                                    <img src="images/avator1.png" alt="author 1"/>
                                </div>

                                <?php echo $comment?>
                                <div class="cleaner"></div>
                            </div>

                        </li>
                        <?php

                    }
                    ?>
                    <?php
                    $id_first_parent = $row['comm_id'];
                } ?>
            </ol>
        <?php }
        ?>
    </div>


    <div id="comment_form">
        <h3>Leave A Comment</h3>

        <form action="#" method="post">
            <div class="form_row">
                <label>Name ( Required )</label><br/>
                <input type="text" name="name"/>
            </div>
            <div class="form_row">
                <label>Email ( Required, will not be published )</label><br/>
                <input type="text" name="name"/>
            </div>
            <div class="form_row">
                <label>Your comment</label><br/>
                <textarea name="comment" rows="" cols=""></textarea>
            </div>

            <input type="submit" name="Submit" value="Submit" class="submit_btn"/>
        </form>

    </div>

</div>
    
