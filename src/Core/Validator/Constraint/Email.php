<?php

namespace App\Core\Validator\Constraint;

class Email extends AbstractConstraint
{
    protected string $message = "Ceci n'est pas une adresse e-mail valide";

    public function validate($data): bool
    {
        if(empty($data)){
            return true;
        }

        return filter_var($data, FILTER_VALIDATE_EMAIL);
    }
}
