# Omnipro_Integration Module

### Author
Daniel Antonio Moreno Ramirez <daniel.moreno@omni.pro> || OmniPro Team

### Package:
Omnipro_Base

## Associated tickets:
To do

## Integration module by Omni.pro

    omnipro/base

- [Main Functionalities](#markdown-header-main-functionalities)
- [Installation](#markdown-header-installation)
- [Specifications](#markdown-header-specifications)

## Main Functionalities
- Client for HTTP petitions use CURL
- Definition admin base configuration
- Definition for cron group
- Example for queue message with RabbitMQ

## Installation

### Composer

- Use command `composer require omnipro/base`

## Specifications

- Api
    - Omnipro\Base\Api\Async\ConsumerInterface
    - Omnipro\Base\Api\Async\PublisherInterface
    - Omnipro\Base\Api\Data\MessageInterface
    - Omnipro\Base\Api\Management\TextLogProcessorInterface
    - Omnipro\Base\Api\ClientInterface
- Controller
    - Omnipro\Base\Controller\Seminar\Async
    - Omnipro\Base\Controller\Seminar\Index
    - Omnipro\Base\Controller\Seminar\ProcessAsync
    - Omnipro\Base\Controller\Seminar\ProcessSync
- Model
    - Omnipro\Base\Model\Async\Consumer
    - Omnipro\Base\Model\Async\TextConsumer
    - Omnipro\Base\Model\Async\Publisher
    - Omnipro\Base\Model\Data\Message
    - Omnipro\Base\Model\Management\TextLogProcessor
    - Omnipro\Base\Model\CurlClient
    - Omnipro\Base\Model\Config
- ACL
    - Omnipro_Base::base_config
- Cron group
    - omnipro_base
- Queues
    - omnipro.async.operations.all
    - omnipro.async.operations.process.text
- Queue consumers
    - omnipro.async.operations.all
    - omnipro.async.operations.process.text
- Loggers
    - /var/log/omnipro/curl-rest-client.log
    - /var/log/omnipro/async-example-processor.log
    - /var/log/omnipro/async-example-consumer.log

### Copyright
Copyright (c) 2022 OmniPro (https://omni.pro/)