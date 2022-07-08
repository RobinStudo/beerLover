<?php

namespace App\Core\Validator\Constraint;

abstract class AbstractConstraint
{
    protected string $message = "Ce champ n'est pas valide";

    public function __construct(string $message = null)
    {
        if($message){
            $this->message = $message;
        }
    }

    public abstract function validate($data): bool;

    public function getMessage(): string
    {
        return $this->message;
    }
}
