<?php

namespace Amp\Websocket;

/**
 * @param int $length Random bytes to use to generate the key.
 *
 * @return string
 *
 * @throws \Exception If generating a random key fails.
 */
function generateKey(int $length = 16): string
{
    return \base64_encode(\random_bytes($length));
}

/**
 * Generates the value for the Sec-Websocket-Accept header based on the given Sec-Websocket-Key header value.
 *
 * @param string $key
 *
 * @return string
 */
function generateAcceptFromKey(string $key): string
{
    return \base64_encode(\sha1($key . GUID, true));
}

/**
 * Determines if the Sec-Websocket-Accept value given matches the expected value for the Sec-Websocket-Key header.
 *
 * @param string $accept
 * @param string $key
 *
 * @return bool
 */
function validateAcceptForKey(string $accept, string $key): bool
{
    return $accept === generateAcceptFromKey($key);
}
