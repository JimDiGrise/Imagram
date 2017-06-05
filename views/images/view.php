<?php 
	use yii\helpers\Html;
?>
	<div class="container">
		<?php echo Html::img('@web/img/' . $photo->filename, ['class' => 'img-view']) ?>
		<h3><?php echo $photo->title ?>	</h3>
		<p><?php echo $photo->description ?> </p>
		<p><?php echo $photo->create_at ?> </p>
		<?php echo Html::a('Edit', ['/images/edit/' . $photo->id], ['class' => 'btn btn-warning']); ?>
		<?php echo Html::a('Delete', ['/images/remove/' . $photo->id],[ 'class' => 'btn btn-danger']); ?>
	</div>
