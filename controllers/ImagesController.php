<?php 
	namespace app\controllers;

	use Yii;
	use yii\filters\AccessControl;
	use yii\web\Controller;
	use yii\filters\VerbFilter;
	use app\models\LoginForm;
	use app\models\User;
	use app\models\Users;
	use app\models\Photos;
	use app\models\UploadImage;

	class ImagesController extends Controller
	{
		
		public function actionSucces() {
			$this->render('success');	
		}
		public function actionUpload()
		{
			$model = new UploadImage;
			if($model->load(Yii::$app->request->post()) ) {
				$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
				if($model->imageFile->saveAs(Yii::$app->basePath . '/web/img/' . $model->imageFile->baseName . '.' . $model->imageFile->extension)) {
					Photos::addPhoto($model->title, 
										$model->description, 
										$model->imageFile->baseName . '.' . $model->imageFile->extension, 
										Yii::$app->user->identity->id);
					return $this->render('success', ['model' => $model]);
				}
			}
			return $this->render('upload', ['model' => $model]);
		}
		

	}
?>