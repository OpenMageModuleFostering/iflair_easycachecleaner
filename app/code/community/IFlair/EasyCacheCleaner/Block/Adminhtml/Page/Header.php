<?php
/**
 * Copyright © 2016 iFlair Web Technologies. All rights reserved.
 */

/**
 * Adminhtml header block
 *
 * @author iFlair Web Technologies
 */
class IFlair_EasyCacheCleaner_Block_Adminhtml_Page_Header extends Mage_Adminhtml_Block_Page_Header
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('easycachecleaner/page/header.phtml');
    }

}
