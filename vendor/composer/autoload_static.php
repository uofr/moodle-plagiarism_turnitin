<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0fe026b7ec5872d4051c02ca5a6adb33
{
    public static $prefixLengthsPsr4 = array (
        'I' =>
        array (
            'Integrations\\PhpSdk\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Integrations\\PhpSdk\\' =>
        array (
            0 => __DIR__ . '/..' . '/Integrations/phpsdk-package/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'H' =>
        array (
            'Httpful' =>
            array (
                0 => __DIR__ . '/..' . '/nategood/httpful/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0fe026b7ec5872d4051c02ca5a6adb33::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0fe026b7ec5872d4051c02ca5a6adb33::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit0fe026b7ec5872d4051c02ca5a6adb33::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}