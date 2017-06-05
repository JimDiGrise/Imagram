<?php 
	use yii\helpers\Html;
?>

<div class="container">
	<?php foreach ($users as $user) {
			echo $user->username ;
			echo Html::a('Add', ['/followers/add/' . $user->id]) . " <br>";
		}
	?>
</div>