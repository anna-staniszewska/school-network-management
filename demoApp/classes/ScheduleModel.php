<?php
session_start();
class ScheduleModel extends Database {
  protected function getMeetings($schoolId) {
      if($_SESSION["Stanowisko"]=="wlasciciel") {
          $sql = "SELECT Rozmowy.DATA AS Data, DATE_FORMAT(Rozmowy.GodzinaRozpoczecia, '%H:%i') AS GodzinaRozpoczecia,
            DATE_FORMAT(Rozmowy.GodzinaZakonczenia, '%H:%i') AS GodzinaZakonczenia,
            Szkola.IdSzkoly, Szkola.Nazwa, Sale.IdSali,
            Kandydaci.Stanowisko, Kandydaci.Imie, Kandydaci.Nazwisko, Rozmowy.IdRozmowy
            FROM Rozmowy
            JOIN Kandydaci ON Rozmowy.IdKandydata=Kandydaci.IdKandydata
            JOIN Sale ON Rozmowy.IdSali=Sale.IdSali
            JOIN Szkola ON Sale.IdSzkoly=Szkola.IdSzkoly 
            ORDER BY Rozmowy.GodzinaRozpoczecia";
      }
      else {
          $sql = "SELECT Rozmowy.DATA AS Data, DATE_FORMAT(Rozmowy.GodzinaRozpoczecia, '%H:%i') AS GodzinaRozpoczecia,
            DATE_FORMAT(Rozmowy.GodzinaZakonczenia, '%H:%i') AS GodzinaZakonczenia,
            Szkola.IdSzkoly, Szkola.Nazwa, Sale.IdSali,
            Kandydaci.Stanowisko, Kandydaci.Imie, Kandydaci.Nazwisko, Rozmowy.IdRozmowy
            FROM Rozmowy
            JOIN Kandydaci ON Rozmowy.IdKandydata=Kandydaci.IdKandydata
            JOIN Sale ON Rozmowy.IdSali=Sale.IdSali
            JOIN Szkola ON Sale.IdSzkoly=Szkola.IdSzkoly 
            WHERE Szkola.IdSzkoly = ?
            ORDER BY Rozmowy.GodzinaRozpoczecia";
      }


    $stmt = $this->connect()->prepare($sql);

      if($_SESSION["Stanowisko"]=="wlasciciel") {
          if (!$stmt->execute()) {
              $stmt = null;
              header("location: ../index.php?error=stmtfailed");
              exit();
          }
      }
      else {
          if (!$stmt->execute(array($schoolId))) {
              $stmt = null;
              header("location: ../index.php?error=stmtfailed");
              exit();
          }
      }


    if ($stmt->rowCount() == 0) {
      $stmt = null;
      //echo "brak zaplanowanych spotkań";
      header("location: ../index.php?error=meetingsNotFound");
      exit();
    }

    $meetings = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["spotkania"] = $meetings;

    $stmt = null;
  }
}