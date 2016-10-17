<?php
/**
 * User: zach
 * Date: 6/20/13
 * Time: 4:33 PM
 */

namespace Athletic\Tests\Discovery;


use Athletic\Discovery\RecursiveFileLoader;
use Mockery as m;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use PHPUnit_Framework_TestCase;

class RecursiveFileLoaderTest extends PHPUnit_Framework_TestCase
{
    private $root;


    public function setUp()
    {
        $this->root = vfsStream::setup('root');
    }


    public function tearDown()
    {
        m::close();
    }


    public function testLoadThreeClassesFromPath()
    {
        $class1 = '<?php namespace Vendor\Package\Child1; class Class1 extends \Athletic\AthleticEvent {}';
        $class2 = '<?php namespace Vendor\Package\Child2; class Class2 extends \Athletic\AthleticEvent {}';
        $class3 = '<?php namespace Vendor\Package\Child2; class Class3 extends \Athletic\AthleticEvent {}';

        $structure = array(
            'threeClasses' => array(
                'Package' => array(
                    'Child1' => array(
                        'Class1.php' => $class1
                    ),
                    'Child2' => array(
                        'Class2.php' => $class2,
                        'Class3.php' => $class3
                    )
                )
            )
        );

        vfsStream::create($structure, $this->root);
        $path = vfsStream::url('root\threeClasses\Package');

        $mockParser1 = m::mock('\Athletic\Discovery\Parser')
                       ->shouldReceive('isAthleticEvent')
                       ->once()
                       ->andReturn(true)
                       ->getMock()
                       ->shouldReceive('getFQN')
                       ->once()
                       ->andReturn('Vendor\Package\Child1\Class1')
                       ->getMock();

        $mockParser2 = m::mock('\Athletic\Discovery\Parser')
                       ->shouldReceive('isAthleticEvent')
                       ->once()
                       ->andReturn(true)
                       ->getMock()
                       ->shouldReceive('getFQN')
                       ->once()
                       ->andReturn('Vendor\Package\Child2\Class2')
                       ->getMock();

        $mockParser3 = m::mock('\Athletic\Discovery\Parser')
                       ->shouldReceive('isAthleticEvent')
                       ->once()
                       ->andReturn(true)
                       ->getMock()
                       ->shouldReceive('getFQN')
                       ->once()
                       ->andReturn('Vendor\Package\Child2\Class3')
                       ->getMock();

        $mockParserFactory = m::mock('\Athletic\Factories\ParserFactory')
                             ->shouldReceive('create')
                             ->once()
                             ->with('vfs://root/threeClasses/Package/Child1/Class1.php')
                             ->andReturn($mockParser1)
                             ->getMock();

        $mockParserFactory->shouldReceive('create')
        ->once()
        ->with('vfs://root/threeClasses/Package/Child2/Class2.php')
        ->andReturn($mockParser2)
        ->getMock();

        $mockParserFactory->shouldReceive('create')
        ->once()
        ->with('vfs://root/threeClasses/Package/Child2/Class3.php')
        ->andReturn($mockParser3)
        ->getMock();

        $fileLoader = new RecursiveFileLoader($mockParserFactory, $path);
        $classes    = $fileLoader->getClasses();

        $expectedClasses = array(
            'Vendor\Package\Child1\Class1',
            'Vendor\Package\Child2\Class2',
            'Vendor\Package\Child2\Class3',
        );

        $this->assertEquals($expectedClasses, $classes);
    }


    public function testLoadThreeClassesFromPathNoneAreAthletic()
    {
        $structure = array(
            'threeClasses' => array(
                'Package' => array(
                    'Child1' => array(
                        'Class1.php' => ''
                    ),
                    'Child2' => array(
                        'Class2.php' => '',
                        'Class3.php' => ''
                    )
                )
            )
        );

        vfsStream::create($structure, $this->root);
        $path = vfsStream::url('root\threeClasses\Package');

        $mockParser = m::mock('\Athletic\Discovery\Parser')
                      ->shouldReceive('isAthleticEvent')
                      ->times(3)
                      ->andReturn(false)
                      ->getMock();

        $mockParserFactory = m::mock('\Athletic\Factories\ParserFactory')
                             ->shouldReceive('create')
                             ->once()
                             ->with('vfs://root/threeClasses/Package/Child1/Class1.php')
                             ->andReturn($mockParser)
                             ->getMock();

        $mockParserFactory->shouldReceive('create')
        ->once()
        ->with('vfs://root/threeClasses/Package/Child2/Class2.php')
        ->andReturn($mockParser)
        ->getMock();

        $mockParserFactory->shouldReceive('create')
        ->once()
        ->with('vfs://root/threeClasses/Package/Child2/Class3.php')
        ->andReturn($mockParser)
        ->getMock();

        $fileLoader = new RecursiveFileLoader($mockParserFactory, $path);
        $classes    = $fileLoader->getClasses();

        $this->assertEmpty($classes);
    }

    /**
     * Checks if the loader accepts a file path as target.
     */
    public function testLoadClassFromFile()
    {
        $class = '<?php namespace Vendor\Package; class Test extends \Athletic\AthleticEvent {}';

        $structure = array(
            'src' => array(
                'Package' => array(
                    'Test.php' => $class
                )
            )
        );

        vfsStream::create($structure, $this->root);
        $path = vfsStream::url('root/src/Package/Test.php');

        $mockParser = m::mock('\Athletic\Discovery\Parser')
            ->shouldReceive('isAthleticEvent')
            ->once()
            ->andReturn(true)
            ->getMock()
            ->shouldReceive('getFQN')
            ->once()
            ->andReturn('Vendor\Package\Test')
            ->getMock();

        $mockParserFactory = m::mock('\Athletic\Factories\ParserFactory')
            ->shouldReceive('create')
            ->once()
            ->with('vfs://root/src/Package/Test.php')
            ->andReturn($mockParser)
            ->getMock();

        $fileLoader = new RecursiveFileLoader($mockParserFactory, $path);
        $classes    = $fileLoader->getClasses();

        $expectedClasses = array(
            'Vendor\Package\Test'
        );
        $this->assertEquals($expectedClasses, $classes);
    }

}