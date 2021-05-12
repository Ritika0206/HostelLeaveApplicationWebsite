<?php

	$conn = oci_connect("project","dbms","localhost/orcl");
	
	if(!($conn))
		echo "failed" ;
	else
		echo "success";
	?>