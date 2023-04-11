<?php

/**
 * @package     ctoadapter
 * @since       23.01.23 - 13:40
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see         http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2023
 * @license     EULA
 */

declare(strict_types=1);

namespace Esit\Ctoadapter\Classes\Services\Adapter;

use Esit\Ctoadapter\Classes\Exceptions\ClassNotExistsException;
use Esit\Ctoadapter\Classes\Exceptions\MethodNotExistsException;

abstract class Adapter
{
    /**
     * Ruft eine statische Methode auf.
     * @param string  $method
     * @param mixed[] $arguments
     * @return mixed
     */
    public function __call(string $method, array $arguments): mixed
    {
        $class = static::class;
        $class = \substr_count($class, '\\') >= 1 ? \substr($class, strrpos($class, '\\') + 1) : $class;
        $class = "Contao\\$class";
        $callbale   = [$class, $method];

        if (!\is_callable($callbale)) {
            throw new ClassNotExistsException("Method '$method' in class '$class' is not calable");
        }

        return \call_user_func_array($callbale, $arguments);
    }
}
