<?php
namespace Magebay\Marketplace\Block\Adminhtml\Grid\Column;
use \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
use Magebay\Marketplace\Model\Image as ImageModel;
class Productimage extends AbstractRenderer
{
    protected $_imageModel;
	/**
     * Image images
     *
     * @var  MST\Dream\Model\Upload;
     */
	 public function __construct(
		ImageModel $ImageModel
    ) {
        //parent::__construct();
		$this->_imageModel = $ImageModel;
    }
    public function render(\Magento\Framework\DataObject $row)
    {
    	$baseUrl = $this->_imageModel->getBaseUrl();
    	$data = $this->_getValue($row);
    	$strImage = '<img width="50" height="50" src="http://magento2.webkul.com/marketplace/pub/media/catalog/product/cache/1/thumbnail/75x75/beff4985b56e3afdbeabfc89641a4582/d/o/download_1_.png" style="border: 1px solid silver" />';
    	return $strImage;
    }
}