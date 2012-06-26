<?php

use Randomdata\Generator;

class GeneratorTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * Creating the generator, can have alternative locales and fallbacks
	 */
	public function testBuildGenerator()
	{
		$generator = new Generator();
		
		$this->assertEquals('en_US', $generator->getLocale(), 'Default locale is en_US');
		$this->assertEquals('en_US', $generator->getFallbackLocale(), 'Default fallback locale is en_US');
		
		// Now we create one with a new locale
		$generator = new Generator('de_CH');
		
		$this->assertEquals('de_CH', $generator->getLocale(), 'User set locale de_CH');
		$this->assertEquals('en_US', $generator->getFallbackLocale(), 'Default fallback locale is en_US');
		
		// Last new Locale and fallback locale
		$generator = new Generator('de_CH', 'de_DE');
		
		$this->assertEquals('de_CH', $generator->getLocale(), 'User set locale de_CH');
		$this->assertEquals('de_DE', $generator->getFallbackLocale(), 'User set fallback locale de_DE');
	}
	
	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testNotexistingLocale()
	{
		$this->markTestIncomplete('Scanning for locales that exist or not needed');
	    $generator = new Generator('localedoesneverexist');
	}
	
	
}
