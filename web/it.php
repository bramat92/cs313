<?php
	$pword = "johnd123";
	$upwd = md5(md5(3).$pword);
	echo $upwd;
?>