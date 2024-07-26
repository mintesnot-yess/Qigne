<?php include views("admin/partials/header.php");?>
<?php include views("admin/partials/nav.php");?>




<div class="table_container  ">
    <div class="details">
        <div class="bg_image" style="background-image: url('assets/bg.png');"> </div>
        <div class="img">
            <img src="assets/avatars/<?=$admin['image']?>" alt="profile_image">
        </div>
        <div class="detail_cont"></div>
        <h1 class="pro_text">Admin detai</h1>
        <div class="pro_info">

            <h1>Name: <span>
                    <?=$admin['name']?>

                </span></h1>
            <h1>Email: <span> <?=$admin['email']?> </span></h1>
            <?php if ($admin['admin_num'] === 1): ?>

            <h1>Admin :<span>

                    <?php
$usemusic_nums = $database->query('SELECT COUNT(id) FROM admin_ ');

foreach ($usemusic_nums as $music_nums): ?>
                    <?php if ($music_nums['COUNT(id)'] == 0): ?>

                    <?php else: ?>
                    <?=$music_nums['COUNT(id)'];?>

                    <?php endif?>

                    <?php endforeach?>
                </span>
            </h1>

            <?php endif?>
            <?php if (isset($_GET['edit_profile'])): ?>
            <form method="post" enctype="multipart/form-data" class="text-start">
                <p>
                    <?php

if (isset($error['edit_name'])) {
    echo $error['edit_name'];
}
?>

                <p>
                    <?php

if (isset($error['edit_email'])) {
    echo $error['edit_email'];
}
?>
                </p>
                </p>

                <input type="text" name="name" id="name" placeholder="Admin Name" value="<?=$admin['name']?>"
                    class="form-control">
                <input type="hidden" name="id" id="id" value="<?=$admin['id']?>">
        </div>




        <input type="email" name="email" id="email" placeholder="Email" value="<?=$admin['email']?>"
            class="form-control">

        <a href="admin_profile?change_password">

            <button type="button" name="edit_admin" class="btn bg-gradient-white w-100 my-1 mb-2">
                change password
            </button>

        </a>
        <button type="submit" name="edit_admin" class="btn bg-gradient-success w-100 my-1 mb-2">
            change
        </button>

        <a href="/admin_profile">
            <button type="button" class="btn bg-gradient-danger w-100 my-1 mb-2 m-1">
                cancel
            </button>
        </a>


        </form>
        <?php else: ?>
        <a style="width: fit-content;" href="admin_profile?edit_profile">

            <button title="edit profile" type="button" class="btn bg-gradient-info ">
                Edit
            </button>
        </a>

        <?php endif?>
        <?php if (isset($_GET['change_password'])): ?>
        <form method="post" enctype="class=" text-start">

            <p class="text-red text-xs" style="color:red; ">
                <?php

if (isset($error['old_password'])) {
    echo $error['old_password'];
}
?>
            </p>


            <input type="password" name="old_password" id="old_password" placeholder="old password" value="<?php if (isset($_POST['old_password'])) {
    echo $_POST['old_password'];
}?>" class="form-control">



            <p class="text-red text-xs" style="color:red; ">
                <?php

if (isset($error['new_password'])) {
    echo $error['new_password'];
}
?>
            </p>


            <input type="password" name="new_password" id="new_password" placeholder="new password" value="<?php if (isset($_POST['new_password'])) {
    echo $_POST['new_password'];
}?>" class="form-control">


            <p class="text-red text-xs" style="color:red; ">
                <?php
if (isset($error['password_conformation'])) {
    echo $error['password_conformation'];
}
?>
            </p>


            <input type="password" name="password_conformation" id="password_conformation"
                placeholder="password conformation" value="<?php if (isset($_POST['password_conformation'])) {
    echo $_POST['password_conformation'];
}?>" class="form-control">
            <p class="text-red text-xs" style="color:red; ">
                <?php
