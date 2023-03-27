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
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($method, $arguments): mixed
    {
        $class = static::class;
        $class = \substr_count($class, '\\') >= 1 ? \substr($class, strrpos($class, '\\') + 1) : $class;
        $class = "Contao\\$class";

        if (!\class_exists($class)) {
            throw new ClassNotExistsException("Class '$class' not found");
        }

        if (!\method_exists($class, $method)) {
            throw new MethodNotExistsException("Class '$class' has no method '$method'");
        }

        return \call_user_func_array([$class, $method], $arguments);
    }
}
