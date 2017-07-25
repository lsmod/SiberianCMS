<?php

namespace Gregwar\Image;

<<<<<<< HEAD
=======
use Gregwar\Cache\CacheInterface;
>>>>>>> upstream/master
use Gregwar\Image\Adapter\AdapterInterface;
use Gregwar\Image\Exceptions\GenerationError;

/**
<<<<<<< HEAD
 * Images handling class
=======
 * Images handling class.
>>>>>>> upstream/master
 *
 * @author Gregwar <g.passault@gmail.com>
 *
 * @method Image saveGif($file)
 * @method Image savePng($file)
 * @method Image saveJpeg($file, $quality)
<<<<<<< HEAD
=======
 * @method Image resize($width = null, $height = null, $background = 'transparent', $force = false, $rescale = false, $crop = false)
 * @method Image forceResize($width = null, $height = null, $background = 'transparent')
 * @method Image scaleResize($width = null, $height = null, $background = 'transparent', $crop = false)
>>>>>>> upstream/master
 * @method Image cropResize($width = null, $height = null, $background=0xffffff)
 * @method Image scale($width = null, $height = null, $background=0xffffff, $crop = false)
 * @method Image ($width = null, $height = null, $background = 0xffffff, $force = false, $rescale = false, $crop = false)
 * @method Image crop($x, $y, $width, $height)
 * @method Image enableProgressive()
 * @method Image force($width = null, $height = null, $background = 0xffffff)
<<<<<<< HEAD
 * @method Image zoomCrop($width, $height, $background = 0xffffff)
=======
 * @method Image zoomCrop($width, $height, $background = 0xffffff, $xPos, $yPos)
>>>>>>> upstream/master
 * @method Image fillBackground($background = 0xffffff)
 * @method Image negate()
 * @method Image brightness($brightness)
 * @method Image contrast($contrast)
 * @method Image grayscale()
 * @method Image emboss()
 * @method Image smooth($p)
 * @method Image sharp()
 * @method Image edge()
 * @method Image colorize($red, $green, $blue)
 * @method Image sepia()
 * @method Image merge(Image $other, $x = 0, $y = 0, $width = null, $height = null)
 * @method Image rotate($angle, $background = 0xffffff)
 * @method Image fill($color = 0xffffff, $x = 0, $y = 0)
 * @method Image write($font, $text, $x = 0, $y = 0, $size = 12, $angle = 0, $color = 0x000000, $align = 'left')
 * @method Image rectangle($x1, $y1, $x2, $y2, $color, $filled = false)
 * @method Image roundedRectangle($x1, $y1, $x2, $y2, $radius, $color, $filled = false)
 * @method Image line($x1, $y1, $x2, $y2, $color = 0x000000)
 * @method Image ellipse($cx, $cy, $width, $height, $color = 0x000000, $filled = false)
 * @method Image circle($cx, $cy, $r, $color = 0x000000, $filled = false)
 * @method Image polygon(array $points, $color, $filled = false)
 * @method Image flip($flipVertical, $flipHorizontal)
 */
class Image
{
    /**
<<<<<<< HEAD
     * Directory to use for file caching
=======
     * Directory to use for file caching.
>>>>>>> upstream/master
     */
    protected $cacheDir = 'cache/images';

    /**
<<<<<<< HEAD
     * Directory cache mode
=======
     * Directory cache mode.
>>>>>>> upstream/master
     */
    protected $cacheMode = null;

    /**
<<<<<<< HEAD
     * Internal adapter
	 *
	 * @var AdapterInterface
=======
     * Internal adapter.
     *
     * @var AdapterInterface
>>>>>>> upstream/master
     */
    protected $adapter = null;

    /**
<<<<<<< HEAD
     * Pretty name for the image
=======
     * Pretty name for the image.
>>>>>>> upstream/master
     */
    protected $prettyName = '';
    protected $prettyPrefix;

    /**
<<<<<<< HEAD
     * Transformations hash
=======
     * Transformations hash.
>>>>>>> upstream/master
     */
    protected $hash = null;

    /**
<<<<<<< HEAD
     * The image source
=======
     * The image source.
>>>>>>> upstream/master
     */
    protected $source = null;

