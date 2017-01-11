# Web debugger <br /> for Zend Framework 2

[![Build Status](https://secure.travis-ci.org/webino/WebinoDebug.png?branch=develop)](http://travis-ci.org/webino/WebinoDebug "Develop Build Status")
[![Coverage Status](https://coveralls.io/repos/webino/WebinoDebug/badge.png?branch=develop)](https://coveralls.io/r/webino/WebinoDebug?branch=develop "Develop Coverage Status")
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/webino/WebinoDebug/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/webino/WebinoDebug/?branch=develop "Develop Quality Score")
[![Dependency Status](https://www.versioneye.com/user/projects/54731cd881010688ca0009ae/badge.svg)](https://www.versioneye.com/user/projects/54731cd881010688ca0009ae "Develop Dependency Status")
<br />
[![Latest Stable Version](https://poser.pugx.org/webino/webino-debug/v/stable.svg)](https://packagist.org/packages/webino/webino-debug)
[![Total Downloads](https://poser.pugx.org/webino/webino-debug/downloads)](https://packagist.org/packages/webino/webino-debug)
[![Latest Unstable Version](https://poser.pugx.org/webino/webino-debug/v/unstable.svg)](https://packagist.org/packages/webino/webino-debug)
[![License](https://poser.pugx.org/webino/webino-debug/license.svg)](https://packagist.org/packages/webino/webino-debug)

More than just user friendly error and exception handling.

- Powered by [Tracy](https://github.com/nette/tracy)
- Demo [webino-debug.demo.webino.org](http://webino-debug.demo.webino.org)
  - [Screen of Death](http://webino-debug.demo.webino.org/application/index/exception)

## Features

- User friendly errors and exceptions
- Can write error log
- Can notify by email
- Discrete production server error page
- Optional Tracy debugger bar
  - Config viewer
  - Event profiler

## Requirements

- PHP 5.6
- ZendFramework 2

## Setup

Open terminal and go to your application directory

1. Run `php composer.phar require webino/webino-debug:dev-develop`
- Add `WebinoDebug` to the enabled modules list as one of first modules

*NOTE: Considering a zf2-skeleton or very similar application.*

## Showcase

![local error](https://raw.githubusercontent.com/webino/WebinoDebug/develop/doc/showcase/dev-error.png "Errors & Exceptions")
![public error](https://raw.githubusercontent.com/webino/WebinoDebug/develop/doc/showcase/public-error.png "Title")

## Development

We will appreciate any contributions on development of this module.

Learn [How to develop Webino modules](https://github.com/webino/Webino/wiki/How-to-develop-Webino-module)

## Addendum

  Please, if you are interested in this Zend Framework module report any issues and don't hesitate to contribute.

[Report a bug](https://github.com/webino/WebinoDebug/issues) | [Fork me](https://github.com/webino/WebinoDebug)
