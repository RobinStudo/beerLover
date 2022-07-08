<?php
namespace App\Core;

// Gestionnaire des vues
class ViewManager
{
    const LAYOUT_TEMPLATE = '../template/layout.php';

    // Permet de rendre un template
    public function render(string $path, array $config = [], array $data = []): void
    {
        $config['path'] = sprintf('%s.php', $path);

        require self::LAYOUT_TEMPLATE;
    }
}
