<?php namespace Morgan\Records;

use Morgan\Record;

class A extends Record {
    
    /**
     * @var string
     */
    protected $ipAddress;

    /**
     * Creates a new A record.
     *
     * @param string $hostName   The hostname.
     * @param int    $timeToLive The time to live (in seconds).
     * @param string $ipAddress  The ip address.
     */
    public function __construct($hostName, $timeToLive, $ipAddress) {
        parent::__construct($hostName, $timeToLive);
        $this->ipAddress = $ipAddress;
    }

    /**
     * Gets the ip address.
     *
     * @return string
     */
    public function getIpAddress() {
        return $this->ipAddress;
    }

    /**
     * {@inheritDoc}
     */
    public function getType() {
        return 'A';
    }

    /**
     * Sets the ip address.
     *
     * @param string $ipAddress
     */
    public function setIpAddress($ipAddress) {
        $this->ipAddress = $ipAddress;
    }
}