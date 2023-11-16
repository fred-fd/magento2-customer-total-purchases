<?php

namespace Freddev\CustomerTotalPurchases\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_CUSTOMERTOTALPURCHASES = 'customertotalpurchases/';

    /**
     * OrderFactory instance
     * @var \Magento\Sales\Model\OrderFactory
     */
    protected $orderFactory;

    /**
     * SessionFactory instance
     * @var \Magento\Customer\Model\SessionFactory
     */
    protected $sessionFactory;

    /**
     * PriceCurrency
     * @var \Magento\Framework\Pricing\PriceCurrencyInterface
     */
    protected $priceCurrency;
    
    /**
     * Data constructor.
     *
     * @param Context $context
     * @param OrderFactory $orderFactory
     * @param SessionFactory $sessionFactory
     * @param PriceCurrencyInterface $priceCurrency
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Sales\Model\OrderFactory $orderFactory,
        \Magento\Customer\Model\SessionFactory $sessionFactory,
        \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency
    ) {
        $this->orderFactory = $orderFactory;
        $this->sessionFactory = $sessionFactory;
        $this->priceCurrency = $priceCurrency;
        parent::__construct($context);
    }

    public function getConfigValue($field, $storeId = null)
	{
		return $this->scopeConfig->getValue(
			$field, ScopeInterface::SCOPE_STORE, $storeId
		);
	}

	public function getGeneralConfig($code, $storeId = null)
	{

		return $this->getConfigValue(self::XML_PATH_CUSTOMERTOTALPURCHASES .'general/'. $code, $storeId);
	}

    public function isModuleEnable($storeId = null){

        return $this->getGeneralConfig('enable');
        
    }

    public function getTotalPurchasesAmount(){

        $customerSession = $this->sessionFactory->create();
        $customer_email = $customerSession->getCustomer()->getEmail();

        $model = $this->orderFactory->create();
        $orderCollection = $model->getCollection()
        ->addAttributeToFilter('customer_email', $customer_email);

        $totalPurchasesAmount = 0;
        foreach ($orderCollection as $order){ 
            $totalPurchasesAmount += $order->getGrandTotal(); 
        } 

        return $this->priceCurrency->convertAndFormat($totalPurchasesAmount);
    }
}