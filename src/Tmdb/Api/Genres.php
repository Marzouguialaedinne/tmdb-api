<?php

namespace App\Tmdb\Api;
use App\Tmdb\AbstractApi;

class Genres extends AbstractApi
{
	/**
	 * Get the list of movie genres.
	 * @param array $options
	 * @return mixed
	 */
	public function getMovieGenres()
	{
		$this->response =  $this->get('genre/movie/list', $this->options);
		return $this->toObject()->genres;
	}

	/**
	 * Get the list of movies for a particular genre by id.
	 *
	 * @param int $genre_id
	 * @param array $options
	 * @return mixed
	 */

	 public function getMovies(int $genre_id)
	 {
	 	$this->response =  $this->get('genre/' . $genre_id . '/movies', $this->options);
	 	return $this->toObject()->results;
	 }
}