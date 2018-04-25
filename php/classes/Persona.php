<?php

use Ramsey\Uuid\Uuid;
class Persona {
	protected $personaId;
	protected $personaIdtype;
	protected $personaEmail;
	protected $personaPhone;
	/**
	 * Trait to validate a uuid
	 *
	 * This trait will validate a uuid in any of the following three formats:
	 *
	 * 1. human readable string (36 bytes)
	 * 2. binary string (16 bytes)
	 * 3. Ramsey\Uuid\Uuid object
	 *
	 * @author Dylan McDonald <dmcdonald21@cnm.edu>
	 * @package Edu\Cnm\Misquote
	 **/


	/**
	 * method for getting PersonaId
	 * @return Uuid
	 *
	 */
	public function getPersonaId() : Uuid {
		return $this->personaId;
	}

	/**
	 * @param mixed $personaId
	 */
	public function setPersonaId($personaId) : void {
		$this->personaId = $personaId;
	}

	/**
	 * @return mixed
	 */
	public function getPersonaIdtype() : string  {
		return $this->personaIdtype;
	}

	/**
	 * @param mixed $personaIdtype
	 */
	public function setPersonaIdtype($personaIdtype) : void {
		$this->personaIdtype = $personaIdtype;
	}

	/**
	 * @return persona email
	 */
	public function getPersonaEmail() : string {
		return $this->personaEmail;
	}

	/**
	 * @param mixed $personaEmail
	 */
	public function setPersonaEmail($personaEmail) : void {
		$this->personaEmail = $personaEmail;
	}

	/**
	 * @return mixed
	 */
	public function getPersonaPhone() : string {
		return $this->personaPhone;
	}

	/**
	 * @param mixed $personaPhone
	 */
	public function setPersonaPhone($personaPhone) : void {
		$this->personaPhone = $personaPhone;
	}


}





/**
-- inserts this Tweet into mySQL

-- @param \PDO $pdo PDO connection object
-- @throws \PDOException when mySQL related errors occur
-- @throws \TypeError if $pdo is not a PDO connection object
**/
public function insert(\PDO $pdo) : void {

	$query = "INSERT INTO persona(personaId, personaType, personaEmail, personaPhone) VALUES(:personaId, :personaType, :personaEmail, :personaPhone)";
	$statement = $pdo->prepare($query);
	$parameters = ["personaId" => $this->personaId->getBytes(), "personaType" => $this->personaType->getBytes(), "personaEmail" => $this->personaEmail, "personaPhone" => $this->personaPhone;
}

$query = "INSERT INTO comment(commentId, commentPersonaId, commentContent, commentDate) VALUES(:commentId, :commentPersonaId, :commentContent, :commentDate)";
$statement = $pdo->prepare($query);
$parameters = ["commentId" => $this->commentId->getBytes(), "commentPersonaId" => $this->commentPersonaId->getBytes(), "commentContent" => $this->commentContent, "commentDate" => $this->commentDate;
}

public function delete(\PDO $pdo) : void {

	$query = "DELETE FROM persona WHERE personaId = :personaId";
	$statement = $pdo->prepare($query);

// bind the member variables to the place holder in the template
	$parameters = ["personaId" => $this->personaId->getBytes()];
	$statement->execute($parameters);


	public function delete(\PDO $pdo) : void {

		$query = "DELETE FROM comment WHERE commentId = :commentId";
		$statement = $pdo->prepare($query);

// bind the member variables to the place holder in the template
		$parameters = ["commentId" => $this->commentId->getBytes()];
		$statement->execute($parameters);public function delete(\PDO $pdo) : void {



			public function update(\PDO $pdo) : void {

// create query template
				$query = "UPDATE tweet SET personaId = :personaId, personaType = :personaType, personaEmail = :personaEmail, personaPhone = :personaPhone, WHERE personaId = :personaId";
				$statement = $pdo->prepare($query);

				$parameters = ["personaId" => $this->personaId->getBytes(),"personaType" => $this->personaType->getBytes(), "personaEmail" => $this->personaEmail, "tweetDate" => $formattedDate];
				$statement->execute($parameters);


				public function update(\PDO $pdo) : void {

// create query template
					$query = "UPDATE like SET likePersonaId = :likePersonaId, likeCommentId = :likeCommentId, likeDate = :likeDate WHERE likeId = :likeId";
					$statement = $pdo->prepare($query);


					$formattedDate = $this->likeDate->format("Y-m-d H:i:s.u");
					$parameters = ["likeId" => $this->likeId->getBytes(),"likePersonaId" => $this->likeCommentId->getBytes(), "likeDate" => $formattedDate];
					$statement->execute($parameters);

