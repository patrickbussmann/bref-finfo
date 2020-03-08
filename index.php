<?php

if (false === $finfo = new \finfo(FILEINFO_MIME_TYPE)) {
	echo 'finfo not found';
	exit;
}

if(count($_FILES) > 0)
{
    $mime = $finfo->file($_FILES['userfile']['tmp_name']);
    unlink($_FILES['userfile']['tmp_name']);
    echo 'Detected mime: ' . $mime;
    var_dump($_FILES['userfile']);
    exit;
}

?><html>
<body>
<form enctype="multipart/form-data" action="index.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
	File upload (select example.png): <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>
</body>
</html>