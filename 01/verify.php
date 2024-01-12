<?php
    session_start();
    $_SESSION['rand'] = str_pad(rand(0,9999),4,'0', STR_PAD_LEFT);
    header("content-type:image-png");
    $img = imagecreate(50,25);
    imagecolorallocate($img, 245, 245, 245);
    imagestring($img, 8, 7, 5, $_SESSION['rand'], imagecolorallocate($img, 0, 0, 0));
    imagepng($img);
?>