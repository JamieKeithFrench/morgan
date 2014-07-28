<?php namespace Morgan\Records;

use Morgan\Record;

class NS extends Record {

    /**
     * @var string
     */
    protected $nameServer;

    /**
     * Creates a new NS record.
     *
     * @param string $hostName   The hostname.
     * @param int    $timeToLive The time to live (in seconds).
     * @param string $nameServer The hostname of the nameserver.
     */
    public function __construct($hostName, $timeToLive, $nameServer) {
        parent::__construct($hostName, $timeToLive);
        $this->nameServer = $nameServer;
    }

    /**
     * Gets the name server.
     *
     * @return string
     */
    public function getNameServer() {
        return $this->nameServer;
    }

    /**
     * {@inheritDoc}
     */
    public function getType() {
        return 'NS';
    }

    /**
     * Sets the name server.
     *
     * @param string $nameServer
     */
    public function setNameServer($nameServer) {
        $this->nameServer = $nameServer;
    }
}