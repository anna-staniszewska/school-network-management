<?php
/*
try{
    $pdo= new PDO("mysql:localhost;port=3307;dbname=mysql", "root", "");
} catch (PDOException $e){
    echo "Błąd połączenia z bazą danych: " . $e->getMessage();
}
echo "hell yeah"
*/


  //ustawiamy dane do bazy
  $serwer='localhost'; 			//lub 127.0.0.1 - to jest nazwa serwera  
  $user='root'; 		//użytkownik bazy danych
  $pass=''; 		//hasło do bazy
  $baza='test'; 		//nazwa bazy

  //łączenie z bazą
  $db = @new mysqli($serwer, $user, $pass, $baza); //podejście obiektowe - korzystamy z klasy PHP o nazwie mysqli
  //$db = mysqli_connect($serwer, $user, $pass, $baza); //tak jest w podejściu strukturalnym

  //sprawdzamy czy się łączy w podejściu obiektowym
  if($db->connect_error) 
  {
      die('Błąd połączenia: '. $db->connect_error); 
  }  
  //sprawdzamy czy się łączy w podejściu proceduralnym
  /*if(!$db)
  {
      error_log('Błąd połączenia: '. mysqli_connect_error());
  }*/
  else
  {
        echo 'Połączenie nawiązano<br />';


        // wyciągamy wszystko z tabeli "test"
        $sql="SELECT * FROM `operacje_db` ";
        $wynik=$db->query($sql);

        /* możemy podejrzeć co otrzymaliśmy
        echo '<pre>';
        print_r($db);
        echo '</pre>';

        echo '<pre>';
        print_r($wynik);
        echo '</pre>';
        */

        $ile_wierszy=$wynik->num_rows;
        echo 'ilość wierszy '.$ile_wierszy.'<br />';

        //wyciągamy dane z zapytania
        echo '<table>';
        echo '<tr><td>Imie</td><td>Nazwisko</td></tr>';

        //pętla po rekordach z bazy
        for ($i=0; $i <$ile_wierszy; $i++)
            {
                $wiersz = $wynik->fetch_assoc();
                echo '<tr>';
                echo '<td>'.$wiersz['imie'].'</td>';
                echo '<td>'.$wiersz['nazwisko'].'</td>';
                echo '</tr>';
            }
        echo '</table>';
	
	echo '<div>';
	echo '<h3>Heja Zuza!</h3>';
	echo 'lista:
	<ul>
		<li>element 1</li>
		<li>element 2</li>
		<li>element 3</li>
	</ul>
	</div>';

	
 

       //można to też zrobić za pomocą foreach
       foreach($wynik as $row) { 
        echo $row["id"].'-'.$row['imie'].'<br/>';
      }   


  } 
  $db->close(); //zamykamy połączenie

?>