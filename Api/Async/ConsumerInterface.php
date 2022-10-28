<?php

namespace Omnipro\Base\Api\Async;

use Omnipro\Base\Api\Data\MessageInterface;

/**
 * Consumer Interface definition
 *
 * @author Daniel Antonio Moreno Ramirez <daniel.moreno@omni.pro>
 */
interface ConsumerInterface
{
    /**
     * Consumer message queue
     *
     * @param \Omnipro\Base\Api\Data\MessageInterface $message
     * @return void
     */
    public function consume(MessageInterface $message);
}
