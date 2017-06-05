<?php 
	namespace app\models;
	use Yii;
	use yii\db\ActiveRecord;

	class Photos extends ActiveRecord 
	{
		public static function tableName() 
		{
			return 'photos';
		}
		public function findOneById($id) 
		{
			return Photos::findOne($id);
		}
		public function findbyUserId($userId) 
		{
			return Photos::find()
            	->where(['userid' => $userId])
            	->all();
		}
		public function addPhoto($title, $description, $filename, $userId) 
		{
			$photos = new Photos();
			$photos->title = $title;
			$photos->description = $description;
			$photos->filename = $filename;
			$photos->userId = $userId;
			$photos->save();	
		}
		public function updatePhoto($id, $title, $description) 
		{
			$currentPhoto = Photos::findOneById($id);
			$currentPhoto->title = $title;
			$currentPhoto->description = $description;
			$currentPhoto->update();
		}
		public function deletePhoto($id) 
		{
			$currentPhoto = Photos::findOneById($id);
			$currentPhoto->delete();
		}
	}

?>