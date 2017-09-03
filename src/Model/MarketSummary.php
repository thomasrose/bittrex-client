<?php

namespace BittrexClient\Model;

class MarketSummary
{
    /** @var string */
    protected $marketName;

    /** @var float */
    protected $high;

    /** @var float */
    protected $low;

    /** @var float */
    protected $volume;

    /** @var float */
    protected $last;

    /** @var float */
    protected $baseVolume;

    /** @var \DateTime */
    protected $timeStamp;

    /** @var float */
    protected $bid;

    /** @var float */
    protected $ask;

    /** @var int */
    protected $openBuyOrders;

    /** @var int */
    protected $openSellOrders;

    /** @var float */
    protected $prevDay;

    /** @var \DateTime */
    protected $created;

    /** @var string|null */
    protected $displayMarketName;

    /**
     * @return string
     */
    public function getMarketName()
    {
        return $this->marketName;
    }

    /**
     * @param string $marketName
     * @return MarketSummary
     */
    public function setMarketName($marketName)
    {
        $this->marketName = $marketName;
        return $this;
    }

    /**
     * @return float
     */
    public function getHigh()
    {
        return $this->high;
    }

    /**
     * @param float $high
     * @return MarketSummary
     */
    public function setHigh($high)
    {
        $this->high = $high;
        return $this;
    }

    /**
     * @return float
     */
    public function getLow()
    {
        return $this->low;
    }

    /**
     * @param float $low
     * @return MarketSummary
     */
    public function setLow($low)
    {
        $this->low = $low;
        return $this;
    }

    /**
     * @return float
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param float $volume
     * @return MarketSummary
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
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
     * @return MarketSummary
     */
    public function setLast($last)
    {
        $this->last = $last;
        return $this;
    }

    /**
     * @return float
     */
    public function getBaseVolume()
    {
        return $this->baseVolume;
    }

    /**
     * @param float $baseVolume
     * @return MarketSummary
     */
    public function setBaseVolume($baseVolume)
    {
        $this->baseVolume = $baseVolume;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTimeStamp()
    {
        return $this->timeStamp;
    }

    /**
     * @param \DateTime $timeStamp
     * @return MarketSummary
     */
    public function setTimeStamp($timeStamp)
    {
        $this->timeStamp = $timeStamp;
        return $this;
    }

    /**
     * @return float
     */
    public function getBid()
    {
        return $this->bid;
    }

    /**
     * @param float $bid
     * @return MarketSummary
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
     * @return MarketSummary
     */
    public function setAsk($ask)
    {
        $this->ask = $ask;
        return $this;
    }

    /**
     * @return int
     */
    public function getOpenBuyOrders()
    {
        return $this->openBuyOrders;
    }

    /**
     * @param int $openBuyOrders
     * @return MarketSummary
     */
    public function setOpenBuyOrders($openBuyOrders)
    {
        $this->openBuyOrders = $openBuyOrders;
        return $this;
    }

    /**
     * @return int
     */
    public function getOpenSellOrders()
    {
        return $this->openSellOrders;
    }

    /**
     * @param int $openSellOrders
     * @return MarketSummary
     */
    public function setOpenSellOrders($openSellOrders)
    {
        $this->openSellOrders = $openSellOrders;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrevDay()
    {
        return $this->prevDay;
    }

    /**
     * @param float $prevDay
     * @return MarketSummary
     */
    public function setPrevDay($prevDay)
    {
        $this->prevDay = $prevDay;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     * @return MarketSummary
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDisplayMarketName()
    {
        return $this->displayMarketName;
    }

    /**
     * @param null|string $displayMarketName
     * @return MarketSummary
     */
    public function setDisplayMarketName($displayMarketName)
    {
        $this->displayMarketName = $displayMarketName;
        return $this;
    }
}