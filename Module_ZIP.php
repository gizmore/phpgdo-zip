<?php
namespace GDO\ZIP;

use GDO\Core\GDO_Module;
use GDO\Core\GDT_Path;
use GDO\ZIP\Method\Admin;

/**
 * Holds path for zip and gzip.
 * Detector in admin function.
 * If detector is not working for your windows box try `where zip` in a cmdline and use that value.
 * 
 * @author gizmore
 * @version 6.10
 * @since 6.10
 */
final class Module_ZIP extends GDO_Module
{
    ##############
    ### Module ###
    ##############
    public function hrefAdministration() : ?string { return $this->href('Admin'); }
    public function onLoadLanguage() : void { $this->loadLanguage('lang/zip'); }

    ###############
    ### Install ###
    ###############
    public function onInstall() : void
    {
    	Admin::make()->detectBinaries();
    }
    
    ##############
    ### Config ###
    ##############
    public function getConfig() : array
    {
        return [
            GDT_Path::make('gzip_binary')->initial('gzip')->existingFile(),
            GDT_Path::make('zip_binary')->initial('zip')->existingFile(),
        ];
    }
    public function cfgGZipPath() { return $this->getConfigVar('gzip_binary'); }
    public function cfgZipPath() { return $this->getConfigVar('zip_binary'); }
    
}
