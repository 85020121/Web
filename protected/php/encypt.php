<?php
 # --- ENCRYPTION ---

    # the key should be random binary, use scrypt, bcrypt or PBKDF2 to
    # convert a string into a key
    # key is specified using hexadecimal
    $key = pack('H*', "636f6f6b69654b657949734f6e655069656365");
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    
    function cryptCookie($cookie) {
	    global $key, $iv_size, $iv;
    	$cookie_utf8 = serialize($cookie);//utf8_encode(serialize($cookie));
    	$ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,
                                 $cookie_utf8, MCRYPT_MODE_CBC, $iv);
		$ciphertext = $iv . $ciphertext;
    	# encode the resulting cipher text so it can be represented by a string
    	$ciphertext_base64 = base64_encode($ciphertext);
    	return $ciphertext_base64;
    }

	function decryptCookie($cookie) {
	    global $key, $iv_size, $iv;
	    $ciphertext_dec = base64_decode($cookie);
	 	$iv_dec = substr($ciphertext_dec, 0, $iv_size);    
   		# retrieves the cipher text (everything except the $iv_size in the front)
  		$ciphertext_dec = substr($ciphertext_dec, $iv_size);
	    # may remove 00h valued characters from end of plain text
    	$plaintext_utf8_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,
                                         $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
        $plaintext_utf8_dec = preg_replace('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $plaintext_utf8_dec);
		return unserialize($plaintext_utf8_dec);
	}
	
	$a=array("a"=>"苹果","b"=>"例子","c"=>"Horse");
	$crya = cryptCookie($a);
	print($crya);
	echo "<hr color='red'>";

	print_r(decryptCookie($crya));
    
?>