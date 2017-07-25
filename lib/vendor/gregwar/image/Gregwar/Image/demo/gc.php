<?php
<<<<<<< HEAD
require_once('../autoload.php');
=======

require_once '../autoload.php';
>>>>>>> upstream/master

use Gregwar\Image\GarbageCollect;

GarbageCollect::dropOldFiles(__DIR__.'/cache', 5, true);
