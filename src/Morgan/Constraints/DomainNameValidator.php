<?php namespace Morgan\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class DomainNameValidator extends ConstraintValidator {

    /**
     * {@inheritDoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if ( ! preg_match('/^[A-Za-z0-9-]+(\\.[A-Za-z0-9-]+)*(\\.[A-Za-z]{2,})$/', $value, $matches)) {
            $this->context->addViolation(
                $constraint->message,
                array('%string%' => $value)
            );
        }
    }

}