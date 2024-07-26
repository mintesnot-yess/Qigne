<?php include "mini_music_player.php";?>
<aside>


            <ul class="un_aside">
        <a href="/" class="logo" >

                    <img src="assets/logo_1.png" alt="">
                    <span>QIGNET</span>
                </a>


            </ul>



            <ul class="admin">

                <a style="width: 90%;text-decoration:none;" href="admin">
                    <button title="Dashboard" class="side_nav <?php if (isset($activHome)) { echo $activHome;}?>">
                        <i class="fas fa-dashboard"></i>
                        <span>
                            dashboard
                        </span>

                    </button>

                </a>

                <a href="/user_table" style="width: 90%;text-decoration:none;">
                    <button title="user tabele" class="side_nav <?php if (isset($activeUser)) {  echo $activeUser; }?>">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>
                            user table
                        </span>
                    </button>

                </a>

                <a style="width: 90%;text-decoration:none;" href="music_table">
                    <button title="Musics" class="side_nav  <?php if (isset($activeMusic)) { echo $activeMusic; }?>">
                        <i class="fa fa-music" aria-hidden="true"></i>
                        <span>
                            musics
                        </span>
                    </button>
                </a>

            </ul>

            <ul class="admin">

                <a style="width: 90%;text-decoration:none;" href="admin_profile">
                    <button title="Musics" class="side_nav <?php if (isset($activAdmin)) { echo $activAdmin;}?>" onclick="all_songs()">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>
                            Account
                        </span>
                    </button>
                </a>
                <a  style="width: 90%;text-decoration:none;" href="">
                    <button title="log out" class="side_nav" >
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <span>
                            Log Out
                        </span>
                    </button>
                </a>

            </ul>



        </aside>


<div class="player_controll_container">
<audio onended="next()" src="" id="audio">
</audio>


        <button onclick="controll_resize()" class="music_cont_resize"> <i class=" fa fa-angle-down" aria-hidden="true"></i> </button>

        <div class="player_controll">

            <div class="img" style="animation: auto ease 0s 1 normal none running none;">
                <img class="current_music_image" src="assets/albem_arts/OIP (1).jpeg" alt="">

            </div>
            <span class="detail">

                <button onclick="artistPage(this.value,this.value)" class="current_music_artist btn w-fit" value="34">Rophnan</button>

                <div class="current_music_title"> Behon</div>

            </span>


            <div class="controll">



                <button title="Previous" id="previous_play">
                    <i class="fa-solid fa-backward-step"></i> </button>

                <button title="Play" onclick="play_music()" class="play_pause_btn">
                    <i class="fa fa-play" aria-hidden="true"></i>
                </button>

                <button title="next" id="next_play">
                    <i class="fa-solid fa-forward-step"></i> </button>
            </div>

            <div class="time_slider">
                <input oninput="changeDuration()" class="time_changer" max="100" type="range" value="0">

            </div>

            <div class="volumes">
                <span class="vol_changer">

                    <button class="muted_btn">
                        <i class="fa fa-volume-up" aria-hidden="true"></i>
                    </button>

                    <input oninput="volumeChange(this.value)" class="volume_slider" value="50" type="range" max="100">



                </span>


                <span>
                    <button onclick="add_like_song(this.value)" title="like this song " class="current_music_like_btn" value="26">
                        <i class="fa  fa-heart" aria-hidden="true"></i>

                    </button>
                </span>

            </div>

        </div>

    </div>



<main>




<header class="main_navs">

<div class="navs">




                    <span class="ex_btns">
                        <button onclick="aside_bar()" class="btn logo  ">
                            <i class="fs-1 fa fa-bars" aria-hidden="true"></i>
                        </button>
                    </span>
                    
                    



                    <div class="searching_page" style="display: block;flex: 8;">
                        <form  style="height: 40px;" action="search" method="get">
                            <input class="search_admin" type="search" placeholder="search here..." name="search" value="<?php if (isset($_GET['search'])) {
    echo $_GET['search'];
}?>">
                            <button type="submit" style="display:block;" class="btn d-block"> <i class="fa fa-search"
                                    aria-hidden="true"></i>

                            </button>
                        </form>
                    </div>
                    
                   


                   
                    <div class="dropdown">

                        <button onclick="menu()" onblur="menu()" class="avatar">
                            <img src="assets/avatars/<?=$admin['image']?>" alt="">
                        </button>

                        <div class="menus">
                        <a href="admin_profile">
                            <button onclick="openProfile()">
                                 <i class="fa fa-user" aria-hidden="true"></i> 
                                 <span class="menu_content">Account</span>
                            </button>
                         </a>
                             <?php if ($_SESSION['email']): ?>
                         <a href="upload">
                            <button onclick="openProfile()">
                                 <i class="fa fa-plus" aria-hidden="true"></i> 
                                 <span class="menu_content">Upload</span>
                            </button>
                         </a>
                              <?php else: ?>
                        <a href="register-user">
                            <button>
                             <i class="fa fa-plus" aria-hidden="true"></i> 
                                 <span class="menu_content">Upload</span>
                            </button>
                         </a> 
                           <?php endif?>
                            

                          
                            <a href="/?logout">
                                <button type="submit"> <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                 <span class="menu_content">logout</span></button>
                            </a>
                        </div>
                    </div>
                </div>

             <?php if (isset($back)): ?>
            <li>
                <span>
                    <?=$back?>
                </span>
            </li>
            <?php endif?>

     </header>




  
