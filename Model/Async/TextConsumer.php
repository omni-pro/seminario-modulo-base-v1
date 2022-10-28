<?php

namespace Omnipro\Base\Model\Async;

use Omnipro\Base\Api\Async\ConsumerInterface;
use Omnipro\Base\Api\Data\MessageInterface;
use Omnipro\Base\Api\Management\TextLogProcessorInterface;
use Psr\Log\LoggerInterface;

/**
 * Text consumer implementation for queue
 *
 * @author Daniel Antonio Moreno Ramirez <daniel.moreno@omni.pro>
 */
class TextConsumer implements ConsumerInterface
{
    /**
     * @var TextLogProcessorInterface
     */
    private $textLogProcessor;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Constructor
     *
     * @param TextLogProcessorInterface $textProcessor
     * @param LoggerInterface $logger
     */
    public function __construct(
        TextLogProcessorInterface $textLogProcessor,
        LoggerInterface $logger
    ) {
        $this->textLogProcessor = $textLogProcessor;
        $this->logger = $logger;
    }

    /**
     * @inheritDoc
     */
    public function consume(MessageInterface $message)
    {
        $this->textLogProcessor->process($message->getText());

        $this->logger->info('[Omnipro\Base\Model\Async\Consumer\TextConsumer::consume] - Process', [
            'text_processed' => $message->getText()
        ]);
    }
}
