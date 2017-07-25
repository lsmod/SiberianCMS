<?php
<<<<<<< HEAD
require_once('../autoload.php');
=======

require_once '../autoload.php';
>>>>>>> upstream/master

use Gregwar\Image\Image;

$image = Image::open('img/test.png')
    ->resize(100, 100)
    ->negate()
    ->get('jpeg');

echo $image;
