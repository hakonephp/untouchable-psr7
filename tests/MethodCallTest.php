<?php

declare(strict_types=1);

namespace Hakone\Http\Message;

use Closure;
use Hakone\Http\Message\Exception\DoNotCallMethodException;
use Hakone\Http\Message\Helper\UntouchableMessageTrait;
use Hakone\Http\Message\Helper\UntouchableResponseTrait;
use Http\Discovery\Psr17Factory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversTrait;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface as Response;
use ReflectionClass;
use function array_column;
use function array_map;
use function iterator_to_array;
use function sort;

#[CoversClass(UntouchableResponse::class)]
#[CoversTrait(UntouchableMessageTrait::class)]
#[CoversTrait(UntouchableResponseTrait::class)]
final class MethodCallTest extends TestCase
{
    public function testCoverage(): void
    {
        $ref = new ReflectionClass(UntouchableResponse::class);
        $methodNames = array_map(fn ($r) => $r->getName(), $ref->getMethods());
        $testMethods = array_column(iterator_to_array(self::methodCallProvider()), 0);

        sort($methodNames);
        sort($testMethods);

        self::assertEquals($methodNames, $testMethods);
    }

    /**
     * @param Closure(Response $response): mixed $caller
     */
    #[DataProvider('methodCallProvider')]
    public function test(string $subject, Closure $caller): void
    {
        $this->expectException(DoNotCallMethodException::class);

        $caller(new UntouchableResponse());
    }

    /**
     * @return iterable<array{string, Closure(Response $response): mixed}>
     */
    public static function methodCallProvider(): iterable
    {
        $factory = new Psr17Factory();

        yield 'Message::getProtocolVersion' => [
            'getProtocolVersion',
            fn (Response $response) => $response->getProtocolVersion(),
        ];

        yield 'Message::withProtocolVersion' => [
            'withProtocolVersion',
            fn (Response $response) => $response->withProtocolVersion('1.1'),
        ];

        yield 'Message::getHeaders' => [
            'getHeaders',
            fn (Response $response) => $response->getHeaders(),
        ];

        yield 'Message::hasHeader' => [
            'hasHeader',
            fn (Response $response) => $response->hasHeader('1.1'),
        ];

        yield 'Message::getHeader' => [
            'getHeader',
            fn (Response $response) => $response->getHeader('Accept-Language'),
        ];

        yield 'Message::getHeaderLine' => [
            'getHeaderLine',
            fn (Response $response) => $response->getHeaderLine('Accept-Lanaguage'),
        ];

        yield 'Message::withHeader' => [
            'withHeader',
            fn (Response $response) => $response->withHeader('Accept-Lanauage', 'ja-JP'),
        ];

        yield 'Message::withAddedHeader' => [
            'withAddedHeader',
            fn (Response $response) => $response->withAddedHeader('Accept-Lanauage', 'ja-JP'),
        ];

        yield 'Message::withoutHeader' => [
            'withoutHeader',
            fn (Response $response) => $response->withoutHeader('Accept-Lanauage'),
        ];

        yield 'Message::getBody' => [
            'getBody',
            fn (Response $response) => $response->getBody(),
        ];

        yield 'Message::withBody' => [
            'withBody',
            fn (Response $response) => $response->withBody($factory->createStream('<html>')),
        ];

        yield 'ResponseInterface::getStatusCode()' => [
            'getStatusCode',
            fn (Response $response) => $response->getStatusCode(),
        ];

        yield 'ResponseInterface::withStatus()' => [
            'withStatus',
            fn (Response $response) => $response->withStatus(404, 'NotFound'),
        ];

        yield 'ResponseInterface::getReasonPhrase()' => [
            'getReasonPhrase',
            fn (Response $response) => $response->getReasonPhrase(),
        ];
    }
}
