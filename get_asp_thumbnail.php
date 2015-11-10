<?php
	/* 	
		Copyright (c) 2015 Derek Norton
	
		Permission is hereby granted, free of charge, to any person obtaining a copy
		of this software and associated documentation files (the "Software"), to deal
		in the Software without restriction, including without limitation the rights
		to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
		copies of the Software, and to permit persons to whom the Software is
		furnished to do so, subject to the following conditions:

		The above copyright notice and this permission notice shall be included in
		all copies or substantial portions of the Software.

		THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
		IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
		FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.  IN NO EVENT SHALL THE
		AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
		LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
		OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
		THE SOFTWARE. 
	*/
	
	function get_asp_thumb_link($url) {
		//Set Options
		$curl_options = array( 
			CURLOPT_RETURNTRANSFER => true, 
			CURLOPT_HEADER         => false,
			CURLOPT_FOLLOWLOCATION => true, 
			CURLOPT_USERAGENT      => "DN", 
			CURLOPT_AUTOREFERER    => true,
			CURLOPT_CONNECTTIMEOUT => 120, 
			CURLOPT_TIMEOUT        => 120, 
			CURLOPT_MAXREDIRS      => 10, 
			CURLOPT_COOKIEJAR	   => 'r.txt'
		); 
		
		//CURL HTTP request. 
		$req = curl_init($url); 
		curl_setopt_array($req,$curl_options); 
		$content = curl_exec($req); 
		curl_close($req); 
		
		//Grab the URL 
		$regex = '/"infoPanelImageUrl"\:"(.*?)"/';
		preg_match($regex, $content, $matches);
		$link = stripslashes($matches[1]);
		
		//Return the link or false if fail. 
		return (!empty($link) ? $link : false);
	}  
