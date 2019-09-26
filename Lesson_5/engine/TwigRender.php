<?php

namespace app\engine;

use app\interfaces\IRenderer;
use app\traits\Tsingletone;
use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;



class TwigRender implements IRenderer
{
    use Tsingletone;
    public function renderTemplate($template, $params = [])
    {
        $loader = new FilesystemLoader('../twigtemplates');
        $twig = new Environment($loader, $params);
        $params['page'] = $template . '.tmpl';
        echo $twig->render('main.tmpl', $params);
    }
}