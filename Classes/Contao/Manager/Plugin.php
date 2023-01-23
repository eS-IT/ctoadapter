<?php

/**
 * @package     ctoadapter
 * @since       23.01.2023 - 13:23
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see         http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2023
 * @license     EULA
 */

declare(strict_types=1);

namespace Esit\Ctoadapter\Classes\Contao\Manager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Config\ConfigInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Esit\Ctoadapter\EsitCtoadapterBundle;

class Plugin implements BundlePluginInterface
{


    /**
     * @param ParserInterface $parser
     * @return array|ConfigInterface[]
     */
    public function getBundles(ParserInterface $parser)
    {
        return [BundleConfig::create(EsitCtoadapterBundle::class)->setLoadAfter([ContaoCoreBundle::class])];
    }
}
