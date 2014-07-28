<?php namespace Morgan\Records;

class AAAA extends A {

    /**
     * Creates a new AAAA record.
     *
     * @param string $hostName   The hostname.
     * @param int    $timeToLive The time to live (in seconds).
     * @param string $ipAddress  The ip address.
     */
    public function __construct($hostName, $timeToLive, $ipAddress) {
        parent::__construct($hostName, $timeToLive, $ipAddress);
    }
    
    /**
     * {@inheritDoc}
     */
    public function getType() {
        return 'AAAA';
    }
}