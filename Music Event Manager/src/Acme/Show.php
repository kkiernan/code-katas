<?php

namespace Acme;

class Show
{
    /**
     * @var string
     */
    protected $style;

    /**
     * @var string
     */
    protected $date;

    /**
     * Gets the value of style.
     *
     * @return string
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * Sets the value of style.
     *
     * @param string $style the style
     *
     * @return self
     */
    protected function setStyle($style)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Gets the value of date.
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the value of date.
     *
     * @param string $date the date
     *
     * @return self
     */
    protected function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
}
