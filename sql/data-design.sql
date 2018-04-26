ALTER DATABASE mescobar14 CHARACTER SET utf8 COLLATE utf8_unicode_ci;


DROP TABLE IF EXISTS `like`;
DROP TABLE IF EXISTS comment;
DROP TABLE IF EXISTS persona;

CREATE TABLE persona (
personaId BINARY(16) NOT NULL,
personaEmail VARCHAR(128) NOT NULL,
personaPhone VARCHAR(32),
personaType TINYINT(1) NOT NULL,
UNIQUE(personaEmail),
PRIMARY KEY(personaId)
);

CREATE TABLE comment (

commentId BINARY(16) NOT NULL,
commentPersonaId BINARY(16) NOT NULL,
commentContent VARCHAR(140) NOT NULL,
commentDate DATETIME NOT NULL,
INDEX(commentPersonaId),
FOREIGN KEY(commentPersonaId) REFERENCES persona(personaId),
PRIMARY KEY(commentId)
);

CREATE TABLE `like` (
likeCommentId BINARY(16) NOT NULL,
likePersonaId BINARY(16) NOT NULL,
likeDate DATETIME(6) NOT NULL,
INDEX(likePersonaId),
INDEX(likeCommentId),
FOREIGN KEY(likePersonaId) REFERENCES persona(personaId),
FOREIGN KEY(likeCommentId) REFERENCES comment(commentId),
PRIMARY KEY(likePersonaId, likeCommentId)
);
