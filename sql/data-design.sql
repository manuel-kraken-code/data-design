DROP TABLE IF EXISTS `like`;
DROP TABLE IF EXISTS comment;
DROP TABLE IF EXISTS persona;

CREATE TABLE persona (
personaId BINARY(16) NOT NULL,
personaType TINYINT(1) NOT NULL,
personaEmail VARCHAR(128) NOT NULL,
personaPhone VARCHAR(32),
UNIQUE(personaEmail),
PRIMARY KEY(personaId)
);

CREATE TABLE comment (

commentId BINARY(16) NOT NULL,
commentProfileId BINARY(16) NOT NULL,
commentContent VARCHAR(140) NOT NULL,
commentDate DATETIME(6) NOT NULL,
INDEX(commentProfileId),
FOREIGN KEY(commentProfileId) REFERENCES persona(personaId),
PRIMARY KEY(commentId)
);

CREATE TABLE `like` (
likePersonaId BINARY(16) NOT NULL,
likeCommentId BINARY(16) NOT NULL,
likeDate DATETIME(6) NOT NULL,
INDEX(likePersonaId),
INDEX(likeCommentId),
FOREIGN KEY(likePersonaId) REFERENCES persona(personaId),
FOREIGN KEY(likeCommentId) REFERENCES comment(commentId),
PRIMARY KEY(likePersonaId, likeCommentId)
);
