<?php

$dir = "D:\SOFT\GeekBrains\Tests";

$rdir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir), TRUE);
 
foreach ($rdir as $file)
{
	if(mb_substr($file, -1) == '.' || mb_substr($file, -2, 1) == '..') continue;
	echo str_repeat('---', $rdir->getDepth()).$file.PHP_EOL;
}



