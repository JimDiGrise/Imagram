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
			if(empty($followers)) {
				return false;
			}
			return Users::find()
					->select(['id','username'])
					->where(['id' => $followers])
					->all();
		}
		public function findFollowers($followers) 
		{
			if(empty($followers)) {
				return false;
			}
			return Users::find()
					->where(['not in', 'id', $followers]);
		}
		public function findUserByName($name) {
			if(empty($name)) {
				return false;
			}
			return Users::find()->select(['id', 'username'])->where(['username' => $name]);
		}
		public function userExist($id) 
		{
			if(empty($id)) {
				return false;
			}
			return Users::find($id)->exists();
		}
	}
?>