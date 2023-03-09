<?php

namespace Hakone\Http\Message;

use BadMethodCallException;

trait UntouchableResponseTrait
{
    /** @return never */
    public function getStatusCode()
    {
        throw new BadMethodCallException();
    }

    /** @return never */
    public function withStatus($code, $reasonPhrase = '')
    {
        throw new BadMethodCallException();
    }

    /** @return never */
    public function getReasonPhrase()
    {
        throw new BadMethodCallException();
    }
}
