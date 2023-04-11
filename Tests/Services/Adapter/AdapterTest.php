<?php
/**
 * @package     Ctoadapter
 * @since       27.03.2023 - 15:06
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see         http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2023
 * @license     EULA
 */
declare(strict_types=1);

namespace Esit\Test\Adapter {

    use Esit\Ctoadapter\Classes\Services\Adapter\Adapter;

    class Config extends Adapter {}

    class NoContaoClass extends Adapter {}
}

namespace Esit\Ctoadapter\Tests\Services\Adapter {

    use Esit\Ctoadapter\Classes\Exceptions\ClassNotExistsException;
    use Esit\Test\Adapter\Config;
    use Esit\Test\Adapter\NoContaoClass;
    use PHPUnit\Framework\TestCase;

    class AdapterTest extends TestCase
    {


        public function test__callThorwExceptionIfClassIsNotFound(): void
        {
            $this->expectException(ClassNotExistsException::class);
            $this->expectExceptionMessage("Method 'get' in class 'Contao\NoContaoClass' is not calable");
            $adapter = new NoContaoClass();
            $adapter->get();
        }


        public function test__callThorwExceptionIfMethodeIsNotFound(): void
        {
            $this->expectException(ClassNotExistsException::class);
            $this->expectExceptionMessage("Method 'noMethod' in class 'Contao\Config' is not calable");
            $adapter = new Config();
            $adapter->noMethod();
        }


        public function test__callReturnNullIfNoValueFound(): void
        {
            $adapter = new Config();
            self::assertNull($adapter->get('noSetting'));
        }


        public function test__callReturnValueIfValueIsSet(): void
        {
            $key                        = 'testSetting';
            $GLOBALS['TL_CONFIG'][$key] = 'my test value!';
            $adapter                    = new Config();
            self::assertSame($GLOBALS['TL_CONFIG'][$key], $adapter->get($key));
        }
    }
}
