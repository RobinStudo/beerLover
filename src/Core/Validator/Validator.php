<?php

namespace App\Core\Validator;

class Validator
{
    // Permet de valider un tableau de donnée en fonction des contraintes fournies
    public function validate(array $data, array $constraints): array
    {
        $errors = [];

        // On parcours les contraintes de chaque donnée
        foreach ($constraints as $key => $fieldConstraints) {
            $value = $data[$key] ?? null; // On récupére la valeur associé dans les données

            // On parcours chacun des contraintes à appliquer sur la donnéee
            foreach ($fieldConstraints as $constraint) {

                // On appelle la fonction de validation de chaque contrainte pour vérifier la validté de la donnée
                if(!$constraint->validate($value)){
                    // En cas d'erreur, on ajoute le message dans le tabeau d'erreur
                    $errors[$key][] = $constraint->getMessage();
                }
            }
        }

        return $errors;
    }
}
