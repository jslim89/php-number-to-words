<?php
/**
 * Convert the number to malay words
 * 
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2016 Js Lim. All rights reserved.
 * @author Js Lim <jslim89@gmail.com> 
 * @license MIT {@link https://opensource.org/licenses/MIT}
 */
class NumberToWordsMalay
{
    public static function toWords($number)
    {
        $text = '';

        while ($number > 0) {
            if ($number >= 1000000) {
                $digit_words = floor($number / 1000000);
                $number = $number % 1000000;
                $text .= self::digitToWords($digit_words) . ' juta ';
            } else if ($number >= 1000) {
                $digit_words = floor($number / 1000);
                $number = $number % 1000;
                $text .= self::digitToWords($digit_words) . ' ribu ';
            } else if ($number >= 100) {
                $digit_words = floor($number / 100);
                $number = $number % 100;
                $text .= self::digitToWords($digit_words) . ' ratus ';
            } else {
                $text .= self::digitToWords($number);
                break;
            }
        }
        return trim($text);
    }

    protected static function digitToWords($digit)
    {
        if ($digit >= 1000) {
            return 'ribu ' . self::digitToWords($digit % 1000);
        } else if ($digit >= 100) {
            return self::digitToWords(floor($digit / 100)) . ' ratus ' . self::digitToWords($digit % 100);
        } else if ($digit >= 20) {
            return self::digitToWords(floor($digit / 10)) . ' puluh ' . self::digitToWords($digit % 10);
        } else if ($digit > 11) {
            return self::digitToWords($digit % 10) . ' belas';
        } else if ($digit == 11) {
            return 'sebelas';
        } else if ($digit == 10) {
            return 'sepuluh';
        } else if ($digit == 9) {
            return 'sembilan';
        } else if ($digit == 8) {
            return 'lapan';
        } else if ($digit == 7) {
            return 'tujuh';
        } else if ($digit == 6) {
            return 'enam';
        } else if ($digit == 5) {
            return 'lima';
        } else if ($digit == 4) {
            return 'empat';
        } else if ($digit == 3) {
            return 'tiga';
        } else if ($digit == 2) {
            return 'dua';
        } else if ($digit == 1) {
            return 'satu';
        }

        return '';
    }
}
