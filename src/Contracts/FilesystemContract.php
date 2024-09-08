<?php

namespace Ghosty\Filesystem\Contracts;

interface FilesystemContract
{
    /**
     * Determine if a file or directory exists.
     *
     * @param  string  $path
     * @return bool
     */
    public function exists(string $path): bool;


    /**
     * Get file content
     *
     * @param string $path
     * @return string
     * 
     * @throws \Ghosty\Filesystem\Exceptions\FileNotFoundException
     */
    public function get(string $path): string;


    /**
     * Get the contents of a file as decoded JSON.
     *
     * @param  string  $path
     * @param  int  $flags
     * @return array
     *
     * @throws \Ghosty\Filesystem\Exceptions\FileNotFoundException
     */
    public function json($path, $flags = 0): array;


    /**
     * Get the hash of the file at the given path.
     *
     * @param  string  $path
     * @param  string  $algorithm
     * @return string
     * 
     * @throws \Ghosty\Filesystem\Exceptions\FileNotFoundException
     */
    public function hash($path, $algorithm = 'md5'): string;


    /**
     * Write the contents of a file.
     *
     * @param  string  $path
     * @param  string  $contents
     * @return bool
     */
    public function put($path, $contents): bool;


    /**
     * Prepend to a file.
     *
     * @param  string  $path
     * @param  string  $data
     * @return bool
     */
    public function prepend($path, $data): bool;


    /**
     * Append to a file.
     *
     * @param  string  $path
     * @param  string  $data
     * @return bool
     */
    public function append($path, $data): bool;


    /**
     * Delete the file or directory at a given path.
     *
     * @param  string  $paths
     * @return bool
     */
    public function delete($paths): bool;


    /**
     * Move a file to a new location.
     *
     * @param  string  $path
     * @param  string  $target
     * @return bool
     * 
     * @throws \Ghosty\Filesystem\Exceptions\FileNotFoundException
     */
    public function move($path, $target): bool;


    /**
     * Copy a file to a new location.
     *
     * @param  string  $path
     * @param  string  $target
     * @return bool
     * 
     * @throws \Ghosty\Filesystem\Exceptions\FileNotFoundException
     */
    public function copy($path, $target): bool;
}
