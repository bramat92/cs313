DROP TABLE if exists course, note;

CREATE TABLE course
(
	id SERIAL PRIMARY KEY NOT NULL,
	name VARCHAR(80) NOT NULL,
	number VARCHAR(10) NOT NULL UNIQUE
);

CREATE TABLE note
(
	id SERIAL PRIMARY KEY NOT NULL,
	course_id INT NOT NULL REFERENCES course(id),
	content TEXT NOT NULL,
	date DATE NOT NULL
);

GRANT SELECT, INSERT, UPDATE, DELETE ON ALL TABLES IN SCHEMA public TO pdwhaohijgrthi;
GRANT USAGE, SELECT ON ALL SEQUENCES IN SCHEMA public TO pdwhaohijgrthi;

INSERT INTO course(name, number) VALUES ('Web Engineering II', 'CS 313');
INSERT INTO course(name, number) VALUES ('Object-oriented Programming', 'CS 165');
