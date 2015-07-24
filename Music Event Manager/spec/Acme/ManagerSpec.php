<?php

namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ManagerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Manager');
    }

    function it_hires_bands()
    {
        $input = json_decode('{"bands" : [{"id" : "1", "style" : "Rock", "date_range" : "01-05/15-05"}, {"id" : "2", "style" : "Hip Hop", "date_range" : "05-05/08-05"}], "shows" : [{"id" : "1", "style" : "Rock", "date" : "05-05"}, {"id" : "2", "style" : "Hip Hop", "date" : "01-05"}, {"id" : "3", "style" : "Classic", "date" : "18-05"}]}');
        
        $this->hireBands($input)->shouldReturn('1-1,2-0,3-0');
    }
}
