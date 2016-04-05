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
        $list = new SplDoublyLinkedList();
        for($j=0;$j<count($this->week);$j++)
        {
            $temp = $this->subjects;
            $isFull = rand(0,1);
            if($this->fdays == 0)
                $isFull = 0;
            if($isFull == 1)
            {
              $this->fdays--;
              $p_subjects = array();
              for($i=0;$i<4;$i++)
              {
                 $n_subjects = count($temp);
                 $random = rand(0,$n_subjects-1);
                 array_push($p_subjects,$temp[$random]);
                 unset($temp[$random]);
                 $temp = array_values($temp);                                                
              }
              $n_labs = count($this->labs);
              $lab_index = rand(0,$n_labs-1);   
              $p_lab = $this->labs[$lab_index];
              unset($this->labs[$lab_index]);
              $this->labs = array_values($this->labs);
              array_push($p_subjects,$p_lab);
              $list->push($p_subjects);
            }
            else
            {
             $p_subjects = array();
             for($i=0;$i<4;$i++)
             {
                 $n_subjects = count($temp);
                 $random = rand(0,$n_subjects-1);
                 array_push($p_subjects,$temp[$random]);
                 unset($temp[$random]);
                 $temp = array_values($temp);
             }  
             $list->push($p_subjects);
             
             
           }
       }
        
        //print_r($list);
        $week_no = 0;
        for ($list->rewind(); $list->valid(); $list->next()) {
                  echo "<tr>";
                  echo "<td>".$this->week[$week_no++]."</td>";
                  $array = $list->current();
                  for($q=0;$q<count($array);$q++)
                    echo "<td>".$array[$q]."</td>";
                  echo "</tr>";
              }
      echo "</table>";              
    }
  } 
  
 new Generate();
 ?>
