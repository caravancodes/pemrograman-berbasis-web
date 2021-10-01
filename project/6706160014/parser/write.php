<?php 
      $employees = array(); 
      $employees [] = array( 
      'nama' => 'Udin', 
      'umur' => '34', 
      'gaji' => "$10000" 
      ); 
      $employees [] = array( 
      'nama' => 'Asep', 
      'umur' => '20', 
      'gaji' => "$2000" 
      ); 

      $doc = new DOMDocument(); 
      $doc->formatOutput = true; 

      $r = $doc->createElement( "daftarpegawai" ); 
      $doc->appendChild( $r ); 

      foreach( $employees as $employee ) 
      { 
          $b = $doc->createElement( "pegawai" ); 

          $name = $doc->createElement( "nama" ); 
          $name->appendChild( 
          $doc->createTextNode( $employee['nama'] ) 
          ); 
          $b->appendChild( $name ); 

          $age = $doc->createElement( "umur" ); 
          $age->appendChild( 
          $doc->createTextNode( $employee['umur'] ) 
          ); 
          $b->appendChild( $age ); 

          $salary = $doc->createElement( "gaji" ); 
          $salary->appendChild( 
          $doc->createTextNode( $employee['gaji'] ) 
          ); 
          $b->appendChild( $salary ); 

          $r->appendChild( $b ); 
      } 

      echo $doc->saveXML(); 
      $doc->save("daftar_pegawai.xml") 
  ?>