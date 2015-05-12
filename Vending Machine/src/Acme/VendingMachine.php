<?php namespace Acme;

use Exception;

class VendingMachine {

	/**
	 * Inventory codes.
	 *
	 * @var array
	 */
	private static $inventory = [
		'A01' => [
			'Name'  => 'Cookies',
			'Price' => 0.85
		],
		'A02' => [
			'Name'  => 'Coffe',
			'Price' => 0.35
		],
		'A03' => [
			'Name'  => 'Water',
			'Price' => 0.55
		],
		'A04' => [
			'Name'  => 'Sandwich',
			'Price' => 2.5
		],
		'A05' => [
			'Name'  => 'Microwave Meal',
			'Price' => 6.85
		]
	];

	/**
	 * Monetary codes.
	 *
	 * @var array
	 */
	private static $monies = [
		['Type' => 'Coin', 'Value' => 0.05],
		['Type' => 'Coin', 'Value' => 0.10],
		['Type' => 'Coin', 'Value' => 0.20],
		['Type' => 'Coin', 'Value' => 0.50],
		['Type' => 'Coin', 'Value' => 1],
		['Type' => 'Coin', 'Value' => 2],
		['Type' => 'Note', 'Value' => 5],
		['Type' => 'Note', 'Value' => 10],
		['Type' => 'Note', 'Value' => 20]
	];

	/**
	 * Process the transaction using the specified options.
	 *
	 * @param  string $options
	 * @return string
	 */
	public function vend($options)
	{
		$options = json_decode($options);

		$this->guardAgainstInvalidProduct($options->product_code);

		$price = $this->getPrice($options->product_code);

		$totalInserted = $this->calculateTotalInserted($options->inserted_money);

		$this->guardAgainstInsufficientFunds($price, $totalInserted);

		$changeDue = $totalInserted - $price;

		$existingMoney = array_reverse($options->existing_money, true);

		$moniesDispensed = [];

		foreach ($existingMoney as $code => $qty)
		{
			while ($qty > 0)
			{
				if ($changeDue - static::$monies[$code]['Value'] >= 0)
				{
					$changeDue -= static::$monies[$code]['Value'];
					$qty -= 1;
					$moniesDispensed[] = $code;
				}
				else
				{
					break;
				}
			}
		}

		$this->guardAgainstInsufficientChange($changeDue, $price);

		return $this->formatSolution($moniesDispensed);
	}

	/**
	 * Format an array of money codes as a string for readability. 
	 *
	 * @param  array $moniesDispensed
	 * @return string
	 */
	public function formatSolution($moniesDispensed)
	{
		$solution = implode(' ', array_reverse($moniesDispensed));

		if ($solution == '')
		{
			$solution = 'No change';
		}

		return $solution;
	}

	/**
	 * Get the price of the specified product code.
	 *
	 * @param  string $productCode
	 * @return double
	 */
	public function getPrice($productCode)
	{
		return static::$inventory[$productCode]['Price'];
	}

	/**
	 * Get the total amount of the money inserted.
	 *
	 * @param  array $insertedMoney
	 * @return double
	 */
	public function calculateTotalInserted($insertedMoney)
	{
		$total = 0;

		foreach ($insertedMoney as $key => $value)
		{
			if ($value > 0)
			{
				$total += static::$monies[$key]['Value'];
			}
		}

		return $total;
	}

	/**
	 * Throw an exception if the specified product code is not valid.
	 *
	 * @param string $selection
	 * @return void
	 */
	private function guardAgainstInvalidProduct($productCode)
	{
		if (!array_key_exists($productCode, static::$inventory))
		{
			throw new Exception('Wrong code');
		}
	}

	/**
	 * Throw an exception if the product price is greater than the amount of
	 * money inserted by the user.
	 *
	 * @param double $price
	 * @return void
	 */
	private function guardAgainstInsufficientFunds($price, $totalInserted)
	{
		if ($price > $totalInserted)
		{
			throw new Exception('Not enough money');
		}
	}

	/**
	 * Throw an exception if there is not enough change in the machine.
	 *
	 * @param  double $changeDue
	 * @return void
	 */
	private function guardAgainstInsufficientChange($changeDue, $price)
	{
		if ($changeDue - $price > 0)
		{
			throw new Exception("No coins");
		}
	}

}
