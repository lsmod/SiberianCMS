<?php
<<<<<<< HEAD
require_once('../autoload.php');
=======

require_once '../autoload.php';
>>>>>>> upstream/master

use Gregwar\Image\Image;

Image::open('img/test.png')
    ->resize('26%')
    ->negate()
    ->save('out.jpg', 'jpg');
