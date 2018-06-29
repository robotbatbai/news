<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use GuzzleHttp\Exception\ClientException;

class MenuController extends ApiController
{
	/**
	 *
	 * @author Anh Ngo
	 */



    public function getMenuList(Request $request)
    {
    	$data = url_safe_base64_encode(json_encode($this->paramDefault));

    	$this->token = hash_hmac('md5', $data, $this->key);

    	$uri = "menu/list?public_key=".$this->public_key."&token=".$this->token."&data=".$data;

    	try {
    		$response = $this->client->request('get', $uri);

    		return $response;
    	} catch (ClientException $e) {
    	    return $e->getResponse()->getBody();
    	}
    }

}
