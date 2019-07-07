<?php
session_name('user_login');
session_destroy();

echo "<script>alert('Successfully logged out.');
	window.location.href='login.html';
	</script>";
?>