if (isset($error['edit_password'])) {
    echo $error['edit_password'];
}
?>
            </p>


            <label class="checkbox">
                <input onchange="
                             document.getElementById('password_conformation').type = 'text'
                              document.getElementById('new_password').type ='text'
                             document.getElementById('old_password').type = 'text'" ; type="checkbox">
                show
            </label>


            <div class="d-flex flex-row align-items-center">
                <button type="submit" name="change_password" class="btn bg-gradient-success w-100 my-1 mb-2">
                    Change
                </button>

                <a href="/admin_profile?edit_profile">
                    <button type="button" class="btn bg-gradient-danger w-100 my-1 mb-2 m-1">
                        cancel
                    </button>
                </a>


        </form>

        <?php endif;?>

    </div>

</div>

<?php if ($admin['admin'] === 1): ?>

<div class="table_container user_table">
    <header>
        <h3>admin table</h3>

    </header>

    <table>

        <thead>
            <tr>
                <th>Admins</th>
            </tr>
        </thead>

        <tbody>

            <?php
foreach ($all_admins as $all_admin):
    if ($all_admin['id'] != $admin['id']):
    ?>
	            <tr>
	                <td>
	                    <div class="contents">
	                        <img class="user-img" src="assets/avatars/<?=$all_admin['image']?>" alt="user1"> <span>
	                            <a>
	                                <?=$all_admin['name']?>
	                            </a>
	                            <p>
	                                <?=$all_admin['email']?>
	                            </p>
	                        </span>
	                    </div>
	                </td>

	                <td>
	                    <form method="post" title="delete this admin">
	                        <input type="hidden" name="admin_id" value="<?=$all_admin['id']?>">
	                        <button name="deleted_admin" class=" btn badge badge-sm bg-gradient-danger">Delete</button>
	                    </form>
	                </td>
	            </tr>

	            <?php endif?>


            <?php endforeach?>
            <?php endif?>
        </tbody>

        <?php if ($admin['admin'] === 1): ?>

        <?php if (isset($_GET['add_admin'])): ?>




        <?php if ($admin['id'] == 1): ?>

        <?php if (isset($_GET['add_admin'])): ?>


        <form method="post" enctype="multipart/form-data" role="form" class="text-start">
            <p class="text-red text-xs" style="color:red; ">
                <?php

if (isset($error['error'])) {
    echo $error['error'];
}
?>
            </p>


            <input type="text" name="name" id="name" placeholder="Admin Name" value="<?php if (isset($_POST['name'])) {
    echo $_POST['name'];
}?>" class="form-control">
            <p class="text-red text-xs" style="color:red; ">
                <?php

if (isset($error['email'])) {
    echo $error['email'];
}
?>
            </p>


            <input type="email" name="email" id="email" placeholder="Email" value="<?php if (isset($_POST['email'])) {
    echo $_POST['email'];
}?>" class="form-control">

            <p class="text-red text-xs" style="color:red; ">
                <?php if (isset($error['password'])) {
    echo $error['password'];
}
?>
            </p>


            <input type="password" name="password" id="password" placeholder="password" value="<?php if (isset($_POST['password'])) {
    echo $_POST['password'];
}?>" class="form-control">


            <button type="submit" name="add_admin" id="add_btn" class="btn bg-gradient-success w-100 my-4 mb-2">
                sign up
            </button>
            <a href="/admin_profile">
                <button type="button" class="btn bg-gradient-danger w-100 my-4 mb-2 m-1">
                    cancel
                </button>
            </a>

        </form>



        <?php else: ?>
        <a style="width: fit-content;" href="admin_profile?add_admin#add_btn">

            <button title="edit profile" type="button" class="btn bg-gradient-success ">
                add admin
            </button>
        </a>
        <?php endif?>


</div>

<?php endif?>





<?php else: ?>
<a style="width: fit-content;" href="admin_profile?add_admin#add_btn">

    <button title="edit profile" type="button" class="btn bg-gradient-success ">
        add admin
    </button>
</a>
<?php endif?>


</div>

<?php endif?>
</table>

</div>
</div>

<?php include views("admin/partials/footer.php");?>