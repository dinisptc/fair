<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

//namespace Application\Controller;


//use GoogleMaps;


//use Zend\Mvc\Controller\AbstractActionController;
//use Zend\View\Model\ViewModel;
//
//use Zend\Mvc\Router;
//use Zend\Mvc\ModuleRouteListener;
//use Zend\Mvc\MvcEvent;
//use Zend\Session\Container; // We need this when using sessions
//
//use Zend\Mail\Message;
//use Zend\Mime\Message as MimeMessage;
//use Zend\Mime\Part as MimePart;


namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Mvc\Router;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Session\Container; // We need this when using sessions

use Doctrine\ORM\Query;

use Zend\Db\TableGateway\TableGateway;

use Zend\Mail\Message;
use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Part as MimePart;

class IndexController extends AbstractActionController
{
    
    
    private $phpUnit = null;
    private $moduleFolders = null;
    private $modules = null;

    private $translator = null;
    private $tableadpater = null;
    private $doctrineem = null;
    private $mailtransport = null; 
     
    /**
     * __Constructor
     * $translator
     * @param type $moduleFolders The folders where modules will be placed
     * @param type $phpUnit The PHPUnit executable file for running the tests
     * @param type $modules All the active modules in the system.
     */
    public function __construct($moduleFolders,$phpUnit,$modules,$doctrineem,$translator,$tableadpater,$mailtransport)
    {
       
        $this->phpUnit = $phpUnit;
        $this->moduleFolders = $moduleFolders;
        $this->modules = $modules;
        //$this->doctrine = $doctrine;
        $this->translator = $translator;
        $this->tableadpater=$tableadpater;
        $this->doctrineem = $doctrineem;
        $this->mailtransport = $mailtransport;
    }
    
    
    
    public function indexAction()
    {             

        
        $user_session = new Container('language');
        $lang = $user_session->lang;
        //$lang='';
        
        $translator = $this->translator;//$this->getServiceLocator()->get('translator');

        
        if (($lang=='') || ($lang==null))
        {
            $translator->setLocale(\Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']));            
        }else
        {            
            $translator->setLocale($user_session->lang);
        }
        
    
        
        return new ViewModel();
    }
    
        

    

    
    

    
    
  
    
    
 
    
    







    

        /**
    * @var Doctrine\ORM\EntityManager
    */
    protected $em;
 
    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }
    
    
    public function getEntityManager()
    {
        if (null === $this->em) 
        {
            $this->em =  $this->doctrineem;//$this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
            //$this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }
        private function traduz()
    {
        
        $user_session = new Container('language');
        $lang = $user_session->lang;
        
        $translator = $this->translator;//$this->getServiceLocator()->get('translator');
        
        if (($lang=='') || ($lang==null))
        {
          $translator->setLocale(\Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']));
            
        }else
        {
            
         $translator->setLocale($user_session->lang);
        }
        
    }
   public function faircalcAction()
{
        
     $this->traduz();
            
     $search_by_in='';
     $request = $this->getRequest();

       

        if ($request->isPost()) {
           
            $formdata    = (array) $request->getPost();
            $search_data = array();
            foreach ($formdata as $key => $value) {
                if ($key != 'submit') {
                    if (!empty($value)) {
                        $search_data[$key] = $value;
                    }
                }
            }
            if (!empty($search_data)) {
                $search_by_in= json_encode($search_data);
           
            }
        }
 
        

        $searchform = new \Application\Form\FaircalcForm();
        $searchform->get('submit')->setValue('Fair Test');


   

        $formdata = array();
         if (!empty($search_by_in)) {
             $formdata = (array) json_decode($search_by_in);
             
             if(empty($formdata['userId'])) { $formdata['userId']=''; }
             if(empty($formdata['currencyFrom'])) { $formdata['currencyFrom']=''; }
             if(empty($formdata['currencyTo'])) { $formdata['currencyTo']=''; }
             if(empty($formdata['amountSell'])) { $formdata['amountSell']=''; }
             if(empty($formdata['amountBuy'])) { $formdata['amountBuy']=''; }
             if(empty($formdata['rate'])) { $formdata['rate']=''; }
             if(empty($formdata['timePlaced'])) { $formdata['timePlaced']=''; }
             if(empty($formdata['originatingCountry'])) { $formdata['originatingCountry']=''; }

       
           
         }

     
        
        $searchform->setData($formdata);
        
        

        return new ViewModel(array(
            'search_by'  => $search_by_in,
            'formdata'  => $formdata,        
            'form'       => $searchform,
        
        ));
       
}   
 
}
