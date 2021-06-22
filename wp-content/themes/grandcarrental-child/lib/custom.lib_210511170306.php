<?php

function grandcarrental_format_car_price($car_price = 0)
{
	$return_html = '';
	if(!empty($car_price))
	{
		$tg_car_currency = kirki_get_option('tg_car_currency');
		$tg_car_currency_display = kirki_get_option('tg_car_currency_display');
		$tg_car_currency_thousand_sep = kirki_get_option('tg_car_currency_thousand_sep');
		$tg_car_currency_decimal_sep = kirki_get_option('tg_car_currency_decimal_sep');
		$tg_car_currency_decimal_number = kirki_get_option('tg_car_currency_decimal_number');
		
		// if($tg_car_currency_display == 'before')
		// {
		// 	$return_html.= '<span class="single_car_currency">'.$tg_car_currency.'</span>';
		// }
		
		$return_html.= '<span class="single_car_price">'.number_format(floatval($car_price),$tg_car_currency_decimal_number,$tg_car_currency_decimal_sep,$tg_car_currency_thousand_sep).'</span>';
		
		if($tg_car_currency_display == 'before')
		{
			$return_html.= '<span class="single_car_currency ifb_color_orange">&euro;</span>';
		}
		
		return $return_html;
	}
	else
	{
		return 0;
	}
}