<?php namespace Morgan\Constraints;

use Symfony\Component\Validator\Constraint;

class DomainName extends Constraint {

    /**
     * @var string
     */
    public $message = 'The domain name "%string%" is not a valid domain name.';

    /**
     * {@inheritDoc}
     */
    public function validatedBy() {
        return get_class($this).'Validator';
    }

}