<?php
	class ControllerUtil{
		static function RandomString(){
			// 26 min + 26 may + 10 num; n = 62
			// r = 10
			// ... Número de permutaciones posibles = 62^10 = 839,299,365,868,440,224.
		    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $randstring = '';
		    for ($i = 0; $i < 10; $i++) {
		        $randstring .= $characters[rand(0, strlen($characters))];
		    }
		    return $randstring;
		}
	}
?>