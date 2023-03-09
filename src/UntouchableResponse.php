<?php

namespace Hakone\Http\Message;

use Psr\Http\Message\ResponseInterface;

/** @immutable */
class UntouchableResponse implements ResponseInterface
{
    use UntouchableMessageTrait;
    use UntouchableResponseTrait;
}
