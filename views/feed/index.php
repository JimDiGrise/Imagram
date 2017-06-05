<?php 
use yii\helpers\Html;
?>
<div class="container">
	

	<?php if(!empty($photos)): ?>

		<?php foreach ($photos as $photo) {

			echo "<h3>" .$photo[1]. "</h3><br>";
			foreach ($photo[2] as $singlePhoto) {
				  echo Html::a(Html::img('@web/img/' . $singlePhoto['filename'], ['class' => 'user-photo-item image-responsive']), '/images/view/' . $singlePhoto['id']);
			}
		};
	
		?>
	<?php else: ?>
		 <p>Feed is empty</p>
	<?php endif; ?>
</div>
