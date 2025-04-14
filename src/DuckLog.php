<?php

namespace DuckLog;

class DuckLog
{
    private static string $logFile = 'logs/ducklog.log';
    private static bool $quacked = false;

    public static function pond(string $path): void
    {
        self::$logFile = $path;
    }

    public static function quack(mixed $message): void
    {
        $timestamp = date('Y-m-d H:i:s');
        $logEntry = sprintf(
            "[%s] 🦆 %s\n",
            $timestamp,
            is_string($message) ? $message : print_r($message, true)
        );

        $logDir = dirname(self::$logFile);
        if (!is_dir($logDir)) {
            mkdir($logDir, 0777, true);
        }

        file_put_contents(self::$logFile, $logEntry, FILE_APPEND);
        
        if (!self::$quacked) {
            self::$quacked = true;
            self::addQuackArt();
        }
    }

    private static function addQuackArt(): void
    {
        $art = <<<QUACK
        -------------------
        🦆 Logging initialized
        -------------------
        QUACK;

        file_put_contents(self::$logFile, $art . PHP_EOL, FILE_APPEND);
    }
}