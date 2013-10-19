<?php
class Agenda
{

    var $id = 0;
	var $artist_id = "";
	var $location = "";
	var $date = "";
	var $start_time = "";
	var $end_time = "";
    var $contactpersoon = "";
    var $adres = "";
    var $postcode = "";
    var $plaats = "";
    var $telefoon = "";
    var $contactpersoonemail = "";
    var $url = "";
    var $genre = "";
    var $gage = "";
    var $opmerkingen = "";
     
    function __construct($id = 0){
        $this->id = $id;
        $this->fetch();
    }
    
    private function fetch(){
        if(!is_null($this->id) && $this->id > 0){
            $SQL = "SELECT * FROM agenda WHERE id = '".$this->id."'";
            
            $RS = mysql_query($SQL) or die("Fout bij het ophalen van de $classNaam: ".mysql_error());
            
            if($row = mysql_fetch_assoc($RS)){
                foreach($row as $key => $value){
                    $this->$key = $value;
                }
                return true;
            }
        }
        return false;
    }
	
    public function get($field){
        
        switch($field){
        
            default:
                return $this->$field;
            break;
        }
    }
    
    public function set($field, $value){
        
        switch($field){
     
            default:    
                $this->$field = $value;
            break;
        }
    }

    function save(){
    	if($this->id > 0){
        	/**
             *  Object bestaat, bestaande rij in de database bijwerken.
             */
        	$SQL = "UPDATE agenda SET id = '".mysql_real_escape_string($this->id)."', artist_id = '".mysql_real_escape_string($this->artist_id)."',  date = '".mysql_real_escape_string($this->date)."',  start_time = '".mysql_real_escape_string($this->start_time)."',  end_time = '".mysql_real_escape_string($this->end_time)."',  location = '".mysql_real_escape_string($this->location)."', contactpersoon = '".mysql_real_escape_string($this->contactpersoon)."',adres = '".mysql_real_escape_string($this->adres)."',postcode = '".mysql_real_escape_string($this->postcode)."',plaats = '".mysql_real_escape_string($this->plaats)."',telefoon = '".mysql_real_escape_string($this->telefoon)."',contactpersoonemail = '".mysql_real_escape_string($this->contactpersoonemail)."',url = '".mysql_real_escape_string($this->url)."',genre = '".mysql_real_escape_string($this->genre)."',gage = '".mysql_real_escape_string($this->gage)."',opmerkingen = '".mysql_real_escape_string($this->opmerkingen)."'WHERE id = '".$this->id."'";
			
            if(@mysql_query($SQL)){
            	return true;
            }else{
            	print("Error saving Agenda point into table agenda: <br /><pre>".mysql_error()."<br />".$SQL."</pre>");
                return false;
            }           
        }else{
    		$SQL = "INSERT INTO agenda (id, artist_id, date, start_time, end_time, location, contactpersoon, adres, postcode, plaats, telefoon, contactpersoonemail, url, genre, gage, opmerkingen) VALUES ('".mysql_real_escape_string($this->id)."', '".mysql_real_escape_string($this->artist_id)."', '".mysql_real_escape_string($this->date)."', '".mysql_real_escape_string($this->start_time)."', '".mysql_real_escape_string($this->end_time)."', '".mysql_real_escape_string($this->location)."','".mysql_real_escape_string($this->contactpersoon)."','".mysql_real_escape_string($this->adres)."','".mysql_real_escape_string($this->postcode)."','".mysql_real_escape_string($this->plaats)."','".mysql_real_escape_string($this->telefoon)."','".mysql_real_escape_string($this->contactpersoonemail)."','".mysql_real_escape_string($this->url)."','".mysql_real_escape_string($this->genre)."','".mysql_real_escape_string($this->gage)."','".mysql_real_escape_string($this->opmerkingen)."');"; 
            
            $RS = mysql_query($SQL) or print("Error saving Agenda point into table agenda: <br /><pre>".mysql_error()."<br />".$SQL."</pre>");

            if($id = @mysql_insert_id()){
            	$this->id = $id;
                return true;
            }else{
            	return false;
            }
        }
		return false;
    }
    
    public function delete(){
    	if($this->id > 0){
        	
        	$SQL = "DELETE FROM agenda WHERE id = '".$this->id."' LIMIT 1; "; 
			
            $RS = mysql_query($SQL) or die("Error deleting Agenda point from table agenda: <br /><pre>".mysql_error()."<br />".$SQL."</pre>");
            
            if(mysql_affected_rows() > 0){
 				return true;
			}
        }else{
        	return false;
        }        
    }
	
	public static function overzicht(){
		
		$SQL = "SELECT id FROM agenda WHERE date > DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 1 DAY) ORDER BY date, start_time ASC";
		
		$RS = mysql_query($SQL);
		
        $num_rows = mysql_num_rows($RS);
        
		$agendas = array();
		while ($row = mysql_fetch_assoc($RS)){
			 $agendas[] = new Agenda($row['id']); 
		}
		
		return $agendas;
	}

    public static function overzichtFilter($artistid){
        
        $SQL = "SELECT id FROM agenda WHERE date > DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 1 DAY) AND artist_id = ".$artistid." ORDER BY date, start_time ASC";
        
        $RS = mysql_query($SQL);
        
        $agendas = array();
        while ($row = mysql_fetch_assoc($RS)){
             $agendas[] = new Agenda($row['id']); 
        }
        
        return $agendas;
    }
	
    function __toString(){
    	$output = "<pre>Object type: Agenda \n";
        $output .= "Gekoppelde tabel: agenda \n";
        $output .= "Identifier (id): ".$this->id."\n\n";
        $output .= "------Veldgegevens------------\n";        
        $output .= "artist_id (int): ".$this->artist_id." \n";
		$output .= "date (date): ".$this->date." \n";
		$output .= "start_time (varchar): ".$this->start_time." \n";
		$output .= "end_time (varchar): ".$this->end_time." \n";
		$output .= "location (varchar): ".$this->location." \n";
		
        $output .= "------Einde Veldgegevens------\n\n</pre>"; 
        return $output;    	
    }
}
?>