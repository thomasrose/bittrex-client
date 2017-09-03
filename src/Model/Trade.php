<?php

namespace BittrexClient\Model;

class Trade
{
    const
        TRADE_FILL_TYPE_FILL = 'FILL',
        TRADE_FILl_TYPE_PARTIAL_FILL = 'PARTIAL_FILL',

        TRADE_ORDER_TYPE_BUY = 'BUY',
        TRADE_ORDER_TYPE_SELL = 'SELL';

    /** @var int */
    protected $transactionId;

    /** @var \DateTime */
    protected $timestamp;

    /** @var float */
    protected $quantity;

    /** @var float */
    protected $price;

    /** @var float */
    protected $total;

    /** @var string */
    protected $fillType;

    /** @var string */
    protected $orderType;

    /**
     * @return int
     */
    public function getTransactionId(): int
    {
        return $this->transactionId;
    }

    /**
     * @param int $transactionId
     * @return Trade
     */
    public function setTransactionId(int $transactionId): Trade
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTimestamp(): \DateTime
    {
        return $this->timestamp;
    }

    /**
     * @param \DateTime $timestamp
     * @return Trade
     */
    public function setTimestamp(\DateTime $timestamp): Trade
    {
        $this->timestamp = $timestamp;
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
     * @return Trade
     */
    public function setQuantity(float $quantity): Trade
    {
        $this->quantity = $quantity;
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
     * @return Trade
     */
    public function setPrice(float $price): Trade
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @param float $total
     * @return Trade
     */
    public function setTotal(float $total): Trade
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return string
     */
    public function getFillType(): string
    {
        return $this->fillType;
    }

    /**
     * @param string $fillType
     * @return Trade
     */
    public function setFillType(string $fillType): Trade
    {
        $this->fillType = $fillType;
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
     * @return Trade
     */
    public function setOrderType(string $orderType): Trade
    {
        $this->orderType = $orderType;
        return $this;
    }
}