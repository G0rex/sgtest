<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 17:17
 */

?>

<form action="/auth/login" style="border:1px solid #ccc">


    <div class="container">
        <h1>Sign In</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>
        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>


        <label>
            <input type="checkbox" checked="checked"> Remember me
        </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
        <button type="submit">Login</button>
    </div>
</form>