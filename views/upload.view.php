<?php
include views("partials/header.php");
?>


<div class="upload_file">

    <form method="post" enctype="multipart/form-data">
        <div>
            <span>
                <h1>upload</h1>

            </span>

            <?php
if (isset($error['error'])) {
    echo ' <small>' . $error['error'] . ' </small>';
}
?>

        </div>


        <label <?php if (isset($error['music'])) {
    echo "style='border:dashed 4px red;color:red;'";
}?> oninput="test()" for="music" class="music_upload">





            <i class="fa fa-folder-open" aria-hidden="true"></i>



            <p> choose music file</p>

            <input accept="audio/*" type="file" name="music" id="music">
            <audio class="audio" src=""></audio>

        </label>
        <span style="display: none;" id="test_btn" onclick="played()">


            <img id="test_btn_img" src="../assets/ControlersIcon/play-svgrepo-com.svg" alt="">
        </span>
        <label <?php if (isset($error['artist'])) {
    echo "style='border:solid 1.5px red;'";
}?> for="artist">
            <input type="text" placeholder="Artist" id="artist" value="<?php if (isset($_POST['artist'])) {
    echo $_POST['artist'];
} else {
    echo ucfirst($my_name);
}?>" name="artist">
        </label>
        <label <?php if (isset($error['title'])) {
    echo "style='border:solid 1.5px red;'";
}?> for="title">
            <input placeholder="Title" type="text" id="title" value="<?php if (isset($_POST['title'])) {
    echo $_POST['title'];
}?>" name="title">
        </label>
        <label <?php if (isset($error['albem_art'])) {
    echo "style='border:solid 1.5px red;'";
}?> id="albem" for="albem_art">
            <span id="albem_Image">
                <img src="../assets/ControlersIcon/image.svg" id="albemImage">
                albem art
            </span>

            <input oninput="image_input()" accept="image/*" type="file" id="albem_art" name="albem_art">
        </label>
        <label for="description">
            <textarea placeholder="description(optional)" id="description" name="description"></textarea>
        </label>

        <div class="submit_btns">
            <button onclick="closed()" type="button"> Cancel </button>
            <button name="uploadFile" type="submit"> upload </button>

        </div>

    </form>
</div>



<script>
var audio = document.querySelector('.audio');
var test_btn = document.getElementById('test_btn');
var albemImage = document.getElementById('albemImage');

let tru = false;

function test() {
    audio.src = URL.createObjectURL(music.files[0]);
    test_btn.style.display = 'block';
    played();

}

function image_input() {
    albemImage.src = URL.createObjectURL(albem_art.files[0]);
}

function closed() {
    close();
}

function played() {
    if (tru == false) {
        audio.play()

        test_btn_img.src = '../assets/ControlersIcon/pause-svgrepo-com.svg';


        tru = true;
    } else {
        audio.pause();
        test_btn_img.src = '../assets/ControlersIcon/play-svgrepo-com.svg';
        tru = false;
    }
}
</script>
</body>

</html>
