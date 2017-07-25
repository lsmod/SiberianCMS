<?php
<<<<<<< HEAD
require_once('../autoload.php');
=======

require_once '../autoload.php';
>>>>>>> upstream/master

use Gregwar\Image\Image;

echo Image::open('img/something-wrong.png')
    ->resize(100, 0)
    ->negate()
    ->jpeg()
    ;
