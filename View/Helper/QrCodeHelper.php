<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QrCodeHelper
 *
 * @author Kolawole Abobade
 */
App::uses('AppHelper', 'View/Helper');
App::import(
    'Vendor',
    'CakeQrcode.Qrlib',
    array('file' => 'phpqrcode' . DS . 'qrlib.php')
);
class QrCodeHelper extends AppHelper  {
    
    var $helpers = array('Html');
    var $matrixPointSize = 8;
    var $errorCorrectionLevel = 'H';
    
    public function defineTempDir(){
        return '/var/www/univerf/app/Plugin/CakeQrcode/webroot/img/';
        //dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    }
    
    
    public function setFileNameWithPath($rand_codes){
        return $this->defineTempDir().$this->setFileName($rand_codes);
         
    }
    
    public function setFileName($rand_codes){
        return 'test'.md5($rand_codes.'|'.$this->errorCorrectionLevel.'|'.$this->matrixPointSize).'.png';
    }
    
    public function generateText($rand_codes){
        $filename = $this->setFileNameWithPath($rand_codes);
        QRcode::png($rand_codes, $filename, $this->errorCorrectionLevel, $this->matrixPointSize, 2);
         return  $this->Html->image('CakeQrcode.'.$this->setFileName($rand_codes),array('fullBase' => true)); 
    }
    
    
    public function generateUrl($url){
        
    }
    
    public function generateEmail($email){
        
    }
    
    public function generateTelephone($telephone){
        
    }
    
    
}
