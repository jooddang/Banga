<?php
class currency
{

    var $usd = 0;
	var $eur = "";
	var $inr = "";
	var $pkr = "";
     
    function __construct($usd = 0){
        $this->usd = $usd;
        $this->fetch();
    }
    
	
    public function get($field){
        
        switch($field){
        
            default:
                return $this->$field;
            break;
        }
    }

    function __toString(){
    	$output = "<pre>Object type: currency \n";
        $output .= "Gekoppelde tabel: currency \n";
        $output .= "usdentifier (usd): ".$this->usd."\n\n";
        $output .= "------Veldgegevens------------\n";        
        $output .= "eur (int): ".$this->eur." \n";
		$output .= "pkr (varchar): ".$this->pkr." \n";
		$output .= "inr (varchar): ".$this->inr." \n";
		
        $output .= "------Einde Veldgegevens------\n\n</pre>"; 
        return $output;    	
    }
}
?>