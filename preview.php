<?php

$frame = $_GET['frame'] ?? 'nexus';

?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">

<title>NEXUS Booth</title>

<script src="https://cdn.tailwindcss.com"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<style>

body{
    background:#020617;
}

#camera-container{
    position:relative;
    width:720px;
    height:540px;
}

video{
    width:100%;
    height:100%;
    object-fit:cover;
    border-radius:24px;
}

#frame{
    position:absolute;
    inset:0;
    width:100%;
    height:100%;
    pointer-events:none;
}

#countdown{
    position:absolute;
    inset:0;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:150px;
    font-weight:bold;
    color:white;
    text-shadow:0 0 30px black;
    z-index:99;
}

.flash{
    animation:flash .3s;
}

@keyframes flash{
    0%{
        background:white;
    }

    100%{
        background:transparent;
    }
}

</style>

</head>

<body class="text-white min-h-screen flex items-center justify-center">

<div class="text-center">

<h1 class="text-4xl font-bold mb-8">
NEXUS PHOTO BOOTH
</h1>

<div id="capture-area">

    <div id="camera-container">

        <video
            id="video"
            autoplay
            playsinline>
        </video>

        <img
            id="frame"
            src="frames/<?php echo $frame; ?>.png">

        <div id="countdown"></div>

    </div>

</div>

<div class="mt-8">

<button
    id="captureBtn"
    class="bg-purple-600 hover:bg-purple-700 px-8 py-4 rounded-2xl text-xl">

Capture Photo

</button>

</div>

</div>

<script>

const video = document.getElementById('video');

navigator.mediaDevices
.getUserMedia({
    video:true
})
.then(stream=>{
    video.srcObject = stream;
});

document
.getElementById('captureBtn')
.addEventListener('click',startCountdown);

function startCountdown(){

    let counter = 3;

    const countdown =
    document.getElementById('countdown');

    countdown.innerHTML = counter;

    let interval = setInterval(()=>{

        counter--;

        if(counter > 0){

            countdown.innerHTML = counter;

        }
        else{

            clearInterval(interval);

            countdown.innerHTML='📸';

            setTimeout(()=>{

                countdown.innerHTML='';

                capturePhoto();

            },500);
        }

    },1000);

}

function capturePhoto(){

    document.body.classList.add('flash');

    setTimeout(()=>{
        document.body.classList.remove('flash');
    },300);

    html2canvas(
        document.getElementById('capture-area')
    ).then(canvas=>{

        let image =
        canvas.toDataURL('image/png');

        fetch(
            'save.php',
            {
                method:'POST',
                body:image
            }
        )
        .then(response=>response.text())
        .then(filename=>{

            window.location =
            'download.php?file='+filename;

        });

    });

}

</script>

</body>
</html>