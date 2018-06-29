<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\ClientException;
use Laravel\Lumen\Routing\Controller as BaseController;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ApiController extends BaseController
{
	 /**
     * @var Client
     */
    protected $client;

    /**
     * @author Anh Ngo
     */
    public function __construct()
    {
        $this->token = "";
        $this->paramDefault = [
        	'app_version' => config('kanayomi.app_version', env('APP_VERSION')), 
        	'lang' => "vi",
        	'os_type' => config('kanayomi.os_type'),
        ];

        // date_default_timezone_set('UTC');
    	// Default Lumen is UTC, env('APP_TIMEZONE')
    	// current time 
        $this->current_time = round(microtime(true));

        $this->headers = [
        	'base_uri' => config('kanayomi.base_uri', 'https://api.kanayomi.com/rest/'),
        	'headers' => [
        	    "Content-type" => "application/json;charset=\"utf-8\"", 
        	    "timing" => $this->current_time,
        	],
        ];

        $this->client = new Client($this->headers);
        $this->public_key = config('kanayomi.public_key');
    	$this->private_key = config('kanayomi.private_key');
    	$this->key = $this->private_key . $this->public_key. $this->current_time;
    	$this->page = 1;
    	$this->site = array();
    }
}
