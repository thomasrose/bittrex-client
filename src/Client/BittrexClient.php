<?php

namespace BittrexClient\Client;

use BittrexClient\Exception\BittrexClientException;
use BittrexClient\Model\AccountBalance;
use BittrexClient\Model\Currency;
use BittrexClient\Model\Deposit;
use BittrexClient\Model\Withdrawal;
use BittrexClient\Model\LimitOrder;
use BittrexClient\Model\Market;
use BittrexClient\Model\MarketSummary;
use BittrexClient\Model\Order;
use BittrexClient\Model\OrderBook;
use BittrexClient\Model\Ticker;
use BittrexClient\Model\Trade;
use GuzzleHttp\Client;
use function GuzzleHttp\Psr7\build_query;
use Psr\Http\Message\ResponseInterface;

class BittrexClient
{
    const BASE_URI = 'https://bittrex.com/api/v1.1/';

    protected $client;
    protected $apiKey;
    protected $apiSecret;

    public function __construct($apiKey = null, $apiSecret = null)
    {
        $this->client = new Client([
            'base_uri' => static::BASE_URI
        ]);

        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
    }

    /**
     * @return Market[]
     * @throws \Exception
     */
    public function getMarkets(): array
    {
        $response = $this->client->get('public/getmarkets');
        $result = $this->decodeResponse($response);

        $markets = [];
        foreach ($result->result as $market)
        {
            $markets[] = (new Market())
                ->setMarketCurrency($market->MarketCurrency)
                ->setBaseCurrency($market->BaseCurrency)
                ->setMarketCurrencyLong($market->MarketCurrencyLong)
                ->setMinTradeSize($market->MinTradeSize)
                ->setMarketName($market->MarketName)
                ->setActive($market->IsActive)
                ->setCreated(new \DateTime($market->Created, new \DateTimeZone('UTC')));
        }

        return $markets;
    }

    /**
     * @return Currency[]
     * @throws \Exception
     */
    public function getCurrencies(): array
    {
        $response = $this->client->get('public/getcurrencies');
        $result = $this->decodeResponse($response);

        $currencies = [];
        foreach ($result->result as $currency)
        {
            $currencies[] = (new Currency())
                ->setCurrency($currency->Currency)
                ->setCurrencyLong($currency->CurrencyLong)
                ->setMinConfirmation($currency->MinConfirmation)
                ->setTxFee($currency->TxFee)
                ->setIsActive($currency->IsActive)
                ->setCoinType($currency->CoinType)
                ->setBaseAddress($currency->BaseAddress);
        }

        return $currencies;
    }

    /**
     * @param string $marketName
     * @return Ticker
     */
    public function getTicker(string $marketName): Ticker
    {
        $response = $this->client->get('public/getticker',
            [
                'query' => [
                    'market' => $marketName
                ]
            ]
        )
        ;
        $result = $this->decodeResponse($response);

        $ticker = $result->result;

        return (new Ticker())
            ->setBid($ticker->Bid)
            ->setAsk($ticker->Ask)
            ->setLast($ticker->Last);
    }

    /**
     * @return MarketSummary[]
     * @throws \Exception
     */
    public function getMarketSummaries(): array
    {
        $response = $this->client->get('public/getmarketsummaries');
        $result = $this->decodeResponse($response);

        $marketSummaries = [];
        foreach ($result->result as $marketSummary)
        {
            $marketSummaries[] = (new MarketSummary())
                ->setMarketName($marketSummary->MarketName)
                ->setHigh($marketSummary->High)
                ->setLow($marketSummary->Low)
                ->setVolume($marketSummary->Volume)
                ->setLast($marketSummary->Last)
                ->setBaseVolume($marketSummary->BaseVolume)
                ->setTimeStamp($marketSummary->TimeStamp)
                ->setBid($marketSummary->Bid)
                ->setAsk($marketSummary->Ask)
                ->setOpenBuyOrders($marketSummary->OpenBuyOrders)
                ->setOpenSellOrders($marketSummary->OpenSellOrders)
                ->setPrevDay($marketSummary->PrevDay)
                ->setCreated(new \DateTime($marketSummary->Created, new \DateTimeZone('UTC')))
                ->setDisplayMarketName($marketSummary->DisplayMarketName ?? null);
        }

        return $marketSummaries;
    }

