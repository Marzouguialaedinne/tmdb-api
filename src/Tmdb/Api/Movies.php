<?php

namespace App\Tmdb\Api;

use App\Tmdb\AbstractApi;
use App\Tmdb\ApiMethodsTrait;

class Movies extends AbstractApi
{
	use ApiMethodsTrait;
	/**
	 * Get the list of top rated movies.
	 * @return mixed
	 */
	public function getTopRated()
	{
		$this->response =  $this->get('movie/top_rated', $this->options);
		return $this;
	}

	/**
	 * Get the videos for a specific movie id.
	 * @param $movie_id
	 * @return mixed
	 */
	public function getVideos($movie_id)
	{
		$this->response =  $this->get('movie/' . $movie_id . '/videos', $this->options);
		return $this->toObject()->results;
	}

	/**
	 * Get the images for a specific movie id.
	 *
	 * @param $movie_id
	 * @return mixed
	 */
	public function getImages($movie_id)
	{
		return $this->get('movie/' . $movie_id . '/images', $this->options);
	}

	/**
	 * Get the basic movie information .
	 *
	 * @param $movie_id
	 * @return mixed
	 */
	public function getMovie($movie_id)
	{
		return $this->get('movie/' . $movie_id, $this->options);
	}

	/**
	 * Search Movies
	 *
	 * @return mixed
	 */
	public function searchMovies(string $label)
	{
		$params = $this->getParameters();
		$params['query']['query'] = $label;
		$options = array_merge($params, $this->getHeaders());

		$this->response =  $this->get('search/movie', $options);
		return $this->toObject()->results;
	}
}