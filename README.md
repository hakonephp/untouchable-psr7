# Untouchable PSR-7 HTTP Messages 🏃‍♀️

[![Package version](https://img.shields.io/packagist/v/hakone/untouchable-psr7.svg?style=flat)](https://packagist.org/packages/hakone/untouchable-psr7)
[![Build Status](https://github.com/hakonephp/untouchable-psr7/actions/workflows/test.yml/badge.svg?branch=master)](https://github.com/hakonephp/untouchable-psr7/actions)
[![Downloads this Month](https://img.shields.io/packagist/dm/hakone/untouchable-psr7.svg)](https://packagist.org/packages/hakone/untouchable-psr7)

This package provides special HTTP messages referenced by [PSR-15] middlewares.

Any method call throws. Use it as the handler response type so a request interceptor cannot inspect or mutate the response.

## Install

```
composer require hakone/untouchable-psr7
```

## Usage

```php
use Hakone\Http\Message\UntouchableResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class AddAttributeMiddleware
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $request = $request->withAttribute('foo', 'bar');

        // The handler may return UntouchableResponse. Do not call methods on it.
        return $handler->handle($request);
    }
}
```

Calling any method on `UntouchableResponse` throws `DoNotCallMethodException`.

## Copyright

```
Copyright 2023 USAMI Kenta <tadsan@zonu.me>

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
```

[PSR-15]: https://www.php-fig.org/psr/psr-15/
