<?php namespace Morgan\Locators;

use Morgan\Domain;
use Morgan\Records\A;
use Morgan\Records\AAAA;
use Morgan\Records\MX;
use Morgan\Records\NS;

class ResourceRecordLocator {

    /**
     * Finds the resource records for the domain name.
     *
     * @param string $domainName The domainname.
     * @return \Morgan\Domain The domain.
     */
    public function findRecordsForDomainName($domainName) {
        $domain = new Domain($domainName);

        /*
         * Pushes each resource record to the array of records for the domain.
         *
         * The dns_get_record function returns an array of resource records for
         * the domain name. We instantiate an object appropriate for the type of
         * resource record and add it to the array of records for the domain.
         *
         * @see http://php.net/manual/en/function.dns-get-record.php
         */
        foreach ((array) dns_get_record($domainName, DNS_ALL) as $key => $value) {
            $hostName   = $value['host'];
            $timeToLive = $value['ttl'];

            switch ($value['type']) {
                case 'A':
                    $domain->addRecord(new A($hostName, $timeToLive, $value['ip']));
                    break;
                case 'AAAA':
                    $domain->addRecord(new AAAA($hostName, $timeToLive, $value['ipv6']));
                    break;
                case 'MX':
                    $domain->addRecord(new MX($hostName, $timeToLive, $value['target'], $value['pri']));
                    break;
                case 'NS':
                    $domain->addRecord(new NS($hostName, $timeToLive, $value['target']));
                    break;
            }
        }

        return $domain;
    }
}