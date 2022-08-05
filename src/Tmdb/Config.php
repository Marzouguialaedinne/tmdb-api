<?php

namespace App\Tmdb;

class Config
{
	public $baseUri;
	public $apiKey;
	public $bearerToken;
	public $language;

	public function __construct()
	{
		if($_ENV['APP_ENV'] === "dev") {
			$this->apiKey      = $_ENV['TMDB_API_KEY'];
			$this->bearerToken = $_ENV['TMDB_BEARER_TOKEN'];
			$this->language    = $_ENV['TMDB_LANGUAGE'];
		}
	}

}