<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 4/5/2018
 * Time: 2:02 PM
 */

namespace AppBundle\Twig;


class WordPressPostExtension extends \Twig_Extension {

	public function getFilters()
	{
		return array(
			new \Twig_SimpleFilter('price', array($this, 'priceFilter')),
		);
	}

	public function priceFilter($number, $decimals = 0, $decPoint = '.', $thousandsSep = ',')
	{
		$price = number_format($number, $decimals, $decPoint, $thousandsSep);
		$price = '$'.$price;

		return $price;
	}

	public function getName()
	{
		return 'Wordpres_post_extetion';
	}
}