<?php

namespace Acme;

class DateHelper
{
    public function parseDateRange($string)
    {
        $keys = ['start', 'end'];

        $dates = explode('/', $string);

        return array_combine($keys, $dates);
    }
}
