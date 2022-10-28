<?php

namespace Omnipro\Base\Model\Async;

use Omnipro\Base\Api\Async\ConsumerInterface;
use Omnipro\Base\Api\Data\MessageInterface;
use Psr\Log\LoggerInterface;

/**
 * Consumer implementation
 *
 * @author Daniel Antonio Moreno Ramirez <daniel.moreno@omni.pro>
 */
class Consumer implements ConsumerInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Constructor
     *
     * @param LoggerInterface $logger
     */
    public function __construct(
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    /**
     * @inheritDoc
     */
    public function consume(MessageInterface $message)
    {
        $this->logger->info('[Omnipro\Base\Model\Async\Consumer\Consumer::consume] - Process', [
            'text_processed' => $message->getText()
        ]);
    }
}
