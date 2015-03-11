<?php

namespace Moodle\DI;


use Nette\Configurator;
use Nette\DI\Compiler;
use Nette\DI\CompilerExtension;
use Exception;

class Extension extends CompilerExtension
{

    /** @var array */
    private $defaults = array(
        'siteUrl' => '%wwwDir%',
        'siteToken' => '%wwwDir%',
    );


    public function loadConfiguration()
    {
        $config = $this->getConfig($this->defaults);
        $builder = $this->getContainerBuilder();

        if ($config['siteUrl'] === NULL) {
            throw new Exception('siteUrl must be set');
        }
        
        if ($config['siteToken'] === NULL) {
            throw new Exception('siteToken must be set');
        }

        $builder->addDefinition($this->prefix('moodle'))
                ->setClass('Moodle\Moodle', array($config['siteToken'],$config['siteUrl']));
    }


    /**
     * @param Configurator $configurator
     */
    public static function register(Configurator $configurator)
    {
        $configurator->onCompile[] = function ($config, Compiler $compiler) {
            $compiler->addExtension('Moodle', new Extension());
        };
    }

}
