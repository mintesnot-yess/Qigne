<?php

$database = new Database;

if (isset($_SESSION['admin'])) {

    $admin_ = $database->query('select * from admin_ where email = :email', ['email' => $_SESSION['admin']])->fetchAll();

    foreach ($admin_ as $admin) {
    }

    $back = '<a class="m-2" href="admin"> Home </a> ';

    $all_admins = $database->query('select * from admin_')->fetchAll();
    if (isset($_POST['deleted_admin'])) {

        $database->query('delete from admin_ where id = :id', ['id' => $_POST['admin_id']]);
        header("location:admin_profile");
    }

    if (isset($_POST['edit_admin'])) {
        if (empty($_POST['name'])) {
            $error['edit_name'] = 'name is require';
        } else {
            if (empty($_POST['email'])) {
                $error['edit_email'] = 'email is requer';
            } else {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $id = $_POST['id'];

                $query = " UPDATE `admin_` SET `name`= :name ,`email`= :email  WHERE `id`= :id";

                if ($database->query($query, [
                    'name' => $name, 'email' => $email, 'id' => $id,
                ])) {

                    $_SESSION['admin'] = $email;
                    header("location:admin_profile#table");
                }
            }
        }
    }

    if (isset($_POST['change_password'])) {

        if (empty($_POST['old_password'])) {
            $error['old_password'] = ' old password is require';
        } else {
            if (password_verify($_POST['old_password'], $admin['password'])) {
                if (empty($_POST['password_conformation'])) {
                    $error['password_conformation'] = 'password is require';
                } else {
                    if ($_POST['new_password'] === $_POST['password_conformation']) {
                        if (password_verify($_POST['old_password'], $admin['password'])) {

                            $changed = $database->query("UPDATE `admin_` SET `password`= :password WHERE `id`= :id", [
                                'password' => password_hash($_POST['new_password'], PASSWORD_BCRYPT),
                                'id' => $admin['id'],
                            ]);

                            if ($changed) {
                                header("location:/admin_profile");
                                exit();
                            }
                        } else {
                            $error['old_password'] = 'incorrect password';
                        }
                    } else {
                        $error['new_password'] = 'its not match password_conformation';
                        $error['password_conformation'] = 'its not match new_password';
                    }
                }
            } else {
                $error['old_password'] = ' incorrect password';
            }
        }
    }





    
    if (isset($_POST['add_admin'])) {
        
   $email_used =  $database->query('select * from admin_ where email = :email',['email'=> $_POST['email']])->fetchAll();
    if($email_used[0]){
       $error['error'] = 'this email is already used';
    }else{
        
        if (empty($_POST['name'])) {
            $error['error'] = 'name is require';
        } else {
            if (empty($_POST['email'])) {
                $error['error'] = 'email is requer';
            } else {
                if (empty($_POST['password'])) {
                    $error['error'] = 'password is require';
                } else {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    if ($database->query("INSERT INTO admin_ (name,email,password) VALUES(:name,:email,:password)", [
                        'name' => $name,
                        'email' => $email,
                        'password' => password_hash($password, PASSWORD_BCRYPT),
                    ])) {
                        header("location:admin_profile#table");
                    }
                }
            }
        }
    }
    }

    $activAdmin = 'active';
    include views("admin/pages/admin_detail.php");
} else {
    header("location:admin_login");
}
