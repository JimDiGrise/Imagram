<?php 
	use app\models\Followers;

	class FollowersTest extends \Codeception\Test\Unit 
	{
		public function testAddCorrectFollower() 
		{
			$this->assertTrue(Followers::addFollower(1, 3));
		}
		public function testAddNullFollower() 
		{
			$this->assertFalse(Followers::addFollower(null, 3));
		}
		public function testAddZeroFollower() 
		{
			$this->assertFalse(Followers::addFollower(0, 3));
		}

		public function testRemoveCorrectFollower() 
		{
			$this->assertGreaterThanOrEqual(Followers::deleteFollower(1, 6), 1);
		}
		public function testRemoveNullFollower() 
		{
			$this->assertFalse(Followers::deleteFollower(null, 6), 1);
		}
		public function testRemoveInCorrectFollower() 
		{
			$this->assertEquals(Followers::deleteFollower(7, 6), 0);
		}
		public function testFindAllFollowersByZero() 
		{
			$this->assertFalse(Followers::findAllFollowersById(0));
		}
	}
?>