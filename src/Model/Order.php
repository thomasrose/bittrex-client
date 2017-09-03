<?php

namespace BittrexClient\Model;

class Order
{
    const
        ORDER_TYPE_BUY = 'buy',
        ORDER_TYPE_SELL = 'sell';

    /** @var string */
    protected $type;

    /** @var float */
    protected $quantity;

    /** @var float */
    protected $rate;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Order
     */
    public function setType(string $type): Order
    {
        $this->type = $type;
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
     * @return Order
     */
    public function setQuantity(float $quantity): Order
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return float
     */
    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     * @return Order
     */
    public function setRate(float $rate): Order
    {
        $this->rate = $rate;
        return $this;
    }
}