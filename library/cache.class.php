<?php
class cache {

	function get($filename) {
            $filename = ROOT . DS . 'tmp' . DS . 'cache' . DS . $filename;
            if (file_exists($filename)) {
                    $handle = fopen($filename, 'rb');
                    $var = fread($handle, filesize($filename));
                    fclose($handle);
                    return unserialize($var);
            } else {
                    return null;
            }
	}
	
	function set($filename, $var) {
		$filename = ROOT . DS . 'tmp' . DS . 'cache' . DS . $filename;
		$handle = fopen($filename, 'a');
		fwrite($handle, serialize($var));
		fclose($handle);
	}

}
