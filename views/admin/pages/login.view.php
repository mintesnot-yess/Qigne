 <?php include views("/admin/partials/header.php")?>


 
 
 <div class="auth_form_container">

    <form role="form" method="post" method="post">
        <span class="text_error" id="error">
        
        
             <?php if (isset($error)) {
    echo $error;
}?>
                    </span>


        <label for="email">
            <span>
                <i class="fa-regular fa-envelope"></i>
                <p>email id</p>
            </span>

            <input type="text" name="email" id="email" required  value="<?php if (isset($_POST['email'])) {
    echo $_POST['email'];
}?>">
        </label>
        <label for="password">
            <span>
                <i class="fa fa-key" aria-hidden="true"> </i>
                <p>password</p>

            </span>

            <input type="password" name="password" id="password" value="<?php if (isset($_POST['password'])) {
    echo $_POST['password'];
}?>" required="">
        </label>

        <button name="login" type="submit">login</button>
     


    </form>


    <script>
    </script>

</div>
 
 

 <?php include views("admin/partials/footer.php");?>
