<?php
namespace App\Service;
use App\Tmdb\Api\Movies;
use App\Tmdb\model\Video;
class MoviesService
{
	protected Movies $movies;

	public function __construct()
	{
		$this->movies = new Movies();
	}

	public function popularMovies()
	{
		$discover = $this->movies->getDiscoverApi()->popularMovies();
		return array_shift($discover);
	}

	public function getVideos(int $movie_id)
	{
		$lists = $this->movies->getVideos($movie_id);
		return array_shift($lists);
	}

	public function getSearch(string $label): array
	{
		return $this->movies->searchMovies($label);
	}
}