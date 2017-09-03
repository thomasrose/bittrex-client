<?php

namespace BittrexClient\Model;

class LimitOrder
{
    /** @var string|null */
    protected $uuid;

    /** @var string|null */
    protected $accountId;

    /** @var string */
    protected $orderUuid;

    /** @var string */
    protected $exchange;

    /** @var string */
    protected $orderType;

    /** @var float */
    protected $quantity;

    /** @var float */
    protected $quantityRemaining;

    /** @var float */
    protected $limit;

    /** @var float */
    protected $reserved;

    /** @var float */
    protected $reservedRemaining;

    /** @var float */
    protected $commissionReserved;

    /** @var float */
    protected $commissionRemaining;

    /** @var float */
    protected $commissionPaid;

    /** @var float */
    protected $price;

    /** @var float */
    protected $pricePerUnit;

    /** @var string|null */
    protected $sentinel;

    /** @var bool */
    protected $open;

    /** @var \DateTime */
    protected $opened;

    /** @var \DateTime|null */
    protected $closed;

    /** @var bool */
    protected $cancelInitiated;

    /** @var bool */
    protected $immediateOrCancel;

    /** @var bool */
    protected $conditional;

    /** @var string */
    protected $condition;

    /** @var float|null */
    protected $conditionTarget;

    protected $timestamp;

    /**
     * @return null|string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @param null|string $uuid
     * @return LimitOrder
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param null|string $accountId
     * @return LimitOrder
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderUuid(): string
    {
        return $this->orderUuid;
    }

    /**
     * @param string $orderUuid
     * @return LimitOrder
     */
    public function setOrderUuid(string $orderUuid): LimitOrder
    {
        $this->orderUuid = $orderUuid;
        return $this;
    }

    /**
     * @return string
     */
    public function getExchange(): string
    {
        return $this->exchange;
    }

    /**
     * @param string $exchange
     * @return LimitOrder
     */
    public function setExchange(string $exchange): LimitOrder
    {
        $this->exchange = $exchange;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderType(): string
    {
        return $this->orderType;
    }

    /**
     * @param string $orderType
     * @return LimitOrder
     */
    public function setOrderType(string $orderType): LimitOrder
    {
        $this->orderType = $orderType;
        return $this;
    }

    /**
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @param float $quantity
     * @return LimitOrder
     */
    public function setQuantity(float $quantity): LimitOrder
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return float
     */
    public function getQuantityRemaining(): float
    {
        return $this->quantityRemaining;
    }

    /**
     * @param float $quantityRemaining
     * @return LimitOrder
     */
    public function setQuantityRemaining(float $quantityRemaining): LimitOrder
    {
        $this->quantityRemaining = $quantityRemaining;
        return $this;
    }

    /**
     * @return float
     */
    public function getLimit(): float
    {
        return $this->limit;
    }

    /**
     * @param float $limit
     * @return LimitOrder
     */
    public function setLimit(float $limit): LimitOrder
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return float
     */
    public function getReserved(): float
    {
        return $this->reserved;
    }

    /**
     * @param float $reserved
     * @return LimitOrder
     */
    public function setReserved(float $reserved): LimitOrder
    {
        $this->reserved = $reserved;
        return $this;
    }

    /**
     * @return float
     */
    public function getReservedRemaining(): float
    {
        return $this->reservedRemaining;
    }

    /**
     * @param float $reservedRemaining
     * @return LimitOrder
     */
    public function setReservedRemaining(float $reservedRemaining): LimitOrder
    {
        $this->reservedRemaining = $reservedRemaining;
        return $this;
    }

    /**
     * @return float
     */
    public function getCommissionReserved(): float
    {
        return $this->commissionReserved;
    }

    /**
     * @param float $commissionReserved
     * @return LimitOrder
     */
    public function setCommissionReserved(float $commissionReserved): LimitOrder
    {
        $this->commissionReserved = $commissionReserved;
        return $this;
    }

    /**
     * @return float
     */
    public function getCommissionRemaining(): float
    {
        return $this->commissionRemaining;
    }

    /**
     * @param float $commissionRemaining
     * @return LimitOrder
     */
    public function setCommissionRemaining(float $commissionRemaining): LimitOrder
    {
        $this->commissionRemaining = $commissionRemaining;
        return $this;
    }

    /**
     * @return float
     */
    public function getCommissionPaid(): float
    {
        return $this->commissionPaid;
    }

    /**
     * @param float $commissionPaid
     * @return LimitOrder
     */
    public function setCommissionPaid(float $commissionPaid): LimitOrder
    {
        $this->commissionPaid = $commissionPaid;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return LimitOrder
     */
    public function setPrice(float $price): LimitOrder
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float
     */
    public function getPricePerUnit(): float
    {
        return $this->pricePerUnit;
    }

    /**
     * @param float $pricePerUnit
     * @return LimitOrder
     */
    public function setPricePerUnit(float $pricePerUnit): LimitOrder
    {
        $this->pricePerUnit = $pricePerUnit;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getSentinel()
    {
        return $this->sentinel;
    }

    /**
     * @param null|string $sentinel
     * @return LimitOrder
     */
    public function setSentinel($sentinel)
    {
        $this->sentinel = $sentinel;
        return $this;
    }

    /**
     * @return bool
     */
    public function isOpen(): bool
    {
        return $this->open;
    }

    /**
     * @param bool $open
     * @return LimitOrder
     */
    public function setOpen(bool $open): LimitOrder
    {
        $this->open = $open;
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
     * @return LimitOrder
     */
    public function setOpened(\DateTime $opened): LimitOrder
    {
        $this->opened = $opened;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getClosed()
    {
        return $this->closed;
    }

    /**
     * @param \DateTime|null $closed
     * @return LimitOrder
     */
    public function setClosed($closed)
    {
        $this->closed = $closed;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCancelInitiated(): bool
    {
        return $this->cancelInitiated;
    }

    /**
     * @param bool $cancelInitiated
     * @return LimitOrder
     */
    public function setCancelInitiated(bool $cancelInitiated): LimitOrder
    {
        $this->cancelInitiated = $cancelInitiated;
        return $this;
    }

    /**
     * @return bool
     */
    public function isImmediateOrCancel(): bool
    {
        return $this->immediateOrCancel;
    }

    /**
     * @param bool $immediateOrCancel
     * @return LimitOrder
     */
    public function setImmediateOrCancel(bool $immediateOrCancel): LimitOrder
    {
        $this->immediateOrCancel = $immediateOrCancel;
        return $this;
    }

    /**
     * @return bool
     */
    public function isConditional(): bool
    {
        return $this->conditional;
    }

    /**
     * @param bool $conditional
     * @return LimitOrder
     */
    public function setConditional(bool $conditional): LimitOrder
    {
        $this->conditional = $conditional;
        return $this;
    }

    /**
     * @return string
     */
    public function getCondition(): string
    {
        return $this->condition;
    }

    /**
     * @param string $condition
     * @return LimitOrder
     */
    public function setCondition(string $condition): LimitOrder
    {
        $this->condition = $condition;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getConditionTarget()
    {
        return $this->conditionTarget;
    }

    /**
     * @param float|null $conditionTarget
     * @return LimitOrder
     */
    public function setConditionTarget($conditionTarget)
    {
        $this->conditionTarget = $conditionTarget;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $timestamp
     * @return LimitOrder
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

}