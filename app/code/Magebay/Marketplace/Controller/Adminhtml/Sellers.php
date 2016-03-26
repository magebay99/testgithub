<?php
namespace Magebay\Marketplace\Controller\Adminhtml;

class Sellers extends Selleractions
{
	/**
	 * Form session key
	 * @var string
	 */
    protected $_formSessionKey  = 'marketplace_sellers_form_data';

    /**
     * Allowed Key
     * @var string
     */
    protected $_allowedKey      = 'Magebay_Marketplace::manage_sellers';

    /**
     * Model class name
     * @var string
     */
    protected $_modelClass      = 'Magebay\Marketplace\Model\Sellers';

    /**
     * Active menu key
     * @var string
     */
    protected $_activeMenu      = 'Magebay_Marketplace::manage_sellers';

    /**
     * Status field name
     * @var string
     */
    protected $_statusField     = 'userstatus';
}