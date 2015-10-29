<?php 
/**
* @author  : Yudi Purwanto <yp@timexstudio.com or purwantoyudi42@gmail.com>
* @link    : https://timexstudio.com (jangan meminta menjadi sempurna, tapi jadilah yang berguna)
* @since   : 28 Oct 2015
**/
require 'vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__);
$dotenv->load();

$ongkir = new Timex\RajaOngkir(getenv("RAJAONGKIR_KEY"));

$rajaongkir = Timex\RajaOngkir::GetProvince();
// $rajaongkir = RajaOngkir::GetCity();
// $rajaongkir = RajaOngkir::GetCost(501, 114, 1700);

$result = $rajaongkir->raw_body;

echo $result;