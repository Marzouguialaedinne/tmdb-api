<?php

namespace App\Service;


use Knp\Component\Pager\PaginatorInterface;

class RenderDataService
{
	private const  LIMIT = 10;
	public GenresService $genres;
	public MoviesService $movies;
	public PaginatorInterface $paginator;

	public function __construct(PaginatorInterface $paginator)
	{
		$this->genres     = new GenresService();
		$this->movies     = new MoviesService();
		$this->paginator  = $paginator;
	}

	public function renderDataWithPaginator($request): array
	{
		$allResult = $this->genres->getMovies($request["currentGenre"]);
		$movies = array_slice($allResult, $request["count"] * $request["page"] - $request["count"], $request["count"]);

		return  [
			'genresMovies'    => $this->genres->getMovieGenres(),
			'popularMovies'   => $this->movies->popularMovies(),
			'discoverVideos'  => $this->movies->getVideos($this->movies->popularMovies()->id),
			'moviesByGenre'   => $this->paginator->paginate($movies,1, self::LIMIT),
			'currentGenre'    => $request["currentGenre"]
		];
	}

	public function renderData($currentGenre): array
	{
		return  [
			'genresMovies'    => $this->genres->getMovieGenres(),
			'popularMovies'   => $this->movies->popularMovies(),
			'discoverVideos'  => $this->movies->getVideos($this->movies->popularMovies()->id),
			'moviesByGenre'   => $this->paginator->paginate($this->genres->getMovies($currentGenre),1, self::LIMIT),
			'currentGenre'    => $currentGenre
		];
	}

	public function renderSearchData(string $label): array
	{
		$genres = $this->genres->getMovieGenres();
		$currentGenre = array_shift($genres)->id;
		return  [
			'genresMovies'    => $this->genres->getMovieGenres(),
			'popularMovies'   => $this->movies->popularMovies(),
			'discoverVideos'  => $this->movies->getVideos($this->movies->popularMovies()->id),
			'moviesByGenre'   => $this->paginator->paginate($this->movies->getSearch($label),1, self::LIMIT),
			'currentGenre'    => $currentGenre
		];
	}

}