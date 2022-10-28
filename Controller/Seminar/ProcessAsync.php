<?php

namespace Omnipro\Base\Controller\Seminar;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Math\Random;
use Magento\Framework\Serialize\SerializerInterface;
use Omnipro\Base\Api\Async\PublisherInterface;
use Omnipro\Base\Api\Data\MessageInterfaceFactory;

/**
 * Process Async Controller
 *
 * @author Daniel Antonio Moreno Ramirez <daniel.moreno@omni.pro>
 */
class ProcessAsync implements HttpPostActionInterface
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
     * @var Random
     */
    private $random;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var PublisherInterface
     */
    private $publisher;

    /**
     * @var MessageInterfaceFactory
     */
    private $messageInterfaceFactory;

    /**
     * Constructor
     *
     * @param RequestInterface $request
     * @param ResultFactory $resultFactory
     * @param Random $random
     * @param SerializerInterface $serializer
     * @param PublisherInterface $publisher
     * @param MessageInterfaceFactory $messageInterfaceFactory
     */
    public function __construct(
        RequestInterface $request,
        ResultFactory $resultFactory,
        Random $random,
        SerializerInterface $serializer,
        PublisherInterface $publisher,
        MessageInterfaceFactory $messageInterfaceFactory
    ) {
        $this->request = $request;
        $this->resultFactory = $resultFactory;
        $this->random = $random;
        $this->serializer = $serializer;
        $this->publisher = $publisher;
        $this->messageInterfaceFactory = $messageInterfaceFactory;
    }

    /**
     * Constructor
     */
    public function execute()
    {
        $message = $this->messageInterfaceFactory->create();
        $message->setHash($this->random->getUniqueHash())
            ->setText($this->serializer->unserialize($this->request->getContent())['text']);

        $this->publisher->publish($message);

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
