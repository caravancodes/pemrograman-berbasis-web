<?php 
    $doc = new DOMDocument(); 
    $doc->load( 'employees.xml' ); 

    $employees = $doc->getElementsByTagName( "employee" ); 
    foreach( $employees as $employee ) 
    { 
      $names = $employee->getElementsByTagName( "name" ); 
      $name = $names->item(0)->nodeValue; 

      $ages= $employee->getElementsByTagName( "age" ); 
      $age= $ages->item(0)->nodeValue; 

      $salaries = $employee->getElementsByTagName( "salary" ); 
      $salary = $salaries->item(0)->nodeValue; 

      echo "<b>$name - $age - $salary\n</b><br>"; 
      } 
?>