<?php 
	namespace app\controllers;

	use Yii;
	use yii\web\Controller;
	use app\models\Photos;
	use app\models\Followers;
	use app\models\Users;

	class FeedController extends Controller 
	{
		public function actionIndex() 
		{
			$followers = Followers::findAllFollowersById(Yii::$app->user->identity->id);
			$users = Users::findUsersByFollowers($followers);
			$photos = Photos::findPhotosByUsers($users);

			return $this->render('index', [ 'photos' => $photos]);
		}
	}
?>