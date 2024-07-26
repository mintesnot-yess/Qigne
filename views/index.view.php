<?php
include views("partials/header.php");
include views("partials/nav.php");
?>



<main id="main">





    <header class="main_navs">

        <div class="navs">

            <span class="btn" onclick="all_songs()"> New Release </span>
            <span class="ex_btns">
                <button onclick="aside_bar()" class="btn logo  ">
                    <i class="fs-1 fa fa-bars" aria-hidden="true"></i>
                </button>
            </span>





            <a href="/" class="logo">
                <img src="assets/logo_1.png" alt="">
                <span> <?=$web_title?> </span>
            </a>


            <?php if (isset($_SESSION['email'])): ?>
            <div class="dropdown">

                <button onclick="menu()" onblur="menu()" class="avatar">
                    <img src="assets/avatars/<?=$myProfile["image"]?>" alt="">
                </button>

                <div class="menus">
                    <button onclick="openProfile()"> <i class="fa fa-user" aria-hidden="true"></i> <span
                            class="menu_content">Account</span>
                    </button>

                    <a href="/upload">
                        <button onclick="openProfile()"> <i class="fa fa-plus" aria-hidden="true"></i>
                            <span class="menu_content">upload</span>
                        </button>
                    </a>

                    <button onclick="profile_editor()"> <i class="fa-solid fa-gear"></i> <span
                            class="menu_content">setting</span></button>

                    <a href="/?logout">
                        <button type="submit"> <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <span class="menu_content">logout</span></button>
                    </a>
                </div>

            </div>

            <?php else: ?>


            <a href=" login-user" class="p-10 f-1  link login  ">login</a>



            <?php endif?>

        </div>


        <div class="searching_page">
            <form action="">
                <i class="fa fa-search" aria-hidden="true"></i>
                <input oninput="searching(this.value)" type="search" placeholder="search music">
            </form>
        </div>
    </header>



    <div class="divider"></div>
    <!-----   home pages        ---------->
    <div style="animation: play_list_intro .5s;" class="home_view">
        <!--  user_avator         -->
        <div>
            <?php include views("pages/artist_slider.php");?>

        </div>
        <!--  your follower          ------->
        <div>
            <?php include views("pages/following_music.php");?>

        </div>
        <!--   musics     -->
        <div>
            <?php include views("pages/music_slider.php")?>

        </div>
        <!--   New releases     -->
        <?php include views("pages/new_music.php")?>
        <div></div>

    </div>

    <!------   artist page   -------------->
    <div class="artist_page"> </div>
    <div style="display: none;" class="all_artist_page"> </div>

    <!-------  playlist page   -------------->
    <div class="playlist_page"> </div>
    <!---------like_song page   -------------->
    <div class="like_songs"> </div>
    <!--       all songs    -->
    <div style="display: none;" class="playlist_container"></div>
    <!--       my account       --->



    <?php if (isset($_SESSION['email'])): ?>
    <?php include views("pages/user_account.php")?>
    <?php endif?>

    <div class="mb-3"></div>

</main>

<?php include views("pages/user_editor.php");?>

</div>

<?php ?>
<audio onended="next()" src="" id="audio">
</audio>



<?php

include views("partials/footer.php");

?>
