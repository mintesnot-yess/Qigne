<style>
    body {
        margin: 0;
    }

    .container {
        width: 100%;
        height: 100vh;
        background: linear-gradient(to left, #2b6d94b3, blue);
        display: flex;
        justify-content: space-between;
    }

    .container .image_loader {
        width: 50%;
        height: 100vh;
        background: #000;
    }

    .container .card_text {
        width: 50%;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4.5em;
        color: transparent;
        font-family: sans-serif;
        -webkit-text-stroke: 2px black;
    }

    .card_text a {
        color: blue;
        text-transform: capitalize;
    }
</style>

<div class="container">
    <div class="image_loader">

    </div>
    <div class="card_text">
        <span> page is not found <a href="/">back home</a></span>

    </div>
</div>