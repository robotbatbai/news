<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use GuzzleHttp\Exception\ClientException;

class NewsController extends ApiController
{

	/**
	 *
	 * @author Anh Ngo
	 */



    public function getNewsLatest(Request $request)
    {
    	$param = [
    		'page' => $request->input('page', $this->page),
    		'site' => $request->input('site')?[$request->input('site')]:$this->site
    	];

    	$this->paramDefault = $this->paramDefault + $param;

    	$data = url_safe_base64_encode(json_encode($this->paramDefault));

    	$this->token = hash_hmac('md5', $data, $this->key);

    	$uri = "news/latest?public_key=".$this->public_key."&token=".$this->token."&data=".$data;

    	try {
    		$response = $this->client->request('get', $uri);

    		return $response;
    	} catch (ClientException $e) {
    	    return $e->getResponse()->getBody();

    	}
    }

    public function getNewsHot(Request $request)
    {
    	$param = [
    		'page' => $request->input('page', $this->page),
    		'site' => $request->input('site')?[$request->input('site')]:$this->site
    	];

    	$this->paramDefault = $this->paramDefault + $param;

    	$data = url_safe_base64_encode(json_encode($this->paramDefault));

    	$this->token = hash_hmac('md5', $data, $this->key);

    	$uri = "news/hot?public_key=".$this->public_key."&token=".$this->token."&data=".$data;

    	try {
    		$response = $this->client->request('get', $uri);

    		return $response;
    	} catch (ClientException $e) {
    	    return $e->getResponse()->getBody();

    	}
    }

    public function getNewsDetail(Request $request)
    {
    	$param = [
    		'id' => $request->input('id')?[$request->input('id')]:[]
    	];

    	$this->paramDefault = $this->paramDefault + $param;

    	$data = url_safe_base64_encode(json_encode($this->paramDefault));

    	$this->token = hash_hmac('md5', $data, $this->key);

    	$uri = "news/detail?public_key=".$this->public_key."&token=".$this->token."&data=".$data;

    	try {
    		$response = $this->client->request('get', $uri);

    		return $response;
    	} catch (ClientException $e) {
    	    return $e->getResponse()->getBody();

    	}
    }
}
