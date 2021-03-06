<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite848de6306a24109cb5a12d58bccb0ad
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
        'A' => 
        array (
            'Ast\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
        'Ast\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite848de6306a24109cb5a12d58bccb0ad::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite848de6306a24109cb5a12d58bccb0ad::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
