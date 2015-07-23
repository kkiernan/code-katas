<?php

namespace Acme;

class Band
{
    /**
     * @var string
     */
    protected $style;

    /**
     * @var string
     */
    protected $freePeriod;

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
     * Gets the value of freePeriod.
     *
     * @return string
     */
    public function getFreePeriod()
    {
        return $this->freePeriod;
    }

    /**
     * Sets the value of freePeriod.
     *
     * @param string $freePeriod the free period
     *
     * @return self
     */
    protected function setFreePeriod($freePeriod)
    {
        $this->freePeriod = $freePeriod;

        return $this;
    }
}
