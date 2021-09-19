<?php
	$target_url = 'http://localhost/accept.php';
        //This needs to be the full path to the file you want to send.
	//$file_name_with_full_path = realpath('./star1.png');
        /* curl will accept an array here too.
         * Many examples I found showed a url-encoded string instead.
         * Take note that the 'key' in the array will be the key that shows up in the
         * $_FILES array of the accept script. and the at sign '@' is required before the
         * file name.
         */
	$args['extra_info'] = '123456';
	//mime_content_type needs php_fileinfo.dll activated from php/ext
	$args['file_contents'] = new CurlFile('star1.png', mime_content_type('star1.png'));
	//$post = array('extra_info' => '123456','file_contents'=>'@'.$file_name_with_full_path);
 
        $ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$target_url);
	curl_setopt($ch, CURLOPT_POST,1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
	//curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	$result=curl_exec ($ch);
	curl_close ($ch);
	echo $result;
?>