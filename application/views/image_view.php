<!DOCTYPE html>
<html>
<head>
	<title>Image Upload</title>
</head>
<body>

<h1>To upload image</h1>

<?php


echo form_open_multipart();

echo form_upload('file');

echo form_submit('upload', 'Upload');

echo form_close();



?>

</body>
</html>