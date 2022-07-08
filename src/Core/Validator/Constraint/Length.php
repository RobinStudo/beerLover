<?php

namespace App\Core\Validator\Constraint;

class Length extends AbstractConstraint
{
    protected string $message = "La longueur est invalide";
    private int $min;
    private int $max;

    public function __construct(string $message = null, int $min = null, int $max = null)
    {
        parent::__construct($message);
        $this->min = $min;
        $this->max = $max;
    }

    public function validate($data): bool
    {
        if(empty($data)){
            return true;
        }

        if($this->min && strlen($data) < $this->min){
             return false;
        }

        if($this->max && strlen($data) > $this->max){
            return false;
        }

        return true;
    }
}