    /**
     * @param string $marketName
     * @return MarketSummary
     */
    public function getMarketSummary(string $marketName): MarketSummary
    {
        $response = $this->client->get('public/getmarketsummary',
            [
                'query' => [
                    'market' => $marketName
                ]
            ]
        )
        ;
        $result = $this->decodeResponse($response);

        $marketSummary = $result->result[0];

        return (new MarketSummary())
            ->setMarketName($marketSummary->MarketName)
            ->setHigh($marketSummary->High)
            ->setLow($marketSummary->Low)
            ->setVolume($marketSummary->Volume)
            ->setLast($marketSummary->Last)
            ->setBaseVolume($marketSummary->BaseVolume)
            ->setTimeStamp($marketSummary->TimeStamp)
            ->setBid($marketSummary->Bid)
            ->setAsk($marketSummary->Ask)
            ->setOpenBuyOrders($marketSummary->OpenBuyOrders)
            ->setOpenSellOrders($marketSummary->OpenSellOrders)
            ->setPrevDay($marketSummary->PrevDay)
            ->setCreated(new \DateTime($marketSummary->Created, new \DateTimeZone('UTC')))
            ->setDisplayMarketName($marketSummary->DisplayMarketName ?? null);
    }

    /**
     * @param string $marketName
     * @param string $type
     * @return OrderBook
     */
    public function getOrderBook(string $marketName, string $type = OrderBook::ORDER_BOOK_REQUEST_TYPE_BOTH): OrderBook
    {
        $response = $this->client->get('public/getorderbook',
            [
                'query' => [
                    'market' => $marketName,
                    'type' => $type,
                ]
            ]
        );

        $result = $this->decodeResponse($response);

        $prderBookResult = $result->result;

        $orderBook = new OrderBook();
        foreach([Order::ORDER_TYPE_BUY, Order::ORDER_TYPE_SELL] as $orderType) {
            if (isset($prderBookResult->{$orderType})) {
                foreach ($prderBookResult->{$orderType} as $order) {
                    $orderBook->addOrder((new Order())
                        ->setType($orderType)
                        ->setQuantity($order->Quantity)
                        ->setRate($order->Rate));
                }
            }
        }

        return $orderBook;
    }

    /**
     * @param string $marketName
     * @return Trade[]
     */
    public function getMarketHistory(string $marketName): array
    {
        $response = $this->client->get('public/getmarkethistory',
            [
                'query' => [
                    'market' => $marketName,
                ]
            ]
        );

        $result = $this->decodeResponse($response);

        $trades = [];

        foreach ($result->result as $trade) {
            $trades[] = (new Trade())
                ->setTransactionId($trade->Id)
                ->setTimestamp(new \DateTime($trade->TimeStamp, new \DateTimeZone('UTC')))
                ->setQuantity($trade->Quantity)
                ->setPrice($trade->Price)
                ->setTotal($trade->Total)
                ->setFillType($trade->FillType)
                ->setOrderType($trade->OrderType);
        }

        return $trades;
    }

    /**
     * @param $marketName
     * @param $quantity
     * @param $rate
     * @return string UUID of order created
     */
    public function createLimitBuyOrder(string $marketName, $quantity, $rate): string
    {
        $response = $this->getSignedRequest('market/buylimit',
            [
                'market' => $marketName,
                'quantity' => $quantity,
                'rate' => $rate
            ]
        );

        $result = $this->decodeResponse($response);

        return $result->uuid;
    }

    /**
     * @param $marketName
     * @param $quantity
     * @param $rate
     * @return string UUID of order created
     */
    public function createLimitSellOrder($marketName, $quantity, $rate): string
    {
        $response = $this->getSignedRequest('market/selllimit',
            [
                'market' => $marketName,
                'quantity' => $quantity,
                'rate' => $rate
            ]
        );

        $result = $this->decodeResponse($response);

        return $result->uuid;
    }

    /**
     * @param string $uuid
     * @return bool
     */
    public function cancelOrder(string $uuid): bool
    {
        $response = $this->getSignedRequest('market/cancel',
            [
                'uuid' => $uuid,
            ]
        );

        $this->decodeResponse($response);

        return true;
    }

