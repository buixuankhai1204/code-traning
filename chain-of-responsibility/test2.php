<?php

abstract class Logger
{

    /**
     * Bitmask flags for severity.
     */
    public const NONE = 0;
    public const INFO = 0b000001;
    public const DEBUG = 0b000010;
    public const WARNING = 0b000100;
    public const ERROR = 0b001000;
    public const FUNCTIONAL_MESSAGE = 0b010000;
    public const FUNCTIONAL_ERROR = 0b100000;
    public const ALL = 0b111111;

    /** @var int A bitmask flag from this class. */
    protected int $logMask;

    /** @var \Logger|null An optional next logger to handle the message */
    protected ?Logger $next = null;

    /**
     * Logger constructor.
     *
     * @param int $mask
     *   A bitmask flag from this class.
     */
    public function __construct(int $mask)
    {
        $this->logMask = $mask;
    }

    /**
     * Set next responsible logger in the chain.
     *
     * @param \Logger $nextLogger
     *   Next responsible logger.
     *
     * @return \Logger
     *    Logger: Next responsible logger.
     */
    public function setNext(Logger $nextLogger): Logger
    {
        $this->next = $nextLogger;

        return $nextLogger;
    }

    /**
     * Message writer handler.
     *
     * @param string $msg
     *   Message string.
     * @param int $severity
     *   Severity of message as a bitmask flag from this class.
     *
     * @return $this
     */
    public function message(string $msg, int $severity): Logger
    {
        if ($severity & $this->logMask) {
            $this->writeMessage($msg);
        }
        if ($this->next !== null) {
            $this->next->message($msg, $severity);
        }

        return $this;
    }

    /**
     * Abstract method to write a message
     *
     * @param string $msg
     *   Message string.
     */
    abstract protected function writeMessage(string $msg): void;

}

class ConsoleLogger extends Logger
{

    protected function writeMessage(string $msg): void
    {
        echo "Writing to console: $msg\n";
    }

}

class EmailLogger extends Logger
{

    protected function writeMessage(string $msg): void
    {
        echo "Sending via email: $msg\n";
    }

}

class FileLogger extends Logger
{

    protected function writeMessage(string $msg): void
    {
        echo "Writing to a log file: $msg\n";
    }

}

$logger = new ConsoleLogger(Logger::ALL);
$logger
    ->setNext(new EmailLogger(Logger::FUNCTIONAL_MESSAGE | Logger::FUNCTIONAL_ERROR))
    ->setNext(new FileLogger(Logger::WARNING | Logger::ERROR));

$logger
    // Handled by ConsoleLogger since the console has a loglevel of all
    ->message("Entering function ProcessOrder().", Logger::DEBUG)
    ->message("Order record retrieved.", Logger::INFO)
    // Handled by ConsoleLogger and FileLogger since filelogger implements Warning & Error
    ->message("Customer Address details missing in Branch DataBase.", Logger::WARNING)
    ->message("Customer Address details missing in Organization DataBase.", Logger::ERROR)
    // Handled by ConsoleLogger and EmailLogger as it implements functional error
    ->message("Unable to Process Order ORD1 Dated D1 For Customer C1.", Logger::FUNCTIONAL_ERROR)
    // Handled by ConsoleLogger and EmailLogger
    ->message("Order Dispatched.", Logger::FUNCTIONAL_MESSAGE);