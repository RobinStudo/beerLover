<?php
namespace App\Core;

class ViewManager
{
    const LAYOUT_TEMPLATE = '../template/layout.php';

    public function render(string $path, array $config = [], array $data = []): void
    {
        $config['path'] = sprintf('%s.php', $path);

        require self::LAYOUT_TEMPLATE;
    }
}
