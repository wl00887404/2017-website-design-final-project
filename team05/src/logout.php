<?php
	session_start();
	session_destroy();
	echo "
		<script type='text/javascript'>
			location.href='../index.html';
		</script>
	";
?>