<?php
<<<<<<< HEAD
require_once('../autoload.php');
=======

require_once '../autoload.php';
>>>>>>> upstream/master

use Gregwar\Image\Image;

Image::create(300, 300)
    ->fill('rgb(255, 150, 150)')
    ->circle(150, 150, 200, 'red', true)
<<<<<<< HEAD
    ->write('./fonts/CaviarDreams.ttf', "Hello world!", 150, 150, 20, 0, 'white', 'center')
=======
    ->write('./fonts/CaviarDreams.ttf', 'Hello world!', 150, 150, 20, 0, 'white', 'center')
>>>>>>> upstream/master
    ->save('out.jpg', 'jpeg', 95);