    /**
     * @param string|null $marketName
     * @return LimitOrder[]
     */
    public function getOpenOrders(string $marketName = null): array
    {
        $params = [];
        if (null !== $marketName) {
            $params['market'] = $marketName;
        }

        $response = $this->getSignedRequest('market/getopenorders', $params);

        $result = $this->decodeResponse($response);

        $openOrders = [];
        foreach ($result->result as $openOrder) {
            $openOrders[] = (new LimitOrder())
                ->setUuid($openOrder->Uuid)
                ->setOrderUuid($openOrder->OrderUuid)
                ->setExchange($openOrder->Exchange)
                ->setOrderType($openOrder->OrderType)
                ->setQuantity($openOrder->Quantity)
                ->setQuantityRemaining($openOrder->QuantityRemaining)
                ->setLimit($openOrder->Limit)
                ->setCommissionPaid($openOrder->CommissionPaid)
                ->setPrice($openOrder->Price)
                ->setPricePerUnit($openOrder->PricePerUnit)
                ->setOpened(new \DateTime($openOrder->Opened))
                ->setClosed($openOrder->Closed ? new \DateTime($openOrder->Closed, new \DateTimeZone('UTC')) : null)
                ->setCancelInitiated($openOrder->CancelInitiated)
                ->setImmediateOrCancel($openOrder->ImmediateOrCancel)
                ->setConditional($openOrder->IsConditional)
                ->setCondition($openOrder->Condition)
                ->setConditionTarget($openOrder->ConditionTarget);
        }

        return $openOrders;
    }

    /**
     * @return AccountBalance[]
     */
    public function getBalances(): array
    {
        $response = $this->getSignedRequest('account/getbalances');

        $result = $this->decodeResponse($response);

        $balances = [];

        foreach ($result->result as $balance) {
            $balances[] = (new AccountBalance())
                ->setCurrency($balance->Currency)
                ->setBalance($balance->Balance)
                ->setAvailable($balance->Available)
                ->setPending($balance->Pending)
                ->setCryptoAddress($balance->CryptoAddress);
        }

        return $balances;
    }

    /**
     * @param string $currency
     * @return AccountBalance
     */
    public function getBalance(string $currency): AccountBalance
    {
        $response = $this->getSignedRequest('account/getbalance', ['currency' => $currency]);

        $result = $this->decodeResponse($response);

        $balance = $result->result;

        return (new AccountBalance())
            ->setCurrency($balance->Currency)
            ->setBalance($balance->Balance)
            ->setAvailable($balance->Available)
            ->setPending($balance->Pending)
            ->setCryptoAddress($balance->CryptoAddress)
            ->setRequested($balance->Requested)
            ->setUuid($balance->Uuid);
    }

    /**
     * @param string $currency
     * @return string
     * @throws BittrexClientException
     */
    public function getDepositAddress(string $currency): string
    {
        $response = $this->getSignedRequest('account/getdepositaddress', ['currency' => $currency]);

        $result = $this->decodeResponse($response);

        if ($result->result->Currency != $currency) {
            throw new BittrexClientException(sprintf('Server responded with different currency (%s) to request (%s)',
                $result->result->Currency, $currency));
        }

        $address = $result->result->Address;

        if (null === $address) {
            throw new BittrexClientException('No address returned. New address may be generating - try again soon.');
        }

        return $address;
    }

    /**
     * @param string $uuid
     * @return LimitOrder
     */
    public function getLimitOrder(string $uuid): LimitOrder
    {
        $response = $this->getSignedRequest('account/getorder', ['uuid' => $uuid]);

        $result = $this->decodeResponse($response);

        $order = $result->result;

        return (new LimitOrder())
            ->setUuid($order->Uuid)
            ->setAccountId($order->AccountId)
            ->setOrderUuid($order->OrderUuid)
            ->setOrderType($order->Type)
            ->setExchange($order->Exchange)
            ->setQuantity($order->Quantity)
            ->setQuantityRemaining($order->QuantityRemaining)
            ->setLimit($order->Limit)
            ->setReserved($order->Reserved)
            ->setReservedRemaining($order->ReservedRemaining)
            ->setCommissionReserved($order->CommissionReserved)
            ->setCommissionRemaining($order->CommissionRemaining)
            ->setCommissionPaid($order->CommissionPaid)
            ->setPrice($order->Price)
            ->setPricePerUnit($order->PricePerUnit)
            ->setOpen($order->IsOpen)
            ->setSentinel($order->Sentinel)
            ->setOpened(new \DateTime($order->Opened))
            ->setClosed($order->Closed ? new \DateTime($order->Closed, new \DateTimeZone('UTC')) : null)
            ->setCancelInitiated($order->CancelInitiated)
            ->setImmediateOrCancel($order->ImmediateOrCancel)
            ->setConditional($order->IsConditional)
            ->setCondition($order->Condition)
            ->setConditionTarget($order->ConditionTarget);
    }

