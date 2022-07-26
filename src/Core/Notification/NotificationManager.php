<?php

namespace App\Core\Notification;

class NotificationManager
{
    const STORAGE_KEY = 'notifications';

    // Ajoute une notification en session
    public function add(Notification $notification): void
    {
        $_SESSION[self::STORAGE_KEY][] = $notification;
    }

    // Récupére et supprime les notifications en session
    public function getAll(): array
    {
        $notifications = $_SESSION[self::STORAGE_KEY] ?? [];
        $_SESSION[self::STORAGE_KEY] = [];
        return $notifications;
    }
}
