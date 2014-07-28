<?php namespace Morgan;

abstract class Record {

    /**
     * @var string
     */
    protected $hostName;

    /**
     * @var int
     */
    protected $timeToLive;
    
    /**
     * Creates a new record for 
     *
     * @param string $hostName   The hostname for the record.
     * @param int    $timeToLive The time to live (in seconds).
     */
    public function __construct($hostName, $timeToLive) {
        $this->hostName = $hostName;
        $this->timeToLive = $timeToLive;
    }

    /**
     * Gets the hostname.
     *
     * @return string
     */
    public function getHostName() {
        return $this->hostName;
    }

    /**
     * Gets the time to live.
     *
     * @return int
     */
    public function getTimeToLive() {
        return $this->timeToLive;
    }

    /**
     * Gets the type of record.
     *
     * @return string
     */
    abstract public function getType();

    /**
     * Sets the hostname.
     *
     * @param string $hostName
     */
    public function setHostName($hostName) {
        $this->hostName = $hostName;
    }

    /**
     * Sets the time to live.
     *
     * @return array
     */
    public function setTimeToLive($timeToLive) {
        $this->timeToLive = $timeToLive;
    }
}