<?php

namespace Omnipro\Base\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

/**
 * Config Model
 *
 * @author Daniel Antonio Moreno Ramirez <daniel.moreno@omni.pro>
 */
class Config
{

    private const XML_CONFIG_ENABLE = 'omnipro_base/general/enable';

    private const XML_CONFIG_DEBUG_ENABLE = 'omnipro_base/http_client/debug_requests_enable';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * Constructor
     *
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Is module enable
     *
     * @param string $scopeType
     * @param string|int|null $scopeCode
     * @return bool
     */
    public function isEnable($scopeType = ScopeInterface::SCOPE_STORE, $scopeCode = null): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_CONFIG_ENABLE, $scopeType, $scopeCode);
    }

    /**
     * Is debug request enable
     *
     * @param string $scopeType
     * @param string|int|null $scopeCode
     * @return bool
     */
    public function isDebugRequestsEnable($scopeType = ScopeInterface::SCOPE_STORE, $scopeCode = null): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_CONFIG_DEBUG_ENABLE, $scopeType, $scopeCode);
    }
}
