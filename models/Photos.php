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
			return Photos::find()->where(['userId' => $followers]);
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