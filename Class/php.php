<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php
		print "Hello world";
		$num1=10;
		$num2=12;

		if ($num1<$num2){
			print ("\nThe answer is $num1\n");
		}

		define ("ERROR",10);
		define ("SUM",10);

		if (ERROR==SUM){
			print("\nerror occurred\n");
		}

		
	?>

</body>
</html>