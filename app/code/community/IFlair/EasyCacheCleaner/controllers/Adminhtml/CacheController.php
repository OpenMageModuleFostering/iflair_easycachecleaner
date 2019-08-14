<?php
/**
 * Copyright © 2016 iFlair Web Technologies. All rights reserved.
 */

/**
 * Adminhtml Cache Controller
 *
 * @author iFlair Web Technologies
 */
class IFlair_EasyCacheCleaner_Adminhtml_CacheController extends Mage_Adminhtml_Controller_Action
{
    
    /**
     * @variable Cache type ids
     */
    protected  $_types = array('config','layout','block_html','translate','collections','eav','config_api','config_api2');
    
    /**
     * Mass Refresh Action
     *
     * @return Json Object
     */

    public function massRefreshAction()
    {
        $response = array();
        $types = $this->_types;
        $updatedTypes = 0;
        try{

            if (!empty($types)) {
                foreach ($types as $type) {
                    $tags = Mage::app()->getCacheInstance()->cleanType($type);
                    Mage::dispatchEvent('adminhtml_cache_refresh_type', array('type' => $type));
                    $updatedTypes++;
                }
            }
        if ($updatedTypes > 0) {
            $response['type'] = 'success';
            $response['success'] = true;
            $response['message'] = Mage::helper('adminhtml')->__("%s cache type(s) refreshed.", $updatedTypes);
        }
        }catch(Exception $e){
            $response['type'] = 'error';
            $response['error'] = true;
            $response['message'] = Mage::helper('adminhtml')->__('An error occurred while refreshing cache.');
        }
        echo json_encode($response);
    }
}
