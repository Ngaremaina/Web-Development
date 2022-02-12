<?php

$var=fopen("text.txt","w+")
or die("unable to open file!");

$var2=$_POST["fname"];
fwrite($var, $var2);
fclose($var); ?>