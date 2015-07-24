<?php

namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BotSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith([
            '---',
            '-m-',
            'p--',
        ]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Bot');
    }

    function it_finds_the_coordinates_of_characters_in_a_3_by_3_grid()
    {
        $this->findCoords('m')->shouldBe([1,1]);
        $this->findCoords('p')->shouldBe([2,0]);
    }

    function it_finds_the_coordinates_of_characters_in_a_5_by_5_grid()
    {
        $this->beConstructedWith([
            '-----',
            '-----',
            '--m--',
            '---p-',
            '-----',
        ]);

        $this->findCoords('m')->shouldBe([2, 2]);
        $this->findCoords('p')->shouldBe([3, 3]);
    }

    function it_moves_down_to_the_princess()
    {
        $this->beConstructedWith([
            '-----',
            '-----',
            '--m--',
            '-----',
            '---p-',
        ]);

        $princessCoords = $this->findCoords('p');
        $botCoords = $this->findCoords('m');

        $this->moveVertical($princessCoords[0], $botCoords[0])
             ->shouldBe("DOWN\nDOWN");
    }

    function it_moves_up_to_the_princess()
    {
        $this->beConstructedWith([
            '-p---',
            '-----',
            '--m--',
            '-----',
            '-----',
        ]);

        $princessCoords = $this->findCoords('p');
        $botCoords = $this->findCoords('m');

        $this->moveVertical($princessCoords[0], $botCoords[0])
             ->shouldBe("UP\nUP");
    }

    function it_moves_left_to_the_princess()
    {
        $this->beConstructedWith([
            'p-----',
            '------',
            '----m-',
            '------',
            '------',
            '------',
        ]);

        $princessCoords = $this->findCoords('p');
        $botCoords = $this->findCoords('m');

        $this->moveHorizontal($princessCoords[1], $botCoords[1])
             ->shouldBe("LEFT\nLEFT\nLEFT\nLEFT");
    }

    function it_moves_right_to_the_princess()
    {
        $this->beConstructedWith([
            '-----',
            '-----',
            '--m--',
            '-----',
            '----p',
        ]);

        $princessCoords = $this->findCoords('p');
        $botCoords = $this->findCoords('m');

        $this->moveHorizontal($princessCoords[1], $botCoords[1])
             ->shouldBe("RIGHT\nRIGHT");
    }

    function it_saves_the_princess()
    {
        $this->beConstructedWith([
            '------',
            '---m--',
            '------',
            '------',
            '------',
            'p-----',
        ]);

        $this->savePrincess()->shouldBe("DOWN\nDOWN\nDOWN\nDOWN\nLEFT\nLEFT\nLEFT");
    }
}
