<?php


class LoginTest2 extends \Codeception\TestCase\Test
{
  public function testValidation()
    {
        $user = new Persona();

        $user->username = null;
        $this->assertFalse($user->validate(['username']));

        $user->username = 'toolooooongnaaaaaaameeee';
        $this->assertFalse($user->validate(['username']));

        $user->username = 'davert';
        $this->assertTrue($user->validate(['username']));           
    }

}
?>