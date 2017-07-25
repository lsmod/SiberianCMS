<?php

use Gregwar\Image\Image;
<<<<<<< HEAD

use Gregwar\Image\ImageColor;

/**
 * Unit testing for Image
=======
use Gregwar\Image\ImageColor;

/**
 * Unit testing for Image.
>>>>>>> upstream/master
 */
class ImageTests extends \PHPUnit_Framework_TestCase
{
    /**
<<<<<<< HEAD
     * Testing the basic width & height
=======
     * Testing the basic width & height.
>>>>>>> upstream/master
     */
    public function testBasics()
    {
        $image = $this->open('monalisa.jpg');

<<<<<<< HEAD
        $this->assertEquals($image->width(), 771);
        $this->assertEquals($image->height(), 961);
    }

    /**
     * Testing the resize
=======
        $this->assertSame($image->width(), 771);
        $this->assertSame($image->height(), 961);
    }

    /**
     * Testing the resize.
>>>>>>> upstream/master
     */
    public function testResize()
    {
        $image = $this->open('monalisa.jpg');

        $out = $this->output('monalisa_small.jpg');
        $image
            ->resize(300, 200)
            ->save($out)
            ;

        $this->assertTrue(file_exists($out));

        $i = imagecreatefromjpeg($out);
<<<<<<< HEAD
        $this->assertEquals(300, imagesx($i));
        $this->assertEquals(200, imagesy($i));
    }

    /**
     * Testing the resize %
=======
        $this->assertSame(300, imagesx($i));
        $this->assertSame(200, imagesy($i));
    }

    /**
     * Testing the resize %.
>>>>>>> upstream/master
     */
    public function testResizePercent()
    {
        $image = $this->open('monalisa.jpg');

        $out = $this->output('monalisa_small.jpg');
        $image
            ->resize('50%')
            ->save($out)
            ;
<<<<<<< HEAD
        
        $this->assertTrue(file_exists($out));

        $i = imagecreatefromjpeg($out);
        $this->assertEquals(386, imagesx($i));
        $this->assertEquals(481, imagesy($i));
    }

    /**
     * Testing to create an image, jpeg, gif and png
=======

        $this->assertTrue(file_exists($out));

        $i = imagecreatefromjpeg($out);
        $this->assertSame(386, imagesx($i));
        $this->assertSame(481, imagesy($i));
    }

    /**
     * Testing to create an image, jpeg, gif and png.
>>>>>>> upstream/master
     */
    public function testCreateImage()
    {
        $black = $this->output('black.jpg');

        Image::create(150, 200)
            ->fill('black')
            ->save($black, 100);

        $i = imagecreatefromjpeg($black);
        $this->assertTrue(file_exists($black));
<<<<<<< HEAD
        $this->assertEquals(150, imagesx($i));
        $this->assertEquals(200, imagesy($i));

        $j = imagecolorat($i, 40, 40);
        $this->assertEquals(0, $j);
=======
        $this->assertSame(150, imagesx($i));
        $this->assertSame(200, imagesy($i));

        $j = imagecolorat($i, 40, 40);
        $this->assertSame(0, $j);
>>>>>>> upstream/master

        $black = $this->output('black.png');
        Image::create(150, 200)
            ->fill('black')
            ->save($black, 'png');

        $i = imagecreatefrompng($black);
        $this->assertTrue(file_exists($black));
<<<<<<< HEAD
        $this->assertEquals(150, imagesx($i));
        $this->assertEquals(200, imagesy($i));
=======
        $this->assertSame(150, imagesx($i));
        $this->assertSame(200, imagesy($i));
>>>>>>> upstream/master

        $black = $this->output('black.gif');
        Image::create(150, 200)
            ->fill('black')
            ->save($black, 'gif');

        $i = imagecreatefromgif($black);
        $this->assertTrue(file_exists($black));
<<<<<<< HEAD
        $this->assertEquals(150, imagesx($i));
        $this->assertEquals(200, imagesy($i));
    }

