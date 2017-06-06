<?php 
	

	use app\models\Photos;

	class PhotosTest extends \Codeception\Test\Unit  
	{
		public function testFindFollowersPhotosEmptyArray() 
		{
			$this->assertFalse(Photos::findFollowersPhotos([]));
		}
		public function testFindOneByEmpty() 
		{
			$this->assertFalse(Photos::findOneById(null));
		}
		public function testFindByEmpty() 
		{
			$this->assertFalse(Photos::findbyUserId(null));
		}
		public function testAddEmptyPhoto() 
		{
			$this->assertFalse(Photos::addPhoto(null, 0, '', ''));
		}
		public function testUpdateEmptyPhoto() 
		{
			$this->assertFalse(Photos::updatePhoto(null, 0, ''));
		}
		public function testDeleteEmptyIdPhoto() 
		{
			$this->assertFalse(Photos::deletePhoto(null));
		}
		public function testFindPhotosByEmptyArray() 
		{
			$this->assertEmpty(Photos::findPhotosByUsers([]));
		}
	}
?>