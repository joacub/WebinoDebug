<?php
/**
 * Webino (http://webino.sk/)
 *
 * @link        https://github.com/webino/WebinoDebug/ for the canonical source repository
 * @copyright   Copyright (c) 2014-2017 Webino, s. r. o. (http://webino.sk/)
 * @license     BSD-3-Clause
 */

namespace WebinoDebug\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Tracy\Debugger;
use WebinoDebug\Options\ModuleOptions;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Factory for module options
 */
class ModuleOptionsFactory implements FactoryInterface
{
    /**
     * Module options service name
     */
    const SERVICE = 'DebuggerOptions';

    /**
     * Configuration service section key
     */
    const CONFIG_KEY = 'webino_debug';

    /**
     * Create and return AdapterInterface instance
     *
     * For use with zend-servicemanager v2; proxies to __invoke().
     *
     * @param ServiceLocatorInterface $container
     * @return AdapterInterface|stdClass
     */
    public function createService(ServiceLocatorInterface $container)
    {
        return $this($container, ModuleOptionsFactory::class);
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('config');
        return new ModuleOptions(empty($config[$this::CONFIG_KEY]) ? [] : $config[$this::CONFIG_KEY]);
    }

}
