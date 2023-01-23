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

/**
 * Adapter für die Klassen von Contao. Da diese statisch sind
 * und so schlecht für Tests injeziert werden können.
 */
abstract class Adapter
{

    /**
     * @var string
     */
    protected string $namespace = __NAMESPACE__;


    /**
     * Ruft eine statische Methode auf.
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments): mixed
    {
        $class = \str_replace($this->namespace, 'Contao', static::class);

        if (\class_exists($class) && \method_exists($class, $name)) {
            return \call_user_func_array([$class, $name], $arguments);
        }

        return null;
    }
}
