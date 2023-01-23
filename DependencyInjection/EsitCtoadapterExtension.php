<?php

/**
 * @package     ctoadapter
 * @since       23.01.2023 - 13:23
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see         http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2023
 * @license     EULA
 */

declare(strict_types = 1);

namespace Esit\Ctoadapter\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Yaml\Yaml;

class EsitCtoadapterExtension extends Extension implements PrependExtensionInterface
{


    /**
     * Konfiguriert den Logger, damit die Konfiguration nicht in app/config/config.yml geschrieben werden muss.
     * @param ContainerBuilder $container
     */
    public function prepend(ContainerBuilder $container): void
    {
        $configFile     = '/src/Esit/Ctoadapter/Resources/config/logger.yml';
        $pathForRelpace = '/src/Esit/Ctoadapter/Classes/Services';

        // Kernel hier nicht verfügbar, root manuell erstellen!
        $root = str_replace($pathForRelpace, '', __DIR__);

        if (\is_file($root . '/' . $configFile)) {
            // Konfiguration aus Yaml-Datei laden
            $configs = Yaml::parseFile($root . $configFile);

            if (\is_array($configs)) {
                // Konfiguraionen verarbeiten
                foreach ($configs as $bundle => $config) {
                    $container->prependExtensionConfig($bundle, $config);
                }
            }
        }
    }


    /**
     * Lädt die Konfigurationen
     * @param array            $mergedConfig
     * @param ContainerBuilder $container
     * @throws \Exception
     */
    public function load(array $mergedConfig, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );

        if (\is_file(__DIR__ . '/../Resources/config/services.yml')) {
            $loader->load('services.yml');
        }

        if (\is_file(__DIR__ . '/../Resources/config/listener.yml')) {
            $loader->load('listener.yml');
        }
    }
}
