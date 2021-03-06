<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 16:18
 */
?>
<h1>Contact Information</h1>

<p>Validate <a href="" rel="nofollow">XHTML</a> &amp; <a href="" rel="nofollow">CSS</a>. Suspendisse sed odio ut mi auctor blandit. Duis luctus nulla metus, a vulputate mauris. Integer sed nisi sapien, ut gravida mauris. Nam et tellus libero. Cras purus libero, dapibus nec rutrum in, dapibus nec risus. Ut interdum mi sit amet magna feugiat auctor. </p>

<div class="cleaner_h40"></div>

<div id="contact_form">

    <h2>Quick Contact Form</h2>

    <form method="post" name="contact" action="#">

        <input type="hidden" name="post" value="Send" />
        <label for="author">Name:</label> <input type="text" id="author" name="author" class="required input_field" />
        <div class="cleaner_h10"></div>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" class="validate-email required input_field" />
        <div class="cleaner_h10"></div>


        <label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
        <div class="cleaner_h10"></div>

        <input style="font-weight: bold;" type="submit" class="submit_btn" name="submit" id="submit" value=" Send " />
        <input style="font-weight: bold;" type="reset" class="submit_btn" name="reset" id="reset" value=" Reset " />

    </form>

</div>

<div class="cleaner"></div>
    
