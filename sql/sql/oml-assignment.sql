

INSERT INTO persona(personaId,personaEmail, personaPhone, personaType)
VALUES (UNHEX(REPLACE("01ceecf9-d01b-4af2-b5dcf1235891044f", "-", "")), "sfjhvbsd@gmail.com","505-123-1234", "1");

INSERT INTO comment(commentId, commentPersonaId, commentContent, commentDate)
VALUES (UNHEX(REPLACE("6c51d409-8477-4693-b562-4ea846ed3f41", "-", "")), UNHEX(REPLACE("01ceecf9-d01b-4af2-b5dcf1235891044f", "-", "")),"hi","2018-01-15 12:04:07");

UPDATE comment SET commentContent ="Hello" WHERE commentId= UNHEX(REPLACE("6c51d409-8477-4693-b562-4ea846ed3f41", "-", ""));

UPDATE persona SET personaEmail = "jyhtrebdfv2@lkumtndg.com" WHERE personaId = UNHEX(REPLACE("01ceecf9-d01b-4af2-b5dcf1235891044f", "-", ""));

DELETE FROM `like` WHERE  likeCommentId = UNHEX(REPLACE("6c51d409-8477-4693-b562-4ea846ed3f41", "-", "")) AND likePersonaId = UNHEX(REPLACE("01ceecf9-d01b-4af2-b5dcf1235891044f", "-", ""));
