<?php

namespace Hakone\Http\Message;

use Hakone\Http\Message\Helper\UntouchableMessageTrait;
use Hakone\Http\Message\Helper\UntouchableResponseTrait;
use Psr\Http\Message\ResponseInterface;

/** @immutable */
class UntouchableResponse implements ResponseInterface
{
    use UntouchableMessageTrait;
    use UntouchableResponseTrait;
}
