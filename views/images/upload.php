<?php 
	use yii\widgets\ActiveForm;

?>
	<div class="container">
		<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
			<?= $form->field($model, 'title') ?>
			<?= $form->field($model, 'description')->textArea() ?>
			<?= $form->field($model, 'imageFile')->fileInput() ?>
			<button>Submit</button>
		<?php ActiveForm::end() ?>
	</div>
