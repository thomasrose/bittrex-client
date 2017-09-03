<?php

namespace BittrexClient\Model;

class Market
{
    /** @var string */
    protected $marketCurrency;

    /** @var string */
    protected $baseCurrency;

    /** @var string */
    protected $marketCurrencyLong;

    /** @var string */
    protected $baseCurrencyLong;

    /** @var float */
    protected $minTradeSize;

    /** @var string */
    protected $marketName;

    /** @var bool */
    protected $active;

    /** @var \DateTime */
    protected $created;

    /**
     * @return string
     */
    public function getMarketCurrency()
    {
        return $this->marketCurrency;
    }

    /**
     * @param string $marketCurrency
     * @return Market
     */
    public function setMarketCurrency($marketCurrency)
    {
        $this->marketCurrency = $marketCurrency;
        return $this;
    }

    /**
     * @return string
     */
    public function getBaseCurrency()
    {
        return $this->baseCurrency;
    }

    /**
     * @param string $baseCurrency
     * @return Market
     */
    public function setBaseCurrency($baseCurrency)
    {
        $this->baseCurrency = $baseCurrency;
        return $this;
    }

    /**
     * @return string
     */
    public function getMarketCurrencyLong()
    {
        return $this->marketCurrencyLong;
    }

    /**
     * @param string $marketCurrencyLong
     * @return Market
     */
    public function setMarketCurrencyLong($marketCurrencyLong)
    {
        $this->marketCurrencyLong = $marketCurrencyLong;
        return $this;
    }

    /**
     * @return string
     */
    public function getBaseCurrencyLong()
    {
        return $this->baseCurrencyLong;
    }

    /**
     * @param string $baseCurrencyLong
     * @return Market
     */
    public function setBaseCurrencyLong($baseCurrencyLong)
    {
        $this->baseCurrencyLong = $baseCurrencyLong;
        return $this;
    }

    /**
     * @return float
     */
    public function getMinTradeSize()
    {
        return $this->minTradeSize;
    }

    /**
     * @param float $minTradeSize
     * @return Market
     */
    public function setMinTradeSize($minTradeSize)
    {
        $this->minTradeSize = $minTradeSize;
        return $this;
    }

    /**
     * @return string
     */
    public function getMarketName()
    {
        return $this->marketName;
    }

    /**
     * @param string $marketName
     * @return Market
     */
    public function setMarketName($marketName)
    {
        $this->marketName = $marketName;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return Market
     */
    public function setActive($active)
    {
        $this->active = $active;
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
     * @return Market
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }
}