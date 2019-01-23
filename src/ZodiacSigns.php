<?php
/**
 * Created by PhpStorm.
 * User: noname
 * Date: 23.01.19
 * Time: 11:23
 */

namespace DrLenux\ZodiacSigns;


class ZodiacSigns
{
    protected static $vocabulary = [];

    /**
     * @param $language
     * @return array
     */
    public static function getListZodiacs($language)
    {
        return [
            1 => self::translate("Capricorn", $language), // 22.12 - 20.01
            2 => self::translate("Aquarius", $language), // 21.01 - 20.02
            3 => self::translate("Pisces", $language), // 21.02 - 20.03
            4 => self::translate("Aries", $language), // 21.03 - 20.04
            5 => self::translate("Taurus", $language), // 21.04 - 20.05
            6 => self::translate("Gemini", $language), // 21.05 - 21.06
            7 => self::translate("Cancer", $language), // 22.06 - 22.07
            8 => self::translate("Leo", $language), // 23.07 - 23.08
            9 => self::translate("Virgo", $language), // 24.08 - 23.09
            10 => self::translate("Libra", $language), // 24.09 - 23.10
            11 => self::translate("Scorpio", $language), // 24.10 - 22.11
            12 => self::translate("Sagittarius", $language) // 23.11 - 21.12
        ];
    }

    /**
     * @return array
     */
    protected static function getDateZodiacs()
    {
        return [1 => 20, 2 => 20, 3 => 20, 4 => 20, 5 => 20, 6 => 21, 7 => 22, 8 => 23, 9 => 23, 10 => 23, 11 => 22, 12 => 21];
    }

    /**
     * @param int $day
     * @param int $month
     * @param string $language
     *
     * @return string
     */
    public static function get($day, $month, $language = 'US-en')
    {
        return self::getDateZodiacs()[$month] >= $day
            ? self::getListZodiacs($language)[$month]
            : self::getListZodiacs($language)[$month % 12 + 1];
    }

    /**
     * @param string $key
     * @param string $language
     *
     * @return string|null
     */
    protected static function translate($key, $language)
    {
        if (empty(self::$vocabulary[$language])) {
            self::$vocabulary[$language] = yaml_parse_file(__DIR__ . '/translate/' . $language . '.yml');
        }

        return (isset(self::$vocabulary[$language][$key])) ? self::$vocabulary[$language][$key] : null;
    }

    /**
     * @param string $language
     * @param array $data
     */
    public static function addVocabulary($language, array $data)
    {
        self::$vocabulary[$language] = $data;
    }
}