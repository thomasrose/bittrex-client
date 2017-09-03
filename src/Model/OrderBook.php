<?php

namespace BittrexClient\Model;

class OrderBook
{
    const
        ORDER_BOOK_REQUEST_TYPE_BUY = 'buy',
        ORDER_BOOK_REQUEST_TYPE_SELL = 'sell',
        ORDER_BOOK_REQUEST_TYPE_BOTH = 'both';

    /** @var Order[] */
    protected $orders;

    /**
     * @param null $type
     * @return array
     */
    public function getOrders($type = null): array
    {
        if (!is_null($type)) {
            return array_filter($this->orders, function (Order $order) use ($type) { return $order->getType() == $type; });
        }

        return $this->orders;
    }

    /**
     * @param Order[] $orders
     */
    public function setOrders(array $orders)
    {
        $this->orders = $orders;
    }

    public function addOrder(Order $order)
    {
        $this->orders[] = $order;
    }
}