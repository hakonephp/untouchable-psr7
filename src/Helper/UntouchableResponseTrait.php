<?php

declare(strict_types=1);

namespace Hakone\Http\Message\Helper;

use Hakone\Http\Message\Exception\DoNotCallMethodException;
use Psr\Http\Message\ResponseInterface;

/**
 * This trait is imported for the purpose of disabling response objects.
 *
 * If you are a middleware user, it would be inappropriate to put it as part of Request Interceptor.
 * If you are a middleware developer, you should not call Response object methods in this context.
 *
 * @phpstan-require-implements \Psr\Http\Message\ResponseInterface
 */
trait UntouchableResponseTrait
{
    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function getStatusCode(): int
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function withStatus(int $code, string $reasonPhrase = ''): ResponseInterface
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }

    /**
     * @throws DoNotCallMethodException
     * @return never
     */
    public function getReasonPhrase(): string
    {
        throw new DoNotCallMethodException('Untouchable method called in wrong context.');
    }
}
