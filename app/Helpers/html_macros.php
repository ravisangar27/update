<?php
use Carbon\Carbon;

if (!function_exists('set_active')) {
    function set_active($path, $queryParam = null, $active = 'active')
    {
        $path = is_array($path)
            ? $path
            : [$path, "{$path}/*"];

        foreach ($path as $p) {
            $checkPath[] = "{$p}.index";
            $checkPath[] = "{$p}.show";
            $checkPath[] = "{$p}.create";
            $checkPath[] = "{$p}.edit";
        }

        if (
            (call_user_func_array('Request::routeIs', $checkPath) ? $active : '')
            &&
            (is_array($queryParam) && count($queryParam) === 2)
        ) {
            return request($queryParam[0]) === $queryParam[1]
                ? $active
                : '';
        }

        return call_user_func_array('Request::routeIs', $checkPath) ? $active : '';
    }
}

if (!function_exists('set_active_direct')) {
    function set_active_direct($path, $queryParam = null, $active = 'active')
    {
        if (
            (call_user_func_array('Request::routeIs', (array)$path) ? $active : '')
            &&
            (is_array($queryParam) && count($queryParam) === 2)
        ) {
            return request($queryParam[0]) === $queryParam[1]
                ? $active
                : '';
        }

        return call_user_func_array('Request::routeIs', (array)$path) ? $active : '';
    }
}

if (!function_exists('set_errorClass')) {
    function set_errorClass(\Illuminate\Support\ViewErrorBag $errors, $fieldNames = [])
    {
        foreach ((array)$fieldNames as $fieldName) {
            if ($errors->has($fieldName)) {
                return 'has-error';
            }
        }

        return '';
    }
}

if (!function_exists('str_limit_word')) {
    function str_limit_word($string, $limit = 100)
    {
        if (mb_strlen($string) > $limit) {
            return preg_replace("/^(.{1,$limit})(\s.*|$)/s", '\\1…', $string);
        }
        return $string;
    }
}

if (!function_exists('url_link')) {
    function url_link($url, $targetBlank = true)
    {
        $target = $targetBlank
            ? ' target="_blank"'
            : '';

        $shortUrl = str_replace('www.', '', parse_url($url, PHP_URL_HOST));

        return "<a href=\"{$url}\"{$target}>{$shortUrl}</a>";
    }
}

if (!function_exists('url_link_with_google')) {
    function url_link_with_google($url, $googleSearch)
    {
        if (mb_strlen($url)) {
            $shortUrl = str_replace('www.', '', parse_url($url, PHP_URL_HOST));

            return "<a href=\"{$url}\" target=\"_blank\">{$shortUrl}</a>";
        } else {
            $url = 'https://google.de/search?q=' . urlencode(implode(' ', array_filter($googleSearch)));

            return "<em><a href=\"{$url}\" target=\"_blank\">Google-Suche&hellip;</a></em>";
        }
    }
}

if (!function_exists('manufacturer_link')) {
    function manufacturer_link($manufacturer, $attributes = [], $attribute = 'name')
    {
        $displayText = $manufacturer
            ? $manufacturer->{$attribute}
            : null;

        return model_link($manufacturer, $displayText, 'manufacturer.show', $attributes);
    }
}

if (!function_exists('characteristic_link')) {
    function characteristic_link($characteristic, $attributes = [], $attribute = 'name')
    {
        $displayText = $characteristic
            ? $characteristic->{$attribute}
            : null;

        return model_link($characteristic, $displayText, 'characteristic.show', $attributes);
    }
}

if (!function_exists('device_type_link')) {
    function device_type_link($deviceType, $attributes = [], $attribute = 'name')
    {
        $displayText = $deviceType
            ? $deviceType->{$attribute}
            : null;

        return model_link($deviceType, $displayText, 'device-type.show', $attributes);
    }
}

