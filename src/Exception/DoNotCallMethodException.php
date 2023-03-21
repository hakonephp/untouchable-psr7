<?php

namespace Hakone\Http\Message\Exception;

use Exception;

/**
 * Forbidden method call exception on untouchable object
 *
 * Untouchable objects are not allowed to make any method calls.
 *
 * @deprecated Do not add this exception to @throws, it's wrong.
 */
class DoNotCallMethodException extends Exception
{
}
