<?php


namespace Edu\Cnm\DataDesign;

require_once("autoload.php");

require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");



use Ramsey\Uuid\Uuid;
/**
 *
 *
 * @author Manuel Escobar III <mescobar14@cnm.edu>
 *
 **/

class Persona {
	use \ValidateUuid;

	/**
	 * id for this Persona; this is the primary key
	 * @var Uuid $personaId
	 **/
	protected $personaId;

	/**
	 * user's email address
	 * @var string $personaEmail
	 **/
	protected $personaEmail;

	/**
	 * user's Phone Number
	 * @var string $personaPhone
	 **/
	protected $personaPhone;

	/**
	 * user's gender type address
	 * @var string $personaType
	 **/
	protected $personaType;

// Constructor

	/**
	 * constructor for this Persona
	 *
	 * @param string|Uuid $newPersonaId id of this Persona
	 * @param string $newPersonaEmail of the Persona that sent this Email
	 * @param string $newPersonaPhone string containing actual persona data
	 * @param string $newPersonaType string containing actual persona data
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 **/
	public function __construct($newPersonaId, string $newPersonaEmail, string $newPersonaPhone, $newPersonaType) {
		try {
			$this->setPersonaId($newPersonaId);
			$this->setPersonaEmail($newPersonaEmail);
			$this->setPersonaPhone($newPersonaPhone);
			$this->setPersonaType($newPersonaType);
		} //determine what exception type was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}


	/**
	 * accessor method for getting personaId
	 * @return Uuid value of personaId
	 *
	 */
	public function getPersonaId(): Uuid {
		return ($this->personaId);
	}

	/**
	 * mutator method for personaId
	 *
	 * @param mixed $personaId
	 * @throws \RangeException if $newProfileId is not positive
	 * @throws \TypeError if $newProfileId is not a uuid or string
	 *
	 */
	public function setPersonaId($newPersonaId): void {
		try {

			$uuid = self::validateUuid($newPersonaId);

		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {

			$exceptionType = get_class($exception);

			throw(new $exceptionType($exception->getMessage(), 0, $exception));

		}

		// convert and store the profile id
		$this->personaId = $uuid;
	}


	/**
	 * accessor method for personaType
	 * @return string value of gender type
	 *
	 **/
	public function getPersonType(): string {
		return $this->personaType;
	}

	/**
	 * mutator method for personaType
	 *
	 * @param string $newPersonaType new val for personaType
	 * @throws \InvalidArgumentException if $newPersonaType is insecure or empty
	 * @throws \TypeError if $newProfileName !=== string
	 * @throws \RangeException if $newPersonaType > 32chars
	 **/
	public function setPersonaType($newPersonaType): void {
		$newProfileName = trim($newPersonaType);

		$newPersonaType = filter_var($newProfileName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

		if(empty($newPersonaType) === true) {

			throw(new \InvalidArgumentException("profileName value is empty or insecure"));

		}

		if(is_string($newPersonaType) === false) {
			throw(new \TypeError("profileName must be a string"));
		}

		if(strlen($newPersonaType) > 32) {
			throw(new \RangeException("profileName input too large"));
		}

		$this->personaType = $newPersonaType;
	}


	/**
	 * accessor method for personaEmail
	 * @return string value for personaEmail
	 *
	 */
	public function getPersonaEmail(): string {
		return $this->personaEmail;
	}

	/**
	 * mutator method for personaEmail
	 *
	 * @param string $newPersonaEmail new val for personaEmail
	 * @throws \InvalidArgumentException if input is insecure
	 * @throws \TypeError if $newProfileEmail is not a string
	 * @throws \RangeException if $newProfileEmail > 128chars
	 **/
	public function setPersonaEmail($newPersonaEmail): void {
		$newPersonaEmail = trim($newPersonaEmail);

		$newPersonaEmail = filter_var($newPersonaEmail, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

		if(empty($newProfileEmail) === true) {

			throw(new \InvalidArgumentException("Email value is empty or insecure"));

		}
		if(is_string($newPersonaEmail) === false) {

			throw(new \TypeError("Email input must be a string"));
		}
		if(strlen($newPersonaEmail) > 128) {
			throw(new \RangeException("Email input too large"));
		}
		// store new profileEmail
		$this->personaEmail = $newPersonaEmail;
	}


	/**
	 * accessor method for personaPhone
	 * @return persona phone
	 *
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
	 * -- inserts this Persona into mySQL
	 *
	 * -- @param \PDO $pdo PDO connection object
	 * -- @throws \PDOException when mySQL related errors occur
	 * -- @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo): void {

		$query = "INSERT INTO persona(personaId, personaEmail, personaPhone, personaType) VALUES(:personaId, :personaEmail,:personaPhone ,:personaType)";
		$statement = $pdo->prepare($query);
		$parameters = ["personaId" => $this->personaId->getBytes(), "personaEmail" => $this->personaEmail, "personaPhone" => $this->personaPhone, "personaType" => $this->personaType];
		$statement->execute($parameters);
	}


	public function delete(\PDO $pdo): void {

		// create query template
		$query = "DELETE FROM persona WHERE personaId = :personaId";
		$statement = $pdo->prepare($query);
		$parameters = ["personaId" => $this->personaId->getBytes(), "personaEmail" => $this->personaEmail, "personaPhone" => $this->personaPhone, "personaType" => $this->personaType];
		$statement->execute($parameters);
	}


	public function update(\PDO $pdo): void {

// create query template
		$query = "UPDATE persona SET personaId = :personaId, personaEmail = :personaEmail, personaPhone = :personaPhone, personaType = :personaType, WHERE personaId = :personaId";
		$statement = $pdo->prepare($query);

		$parameters = ["personaId" => $this->personaId->getBytes(), "personaEmail" => $this->personaEmail, "personaPhone" => $this->personaPhone, "personaType" => $this->personaType];
		$statement->execute($parameters);
	}

	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/
	public function jsonSerialize(): array {

		$fields = get_object_vars($this);
		$fields["personaId"] = $this->personaId->toString();
		return ($fields);
	}


	/**
	 * gets the Persona by PersonaId
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param Uuid| string $personaId persona id to search for
	 * @return Persona|null Persona found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when a variable are not the correct data type
	 **/
	public static function getPersonaByPersonaId(\PDO $pdo, $personaId): ?Persona {
		// sanitize the personaId before searching
		try {
			$personaId = self::validateUuid($personaId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}

		// create query template
		$query = "SELECT personaId, personaEmail, personaPhone, personaType";
		$statement = $pdo->prepare($query);

		// bind the persona id to the place holder in the template
		$parameters = ["personaId" => $personaId->getBytes()];
		$statement->execute($parameters);

		// grab the persona from mySQL
		try {
			$persona = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$persona = new Persona($row["personaId"], $row["personaEmail"], $row["personaPhone"], $row["personaType"]);
			}
		} catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($persona);
	}



	/**
	 * gets the Persona by PersonaType
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param Uuid| string $personaType persona id to search for
	 * @return Persona|null Persona found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when a variable are not the correct data type
	 **/
	public static function getPersonaByPersonaType(\PDO $pdo, $personaType): ?Persona {
		// sanitize the personaId before searching
		try {
			$personaType = self::validateUuid($personaType);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}

		// create query template
		$query = "SELECT personaId, personaEmail, personaPhone, personaType";
		$statement = $pdo->prepare($query);

		// bind the persona type to the place holder in the template
		$parameters = ["personaType" => $personaType->getBytes()];
		$statement->execute($parameters);

		// grab the persona from mySQL
		try {
			$persona = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$persona = new Persona($row["personaId"], $row["personaEmail"], $row["personaPhone"], $row["personaType"]);
			}
		} catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($persona);
	}
}


