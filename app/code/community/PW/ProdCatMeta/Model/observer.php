<?php
class PW_ProdCatMeta_Model_Observer
{

    public function productView(Varien_Event_Observer $observer)
    {
    	
    	if (!Mage::getStoreConfigFlag('advanced/modules_disable_output/PW_ProdCatMeta')) {
	        $product = $observer->getEvent()->getProduct();
	        /* @var $product Mage_Catalog_Model_Product */
	
	        if (!$product->getMetaDescription()){
	
	            // Add the category name     
	            $catarray=array();
	            $catarray = $product->getCategoryIds();
	            sort($catarray);
	            //$catarrayexpl = implode(',',$catarray);
	            $category = Mage::getModel('catalog/category')->load($catarray[0]);
	            $catdescription = $category->getMetaDescription();
	            $product->setMetaDescription($catdescription); //.'  '.$catarrayexpl
	        }
    	}
    }

}