<?php

namespace spec\API;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UtilitiesSpec extends ObjectBehavior
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
}
