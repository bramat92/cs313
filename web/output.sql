--
-- PostgreSQL database dump
--

-- Dumped from database version 10.2 (Ubuntu 10.2-1.pgdg14.04+1)
-- Dumped by pg_dump version 10.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: comments; Type: TABLE; Schema: public; Owner: auobnrfenbtijr
--

CREATE TABLE comments (
    id integer NOT NULL,
    comment_text character varying(255) NOT NULL,
    user_id integer NOT NULL,
    post_id integer NOT NULL,
    created_at timestamp without time zone DEFAULT now()
);


ALTER TABLE comments OWNER TO auobnrfenbtijr;

--
-- Name: comments_id_seq; Type: SEQUENCE; Schema: public; Owner: auobnrfenbtijr
--

CREATE SEQUENCE comments_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE comments_id_seq OWNER TO auobnrfenbtijr;

--
-- Name: comments_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: auobnrfenbtijr
--

ALTER SEQUENCE comments_id_seq OWNED BY comments.id;


--
-- Name: follows; Type: TABLE; Schema: public; Owner: auobnrfenbtijr
--

CREATE TABLE follows (
    follower_id integer NOT NULL,
    followee_id integer NOT NULL,
    created_at timestamp without time zone DEFAULT now()
);


ALTER TABLE follows OWNER TO auobnrfenbtijr;

--
-- Name: likes; Type: TABLE; Schema: public; Owner: auobnrfenbtijr
--

CREATE TABLE likes (
    user_id integer NOT NULL,
    post_id integer NOT NULL,
    created_at timestamp without time zone DEFAULT now()
);


ALTER TABLE likes OWNER TO auobnrfenbtijr;

--
-- Name: posts; Type: TABLE; Schema: public; Owner: auobnrfenbtijr
--

CREATE TABLE posts (
    id integer NOT NULL,
    post text NOT NULL,
    user_id integer NOT NULL,
    created_at timestamp without time zone DEFAULT now()
);


ALTER TABLE posts OWNER TO auobnrfenbtijr;

--
-- Name: posts_id_seq; Type: SEQUENCE; Schema: public; Owner: auobnrfenbtijr
--

CREATE SEQUENCE posts_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE posts_id_seq OWNER TO auobnrfenbtijr;

--
-- Name: posts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: auobnrfenbtijr
--

ALTER SEQUENCE posts_id_seq OWNED BY posts.id;


--
-- Name: posts_tags; Type: TABLE; Schema: public; Owner: auobnrfenbtijr
--

CREATE TABLE posts_tags (
    post_id integer NOT NULL,
    tag_id integer NOT NULL
);


ALTER TABLE posts_tags OWNER TO auobnrfenbtijr;

--
-- Name: tags; Type: TABLE; Schema: public; Owner: auobnrfenbtijr
--

CREATE TABLE tags (
    id integer NOT NULL,
    tag_name character varying(255),
    created_at timestamp without time zone DEFAULT now()
);


ALTER TABLE tags OWNER TO auobnrfenbtijr;

--
-- Name: tags_id_seq; Type: SEQUENCE; Schema: public; Owner: auobnrfenbtijr
--

CREATE SEQUENCE tags_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tags_id_seq OWNER TO auobnrfenbtijr;

--
-- Name: tags_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: auobnrfenbtijr
--

ALTER SEQUENCE tags_id_seq OWNED BY tags.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: auobnrfenbtijr
--

CREATE TABLE users (
    id integer NOT NULL,
    username character varying(255) NOT NULL,
    firstname character varying(255) NOT NULL,
    lastname character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password text NOT NULL,
    created_at timestamp without time zone DEFAULT now()
);


ALTER TABLE users OWNER TO auobnrfenbtijr;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: auobnrfenbtijr
--

CREATE SEQUENCE users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_id_seq OWNER TO auobnrfenbtijr;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: auobnrfenbtijr
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: comments id; Type: DEFAULT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY comments ALTER COLUMN id SET DEFAULT nextval('comments_id_seq'::regclass);


--
-- Name: posts id; Type: DEFAULT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY posts ALTER COLUMN id SET DEFAULT nextval('posts_id_seq'::regclass);


