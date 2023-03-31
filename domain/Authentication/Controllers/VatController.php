<?php

namespace Domain\Authentication\Controllers;

use App\Http\Controllers\Controller;

class VatController extends Controller
{
    /**
     * Normalizes form of the VAT number
     * @param string $number VAT number in any valid format
     * @return string|false normalized VAT number
     */
    public static function normalize($number)
    {
        if (is_null($number) || strlen($number) <= 2) {
            return false;
        }

        $number = str_replace(array(' ', '-'), '', $number);
        $number = strtoupper(trim($number));

        if (preg_match('/^[A-Z]{2}[A-Z0-9+*]{2,12}$/', $number) != 1) {
            return false;
        }

        return $number;
    }

    /**
     * Checks if specified VAT number is valid
     * @param string $number input number
     * @return bool true if number is valid
     */
    public static function is_valid($number): bool
    {
        if (! ($number = self::normalize($number))) {
            return false;
        }

        $map = array(
            'AT' => '/^ATU\\d{8}$/',
            'BE' => '/^BE[0-1]{1}\\d{9}$/',
            'BG' => '/^BG\\d{9,10}$/',
            'CY' => '/^CY\\d{8}[A-Z]{1}$/',
            'CZ' => '/^CZ\\d{8,10}$/',
            'DE' => '/^DE\\d{9}$/',
            'DK' => '/^DK\\d{8}$/',
            'EE' => '/^EE\\d{9}$/',
            'EL' => '/^EL\\d{9}$/',
            'ES' => '/^ES[A-Z0-9]{1}\\d{7}[A-Z0-9]{1}$/',
            'FI' => '/^FI\\d{8}$/',
            'FR' => '/^FR[A-Z0-9]{2}\\d{9}$/',
            'HR' => '/^HR\\d{11}$/',
            'HU' => '/^HU\\d{8}$/',
            'IE' => '/^IE[A-Z0-9+*]{8,9}$/',
            'IT' => '/^IT\\d{11}$/',
            'LT' => '/^LT\\d{9,12}$/',
            'LU' => '/^LU\\d{8}$/',
            'LV' => '/^LV\\d{11}$/',
            'MT' => '/^MT\\d{8}$/',
            'NL' => '/^NL[A-Z0-9+*]{12}$/',
            'PL' => '/^PL\\d{10}$/',
            'PT' => '/^PT\\d{9}$/',
            'RO' => '/^RO\\d{2,10}$/',
            'SE' => '/^SE\\d{12}$/',
            'SI' => '/^SI\\d{8}$/',
            'SK' => '/^SK\\d{10}$/',
            'XI' => '/^XI[A-Z0-9]{5,12}$/'
        );

        $cc = substr($number, 0, 2);
        $num = substr($number, 2);

        if (!array_key_exists($cc, $map)) {
            return false;
        }

        if (preg_match($map[$cc], $number) != 1) {
            return false;
        }

        if ($cc == 'PL') {
            return NIP::is_valid($num);
        }

        return true;
    }
}
