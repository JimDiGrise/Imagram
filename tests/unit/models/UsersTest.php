<?php 
use app\models\Users;

class UsersTest extends \Codeception\Test\Unit  
{
	public function testFindUsersByEmptyArray() 
	{
		$this->assertFalse(Users::findUsersByFollowers([]));
	}
	public function testFindUsersByZero() 
	{
		$this->assertFalse(Users::findUsersByFollowers(0));
	}
	public function testfindFollowersByEmptyArray() 
	{
		$this->assertFalse(Users::findFollowers([]));
	}
	public function testfindFollowersByZero() 
	{
		$this->assertFalse(Users::findFollowers(0));
	}
	public function testfindUserByNameByEmptyString() 
	{
		$this->assertFalse(Users::findUserByName(""));
	}

}
?>