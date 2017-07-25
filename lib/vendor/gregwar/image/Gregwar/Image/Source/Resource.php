<?php

namespace Gregwar\Image\Source;

/**
<<<<<<< HEAD
 * Have the image directly in a specific resource
=======
 * Have the image directly in a specific resource.
>>>>>>> upstream/master
 */
class Resource extends Source
{
    protected $resource;

    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    public function getResource()
    {
        return $this->resource;
    }
}
