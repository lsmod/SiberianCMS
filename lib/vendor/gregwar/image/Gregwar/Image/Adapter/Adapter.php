<?php

namespace Gregwar\Image\Adapter;

use Gregwar\Image\Source\Source;

/**
<<<<<<< HEAD
 * Base Adapter Implementation to handle Image information
 */
abstract class Adapter implements AdapterInterface
{
	/**
	 * @var Source
	 */
	protected $source;

	/**
	 * The image resource handler
	 */
	protected $resource;

	public function __construct(){

	}

	/**
	 * @inheritdoc
	 */
	public function setSource(Source $source)
    {
        $this->source = $source;

		return $this;
    }

	/**
	 * @inheritdoc
	 */
	public function getResource()
	{
		return $this->resource;
	}
=======
 * Base Adapter Implementation to handle Image information.
 */
abstract class Adapter implements AdapterInterface
{
    /**
     * @var Source
     */
    protected $source;

    /**
     * The image resource handler.
     */
    protected $resource;

    public function __construct()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function setSource(Source $source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getResource()
    {
        return $this->resource;
    }
>>>>>>> upstream/master

    /**
     * Does this adapter supports the given type ?
     */
    protected function supports($type)
    {
        return false;
    }

    /**
<<<<<<< HEAD
     * Converts the image to true color
=======
     * Converts the image to true color.
>>>>>>> upstream/master
     */
    protected function convertToTrueColor()
    {
    }
}