if (!function_exists('device_link')) {
    function device_link($device, $attributes = [], $attribute = 'name')
    {
        $displayText = $device
            ? $device->{$attribute}
            : null;

        return model_link($device, $displayText, 'device.show', $attributes);
    }
}

if (!function_exists('category_link')) {
    function category_link($category, $attributes = [], $attribute = 'name')
    {
        $displayText = $category
            ? $category->{$attribute}
            : null;

        return model_link($category, $displayText, 'category.show', $attributes);
    }
}

if (!function_exists('test_link')) {
    function test_link($test, $attributes = [], $attribute = 'test_date')
    {
        $displayText = $test
            ? $test->{$attribute}
            : null;

        return model_link($test, $displayText, 'test.show', $attributes);
    }
}

if (!function_exists('place_link')) {
    function place_link($place, $attributes = [], $attribute = 'name')
    {
        $displayText = $place
            ? $place->{$attribute}
            : null;

        return model_link($place, $displayText, 'place.show', $attributes);
    }
}

if (!function_exists('client_link')) {
    function client_link($client, $attributes = [], $attribute = 'name_intern')
    {
        $displayText = $client
            ? $client->{$attribute}
            : null;

        return model_link($client, $displayText, 'client.show', $attributes);
    }
}

if (!function_exists('user_link')) {
    function user_link($user, $attributes = [], $attribute = 'username')
    {
        $displayText = $user
            ? $user->{$attribute}
            : null;

        return model_link($user, $displayText, 'users.show', $attributes);
    }
}

if (!function_exists('model_link')) {
    function model_link($model, $displayText = '--', $routeLink, array $attributes = [], $force = false)
    {
        if (method_exists($model, 'trashed')) {
            return $model->trashed()
                ? $displayText
                : link_to_route($routeLink, $displayText, $model, $attributes);
        }

        if ($force) {
            return link_to_route($routeLink, $displayText, $model, $attributes);
        }
        return $displayText;
    }
}

if (!function_exists('phone_link')) {
    function phone_link($number)
    {
        if (strlen($number)) {
            $numberWithoutSpaces = str_replace(' ', '', $number);

            return link_to("tel:{$numberWithoutSpaces}", $number);
        }
        return '';
    }
}

if (!function_exists('email_link')) {
    function email_link($email)
    {
        return mb_strlen($email)
            ? link_to("mailto:{$email}", $email)
            : '';
    }
}

if (!function_exists('test_date_month_textual')) {
    function test_date_month_textual($test)
    {
        return $test
            ? Carbon::parse($test->test_date)->formatLocalized('%d. %B %Y')
            : '';
    }
}

if (!function_exists('test_date_textual')) {
    function test_date_textual($test, $format = '%d. %B %Y')
    {
        return $test
            ? Carbon::parse($test->test_date)->formatLocalized($format)
            : '';
    }
}

if (!function_exists('last_time_test_textual')) {
    function last_time_test_textual($test, $format = '%B %Y')
    {
        return $test
            ? $test->last_time_test ? Carbon::parse($test->last_time_test)->formatLocalized($format) : ''
            : '';
    }
}

if (!function_exists('next_time_test_textual')) {
    function next_time_test_textual($test)
    {
        return $test
            ? $test->next_time_test ? Carbon::parse($test->next_time_test)->formatLocalized('%B %Y') : ''
            : '';
    }
}

if (!function_exists('next_time_test_for_overview')) {
    function next_time_test_for_overview($test, $format = '%B %Y')
    {
        $taday = Carbon::now();
        return $test
            ? $test->next_time_test ? Carbon::parse($test->next_time_test)->gte($taday) ?
            Carbon::parse($test->next_time_test)->formatLocalized($format) : 'SOFORT' : ''
            : '';
    }
}

if (!function_exists('inactive_at_textual')) {
    function inactive_at_textual($device, $format = '%d %B %Y')
    {
        return $device->inactive_at ?
             Carbon::parse($device->inactive_at)->formatLocalized($format) : '';
    }
}
