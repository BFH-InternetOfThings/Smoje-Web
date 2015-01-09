<?php

class Smoje {
    
	private $json;

    public function __construct($_id) {
		
		$data = $this->__get_json($_id);
		foreach ($data[0] as $key => $value) {
		
			$this->$key = $value;
		}
    }
	
	private function __get_json($id) {
	
		$file = "http://178.62.163.199/smoje/index.php/Stations/".$id."/Sensors/Measurements";
		$data = json_decode(file_get_contents($file), true);
		return($data["station"]);
	}
}

?>
