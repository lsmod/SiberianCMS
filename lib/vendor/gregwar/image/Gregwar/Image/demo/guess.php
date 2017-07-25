<?php
<<<<<<< HEAD
require_once('../autoload.php');
=======

require_once '../autoload.php';
>>>>>>> upstream/master

use Gregwar\Image\Image;

Image::open('img/test.png')
    ->resize(100, 100)
    ->negate()
    ->guess(55);
