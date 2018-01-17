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
use WebinoDebug\Options\ModuleOptions;
use WebinoDebug\Service\Debugger;
use WebinoDebug\Service\DebuggerInterface;
use WebinoDebug\Service\NullDebugger;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Factory for a debugger
 */
class DebuggerFactory implements FactoryInterface
{
    /**
     * Debugger service name
     */
    const SERVICE = 'Debugger';

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
        return $this($container, DebuggerFactory::class);
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $options = $container->get(ModuleOptionsFactory::SERVICE);
        return $options->isEnabled() ? new Debugger($options) : new NullDebugger;
    }

}
