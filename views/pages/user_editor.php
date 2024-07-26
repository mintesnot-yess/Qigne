 <?php

if (isset($_SESSION['email'])):
?>
 <div class="editor_container">

     <div class="edit_content">

         <div class="header">
             <button onclick="profile_editor()">
                 <i class="fa-solid fa-xmark"></i> </button>


             <h1>
                 Setting
             </h1>
         </div>

         <ul>



             <form method="post" action="/update" class="image_edit" enctype="multipart/form-data">


                 <label for="profile_image">
                     <div class="dropBox"></div>
                     <img src="assets/avatars/<?=$myProfile["image"]?>" class="profile_image_pre" alt="profile image">

                     <i class="fa fa-camera" aria-hidden="true"></i>
                     <input name="artist_image" oninput="checked_image(this)" style="display: none;" type="file"
                         id="profile_image" accept="image/*">
                 </label>

                 <input type="hidden" value="<?=$myProfile['id']?>" name="user_id">

                 <input type="submit" name="image_update" value="change" class="btn border_focu img_changeer_btn">
             </form>


             <li onclick="account_info_editor()">

                 <span>

                     <i class="fa fa-user" aria-hidden="true"></i>
                     Account Information
                 </span>
                 <i class="fa fa-angle-right" aria-hidden="true"></i>
             </li>

             <div class="account_info">
                 <div class="form_container ">
                     <span class="account_error">

                     </span>

                     <input type="text" placeholder="<?=$myProfile['name']?>" id="user_name">
                     <input type="email" name="email" id="user_email" placeholder="<?=$myProfile['email']?>">
                     <button onclick="change_account()">
                         confirm
                     </button>
                 </div>
             </div>







             <li onclick="change_password_editor()">
                 <span>

                     <i class="fa fa-key" aria-hidden="true"></i>
                     change your password
                 </span>
                 <i class="fa fa-angle-right" aria-hidden="true"></i>
             </li>

             <div class="change_password">


                 <div class="form_container ">

                     <span class="pass_error">

                     </span>

                     <input type="text" name="old_password" placeholder="old password" id="old_password">
                     <input type="text" name="new_password" placeholder="new password" id="new_password">
                     <input type="text" name="confirm_password" placeholder="confirm_password" id="confirm_password">

                     <button onclick="change_passwords()">
                         change
                     </button>
                 </div>

             </div>

             <li onclick="change_theme_editor()">
                 <span>

                     <i class="fa-solid fa-palette"></i>Theme </span>
                 <i class="fa fa-angle-right" aria-hidden="true"></i>
             </li>
             <div class="change_theme">


                 <div class="form_container ">

                     <label for="dark_mode" class="themes">
                         <span> Dark mode</span> <input id="dark_mode" onclick=" dark_mode()" type="button" checked>
                     </label>





                 </div>

             </div>


         </ul>
     </div>






 </div>

 <?php endif?>