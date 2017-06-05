<?php 
	namespace app\models;

	use Yii;
	use yii\base\Model;
	use yii\web\UploadedFile;

	class UploadImage extends Model {
		public $title;
		public $description;
		public $userId;
		public $imageFile;

		public function rules() {
			return [
				[['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
				[['title', 'description', 'userId'], 'required']
			];
		}
	}
?>