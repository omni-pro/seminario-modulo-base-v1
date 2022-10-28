<?php

namespace Omnipro\Base\Controller\Seminar;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Serialize\SerializerInterface;
use Omnipro\Base\Api\Management\TextLogProcessorInterface;

/**
 * Process Async Controller
 *
 * @author Daniel Antonio Moreno Ramirez <daniel.moreno@omni.pro>
 */
class ProcessSync implements HttpPostActionInterface
{
    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @var ResultFactory
     */
    private $resultFactory;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var TextLogProcessorInterface
     */
    private $textLogProcessor;

    /**
     * Constructor
     *
     * @param RequestInterface $request
     * @param ResultFactory $resultFactory
     * @param SerializerInterface $serializer
     * @param TextLogProcessorInterface $textLogProcessor
     */
    public function __construct(
        RequestInterface $request,
        ResultFactory $resultFactory,
        SerializerInterface $serializer,
        TextLogProcessorInterface $textLogProcessor
    ) {
        $this->request = $request;
        $this->resultFactory = $resultFactory;
        $this->serializer = $serializer;
        $this->textLogProcessor = $textLogProcessor;
    }

    /**
     * Constructor
     */
    public function execute()
    {
        $this->textLogProcessor->process($this->serializer->unserialize($this->request->getContent())['text']);

        /**
         * @var \Magento\Framework\Controller\Result\Json $resultJson
         */
        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $resultJson->setData([
            'status' => true
        ]);
        return $resultJson;
    }
}
