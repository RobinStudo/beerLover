<?php

namespace App\Core\Validator\Constraint;

class NotBlank extends AbstractConstraint
{
    protected string $message = "Ce champ doit être rempli";

    public function validate($data): bool
    {
        return !empty($data);
    }
}
