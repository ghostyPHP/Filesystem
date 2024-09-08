<?php

namespace Ghosty\Filesystem\Facades;

use Ghosty\Filesystem\Filesystem as FilesystemFilesystem;

class Filesystem
{
    public static function __callStatic($name, $arguments)
    {
        return (new FilesystemFilesystem)->$name(...$arguments);
    }
}
