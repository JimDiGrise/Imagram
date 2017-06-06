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
		public function findFollowersPhotos($followers) 
		{
			if(empty($followers)) 
				return false;

			return Photos::find()->where(['userId' => $followers]);
		}
		public function findOneById($id) 
		{
			if(empty($id)) 
				return false;

			return Photos::findOne($id);
		}
		public function findbyUserId($userId) 
		{
			if(empty($userId)) 
				return false;

			return Photos::find()
            	->where(['userid' => $userId])
            	->all();
		}
		public function addPhoto($title, $description, $filename, $userId) 
		{
			if(	empty($title) 
				|| empty($description)
				|| empty($filename) 
				|| empty($userId))
				return false;

			$photos = new Photos();
			$photos->title = $title;
			$photos->description = $description;
			$photos->filename = $filename;
			$photos->userId = $userId;
			return $photos->save();	
		}
		public function updatePhoto($id, $title, $description) 
		{
			if(	empty($id) 
				|| empty($title)
				|| empty($description))
				return false;

			$currentPhoto = Photos::findOneById($id);
			$currentPhoto->title = $title;
			$currentPhoto->description = $description;
			return $currentPhoto->update();
		}
		public function deletePhoto($id) 
		{
			if(empty($id)) 
				return false;

			$currentPhoto = Photos::findOneById($id);
			return $currentPhoto->delete();
		}
		public function findPhotosByUsers($users) {
			$photos = array();
			foreach ($users as $user) {
				array_push($photos,
							[ 
								$user['id'], 
								$user['username'], 
								Yii::$app->db
										->createCommand(
												"select 
													photos.id, 
													photos.description, 
													photos.filename, 
													photos.create_at
												from user
												JOIN photos ON user.id = photos.userId
												where photos.userid =" .$user['id'] )
										->queryAll()
							]);
				}
			return $photos;
		}		
	}

?>