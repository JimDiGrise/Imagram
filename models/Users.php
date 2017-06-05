<?php 
	namespace app\models;

	use yii\db\ActiveRecord;

	class Users extends ActiveRecord 
	{
		public static function tableName() 
		{
			return 'user';
		}
		public function findUsersByFollowers($followers) 
		{
			return Users::find()
					->select(['id','username'])
					->where(['id' => $followers])
					->all();
		}
		public function findFollowers($followers) 
		{
			return Users::find()
					->where(['not in', 'id', $followers]);
		}
	}
?>