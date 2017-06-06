<?php 
	namespace app\models;

	use yii\db\ActiveRecord;
	use app\models\Photos;
	use app\models\Followers;
	use app\models\Users;


	class Followers extends ActiveRecord 
	{
		public function findAllFollowersById($id) 
		{
			if($id == 0 ) {
				return false;
			}
			$followers = Followers::find()
				->select(['followerId'])
				->where(['userId' => $id]); 
			
			return Users::findUsersByFollowers($followers);
		}
		public function addFollower($userId, $followerId) 
		{
			if( $followerId == 0 || $userId == 0 ) {
				return false;
			} 
			$followers = new Followers();
			$followers->UserId = $userId;
			$followers->FollowerId = $followerId;
			return $followers->save();
			
		}
		public function deleteFollower($userId, $followerId) 
		{
			if($userId == 0 || $followerId == 0) {
				return false;
			}
			return Followers::deleteAll(['userId' => $userId, 'followerId' => $followerId]);
			 
		}
		

	}
	?>