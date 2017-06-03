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
		public function findbyUserId($userId) 
		{
			return Photos::find()
            	->where(['userid' => $userId])
            	->all();
		}
	}

?>