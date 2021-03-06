<?php
/**
 * Webino (http://webino.sk/)
 *
 * @link        https://github.com/webino/WebinoDebug/ for the canonical source repository
 * @copyright   Copyright (c) 2014-2017 Webino, s. r. o. (http://webino.sk/)
 * @license     BSD-3-Clause
 */

namespace WebinoDebug;

use WebinoDebug\Debugger\Bar\PanelInitInterface;
use WebinoDebug\Factory\DebuggerFactory;
use WebinoDebug\Factory\ModuleOptionsFactory;
use WebinoDebug\Options\ModuleOptions;
use Zend\ModuleManager\Feature;
use Zend\ModuleManager\ModuleEvent;
use Zend\ModuleManager\ModuleManagerInterface;

/**
 * WebinoDebug module
 */
class Module implements Feature\InitProviderInterface
{
    /**
     * @param ModuleManagerInterface $modules
     */
    public function init(ModuleManagerInterface $modules)
    {
        /** @var \Zend\ModuleManager\ModuleManager $modules */
        /** @var \Zend\ServiceManager\ServiceManager $services */
        $services = $modules->getEvent()->getParam('ServiceManager');
        $services->setFactory(ModuleOptionsFactory::SERVICE, ModuleOptionsFactory::class);
        $services->setFactory(DebuggerFactory::SERVICE, DebuggerFactory::class);

        $modules->getEventManager()->attach(
            ModuleEvent::EVENT_LOAD_MODULES_POST,
            function () use ($services, $modules) {


                /** @var ModuleOptions $options */
                $options = $services->get(ModuleOptionsFactory::SERVICE);

                if ($options->isDisabled()) {
                    return;
                }

                // start session for AJAX exception debug support
                //session_status() === PHP_SESSION_ACTIVE or session_start();

                // init debugger
                $debugger = $services->get(DebuggerFactory::SERVICE);

                // create bar panels
                $showBar = $options->showBar();
                if ($showBar) {
                    foreach ($options->getBarPanels() as $id => $barPanel) {
                        $debugger->setBarPanel(new $barPanel($modules), $id);
                    }
                }

                // init bar panels
                if ($showBar) {
                    foreach ($debugger->getBarPanels() as $barPanel) {
                        ($barPanel instanceof PanelInitInterface) and $barPanel->init($services);
                    }
                }

                // debugger templates
                $templateMap = $options->getTemplateMap();
                empty($templateMap) or $services->get('ViewTemplateMapResolver')->merge($templateMap);
            }
        );

    }
}
