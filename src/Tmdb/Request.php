<?php

namespace App\Tmdb;

use Symfony\Component\HttpClient\HttpClient;


class Request
{
	public $client  = null;

	/** Base API URI */
	public const TMDB_URI = 'https://api.themoviedb.org';

	public function __construct($config, $debug = false)
	{
		$this->client = (new HttpClient())->createForBaseUri(self::TMDB_URI);
	}

	/**
	 * Send a GET request
	 *
	 * @param string $url
	 * @param array $parameters
	 * @param array $options
	 * @return array
	 */
	public function get(string $url, array $options = []): string
	{
		try {
			$response = $this->client->request("GET", $url, $options);
			return $response->getContent();
		} catch (\RuntimeException $e) {
			echo $e->getMessage(); die();
		}
	}

}