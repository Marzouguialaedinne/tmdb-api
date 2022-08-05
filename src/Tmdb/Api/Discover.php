<?php

namespace App\Tmdb\Api;

use App\Tmdb\AbstractApi;

class Discover extends AbstractApi
{

	/**
	 * Discover movies by different types of data like average rating, number of votes, genres and certifications.
	 *
	 * @return mixed
	 */
	public function discoverMovies()
	{
		$this->response =  $this->get('discover/movie', $this->options);
		return $this->toObject()->results;
	}

	public function popularMovies()
	{
		$this->parameters =  $this->getParameters();
		return $this->discoverMovies();
	}

	public function getParameters(): array
	{
		return [
			'query' => [
				'api_key'       => $this->config->apiKey,
				'language'      => $this->config->language,
				'sort_by'       => 'popularity.desc',
				'include_video' => true
			]
		];
	}
}