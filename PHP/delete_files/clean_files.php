<?php
function rchmod($parent, $dmod, $fmod) {
	if (is_dir($parent)) {
		$old = umask(0000);
		chmod($parent, $dmod);
		umask($old);
		if ($handle = opendir($parent)) {
			while (($file = readdir($handle)) !== false) {
				if ($file === "." or $file === "..") {
					continue;
				} elseif (is_dir($parent . '/' . $file)) {
					rchmod($parent . '/' . $file, $dmod, $fmod);
				} else {
					$old = umask(0000);
					chmod($parent . '/' . $file, $fmod);
					umask($old);
				}
			}
			closedir($handle);
		}
	} else {
		$old = umask(0000);
		chmod($parent, $fmod);
		umask($old);
	}
}
rchmod('cosolucv/', 0777, 0666);
?>