<?php
 class Generate
 {
 	var $week,$subjects,$teachers,$sections,$credits,$timings,$labs,$fdays;
 	function __construct()
 	{
        $this->week = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
 		$this->subjects = array("DBMS","SE","CNW","OE","Maths","COMP");
 		$this->labs = array("DBMS","SE","COMP");
 		$this->teachers = array("XYZ","ABC","DEF","GHI","JKL","MNO");
 		$this->sections = array("A","B");
 		$this->credits = array(3,3,3,3,3,4);
 		$this->timings = 85;
 		$this->fdays = 3;
           
 		$this->generate();
 	}
 	function generate()
 	{
 		echo "<table>";
 		$n_subjects = count($this->subjects);
 		$n_labs = count($this->labs);
        for($j=0;$j<count($this->week);$j++)
		{
 			$isFull = rand(0,1);
 			echo "<tr>";
            echo "<td>".$this->week[$j]."</td>";
            if($this->fdays == 0)
            	$isFull = 0;
 			if($isFull == 1)
 			 {
        $this->fdays--;
 			  $p_subjects = array();
 			  for($i=0;$i<4;$i++)
 			  {
 				$random = rand(0,$n_subjects-1);                
 				array_push($p_subjects,$this->subjects[$random]);

 			  }
 			$p_lab = $this->labs[rand(0,2)];
      
 			for($z = 0;$z<count($p_subjects);$z++)
 				echo "<td>".$p_subjects[$z]."</td>";
 			//print_r($p_subjects);
 			echo nl2br("<td>".$p_lab."</td>");
 			echo "</tr>";
 			}
 		   else
 			{
 			 $p_subjects = array();
 			 for($i=0;$i<4;$i++)
 			 {
 				$random = rand(0,$n_subjects-1);
 				array_push($p_subjects,$this->subjects[$random]);
 			 }	
 			 // print_r($p_subjects);
     //         echo nl2br("\n");
 			 for($z = 0;$z<count($p_subjects);$z++)
 				echo "<td>".$p_subjects[$z]."</td>";
 			echo "</tr>";
 		    }
        }
        echo "</table>";
 		
 	}

 } 
 new Generate();
 ?>
