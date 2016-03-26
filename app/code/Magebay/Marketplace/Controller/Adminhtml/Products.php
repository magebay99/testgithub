<?php
namespace Magebay\Marketplace\Controller\Adminhtml;

class Products extends Productactions
{
	/**
	 * Form session key
	 * @var string
	 */
    protected $_formSessionKey  = 'marketplace_products_form_data';

    /**
     * Allowed Key
     * @var string
     */
    protected $_allowedKey      = 'Magebay_Marketplace::manage_products';

    /**
     * Model class name
     * @var string
     */
    protected $_modelClass      = 'Magebay\Marketplace\Model\Products';

    /**
     * Active menu key
     * @var string
     */
    protected $_activeMenu      = 'Magebay_Marketplace::manage_products';

    /**
     * Status field name
     * @var string
     */
    protected $_statusField     = 'status';
}