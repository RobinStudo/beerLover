<?php

namespace App\Core\Notification;

class NotificationManager
{
    const STORAGE_KEY = 'notifications';

    public function add(Notification $notification): void
    {
        $_SESSION[self::STORAGE_KEY][] = $notification;
    }

    public function getAll(): array
    {
        $notifications = $_SESSION[self::STORAGE_KEY] ?? [];
        $_SESSION[self::STORAGE_KEY] = [];
        return $notifications;
    }
}
