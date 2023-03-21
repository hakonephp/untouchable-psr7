<?php

namespace Hakone\Http\Message\Helper;

use Hakone\Http\Message\Exception\DoNotCallMethodException;
use Psr\Http\Message\StreamInterface;

/**
 * This trait is imported for the purpose of disabling request and response objects.
 *
 * If you are a middleware user, it would be inappropriate to put it as part of Request Interceptor.
 * If you are a middleware developer, you should not call Response object methods in this context.
 */
trait UntouchableMessageTrait
{
    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function getProtocolVersion()
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function withProtocolVersion($version)
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function getHeaders()
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function hasHeader($name)
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function getHeader($name)
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function getHeaderLine($name)
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function withHeader($name, $value)
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function withAddedHeader($name, $value)
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function withoutHeader($name)
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function getBody()
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function withBody(StreamInterface $body)
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }
}
