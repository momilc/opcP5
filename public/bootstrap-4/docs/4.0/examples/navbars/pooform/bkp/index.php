<?php

	require 'form.php';
	require 'text.php';
//creer un formulaire en POO
	$form = new Form($_POST);
	var_dump(Text::publicwithZero(10));

?>


<form action="#" method="POST">
	<?php 
	echo $form->input('username');
	echo $form->input('password');
	echo $form->submit();
	?> 
</form>





