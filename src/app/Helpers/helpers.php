<?php

use App\Helpers\Initials;
use App\Models\CompanySetting;
use App\Models\Currency;
use App\Models\Country;
use App\Models\ExpenseCategory;
use App\Models\PaymentMethod;
use App\Models\Plan;
use App\Models\ProductUnit;
use App\Models\SystemSetting;
use App\Models\ThemeSetting;
use App\Models\TaxType;
use App\Services\DateFormats;
use App\Services\TimeZones;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

if (! function_exists('initials')) {
    /**
     * Get the initials of given name
     *
     * @param string $string
     *
     * @return string
     */
    function initials($string)
    {
        return Initials::generate($string);
    }
}

if (! function_exists('get_all_plans_available')) {
    /**
     * get_all_plans_available
     *
     * @return collect
     */
    function get_all_plans_available()
    {
        return Plan::getSelect2Array();
    }
}

if (! function_exists('get_system_setting')) {
    /**
     * get_system_setting
     *
     * @return string
     */
    function get_system_setting($key)
    {
        return SystemSetting::getSetting($key);
    }
}

if (! function_exists('get_company_setting')) {
    /**
     * get_company_setting
     *
     * @return string
     */
    function get_company_setting($key, $company_id)
    {
        return CompanySetting::getSetting($key, $company_id);
    }
}

if (! function_exists('get_application_currency')) {
    /**
     * get_application_currency
     *
     * @return string
     */
    function get_application_currency()
    {
        return Currency::where('code', get_system_setting('application_currency'))->first();
    }
}

if (! function_exists('get_theme_setting')) {
    /**
     * get_theme_setting
     *
     * @return string
     */
    function get_theme_setting($theme, $key)
    {
        return ThemeSetting::getSetting($theme, $key);
    }
}

if (! function_exists('get_countries_select2_array')) {
    /**
     * get_countries_select2_array
     *
     * @return collect
     */
    function get_countries_select2_array()
    {
        return Country::getSelect2Array();
    }
}

if (! function_exists('get_currencies_select2_array')) {
    /**
     * get_currencies_select2_array
     *
     * @return collect
     */
    function get_currencies_select2_array()
    {
        return Currency::getSelect2Array();
    }
}

if (! function_exists('get_product_units_select2_array')) {
    /**
     * get_product_units_select2_array
     *
     * @return collect
     */
    function get_product_units_select2_array($company_id)
    {
        return ProductUnit::getSelect2Array($company_id);
    }
}

if (! function_exists('get_tax_types_select2_array')) {
    /**
     * get_tax_types_select2_array
     *
     * @return collect
     */
    function get_tax_types_select2_array($company_id)
    {
        return TaxType::getSelect2Array($company_id);
    }
}

if (! function_exists('get_payment_methods_select2_array')) {
    /**
     * get_payment_methods_select2_array
     *
     * @return collect
     */
    function get_payment_methods_select2_array($company_id)
    {
        return PaymentMethod::getSelect2Array($company_id);
    }
}

if (! function_exists('get_expense_categories_select2_array')) {
    /**
     * get_expense_categories_select2_array
     *
     * @return collect
     */
    function get_expense_categories_select2_array($company_id)
    {
        return ExpenseCategory::getSelect2Array($company_id);
    }
}


if (! function_exists('get_timezones_select2_array')) {
    /**
     * get_timezones_select2_array
     *
     * @return collect
     */
    function get_timezones_select2_array()
    {
        return TimeZones::getSelect2Array();
    }
}

if (! function_exists('get_date_formats_select2_array')) {
    /**
     * get_date_formats_select2_array
     *
     * @return collect
     */
    function get_date_formats_select2_array()
    {
        return DateFormats::getSelect2Array();
    }
}

if (! function_exists('get_languages_select2_array')) {
    /**
     * get_languages_select2_array
     *
     * @return array
     */
    function get_languages_select2_array()
    {
        return [
            ['id' => 'en', 'text' => __('messages.english')],
        ];
    }
}

