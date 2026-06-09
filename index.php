<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>NEXUS Photo Booth</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>

body{
    overflow:hidden;
}

.blob{
    position:absolute;
    border-radius:50%;
    filter:blur(120px);
    opacity:.4;
}

</style>

</head>

<body class="bg-slate-950 text-white">

<div class="blob w-96 h-96 bg-purple-600 top-0 left-0"></div>
<div class="blob w-96 h-96 bg-blue-600 bottom-0 right-0"></div>

<div class="h-screen flex items-center justify-center">

    <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-3xl p-12 text-center w-[600px]">

        <h1 class="text-6xl font-bold mb-4">
            NEXUS PHOTO BOOTH
        </h1>

        <p class="text-xl text-gray-300 mb-8">
            Capture • Connect • Share
        </p>

        <a href="camera.php"
           class="inline-block px-10 py-4 bg-purple-600 hover:bg-purple-700 rounded-2xl text-xl font-semibold transition">

            Start Now

        </a>

    </div>

</div>

</body>
</html>