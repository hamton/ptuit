<?php

/*
 * This file is part of the Symfony framework.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Symfony\Bundle\AsseticBundle\Tests\DependencyInjection;

use Symfony\Bundle\AsseticBundle\DependencyInjection\AsseticExtension;
use Symfony\Bundle\AsseticBundle\DependencyInjection\Compiler\CheckYuiFilterPass;
use Symfony\Bundle\AsseticBundle\DependencyInjection\Compiler\CheckClosureFilterPass;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\DependencyInjection\Scope;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Request;

class AsseticExtensionTest extends \PHPUnit_Framework_TestCase
{
    private $kernel;
    private $container;

    static public function assertSaneContainer(Container $container, $message = '')
    {
        $errors = array();
        foreach ($container->getServiceIds() as $id) {
            try {
                $container->get($id);
            } catch (\Exception $e) {
                $errors[$id] = $e->getMessage();
            }
        }

        self::assertEquals(array(), $errors, $message);
    }

    protected function setUp()
    {
        if (!class_exists('Assetic\\AssetManager')) {
            $this->markTestSkipped('Assetic is not available.');
        }

        $this->kernel = $this->getMockBuilder('Symfony\\Component\\HttpKernel\\Kernel')
            ->disableOriginalConstructor()
            ->getMock();

        $this->container = new ContainerBuilder();
        $this->container->addScope(new Scope('request'));
        $this->container->register('request', 'Symfony\\Component\\HttpFoundation\\Request')->setScope('request');
        $this->container->register('twig', 'Twig_Environment');
        $this->container->setParameter('kernel.debug', false);
        $this->container->setParameter('kernel.root_dir', __DIR__);
        $this->container->setParameter('kernel.cache_dir', __DIR__);
        $this->container->setParameter('kernel.bundles', array());
    }

    /**
     * @dataProvider getDebugModes
     */
    public function testDefaultConfig($debug)
    {
        $this->container->setParameter('kernel.debug', $debug);

        $extension = new AsseticExtension();
        $extension->load(array(array()), $this->container);

        $this->assertFalse($this->container->has('assetic.filter.yui_css'), '->load() does not load the yui_css filter when a yui value is not provided');
        $this->assertFalse($this->container->has('assetic.filter.yui_js'), '->load() does not load the yui_js filter when a yui value is not provided');

        $this->assertSaneContainer($this->getDumpedContainer());
    }

    public function getDebugModes()
    {
        return array(
            array(true),
            array(false),
        );
    }

    /**
     * @dataProvider getFilterNames
     */
    public function testFilterConfigs($filter)
    {
        $config = array('filters' => array($filter => array()));

        $extension = new AsseticExtension();
        $extension->load(array($config), $this->container);

        $this->assertSaneContainer($this->getDumpedContainer());
    }

    public function getFilterNames()
    {
        $data = array();

        $finder = new Finder();
        $finder->files()->name('*.xml')->in(__DIR__.'/../../Resources/config/filters');

        foreach ($finder as $file) {
            $data[] = array($file->getBasename('.xml'));
        }

        return $data;
    }

    /**
     * @dataProvider getUseControllerKeys
     */
    public function testUseController($bool, $includes, $omits)
    {
        $extension = new AsseticExtension();
        $extension->load(array(array('use_controller' => $bool)), $this->container);

        foreach ($includes as $id) {
            $this->assertTrue($this->container->has($id), '"'.$id.'" is registered when use_controller is '.$bool);
        }

        foreach ($omits as $id) {
            $this->assertFalse($this->container->has($id), '"'.$id.'" is not registered when use_controller is '.$bool);
        }

        $this->assertSaneContainer($this->getDumpedContainer());
    }

    public function getUseControllerKeys()
    {
        return array(
            array(true, array('assetic.routing_loader', 'assetic.controller'), array('assetic.asset_writer_cache_warmer', 'assetic.asset_writer')),
            array(false, array('assetic.asset_writer_cache_warmer', 'assetic.asset_writer'), array('assetic.routing_loader', 'assetic.controller')),
        );
    }

    /**
     * @dataProvider getClosureJarAndExpected
     */
    public function testClosureCompilerPass($jar, $expected)
    {
        $this->container->addCompilerPass(new CheckClosureFilterPass());

        $config = array(
            'closure' => $jar,
            'filters' => array(
                'closure' => array(),
            ),
        );

        $extension = new AsseticExtension();
        $extension->load(array($config), $this->container);

        $this->assertSaneContainer($this->getDumpedContainer());

        $this->assertTrue($this->container->getDefinition($expected)->hasTag('assetic.filter'));
    }

    public function getClosureJarAndExpected()
    {
        return array(
            array(null, 'assetic.filter.closure.api'),
            array('/path/to/closure.jar', 'assetic.filter.closure.jar'),
        );
    }

    public function testInvalidYuiConfig()
    {
        $this->setExpectedException('RuntimeException');

        $this->container->addCompilerPass(new CheckYuiFilterPass());

        $config = array(
            'filters' => array(
                'yui_js' => array(),
            ),
        );

        $extension = new AsseticExtension();
        $extension->load(array($config), $this->container);

        $this->getDumpedContainer();
    }

    private function getDumpedContainer()
    {
        static $i = 0;
        $class = 'AsseticExtensionTestContainer'.$i++;

        $this->container->compile();

        $dumper = new PhpDumper($this->container);
        eval('?>'.$dumper->dump(array('class' => $class)));

        $container = new $class();
        $container->enterScope('request');
        $container->set('kernel', $this->kernel);

        return $container;
    }
}
