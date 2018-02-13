DROP TABLE if exists scripture, topic;

CREATE TABLE scripture (
	id SERIAL NOT NULL PRIMARY KEY,
	book VARCHAR(100) NOT NULL,
	chapter INT NOT NULL,
	verse INT NOT NULL,
	content TEXT NOT NULL
);

INSERT INTO scripture (book, chapter, verse, content) VALUES 
('Mosiah', 2, 3, 'And they also took of the firstlings of their flocks, that they might offer sacrifice and burnt offerings according to the law of Moses'),
('John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.'),
('Doctrine and Covenants', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.'),
('Doctrine and Convenants', 93, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.'),
('Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');

CREATE TABLE topic (
	id SERIAL NOT NULL PRIMARY KEY,
	name VARCHAR(100) NOT NULL
);

INSERT INTO topic (name) VALUES
('Faith'),
('Sacrifice'),
('Charity');

CREATE TABLE stopic (
	id SERIAL NOT NULL PRIMARY KEY,
	scripture_id INTEGER NOT NULL,
	topic_id INTEGER NOT NULL,
	FOREIGN KEY (scripture_id) REFERENCES scripture(id),
	FOREIGN KEY (topic_id) REFERENCES topic(id)
);

INSERT INTO stopic (scripture_id, topic_id) VALUES
(1, 2),
(2, 1),
(2, 3),
(3, 1);


GRANT SELECT, INSERT, UPDATE ON scripture TO pczslgipstyxmw;
GRANT SELECT, INSERT, UPDATE ON topic TO pczslgipstyxmw;
GRANT USAGE, SELECT ON ALL SEQUENCES IN SCHEMA public TO pczslgipstyxmw;

	