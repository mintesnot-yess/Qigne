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


        <label for="email">
            <span>
                <i class="fa-regular fa-envelope"></i>
                <p>email id</p>
            </span>

            <input type="text" name="email" id="email" required>
        </label>
        <label for="password">
            <span>
                <i class="fa fa-key" aria-hidden="true"> </i>
                <p>password</p>

            </span>

            <input type="password" name="password" id="password" required>
        </label>

        <button name="submit" type="submit">login</button>
        <span>
            <p>
                you don`t have an account? <a href="/register-user">SGIN-UP</a>
            </p>
        </span>


    </form>


  

</div>


</body>

</html>
