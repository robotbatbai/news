<?php 

/**
* 
* Url safe base64 endcode
*
*/
if(!function_exists('url_safe_base64_encode'))
{
	function url_safe_base64_encode ($data)
	{
	  return str_replace(array('+','/', '='),array('-','_', ''), base64_encode($data));
	}
}