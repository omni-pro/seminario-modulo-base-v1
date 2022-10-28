<?php

namespace Omnipro\Base\Api\Management;

/**
 * Text Processor Interface
 *
 * @author Daniel Antonio Moreno Ramirez <daniel.moreno@omni.pro>
 */
interface TextLogProcessorInterface
{
    /**
     * Process text
     *
     * @param string $text
     * @return bool
     */
    public function process(string $text): bool;
}
