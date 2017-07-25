<?php
<<<<<<< HEAD
require_once('../autoload.php');
=======

require_once '../autoload.php';
>>>>>>> upstream/master

use Gregwar\Image\Image;

Image::open('in.gif')
    ->resize(500, 500)
    ->save('out.png', 'png');
