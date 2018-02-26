<?php
	$pword = "kevin123";
	$upwd = md5(md5(2).$pword);
	echo $upwd;
?>