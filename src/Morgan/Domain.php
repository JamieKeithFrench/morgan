<?php namespace Morgan;

class Domain {

    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $records;

    /**
     * Creates a new domain from the domain name and array of records (optional).
     *
     * @param string $name    The domain name.
     * @param array  $records The array of records for the domain name.
     */
    public function __construct($name, array $records = array()) {
        $this->name = $name;
        $this->records = $records;
    }

    /**
     * Adds a record to the domain.
     *
     * @param \Morgan\Record $record The record to add ti the domain name.
     */
    public function addRecord(Record $record) {
        array_push($this->records, $record);
    }

    /**
     * Gets the domain name.
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Gets the resource records for the domain name matching the specified type.
     *
     * @param string $type The type of resource.
     * @return array The array of records matching the specified type.
     */
    public function getResourceRecordsByType($type) {
        return array_filter($this->records, function($r) use ($type) {  return $r->getType() == $type; });
    }

    /**
     * Gets the array of records for the domain name.
     *
     * @return array The array of records. For example: array('A' => array(), 'MX' => array())
     */
    public function getRecords() {
        return $this->records;
    }

    /**
      * Sets the domain name.
      *
      * @param string $name The domain name.
      */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * Sets the records for the domain name.
     *
     * @param array $records The array of records for the domain name.
     */
    public function setRecords(array $records = array()) {
        $this->records = $records;
    }
}