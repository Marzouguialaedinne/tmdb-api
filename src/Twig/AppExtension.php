<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Twig;

use App\Service\MoviesService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;


class AppExtension extends AbstractExtension
{
	private MoviesService $moviesService;
	// The $locales argument is injected thanks to the service container.
	// See https://symfony.com/doc/current/service_container.html#binding-arguments-by-name-or-type
	public function __construct(MoviesService $moviesService)
	{
		$this->moviesService = $moviesService;
	}

	public function getFunctions(): array
	{
		return [
			new TwigFunction('get_movie_key', [$this, 'getMovieKey']),
		];
	}

	public function getMovieKey(?int $idMovie)
	{
		return isset($this->moviesService->getVideos($idMovie)->key) ? $this->moviesService->getVideos($idMovie)->key : '' ;
	}
}