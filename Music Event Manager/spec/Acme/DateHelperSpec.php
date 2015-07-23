<?php

namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DateHelperSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\DateHelper');
    }

    function it_creates_a_date_range_array_for_a_given_string()
    {
        $this->parseDateRange('01-05/15-05')->shouldBe(['start' => '01-05', 'end' => '15-05']);
    }
}
