<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<!-- hello -->

<?php echo form_open_multipart('gallery/upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>