<?php 
namespace Magebay\Marketplace\Controller\Product\Attribute;
class Validate extends \Magebay\Marketplace\Controller\Product\Attribute{

    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $resultJsonFactory;
	
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory		
	){
		parent::__construct($context);
		$this->resultJsonFactory = $resultJsonFactory;
	}
	
	public function execute(){
        $response = new \Magento\Framework\DataObject();
        $response->setError(false);
		$attributeCode = $this->getRequest()->getParam('attribute_code');
        $frontendLabel = $this->getRequest()->getParam('frontend_label');
		if(!$attributeCode){
			$attributeCode = $attributeCode ?: $this->generateCode($frontendLabel[0]);
		}
        $attribute = $this->_objectManager->create(
            'Magento\Catalog\Model\ResourceModel\Eav\Attribute'
        )->loadByCode(
            $this->_entityTypeId,
            $attributeCode
        );
		
        if ($attribute->getId() && !$attributeId) {
            if (strlen($this->getRequest()->getParam('attribute_code'))) {
                $response->setMessage(
                    __('An attribute with this code already exists.')
                );
            } else {
                $response->setMessage(
                    __('An attribute with the same code (%1) already exists.', $attributeCode)
                );
            }
            $response->setError(true);
        }
		
		return $this->resultJsonFactory->create()->setJsonData($response->toJson());		
	}
}