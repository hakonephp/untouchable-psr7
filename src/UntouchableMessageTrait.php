<?php

namespace Hakone\Http\Message;

use BadMethodCallException;
use Psr\Http\Message\StreamInterface;

trait UntouchableMessageTrait
{
    /** @return never */
    public function getProtocolVersion()
    {
        throw new BadMethodCallException();
    }

    /** @return never */
    public function withProtocolVersion($version)
    {
        throw new BadMethodCallException();
    }

    /** @return never */
    public function getHeaders()
    {
        throw new BadMethodCallException();
    }

    /** @return never */
    public function hasHeader($name)
    {
        throw new BadMethodCallException();
    }

    /** @return never */
    public function getHeader($name)
    {
        throw new BadMethodCallException();
    }

    /** @return never */
    public function getHeaderLine($name)
    {
        throw new BadMethodCallException();
    }

    /** @return never */
    public function withHeader($name, $value)
    {
        throw new BadMethodCallException();
    }

    /** @return never */
    public function withAddedHeader($name, $value)
    {
        throw new BadMethodCallException();
    }

    /** @return never */
    public function withoutHeader($name)
    {
        throw new BadMethodCallException();
    }

    /** @return never */
    public function getBody()
    {
        throw new BadMethodCallException();
    }

    /** @return never */
    public function withBody(StreamInterface $body)
    {
        throw new BadMethodCallException();
    }
}
