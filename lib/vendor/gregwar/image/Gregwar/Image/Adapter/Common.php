<?php

namespace Gregwar\Image\Adapter;

abstract class Common extends Adapter
{
    /**
<<<<<<< HEAD
     * @inheritdoc
=======
     * {@inheritdoc}
>>>>>>> upstream/master
     */
    public function zoomCrop($width, $height, $background = 'transparent', $xPosLetter = 'center', $yPosLetter = 'center')
    {
        // Calculate the different ratios
        $originalRatio = $this->width() / $this->height();
        $newRatio = $width / $height;

        // Compare ratios
        if ($originalRatio > $newRatio) {
            // Original image is wider
            $newHeight = $height;
            $newWidth = (int) $height * $originalRatio;
        } else {
            // Equal width or smaller
            $newHeight = (int) $width / $originalRatio;
            $newWidth = $width;
        }

        // Perform resize
        $this->resize($newWidth, $newHeight, $background, true);

        // Define x position
<<<<<<< HEAD
        switch($xPosLetter) {
=======
        switch ($xPosLetter) {
>>>>>>> upstream/master
            case 'L':
            case 'left':
                $xPos = 0;
                break;
            case 'R':
            case 'right':
                $xPos = (int) $newWidth - $width;
                break;
            default:
                $xPos = (int) ($newWidth - $width) / 2;
        }

        // Define y position
<<<<<<< HEAD
        switch($yPosLetter) {
=======
        switch ($yPosLetter) {
>>>>>>> upstream/master
            case 'T':
            case 'top':
                $yPos = 0;
                break;
            case 'B':
            case 'bottom':
                $yPos = (int) $newHeight - $height;
                break;
            default:
                $yPos = (int) ($newHeight - $height) / 2;
        }

        // Crop image to reach desired size
        $this->crop($xPos, $yPos, $width, $height);

<<<<<<< HEAD
		return $this;
=======
        return $this;
>>>>>>> upstream/master
    }

    /**
     * Resizes the image forcing the destination to have exactly the
<<<<<<< HEAD
     * given width and the height
     *
     * @param int $w the width
     * @param int $h the height
=======
     * given width and the height.
     *
     * @param int $w  the width
     * @param int $h  the height
>>>>>>> upstream/master
     * @param int $bg the background
     */
    public function forceResize($width = null, $height = null, $background = 'transparent')
    {
        return $this->resize($width, $height, $background, true);
    }

    /**
<<<<<<< HEAD
     * @inheritdoc
     */
    public function scaleResize($width = null, $height = null, $background='transparent', $crop = false)
=======
     * {@inheritdoc}
     */
    public function scaleResize($width = null, $height = null, $background = 'transparent', $crop = false)
>>>>>>> upstream/master
    {
        return $this->resize($width, $height, $background, false, true, $crop);
    }

    /**
<<<<<<< HEAD
     * @inheritdoc
     */
    public function cropResize($width = null, $height = null, $background='transparent')
=======
     * {@inheritdoc}
     */
    public function cropResize($width = null, $height = null, $background = 'transparent')
>>>>>>> upstream/master
    {
        return $this->resize($width, $height, $background, false, false, true);
    }

    /**
<<<<<<< HEAD
     * Fix orientation using Exif informations
     */
    public function fixOrientation()
    {
=======
     * Fix orientation using Exif informations.
     */
    public function fixOrientation()
    {
        if (!in_array(exif_imagetype($this->source->getInfos()), array(IMAGETYPE_JPEG, IMAGETYPE_TIFF_II, IMAGETYPE_TIFF_MM))) {
            return $this;
        }

>>>>>>> upstream/master
        if (!extension_loaded('exif')) {
            throw new \RuntimeException('You need to EXIF PHP Extension to use this function');
        }

<<<<<<< HEAD
        $exif = exif_read_data($this->source->getInfos());
        
        if(!array_key_exists('Orientation', $exif)) {
            return $this;
        }

        switch($exif['Orientation']) {
=======
        $exif = @exif_read_data($this->source->getInfos());

        if ($exif === false || !array_key_exists('Orientation', $exif)) {
            return $this;
        }

        switch ($exif['Orientation']) {
>>>>>>> upstream/master
            case 1:
                break;

            case 2:
                $this->flip(false, true);
                break;

            case 3: // 180 rotate left
                $this->rotate(180);
                break;

            case 4: // vertical flip
                $this->flip(true, false);
                break;
<<<<<<< HEAD
                   
=======

>>>>>>> upstream/master
            case 5: // vertical flip + 90 rotate right
                $this->flip(true, false);
                $this->rotate(-90);
                break;
<<<<<<< HEAD
                   
            case 6: // 90 rotate right
                $this->rotate(-90);
                break;
                   
            case 7: // horizontal flip + 90 rotate right
                $this->flip(false, true);   
                $this->rotate(-90);
                break;
                   
=======

            case 6: // 90 rotate right
                $this->rotate(-90);
                break;

            case 7: // horizontal flip + 90 rotate right
                $this->flip(false, true);
                $this->rotate(-90);
                break;

>>>>>>> upstream/master
            case 8: // 90 rotate left
                $this->rotate(90);
                break;
        }
<<<<<<< HEAD
=======

>>>>>>> upstream/master
        return $this;
    }

    /**
<<<<<<< HEAD
     * Opens the image
     */
    abstract protected function openGif($file);
    abstract protected function openJpeg($file);
    abstract protected function openPng($file);

    /**
     * Creates an image
=======
     * Opens the image.
     */
    abstract protected function openGif($file);

    abstract protected function openJpeg($file);

    abstract protected function openPng($file);

    /**
     * Creates an image.
>>>>>>> upstream/master
     */
    abstract protected function createImage($width, $height);

    /**
<<<<<<< HEAD
     * Creating an image using $data
=======
     * Creating an image using $data.
>>>>>>> upstream/master
     */
    abstract protected function createImageFromData($data);

    /**
<<<<<<< HEAD
     * Loading image from $resource
=======
     * Loading image from $resource.
>>>>>>> upstream/master
     */
    protected function loadResource($resource)
    {
        $this->resource = $resource;
    }

    protected function loadFile($file, $type)
    {
        if (!$this->supports($type)) {
            throw new \RuntimeException('Type '.$type.' is not supported by GD');
        }

        if ($type == 'jpeg') {
            $this->openJpeg($file);
        }

        if ($type == 'gif') {
            $this->openGif($file);
        }

        if ($type == 'png') {
            $this->openPng($file);
        }

        if (false === $this->resource) {
            throw new \UnexpectedValueException('Unable to open file ('.$file.')');
        } else {
            $this->convertToTrueColor();
        }
    }

    /**
<<<<<<< HEAD
     * @inheritdoc
=======
     * {@inheritdoc}
>>>>>>> upstream/master
     */
    public function init()
    {
        $source = $this->source;

        if ($source instanceof \Gregwar\Image\Source\File) {
            $this->loadFile($source->getFile(), $source->guessType());
<<<<<<< HEAD
        } else if ($source instanceof \Gregwar\Image\Source\Create) {
            $this->createImage($source->getWidth(), $source->getHeight());
        } else if ($source instanceof \Gregwar\Image\Source\Data) {
            $this->createImageFromData($source->getData());
        } else if ($source instanceof \Gregwar\Image\Source\Resource) {
=======
        } elseif ($source instanceof \Gregwar\Image\Source\Create) {
            $this->createImage($source->getWidth(), $source->getHeight());
        } elseif ($source instanceof \Gregwar\Image\Source\Data) {
            $this->createImageFromData($source->getData());
        } elseif ($source instanceof \Gregwar\Image\Source\Resource) {
>>>>>>> upstream/master
            $this->loadResource($source->getResource());
        } else {
            throw new \Exception('Unsupported image source type '.get_class($source));
        }

        return $this;
    }
<<<<<<< HEAD

    /**
     * @inheritdoc
=======
    
    /**
     * {@inheritdoc}
     */
    public function deinit()
    {
        $this->resource = null;
    }

    /**
     * {@inheritdoc}
>>>>>>> upstream/master
     */
    public function resize($width = null, $height = null, $background = 'transparent', $force = false, $rescale = false, $crop = false)
    {
        $current_width = $this->width();
        $current_height = $this->height();
<<<<<<< HEAD
		$new_width = 0;
		$new_height = 0;
        $scale = 1.0;

        if ($height === null && preg_match('#^(.+)%$#mUsi', $width, $matches)) {
            $width = round($current_width * ((float)$matches[1]/100.0));
            $height = round($current_height * ((float)$matches[1]/100.0));
        }

        if (!$rescale && (!$force || $crop)) {
            if ($width!=null && $current_width>$width) {
                $scale = $current_width/$width;
            }

            if ($height!=null && $current_height>$height) {
                if ($current_height/$height > $scale)
                    $scale = $current_height/$height;
            }
        } else {
            if ($width!=null) {
                $scale = $current_width/$width;
                $new_width = $width;
            }

            if ($height!=null) {
                if ($width!=null && $rescale) {
                    $scale = max($scale,$current_height/$height);
                } else {
                    $scale = $current_height/$height;
=======
        $new_width = 0;
        $new_height = 0;
        $scale = 1.0;

        if ($height === null && preg_match('#^(.+)%$#mUsi', $width, $matches)) {
            $width = round($current_width * ((float) $matches[1] / 100.0));
            $height = round($current_height * ((float) $matches[1] / 100.0));
        }

        if (!$rescale && (!$force || $crop)) {
            if ($width != null && $current_width > $width) {
                $scale = $current_width / $width;
            }

            if ($height != null && $current_height > $height) {
                if ($current_height / $height > $scale) {
                    $scale = $current_height / $height;
                }
            }
        } else {
            if ($width != null) {
                $scale = $current_width / $width;
                $new_width = $width;
            }

            if ($height != null) {
                if ($width != null && $rescale) {
                    $scale = max($scale, $current_height / $height);
                } else {
                    $scale = $current_height / $height;
>>>>>>> upstream/master
                }
                $new_height = $height;
            }
        }

<<<<<<< HEAD
        if (!$force || $width==null || $rescale) {
            $new_width = round($current_width/$scale);
        }

        if (!$force || $height==null || $rescale) {
            $new_height = round($current_height/$scale);
=======
        if (!$force || $width == null || $rescale) {
            $new_width = round($current_width / $scale);
        }

        if (!$force || $height == null || $rescale) {
            $new_height = round($current_height / $scale);
>>>>>>> upstream/master
        }

        if ($width == null || $crop) {
            $width = $new_width;
        }

        if ($height == null || $crop) {
            $height = $new_height;
        }

        $this->doResize($background, $width, $height, $new_width, $new_height);
    }

    /**
<<<<<<< HEAD
     * Trim background color arround the image
     *
     * @param int $bg the background
     */
    protected function _trimColor($background='transparent')
=======
     * Trim background color arround the image.
     *
     * @param int $bg the background
     */
    protected function _trimColor($background = 'transparent')
>>>>>>> upstream/master
    {
        $width = $this->width();
        $height = $this->height();

        $b_top = 0;
        $b_lft = 0;
        $b_btm = $height - 1;
        $b_rt = $width - 1;

        //top
<<<<<<< HEAD
        for(; $b_top < $height; ++$b_top) {
            for($x = 0; $x < $width; ++$x) {
=======
        for (; $b_top < $height; ++$b_top) {
            for ($x = 0; $x < $width; ++$x) {
>>>>>>> upstream/master
                if ($this->getColor($x, $b_top) != $background) {
                    break 2;
                }
            }
        }

        // bottom
<<<<<<< HEAD
        for(; $b_btm >= 0; --$b_btm) {
            for($x = 0; $x < $width; ++$x) {
=======
        for (; $b_btm >= 0; --$b_btm) {
            for ($x = 0; $x < $width; ++$x) {
>>>>>>> upstream/master
                if ($this->getColor($x, $b_btm) != $background) {
                    break 2;
                }
            }
        }

        // left
<<<<<<< HEAD
        for(; $b_lft < $width; ++$b_lft) {
            for($y = $b_top; $y <= $b_btm; ++$y) {
=======
        for (; $b_lft < $width; ++$b_lft) {
            for ($y = $b_top; $y <= $b_btm; ++$y) {
>>>>>>> upstream/master
                if ($this->getColor($b_lft, $y) != $background) {
                    break 2;
                }
            }
        }
<<<<<<< HEAD
    
        // right
        for(; $b_rt >= 0; --$b_rt) {
            for($y = $b_top; $y <= $b_btm; ++$y) {
=======

        // right
        for (; $b_rt >= 0; --$b_rt) {
            for ($y = $b_top; $y <= $b_btm; ++$y) {
>>>>>>> upstream/master
                if ($this->getColor($b_rt, $y) != $background) {
                    break 2;
                }
            }
        }
<<<<<<< HEAD
    
        $b_btm++;
        $b_rt++;
                
=======

        ++$b_btm;
        ++$b_rt;

>>>>>>> upstream/master
        $this->crop($b_lft, $b_top, $b_rt - $b_lft, $b_btm - $b_top);
    }

    /**
     * Resizes the image to an image having size of $target_width, $target_height, using
<<<<<<< HEAD
     * $new_width and $new_height and padding with $bg color
=======
     * $new_width and $new_height and padding with $bg color.
>>>>>>> upstream/master
     */
    abstract protected function doResize($bg, $target_width, $target_height, $new_width, $new_height);

    /**
<<<<<<< HEAD
     * Gets the color of the $x, $y pixel
     */
    abstract protected function getColor($x, $y);

	/**
	 * @inheritdoc
	 */
	public function enableProgressive(){
		throw new \Exception('The Adapter '.$this->getName().' does not support Progressive Image loading');
	}
=======
     * Gets the color of the $x, $y pixel.
     */
    abstract protected function getColor($x, $y);

    /**
     * {@inheritdoc}
     */
    public function enableProgressive()
    {
        throw new \Exception('The Adapter '.$this->getName().' does not support Progressive Image loading');
    }
>>>>>>> upstream/master
}
