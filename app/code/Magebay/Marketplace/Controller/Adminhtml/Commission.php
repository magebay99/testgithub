<?php
namespace Magebay\Marketplace\Controller\Adminhtml;
class Commission extends Commissionactions
{
	/**
	 * Form session key
	 * @var string
	 */
    protected $_formSessionKey  = 'marketplace_commission_form_data';

    /**
     * Allowed Key
     * @var string
     */
    protected $_allowedKey      = 'Magebay_Marketplace::manage_commission';

    /**
     * Model class name
     * @var string
     */
    protected $_modelClass      = 'Magebay\Marketplace\Model\Commission';

    /**
     * Active menu key
     * @var string
     */
    protected $_activeMenu      = 'Magebay_Marketplace::manage_commission';

    /**
     * Status field name
     * @var string
     */
    protected $_statusField     = 'status';
}