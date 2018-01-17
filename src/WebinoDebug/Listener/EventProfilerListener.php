<?php
/**
 * Webino (http://webino.sk/)
 *
 * @link        https://github.com/webino/WebinoDebug/ for the canonical source repository
 * @copyright   Copyright (c) 2014-2017 Webino, s. r. o. (http://webino.sk/)
 * @license     BSD-3-Clause
 */

namespace WebinoDebug\Listener;

use Tracy\Debugger;
use WebinoDebug\Service\EventProfiler;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\SharedEventManagerInterface;
use Zend\ModuleManager\Listener\ServiceListenerInterface;

/**
 * Class EventProfilerListener
 */
class EventProfilerListener
{
    /**
     * Event highest priority
     */
    const HIGHEST_PRIORITY = 9999999999;

    /**
     * @var EventProfiler
     */
    protected $eventProfiler;

    /**
     * @var \Zend\Stdlib\CallbackHandler[]
     */
    protected $listeners = [];

    /**
     * @param object|EventProfiler $eventProfiler
     */
    public function __construct(EventProfiler $eventProfiler)
    {
        $this->eventProfiler = $eventProfiler;
    }

    /**
     * {@inheritdoc}
     */
    public function attach(EventManagerInterface $events, $priority = self::HIGHEST_PRIORITY)
    {
        $this->listeners[] = $events->getSharedManager()->attach('*', '*', [$this, 'onAnyEvent'], $priority);
    }

    /**
     * {@inheritdoc}
     */
    public function detach(EventManagerInterface $events)
    {
        $events = $events->getSharedManager();
        foreach ($this->listeners as $key => $listener) {
            if ($events->detach('*', '*', $listener)) {
                unset($this->listeners[$key]);
            }
        }
    }

    /**
     * @param EventInterface $event
     */
    public function onAnyEvent(EventInterface $event)
    {
        $this->eventProfiler->setEvent($event);
    }
}
