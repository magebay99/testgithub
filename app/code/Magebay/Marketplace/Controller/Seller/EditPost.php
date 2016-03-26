<?php
namespace Magebay\Marketplace\Controller\Seller;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Filesystem\DirectoryList;

class EditPost extends \Magento\Framework\App\Action\Action{
	public function __construct(
		Context $context
	){
		parent::__construct($context);	
	}
	
	public function execute(){
		$resultRedirect = $this->resultRedirectFactory->create();
		$request = $this->getRequest();
		try{
			$params = $request->getParams();					
			if (count($_FILES)) {				
				foreach($_FILES as $_itemfile=>$_itemfilevalue){
					if(!$_itemfilevalue['error']){
						try {
							$uploader = $this->_objectManager->create(
								'Magento\MediaStorage\Model\File\Uploader',
								['fileId' => $_itemfile]
							);
							$uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);

							/** @var \Magento\Framework\Image\Adapter\AdapterInterface $imageAdapter */
							$imageAdapter = $this->_objectManager->get('Magento\Framework\Image\AdapterFactory')->create();

							$uploader->addValidateCallback('market_'.$_itemfile, $imageAdapter, 'validateUploadFile');
							$uploader->setAllowRenameFiles(true);
							$uploader->setFilesDispersion(true);

							/** @var \Magento\Framework\Filesystem\Directory\Read $mediaDirectory */
							$mediaDirectory = $this->_objectManager->get('Magento\Framework\Filesystem')
												   ->getDirectoryRead(DirectoryList::MEDIA);
							$result = $uploader->save($mediaDirectory->getAbsolutePath(\Magebay\Marketplace\Model\Sellers::BASE_MEDIA_PATH));
							$params[$_itemfile] = \Magebay\Marketplace\Model\Sellers::BASE_MEDIA_PATH . $result['file'];
						} catch (\Exception $e) {
							if ($e->getCode() == 0) {
								$this->messageManager->addError($this->_objectManager->get('Magento\Framework\Escaper')->escapeHtml($e->getMessage()));
							}
							if (isset($params[$_itemfile]) && isset($params[$_itemfile]['value'])) {
								if (isset($params[$_itemfile]['delete'])) {
									$params[$_itemfile] = '';
									//$params['delete_image'] = true;
								} else if (isset($params[$_itemfile]['value'])) {
									$params[$_itemfile] = $params[$_itemfile]['value'];
								} else {
									$params[$_itemfile] = '';
								}
							}
						}					
					}else{												
						if (isset($params[$_itemfile]) && isset($params[$_itemfile]['value'])) {
							if (isset($params[$_itemfile]['delete'])) {
								$params[$_itemfile] = '';
								//$params['delete_image'] = true;
							} else if (isset($params[$_itemfile]['value'])) {
								$params[$_itemfile] = $params[$_itemfile]['value'];
							} else {
								$params[$_itemfile] = '';
							}
						}						
					}					
				}		
			}
			
			try{
				if ($this->getRequest()->isPost()) {						
					$_id=$this->getRequest()->getParam('sellerId');					
					$_model=$this->_objectManager->create('Magebay\Marketplace\Model\Sellers')->load($_id);
					$_model->addData($params);
					$_model->save();
					$this->messageManager->addSuccess(__('You saved the info seller.'));					
				}
			}catch(\Magento\Framework\Exception\LocalizedException $e){
				$this->messageManager->addError($this->_objectManager->get('Magento\Framework\Escaper')->escapeHtml($e->getMessage()));
			}
		}catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->messageManager->addError($this->_objectManager->get('Magento\Framework\Escaper')->escapeHtml($e->getMessage()));            
        }
		return $resultRedirect->setPath('*/*/account');
	}	
}