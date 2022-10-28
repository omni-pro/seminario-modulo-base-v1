<?php

namespace Omnipro\Base\Model\Data;

use Magento\Framework\DataObject;
use Omnipro\Base\Api\Data\MessageInterface;

/**
 * Message class implementation
 *
 * @author Daniel Antonio Moreno Ramirez <daniel.moreno@omni.pro>
 */
class Message extends DataObject implements MessageInterface
{
    /**
     * @inheritDoc
     */
    public function setHash(string $hash): MessageInterface
    {
        return $this->setData(self::HASH, $hash);
    }

    /**
     * @inheritDoc
     */
    public function getHash(): ?string
    {
        return $this->getData(self::HASH);
    }

    /**
     * @inheritDoc
     */
    public function setText(string $text): MessageInterface
    {
        return $this->setData(self::TEXT, $text);
    }

    /**
     * @inheritDoc
     */
    public function getText(): ?string
    {
        return $this->getData(self::TEXT);
    }
}