    /**
<<<<<<< HEAD
     * Force image caching, even if there is no operation applied
=======
     * Force image caching, even if there is no operation applied.
>>>>>>> upstream/master
     */
    protected $forceCache = true;

    /**
<<<<<<< HEAD
     * Supported types
=======
     * Supported types.
>>>>>>> upstream/master
     */
    public static $types = array(
        'jpg'   => 'jpeg',
        'jpeg'  => 'jpeg',
        'png'   => 'png',
        'gif'   => 'gif',
    );

    /**
<<<<<<< HEAD
     * Fallback image
=======
     * Fallback image.
>>>>>>> upstream/master
     */
    protected $fallback;

    /**
<<<<<<< HEAD
     * Use fallback image
=======
     * Use fallback image.
>>>>>>> upstream/master
     */
    protected $useFallbackImage = true;

    /**
<<<<<<< HEAD
     * Cache system
=======
     * Cache system.
     *
     * @var \Gregwar\Cache\CacheInterface
>>>>>>> upstream/master
     */
    protected $cache;

    /**
<<<<<<< HEAD
     * Change the caching directory
     */
    public function setCacheDir($cacheDir)
    {
        $this->cache->setCacheDirectory($cacheDir);
=======
     * Get the cache system.
     *
     * @return \Gregwar\Cache\CacheInterface
     */
    public function getCacheSystem()
    {
        if (is_null($this->cache)) {
            $this->cache = new \Gregwar\Cache\Cache();
            $this->cache->setCacheDirectory($this->cacheDir);
        }

        return $this->cache;
    }

    /**
     * Set the cache system.
     *
     * @param \Gregwar\Cache\CacheInterface $cache
     */
    public function setCacheSystem(CacheInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     * Change the caching directory.
     */
    public function setCacheDir($cacheDir)
    {
        $this->getCacheSystem()->setCacheDirectory($cacheDir);
>>>>>>> upstream/master

        return $this;
    }

    /**
     * @param int $dirMode
     */
    public function setCacheDirMode($dirMode)
    {
        $this->cache->setDirectoryMode($dirMode);
    }

    /**
<<<<<<< HEAD
     * Enable or disable to force cache even if the file is unchanged
=======
     * Enable or disable to force cache even if the file is unchanged.
>>>>>>> upstream/master
     */
    public function setForceCache($forceCache = true)
    {
        $this->forceCache = $forceCache;

        return $this;
    }

    /**
<<<<<<< HEAD
     * The actual cache dir
     */
    public function setActualCacheDir($actualCacheDir)
    {
        $this->cache->setActualCacheDirectory($actualCacheDir);
=======
     * The actual cache dir.
     */
    public function setActualCacheDir($actualCacheDir)
    {
        $this->getCacheSystem()->setActualCacheDirectory($actualCacheDir);
>>>>>>> upstream/master

        return $this;
    }

    /**
<<<<<<< HEAD
     * Sets the pretty name of the image
=======
     * Sets the pretty name of the image.
>>>>>>> upstream/master
     */
    public function setPrettyName($name, $prefix = true)
    {
        if (empty($name)) {
            return $this;
        }

        $this->prettyName = $this->urlize($name);
        $this->prettyPrefix = $prefix;

        return $this;
    }

    /**
<<<<<<< HEAD
     * Urlizes the prettyName
=======
     * Urlizes the prettyName.
>>>>>>> upstream/master
     */
    protected function urlize($name)
    {
        $transliterator = '\Behat\Transliterator\Transliterator';

        if (class_exists($transliterator)) {
            $name = $transliterator::transliterate($name);
            $name = $transliterator::urlize($name);
        } else {
            $name = strtolower($name);
            $name = str_replace(' ', '-', $name);
            $name = preg_replace('/([^a-z0-9\-]+)/m', '', $name);
        }

        return $name;
    }

    /**
<<<<<<< HEAD
     * Operations array
=======
     * Operations array.
>>>>>>> upstream/master
     */
    protected $operations = array();

    public function __construct($originalFile = null, $width = null, $height = null)
    {
<<<<<<< HEAD
        $this->cache = new \Gregwar\Cache\Cache;
        $this->cache->setCacheDirectory($this->cacheDir);

=======
>>>>>>> upstream/master
        $this->setFallback(null);

        if ($originalFile) {
            $this->source = new Source\File($originalFile);
        } else {
            $this->source = new Source\Create($width, $height);
        }
    }

    /**
<<<<<<< HEAD
     * Sets the image data
=======
     * Sets the image data.
>>>>>>> upstream/master
     */
    public function setData($data)
    {
        $this->source = new Source\Data($data);
    }

    /**
<<<<<<< HEAD
     * Sets the resource
=======
     * Sets the resource.
>>>>>>> upstream/master
     */
    public function setResource($resource)
    {
        $this->source = new Source\Resource($resource);
    }

    /**
<<<<<<< HEAD
     * Use the fallback image or not
=======
     * Use the fallback image or not.
>>>>>>> upstream/master
     */
    public function useFallback($useFallbackImage = true)
    {
        $this->useFallbackImage = $useFallbackImage;

        return $this;
    }

    /**
<<<<<<< HEAD
     * Sets the fallback image to use
=======
     * Sets the fallback image to use.
>>>>>>> upstream/master
     */
    public function setFallback($fallback = null)
    {
        if ($fallback === null) {
<<<<<<< HEAD
            $this->fallback = __DIR__ . '/images/error.jpg';
=======
            $this->fallback = __DIR__.'/images/error.jpg';
>>>>>>> upstream/master
        } else {
            $this->fallback = $fallback;
        }

        return $this;
    }

    /**
<<<<<<< HEAD
     * Gets the fallack image path
=======
     * Gets the fallack image path.
>>>>>>> upstream/master
     */
    public function getFallback()
    {
        return $this->fallback;
    }

    /**
<<<<<<< HEAD
     * Gets the fallback into the cache dir
=======
     * Gets the fallback into the cache dir.
>>>>>>> upstream/master
     */
    public function getCacheFallback()
    {
        $fallback = $this->fallback;

<<<<<<< HEAD
        return $this->cache->getOrCreateFile('fallback.jpg', array(), function($target) use ($fallback) {
=======
        return $this->getCacheSystem()->getOrCreateFile('fallback.jpg', array(), function ($target) use ($fallback) {
>>>>>>> upstream/master
            copy($fallback, $target);
        });
    }

<<<<<<< HEAD
	/**
	 * @return AdapterInterface
	 */
	public function getAdapter()
=======
    /**
     * @return AdapterInterface
     */
    public function getAdapter()
>>>>>>> upstream/master
    {
        if (null === $this->adapter) {
            // Defaults to GD
            $this->setAdapter('gd');
        }

        return $this->adapter;
    }

    public function setAdapter($adapter)
    {
        if ($adapter instanceof Adapter\Adapter) {
            $this->adapter = $adapter;
        } else {
            if (is_string($adapter)) {
                $adapter = strtolower($adapter);

                switch ($adapter) {
                case 'gd':
                    $this->adapter = new Adapter\GD();
                    break;
                case 'imagemagick':
                case 'imagick':
                    $this->adapter = new Adapter\Imagick();
                    break;
                default:
                    throw new \Exception('Unknown adapter: '.$adapter);
                    break;
                }
            } else {
                throw new \Exception('Unable to load the given adapter (not string or Adapter)');
            }
        }

        $this->adapter->setSource($this->source);
    }

    /**
<<<<<<< HEAD
     * Get the file path
     *
     * @return mixed a string with the filen name, null if the image
     *         does not depends on a file
=======
     * Get the file path.
     *
     * @return mixed a string with the filen name, null if the image
     *               does not depends on a file
>>>>>>> upstream/master
     */
    public function getFilePath()
    {
        if ($this->source instanceof Source\File) {
            return $this->source->getFile();
        } else {
<<<<<<< HEAD
            return null;
=======
            return;
>>>>>>> upstream/master
        }
    }

    /**
<<<<<<< HEAD
     * Defines the file only after instantiation
=======
     * Defines the file only after instantiation.
>>>>>>> upstream/master
     *
     * @param string $originalFile the file path
     */
    public function fromFile($originalFile)
    {
        $this->source = new Source\File($originalFile);

        return $this;
    }

    /**
<<<<<<< HEAD
     * Tells if the image is correct
=======
     * Tells if the image is correct.
>>>>>>> upstream/master
     */
    public function correct()
    {
        return $this->source->correct();
    }

    /**
<<<<<<< HEAD
     * Guess the file type
=======
     * Guess the file type.
>>>>>>> upstream/master
     */
    public function guessType()
    {
        return $this->source->guessType();
    }

    /**
<<<<<<< HEAD
     * Adds an operation
=======
     * Adds an operation.
>>>>>>> upstream/master
     */
    protected function addOperation($method, $args)
    {
        $this->operations[] = array($method, $args);
    }

    /**
<<<<<<< HEAD
     * Generic function
=======
     * Generic function.
>>>>>>> upstream/master
     */
    public function __call($methodName, $args)
    {
        $adapter = $this->getAdapter();
        $reflection = new \ReflectionClass(get_class($adapter));

        if ($reflection->hasMethod($methodName)) {
            $method = $reflection->getMethod($methodName);

            if ($method->getNumberOfRequiredParameters() > count($args)) {
                throw new \InvalidArgumentException('Not enough arguments given for '.$methodName);
            }

            $this->addOperation($methodName, $args);

            return $this;
        }

        throw new \BadFunctionCallException('Invalid method: '.$methodName);
    }

    /**
<<<<<<< HEAD
     * Serialization of operations
=======
     * Serialization of operations.
>>>>>>> upstream/master
     */
    public function serializeOperations()
    {
        $datas = array();

        foreach ($this->operations as $operation) {
            $method = $operation[0];
            $args = $operation[1];

            foreach ($args as &$arg) {
                if ($arg instanceof self) {
                    $arg = $arg->getHash();
                }
            }

            $datas[] = array($method, $args);
        }

        return serialize($datas);
    }

    /**
<<<<<<< HEAD
     * Generates the hash
=======
     * Generates the hash.
>>>>>>> upstream/master
     */
    public function generateHash($type = 'guess', $quality = 80)
    {
        $inputInfos = $this->source->getInfos();

        $datas = array(
            $inputInfos,
            $this->serializeOperations(),
            $type,
<<<<<<< HEAD
            $quality
=======
            $quality,
>>>>>>> upstream/master
        );

        $this->hash = sha1(serialize($datas));
    }

    /**
<<<<<<< HEAD
     * Gets the hash
=======
     * Gets the hash.
>>>>>>> upstream/master
     */
    public function getHash($type = 'guess', $quality = 80)
    {
        if (null === $this->hash) {
            $this->generateHash($type, $quality);
        }

        return $this->hash;
    }

    /**
     * Gets the cache file name and generate it if it does not exists.
     * Note that if it exists, all the image computation process will
     * not be done.
     *
<<<<<<< HEAD
     * @param string $type the image type
     * @param int $quality the quality (for JPEG)
=======
     * @param string $type    the image type
     * @param int    $quality the quality (for JPEG)
>>>>>>> upstream/master
     */
    public function cacheFile($type = 'jpg', $quality = 80, $actual = false)
    {
        if ($type == 'guess') {
            $type = $this->guessType();
        }

        if (!count($this->operations) && $type == $this->guessType() && !$this->forceCache) {
            return $this->getFilename($this->getFilePath());
        }

        // Computes the hash
        $this->hash = $this->getHash($type, $quality);

        // Generates the cache file
        $cacheFile = '';

        if (!$this->prettyName || $this->prettyPrefix) {
            $cacheFile .= $this->hash;
        }

        if ($this->prettyPrefix) {
            $cacheFile .= '-';
        }

        if ($this->prettyName) {
            $cacheFile .= $this->prettyName;
        }

        $cacheFile .= '.'.$type;

        // If the files does not exists, save it
        $image = $this;

        // Target file should be younger than all the current image
        // dependencies
        $conditions = array(
<<<<<<< HEAD
            'younger-than' => $this->getDependencies()
        );

        // The generating function
        $generate = function($target) use ($image, $type, $quality) {
=======
            'younger-than' => $this->getDependencies(),
        );

        // The generating function
        $generate = function ($target) use ($image, $type, $quality) {
>>>>>>> upstream/master
            $result = $image->save($target, $type, $quality);

            if ($result != $target) {
                throw new GenerationError($result);
            }
        };

        // Asking the cache for the cacheFile
        try {
<<<<<<< HEAD
            $file = $this->cache->getOrCreateFile($cacheFile, $conditions, $generate, $actual);
=======
            $file = $this->getCacheSystem()->getOrCreateFile($cacheFile, $conditions, $generate, $actual);
>>>>>>> upstream/master
        } catch (GenerationError $e) {
            $file = $e->getNewFile();
        }

<<<<<<< HEAD
=======
        // Nulling the resource
        $this->getAdapter()->setSource(new Source\File($file));
        $this->getAdapter()->deinit();

>>>>>>> upstream/master
        if ($actual) {
            return $file;
        } else {
            return $this->getFilename($file);
        }
    }

    /**
<<<<<<< HEAD
     * Get cache data (to render the image)
     *
     * @param string $type the image type
     * @param int $quality the quality (for JPEG)
=======
     * Get cache data (to render the image).
     *
     * @param string $type    the image type
     * @param int    $quality the quality (for JPEG)
>>>>>>> upstream/master
     */
    public function cacheData($type = 'jpg', $quality = 80)
    {
        return file_get_contents($this->cacheFile($type, $quality));
    }

    /**
<<<<<<< HEAD
     * Hook to helps to extends and enhance this class
=======
     * Hook to helps to extends and enhance this class.
>>>>>>> upstream/master
     */
    protected function getFilename($filename)
    {
        return $filename;
    }

    /**
<<<<<<< HEAD
     * Generates and output a jpeg cached file
=======
     * Generates and output a jpeg cached file.
>>>>>>> upstream/master
     */
    public function jpeg($quality = 80)
    {
        return $this->cacheFile('jpg', $quality);
    }

    /**
<<<<<<< HEAD
     * Generates and output a gif cached file
=======
     * Generates and output a gif cached file.
>>>>>>> upstream/master
     */
    public function gif()
    {
        return $this->cacheFile('gif');
    }

    /**
<<<<<<< HEAD
     * Generates and output a png cached file
=======
     * Generates and output a png cached file.
>>>>>>> upstream/master
     */
    public function png()
    {
        return $this->cacheFile('png');
    }

    /**
<<<<<<< HEAD
     * Generates and output an image using the same type as input
=======
     * Generates and output an image using the same type as input.
>>>>>>> upstream/master
     */
    public function guess($quality = 80)
    {
        return $this->cacheFile('guess', $quality);
    }

    /**
<<<<<<< HEAD
     * Get all the files that this image depends on
     *
     * @return string[] this is an array of strings containing all the files that the
     *         current Image depends on
=======
     * Get all the files that this image depends on.
     *
     * @return string[] this is an array of strings containing all the files that the
     *                  current Image depends on
>>>>>>> upstream/master
     */
    public function getDependencies()
    {
        $dependencies = array();

        $file = $this->getFilePath();
        if ($file) {
            $dependencies[] = $file;
        }

        foreach ($this->operations as $operation) {
            foreach ($operation[1] as $argument) {
                if ($argument instanceof self) {
                    $dependencies = array_merge($dependencies, $argument->getDependencies());
                }
            }
        }

        return $dependencies;
    }

    /**
<<<<<<< HEAD
     * Applies the operations
=======
     * Applies the operations.
>>>>>>> upstream/master
     */
    public function applyOperations()
    {
        // Renders the effects
        foreach ($this->operations as $operation) {
            call_user_func_array(array($this->adapter, $operation[0]), $operation[1]);
        }
    }

    /**
<<<<<<< HEAD
     * Initialize the adapter
=======
     * Initialize the adapter.
>>>>>>> upstream/master
     */
    public function init()
    {
        $this->getAdapter()->init();
    }

    /**
<<<<<<< HEAD
     * Save the file to a given output
=======
     * Save the file to a given output.
>>>>>>> upstream/master
     */
    public function save($file, $type = 'guess', $quality = 80)
    {
        if ($file) {
            $directory = dirname($file);

            if (!is_dir($directory)) {
<<<<<<< HEAD
                mkdir($directory, 0777, true);
=======
                @mkdir($directory, 0777, true);
>>>>>>> upstream/master
            }
        }

        if (is_int($type)) {
            $quality = $type;
            $type = 'jpeg';
        }

        if ($type == 'guess') {
            $type = $this->guessType();
        }

        if (!isset(self::$types[$type])) {
            throw new \InvalidArgumentException('Given type ('.$type.') is not valid');
        }

        $type = self::$types[$type];

        try {
            $this->init();
            $this->applyOperations();

            $success = false;

            if (null == $file) {
                ob_start();
            }

            if ($type == 'jpeg') {
                $success = $this->getAdapter()->saveJpeg($file, $quality);
            }

            if ($type == 'gif') {
                $success = $this->getAdapter()->saveGif($file);
            }

            if ($type == 'png') {
                $success = $this->getAdapter()->savePng($file);
            }

            if (!$success) {
                return false;
            }

<<<<<<< HEAD
            return (null === $file ? ob_get_clean() : $file);

        } catch (\Exception $e) {
            if ($this->useFallbackImage) {
                return (null === $file ? file_get_contents($this->fallback) : $this->getCacheFallback());
=======
            return null === $file ? ob_get_clean() : $file;
        } catch (\Exception $e) {
            if ($this->useFallbackImage) {
                return null === $file ? file_get_contents($this->fallback) : $this->getCacheFallback();
>>>>>>> upstream/master
            } else {
                throw $e;
            }
        }
    }

    /**
<<<<<<< HEAD
     * Get the contents of the image
=======
     * Get the contents of the image.
>>>>>>> upstream/master
     */
    public function get($type = 'guess', $quality = 80)
    {
        return $this->save(null, $type, $quality);
    }

    /* Image API */

    /**
<<<<<<< HEAD
     * Image width
=======
     * Image width.
>>>>>>> upstream/master
     */
    public function width()
    {
        return $this->getAdapter()->width();
    }

    /**
<<<<<<< HEAD
     * Image height
=======
     * Image height.
>>>>>>> upstream/master
     */
    public function height()
    {
        return $this->getAdapter()->height();
    }

    /**
<<<<<<< HEAD
     * Tostring defaults to jpeg
=======
     * Tostring defaults to jpeg.
>>>>>>> upstream/master
     */
    public function __toString()
    {
        return $this->guess();
    }

    /**
<<<<<<< HEAD
     * Returning basic html code for this image
     */
    public function html($title = '', $type = 'jpg', $quality = 80)
    {
        return '<img title="' . $title . '" src="' . $this->cacheFile($type, $quality) . '" />';
    }

    /**
     * Returns the Base64 inlinable representation
=======
     * Returning basic html code for this image.
     */
    public function html($title = '', $type = 'jpg', $quality = 80)
    {
        return '<img title="'.$title.'" src="'.$this->cacheFile($type, $quality).'" />';
    }

    /**
     * Returns the Base64 inlinable representation.
>>>>>>> upstream/master
     */
    public function inline($type = 'jpg', $quality = 80)
    {
        $mime = $type;
        if ($mime == 'jpg') {
            $mime = 'jpeg';
        }

        return 'data:image/'.$mime.';base64,'.base64_encode(file_get_contents($this->cacheFile($type, $quality, true)));
    }

    /**
<<<<<<< HEAD
     * Creates an instance, usefull for one-line chaining
=======
     * Creates an instance, usefull for one-line chaining.
>>>>>>> upstream/master
     */
    public static function open($file = '')
    {
        return new static($file);
    }

    /**
<<<<<<< HEAD
     * Creates an instance of a new resource
=======
     * Creates an instance of a new resource.
>>>>>>> upstream/master
     */
    public static function create($width, $height)
    {
        return new static(null, $width, $height);
    }

    /**
<<<<<<< HEAD
     * Creates an instance of image from its data
=======
     * Creates an instance of image from its data.
>>>>>>> upstream/master
     */
    public static function fromData($data)
    {
        $image = new static();
        $image->setData($data);

        return $image;
    }

    /**
<<<<<<< HEAD
     * Creates an instance of image from resource
=======
     * Creates an instance of image from resource.
>>>>>>> upstream/master
     */
    public static function fromResource($resource)
    {
        $image = new static();
        $image->setResource($resource);

        return $image;
    }
}
