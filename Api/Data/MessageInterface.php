<?php

namespace Omnipro\Base\Api\Data;

/**
 * Message Interface definition
 *
 * @author Daniel Antonio Moreno Ramirez <daniel.moreno@omni.pro>
 */
interface MessageInterface
{
    public const HASH = 'hash';
    public const TEXT = 'text';

    /**
     * Set hash message
     *
     * @param string $hash
     * @return MessageInterface
     */
    public function setHash(string $hash): MessageInterface;

    /**
     * Get hash message
     *
     * @return string|null
     */
    public function getHash(): ?string;

    /**
     * Set text message
     *
     * @param string $text
     * @return MessageInterface
     */
    public function setText(string $text): MessageInterface;

    /**
     * Get text message
     *
     * @return string|null
     */
    public function getText(): ?string;
}
