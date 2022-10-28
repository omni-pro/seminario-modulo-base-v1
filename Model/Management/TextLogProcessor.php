<?php

namespace Omnipro\Base\Model\Management;

use Omnipro\Base\Api\Management\TextLogProcessorInterface;
use Psr\Log\LoggerInterface;

/**
 * Text Processor
 *
 * @author Daniel Antonio Moreno Ramirez <daniel.moreno@omni.pro>
 */

class TextLogProcessor implements TextLogProcessorInterface
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
    public function process(string $text): bool
    {
        sleep(10);

        $result = [
            'reverse' => strrev($text),
            'upper' => strtoupper($text),
            'lower' => strtolower($text)
        ];

        $this->logger->debug('[Omnipro\Base\Model\Management\TextLogProcessor::process] - Result', [
            'result' => $result
        ]);

        return true;
    }
}
