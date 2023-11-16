<?php

namespace Freddev\CustomerTotalPurchases\Block\TotalPurchases;

class Index extends \Magento\Framework\View\Element\Template
{
    /**
     * Registry instance
     * @var \Magento\Framework\Registry
     */
    protected $registry;

    /**
     * Helper instance
     * @var \Freddev\CustomerTotalPurchases\Helper\Data
     */
    protected $_helper;
 
    /**
     * Data constructor.
     *
     * @param Context $context
     * @param Registry $registry
     * @param Data $helper
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Freddev\CustomerTotalPurchases\Helper\Data $helper,
        array $data = []
    )
    {
        $this->registry = $registry;
        $this->_helper = $helper;
        parent::__construct($context, $data);
    }

    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    public function isModuleEnable(){

        return $this->_helper->isModuleEnable();

    }

    public function getTotalPurchasesAmount(){

        return $this->_helper->getTotalPurchasesAmount();

    }
}