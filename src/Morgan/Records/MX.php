<?php namespace Morgan\Records;

use Morgan\Record;

class MX extends Record {

    /**
     * @var string
     */
    protected $exchangeServer;
    
    /**
     * @var string
     */
    protected $preference;

    /**
     * Creates a new MX record.
     *
     * @param string $hostName       The hostname.
     * @param int    $timeToLive     The time to live (in seconds).
     * @param string $exchangeServer The exchange server.
     * @param int    $preference     The preference of the server.
     */
    public function __construct($hostName, $timeToLive, $exchangeServer, $preference) {
        parent::__construct($hostName, $timeToLive);
        $this->exchangeServer = $exchangeServer;
        $this->preference = $preference;
    }

    /**
     * Gets the exchange server.
     *
     * @return string
     */
    public function getExchangeServer() {
        return $this->exchangeServer;
    }

    /**
     * Gets the preference.
     *
     * @return string
     */
    public function getPreference() {
        return $this->preference;
    }

    /**
     * {@inheritDoc}
     */
    public function getType() {
        return 'MX';
    }

    /**
     * Sets the exchange server.
     *
     * @param string $exchangeServer
     */
    public function setExchangeServer($exchangeServer) {
        $this->exchangeServer = $exchangeServer;
    }

    /**
     * Sets the preference.
     *
     * @param string $preference
     */
    public function setPreference($preference) {
        $this->preference = $preference;
    }
}