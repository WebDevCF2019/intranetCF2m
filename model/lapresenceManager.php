<?php

class lapresenceManager
{
private $db;

public function __construct(MyPDO $connect) {
	$this->db = $connect;
}

public function displayContentLapresence(): array {
	$sql = "
	DESCRIBE
		lapresence;";
	$sqlQuery = $PDOConnect->prepare($sql);
	$sqlQuery->execute();
	
	return $sqlQuery->fetchAll(PDO::FETCH_ASSOC);
}

public function lapresence_SelectById(int $idlapresence): array {
	if (empty($idlapresence)) {
		return[];
	}
	$sql = "SELECT * FROM lapresence WHERE idlapresence = ? ;";
	$recup = $this->db->prepare($sql);
	$recup->bindValue(1, $idlapresence, PDO::PARAM_INT);
	$recup->execute();
	if ($recup->rowCount() === 0) {
		return [];
	}
	return $recup->fetch(PDO::FETCH_ASSOC);
}

public function lapresence_Update(lapresence $datas, int $idlapresence) {
	if (empty($datas->getlenom()) || empty($datas->getlacronyme()) || empty($datas->getidlafiliere()) || empty($datas->getLacouleur())) {
		return false;
	}
	$sql = "UPDATE lafiliere SET ampm=?, ladate=?, heuredebut=?, heurefin=?, lecode=?, linscription_idlinscription=? WHERE idlafiliere=?;";
	$update = $this->db->prepare($sql);
	$update->bindValue(1, $datas->getAmpm(), PDO::PARAM_STR);
	$update->bindValue(2, $datas->getLadate(), PDO::PARAM_STR);
	$update->bindValue(3, $datas->getHeuredebut(), PDO::PARAM_STR);
	$update->bindValue(4, $datas->getHeurefin(), PDO::PARAM_STR);
	$update->bindValue(5, $datas->getLecode(), PDO::PARAM_INT);
	$update->bindValue(6, $datas->getLinscription_idlinscription(), PDO::PARAM_INT);
	$update->bindValue(7, $datas->getIdlapresence(), PDO::PARAM_INT);
	
	try {
		$update->execute();
		return true;
	} catch (PDOException $e) {
		echo $e->getCode();
		return false;
	}
}

public function lapresence_Create(lapresence $datas) {
	
	$sql = "INSERT INTO lapresence (ampm, ladate, heuredebut, heurefin, lecode, linscription_idlinscription) VALUES (?, ?, ?, ?, ?, ?);";
	
	$insert = $this->db->prepare($sql);
	$insert->bindValue(1, $datas->getAmpm(), PDO::PARAM_INT);
	$insert->bindValue(2, $datas->getLadate(), PDO::PARAM_STR);
	$insert->bindValue(3, $datas->getHeuredebut(), PDO::PARAM_STR);
	$insert->bindValue(4, $datas->getHeurefin(), PDO::PARAM_STR);
	$insert->bindValue(5, $datas->getLecode(), PDO::PARAM_STR);
	$insert->bindValue(6, $datas->getLinscription_idlinscription(), PDO::PARAM_INT);
	
	try {
		$insert->execute();
		return true;
	} catch (PDOException $e) {
		echo $e->getCode();
		return false;
	}
	
}

public function lapresence_Delete(int $idlapresence) {
	$sql = "DELETE FROM lapresence WHERE idlapresence=?";
	$delete = $this->db->prepare($sql);
	$delete->bindValue(1, $idlapresence, PDO::PARAM_INT);
	try {
		$delete->execute();
		return true;
	} catch (PDOException $e) {
		echo $e->getCode();
		return false;
	}
}

public function lapresence_SelectAll(): array {
	$sql = "SELECT * FROM lapresence;";
	
	$recup = $this->db->query($sql);
	
	if ($recup->rowCount() === 0) {
		return [];
	}
	return $recup->fetchAll(PDO::FETCH_ASSOC);
}

public function lapresence_SelectAllByInscription(int $idlinscription): array {
	$sql = "SELECT * FROM lapresence JOIN linscription ON linscription_idlinscription = idlinscription WHERE idlinscription = ?;";
	
	$recup = $this->db->prepare($sql);
	$recup->bindValue(1, $idlinscription, PDO::PARAM_INT);
	$recup->execute();
	if ($recup->rowCount() === 0) {
		return [];
	}
	return $recup->fetch(PDO::FETCH_ASSOC);
}

public function lapresence_SelectAllByCode(int $idlinscription, string $code): array {
	$sql = "SELECT * FROM lapresence JOIN linscription ON linscription_idlinscription = idlinscription WHERE idlinscription = ? AND lecode = ?;";
	
	$recup = $this->db->prepare($sql);
	$recup->bindValue(1, $idlinscription, PDO::PARAM_INT);
	$recup->bindValue(2, $code, PDO::PARAM_STR);
	$recup->execute();
	if ($recup->rowCount() === 0) {
		return [];
	}
	return $recup->fetch(PDO::FETCH_ASSOC);
}

public function lapresence_SelectAllByDay(int $idlinscription, string $date): array {
	$sql = "SELECT * FROM lapresence JOIN linscription ON linscription_idlinscription = idlinscription WHERE idlinscription = ? AND ladate = ?;";
	
	$recup = $this->db->prepare($sql);
	$recup->bindValue(1, $idlinscription, PDO::PARAM_INT);
	$recup->bindValue(2, $date, PDO::PARAM_STR);
	$recup->execute();
	if ($recup->rowCount() === 0) {
		return [];
	}
	return $recup->fetch(PDO::FETCH_ASSOC);
}

public function lapresence_SelectAllByWeek(int $idlinscription, string $datedebut, string $datefin): array {
	$sql = "SELECT * FROM lapresence JOIN linscription ON linscription_idlinscription = idlinscription WHERE idlinscription = ? AND ladate BETWEEN ? AND ?;";
	
	$recup = $this->db->prepare($sql);
	$recup->bindValue(1, $idlinscription, PDO::PARAM_INT);
	$recup->bindValue(2, $datedebut, PDO::PARAM_STR);
	$recup->bindValue(3, $datefin, PDO::PARAM_STR);
	$recup->execute();
	if ($recup->rowCount() === 0) {
		return [];
	}
	return $recup->fetch(PDO::FETCH_ASSOC);
}

public function lapresence_SelectAllByMonth(int $idlinscription, int $mois, int $annee): array {
	$sql = "SELECT * FROM lapresence JOIN linscription ON linscription_idlinscription = idlinscription WHERE idlinscription = ? AND MONTH(ladate) = ? AND YEAR(ladate) = ?;";
	
	$recup = $this->db->prepare($sql);
	$recup->bindValue(1, $idlinscription, PDO::PARAM_INT);
	$recup->bindValue(2, $mois, PDO::PARAM_STR);
	$recup->bindValue(3, $annee, PDO::PARAM_STR);
	$recup->execute();
	if ($recup->rowCount() === 0) {
		return [];
	}
	return $recup->fetch(PDO::FETCH_ASSOC);
}

}