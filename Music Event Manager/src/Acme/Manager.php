<?php

namespace Acme;

class Manager
{
    /**
     * Hires bands for a number of given shows.
     * 
     * @param stdObject $input the input
     * 
     * @return string
     */
    public static function hireBands($input)
    {
        $response = [];

        foreach ($input->shows as $show) {
            $hireableBands = static::checkGenre($show, $input->bands);
            $hireableBands = static::checkAvailability($show, $hireableBands);
            $response[] = sprintf("%s-%s", $show->id, count($hireableBands));
        }

        return implode(',', $response);
    }

    /**
     * Finds bands in a given array that match a given show's genre.
     * 
     * @param stdClass $show  the show
     * @param array    $bands the bands
     * 
     * @return array
     */
    protected function checkGenre($show, array $bands)
    {
        return array_filter($bands, function($band) use($show) {
            return $show->style == $band->style;
        });
    }

    /**
     * Finds bands in a given array that are available on a given show's date.
     * 
     * @param stdClass $show  the show
     * @param array    $bands the bands
     * 
     * @return array
     */
    protected function checkAvailability($show, array $bands)
    {
        return array_filter($bands, function($band) use($show) {
            return static::dateIsInRange($show->date, $band->date_range);
        });
    }

    /**
     * Checks that the given date falls within the given date range.
     * 
     * @param string $date      the date
     * @param string $dateRange the date range
     * 
     * @return boolean
     */
    protected function dateIsInRange($date, $dateRange)
    {
        $dateRange = explode('/', $dateRange);
        return $date >= $dateRange[0] && $date <= $dateRange[1];
    }
}
