<?php

namespace Ghosty\Filesystem;

use Ghosty\Filesystem\Contracts\FilesystemContract;
use Ghosty\Filesystem\Exceptions\FileNotFoundException;

class Filesystem implements FilesystemContract
{
    public function exists(string $path): bool
    {
        return file_exists($path);
    }

    public function get(string $path): string
    {
        if ($this->exists($path))
        {
            return file_get_contents($path);
        }

        throw new FileNotFoundException($path);
    }

    public function json($path, $flags = 0): array
    {
        return json_decode($this->get($path), true, 512, $flags);
    }

    public function put($path, $contents): bool
    {
        return file_put_contents($path, $contents) ? true : false;
    }

    public function hash($path, $algorithm = 'md5'): string
    {
        if ($this->exists($path))
        {
            return hash_file($algorithm, $path);
        }
        throw new FileNotFoundException($path);
    }

    public function append($path, $data): bool
    {
        if ($this->exists($path))
        {
            return $this->put($path, $this->get($path) . $data);
        }

        return $this->put($path, $data);
    }

    public function prepend($path, $data): bool
    {
        if ($this->exists($path))
        {
            return $this->put($path, $data . $this->get($path));
        }

        return $this->put($path, $data);
    }

    public function delete($paths): bool
    {
        return unlink($paths);
    }

    public function move($path, $target): bool
    {
        return rename($path, $target);
    }

    public function copy($path, $target): bool
    {
        return copy($path, $target);
    }
}
