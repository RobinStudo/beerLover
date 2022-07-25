<?php

namespace App\Service;

use App\Core\ViewManager;

class MailerService
{
    const DEFAULT_SENDER = 'contact@beer-lover.com';

    public function __construct(private ViewManager $viewManager)
    {
        ini_set('smtp_port', '8025');
        ini_set('sendmail_from', self::DEFAULT_SENDER);
    }

    public function send(string $to, string $subject, string $template): bool
    {
        $path = sprintf('mail/%s', $template);
        $message = $this->viewManager->build($path);

        return mail($to, $subject, $message);
    }
}
