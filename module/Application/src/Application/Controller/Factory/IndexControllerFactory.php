<?php

namespace Application\Controller\Factory;
use Application\Controller\IndexController;
use Doctrine\ORM\Query;
use Zend\Mvc\Controller\ControllerManager;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
 
class IndexControllerFactory
{
    /**
     * @param Zend\Mvc\Controller\ControllerManager $controllerManager
     */
    public function __invoke($controllerManager)
    {
        // get underlaying service manager
        /* @var Zend\ServiceManager\ServiceManager $serviceManager */
        $serviceManager = $controllerManager;//->getServiceLocator();
        //$serviceManager=$controllerManager->get($id);
        // get some dependency
        $cfg = $serviceManager->get('config');
        $localCfg = isset($cfg['Application']) ? 
                $cfg['Application'] : [] ;
         
        // getting the paths where modules are placed
        $modulePaths = isset($localCfg['paths']) ? 
                $localCfg['paths'] : ['module'] ;
         
        // getting the path of the phpunit testing system
        $phpunit = isset($localCfg['phpunit']) ? 
                $localCfg['phpunit'] : 'phpunit' ;
         
        // getting all the active modules in the system
        $manager = $serviceManager->get('ModuleManager');
        $modules = array_keys($manager->getLoadedModules());
        
        $doctrineem = $serviceManager->get('Doctrine\ORM\EntityManager');

        $translator = $serviceManager->get('translator'); 
        
        $tableadpater=$serviceManager->get('Zend\Db\Adapter\Adapter');
          
          
    //    $mailtransport = $serviceManager->get('mail.transport');
        $mailtransport=null;
         
        // inject it to the constructor of the controller
       
        return new IndexController($modulePaths, $phpunit, $modules,$doctrineem,$translator,$tableadpater,$mailtransport);
    }
}
