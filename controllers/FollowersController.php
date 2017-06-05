<?php 

	namespace app\controllers;
	use Yii;
	use yii\web\Controller;
	use app\models\Followers;
	use app\models\Users;

	class FollowersController extends Controller 
	{
		public function actionIndex() 
		{
			$followers = Followers::findAllFollowersById(Yii::$app->user->identity->id);
			$users = Users::findUsersByFollowers($followers);
			return $this->render('index', ['followers' => $users]);
		}
		public function actionSearch() 
		{
			$followers = Followers::findAllFollowersById(Yii::$app->user->identity->id);
			$users= Users::findFollowers($followers);
			return $this->render('search', ['users' => $users->all()]);
		}
		public function actionAdd($id) 
		{
			Followers::addFollower(Yii::$app->user->identity->id, $id);

			return $this->redirect('/followers/index') ;
		}
	}

	