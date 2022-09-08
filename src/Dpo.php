<?php


namespace Tjmugova\Dpo;


use Illuminate\Http\Client\Factory;
use Tjmugova\Dpo\Exceptions\HttpException;
use Tjmugova\Dpo\PushPayments\PushPayments;
use Tjmugova\Dpo\Transactions\Token;

class Dpo
{
    /**
     * The HTTP client instance.
     *
     * @var Factory
     */
    public $http;
    /**
     * The phone number notifications should be sent from.
     *
     * @var string
     */
    public $config;
    protected $token;
    protected $pushPayments;

    public function __construct(Factory $httpClient, $config)
    {
        $this->http = $httpClient;
        $this->config = $config;
    }


    public function token(): Token
    {
        if ($this->token === null) {
            $this->token = new Token($this);
        }

        return $this->token;
    }

    public function pushPayments(): PushPayments
    {
        if ($this->pushPayments === null) {
            $this->pushPayments = new PushPayments($this);
        }

        return $this->pushPayments;
    }
}