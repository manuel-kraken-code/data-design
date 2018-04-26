<?php

use Ramsey\Uuid\Uuid;
/**
 *
 *
 * @author Manuel Escobar III <mescobar14@cnm.edu>
 *
 **/

class Persona {
	protected $personaId;
	protected $personaEmail;
	protected $personaPhone;
	protected $personaType;


	/**
	 * method for getting PersonaId
	 * @return Uuid
	 *
	 */
	public function getPersonaId(): Uuid {
		return $this->personaId;
	}

	/**
	 * @param mixed $personaId
	 */
	public function setPersonaId($personaId): void {
		$this->personaId = $personaId;
	}

	/**
	 * @return mixed
	 */
	public function getPersonType(): string {
		return $this->personaType;
	}

	/**
	 * @param mixed $personaType
	 */
	public function setPersonaType($personaIdtype): void {
		$this->personaIdtype = $personaIdtype;
	}

	/**
	 * @return persona email
	 */
	public function getPersonaEmail(): string {
		return $this->personaEmail;
	}

	/**
	 * @param mixed $personaEmail
	 */
	public function setPersonaEmail($personaEmail): void {
		$this->personaEmail = $personaEmail;
	}

	/**
	 * @return mixed
	 */
	public function getPersonaPhone(): string {
		return $this->personaPhone;
	}

	/**
	 * @param mixed $personaPhone
	 */
	public function setPersonaPhone($personaPhone): void {
		$this->personaPhone = $personaPhone;
	}


	/**
	 * -- inserts this Tweet into mySQL
	 *
	 * -- @param \PDO $pdo PDO connection object
	 * -- @throws \PDOException when mySQL related errors occur
	 * -- @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo): void {

		$query = "INSERT INTO persona(personaId, personaEmail, personaPhone, personaType) VALUES(:personaId, :personaEmail,:personaPhone ,:personaType)";
		$statement = $pdo->prepare($query);
		$parameters = ["personaId" => $this->personaId->getBytes(), "personaEmail" => $this->personaEmail, "personaPhone" => $this->personaPhone, "personaType" => $this->personaType];
	}


	public function delete(\PDO $pdo): void {

		$query = "DELETE FROM persona WHERE personaId = :personaId";
		$statement = $pdo->prepare($query);

// bind the member variables to the place holder in the template
		$parameters = ["personaId" => $this->personaId->getBytes()];
		$statement->execute($parameters);
	}


	public function update(\PDO $pdo): void {

// create query template
		$query = "UPDATE persona SET personaId = :personaId, personaEmail = :personaEmail, personaPhone = :personaPhone, personaType = :personaType, WHERE personaId = :personaId";
		$statement = $pdo->prepare($query);

		$parameters = ["personaId" => $this->personaId->getBytes(), "personaEmail" => $this->personaEmail, "personaPhone" => $this->personaPhone, "personaType" => $this->personaType];
		$statement->execute($parameters);
	}
}
