<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	$this->title = 'Flckr';
?>
<div class="container">
<h1>Followers:</h1>

	<?php

	if(empty($followers)) {
		echo "<h1>Followers is empty</h1>";
	}
	foreach ($followers as $follower) {
		echo $follower->username . " <b>" . Html::a('Delete', ['/followers/remove/' . $follower->id]) . "</b><br>";
	} 
	?>
	
	
</div>