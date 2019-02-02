<?php

namespace Amp\Websocket;

use Amp\Promise;

interface Client
{
    /**
     * Receive a message from the remote.
     *
     * @return Promise<Message|null> Resolves to message sent by the remote or `null` if the connection was
     *     closed locally.
     *
     * @throws ClosedException Thrown if the connection is closed unexpectedly by the peer.
     */
    public function receive(): Promise;

    /**
     * @return int Unique integer identifier for the client.
     */
    public function getId(): int;

    /**
     * @return bool True if the client is still connected, false otherwise. Returns false as soon as the closing
     *     handshake is initiated by the server or client.
     */
    public function isConnected(): bool;

    /**
     * @return string The local IP address of the client.
     */
    public function getLocalAddress(): string;

    /**
     * @return string The remote IP address of the client.
     */
    public function getRemoteAddress(): string;

    /**
     * @return int Number of pings sent that have not been answered.
     */
    public function getUnansweredPingCount(): int;

    /**
     * Sends a text message to the endpoint. All data sent with this method must be valid UTF-8. Use `sendBinary()` if
     * you want to send binary data.
     *
     * @param string $data Payload to send.
     *
     * @return Promise
     */
    public function send(string $data): Promise;

    /**
     * Sends a binary message to the endpoint.
     *
     * @param string $data Payload to send.
     *
     * @return Promise
     */
    public function sendBinary(string $data): Promise;

    /**
     * Sends a ping to the endpoint.
     *
     * @return Promise
     */
    public function ping(): Promise;

    /**
     * Returns connection metadata.
     *
     * ```
     * [
     *     'bytes_read' => int,
     *     'bytes_sent' => int,
     *     'frames_read' => int,
     *     'frames_sent' => int,
     *     'messages_read' => int,
     *     'messages_sent' => int,
     *     'connected_at' => int,
     *     'closed_at' => int,
     *     'close_code' => int|null,
     *     'close_reason' => string|null,
     *     'last_read_at' => int,
     *     'last_sent_at' => int,
     *     'last_data_read_at' => int,
     *     'last_data_sent_at' => int,
     * ]
     * ```
     *
     * @return array Array in the format described above.
     */
    public function getInfo(): array;

    /**
     * Closes the client connection.
     *
     * @param int    $code
     * @param string $reason
     *
     * @return Promise
     */
    public function close(int $code = Code::NORMAL_CLOSE, string $reason = ''): Promise;
}
