<?php
/**
 * Convert the number to english words
 * 
 * @package 
 * @version $Id$
 * @copyright Copyright (C) 2016 Js Lim. All rights reserved.
 * @author Js Lim <jslim89@gmail.com> 
 * @license MIT {@link https://opensource.org/licenses/MIT}
 */
class NumberToWordsEnglish
{
    public static function toWords($number)
    {
        $text = '';

        while ($number > 0) {
            if ($number >= 1000000) {
                $digit_words = floor($number / 1000000);
                $number = $number % 1000000;
                $text .= self::digitToWords($digit_words) . ' million' . ($number == 0 ? '' : ' and ');
            } else if ($number >= 1000) {
                $digit_words = floor($number / 1000);
                $number = $number % 1000;
                $text .= self::digitToWords($digit_words) . ' thousand' . ($number == 0 ? '' : ' and ');
            } else if ($number >= 100) {
                $digit_words = floor($number / 100);
                $number = $number % 100;
                $text .= self::digitToWords($digit_words) . ' hundred' . ($number == 0 ? '' : ' and ');
            } else {
                $text .= self::digitToWords($number);
                break;
            }
        }
        return $text;
    }

    protected static function digitToWords($digit)
    {
        if ($digit >= 1000) {
            return 'thousand and ' . self::digitToWords($digit % 1000);
        } else if ($digit >= 100) {
            return self::digitToWords(floor($digit / 100)) . ' hundred and ' . self::digitToWords($digit % 100);
        } else if ($digit >= 90) {
            return 'ninety ' . self::digitToWords($digit % 90);
        } else if ($digit >= 80) {
            return 'eighty ' . self::digitToWords($digit % 80);
        } else if ($digit >= 70) {
            return 'seventy ' . self::digitToWords($digit % 70);
        } else if ($digit >= 60) {
            return 'sixty ' . self::digitToWords($digit % 60);
        } else if ($digit >= 50) {
            return 'fifty ' . self::digitToWords($digit % 50);
        } else if ($digit >= 40) {
            return 'forty ' . self::digitToWords($digit % 40);
        } else if ($digit >= 30) {
            return 'thirty ' . self::digitToWords($digit % 30);
        } else if ($digit >= 20) {
            return 'twenty ' . self::digitToWords($digit % 20);
        } else if ($digit == 19) {
            return 'nineteen';
        } else if ($digit == 18) {
            return 'eighteen';
        } else if ($digit == 17) {
            return 'seventeen';
        } else if ($digit == 16) {
            return 'sixteen';
        } else if ($digit == 15) {
            return 'fifteen';
        } else if ($digit == 14) {
            return 'fourteen';
        } else if ($digit == 13) {
            return 'thirteen';
        } else if ($digit == 12) {
            return 'twelve';
        } else if ($digit == 11) {
            return 'eleven';
        } else if ($digit == 10) {
            return 'ten';
        } else if ($digit == 9) {
            return 'nine';
        } else if ($digit == 8) {
            return 'eight';
        } else if ($digit == 7) {
            return 'seven';
        } else if ($digit == 6) {
            return 'six';
        } else if ($digit == 5) {
            return 'five';
        } else if ($digit == 4) {
            return 'four';
        } else if ($digit == 3) {
            return 'three';
        } else if ($digit == 2) {
            return 'two';
        } else if ($digit == 1) {
            return 'one';
        }

        return '';
    }
}
