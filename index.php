<?php declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

return function ($event) {
	if (false === $finfo = new \finfo(FILEINFO_MIME_TYPE)) {
		return 'finfo not found';
	}


	if (false === $tmpFile = tempnam(sys_get_temp_dir(), 'example')) {
		throw new \RuntimeException(sprintf('Temp file can not be created in "%s".', sys_get_temp_dir()));
	}

	file_put_contents($tmpFile, file_get_contents(__DIR__ . '/example.png'));

	$mime = $finfo->file($tmpFile);
	unlink($tmpFile);
	return $mime;
};
