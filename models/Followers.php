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
			$followers = Followers::find()
				->select(['followerId'])
				->where(['userId' => $id]); 
			
			return Users::findUsersByFollowers($followers);
		}
		public function addFollower($userId, $followerId) 
		{
			$followers = new Followers();
			$followers->UserId = $userId;
			$followers->FollowerId = $followerId;
			$followers->save();
		}


	}
	?>