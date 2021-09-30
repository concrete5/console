<?php

declare(strict_types=1);

namespace Concrete\Console\Command;

use Concrete\Console\Application;
use League\Container\Container;

class CommandProvider implements CommandGroupInterface
{
    public static function register(Container $container, Application $console): void
    {
        self::backupCommands($container, $console);
        self::databaseCommands($container, $console);
        self::siteCommands($container, $console);
        self::pharCommands($container, $console);
    }

    public static function backupCommands(Container $container, Application $console): void
    {
        Backup\BackupCommand::register($container, $console);
        Backup\RestoreCommand::register($container, $console);
        Backup\InspectCommand::register($container, $console);
    }

    public static function databaseCommands(Container $container, Application $console): void
    {
        Database\DumpCommand::register($container, $console);
    }

    private static function siteCommands(Container $container, Application $console): void
    {
        Site\InfoCommand::register($container, $console);
        Site\SyncCommand::register($container, $console);
    }

    private static function pharCommands(Container $container, Application $console): void
    {
        if (!($_SERVER['INCLUDE_SELF_UPDATE'] ?? false) && \Phar::running() === '') {
            return;
        }
        Phar\SelfUpdateCommand::register($container, $console);
    }
}
