<?php

declare(strict_types=1);

namespace Hakone\Http\Message\Helper;

use Hakone\Http\Message\Exception\DoNotCallMethodException;
use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\StreamInterface;

/**
 * This trait is imported for the purpose of disabling request and response objects.
 *
 * If you are a middleware user, it would be inappropriate to put it as part of Request Interceptor.
 * If you are a middleware developer, you should not call Response object methods in this context.
 *
 * @phpstan-require-implements \Psr\Http\Message\MessageInterface
 */
trait UntouchableMessageTrait
{
    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function getProtocolVersion(): string
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function withProtocolVersion($version): MessageInterface
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function getHeaders(): array
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function hasHeader(string $name): bool
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function getHeader(string $name): array
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function getHeaderLine(string $name): string
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function withHeader(string $name, $value): MessageInterface
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function withAddedHeader(string $name, $value): MessageInterface
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function withoutHeader(string $name): MessageInterface
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function getBody(): StreamInterface
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function withBody(StreamInterface $body): MessageInterface
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }
}
