<?php

/**
 *
 * @source http://www.xe.com/symbols.php
 * @author Sebastian Lagemann <mail@degola.de>
 * @package slc
 * @subpackage Twig-extensions
 */

namespace slc\twig_currency_symbols;

use Twig_Extension;
use Twig_SimpleFilter;
use Twig_Environment;

class ReplaceCurrencySymbol extends Twig_Extension
{
	/**
	 * Returns a list of filters.
	 *
	 * @return array
	 */
	public function getFilters()
	{
		return array(
			new Twig_SimpleFilter('replace_currency_symbol', array($this, 'twig_replace_currency_symbol'), array('needs_environment' => true)),
		);
	}

	/**
	 * Name of this extension
	 *
	 * @return string
	 */
	public function getName()
	{
		return 'ReplaceCurrencySymbol';
	}

	public function twig_replace_currency_symbol(Twig_Environment $env, $value)
	{
		$symbol = $value;
		switch($value) {
			case 'EUR':
				$symbol = "€";
				break;
			case 'USD':
				$symbol = "$";
				break;
			case 'TRL':
				$symbol = "₤";
				break;
			case 'GBP':
				$symbol = "£";
				break;
			case 'RUB':
				$symbol = "руб";
				break;
		}
		return $symbol;
	}
}

?>