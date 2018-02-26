<?php
	$pword = "bernie123";
	$upwd = md5(md5(1).$pword);
	echo $upwd;
?>