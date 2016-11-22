<?php

include 'server.php';	

require_once ('PHPUnit/Autoload.php');
	
	
	class UnitTests extends PHPUnit_Framework_TestCase
	{

		function testConnectDB()
		{
		
		$con = connect_database();

		$this->assertEquals("Connected", $con);


		}


		function testAddEntry()
		{
			connect_database();
			$actual = add_Entry("sbj34lss0dfms", "TestTitle", "Sample data");
			$expected = "Entry Added";

			$this->assertEquals($expected, $actual);
		}


		function testCheckstr()
		{

			$expected = 'Jan, 12, 12, 13';  //Valid case

			$expected1 = 'feb, 12, 213, 43.43'; //Valid case

			$expected2 = 'feb, 12, 213, 43.43, 2.34, 324,34,345,345,45,45,45,546,45,5,45,45,45,45,345,4534,345,345,345,3453,45'; //invalid case


			$actual = checkStr($expected);
			$actual1 = checkStr($expected1);
			$actual2 = checkStr($expected2);

			$this->assertEquals(1, $actual);
			$this->assertEquals(1, $actual1);
			$this->assertEquals('', $actual2);


		}

		function testVerifyFormat()
		{
			$expected = 'Jan, 12, 12, 13'; //valid case

			$expected1 = 'feb, feb, 213, 43.43';   //invalid case
			$actual = verifyFormat($expected);
			$actual1 = verifyFormat($expected1);

			$this->assertEquals(1, $actual);
			$this->assertEquals('', $actual1);
			

			

		}

	 


	} 

	




?>