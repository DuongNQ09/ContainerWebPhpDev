<?php

///*----------------------------------------------------------------------------------------
// * Copyright (c) Microsoft Corporation. All rights reserved.
// * Licensed under the MIT License. See LICENSE in the project root for license information.
// *---------------------------------------------------------------------------------------*/

function sayHello($name) {
	echo "Hello $name!";
}

?>

<html>
	<head>
		<title>Advanced Web Development K15-N03</title>
	</head>
	<body>
		<?php 
		
		sayHello('K15-N03 2024');
			
	
			
		?>
		<form action="checkLogin.phd" method="POST">
		<a>Username:</a><input type=text name="userName" size =16>
		<a>Password:</a><input type=password name="passWord" size =16>
		<input type=submit name=submit value="Login">
		</form>

		<?php 
			echo '<p>Khoi du lieu PHP1.</p>';
		?>
		<p>Du lieu HTML, <?php echo 'Du lieu PHP 2'; ?></p>;
		<?php echo '<b>'; ?>
			Mot vi du ket hop HTML va PHP.
		<?php echo'</b>'; ?>
	</body>
</html>