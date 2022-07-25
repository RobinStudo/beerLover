<?php

namespace App\Core\Notification;

class Notification
{
    const TYPE_SUCCESS = 'success';
    const TYPE_ERROR = 'error';

    private string $message;
    private string $type;

    public function __construct(string $message, string $type)
    {
        $this->message = $message;
        $this->type = $type;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
