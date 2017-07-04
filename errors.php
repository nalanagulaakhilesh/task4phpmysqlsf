<?php  if(count($errors)>0): ?>
	<div class="error">
		<?php foreach ($errors as $error): ?>
			<p><strong><?php echo $error; ?></strong></p>
		<?php endforeach ?>
		
	</div>
<?php endif ?>

<!DOCTYPE html>
<html>
<head>
	<title>error</title>
	 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

</body>
</html>