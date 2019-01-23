<?php

use DrLenux\ZodiacSigns\ZodiacSigns;
use PHPUnit\Framework\TestCase;

class ZodiacSignsTest extends TestCase
{
    public function testZodiacSigns()
    {
        foreach ($this->getData() as $item) {
            $this->assertEquals($item[2], ZodiacSigns::get($item[0], $item[1]));
        }
    }

    protected function getData()
    {
        return [
            [21, 6 , "Gemini"],
            [23, 7, "Leo"],
            [22, 7, "Cancer"],
            [23, 8, "Leo"],
            [24, 8, "Virgo"],
            [21, 12, "Sagittarius"],
            [22, 12, "Capricorn"],
            [25, 3, "Aries"]
        ];
    }
}