<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdea160c8fbda8663e128e917249d6a71
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '023d27dca8066ef29e6739335ea73bad' => __DIR__ . '/..' . '/symfony/polyfill-php70/bootstrap.php',
        '25072dd6e2470089de65ae7bf11d3109' => __DIR__ . '/..' . '/symfony/polyfill-php72/bootstrap.php',
        '3a77fa3738f269cca86e0119be3698fb' => __DIR__ . '/../..' . '/core/Connexion.php',
        '9db69c0f87720489a3cd5698ffa54820' => __DIR__ . '/../..' . '/config/Config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twig\\Extensions\\' => 16,
            'Twig\\' => 5,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Php72\\' => 23,
            'Symfony\\Polyfill\\Php70\\' => 23,
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
            'Symfony\\Contracts\\' => 18,
            'Symfony\\Component\\Stopwatch\\' => 28,
            'Symfony\\Component\\Process\\' => 26,
            'Symfony\\Component\\OptionsResolver\\' => 34,
            'Symfony\\Component\\Finder\\' => 25,
            'Symfony\\Component\\Filesystem\\' => 29,
            'Symfony\\Component\\EventDispatcher\\' => 34,
            'Symfony\\Component\\Console\\' => 26,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'PhpCsFixer\\' => 11,
        ),
        'D' => 
        array (
            'Doctrine\\Common\\Annotations\\' => 28,
        ),
        'C' => 
        array (
            'Composer\\XdebugHandler\\' => 23,
            'Composer\\Semver\\' => 16,
        ),
        'B' => 
        array (
            'Blog\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twig\\Extensions\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/extensions/src',
        ),
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Symfony\\Polyfill\\Php72\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php72',
        ),
        'Symfony\\Polyfill\\Php70\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php70',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Symfony\\Contracts\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/contracts',
        ),
        'Symfony\\Component\\Stopwatch\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/stopwatch',
        ),
        'Symfony\\Component\\Process\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/process',
        ),
        'Symfony\\Component\\OptionsResolver\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/options-resolver',
        ),
        'Symfony\\Component\\Finder\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/finder',
        ),
        'Symfony\\Component\\Filesystem\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/filesystem',
        ),
        'Symfony\\Component\\EventDispatcher\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/event-dispatcher',
        ),
        'Symfony\\Component\\Console\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/console',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'PhpCsFixer\\' => 
        array (
            0 => __DIR__ . '/..' . '/friendsofphp/php-cs-fixer/src',
        ),
        'Doctrine\\Common\\Annotations\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/annotations/lib/Doctrine/Common/Annotations',
        ),
        'Composer\\XdebugHandler\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/xdebug-handler/src',
        ),
        'Composer\\Semver\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/semver/src',
        ),
        'Blog\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_Extensions_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/extensions/lib',
            ),
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
        'D' => 
        array (
            'Doctrine\\Common\\Lexer\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/lexer/lib',
            ),
        ),
    );

    public static $classMap = array (
        'ArithmeticError' => __DIR__ . '/..' . '/symfony/polyfill-php70/Resources/stubs/ArithmeticError.php',
        'AssertionError' => __DIR__ . '/..' . '/symfony/polyfill-php70/Resources/stubs/AssertionError.php',
        'DivisionByZeroError' => __DIR__ . '/..' . '/symfony/polyfill-php70/Resources/stubs/DivisionByZeroError.php',
        'Error' => __DIR__ . '/..' . '/symfony/polyfill-php70/Resources/stubs/Error.php',
        'ParseError' => __DIR__ . '/..' . '/symfony/polyfill-php70/Resources/stubs/ParseError.php',
        'PhpCsFixer\\Diff\\Chunk' => __DIR__ . '/..' . '/php-cs-fixer/diff/src/Chunk.php',
        'PhpCsFixer\\Diff\\ConfigurationException' => __DIR__ . '/..' . '/php-cs-fixer/diff/src/Exception/ConfigurationException.php',
        'PhpCsFixer\\Diff\\Diff' => __DIR__ . '/..' . '/php-cs-fixer/diff/src/Diff.php',
        'PhpCsFixer\\Diff\\Differ' => __DIR__ . '/..' . '/php-cs-fixer/diff/src/Differ.php',
        'PhpCsFixer\\Diff\\Exception' => __DIR__ . '/..' . '/php-cs-fixer/diff/src/Exception/Exception.php',
        'PhpCsFixer\\Diff\\InvalidArgumentException' => __DIR__ . '/..' . '/php-cs-fixer/diff/src/Exception/InvalidArgumentException.php',
        'PhpCsFixer\\Diff\\Line' => __DIR__ . '/..' . '/php-cs-fixer/diff/src/Line.php',
        'PhpCsFixer\\Diff\\LongestCommonSubsequenceCalculator' => __DIR__ . '/..' . '/php-cs-fixer/diff/src/LongestCommonSubsequenceCalculator.php',
        'PhpCsFixer\\Diff\\MemoryEfficientLongestCommonSubsequenceCalculator' => __DIR__ . '/..' . '/php-cs-fixer/diff/src/MemoryEfficientLongestCommonSubsequenceCalculator.php',
        'PhpCsFixer\\Diff\\Output\\AbstractChunkOutputBuilder' => __DIR__ . '/..' . '/php-cs-fixer/diff/src/Output/AbstractChunkOutputBuilder.php',
        'PhpCsFixer\\Diff\\Output\\DiffOnlyOutputBuilder' => __DIR__ . '/..' . '/php-cs-fixer/diff/src/Output/DiffOnlyOutputBuilder.php',
        'PhpCsFixer\\Diff\\Output\\DiffOutputBuilderInterface' => __DIR__ . '/..' . '/php-cs-fixer/diff/src/Output/DiffOutputBuilderInterface.php',
        'PhpCsFixer\\Diff\\Output\\StrictUnifiedDiffOutputBuilder' => __DIR__ . '/..' . '/php-cs-fixer/diff/src/Output/StrictUnifiedDiffOutputBuilder.php',
        'PhpCsFixer\\Diff\\Output\\UnifiedDiffOutputBuilder' => __DIR__ . '/..' . '/php-cs-fixer/diff/src/Output/UnifiedDiffOutputBuilder.php',
        'PhpCsFixer\\Diff\\Parser' => __DIR__ . '/..' . '/php-cs-fixer/diff/src/Parser.php',
        'PhpCsFixer\\Diff\\TimeEfficientLongestCommonSubsequenceCalculator' => __DIR__ . '/..' . '/php-cs-fixer/diff/src/TimeEfficientLongestCommonSubsequenceCalculator.php',
        'PhpCsFixer\\Tests\\TestCase' => __DIR__ . '/..' . '/friendsofphp/php-cs-fixer/tests/TestCase.php',
        'PhpCsFixer\\Tests\\Test\\AbstractFixerTestCase' => __DIR__ . '/..' . '/friendsofphp/php-cs-fixer/tests/Test/AbstractFixerTestCase.php',
        'PhpCsFixer\\Tests\\Test\\AbstractIntegrationCaseFactory' => __DIR__ . '/..' . '/friendsofphp/php-cs-fixer/tests/Test/AbstractIntegrationCaseFactory.php',
        'PhpCsFixer\\Tests\\Test\\AbstractIntegrationTestCase' => __DIR__ . '/..' . '/friendsofphp/php-cs-fixer/tests/Test/AbstractIntegrationTestCase.php',
        'PhpCsFixer\\Tests\\Test\\Assert\\AssertTokensTrait' => __DIR__ . '/..' . '/friendsofphp/php-cs-fixer/tests/Test/Assert/AssertTokensTrait.php',
        'PhpCsFixer\\Tests\\Test\\IntegrationCase' => __DIR__ . '/..' . '/friendsofphp/php-cs-fixer/tests/Test/IntegrationCase.php',
        'PhpCsFixer\\Tests\\Test\\IntegrationCaseFactory' => __DIR__ . '/..' . '/friendsofphp/php-cs-fixer/tests/Test/IntegrationCaseFactory.php',
        'PhpCsFixer\\Tests\\Test\\IntegrationCaseFactoryInterface' => __DIR__ . '/..' . '/friendsofphp/php-cs-fixer/tests/Test/IntegrationCaseFactoryInterface.php',
        'PhpCsFixer\\Tests\\Test\\InternalIntegrationCaseFactory' => __DIR__ . '/..' . '/friendsofphp/php-cs-fixer/tests/Test/InternalIntegrationCaseFactory.php',
        'SessionUpdateTimestampHandlerInterface' => __DIR__ . '/..' . '/symfony/polyfill-php70/Resources/stubs/SessionUpdateTimestampHandlerInterface.php',
        'TypeError' => __DIR__ . '/..' . '/symfony/polyfill-php70/Resources/stubs/TypeError.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdea160c8fbda8663e128e917249d6a71::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdea160c8fbda8663e128e917249d6a71::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitdea160c8fbda8663e128e917249d6a71::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitdea160c8fbda8663e128e917249d6a71::$classMap;

        }, null, ClassLoader::class);
    }
}
