<?php

namespace classes;
use Database;
use PDO;

class ModifyMeetingModel extends Database
{

    protected function getCurrentMeetingInformations($idRozmowy) {

        //sql code to select data about candidate add meeting
        $sql = "SELECT Rozmowy.IdRozmowy, Kandydaci.Imie, Kandydaci.Nazwisko AS Nazwisko, kandydaci.Stanowisko, 
            DATE_FORMAT(Rozmowy.GodzinaRozpoczecia, '%H:%i') AS GodzinaRozpoczecia, DATE_FORMAT(Rozmowy.GodzinaZakonczenia, '%H:%i')  AS GodzinaZakonczenia, Rozmowy.DATA AS DataRozmowy,
            Rozmowy.IdSali, Kandydaci.Stanowisko, Kandydaci.DataUrodzenia, Kandydaci.NrTelefonu, Kandydaci.Email,
            Kandydaci.Miejscowosc, Kandydaci.Ulica, Kandydaci.Pesel, Kandydaci.NrBudynku, Kandydaci.NrLokalu  
            FROM Rozmowy 
            JOIN Kandydaci ON Rozmowy.IdKandydata=Kandydaci.IdKandydata
            JOIN Sale ON Rozmowy.IdSali=Sale.IdSali
            JOIN Szkola ON Sale.IdSzkoly=Szkola.IdSzkoly
            WHERE Rozmowy.IdRozmowy = ? AND Sale.IdSzkoly = ?";

        //prepare sql statement, preventing sql injections
        $stmt = $this->connect()->prepare($sql);

        //execute prepared sql statement with given meeting Id
        $stmt->execute(array($idRozmowy, $_SESSION["IdSzkoly"]));

        //When cannot find informatins about meeting or there's no meeting for given "IdRozmowy"
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../subPages/recruitment.page.php?error=meetingNotFound");
            exit();
        }

        //fetch sql statement results
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //store sql results in session
        $_SESSION["spotkanie"] = $results;

        return true;
    }

    protected function modifyMeetingInformations($idRozmowy, $startTime, $endTime, $roomId, $date)
    {
        $sql = "UPDATE rozmowy 
                JOIN Sale ON Rozmowy.IdSali = Sale.IdSali
                SET Rozmowy.GodzinaRozpoczecia = ?, Rozmowy.GodzinaZakonczenia = ?, 
			        Rozmowy.Data = ?, rozmowy.IdSali = ?
                WHERE Rozmowy.IdRozmowy = ? AND sale.IdSzkoly = ?";


        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($startTime, $endTime, $date, $roomId, $idRozmowy, $_SESSION["IdSzkoly"]))){
            header("location: ../subPages/subSubPages/modifyMeeting.page.php?error=couldntModifyMeeting");
            exit;
        }

        return true;
    }

    protected function deleteMeeting($idRozmowy){

        $sql = "DELETE rozmowy FROM rozmowy 
                JOIN Sale ON Rozmowy.IdSali = Sale.IdSali
                WHERE rozmowy.IdRozmowy = ? AND sale.IdSzkoly = ?";

        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($idRozmowy, $_SESSION["IdSzkoly"]))){
            header("location: ../subPages/subSubPages/modifyMeeting.page.php?error=couldntDeleteMeeting");
            exit;
        }

        return true;
    }


}