<?php

namespace App\Tmdb\Api;

use App\Tmdb\AbstractApi;

class Search extends AbstractApi
{

	/**
	 * Search Movies
	 *
	 * @return mixed
	 */
	public function searchMovies()
	{
		$this->response =  $this->get('search/movie', $this->options);
		return $this->toObject()->results;
	}

	public function getParameters(): array
	{
		return [
			'query' => [
				'api_key'       => $this->config->apiKey,
				'language'      => $this->config->language,
				'query'         => 'query',
			]
		];
	}
}