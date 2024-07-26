   <?php
include views("partials/header.php");
?>

   <div class="auth_form_container">

       <form method="post">

           <a href="/">

               <div class="logo">
                   <img src="assets/logo_1.png" alt="">
                   <span>
                       QIGNIT
                   </span>

               </div>


           </a>


           <span class="text_error" id="error">
               <?php if (isset($error['error'])) {
    echo $error['error'];
}?>
           </span>


           <label for="user_name">
               <span>
                   <i class="fa fa-user-circle" aria-hidden="true"> </i>
                   <p>User name</p>
               </span>

               <input type="text" name="name" id="user_name" value="<?php if (isset($_POST['name'])) {
    echo $_POST['name'];
}?>" placeholder="user name" required>


           </label>
           <label for="email">
               <span>
                   <i class="fa-regular fa-envelope"></i>
                   <p>Email Id</p>
               </span>

               <input type="email" id="email" name="email" value="<?php if (isset($_POST['email'])) {
    echo $_POST['email'];
}?>" placeholder="email" required> </label>






           <label for="password">
               <span>
                   <i class="fa fa-key" aria-hidden="true"> </i>
                   <p>password</p>

               </span>

               <input type="password" name="password" id="password" value="<?php if (isset($_POST['password'])) {
    echo $_POST['password'];
}?>" required placeholder="password"> </label>

           <button name="register" type="submit">
               SiGN UP
           </button>
           <span>
               <p>
                   have an account? <a href="/login-user">LOGIN</a>
               </p>
           </span>


       </form>


       <script>
       </script>

   </div>


   </body>

   </html>