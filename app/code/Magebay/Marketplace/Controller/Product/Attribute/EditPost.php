<?php
namespace Magebay\Marketplace\Controller\Product\Attribute;
class EditPost extends \Magebay\Marketplace\Controller\Product\Attribute{

	protected $_attributeFactory;
	
	protected $resultPageFactory;
	
	protected $_buildFactory;
	
	protected $_groupCollectionFactory;
	
	protected $_filterManager;
	
	//protected $_attributeLabelCache;
	
	protected $_coreRegistry;
	
	public function __construct(	
		//\Magento\Framework\App\Action\Context $context,                
		\Magebay\Marketplace\Controller\Product\Action\Action\Context $context,                
		\Magento\Framework\Cache\FrontendInterface $attributeLabelCache,
		\Magento\Framework\Registry $coreRegistry,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
		\Magento\Catalog\Model\ResourceModel\Eav\AttributeFactory $attributeFactory,
		\Magento\Catalog\Model\Product\AttributeSet\BuildFactory $buildFactory,
		\Magento\Eav\Model\ResourceModel\Entity\Attribute\Group\CollectionFactory $groupCollectionFactory,
		\Magento\Framework\Filter\FilterManager $filterManager	
	){
		parent::__construct($context,$attributeLabelCache,$coreRegistry,$resultPageFactory);	
		$this->resultPageFactory=$resultPageFactory;
		$this->_attributeFactory=$attributeFactory;
		$this->_buildFactory=$buildFactory;
		$this->_groupCollectionFactory=$groupCollectionFactory;
		$this->_filterManager=$filterManager;
	}

	public function execute(){
	
		$data = $this->getRequest()->getPostValue();		
		$dataObject=array();
		$resultRedirect = $this->resultRedirectFactory->create();		
		try{
			if($data){
				$dataObject['attribute_code']=$data['attribute_code'];
				$dataObject['frontend_label'][0]=$data['attribute_label'];
				$dataObject['frontend_input']=$data['frontend_input'];
				$dataObject['is_required']=$data['is_required'];
				$dataObject['is_filterable_in_grid']=1;
				$dataObject['is_used_in_grid']=1;
				$dataObject['is_unique']=0;
				$dataObject['is_global']=1;
				$dataObject['is_searchable']=0;
				$dataObject['is_comparable']=0;
				$dataObject['is_filterable']=1;
				$dataObject['is_filterable_in_search']=0;
				$dataObject['is_used_for_promo_rules']=0;
				$dataObject['is_html_allowed_on_front']=1;
				$dataObject['is_visible_on_front']=0;
				$dataObject['used_in_product_listing']=0;
				$dataObject['used_for_sort_by']=0;
				$model=$this->_attributeFactory->create();
				if($data['attroptions']){
					foreach($data['attroptions'] as $key=>$item){
						if($key=='isdefault'){
							foreach($item as $k=>$_v){	
								$dataObject['default'][$k]='option_'.$_v;
							}							
							continue;
						}
						foreach($item as $k=>$_v){
							switch($k){
								case 'admin':
									$dataObject['option']['value']['option_'.$key][0]=$_v;
									break;
								case 'store':
									$dataObject['option']['value']['option_'.$key][1]=$_v;
									break;								
								default:
									break;									
							}							
						}						
					}
				}				
				
				$model->addData($dataObject);
                $model->setEntityTypeId($this->_entityTypeId);
                $model->setIsUserDefined(1);				
                $model->save();
                $this->messageManager->addSuccess(__('You saved the product attribute.'));				
				$this->_attributeLabelCache->clean();
				
			}
		}catch(\Exception $e){			
			$this->messageManager->addException($e, __('Something went wrong while saving the attribute.'));
		}
		return $resultRedirect->setPath('marketplace/*/news');
	}	
}