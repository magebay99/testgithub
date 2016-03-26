<?php
namespace Magebay\Marketplace\Controller\Adminhtml;

class Reviews extends Reviewactions
{
	/**
	 * Form session key
	 * @var string
	 */
    protected $_formSessionKey  = 'marketplace_reviews_form_data';

    /**
     * Allowed Key
     * @var string
     */
    protected $_allowedKey      = 'Magebay_Marketplace::manage_reviews';

    /**
     * Model class name
     * @var string
     */
    protected $_modelClass      = 'Magebay\Marketplace\Model\Reviews';

    /**
     * Active menu key
     * @var string
     */
    protected $_activeMenu      = 'Magebay_Marketplace::manage_reviews';

    /**
     * Status field name
     * @var string
     */
    protected $_statusField     = 'status';
}