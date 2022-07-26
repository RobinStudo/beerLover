<?php

namespace App\Service;

use App\Core\ViewManager;

class MailerService
{
    const DEFAULT_SENDER = 'contact@beer-lover.com';

    public function __construct(private ViewManager $viewManager)
    {
        ini_set('smtp_port', '8025');
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
        $message = $this->viewManager->build($path, $context);

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf-8';
        $headers[] = 'From: BeerLover <' . self::DEFAULT_SENDER . '>';
        $encodedSubject = mb_encode_mimeheader($subject, 'utf-8');

        return mail($to, $encodedSubject, $message, implode("\r\n", $headers));
    }
}
