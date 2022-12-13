<?php

declare(strict_types=1);

namespace Concrete\Console\Installation;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

/**
 * @psalm-immutable
 */
class Installation
{
    /**
     * @var string
     */
    protected $path;

    /**
     * @var Version
     */
    protected $version;

    /**
     * Installation constructor.
     */
    public function __construct(string $path, Version $version)
    {
        $this->path = $path;
        $this->version = $version;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getVersion(): Version
    {
        return $this->version;
    }

    public function getFilesystem(): Filesystem
    {
        return new Filesystem(new Local($this->getPath()));
    }
}