--
-- Name: tags id; Type: DEFAULT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY tags ALTER COLUMN id SET DEFAULT nextval('tags_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: comments; Type: TABLE DATA; Schema: public; Owner: auobnrfenbtijr
--

COPY comments (id, comment_text, user_id, post_id, created_at) FROM stdin;
1	This is super great	10	1	2018-02-25 05:26:01.201168
2	I love it	9	2	2018-02-25 05:26:01.201168
3	Cannot understand how this is possible	8	3	2018-02-25 05:26:01.201168
4	I did not know this	7	4	2018-02-25 05:26:01.201168
5	Since when?	6	5	2018-02-25 05:26:01.201168
6	I am loving this	5	6	2018-02-25 05:26:01.201168
7	Where is this from?	4	7	2018-02-25 05:26:01.201168
8	How did this happen?	3	8	2018-02-25 05:26:01.201168
9	No room for saddness	2	9	2018-02-25 05:26:01.201168
10	This is amazing	1	10	2018-02-25 05:26:01.201168
11	Are you serious right now?	2	9	2018-02-25 05:26:01.201168
12	Who said this?	3	8	2018-02-25 05:26:01.201168
13	I am loving this a lot	4	7	2018-02-25 05:26:01.201168
14	I have never heard of this	5	6	2018-02-25 05:26:01.201168
15	No need to fear	6	5	2018-02-25 05:26:01.201168
16	I like this	7	4	2018-02-25 05:26:01.201168
17	Way to go	8	3	2018-02-25 05:26:01.201168
18	Good one	9	2	2018-02-25 05:26:01.201168
19	Truth be told	10	4	2018-02-25 05:26:01.201168
\.


--
-- Data for Name: follows; Type: TABLE DATA; Schema: public; Owner: auobnrfenbtijr
--

COPY follows (follower_id, followee_id, created_at) FROM stdin;
1	2	2018-02-25 05:26:01.49957
1	3	2018-02-25 05:26:01.49957
2	1	2018-02-25 05:26:01.49957
2	4	2018-02-25 05:26:01.49957
3	5	2018-02-25 05:26:01.49957
3	6	2018-02-25 05:26:01.49957
4	7	2018-02-25 05:26:01.49957
4	8	2018-02-25 05:26:01.49957
5	9	2018-02-25 05:26:01.49957
5	10	2018-02-25 05:26:01.49957
6	9	2018-02-25 05:26:01.49957
6	8	2018-02-25 05:26:01.49957
7	6	2018-02-25 05:26:01.49957
7	10	2018-02-25 05:26:01.49957
8	4	2018-02-25 05:26:01.49957
8	3	2018-02-25 05:26:01.49957
9	2	2018-02-25 05:26:01.49957
9	1	2018-02-25 05:26:01.49957
10	7	2018-02-25 05:26:01.49957
10	5	2018-02-25 05:26:01.49957
\.


--
-- Data for Name: likes; Type: TABLE DATA; Schema: public; Owner: auobnrfenbtijr
--

COPY likes (user_id, post_id, created_at) FROM stdin;
1	2	2018-02-25 05:26:01.275018
1	3	2018-02-25 05:26:01.275018
2	1	2018-02-25 05:26:01.275018
2	4	2018-02-25 05:26:01.275018
3	5	2018-02-25 05:26:01.275018
3	6	2018-02-25 05:26:01.275018
4	7	2018-02-25 05:26:01.275018
4	8	2018-02-25 05:26:01.275018
5	9	2018-02-25 05:26:01.275018
5	10	2018-02-25 05:26:01.275018
6	11	2018-02-25 05:26:01.275018
6	12	2018-02-25 05:26:01.275018
7	13	2018-02-25 05:26:01.275018
7	14	2018-02-25 05:26:01.275018
8	15	2018-02-25 05:26:01.275018
8	16	2018-02-25 05:26:01.275018
9	17	2018-02-25 05:26:01.275018
9	18	2018-02-25 05:26:01.275018
10	19	2018-02-25 05:26:01.275018
10	20	2018-02-25 05:26:01.275018
\.


--
-- Data for Name: posts; Type: TABLE DATA; Schema: public; Owner: auobnrfenbtijr
--

COPY posts (id, post, user_id, created_at) FROM stdin;
1	Only I can change my life. No one can do it for me.	1	2017-02-16 18:22:10.846
2	Life is 10% what happens to you and 90% how you react to it.	1	2016-02-21 11:12:32.574
3	Good, better, best. Never let it rest. Til your good is better and your better is best.	2	2016-06-24 19:36:30.978
4	It does not matter how slowly you go as long as you do not stop.	2	2017-04-30 13:26:14.496
5	With the new day comes new strength and new thoughts.	3	2016-08-07 16:25:48.561
6	Optimism is the faith that leads to achievement. Nothing can be done without hope and confidence.	3	2017-04-02 17:11:21.417
7	In order to succeed, we must first believe that we can.	4	2017-02-21 11:12:32.574
8	Failure will never overtake me if my determination to succeed is strong enough.	4	2017-02-02 11:12:32.574
9	Expect problems and eat them for breakfast.	5	2017-05-21 11:12:32.574
10	Always do your best. What you plant now, you will harvest later.	5	2007-02-21 11:12:32.574
11	The secret of getting ahead is getting started.	6	2017-02-11 11:12:32.574
12	It always seems impossible until its done.	6	2017-02-21 11:12:32.54
13	Quality is not an act, it is a habit.	7	2017-09-21 11:12:32.574
14	If you can dream it, you can do it.	7	2017-02-01 11:12:32.574
15	The past cannot be changed. The future is yet in your power.	8	2012-02-21 11:12:32.574
16	We may encounter many defeats but we must not be defeated.	8	2017-02-21 11:14:32.574
17	What you do today can improve all your tomorrows.	9	2017-02-27 11:12:32.574
18	A creative man is motivated by the desire to achieve, not by the desire to beat others.	9	2017-02-21 11:12:32.57
19	Keep your eyes on the stars, and your feet on the ground. 	10	2017-02-21 11:12:30.574
20	Problems are not stop signs, they are guidelines.	10	2018-02-09 11:12:32.574
\.


--
-- Data for Name: posts_tags; Type: TABLE DATA; Schema: public; Owner: auobnrfenbtijr
--

COPY posts_tags (post_id, tag_id) FROM stdin;
1	18
1	17
1	21
1	13
1	19
2	4
2	3
2	20
2	2
3	8
4	12
4	11
4	21
4	13
5	15
5	14
5	17
5	16
6	19
6	13
6	17
6	21
7	11
7	12
7	21
7	13
8	17
8	21
8	13
8	19
9	18
10	2
11	12
11	21
11	11
12	4
13	13
13	19
14	1
14	20
17	19
17	13
17	18
19	5
15	20
15	3
16	1
16	4
20	7
20	5
9	6
10	18
14	19
\.


--
-- Data for Name: tags; Type: TABLE DATA; Schema: public; Owner: auobnrfenbtijr
--

COPY tags (id, tag_name, created_at) FROM stdin;
1	sunset	2018-02-25 05:26:01.346797
2	postgraphy	2018-02-25 05:26:01.346797
3	sunrise	2018-02-25 05:26:01.346797
4	landscape	2018-02-25 05:26:01.346797
5	food	2018-02-25 05:26:01.346797
6	foodie	2018-02-25 05:26:01.346797
7	delicious	2018-02-25 05:26:01.346797
8	beauty	2018-02-25 05:26:01.346797
9	stunning	2018-02-25 05:26:01.346797
10	dreamy	2018-02-25 05:26:01.346797
11	lol	2018-02-25 05:26:01.346797
12	happy	2018-02-25 05:26:01.346797
13	fun	2018-02-25 05:26:01.346797
14	style	2018-02-25 05:26:01.346797
15	hair	2018-02-25 05:26:01.346797
16	fashion	2018-02-25 05:26:01.346797
17	party	2018-02-25 05:26:01.346797
18	concert	2018-02-25 05:26:01.346797
19	drunk	2018-02-25 05:26:01.346797
20	beach	2018-02-25 05:26:01.346797
21	smile	2018-02-25 05:26:01.346797
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: auobnrfenbtijr
--

COPY users (id, username, firstname, lastname, email, password, created_at) FROM stdin;
1	bernie	Ben	Paul	bernie@gmail.com	bernie123	2017-02-16 18:22:10.846
2	kevin	Kevin	James	kevin@gmail.com	kevin123	2017-04-02 17:11:21.417
3	johnd	John	Doe	johnd@gmail.com	johnd123	2017-02-21 11:12:32.574
4	suet	Sue	Carl	suet@gmail.com	suet123	2016-08-13 01:28:43.085
5	domy	Dominic	Purcell	domy@gmail.com	domy123	2016-12-07 01:04:39.298
6	katl	Kathy	Lyon	katl@gmail.com	katl123	2017-04-30 13:26:14.496
7	sandy	Sally	Andy	sandy@gmail.com	sandy123	2016-12-12 06:50:07.996
8	harryp	Harry	Potter	harryp@gmail.com	harry123	2016-08-20 02:19:45.512
9	ginw	Gin	Weasel	ginw@gmail.com	ginw123	2016-06-24 19:36:30.978
10	gavins	Gavin	Sanchez	gavins@gmail.com	gavins123	2016-08-07 16:25:48.561
\.


--
-- Name: comments_id_seq; Type: SEQUENCE SET; Schema: public; Owner: auobnrfenbtijr
--

SELECT pg_catalog.setval('comments_id_seq', 19, true);


--
-- Name: posts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: auobnrfenbtijr
--

SELECT pg_catalog.setval('posts_id_seq', 20, true);


--
-- Name: tags_id_seq; Type: SEQUENCE SET; Schema: public; Owner: auobnrfenbtijr
--

SELECT pg_catalog.setval('tags_id_seq', 21, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: auobnrfenbtijr
--

SELECT pg_catalog.setval('users_id_seq', 10, true);


--
-- Name: comments comments_pkey; Type: CONSTRAINT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY comments
    ADD CONSTRAINT comments_pkey PRIMARY KEY (id);


--
-- Name: follows follows_pkey; Type: CONSTRAINT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY follows
    ADD CONSTRAINT follows_pkey PRIMARY KEY (follower_id, followee_id);


--
-- Name: likes likes_pkey; Type: CONSTRAINT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY likes
    ADD CONSTRAINT likes_pkey PRIMARY KEY (user_id, post_id);


--
-- Name: posts posts_pkey; Type: CONSTRAINT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY posts
    ADD CONSTRAINT posts_pkey PRIMARY KEY (id);


--
-- Name: posts_tags posts_tags_pkey; Type: CONSTRAINT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY posts_tags
    ADD CONSTRAINT posts_tags_pkey PRIMARY KEY (post_id, tag_id);


--
-- Name: tags tags_pkey; Type: CONSTRAINT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY tags
    ADD CONSTRAINT tags_pkey PRIMARY KEY (id);


--
-- Name: tags tags_tag_name_key; Type: CONSTRAINT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY tags
    ADD CONSTRAINT tags_tag_name_key UNIQUE (tag_name);


--
-- Name: users users_email_key; Type: CONSTRAINT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_email_key UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: users users_username_key; Type: CONSTRAINT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_username_key UNIQUE (username);


--
-- Name: comments comments_post_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY comments
    ADD CONSTRAINT comments_post_id_fkey FOREIGN KEY (post_id) REFERENCES posts(id);


--
-- Name: comments comments_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY comments
    ADD CONSTRAINT comments_user_id_fkey FOREIGN KEY (user_id) REFERENCES users(id);


--
-- Name: follows follows_followee_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY follows
    ADD CONSTRAINT follows_followee_id_fkey FOREIGN KEY (followee_id) REFERENCES users(id);


--
-- Name: follows follows_follower_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY follows
    ADD CONSTRAINT follows_follower_id_fkey FOREIGN KEY (follower_id) REFERENCES users(id);


--
-- Name: likes likes_post_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY likes
    ADD CONSTRAINT likes_post_id_fkey FOREIGN KEY (post_id) REFERENCES posts(id);


--
-- Name: likes likes_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY likes
    ADD CONSTRAINT likes_user_id_fkey FOREIGN KEY (user_id) REFERENCES users(id);


--
-- Name: posts_tags posts_tags_post_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY posts_tags
    ADD CONSTRAINT posts_tags_post_id_fkey FOREIGN KEY (post_id) REFERENCES posts(id);


--
-- Name: posts_tags posts_tags_tag_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY posts_tags
    ADD CONSTRAINT posts_tags_tag_id_fkey FOREIGN KEY (tag_id) REFERENCES tags(id);


--
-- Name: posts posts_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: auobnrfenbtijr
--

ALTER TABLE ONLY posts
    ADD CONSTRAINT posts_user_id_fkey FOREIGN KEY (user_id) REFERENCES users(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: auobnrfenbtijr
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO auobnrfenbtijr;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO auobnrfenbtijr;


--
-- PostgreSQL database dump complete
--

