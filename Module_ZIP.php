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
 * @version 7.0.1
 * @since 6.10.0
 */
final class Module_ZIP extends GDO_Module
{
    ##############
    ### Module ###
    ##############
    public function href_administrate_module() : ?string { return $this->href('Admin'); }
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
            GDT_Path::make('zip_binary')->existingFile(),
            GDT_Path::make('gzip_binary')->existingFile(),
        ];
    }
    public function cfgZipPath() : string { return $this->getConfigVar('zip_binary'); }
    public function cfgGZipPath() : string { return $this->getConfigVar('gzip_binary'); }
    
}
