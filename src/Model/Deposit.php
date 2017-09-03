<?php

namespace BittrexClient\Model;

class Deposit
{
    /** @var int */
    protected $id;

    /** @var float */
    protected $amount;

    /** @var string */
    protected $currency;

    /** @var int */
    protected $confirmations;

    /** @var \DateTime */
    protected $lastUpdated;

    /** @var string */
    protected $transactionId;

    /** @var string */
    protected $cryptoAddress;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Deposit
     */
    public function setId(int $id): Deposit
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return Deposit
     */
    public function setAmount(float $amount): Deposit
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return Deposit
     */
    public function setCurrency(string $currency): Deposit
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return int
     */
    public function getConfirmations(): int
    {
        return $this->confirmations;
    }

    /**
     * @param int $confirmations
     * @return Deposit
     */
    public function setConfirmations(int $confirmations): Deposit
    {
        $this->confirmations = $confirmations;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastUpdated(): \DateTime
    {
        return $this->lastUpdated;
    }

    /**
     * @param \DateTime $lastUpdated
     * @return Deposit
     */
    public function setLastUpdated(\DateTime $lastUpdated): Deposit
    {
        $this->lastUpdated = $lastUpdated;
        return $this;
    }

    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     * @return Deposit
     */
    public function setTransactionId(string $transactionId): Deposit
    {
        $this->transactionId = $transactionId;
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
     * @return Deposit
     */
    public function setCryptoAddress(string $cryptoAddress): Deposit
    {
        $this->cryptoAddress = $cryptoAddress;
        return $this;
    }
}
