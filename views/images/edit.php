<?php 
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
?>
	<div class="container">
		<?php $form = ActiveForm::begin() ?>
			<?= Html::img('@web/img/' . $currentPhoto->filename, ['class' => 'img-edit']) ?><br>
			<?= $form->field($currentPhoto, 'title') ?>
			<?= $form->field($currentPhoto, 'description')->textArea() ?>
			<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
		<?php ActiveForm::end() ?>
	</div>