<?php

namespace Tjmugova\Dpo\Facades;
/**
 * Client used to send requests to DPO's API.
 *
 * @method static \Tjmugova\Dpo\Transactions\Token token()
 * @method static \Tjmugova\Dpo\PushPayments\PushPayments pushPayments()
 *
 * @see \Tjmugova\Dpo\Dpo
 */

use Illuminate\Support\Facades\Facade;

class Dpo extends Facade
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'dpo';
    }
}