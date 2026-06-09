<!DOCTYPE html>
<html>
<head>

<title>Select Frame</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-slate-950 text-white min-h-screen">

<div class="container mx-auto py-12">

<h1 class="text-5xl text-center font-bold mb-12">
Choose Your Frame
</h1>

<div class="grid grid-cols-2 md:grid-cols-4 gap-8">

<?php

$frames = [
    'nexus',
    'ict',
    'hospitality',
    'event'
];

foreach($frames as $frame){

?>

<a href="preview.php?frame=<?=$frame?>">

<div class="bg-slate-900 rounded-3xl overflow-hidden hover:scale-105 transition">

<img
src="frames/<?=$frame?>.png"
class="w-full h-64 object-cover">

<div class="p-4 text-center text-xl capitalize">

<?=$frame?>

</div>

</div>

</a>

<?php } ?>

</div>

</div>

</body>
</html>