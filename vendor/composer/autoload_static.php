<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitccabbd23014f4245994a38bf0b494038
{
    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'Neoan3\\Apps\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Neoan3\\Apps\\' => 
        array (
            0 => __DIR__ . '/..' . '/neoan3-apps/ops',
        ),
    );

    public static $prefixesPsr0 = array (
        'C' => 
        array (
            'Composer\\CustomDirectoryInstaller' => 
            array (
                0 => __DIR__ . '/..' . '/mnsami/composer-custom-directory-installer/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitccabbd23014f4245994a38bf0b494038::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitccabbd23014f4245994a38bf0b494038::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitccabbd23014f4245994a38bf0b494038::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