    /**
     * @param string|null $marketName
     * @return LimitOrder[]
     */
    public function getOrderHistory(string $marketName = null): array
    {
        $params = [];
        if (null !== $marketName) {
            $params['market'] = $marketName;
        }

        $response = $this->getSignedRequest('account/getorderhistory', $params);

        $result = $this->decodeResponse($response);

        $orders = [];
        foreach ($result->result as $order) {
            $orders[] = (new LimitOrder())
                ->setOrderUuid($order->OrderUuid)
                ->setExchange($order->Exchange)
                ->setTimestamp(new \DateTime($order->TimeStamp, new \DateTimeZone('UTC')))
                ->setOrderType($order->OrderType)
                ->setQuantity($order->Quantity)
                ->setQuantityRemaining($order->QuantityRemaining)
                ->setLimit($order->Limit)
                ->setCommissionPaid($order->Commission)
                ->setPrice($order->Price)
                ->setPricePerUnit($order->PricePerUnit)
                ->setImmediateOrCancel($order->ImmediateOrCancel)
                ->setConditional($order->IsConditional)
                ->setCondition($order->Condition)
                ->setConditionTarget($order->ConditionTarget);
        }

        return $orders;
    }

    /**
     * @param string|null $currency
     * @return array|Withdrawal[]
     */
    public function getWithdrawalHistory(string $currency = null): array
    {
        $params = [];
        if (null !== $currency) {
            $params['currency'] = $currency;
        }

        $response = $this->getSignedRequest('account/getwithdrawalhistory', $params);

        $result = $this->decodeResponse($response);

        $transactions = [];

        foreach ($result->result as $transaction) {
            $transactions[] = (new Withdrawal())
                ->setPaymentUuid($transaction->PaymentUuid)
                ->setCurrency($transaction->Currency)
                ->setAmount($transaction->Amount)
                ->setAddress($transaction->Address)
                ->setOpened(new \DateTime($transaction->Opened, new \DateTimeZone('UTC')))
                ->setAuthorized($transaction->Authorized)
                ->setPendingPayment($transaction->PendingPayment)
                ->setTransactionCost($transaction->TxCost)
                ->setTransactionId($transaction->TxId)
                ->setCancelled($transaction->Canceled)
                ->setInvalidAddress($transaction->InvalidAddress);
        }

        return $transactions;
    }

    /**
     * @param string|null $currency
     * @return array|Deposit[]
     */
    public function getDepositHistory(string $currency = null): array
    {
        $params = [];
        if (null !== $currency) {
            $params['currency'] = $currency;
        }

        $response = $this->getSignedRequest('account/getdeposithistory', $params);

        $result = $this->decodeResponse($response);

        $transactions = [];

        foreach ($result->result as $transaction) {
            $transactions[] = (new Deposit())
                ->setId($transaction->Id)
                ->setAmount($transaction->Amount)
                ->setCurrency($transaction->Currency)
                ->setLastUpdated(new \DateTime($transaction->LastUpdated, new \DateTimeZone('UTC')))
                ->setTransactionId($transaction->TxId)
                ->setCryptoAddress($transaction->CryptoAddress);
        }

        return $transactions;
    }

    /**
     * @param ResponseInterface $response
     * @return mixed
     * @throws BittrexClientException
     */
    private function decodeResponse(ResponseInterface $response): \stdClass
    {
        $result = json_decode($response->getBody());

        if (!$result->success) {
            throw new BittrexClientException($result->message);
        }

        return $result;
    }

    /**
     * @param       $endpoint
     * @param array $params
     * @return ResponseInterface
     * @throws BittrexClientException
     */
    private function getSignedRequest($endpoint, $params = []): ResponseInterface
    {
        if (null === $this->apiKey) {
            throw new BittrexClientException('No API key supplied');
        }

        if (null === $this->apiSecret) {
            throw new BittrexClientException('No API secret supplied');
        }

        $params['apikey'] = $this->apiKey;
        $params['nonce'] = time();

        ksort($params);

        $uri = sprintf('%s%s?%s', static::BASE_URI, $endpoint, build_query($params));
        $sign = hash_hmac('sha512', $uri, $this->apiSecret);

        return $this->client->get($endpoint,
            [
                'query' => $params,
                'headers' => [
                    'apisign' => $sign
                ]
            ]
        );
    }
}