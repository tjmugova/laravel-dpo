<?php

namespace Tjmugova\Dpo\PushPayments;

use Tjmugova\Dpo\Dpo;
use Tjmugova\Dpo\Exceptions\HttpException;

class PushPayments
{
    public Dpo $dpo;

    public function __construct(Dpo $dpo)
    {
        $this->dpo = $dpo;
    }

    /**
     * @return mixed
     */
    public function decodeResponse()
    {
        $data = json_decode(json_encode(simplexml_load_string(trim(file_get_contents('php://input')))), true);

        return $data;

    }

    public function sendOkResponse()
    {
        return response('<?xml version="1.0" encoding="utf-8"?>
                    <API3G>
                      <Response>OK</Response>
                    </API3G>')
            ->withHeaders([
                'Content-type' => 'text/xml',
                'charset' => 'utf-8',
            ]);
    }
}