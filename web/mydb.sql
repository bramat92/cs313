DROP TABLE if exists users, posts, comments, likes, follows, tags, posts_tags;
CREATE TABLE users (
		id SERIAL NOT NULL PRIMARY KEY,
		username VARCHAR(255) UNIQUE NOT NULL,
		firstname VARCHAR(255) NOT NULL,
		lastname VARCHAR(255) NOT NULL,
		created_at TIMESTAMP DEFAULT NOW()
);

CREATE TABLE posts (
		id SERIAL NOT NULL PRIMARY KEY,
		post TEXT NOT NULL,
		user_id INTEGER NOT NULL,
		created_at TIMESTAMP DEFAULT NOW(),
		FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE comments (
		id SERIAL NOT NULL PRIMARY KEY,
		comment_text VARCHAR(255) NOT NULL,
		user_id INTEGER NOT NULL,
		post_id INTEGER NOT NULL,
		created_at TIMESTAMP DEFAULT NOW(),
		FOREIGN KEY(post_id) REFERENCES posts(id),
		FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE likes (
		user_id INTEGER NOT NULL,
		post_id INTEGER NOT NULL,
		created_at TIMESTAMP DEFAULT NOW(),
		FOREIGN KEY(user_id) REFERENCES users(id),
		FOREIGN KEY(post_id) REFERENCES posts(id),
		PRIMARY KEY(user_id, post_id)
);

CREATE TABLE follows (
		follower_id INTEGER NOT NULL,
		followee_id INTEGER NOT NULL,
		created_at TIMESTAMP DEFAULT NOW(),
		FOREIGN KEY(follower_id) REFERENCES users(id),
		FOREIGN KEY(followee_id) REFERENCES users(id),
		PRIMARY KEY(follower_id, followee_id)
);

CREATE TABLE tags (
	id SERIAL NOT NULL PRIMARY KEY,
	tag_name VARCHAR(255) UNIQUE,
	created_at TIMESTAMP DEFAULT NOW()
);

CREATE TABLE posts_tags (
		post_id INTEGER NOT NULL,
		tag_id INTEGER NOT NULL,
		FOREIGN KEY(post_id) REFERENCES posts(id),
		FOREIGN KEY(tag_id) REFERENCES tags(id),
		PRIMARY KEY(post_id, tag_id)
);

INSERT INTO users (username, firstname, lastname, created_at) VALUES 
('bernie', 'Ben', 'Paul', '2017-02-16 18:22:10.846'), 
('kevin', 'Kevin', 'James', '2017-04-02 17:11:21.417'), 
('johnd', 'John', 'Doe', '2017-02-21 11:12:32.574'), 
('suet', 'Sue', 'Carl', '2016-08-13 01:28:43.085'), 
('domy', 'Dominic', 'Purcell', '2016-12-07 01:04:39.298'), 
('katl', 'Kathy', 'Lyon', '2017-04-30 13:26:14.496'), 
('sandy', 'Sally', 'Andy', '2016-12-12 06:50:07.996'), 
('harryp', 'Harry', 'Potter', '2016-08-20 02:19:45.512'), 
('ginw', 'Gin', 'Weasel', '2016-06-24 19:36:30.978'), 
('gavins', 'Gavin', 'Sanchez', '2016-08-07 16:25:48.561');

INSERT INTO posts (post, user_id, created_at) VALUES
('Only I can change my life. No one can do it for me.', 1, '2017-02-16 18:22:10.846'),
('Life is 10% what happens to you and 90% how you react to it.', 1, '2016-02-21 11:12:32.574'),
('Good, better, best. Never let it rest. Til your good is better and your better is best.', 2, '2016-06-24 19:36:30.978'),
('It does not matter how slowly you go as long as you do not stop.', 2, '2017-04-30 13:26:14.496'),
('With the new day comes new strength and new thoughts.', 3, '2016-08-07 16:25:48.561'),
('Optimism is the faith that leads to achievement. Nothing can be done without hope and confidence.', 3, '2017-04-02 17:11:21.417'),
('In order to succeed, we must first believe that we can.', 4, '2017-02-21 11:12:32.574'),
('Failure will never overtake me if my determination to succeed is strong enough.', 4, '2017-02-2 11:12:32.574'),
('Expect problems and eat them for breakfast.', 5, '2017-05-21 11:12:32.574'),
('Always do your best. What you plant now, you will harvest later.', 5, '2007-02-21 11:12:32.574'),
('The secret of getting ahead is getting started.', 6, '2017-02-11 11:12:32.574'),
('It always seems impossible until its done.', 6, '2017-02-21 11:12:32.54'),
('Quality is not an act, it is a habit.', 7, '2017-09-21 11:12:32.574'),
('If you can dream it, you can do it.', 7, '2017-02-01 11:12:32.574'),
('The past cannot be changed. The future is yet in your power.', 8, '2012-02-21 11:12:32.574'),
('We may encounter many defeats but we must not be defeated.', 8, '2017-02-21 11:14:32.574'),
('What you do today can improve all your tomorrows.', 9, '2017-02-27 11:12:32.574'),
('A creative man is motivated by the desire to achieve, not by the desire to beat others.', 9, '2017-02-21 11:12:32.57'),
('Keep your eyes on the stars, and your feet on the ground. ', 10, '2017-02-21 11:12:30.574'),
('Problems are not stop signs, they are guidelines.', 10, '2018-02-09 11:12:32.574');

INSERT INTO comments (comment_text, user_id, post_id)  VALUES 
('This is super great', 10, 1),
('I love it', 9, 2),
('Cannot understand how this is possible', 8, 3),
('I did not know this', 7, 4),
('Since when?', 6, 5),
('I am loving this', 5, 6),
('Where is this from?', 4, 7),
('How did this happen?', 3, 8),
('No room for saddness', 2, 9),
('This is amazing', 1, 10),
('Are you serious right now?', 2, 9),
('Who said this?', 3, 8),
('I am loving this a lot', 4, 7),
('I have never heard of this', 5, 6),
('No need to fear', 6, 5),
('I like this', 7, 4),
('Way to go', 8, 3),
('Good one', 9, 2),
('Truth be told', 10, 4);

INSERT INTO likes (user_id, post_id) VALUES
(1, 2), (1, 3), (2, 1), (2, 4), (3, 5), (3, 6), (4, 7), 
(4, 8), (5, 9), (5, 10), (6, 11), (6, 12), (7, 13), (7, 14),
(8,15), (8, 16), (9, 17), (9, 18), (10, 19), (10, 20);

INSERT INTO tags(tag_name) VALUES ('sunset'), ('postgraphy'), 
('sunrise'), ('landscape'), ('food'), ('foodie'), ('delicious'), 
('beauty'), ('stunning'), ('dreamy'), ('lol'), ('happy'), ('fun'), 
('style'), ('hair'), ('fashion'), ('party'), ('concert'), ('drunk'), ('beach'), ('smile');

INSERT INTO posts_tags(post_id, tag_id) VALUES (1, 18), (1, 17), (1, 21), (1, 13), (1, 19), (2, 4), (2, 3), (2, 20), (2, 2), (3, 8), (4, 12), (4, 11), (4, 21), (4, 13), (5, 15), (5, 14), (5, 17), (5, 16), (6, 19), (6, 13), (6, 17), (6, 21), (7, 11), (7, 12), (7, 21), (7, 13), (8, 17), (8, 21), (8, 13), (8, 19), (9, 18), (10, 2), (11, 12), (11, 21), (11, 11), (12, 4), (13, 13), (13, 19), (14, 1), (14, 20), (17, 19), (17, 13), (17, 18), (19, 5), (15, 20), (15, 3), (16, 1), (16, 4), (20, 7), (20, 5), (9, 6), (10, 18), (14, 19);

INSERT INTO follows(follower_id, followee_id) VALUES 
(1, 2), (1, 3), (2, 1), (2, 4), (3, 5), (3, 6), (4, 7), 
(4, 8), (5, 9), (5, 10), (6, 9), (6, 8), (7, 6), (7, 10),
(8, 4), (8, 3), (9, 2), (9, 1), (10, 7), (10, 5);