    /**
     * Testing type guess
=======
        $this->assertSame(150, imagesx($i));
        $this->assertSame(200, imagesy($i));
    }

    /**
     * Testing type guess.
>>>>>>> upstream/master
     */
    public function testGuess()
    {
        $image = $this->open('monalisa.jpg');
<<<<<<< HEAD
        $this->assertEquals('jpeg', $image->guessType());
        $image = $this->open('monalisa.png');
        $this->assertEquals('png', $image->guessType());
        $image = $this->open('monalisa.gif');
        $this->assertEquals('gif', $image->guessType());
=======
        $this->assertSame('jpeg', $image->guessType());
        $image = $this->open('monalisa.png');
        $this->assertSame('png', $image->guessType());
        $image = $this->open('monalisa.gif');
        $this->assertSame('gif', $image->guessType());
    }

    public function testDefaultCacheSystem()
    {
        $image = $this->open('monalisa.jpg');
        $this->assertInstanceOf('Gregwar\Cache\Cache', $image->getCacheSystem());
    }

    public function testCustomCacheSystem()
    {
        $image = $this->open('monalisa.jpg');
        $cache = $this->getMock('Gregwar\Cache\CacheInterface');
        $image->setCacheSystem($cache);
        $this->assertTrue($image->getCacheSystem() instanceof Gregwar\Cache\CacheInterface);
>>>>>>> upstream/master
    }

