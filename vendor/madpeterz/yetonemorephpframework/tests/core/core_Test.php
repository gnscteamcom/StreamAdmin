<?php

use PHPUnit\Framework\TestCase;
define('THIS_IS_A_TEST_STRING',"This is a test");
class error_logging extends TestCase
{
    public function test_last_error_message()
    {
        $_testingobject = new ErrorLoggingTestClass();
        $_testingobject->test_addError(__FILE__, __FUNCTION__, THIS_IS_A_TEST_STRING);
        $this->assertSame($_testingobject->getLastError(), "File: " . __FILE__ . " Function: " . __FUNCTION__ . " info: " . THIS_IS_A_TEST_STRING . "");
    }

    public function test_return_array()
    {
        $_testingobject = new ErrorLoggingTestClass();
        $result = $_testingobject->test_addError(__FILE__, __FUNCTION__, THIS_IS_A_TEST_STRING, []);
        $this->assertSame($result, ["status"=>false,"message"=>THIS_IS_A_TEST_STRING]);
    }

    public function test_return_array_extended()
    {
        $_testingobject = new ErrorLoggingTestClass();
        $result = $_testingobject->test_addError(__FILE__, __FUNCTION__, THIS_IS_A_TEST_STRING, ["why"]);
        $this->assertSame($result, ["why","status"=>false,"message"=>THIS_IS_A_TEST_STRING]);
        $result = $_testingobject->test_addError(__FILE__, __FUNCTION__, THIS_IS_A_TEST_STRING, ["popcorn"=>"why"]);
        $this->assertSame($result, ["popcorn"=>"why","status"=>false,"message"=>THIS_IS_A_TEST_STRING]);
    }
}
?>
