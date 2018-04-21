<?php


class Persona {
	protected $personaId;
	protected $personaIdtype;
	protected $personaEmail;
	protected $personaPhone;

	/**
	 * @return mixed
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

