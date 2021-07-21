<h1>Create Topic</h1>

<?php

	echo $this->Form->create('Topic');
	//echo $this->Form->input('user_id');
	echo $this->Form->input('title');
	//echo $this->Form->select('Visible', array('1' => 'Published', '2' => 'Hidden'), array('empty' => false ));
	echo $this->Form->end('Save topic');

?>

	