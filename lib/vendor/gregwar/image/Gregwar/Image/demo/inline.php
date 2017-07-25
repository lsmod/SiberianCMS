<?php
<<<<<<< HEAD
require_once('../autoload.php');
=======
require_once '../autoload.php';
>>>>>>> upstream/master

use Gregwar\Image\Image;

?>
<img src="<?php echo Image::open('img/test.png')->resize('50%')->inline() ?>" />
