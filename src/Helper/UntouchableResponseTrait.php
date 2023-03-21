<?php

namespace Hakone\Http\Message\Helper;

use Hakone\Http\Message\Exception\DoNotCallMethodException;

/**
 * This trait is imported for the purpose of disabling response objects.
 *
 * If you are a middleware user, it would be inappropriate to put it as part of Request Interceptor.
 * If you are a middleware developer, you should not call Response object methods in this context.
 */
trait UntouchableResponseTrait
{
    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function getStatusCode()
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function withStatus($code, $reasonPhrase = '')
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function getReasonPhrase()
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }
}
