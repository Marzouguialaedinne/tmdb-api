<?php
namespace App\Service;
use App\Tmdb\Api\Genres;

class GenresService
{
	protected Genres $genres;

	public function __construct()
	{
		$this->genres = new Genres();
	}

	public function getMovieGenres(): array
	{
		return $this->genres->getMovieGenres();
	}

	public function getMovies(int $genre_id): array
	{
		return $this->genres->getMovies($genre_id);
	}
}