<?php

namespace BittrexClient\Model;

class Ticker
{
    /** @var float */
    protected $bid;

    /** @var float */
    protected $ask;

    /** @var float */
    protected $last;

    /**
     * @return float
     */
    public function getBid()
    {
        return $this->bid;
    }

    /**
     * @param float $bid
     * @return Ticker
     */
    public function setBid($bid)
    {
        $this->bid = $bid;
        return $this;
    }

    /**
     * @return float
     */
    public function getAsk()
    {
        return $this->ask;
    }

    /**
     * @param float $ask
     * @return Ticker
     */
    public function setAsk($ask)
    {
        $this->ask = $ask;
        return $this;
    }

    /**
     * @return float
     */
    public function getLast()
    {
        return $this->last;
    }

    /**
     * @param float $last
     * @return Ticker
     */
    public function setLast($last)
    {
        $this->last = $last;
        return $this;
    }
}