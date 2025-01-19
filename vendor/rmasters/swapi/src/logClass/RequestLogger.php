<?php

namespace logClass;

use Psr\Log\AbstractLogger;

class RequestLogger extends AbstractLogger
{
    private $logFile;

    public function __construct($logFile)
    {
        $this->logFile = $logFile;
    }

    public function log($level, $message, array $context = [])
    {
        // Interpolate context into the message
        $message = $this->interpolate($message, $context);

        // Format the log entry
        $time = date('Y-m-d H:i:s');
        $logEntry = sprintf("[%s] %s: %s\n", $time, $level, $message);

        // Append to log file
        file_put_contents($this->logFile, $logEntry, FILE_APPEND);
    }

    private function interpolate($message, array $context)
    {
        // Replace {key} placeholders with context values
        foreach ($context as $key => $value) {
            $placeholder = sprintf('{%s}', $key);
            $message = str_replace($placeholder, $value, $message);
        }

        return $message;
    }
}
