<?php

$image = file_get_contents("php://input");

$image = str_replace(
'data:image/png;base64,',
'',
$image
);

$image = str_replace(
' ',
'+',
$image
);

$data = base64_decode($image);

$filename =
'take_'.time().'_'.rand(1000,9999).'.png';

file_put_contents(
'uploads/'.$filename,
$data
);

echo $filename;