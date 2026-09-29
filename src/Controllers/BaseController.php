<?php

declare(strict_types=1);

namespace App\Controllers;

abstract class BaseController
{
    protected \Smarty $smarty;

    public function __construct()
    {
        $this->smarty = new \Smarty();
        $this->smarty->setTemplateDir(__DIR__ . '/../../templates');
        $this->smarty->setCompileDir(__DIR__ . '/../../var/smarty/compile');
        $this->smarty->setCacheDir(__DIR__ . '/../../var/smarty/cache');
        $this->smarty->setConfigDir(__DIR__ . '/../../var/smarty/configs');
        $this->smarty->caching = false;
        $this->smarty->escape_html = true;

        $app = require __DIR__ . '/../../config/app.php';
        $this->smarty->assign('app_name', $app['name']);
    }

    protected function render(string $template, array $data = []): void
    {
        foreach ($data as $key => $value) {
            $this->smarty->assign($key, $value);
        }
        $this->smarty->display($template);
    }
}
