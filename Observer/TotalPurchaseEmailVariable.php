<?php
namespace Freddev\CustomerTotalPurchases\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\ObjectManager;

class TotalPurchaseEmailVariable implements ObserverInterface
{
    /**
     * Helper instance
     * @var \Freddev\CustomerTotalPurchases\Helper\Data
     */
    protected $_helper;

    /**
     * Data constructor.
     * @param Data $helper
     */
    public function __construct(
        \Freddev\CustomerTotalPurchases\Helper\Data $helper
    ) {
        $this->_helper = $helper;
    }

    /**
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        /** @var \Magento\Framework\App\Action\Action $controller */

        $totalPurchasesAmount = $this->_helper->getTotalPurchasesAmount();
        $transport = $observer->getTransport();
        $transport['TotalPurchasesAmount'] = $totalPurchasesAmount;
    }
}