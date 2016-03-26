<?php
namespace Magebay\Marketplace\Controller\Adminhtml;

class Transactions extends Transactionactions
{
	/**
	 * Form session key
	 * @var string
	 */
    protected $_formSessionKey  = 'marketplace_transactions_form_data';

    /**
     * Allowed Key
     * @var string
     */
    protected $_allowedKey      = 'Magebay_Marketplace::manage_transactions';

    /**
     * Model class name
     * @var string
     */
    protected $_modelClass      = 'Magebay\Marketplace\Model\Transactions';

    /**
     * Active menu key
     * @var string
     */
    protected $_activeMenu      = 'Magebay_Marketplace::manage_transactions';

    /**
     * Status field name
     * @var string
     */
    protected $_statusField     = 'status';
}