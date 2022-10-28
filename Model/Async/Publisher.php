<?php

namespace Omnipro\Base\Model\Async;

use Omnipro\Base\Api\Async\PublisherInterface;
use Omnipro\Base\Api\Data\MessageInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\MessageQueue\PublisherInterface as MagentoPublisher;

/**
 * Publisher Implementation for queue
 *
 * @author Daniel Antonio Moreno Ramirez <daniel.moreno@omni.pro>
 */
class Publisher implements PublisherInterface
{
    /**
     * @var MagentoPublisher
     */
    private $publisher;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Constructor
     *
     * @param MagentoPublisher $publisher
     * @param LoggerInterface $logger
     */
    public function __construct(
        MagentoPublisher $publisher,
        LoggerInterface $logger
    ) {
        $this->publisher = $publisher;
        $this->logger = $logger;
    }

    /**
     * @inheritDoc
     */
    public function publish(MessageInterface $message)
    {
        /**
         * @var \Omnipro\Base\Model\Data\Message $message
         */

        $this->publisher->publish(self::TOPIC_NAME, $message);

        $this->logger->info('[Omnipro\Base\Model\Async\Publisher\Publisher::publish] - Publish', [
            'message' => $message->toArray()
        ]);
    }
}
