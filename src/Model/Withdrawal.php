<?php

namespace BittrexClient\Model;

class Withdrawal
{
    /** @var string */
    protected $paymentUuid;

    /** @var string */
    protected $currency;

    /** @var float */
    protected $amount;

    /** @var string */
    protected $address;

    /** @var \DateTime */
    protected $opened;

    /** @var bool */
    protected $authorized;

    /** @var bool */
    protected $pendingPayment;

    /** @var float */
    protected $transactionCost;

    /** @var string|null */
    protected $transactionId;

    /** @var bool */
    protected $cancelled;

    /** @var bool */
    protected $invalidAddress;

    /**
     * @return string
     */
    public function getPaymentUuid(): string
    {
        return $this->paymentUuid;
    }

    /**
     * @param string $paymentUuid
     * @return Withdrawal
     */
    public function setPaymentUuid(string $paymentUuid): Withdrawal
    {
        $this->paymentUuid = $paymentUuid;
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
     * @return Withdrawal
     */
    public function setCurrency(string $currency): Withdrawal
    {
        $this->currency = $currency;
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
     * @return Withdrawal
     */
    public function setAmount(float $amount): Withdrawal
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return Withdrawal
     */
    public function setAddress(string $address): Withdrawal
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getOpened(): \DateTime
    {
        return $this->opened;
    }

    /**
     * @param \DateTime $opened
     * @return Withdrawal
     */
    public function setOpened(\DateTime $opened): Withdrawal
    {
        $this->opened = $opened;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAuthorized(): bool
    {
        return $this->authorized;
    }

    /**
     * @param bool $authorized
     * @return Withdrawal
     */
    public function setAuthorized(bool $authorized): Withdrawal
    {
        $this->authorized = $authorized;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPendingPayment(): bool
    {
        return $this->pendingPayment;
    }

    /**
     * @param bool $pendingPayment
     * @return Withdrawal
     */
    public function setPendingPayment(bool $pendingPayment): Withdrawal
    {
        $this->pendingPayment = $pendingPayment;
        return $this;
    }

    /**
     * @return float
     */
    public function getTransactionCost(): float
    {
        return $this->transactionCost;
    }

    /**
     * @param float $transactionCost
     * @return Withdrawal
     */
    public function setTransactionCost(float $transactionCost): Withdrawal
    {
        $this->transactionCost = $transactionCost;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param null|string $transactionId
     * @return Withdrawal
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCancelled(): bool
    {
        return $this->cancelled;
    }

    /**
     * @param bool $cancelled
     * @return Withdrawal
     */
    public function setCancelled(bool $cancelled): Withdrawal
    {
        $this->cancelled = $cancelled;
        return $this;
    }

    /**
     * @return bool
     */
    public function isInvalidAddress(): bool
    {
        return $this->invalidAddress;
    }

    /**
     * @param bool $invalidAddress
     * @return Withdrawal
     */
    public function setInvalidAddress(bool $invalidAddress): Withdrawal
    {
        $this->invalidAddress = $invalidAddress;
        return $this;
    }
}
