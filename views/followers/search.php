<?php 
	use yii\helpers\Html;
	use yii\widgets\Pjax;
	use richardfan\widget\JSRegister;
?>

<div class="container">
	
	<div class="search">
		<?php Pjax::begin(); ?>
		<?= Html::beginForm(['followers/search'], 'post', ['data-pjax' => '', 'class' => 'form-inline']); ?>
		    <?= Html::input('text', 'string', Yii::$app->request->post('string'), ['class' => 'form-control']) ?>
		    <?= Html::submitButton('search', ['class' => 'btn btn-primary']) ?>
		<?= Html::endForm() ?>
		<?php 
			foreach ($users as $user) {
				echo $user['username'] . Html::a('Add', ['/followers/add/' . $user['id']]) . "</b><br>";;
			}
		 ?>
		<?php Pjax::end(); ?>
	</div>
	<div class="user-list">
		

	</div>
</div>