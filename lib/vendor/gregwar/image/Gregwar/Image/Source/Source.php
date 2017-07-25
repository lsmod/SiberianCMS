<?php

namespace Gregwar\Image\Source;

/**
<<<<<<< HEAD
 * An Image source
=======
 * An Image source.
>>>>>>> upstream/master
 */
class Source
{
    /**
<<<<<<< HEAD
     * Guess the type of the image
=======
     * Guess the type of the image.
>>>>>>> upstream/master
     */
    public function guessType()
    {
        return 'jpeg';
    }

    /**
     * Is this image correct ?
     */
    public function correct()
    {
        return true;
    }

    /**
     * Returns information about images, these informations should
<<<<<<< HEAD
     * change only if the original image changed
     */
    public function getInfos()
    {
        return null;
=======
     * change only if the original image changed.
     */
    public function getInfos()
    {
        return;
>>>>>>> upstream/master
    }
}
