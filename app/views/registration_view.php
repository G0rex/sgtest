<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 17:26
 */
?>
<form action="/auth/registration" style="border:1px solid #ccc">
    <div class="container">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

        <label><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label><b>Password</b></label>
        <input type="password" id="first_password" placeholder="Enter Password" name="psw" required>

        <label><b>Repeat Password</b></label>
        <input type="password" id="second_password" placeholder="Repeat Password" name="psw-repeat" required>

        <label>
            <input type="checkbox" checked="checked" style="margin-bottom:15px"> Remember me
        </label>

        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="clearfix">
            <button type="button" class="cancelbtn">Cancel</button>
            <button type="submit" onclick="validate();" class="signupbtn">Sign Up</button>
        </div>
    </div>
</form>
<script  type="text/javascript">
    function validate() {
        var first_password = document.getElementById('first_password').value;
        var second_password = document.getElementById('second_password').value;
        console.log(first_password);
        console.log(second_password);
        if(first_password != second_password){
            alert("Passwords not Identical");
            event.preventDefault();
            return false;
        }





    }

</script>