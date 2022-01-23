<?php

namespace Infrastructure\App\Service;

use Infrastructure\App\Model\Config;

class ShortUrlCodeService {
    public static function generateCode(): string {
        $chars = '-0123456789_abcdefghijklmnopqrstuvwxyz';
        $url_config = Config::lockForUpdate()->find('short_url_code');
        $value = $url_config->config_value;
        // Change value string into array of characters
        $value_array = str_split($value);

        // map each character to the index in the chars string
        $value_array = array_map(function($char) use ($chars) {
            return strpos($chars, $char);
        }, $value_array);

        // reverse the value array
        $value_array = array_reverse($value_array);
        $value_array[0]++;

        // For each index, if it is greater than the length of the chars string, set it to 0 and increment the next element
        for ($i = 0; $i < count($value_array); $i++) {
            if ($value_array[$i] >= strlen($chars)) {
                $value_array[$i] = 0;
                if (isset($value_array[$i + 1])) {
                    $value_array[$i + 1]++;
                } else {
                    $value_array[$i + 1] = 0;
                }
            }
        }

        // map each index back to a character
        $value_array = array_map(function($index) use ($chars) {
            return $chars[$index];
        }, $value_array);

        // join the array back into a string
        $value = implode('', array_reverse($value_array));

        // update the config value
        $url_config->config_value = $value;
        $url_config->save();
        return $value;
    }
}