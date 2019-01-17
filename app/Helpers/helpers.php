<?php

function bannerImg()
{
    $context = stream_context_create(['http' => ['header' => 'Connection: close\r\n']]);
    $url = 'https://viblo.asia/';
    $start = config('view.start');
    $matchLeng = config('view.maxBanner');
    $content = file_get_contents($url, false, $context, $start, $matchLeng);
    $data = preg_match('/<div class="container px-0"><img src="(.*?)"/is', $content, $match);
    if (isset($match[1])) {
        return $match[1];
    } else {
        return null;
    }
}

function setTimeShort($value)
{
    if (Session::get('website-language') == 'vi') {
        \Carbon\Carbon::setLocale('vi');
    }
    if ($value) {
        $result = '';
        $time = $value->diffForHumans(\Carbon\Carbon::now());
        $split = explode(' ', $time);
        switch ($split[1]) {
            case __('settings.time.full.seconds'):
                return $split[0] . ' ' . __('settings.time.short.seconds');
                break;
            case __('settings.time.full.minutes'):
                return $split[0] . ' ' . __('settings.time.short.minutes');
                break;
            case __('settings.time.full.hours'):
                return $split[0] . ' ' . __('settings.time.short.hours');
                break;
            case __('settings.time.full.days'):
                return $split[0] . ' ' . __('settings.time.short.days');
                break;
            default:
                return $split[0] . ' ' . __('settings.time.short.weeks');
                break;
        }
    } else {
        return __('settings.book.not_date');
    }
}

function setTimeDefault($value)
{
    if (Session::get('website-language') == 'vi') {
        \Carbon\Carbon::setLocale('vi');
    }
    if ($value) {
        return $value->diffForHumans(\Carbon\Carbon::now());
    } else {
        return __('settings.book.not_date');
    }
}

function getDay($value1, $value2)
{
    return date('d/m/y', strtotime($value1) + $value2 * 86400);
}
