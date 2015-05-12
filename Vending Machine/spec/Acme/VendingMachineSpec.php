<?php namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class VendingMachineSpec extends ObjectBehavior {

	function it_gets_the_price_for_A01()
	{
		$this->getPrice('A01')->shouldReturn(0.85);
	}

	function it_gets_the_price_for_A03()
	{
		$this->getPrice('A03')->shouldReturn(0.55);
	}

	function it_calculates_the_total_money_inserted()
	{
		$this->calculateTotalInserted([1, 0, 1, 0, 0, 0, 1, 0, 0])->shouldReturn(5.25);
	}

	function it_dispenses_change()
	{
		$this->vend(json_encode(['product_code' => 'A01', 'inserted_money' => [0, 0, 0, 0, 0, 0, 1, 0, 0], 'existing_money' => [5, 10, 2, 12, 2, 2, 1, 3, 0]]))->shouldReturn('0 1 5 5');
	}

	function it_alerts_user_when_no_change_due()
	{
		$this->vend(json_encode(['product_code' => 'A04', 'inserted_money' => [0, 0, 0, 1, 0, 1, 0, 0, 0], 'existing_money' => [5, 5, 5, 5, 5, 5, 5, 5, 5]]))->shouldReturn('No change');
	}

	function it_takes_exception_with_insufficient_funds()
	{
		$this->shouldThrow('Exception')->duringVend(json_encode(['product_code' => 'A04', 'inserted_money' => [0, 0, 0, 0, 0, 0, 0, 0, 0], 'existing_money' => [5, 5, 5, 5, 5, 5, 5, 5, 5]]));
	}

	function it_takes_exception_with_invalid_product_code()
	{
		$this->shouldThrow('Exception')->duringVend(json_encode(['product_code' => 'X01']));
	}

	function it_takes_exception_with_insufficient_change()
	{
		$this->shouldThrow('Exception')->duringVend(json_encode(['product_code' => 'A04', 'inserted_money' => [0, 0, 0, 0, 0, 0, 1, 1, 1], 'existing_money' => [1, 1, 0, 0, 0, 0, 0, 0, 0]]));
	}

}
