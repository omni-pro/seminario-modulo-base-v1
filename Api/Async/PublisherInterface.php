<?php

namespace Omnipro\Base\Api\Async;

use Omnipro\Base\Api\Data\MessageInterface;

/**
 * Publisher Interface definition
 *
 * @author Daniel Antonio Moreno Ramirez <daniel.moreno@omni.pro>
 */
interface PublisherInterface
{
    public const TOPIC_NAME = 'omnipro.async.process.text';

    /**
     * Publish message in queue
     *
     * @param \Omnipro\Base\Api\Data\MessageInterface $message
     * @return void
     */
    public function publish(MessageInterface $message);
}
