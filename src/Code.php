<?php

namespace Amp\Http\Websocket;

final class Code
{
    public const NORMAL_CLOSE = 1000;
    public const GOING_AWAY = 1001;
    public const PROTOCOL_ERROR = 1002;
    public const UNACCEPTABLE_TYPE = 1003;
    public const NONE = 1005;
    public const ABNORMAL_CLOSE = 1006;
    public const INCONSISTENT_FRAME_DATA_TYPE = 1007;
    public const POLICY_VIOLATION = 1008;
    public const MESSAGE_TOO_LARGE = 1009;
    public const EXPECTED_EXTENSION_MISSING = 1010;
    public const UNEXPECTED_SERVER_ERROR = 1011;
    public const TLS_HANDSHAKE_FAILURE = 1015;

    private function __construct()
    {
        // no instances allowed
    }
}