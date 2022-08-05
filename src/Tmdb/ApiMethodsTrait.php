<?php

namespace App\Tmdb;
use App\Tmdb\Api\Discover;
use App\Tmdb\Api\Search;
use App\Tmdb\model\Video;

trait ApiMethodsTrait
{
	/**
	 * @return App\Tmdb\Api\Discover
	 */
	public function getDiscoverApi()
	{
		return new Discover($this);
	}

	/**
	 * @return App\Tmdb\model\Video
	 */
	public function getModelVideo()
	{
		return new video($this);
	}

	/**
	 * @return Search
	 */
	public function getSearchApi()
	{
		return new Search($this);
	}

}