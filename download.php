<?php

$file = $_GET['file'] ?? '';

if(!$file){
    die('Photo not found');
}

$imageUrl = "uploads/" . $file;

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Download Photo</title>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-slate-950 min-h-screen flex items-center justify-center text-white">

<div class="max-w-5xl w-full px-6">

    <div class="bg-slate-900 rounded-3xl p-8 shadow-2xl">

        <h1 class="text-4xl font-bold text-center mb-2">
            Photo Captured!
        </h1>

        <p class="text-center text-slate-400 mb-8">
            Scan the QR Code to download your photo
        </p>

        <div class="grid md:grid-cols-2 gap-8 items-center">

            <!-- Photo Preview -->
            <div>

                <img
                    src="<?= $imageUrl ?>"
                    class="rounded-2xl shadow-lg w-full">

            </div>

            <!-- QR Code -->
            <div class="text-center">

                <div
                    id="qrcode"
                    class="bg-white p-4 inline-block rounded-2xl">
                </div>

                <p class="mt-6 text-slate-300">
                    Scan this QR Code
                </p>

                <a
                    href="<?= $imageUrl ?>"
                    download
                    class="inline-block mt-6 bg-purple-600 hover:bg-purple-700 px-6 py-3 rounded-xl">

                    Download Directly

                </a>

                <div class="mt-8">

                    Returning Home In

                    <span
                        id="timer"
                        class="font-bold text-purple-400">
                        30
                    </span>

                    seconds

                </div>

            </div>

        </div>

    </div>

</div>

<script>

const photoUrl =
window.location.origin +
'/nexus-booth/<?= $imageUrl ?>';

new QRCode(
document.getElementById("qrcode"),
{
    text: photoUrl,
    width: 250,
    height: 250
});

let seconds = 30;

const timer =
document.getElementById('timer');

const interval =
setInterval(()=>{

    seconds--;

    timer.innerHTML = seconds;

    if(seconds <= 0){

        clearInterval(interval);

        window.location = 'index.php';

    }

},1000);

</script>

</body>
</html>