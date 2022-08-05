<?php

namespace App\Controller;


use App\Service\RenderDataService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class MovieController extends AbstractController
{
	/**
	 * @Route("/", name="movie_home", methods={"GET"})
	 */
	public function index(Request $request, RenderDataService $renderDataService): Response
	{
		return $this->render('Tmdb/homeMovie.html.twig', [
			'genresMovies'    => $renderDataService->genres->getMovieGenres(),
			'popularMovies'   => $renderDataService->movies->popularMovies(),
			'discoverVideos'  => $renderDataService->movies->getVideos($renderDataService->movies->popularMovies()->id)
		]);
	}

	/**
	 * @Route("/movies", name="genre_movies", methods={"POST", "GET"})
	 */
	public function movies(Request $request, RenderDataService $renderDataService): Response
	{
		$currentGenre = $request->request->get('genre');

	 	$data         = empty($request->query->get('page'))
	 						? $renderDataService->renderData($currentGenre)
							: $renderDataService->renderDataWithPaginator($request->query->all())
							;

		return $this->render('Tmdb/homeMovie.html.twig', $data);
	}

	/**
	 * @Route("/movies/search", name="search_movies", methods={"POST", "GET"})
	 */
	public function searchMovies(Request $request, RenderDataService $renderDataService): Response
	{
		$data  = !empty($request->request->get('search'))
							? $renderDataService->renderSearchData($request->request->get('search'))
							: $renderDataService->renderDataWithPaginator($request->query->all())
		;

		return $this->render('Tmdb/homeMovie.html.twig', $data);
	}
}
