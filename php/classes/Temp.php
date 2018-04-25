
-- inserts this Tweet into mySQL

-- @param \PDO $pdo PDO connection object
-- @throws \PDOException when mySQL related errors occur
-- @throws \TypeError if $pdo is not a PDO connection object

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