if (! function_exists('get_months_select2_array')) {
    /**
     * get_months_select2_array
     *
     * @return array
     */
    function get_months_select2_array()
    {
        return [
            ['id' => 1, 'text' => __('messages.january')],
            ['id' => 2, 'text' => __('messages.february')],
            ['id' => 3, 'text' => __('messages.march')],
            ['id' => 4, 'text' => __('messages.april')],
            ['id' => 5, 'text' => __('messages.may')],
            ['id' => 6, 'text' => __('messages.june')],
            ['id' => 7, 'text' => __('messages.july')],
            ['id' => 8, 'text' => __('messages.august')],
            ['id' => 9, 'text' => __('messages.september')],
            ['id' => 10, 'text' => __('messages.november')],
            ['id' => 11, 'text' => __('messages.october')],
            ['id' => 12, 'text' => __('messages.december')],
        ];
    }
}

if (! function_exists('get_custom_field_value_key')) {
    /**
     * get_custom_field_value_key
     *
     * @param string $type
     *
     * @return string
     */
    function get_custom_field_value_key($type)
    {
        switch ($type) {
            case 'Input':
                return 'string_answer';
    
            case 'TextArea':
                return 'string_answer';
    
            case 'Phone':
                return 'number_answer';
    
            case 'Url':
                return 'string_answer';
    
            case 'Number':
                return 'number_answer';
    
            case 'Dropdown':
                return 'string_answer';
    
            case 'Switch':
                return 'boolean_answer';
    
            case 'Date':
                return 'date_answer';
    
            case 'Time':
                return 'time_answer';
    
            case 'DateTime':
                return 'date_time_answer';
    
            default:
                return 'string_answer';
        }
    }
}

if (! function_exists('set_active')) {
    /**
     * Determine if a route is the currently active route.
     *
     * @param  string  $path
     * @param  string  $class
     * @return string
     */
    function set_active($path, $class = 'active')
    {
        return Request::is(config('translation.ui_url').$path) ? $class : '';
    }
}

if (! function_exists('strs_contain')) {
    /**
     * Determine whether any of the provided strings in the haystack contain the needle.
     *
     * @param  array  $haystacks
     * @param  string  $needle
     * @return bool
     */
    function strs_contain($haystacks, $needle)
    {
        $haystacks = (array) $haystacks;

        foreach ($haystacks as $haystack) {
            if (is_array($haystack)) {
                return strs_contain($haystack, $needle);
            } elseif (Str::contains(strtolower($haystack), strtolower($needle))) {
                return true;
            }
        }

        return false;
    }
}

if (! function_exists('array_diff_assoc_recursive')) {
    /**
     * Recursively diff two arrays.
     *
     * @param  array  $arrayOne
     * @param  array  $arrayTwo
     * @return array
     */
    function array_diff_assoc_recursive($arrayOne, $arrayTwo)
    {
        $difference = [];
        foreach ($arrayOne as $key => $value) {
            if (is_array($value) || $value instanceof Illuminate\Support\Collection) {
                if (! isset($arrayTwo[$key])) {
                    $difference[$key] = $value;
                } elseif (! (is_array($arrayTwo[$key]) || $arrayTwo[$key] instanceof Illuminate\Support\Collection)) {
                    $difference[$key] = $value;
                } else {
                    $new_diff = array_diff_assoc_recursive($value, $arrayTwo[$key]);
                    if ($new_diff != false) {
                        $difference[$key] = $new_diff;
                    }
                }
            } elseif (! isset($arrayTwo[$key])) {
                $difference[$key] = $value;
            }
        }

        return $difference;
    }
}

if (! function_exists('str_before')) {
    /**
     * Get the portion of a string before a given value.
     *
     * @param  string  $subject
     * @param  string  $search
     * @return string
     */
    function str_before($subject, $search)
    {
        return $search === '' ? $subject : explode($search, $subject)[0];
    }
}

// Array undot
if (! function_exists('array_undot')) {
    /**
     * Expands a single level array with dot notation into a multi-dimensional array.
     *
     * @param array $dotNotationArray
     *
     * @return array
     */
    function array_undot(array $dotNotationArray)
    {
        $array = [];
        foreach ($dotNotationArray as $key => $value) {
            // if there is a space after the dot, this could legitimately be
            // a single key and not nested.
            if (count(explode('. ', $key)) > 1) {
                $array[$key] = $value;
            } else {
                Arr::set($array, $key, $value);
            }
        }

        return $array;
    }
}