<?php

namespace spec\API;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use PhpSpec\Laravel\LaravelObjectBehavior;

class UtilitiesSpec extends LaravelObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('API\Utilities');
    }

	function it_should_return_passed_string_uppercase()
	{
		$this->capitalize('mike')->shouldReturn('MIKE');
	}

	function it_should_return_passed_string_lowercase() {
		$this->lowercase('MIKE')->shouldReturn('mike');
	}

	function it_should_return_passed_string_titlecase() {
		$this->titlecase('mike')->shouldReturn('Mike');
	}

	function it_should_parse_string_into_array() {
		$this->parse('name:string, body:text')
			 ->shouldReturn(
				[
					"name" => "string",
					"body" => "text"
				]
		);
	}

	function it_should_default_to_string_type () {
		$this->parse('name, body:text')
			 ->shouldReturn(
				 [
					 "name" => "string",
					 "body" => "text"
				 ]
			 );

		$this->parse('name,body') -> shouldReturn(
			[
				"name" => "string",
				"body" => "string"
			]
		);
	}

	function it_should_throw_exception_on_invalid_type () {
		$this->shouldThrow('API\Exceptions\UnrecognizedType')
			 ->duringParse('age:longint');
	}

	function it_should_return_data () {
		$this->getCustomer(5)->shouldReturn('Kuhn Group');
	}

	function it_should_throw_exception_on_invalid_id () {
		$this->shouldThrow('API\Exceptions\InvalidCustomer')
			 ->duringGetCustomer();
	}
}

