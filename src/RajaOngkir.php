<?php namespace Timex;
/**
* @author  : Yudi Purwanto <yp@timexstudio.com or purwantoyudi42@gmail.com>
* @link    : https://timexstudio.com (jangan meminta menjadi sempurna, tapi jadilah yang berguna)
* @since   : 28 Oct 2015
**/
final class RajaOngkir
{
	private static $instance;
	private static $api_key;
	private static $base_url = "http://rajaongkir.com/api/";
	
	public static function getInstance()
	{
		if (!(self::$instance instanceof self))
		{
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	public function __construct($api_key, $additional_headers = array())
	{
		RajaOngkir::$api_key = $api_key;
        \Unirest::defaultHeader("Content-Type", "application/x-www-form-urlencoded");
        \Unirest::defaultHeader("key", RajaOngkir::$api_key);
        foreach ($additional_headers as $key => $value)
		{
            \Unirest::defaultHeader($key, $value);
        }
	}
	
	private function __clone()
	{
		
	}
	
	public static function GetProvince($province_id = null)
	{
		$params = (is_null($province_id)) ? null : array('id' => $province_id);
		return \Unirest::get(RajaOngkir::$base_url . "province", array(), $params);
	}
	
	public static function GetCity($province_id = null, $city_id = null)
	{
		$params = (is_null($province_id)) ? null : array('province' => $province_id);
        if (!is_null($city_id))
		{
            $params['id'] = $city_id;
        }
		return \Unirest::get(RajaOngkir::$base_url . "city", array(), $params);
	}
	
	public static function GetCost($origin, $destination, $weight, $courier = null)
	{
		$params = [
            'origin' => $origin,
            'destination' => $destination,
            'weight' => $weight,
        ];
        if (!is_null($courier))
		{
            $params['courier'] = $courier;
        }
		return \Unirest::post(RajaOngkir::$base_url . "cost", array(), http_build_query($params));
	}
}

	