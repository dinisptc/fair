<?php
namespace Application\Form;

use Zend\Form\Form;


class FaircalcForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('search');

        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'idblogad',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        
//        {"userId": "134256", 
//                "currencyFrom": "EUR",
//                "currencyTo": "GBP", 
//                "amountSell": 1000,
//                "amountBuy": 747.10,
//                "rate": 0.7471,
//                "timePlaced" : "24-JAN-15 10:27:44",
//                "originatingCountry" : "FR"}
        
                $this->add(array(
            'name' => 'userId',
            'attributes' => array(
                'type'  => 'text',
                //'required' => 'required',
                'class'=>'textbox',
            ),
            'options' => array(
                'label' => _('User Id'),
            ),
        ));


     
        
              $this->add(array(
            'name' => 'currencyFrom',
			'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'currencyFrom',
				'value_options' => array(
					'GBP' => 'GBP',
					'EUR' => 'EUR',				                                   
				),
            ),
        ));
        
        
                      $this->add(array(
            'name' => 'currencyTo',
			'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'currencyTo',
				'value_options' => array(
					'GBP' => 'GBP',
					'EUR' => 'EUR',				                                   
				),
            ),
        ));
        
   
        
        $this->add(array(
            'name' => 'amountSell',
            'attributes' => array(
                'type'  => 'text',            
                'class'=>'textbox',
            ),
            'options' => array(
                'label' => _('amountSell'),
            ),
        ));
        
        
                
       $this->add(array(
            'name' => 'amountBuy',
            'attributes' => array(
                'type'  => 'text',            
                'class'=>'textbox',
            ),
            'options' => array(
                'label' => _('amountBuy'),
            ),
        ));
       
       
        $this->add(array(
            'name' => 'rate',
            'attributes' => array(
                'type'  => 'text',            
                'class'=>'textbox',
            ),
            'options' => array(
                'label' => _('rate'),
            ),
        ));
        
        
        $this->add(array(
            'name' => 'timePlaced',
            'attributes' => array(
                'type'  => 'text',            
                'class'=>'textbox',
            ),
            'options' => array(
                'label' => _('timePlaced'),
            ),
        ));
        
                
        $this->add(array(
            'name' => 'originatingCountry',
            'attributes' => array(
                'type'  => 'text',            
                'class'=>'textbox',
            ),
            'options' => array(
                'label' => _('originatingCountry'),
            ),
        ));
        
        
        
                $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));

    }
}