<?php

use Avetmiss\Fields\Field;


class FieldTest extends TestCase
{

	// make, lenght, name, in should all return a Field object
	public function testFluentBuilder()
	{
		$field = Field::make('any');
		$this->assertInstanceOf('Avetmiss\Fields\Field', $field);

		$field->lenght(10);
		$this->assertInstanceOf('Avetmiss\Fields\Field', $field);

		$field->name('foo');
		$this->assertInstanceOf('Avetmiss\Fields\Field', $field);

		$field->in(['foo', 'bar']);
		$this->assertInstanceOf('Avetmiss\Fields\Field', $field);

		$field->pad('x');
		$this->assertInstanceOf('Avetmiss\Fields\Field', $field);
	}


	public function testInWithValidValue()
	{
		$field = Field::make('any')->name('foo')->lenght(10)->in(['bar']);
		$field->setValue('bar');

		$this->assertEquals('bar       ', $field->render());
	}


	/**
	 * @expectedException \UnexpectedValueException
	 */
	public function testInWithInvalidValue()
	{
		$field = Field::make('any')->name('foo')->lenght(10)->in(['bar']);
		$field->setValue('fiddy');
	}


	public function testPad()
	{
		$field = Field::make('any')->name('foo')->lenght(10)->pad('.');
		$field->setValue('bar');

		$this->assertEquals('.......bar', $field->render());
	}


	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testLenghtShouldBeInt()
	{
		$field = Field::make('any')->lenght('5');
	}


	public function testExportSpacesPad()
	{
		$field = Field::make('any')->name('foo')->lenght(10);
		$field->setValue('bar');

		// bar with 7 spaces
		$this->assertEquals('bar       ', $field->render());
	}


	public function testCutIfLenghtIsToLong()
	{
		$field = Field::make('any')->name('foo')->lenght(10);

		// 12 characters
		$field->setValue('foobarfoobar');

		$this->assertEquals(10, strlen($field->render())); 
	}


	/**
	 * @expectedException Exception
	 */
	public function testInvalidDateFormat()
	{
		$field = Field::make('date')->name('foo')->lenght(8);
		$field->setValue('foo');
	}


	/**
	 * @expectedException Exception
	 */
	public function testValidDateFormat()
	{
		$field = Field::make('date')->name('foo')->lenght(8);
		$field->setValue(02032014);
	}
}