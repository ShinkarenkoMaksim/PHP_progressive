<?php

class Autoload
{
    public function loadClass($className)
    {
        $classNameArray = explode('\\', $className);
        if (array_shift($classNameArray) === 'app') { //Дальше инклюдим только в случае, если обращение произошло от нашего приложения 'app'
            $pathName = '../' . implode('/', $classNameArray) . '.php';
            if (file_exists($pathName)) {
                include $pathName;
            }
        }
    }
}