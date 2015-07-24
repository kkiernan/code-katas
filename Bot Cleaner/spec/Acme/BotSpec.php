<?php

namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BotSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Bot');
    }

    function it_checks_cell_for_cleanliness()
    {
        $board = [
            '-d-',
            '---',
            '--d',
        ];

        $this->cellIsDirty(0, 0, $board)->shouldBe(false);
        $this->cellIsDirty(2, 1, $board)->shouldBe(false);
        $this->cellIsDirty(0, 1, $board)->shouldBe(true);
        $this->cellIsDirty(2, 2, $board)->shouldBe(true);
    }

    function it_detects_valid_moves()
    {
        $board = [
            '-d-',
            '---',
            '--d',
        ];

        $this->moveIsValid(0, 0, $board)->shouldBe(true);
        $this->moveIsValid(1, 2, $board)->shouldBe(true);
        $this->moveIsValid(2, 2, $board)->shouldBe(true);
        $this->moveIsValid(0, 3, $board)->shouldBe(false);
    }

    function it_makes_valid_moves()
    {
        $board = [
            '-d-',
            '---',
            '---',
        ];

        $this->move(0, 0, $board)->shouldBe('RIGHT');
        $this->move(0, 1, $board)->shouldBe('CLEAN');
        $this->move(0, 2, $board)->shouldBe('DOWN');
        $this->move(1, 2, $board)->shouldBe('DOWN');
        $this->move(2, 2, $board)->shouldBe('LEFT');
    }
}
