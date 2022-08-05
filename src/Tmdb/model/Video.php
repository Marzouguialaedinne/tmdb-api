<?php

namespace App\Tmdb\model;

class Video
{
	public const URL_FORMAT = 'https://www.youtube.com/embed/';

	/**
	 * @var string
	 */
	private $id;
	/**
	 * @var string
	 */
	private $iso6391;
	/**
	 * @var string
	 */
	private $iso31661;
	/**
	 * @var mixed
	 */
	private $key;
	/**
	 * @var string
	 */
	private $name;
	/**
	 * @var string
	 */
	private $site;
	/**
	 * @var int
	 */
	private $size;
	/**
	 * @var string
	 */
	private $type;

	/**
	 * @var string
	 */
	private $publishedAt;


	private $url_format;

	/**
	 * @return string
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param string $id
	 * @return $this
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getIso6391()
	{
		return $this->iso6391;
	}

	/**
	 * @param string $iso6391
	 * @return $this
	 */
	public function setIso6391($iso6391)
	{
		$this->iso6391 = $iso6391;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getIso31661()
	{
		return $this->iso31661;
	}

	/**
	 * @param string $iso31661
	 * @return $this
	 */
	public function setIso31661($iso31661)
	{
		$this->iso31661 = $iso31661;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return $this
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getSite()
	{
		return $this->site;
	}

	/**
	 * @param string $site
	 * @return $this
	 */
	public function setSite($site)
	{
		$this->site = $site;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getSize()
	{
		return $this->size;
	}

	/**
	 * @param int $size
	 * @return $this
	 */
	public function setSize($size)
	{
		$this->size = $size;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return $this
	 */
	public function setType($type)
	{
		$this->type = $type;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getPublishedAt()
	{
		return $this->publishedAt;
	}

	/**
	 * @param string $publishedAt
	 * @return $this
	 */
	public function setPublishedAt($publishedAt)
	{
		$this->publishedAt = $publishedAt;

		return $this;
	}

	/**
	 * Retrieve the url to the source
	 *
	 * @return string
	 */
	public function getUrl($key)
	{
		return $this->getUrlFormat() . $key;
	}


	public function getUrlFormat()
	{
		return $this->url_format;
	}

	public function setUrlFormat($key)
	{
		 $this->url_format = self::URL_FORMAT . $key;
		 return $this;
	}

	/**
	 * @return mixed
	 */
	public function getKey()
	{
		return $this->key;
	}

	/**
	 * @param mixed $key
	 * @return $this
	 */
	public function setKey($key)
	{
		$this->key = $key;

		return $this;
	}

}