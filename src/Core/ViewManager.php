<?php
namespace App\Core;

use App\Core\Notification\NotificationManager;
use App\Core\Router\Router;
use App\Service\UserService;

// Gestionnaire des vues
class ViewManager
{
    const LAYOUT_TEMPLATE = '../template/layout.php';

    public function __construct(
        private NotificationManager $notificationManager,
        private Router $router,
        private UserService $userService
    ){}

    // Permet de rendre un template
    public function render(string $path, array $config = [], array $data = []): void
    {
        $config['path'] = sprintf('%s.php', $path);

        require self::LAYOUT_TEMPLATE;
    }

    public function build(string $path, array $context = []): string
    {
        $path = sprintf('../template/%s.php', $path);

        ob_start();
        require $path;
        $template = ob_get_contents();
        ob_end_clean();
        
        return $template;
    }
}
