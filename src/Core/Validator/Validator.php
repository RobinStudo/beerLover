<?php

namespace App\Core\Validator;

class Validator
{
    public function validate(array $data, array $constraints): array
    {
        $errors = [];

        foreach ($constraints as $key => $fieldConstraints) {
            $value = $data[$key] ?? null;

            foreach ($fieldConstraints as $constraint) {
                if(!$constraint->validate($value)){
                    $errors[$key][] = $constraint->getMessage();
                }
            }
        }

        return $errors;
    }
}
