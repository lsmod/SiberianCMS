<?php
<<<<<<< HEAD
require_once('../autoload.php');
=======

require_once '../autoload.php';
>>>>>>> upstream/master

use Gregwar\Image\Image;

Image::open('img/mona.jpg')
    ->cropResize(500, 150)
    ->save('out.jpg');