    /**
     * Testing that caching an image without operations will result
<<<<<<< HEAD
     * in the original image when force cache is disabled
     */
    public function testNoCache()
    {
        $monalisa = __DIR__ . '/files/monalisa.jpg';
        $image = $this->open('monalisa.jpg')->setForceCache(false);
        $this->assertEquals($monalisa, $image->guess());
        $image = $this->open('monalisa.jpg');
        $this->assertNotEquals($monalisa, $image->guess());
        $image = $this->open('monalisa.jpg')->setForceCache(true);
        $this->assertNotEquals($monalisa, $image->guess());
=======
     * in the original image when force cache is disabled.
     */
    public function testNoCache()
    {
        $monalisa = __DIR__.'/files/monalisa.jpg';
        $image = $this->open('monalisa.jpg')->setForceCache(false);
        $this->assertSame($monalisa, $image->guess());
        $image = $this->open('monalisa.jpg');
        $this->assertNotSame($monalisa, $image->guess());
        $image = $this->open('monalisa.jpg')->setForceCache(true);
        $this->assertNotSame($monalisa, $image->guess());
>>>>>>> upstream/master
    }

    public function testActualCache()
    {
        $output = $this->open('monalisa.jpg')
            ->setCacheDir('/magic/path/to/cache/')
            ->resize(100, 50)->negate()
            ->guess();

        $this->assertContains('/magic/path/to/cache', $output);
        $file = str_replace('/magic/path/to', __DIR__.'/output/', $output);
        $this->assertTrue(file_exists($file));
    }

    public function testCacheData()
    {
        $output = $this->open('monalisa.jpg')
            ->resize(300, 200)
            ->cacheData();

        $jpg = imagecreatefromstring($output);
<<<<<<< HEAD
        $this->assertEquals(300, imagesx($jpg));
        $this->assertEquals(200, imagesy($jpg));
    }

    /**
     * Testing using cache
=======
        $this->assertSame(300, imagesx($jpg));
        $this->assertSame(200, imagesy($jpg));
    }

    /**
     * Testing using cache.
>>>>>>> upstream/master
     */
    public function testCache()
    {
        $output = $this->open('monalisa.jpg')
            ->resize(100, 50)->negate()
            ->guess();

        $this->assertTrue(file_exists($output));
        $i = imagecreatefromjpeg($output);
<<<<<<< HEAD
        $this->assertEquals(100, imagesx($i));
        $this->assertEquals(50, imagesy($i));
=======
        $this->assertSame(100, imagesx($i));
        $this->assertSame(50, imagesy($i));
>>>>>>> upstream/master

        $output2 = $this->open('monalisa.jpg')
            ->resize(100, 50)->negate()
            ->guess();

<<<<<<< HEAD
        $this->assertEquals($output, $output2);
        
=======
        $this->assertSame($output, $output2);

>>>>>>> upstream/master
        $output3 = $this->open('monalisa.jpg')
            ->resize(100, 50)->negate()
            ->png();
        $this->assertTrue(file_exists($output));
        $i = imagecreatefrompng($output3);
<<<<<<< HEAD
        $this->assertEquals(100, imagesx($i));
        $this->assertEquals(50, imagesy($i));
        
=======
        $this->assertSame(100, imagesx($i));
        $this->assertSame(50, imagesy($i));

>>>>>>> upstream/master
        $output4 = $this->open('monalisa.jpg')
            ->resize(100, 50)->negate()
            ->gif();
        $this->assertTrue(file_exists($output));
        $i = imagecreatefromgif($output4);
<<<<<<< HEAD
        $this->assertEquals(100, imagesx($i));
        $this->assertEquals(50, imagesy($i));
    }

    /**
     * Testing creating image from data
     */
    public function testData()
    {
        $data = file_get_contents(__DIR__ . '/files/monalisa.jpg');
=======
        $this->assertSame(100, imagesx($i));
        $this->assertSame(50, imagesy($i));
    }

    /**
     * Testing Gaussian blur filter.
     */
    public function testGaussianBlur()
    {
        $image = $this->open('monalisa.jpg')
            ->gaussianBlur();
        $secondImage = $this->open('monalisa.jpg')
            ->gaussianBlur(5);

        $this->assertTrue(file_exists($image));
        $this->assertTrue(file_exists($secondImage));
    }

    /**
     * Testing creating image from data.
     */
    public function testData()
    {
        $data = file_get_contents(__DIR__.'/files/monalisa.jpg');
>>>>>>> upstream/master

        $output = $this->output('mona.jpg');
        $image = Image::fromData($data);
        $image->save($output);

        $this->assertTrue(file_exists($output));
        $i = imagecreatefromjpeg($output);
<<<<<<< HEAD
        $this->assertEquals(771, imagesx($i));
        $this->assertEquals(961, imagesy($i));
        
    }

    /**
     * Opening an image
     */
    protected function open($file)
    {
        $image = Image::open(__DIR__ . '/files/' . $file);
        $image->setCacheDir(__DIR__.'/output/cache/');
        $image->setActualCacheDir(__DIR__.'/output/cache/');
=======
        $this->assertSame(771, imagesx($i));
        $this->assertSame(961, imagesy($i));
    }

    /**
     * Opening an image.
     */
    protected function open($file)
    {
        $image = Image::open(__DIR__.'/files/'.$file);
        $image->setCacheDir(__DIR__.'/output/cache/');
        $image->setActualCacheDir(__DIR__.'/output/cache/');

>>>>>>> upstream/master
        return $image;
    }

    /**
<<<<<<< HEAD
     * Testing transparent image
=======
     * Testing transparent image.
>>>>>>> upstream/master
     */
    public function testTransparent()
    {
        $gif = $this->output('transparent.gif');
        $i = Image::create(200, 100)
            ->fill('transparent')
            ->save($gif, 'gif');

        $this->assertTrue(file_exists($gif));
        $img = imagecreatefromgif($gif);
<<<<<<< HEAD
        $this->assertEquals(200, imagesx($img));
        $this->assertEquals(100, imagesy($img));
        $index = imagecolorat($img, 2, 2);
        $color = imagecolorsforindex($img, $index);
        $this->assertEquals(127, $color['alpha']);
=======
        $this->assertSame(200, imagesx($img));
        $this->assertSame(100, imagesy($img));
        $index = imagecolorat($img, 2, 2);
        $color = imagecolorsforindex($img, $index);
        $this->assertSame(127, $color['alpha']);
>>>>>>> upstream/master
    }

    public function testNonExistingFile()
    {
        $jpg = $this->output('a.jpg');
        $img = $this->open('non_existing_file.jpg')
            ->negate();
        $error = $img->save($jpg);

        $this->assertTrue(file_exists($error));
    }

    /**
     * * @expectedException              \UnexpectedValueException
     */
    public function testNonExistingFileNoFallback()
    {
        Image::open('non_existing_file.jpg')
            ->useFallback(false)
            ->save($this->output('a.jpg'));
    }

    /**
<<<<<<< HEAD
     * Test that image::save returns the file name
=======
     * Test that image::save returns the file name.
>>>>>>> upstream/master
     */
    public function testSaveReturn()
    {
        $red = $this->output('red.jpg');
        $result = Image::create(10, 10)
            ->fill('red')
            ->save($red);

<<<<<<< HEAD
        $this->assertEquals($red, $result);
    }

    /**
     * Testing merge
=======
        $this->assertSame($red, $result);
    }

    /**
     * Testing merge.
>>>>>>> upstream/master
     */
    public function testMerge()
    {
        $out = $this->output('merge.jpg');
        Image::create(100, 100)
            ->fill('red')
            ->merge(Image::create(50, 50)
                ->fill('black')
            )
            ->save($out);

        // Merge file exists
        $this->assertTrue(file_exists($out));

        // Test that the upper left zone contain a black pixel, and the lower
        // down contains a red one
        $img = imagecreatefromjpeg($out);
        $this->assertColorEquals('black', imagecolorat($img, 5, 12));
        $this->assertColorEquals('red', imagecolorat($img, 55, 62));
    }

    /**
<<<<<<< HEAD
     * Test that dependencies are well generated
     */
    public function testDependencies()
    {
        $this->assertEquals(array(), Image::create(100, 100)
            ->getDependencies());
        $this->assertEquals(array(), Image::create(100, 100)
            ->merge(Image::create(100, 50))
            ->getDependencies());

        $this->assertEquals(array('toto.jpg'), Image::open('toto.jpg')
            ->merge(Image::create(100, 50))
            ->getDependencies());
        
        $this->assertEquals(array('toto.jpg', 'titi.jpg'), Image::open('toto.jpg')
            ->merge(Image::open('titi.jpg'))
            ->getDependencies());
        
        $this->assertEquals(array('toto.jpg', 'titi.jpg', 'tata.jpg'), Image::open('toto.jpg')
=======
     * Test that dependencies are well generated.
     */
    public function testDependencies()
    {
        $this->assertSame(array(), Image::create(100, 100)
            ->getDependencies());
        $this->assertSame(array(), Image::create(100, 100)
            ->merge(Image::create(100, 50))
            ->getDependencies());

        $this->assertSame(array('toto.jpg'), Image::open('toto.jpg')
            ->merge(Image::create(100, 50))
            ->getDependencies());

        $this->assertSame(array('toto.jpg', 'titi.jpg'), Image::open('toto.jpg')
            ->merge(Image::open('titi.jpg'))
            ->getDependencies());

        $this->assertSame(array('toto.jpg', 'titi.jpg', 'tata.jpg'), Image::open('toto.jpg')
>>>>>>> upstream/master
            ->merge(Image::open('titi.jpg')
                    ->merge(Image::open('tata.jpg')))
            ->getDependencies());
    }

    /**
<<<<<<< HEAD
     * Test that pretty name (for referencing) is well respected
=======
     * Test that pretty name (for referencing) is well respected.
>>>>>>> upstream/master
     */
    public function testPrettyName()
    {
        $output = $this->open('monalisa.jpg')
            ->resize(100, 50)->negate()
            ->setPrettyName('davinci', false)
            ->guess();

        $this->assertContains('davinci', $output);
<<<<<<< HEAD
        
=======

>>>>>>> upstream/master
        $output2 = $this->open('monalisa.jpg')
            ->resize(100, 55)->negate()
            ->setPrettyName('davinci', false)
            ->guess();

<<<<<<< HEAD
        $this->assertEquals($output, $output2);
        
=======
        $this->assertSame($output, $output2);

>>>>>>> upstream/master
        $prefix1 = $this->open('monalisa.jpg')
            ->resize(100, 50)->negate()
            ->setPrettyName('davinci')
            ->guess();
        $prefix2 = $this->open('monalisa.jpg')
            ->resize(100, 55)->negate()
            ->setPrettyName('davinci')
            ->guess();

        $this->assertContains('davinci', $prefix1);
        $this->assertContains('davinci', $prefix2);
<<<<<<< HEAD
        $this->assertNotEquals($prefix1, $prefix2);
=======
        $this->assertNotSame($prefix1, $prefix2);
>>>>>>> upstream/master

        $transliterator = '\Behat\Transliterator\Transliterator';

        if (class_exists($transliterator)) {
            $nonLatinName1 = 'ダヴィンチ';
            $nonLatinOutput1 = $this->open('monalisa.jpg')
                ->resize(100, 50)->negate()
                ->setPrettyName($nonLatinName1, false)
                ->guess();

            $this->assertContains(
                $transliterator::urlize($transliterator::transliterate($nonLatinName1)),
                $nonLatinOutput1
            );

            $nonLatinName2 = 'давинчи';
            $nonLatinOutput2 = $this->open('monalisa.jpg')
                ->resize(100, 55)->negate()
                ->setPrettyName($nonLatinName2)
                ->guess();

            $this->assertContains(
                $transliterator::urlize($transliterator::transliterate($nonLatinName2)),
                $nonLatinOutput2
            );
        }
    }

    /**
<<<<<<< HEAD
     * Testing inlining
=======
     * Testing inlining.
>>>>>>> upstream/master
     */
    public function testInline()
    {
        $output = $this->open('monalisa.jpg')
            ->resize(20, 20)
            ->inline();

<<<<<<< HEAD
        $this->assertEquals(0, strpos($output, 'data:image/jpeg;base64,'));
=======
        $this->assertSame(0, strpos($output, 'data:image/jpeg;base64,'));
>>>>>>> upstream/master

        $data = base64_decode(substr($output, 23));
        $image = imagecreatefromstring($data);

<<<<<<< HEAD
        $this->assertEquals(20, imagesx($image));
        $this->assertEquals(20, imagesy($image));
=======
        $this->assertSame(20, imagesx($image));
        $this->assertSame(20, imagesy($image));
    }

    /**
     * Testing that width() can be called after cache
     */
    public function testWidthPostCache()
    {
        $this->open('monalisa.jpg')
            ->resize(100, 50)->negate()
            ->png();
        
        $dummy2 = $this->open('monalisa.jpg')
            ->resize(100, 50)->negate();
        $png = $dummy2->png();

        $i = imagecreatefrompng($png);
        $this->assertEquals(imagesx($i), $dummy2->width());
>>>>>>> upstream/master
    }

    /**
     * Asaserting that two colors are equals
     * (JPG compression is not preserving colors for instance, so we
<<<<<<< HEAD
     * need a non-strict way to compare it)
=======
     * need a non-strict way to compare it).
>>>>>>> upstream/master
     */
    protected function assertColorEquals($c1, $c2, $delta = 8)
    {
        $c1 = ImageColor::parse($c1);
        $c2 = ImageColor::parse($c2);
        list($r1, $g1, $b1) = $this->toRGB($c1);
        list($r2, $g2, $b2) = $this->toRGB($c2);

        $this->assertLessThan($delta, abs($r1 - $r2));
        $this->assertLessThan($delta, abs($g1 - $g2));
        $this->assertLessThan($delta, abs($b1 - $b2));
    }

    protected function toRGB($color)
    {
<<<<<<< HEAD
        $b = $color&0xff;
        $g = ($color>>8)&0xff;
        $r = ($color>>16)&0xff;
=======
        $b = $color & 0xff;
        $g = ($color >> 8) & 0xff;
        $r = ($color >> 16) & 0xff;
>>>>>>> upstream/master

        return array($r, $g, $b);
    }

    /**
<<<<<<< HEAD
     * Outputing an image to a file
     */
    protected function output($file)
    {
        return __DIR__ . '/output/' . $file;
    }

    /**
     * Reinitialize the output dir
=======
     * Outputing an image to a file.
     */
    protected function output($file)
    {
        return __DIR__.'/output/'.$file;
    }

    /**
     * Reinitialize the output dir.
>>>>>>> upstream/master
     */
    public function setUp()
    {
        $dir = $this->output('');
        `rm -rf $dir`;
        mkdir($dir);
        mkdir($this->output('cache'));
    }
}
