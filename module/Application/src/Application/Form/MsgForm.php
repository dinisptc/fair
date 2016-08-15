<?php
namespace Application\Form;

use Zend\Form\Form;


class MsgForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('msg');

        $this->setAttribute('method', 'post');

        

        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'type'  => 'text',            
                'class'=>'textbox',
                'placeholder' => _('Your Name'),
            ),
            'options' => array(
                
            ),
        ));
        
        $this->add(array(
            'name' => 'mensagem',
            'attributes' => array(
                'required' => 'required',
                'type'  => 'textarea',
                'placeholder' => _('Your Message'),
                
            ),
            'options' => array(
                
            ),
        ));
        
        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'required' => 'required',
                'type'  => 'email',            
                'class'=>'textbox',
                'placeholder'=> _('Your Email'),
                
            ),
            'options' => array(
               
               // 'placeholder'=> _('Email'),
            ),
        ));
        
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => _('Send'),
                'class'=>'special big',
                'id' => 'submitbutton',
            ),
        ));

    }
}