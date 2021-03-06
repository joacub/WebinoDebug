<?php
/**
 * Webino (http://webino.sk/)
 *
 * @link        https://github.com/webino/WebinoDebug/ for the canonical source repository
 * @copyright   Copyright (c) 2014-2017 Webino, s. r. o. (http://webino.sk/)
 * @license     BSD-3-Clause
 */

namespace WebinoDebug\Options;

use WebinoDebug\Debugger\Bar\ConfigPanel;
use WebinoDebug\Debugger\Bar\DumpPanel;
use WebinoDebug\Debugger\Bar\EventPanel;
use WebinoDebug\Debugger\Bar\InfoPanel;
use Zend\Stdlib\AbstractOptions;

/**
 * Class DebuggerOptions
 */
class DebuggerOptions extends AbstractOptions
{
    /**
     * @var bool
     */
    protected $enabled = true;

    /**
     * @var bool|null
     */
    protected $mode = null;

    /**
     * @var bool
     */
    protected $bar = false;

    /**
     * @var array
     */
    protected $barPanels = [
        'WebinoDebug:info'   => InfoPanel::class,
        'WebinoDebug:config' => ConfigPanel::class,
//        'WebinoDebug:events' => EventPanel::class,
    ];

    /**
     * @var bool
     */
    protected $strict = true;

    /**
     * @var string|null
     */
    protected $log;

    /**
     * @var string
     */
    protected $email = '';

    /**
     * @var string
     */
    protected $editor = 'editor';

    /**
     * @var int
     */
    protected $maxDepth = 10;

    /**
     * @var int
     */
    protected $maxLength = 300;

    /**
     * Is debugger enabled?
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * Enable debugger
     *
     * @param bool $enabled
     * @return $this
     */
    public function setEnabled($enabled)
    {
        $this->enabled = (bool) $enabled;
        return $this;
    }

    /**
     * Is debugger disabled?
     *
     * @return bool
     */
    public function isDisabled()
    {
        return !$this->enabled;
    }

    /**
     * Debugger mode
     *
     * true  = production|false
     * false = development|null
     * null  = autodetect|IP address(es) csv/array
     *
     * @return bool|null
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Debugger mode, production or development.
     *
     * @param bool|null $mode
     * @return $this
     */
    public function setMode($mode)
    {
        $this->mode = (null === $mode ? null : (bool) $mode);
        return $this;
    }

    /**
     * Is debugger bar enabled?
     *
     * @return bool
     */
    public function showBar()
    {
        return $this->bar;
    }

    /**
     * @param bool $bar
     * @return $this
     */
    public function setBar($bar)
    {
        $this->bar = (bool) $bar;
        return $this;
    }

    /**
     * Debugger bar panels
     *
     * @return array
     */
    public function getBarPanels()
    {
        return $this->barPanels;
    }

    /**
     * @param array $barPanels
     * @return $this
     */
    public function setBarPanels(array $barPanels)
    {
        $this->barPanels = $barPanels;
        return $this;
    }

    /**
     * @return bool
     */
    public function isStrict()
    {
        return $this->strict;
    }

    /**
     * Strict errors?
     *
     * @param bool $strict
     * @return $this
     */
    public function setStrict($strict)
    {
        $this->strict = (bool) $strict;
        return $this;
    }

    /**
     * @return string Empty string to disable, null for default
     */
    public function getLog()
    {
        if (null === $this->log) {
            $this->setLog('data/log');
        }
        return $this->log;
    }

    /**
     * Path to log directory
     *
     * @param string $log
     * @return $this
     */
    public function setLog($log)
    {
        $this->log = realpath($log);
        return $this;
    }

    /**
     * Administrator address
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Configure debugger administrator email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = (string) $email;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxDepth()
    {
        return $this->maxDepth;
    }

    /**
     * Variable dump max depth
     *
     * @param int $maxDepth
     * @return $this
     */
    public function setMaxDepth($maxDepth)
    {
        $this->maxDepth = (int) $maxDepth;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxLength()
    {
        return $this->maxLength;
    }

    /**
     * Maximum length of a variable
     *
     * @param int $maxLength
     * @return $this
     */
    public function setMaxLength($maxLength)
    {
        $this->maxLength = (int) $maxLength;
        return $this;
    }

    /**
     * @return string
     */
    public function getEditor(): string
    {
        return $this->editor;
    }

    /**
     * @param string $editor
     */
    public function setEditor(string $editor)
    {
        $this->editor = $editor;
    }

}
