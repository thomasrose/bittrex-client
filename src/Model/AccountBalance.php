<?php

namespace BittrexClient\Model;

class AccountBalance
{
    /** @var string */
    protected $currency;

    /** @var float */
    protected $balance;

    /** @var float */
    protected $available;

    /** @var float */
    protected $pending;

    /** @var string */
    protected $cryptoAddress;

    /** @var bool */
    protected $requested;

    /** @var string|null */
    protected $uuid;

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return AccountBalance
     */
    public function setCurrency(string $currency): AccountBalance
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return float
     */
    public function getBalance(): float
    {
        return $this->balance;
    }

    /**
     * @param float $balance
     * @return AccountBalance
     */
    public function setBalance(float $balance): AccountBalance
    {
        $this->balance = $balance;
        return $this;
    }

    /**
     * @return float
     */
    public function getAvailable(): float
    {
        return $this->available;
    }

    /**
     * @param float $available
     * @return AccountBalance
     */
    public function setAvailable(float $available): AccountBalance
    {
        $this->available = $available;
        return $this;
    }

    /**
     * @return float
     */
    public function getPending(): float
    {
        return $this->pending;
    }

    /**
     * @param float $pending
     * @return AccountBalance
     */
    public function setPending(float $pending): AccountBalance
    {
        $this->pending = $pending;
        return $this;
    }

    /**
     * @return string
     */
    public function getCryptoAddress(): string
    {
        return $this->cryptoAddress;
    }

    /**
     * @param string $cryptoAddress
     * @return AccountBalance
     */
    public function setCryptoAddress(string $cryptoAddress = null): AccountBalance
    {
        $this->cryptoAddress = $cryptoAddress;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRequested(): bool
    {
        return $this->requested;
    }

    /**
     * @param bool $requested
     * @return AccountBalance
     */
    public function setRequested(bool $requested): AccountBalance
    {
        $this->requested = $requested;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @param null|string $uuid
     * @return AccountBalance
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
        return $this;
    }

    public function __toString()
    {
        return sprintf('%s: %s', $this->currency, $this->balance);
    }
}