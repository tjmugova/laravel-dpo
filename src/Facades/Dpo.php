<?php

namespace Tjmugova\Dpo\Facades;
use Illuminate\Support\Facades\Facade;
/**
 * @method static \Tjmugova\Dpo\Transactions\Token token()
 * @method static \Tjmugova\Dpo\PushPayments\PushPayments pushPayments()
 *
 * @see \Tjmugova\Dpo\Dpo
 */
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