<?php

namespace BittrexClient\Model;

class Currency
{
    /** @var string */
    protected $currency;

    /** @var string */
    protected $currencyLong;

    /** @var int */
    protected $minConfirmation;

    /** @var float */
    protected $txFee;

    /** @var bool */
    protected $isActive;

    /** @var string */
    protected $coinType;

    /** @var string|null */
    protected $baseAddress;

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return Currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyLong()
    {
        return $this->currencyLong;
    }

    /**
     * @param string $currencyLong
     * @return Currency
     */
    public function setCurrencyLong($currencyLong)
    {
        $this->currencyLong = $currencyLong;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinConfirmation()
    {
        return $this->minConfirmation;
    }

    /**
     * @param int $minConfirmation
     * @return Currency
     */
    public function setMinConfirmation($minConfirmation)
    {
        $this->minConfirmation = $minConfirmation;
        return $this;
    }

    /**
     * @return float
     */
    public function getTxFee()
    {
        return $this->txFee;
    }

    /**
     * @param float $txFee
     * @return Currency
     */
    public function setTxFee($txFee)
    {
        $this->txFee = $txFee;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     * @return Currency
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * @return string
     */
    public function getCoinType()
    {
        return $this->coinType;
    }

    /**
     * @param string $coinType
     * @return Currency
     */
    public function setCoinType($coinType)
    {
        $this->coinType = $coinType;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getBaseAddress()
    {
        return $this->baseAddress;
    }

    /**
     * @param null|string $baseAddress
     * @return Currency
     */
    public function setBaseAddress($baseAddress)
    {
        $this->baseAddress = $baseAddress;
        return $this;
    }
}