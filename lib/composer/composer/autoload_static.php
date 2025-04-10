<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4bb5317b472196f2a02090f15d1d599e
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Wef\\Calendario\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Wef\\Calendario\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4bb5317b472196f2a02090f15d1d599e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4bb5317b472196f2a02090f15d1d599e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4bb5317b472196f2a02090f15d1d599e::$classMap;

        }, null, ClassLoader::class);
    }
}
