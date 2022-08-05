<?php
declare(strict_types=1);

namespace App\Tmdb;


abstract class AbstractApi
{
	public $config      = null;
	public $url         = '';
	public $contentType = "application/json";
	public $authType    = "Bearer";
	public $version     = "4.0.0";
	public $userAgent   = "";
	public $request     = null;
	protected $response     = null;
	public const TMDB_VERSION = '/3';
	protected $headers     = [];
	protected $parameters  = [];
	protected $options     = [];

	public function __construct()
	{
		$this->config     = $this->getConfig();
		$this->request    = $this->getRequest();
		$this->headers    = $this->getHeaders();
		$this->parameters = $this->getParameters();
		$this->options    = $this->getOptions();
	}

	public function getConfig(): Config
	{
		return new Config();
	}

	public function getRequest(): Request
	{
		return new Request($this->config);
	}

	public function getHeaders(): array
	{
		return [
			'headers' => [
				"Content-Type"   => $this->contentType,
				"X-Version"      => $this->version,
				"Authorization"  => $this->authType .' ' . $this->config->bearerToken,
				"User-Agent"     => $this->userAgent,
			]
		];
	}

	public function getParameters(): array
	{
		return [
			'query' => [
				'api_key'   => $this->config->apiKey,
				'language'  => $this->config->language,
			]
		];
	}
		
	public function getOptions(): array
	{
		return array_merge($this->parameters, $this->headers);
	}

	public function get(string $url, $options = [])
	{
		return $this->request->get(self::TMDB_VERSION .'/'. $url, $options);
	}

	public function toObject()
	{
		return json_decode($this->response);
	}

	public function getResults()
	{
		return $this->toObject()->results;
	}
}
