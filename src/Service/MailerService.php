<?php

namespace App\Service;

use App\Core\ViewManager;

class MailerService
{
    const DEFAULT_SENDER = 'contact@beer-lover.com';

    public function __construct(private ViewManager $viewManager)
    {
        ini_set('smtp_port', '8025'); // On configure le port d'accès au serveur d'envoi de mail (SMTP)
    }

    public function sendRegistrationConfirmation($data): bool
    {
        return $this->send($data['email'], 'Création de votre compte BeerLover', 'register', [
            'username' => $data['username'],
        ]);
    }

    private function send(string $to, string $subject, string $template, array $context = []): bool
    {
        $path = sprintf('mail/%s', $template);
        // On récupère le contenu HTML à envoyer dans l'email
        $message = $this->viewManager->build($path, $context);

        // On configure le format de l'email en HTML
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf-8';

        // On défini l'expéditeur
        $headers[] = 'From: BeerLover <' . self::DEFAULT_SENDER . '>';

        // On encode le sujet pour afficher correctement les caractères spéciaux dans les clients mails
        $encodedSubject = mb_encode_mimeheader($subject, 'utf-8');

        return mail($to, $encodedSubject, $message, implode("\r\n", $headers));
    }
}
