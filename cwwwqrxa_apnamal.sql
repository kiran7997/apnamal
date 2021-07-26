-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 23, 2021 at 03:43 PM
-- Server version: 10.4.19-MariaDB-cll-lve
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cwwwqrxa_apnamal`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `title_1` text DEFAULT NULL,
  `title_2` mediumtext DEFAULT NULL,
  `image` varchar(20) DEFAULT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `title_1`, `title_2`, `image`, `description`) VALUES
(1, 'Welcome to Apnamal.com', 'We are Apnamal.com We’re a young start-up that work for your needs in fitness and well-being. We deliver everything from genuine at honest prices.\r\nApnamal always try toprovide the best because we are nothing without you. You make us proud. We are helping thousands of People for their preparation.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '154', '');

-- --------------------------------------------------------

--
-- Table structure for table `action_recorder`
--

CREATE TABLE `action_recorder` (
  `id` int(11) NOT NULL,
  `module` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `success` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `address_book`
--

CREATE TABLE `address_book` (
  `address_book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `entry_gender` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customers_id` int(11) DEFAULT NULL,
  `entry_company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_street_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_suburb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_postcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_country_id` int(11) NOT NULL DEFAULT 0,
  `entry_zone_id` int(11) NOT NULL DEFAULT 0,
  `entry_latitude` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_longitude` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address_book`
--

INSERT INTO `address_book` (`address_book_id`, `user_id`, `entry_gender`, `customers_id`, `entry_company`, `entry_firstname`, `entry_lastname`, `entry_street_address`, `entry_suburb`, `entry_postcode`, `entry_city`, `entry_state`, `entry_country_id`, `entry_zone_id`, `entry_latitude`, `entry_longitude`) VALUES
(1, 1, NULL, NULL, NULL, 'Apnamal', 'admin', 'MDC Sector 5', NULL, '134109', 'Panchkula', '192', 99, 0, NULL, NULL),
(2, 22, NULL, NULL, NULL, 'Wave', 'Books', 'Wave Infotech Pvt Ltd Sco 44  Sector 5MDC Panchkula Haryana.', NULL, '134109', 'pkl', '182', 99, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `address_format`
--

CREATE TABLE `address_format` (
  `address_format_id` int(11) NOT NULL,
  `address_format` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_summary` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(11) NOT NULL,
  `home_right_1` varchar(255) DEFAULT NULL,
  `home_right_2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `home_right_1`, `home_right_2`) VALUES
(1, '219', '218');

-- --------------------------------------------------------

--
-- Table structure for table `alert_settings`
--

CREATE TABLE `alert_settings` (
  `alert_id` int(11) NOT NULL,
  `create_customer_email` tinyint(1) NOT NULL DEFAULT 0,
  `create_customer_notification` tinyint(1) NOT NULL DEFAULT 0,
  `order_status_email` tinyint(1) NOT NULL DEFAULT 0,
  `order_status_notification` tinyint(1) NOT NULL DEFAULT 0,
  `new_product_email` tinyint(1) NOT NULL DEFAULT 0,
  `new_product_notification` tinyint(1) NOT NULL DEFAULT 0,
  `forgot_email` tinyint(1) NOT NULL DEFAULT 0,
  `forgot_notification` tinyint(1) NOT NULL DEFAULT 0,
  `news_email` tinyint(1) NOT NULL DEFAULT 0,
  `news_notification` tinyint(1) NOT NULL DEFAULT 0,
  `contact_us_email` tinyint(1) NOT NULL DEFAULT 0,
  `contact_us_notification` tinyint(1) NOT NULL DEFAULT 0,
  `order_email` tinyint(1) NOT NULL DEFAULT 0,
  `order_notification` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alert_settings`
--

INSERT INTO `alert_settings` (`alert_id`, `create_customer_email`, `create_customer_notification`, `order_status_email`, `order_status_notification`, `new_product_email`, `new_product_notification`, `forgot_email`, `forgot_notification`, `news_email`, `news_notification`, `contact_us_email`, `contact_us_notification`, `order_email`, `order_notification`) VALUES
(1, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `api_calls_list`
--

CREATE TABLE `api_calls_list` (
  `id` int(11) NOT NULL,
  `nonce` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `banners_id` int(11) NOT NULL,
  `banners_title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banners_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banners_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banners_group` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banners_html_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expires_impressions` int(11) DEFAULT 0,
  `expires_date` datetime DEFAULT NULL,
  `date_scheduled` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `date_status_change` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `type` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banners_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners_history`
--

CREATE TABLE `banners_history` (
  `banners_history_id` int(11) NOT NULL,
  `banners_id` int(11) NOT NULL,
  `banners_shown` int(11) NOT NULL DEFAULT 0,
  `banners_clicked` int(11) NOT NULL DEFAULT 0,
  `banners_history_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `block_ips`
--

CREATE TABLE `block_ips` (
  `id` int(11) NOT NULL,
  `device_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `slug` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `image_id`, `description`, `cat_id`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'What is Lorem Ipsum?', 148, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 1, NULL, '2020-11-10 06:11:48', '2020-11-10 09:44:30');
INSERT INTO `blogs` (`id`, `title`, `image_id`, `description`, `cat_id`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'ADVANCE SKILL FOR COMMUNICATION -INTERVIEWS', 148, '1.SELF-INTRODUCTION\r\nLearning the Second Language is important as it is essential to every aspect and interaction in our everyday lives. Every sentence we use has the purpose of enabling second language learners to move beyond vocabulary and grammar to the functional aspect of communication. Being able to communicate with each other form bonds, teamwork, and it’s what separates humans from other animal species. Communication drives our lives and better ourselves. \r\nThe topics and the exercises of this text aim at enhancement of the learners’ communication skill. Let’s begin with ‘Self-introduction’ as “You only get one chance to create a first and best impression”.\r\nThe arrival of a new academic year brings a lot of energy and enthusiasm to students, teachers and parents (although in a different way) and it is high time to practise self introductions. Here, two ways of introducing oneself - in educational atmosphere and for career, are presented for practice as both are indispensable in one’s life. \r\n \r\n1.1. Introducing oneself  – in an educational  atmosphere\r\nTake the following communication as an example. \r\nModel 1: Here, Shiva is introducing himself at a volleyball camp: \r\nHi! My name is Shiva. I am 19 years old. I live in Sattur with my parents and brothers. I am a first year Computer Science student.  I am pursuing a Certificate Course in Communicative and Functional English after my college hours to improve my language skills. I like Programming and Mathematics. During weekends, I take dancing lessons, swimming and veena. I like puppies. My favorite colour is pink. My favourite food is masala dosa. I want to learn how to play volleyball better. Thank you. \r\nEach of the sentences in this self introduction has a grammatical structure. But, the message of Shiva is more than just subjects, verbs and objects. Each sentence has a purpose or topic. \r\nThe topics are: \r\n•	Hi - GREETING \r\n•	My name is Shiva. – NAME\r\n•	I am 19 years old.  - AGE \r\n•	I live in Sattur with my parents and brothers – WHERE YOU LIVE & FAMILY \r\n•	I am a first year Computer Science student. \r\nI am pursuing a Certificate Course in Communicative and Functional English after my college hours to improve my language skills – CLASS & DISCIPLINE\r\n•	I like Programming and Mathematics. – SUBJECTS \r\n•	During weekends, I take dancing lessons, swimming and veena. – HOBBIES \r\n•	I like puppies. – ANIMALS\r\n•	My favorite colour is pink- COLOUR\r\n•	My favorite food is masala dosa. - FOOD \r\n•	I want to learn how to play volleyball better. – PURPOSE FOR BEING AT CAMP\r\n•	Thank you.- CLOSING \r\nOnce the students are clear about the purpose or topic of each sentence, they can choose which words to say by using the topic as cues to CHOOSE their own words to deliver the message.\r\nSome cues for each topic are given below for your use.\r\n1.GREETING		 \r\nHello 		       Hi 				\r\nGood day 	      Good morning 		Good afternoon 		Good evening \r\n2.NAME, AGE and WHERE YOU LIVE\r\nI am __________________________. (I am in my twenties / I am nineteen.)\r\nI live in 				I am from 			I come from \r\n3.FAVOURITES / FOOD\r\nI like 					I enjoy 			I am fond of \r\nI love 					I find _____________________ enjoyable 		\r\nMy favorite food is ____________________________\r\n4.HOBBIES / COLOURS \r\nI like 					I enjoy 			I am fond of \r\nI love 					I find ___________________ enjoyable 		\r\nMy favorite colour is ________________________\r\n5.FAREWELL \r\nThank you.  I hope to talk with you soon (or) I hope to meet you again soon. \r\nSelf introductions can also be expanded into other activities throughout the year so that this vocabulary is recycled and new vocabulary integrated. Students can talk about: greeting, name, age, where they are from, food, animal, music, hobbies/sports, family, closing with more confidence and speed.  It gives them a chance to reveal how much they can say about themselves at one time.\r\nModel 2: Most of the self introduction is in the “I” form. By using each topic cue to make a question, the series can easily be converted into an interview. \r\ni. Student A asks the question encouraged by the topic cue and Student B answers the question. \r\nii. From the information collected during the introductory session in a college, Student A can now introduce Student B to another student C (and vice versa). \r\nFor example: Introducing one’s friend\r\n(Student A) Soniya:   Hi Praveena. This is Rita. She is 19 years old. She is a first year Maths student. She likes curd rice and vegetable biriyani. She loves pet animals. Her mother gifted a puppy for her birthday. Her favorite colour is green. \r\n(Student B) Praveena: Nice to meet you, Rita. \r\n1.2. Self-introduction – for career\r\n	Self-introduction during an interview is a crucial one in any networking situation. It is both a personal and professional communication skill that is needed in your everyday life. Think about how you can use this short period of time to not only introduce yourself but also convey something about who you are and what you do. \r\nWhen you introduce yourself, it is not for anyone else\'s benefit but YOURS!  In brief, self-introduction is marketing your skills. First impressions count a great deal in an interview. \r\nA job interview is a tough competition with one or a few winners. And the manner in which you introduce yourself in an interview will be remembered so much so that it might be the deal breaker. Self introductions are a natural oral form that help to assess the workers’ confidence, vocabulary, grammar and attitude, and also help the employers  get to know them. Here are  some tips for introducing yourself. \r\n1. Dress appropriately and be perfectly groomed. These are things over which one can have control, so make the most of them. Since first impressions count, introduce yourself with style before you even open your mouth.\r\n2. Walk into an interview confidently. Avoid slouching, slumping or crossing your body with your arms. You are going to win, so face them with confidence.\r\n3. Greet your interviewers immediately. Offer your hand for a handshake, make eye contact and smile. \r\n4. Open your interview with a comment about being pleased to have the opportunity to be interviewed by the firm or organization. Thank the interviewers for the opportunity. This should be brief, genuine and not flowery.\r\n5. When asked to sum up who you are, be ready for such a question. \r\nHow would you describe yourself?  Write a list now and remove non-job related qualities to arrive at your list for a job interview. Craft this into a neat, short reply that sums up who you truly are. \r\n•	When asked questions at the start about why you want the job, be prepared with an interesting and genuine statement. \r\n6. Enjoy the rest of your interview. If you\'ve made a good impression by this point, the rest is simply about displaying your knowledge and your confidence level should be boosted.\r\nPoints to remember before you attend this interview question i.e. introducing yourself:\r\n•	Assume, now you are sitting in front of the HR manager.\r\n•	Take the initiative to attend this question and tell your real answers.\r\nPrepare your answer as per THE USUAL PROCEDURE –\r\n1.	Your name (spell out your name clearly) and place  (where you are living)\r\n2.	Your current educational status (PG / UG with the name of the institution and percentage you have scored)\r\n3.	Your Plus Two  and Tenth (place where you studied) with percentage\r\n4.	Your co-curricular activities (related to your Subject)\r\n5.	Your extra-curricular activities (apart from regular class hours)\r\n6.	Awards / trophies / distinctions won by you for academic excellence if any\r\n7.	Reasons for choosing the discipline in your education\r\n8.	Your interests and hobbies\r\n9.	Family particulars (Father, Mother, Brothers, Sisters, Spouse, Children)\r\n10.	Employment history and reasons for leaving each employment.\r\n11.	Achievements in each employment.\r\n12.	Reason for quitting employment now.\r\n13.	The languages  you know (speak, read and write)\r\n•	Answer 9 only if asked (Details of family).  If you are asked to tell them about your family, then say about your family members. Otherwise, there is no need.\r\n•	Answer 10 to 12, only if you have previous working experience.\r\nCaution\r\n1.	Do not talk ill of your family members, faculties in institutions, past employers.\r\n2.	Do not sit on the edge of the chair while answering.\r\n3.	Look into the eyes of the interviewer while answering.\r\n4.	Remember to say ‘sorry’ if your opinions or answers are rejected.\r\n5.	Don’t say anything about the field which you are not interested. For example, if you have\r\nno interest in technical skills, don’t  make a mention of it in self-introduction.\r\n6.	If you have finished your presentation, just hang up. Do not answer beyond what you have already said even if the interviewer has not shot his next question.\r\n7.	Say ‘Thank you’ at the last part of the interview to every interviewer before leaving the room.\r\n8.	Don’t look back and walk out confidently after shutting the door gently behind you.\r\nBefore you attend the interview, thoroughly make enquiries of the organization, their business, special matters etc.  as they may ask for what you  know about their company. Just feel free and be at ease. Display assertiveness while introducing yourself. Do not use very difficult English words. Make it plain and simple. Be honest and truthful because you can be grilled on any word uttered by you. \r\nRehearse \"self-introduction\" in front of mirror everyday till you achieve mastery.\r\nModel Self-introduction\r\nSome samples are given below for the learners’ reference. Go through each and every sample and prepare a self-introduction highlighting your abilities and skills.\r\nSAMPLE 1 : Introduce yourself briefly.\r\nGood morning Sir.\r\nMy name is Seenu; I am from Madurai. \r\nI completed my PG and UG Micro-biology in GT College, Madurai.\r\nI completed my schooling in T.V.S. Hr. Sec. School, Madurai.\r\nMy hobbies are drawing, painting and listening music.\r\nMy aim is to do a good job in Micro-biology industry and I would like to help my country to develop economically. \r\nThank you Sir.\r\nSAMPLE 2:  May I know something about you and your family?\r\nGood morning Madam.\r\nI am Nita from Mumbai.\r\nI have completed M.A., History from loss angle, Mumbai.\r\nIn my family, there are 4 members including me. My father is a retired Clerk and my mother is a home maker. I have one elder brother.\r\nMy hobbies are cricket, listening songs and surfing net.\r\nMy strength is - I’ m a self- confident quick learner and I don’t give up easily.\r\nMy weakness is – I am somewhat lazy but I am trying to do my work faster now.\r\nMy aim is to place in any organization where I can upgrade my knowledge. \r\nThank you Madam.\r\nSAMPLE 3: Introducing you and your family\r\nIt\'s my pleasure to introduce myself and thank you for giving this golden opportunity to me.\r\nI\'m  N.Sandeep  from Visakhapatnam.\r\nAbout my academic qualification:\r\nNow I am doing B-Tech final year.\r\nI completed my +II from Palayamkottai with 85% marks. \r\nI did my tenth in Government High School from Tirunelveli with 95%. \r\nAbout my family:\r\nMy family consists of 5 members including me. I am the eldest. My father is  a Government employee and my mother is a home maker. My brother and sister are busy with their studies.\r\nMy hobbies are listening to music, painting, and reading books.\r\nAbout my strength: \r\nPositive thinking, being optimistic, and self-confidence boost me up always.\r\nMy weakness:\r\nI am believing people very easily and I never feel happy until I finish my work.\r\nMy short term goal is to complete my degree.\r\nMy long term goal is I want to become a great programmer.\r\nThank you very much Sir.\r\n SAMPLE 4: Introducing yourself\r\n\r\nGood morning(at  first meeting even at evening /afternoon  )Madam/Sir,\r\n\r\n                       \r\nFirstly I would like to thank you for giving me an opportunity to introduce myself.\r\nMy name is Anu. My native place is Jaipur.\r\nNow, I am pursuing (doing) B.A., Economics in M T N College, Madurai.\r\nI did my schooling from M. L. Higher Secondary School in my native place. \r\nMy strength is self confidence. I am a positive thinker.\r\nMy weakness is I never feel comfortable until I finish my work.\r\nI am a fresher so you can melt me as your requirement.\r\nMy goal is to work in a group where I can get knowledge related to my field and my skill is useful for the organization.\r\nThank you Madam.\r\nSAMPLE 5: Tell me about yourself and your family.\r\nGood morning Sir.\r\nIt\'s my pleasure to introduce myself.\r\nMy name is Albert Suresh. My native is Chennai. I am a fresher.\r\nAbout my qualification: \r\nI have completed my M.A., English with aggregate of 65% in 2012. I did my schooling with 66% in 12th   standard and 65% in 10th standard in N M V Higher Secondary School, Salem.\r\nMy technical skills are C, C++, HTML and XML.\r\nAbout my family, \r\nMy family consists of 4 members including me, my father - a Business man, my mother – a Dentist and my elder brother - a worker in Sutherland Global Service.\r\nComing to my hobbies, \r\nMy hobbies are like playing table tennis, making new friends, watching movies a lot and listening to songs. I have done some short films too.	\r\nTo say about my Working Experience, \r\nI worked as a Part-Time Educational consultant in a Consultancy, when I was doing my under graduation (UG). \r\nMy greatest strength is I don\'t give up easily. I am cool, calm and very friendly. I am very broad minded and   hardworking too. I\'m also a quick learner.\r\nMy weakness is my laziness, and believing others easily. \r\nI never feel comfortable until I finish my work in time.\r\nAbout my professional interest:\r\nMy short term goal is to complete my degree and to get  a good job in a famous company \r\nlike yours, where I can upgrade my skills and  knowledge efficiently.\r\nMy long term goal is to reach a respectable position in a company where I am working, in which they never want to lose me at any cost.   \r\nRegarding languages\r\nI know English and Tamil very well. I can read Hindi. \r\nThank you Sir.         \r\nNote:  \r\nIf your educational qualification is one discipline, but you attend interview for another related discipline, what to do? \r\nFor example, your educational qualification is IT based one.  But you are attending an interview for BPO.  \r\nThey may ask, “Why do you prefer BPO to IT? \r\n At such occasions, reply like this:\r\n I believe in this quote. \"The real success is in finding a work which you love.” \r\n I love working in BPO. So I am here and I believe that here I can upgrade and  \r\n enhance my knowledge.                       \r\nOther related questions such as –\r\n    i.  What are your goals?\r\n   ii.  How do you feel about working nights and weekends?\r\n  iii.  Tell me honestly about your strong points and weak points. Sometimes, the strong and \r\n        weak points of your previous working place (your boss, management team etc.) might \r\n        be asked.\r\n   iv. What was the toughest challenge you have ever faced?\r\n    v. Why did you resign from your previous job? \r\nare also to be prepared and answered with care.\r\nSelf- introduction is really necessary for any job and this text will help you to prepare yourself  for any kind of interview and it also shows you the shortest and smartest way to build up your self- introduction and gives you confidence.\r\n1.4. Introducing oneself in a Telephonic Conversation:  Start  any telephonic  conversation \r\nby introducing yourself. The person who makes a call is referred to as ‘caller’ and the other person who attends the call is mentioned as ‘receiver’ here.\r\nSample 1: When the receiver attends and answers the caller directly:\r\nCaller     :  Hello! This is John (or) It’s John calling.\r\nReceiver:   Good morning John. \r\n                  Maya speaking.  Is there any news?\r\nCaller     :  Yes. This is just a reminding call.\r\nReceiver:   For what?\r\nCaller     :  Today at 4 p.m., we have a meeting in our conference hall.\r\nReceiver:   Don’t worry. I remember it. I will be there sharply at 4 p.m.\r\nCaller    :   Okay. Would you make a call when you go there?\r\nReceiver:   Certainly. Any other…..?\r\nCaller     :  No, please.\r\nReceiver:   Okay. Thanks for calling.\r\n                  Bye for now. \r\nSample 2: The caller doesn’t introduce himself. The person whom the caller wants to speak is not there. When some other person attends the call:\r\nCaller      :  Hello!\r\nReceiver :   This is Raj.\r\n                   May I ask / know who is calling please?\r\nCaller      :  Oh, I’m Suresh.\r\n                   Your brother Vivek’s friend.\r\nReceiver :   Hello. Vivek is not here at the moment. Any message for him?\r\nCaller     :   No, thanks. Please inform him about my call. I will call him again in the afternoon.\r\nReceiver :   Oh, yes. May I hang up now?\r\nCaller      :  Okay. Thank you.\r\nReceiver :   You’re welcome.\r\nWORKSHEET \r\n1.	Assume you are attending an interview for a famous company in a city. Introduce yourself \r\nto your employer highlighting your skills.\r\n2.	Introduce yourself to your class teacher on the first day of your college studies.\r\n3.	Draft a telephonic conversation in which the receiver attends and answers the call directly.\r\n4.	Draft a telephonic conversation in which the caller’s call is attended by some other person.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n2. ENGLISH FOR ETIQUETTE\r\n                             “What is the purpose of (formal) communication?”\r\n             Before entering any institution or organization, certain communicative abilities are looked for in the learners by the higher authorities and employers. Ability to speak, conduct oneself properly in an interview, get along with others, listen carefully and  accurately, make effective presentation, prepare good yet brief report, make proposals, sell ideas, convince and influence others are some of the qualities looked for in the learners before they are appointed. All these activities require effective communication skills.\r\n So, communicative abilities are to be mastered or trained by each and every individual in his / her learning period itself to achieve in career.\r\n2.1. GREETING\r\n \r\nIn this chapter, we will look at samples of some common functions in English and the language used to perform them. You can practice the expressions both alone and with your classmates in order to use them with skill and confidence when speaking English. Let’s start with different ways of introducing oneself and others. Whether you are at college, with friends, or in business, introducing oneself is an everyday occurrence and it is an important skill to master. 	\r\nHere are some easy steps on how to greet the people you meet in a sincere and open way. \r\nSome of the common expressions of greeting are given below:\r\n1.	Hi, Megha! How’re you? /\r\n2.	Hi, how do you do?\r\n3.	Hello, Ram! Nice to meet you again.\r\n4.	Hello Ram! Nice to meet you after so long.\r\n5.	How / Very nice to see you again!\r\n6.	Good morning / afternoon / evening.\r\n7.	Hi / hello, everybody.\r\n8.	Good morning, everybody.\r\n9.	How’re you getting on?\r\n10.	How’s life? \r\n11.	What’s the latest? \r\n12.	 What’s up?\r\n13.	I hope you’re keeping well.\r\n14.	I hope all goes well with you.\r\nExpressions like ‘Hi’ (pronounced ‘hai’) and ‘Hello’ are used in informal contexts with friends and equals. ‘Hello’ is used with colleagues and other acquaintances also. \r\nThe last two are very formal and can be used with people who are senior in age, position, etc. \r\nThe different use of expressions depends on the degree of intimacy with the person you are talking to.\r\n \r\n\r\nLook at some expressions used to greet people and to take leave of them. Read each of them and repeat it. Note the use of contracted forms such as ‘I’m’ for ‘I am’ and ‘you’ll’ for ‘you will’.\r\nCommunication Activity: Greeting and taking leave - Groupwork\r\nPractise the following Pattern in Pairs till you are familiar with words / sentences in bold letters.\r\nModel 1: Informal: Casual talk between friends\r\nMadhavan	: Hi, Ram!\r\n   Ram	 	: Hello, Madhava! Nice to meet you after so long! How are you?   \r\nMadhavan	: Fine, thank you. How’s life with you? \r\n    Ram		: Just the same. By the way, when is your college reopening?\r\n    Madhavan	: After two weeks. Do you have any plans?\r\nRam		: Nothing in particular. What about going to film?\r\nMadhavan	: That’s fine. Let’s go for the first show. We’ll call Raju and Seenu also.\r\nI must hurry now, or I’ll miss my bus. We’ll meet at the theatre. Bye.\r\nRam		: Bye, bye ! Have a nice day.\r\n Model 2: Informal: Two friends meeting on the way and leaving without delay\r\n    A:	Good morning, how are you?\r\n    B:	I’m very well, thank you. What about you?\r\n    A:	I’m fine. Shall we have a cup of coffee?\r\n    B:	No, thanks. I am on my way to pick up my sister waiting at her school gate. \r\n            See you later.\r\n    A:	When?\r\n    B:	Tomorrow evening.\r\n    A:	Okay, bye.\r\n Model 3: Formal: Two Colleagues meeting on the way and parting instantly\r\n   A:     Good morning. We haven’t met for quite some time, have we?\r\n   B:	Yes. Indeed, it’s a pleasure to see you.\r\n   A:	I was nice meeting you, but I’m afraid I have to go now.\r\nI must leave. I hope you’ll excuse me.\r\n   B:	That’s quite all right. I hope we can meet again soon.\r\n   A:	Yes, we must.\r\n   B:	Yes, I hope so too.\r\n   A:	Yes, please do come over.\r\n   B:	Bye, bye.\r\nModel 4: Formal: Mr.Anand meets Anita, a teacher in his neighbourhood at a bookstore.\r\nAnita	: Good morning Sir. How’re you?\r\nMr.Anand    : Good morning Anita. I’m very well, thanks. What about you?	\r\nAnita	: I’m fine, thank you.  \r\nMr.Anand    : How is your new college?	\r\nAnita	: It’s good sir. I enjoy teaching there. This college has proper classrooms, \r\n                       laboratories and a good library. \r\n                       It is totally different from my previous working place.\r\nMr.Anand    : At last, you’ve found a place where you would like to work.	\r\nAnita	: Yes sir. I’m happy about that.\r\nMr.Anand    : My wife wants to talk with you. Come to our home one day with your mother. \r\nAnita	: Sure sir. It’s almost time for my coaching class. \r\nMr.Anand    : Oh, it’s all right. See you later. Bye.	\r\nAnita	: Bye sir.\r\nWORKSHEET\r\n1.	Write five different ways of informal and formal greeting (each five). \r\n2.	Imagine that you and your classmates meet your Professor on the way to your class. He / She calls you to give some instructions. How will you greet him / her? How will you take leave? (Write atleast two each).\r\n2.2.INTRODUCING\r\nThe way you introduce and present yourself provides people with a first best impression of you. Most people begin forming an opinion of you within 3 seconds and these judgements can be difficult to change.\r\n       When we introduce ourselves to someone, we\'re saying we\'re interested in establishing some sort of ongoing rapport for mutual benefit. There are 3 parts to our introductions:\r\n•	the handshake (often, but not always)\r\n•	introducing yourself\r\n•	moving into conversation\r\nThe first impression can be the difference between starting a successful business relationship or finishing with a one-off meeting. It is very easy to make a negative first impression on someone, often without knowing we’ve done so. It’s much harder to make a positive impression, so you must put some effort into your introductions.\r\nModel 1: Introducing oneself\r\n   Some of the common ways of introducing oneself are given below \r\n	  1.  Good morning. I’m Rajesh from IIT, Chennai.\r\n	  2.  Excuse me. I’m ......................................from..................................\r\n	  3.  Excuse me. My name is ………….………… . I’m from ……….…………\r\n          4.  I’m the new student ………….……. I’m from ……….…………\r\n          5.  Good morning. I’m  ………….…………from ……….…………\r\n               I have just joined this department of Micro-biology (mention your department).\r\n \r\n                                                                  Source: www.wikihow.com\r\nCommunication Activity: 4 students in each team\r\nThe team will introduce themselves first individually.\r\nKarthik	: I’m Karthik. I am a first year Computer Science student. I come from Sattur.                     \r\nRavi		: I’m Ravi. I am a first year Literature student. I am a day-scholar.\r\nDheena	: I’m Dheena. I’m a first year Economics student. I am a hostellite.\r\nDeva	: I’m Deva. I’m a first year Commerce student. I come from my grandpa’s \r\n                       home in Virudhunagar. \r\nThe whole class should practice this Pattern individually with 4 students in each team. They should tell about their name, their class, department and place of living when introducing them to their team. It would be better if they start with a greeting like “Good morning friends”.\r\n   Model 2: Introducing others\r\n    Some of the common ways of introducing others / someone else are the following:\r\n1. This is Mr. / Ms………….\r\n2.  Meet my friend / brother / sister………..\r\n3.  Do you know my father…………?\r\n4.  Please meet Mr. / Ms………….         (Ms is pronounced ‘Miz’)\r\n5.  May I introduce my teacher…………….?\r\n6.  Let me introduce …………..\r\n7.  I’d like to introduce my mother ………..\r\n         8.  I’m sure you’d like to meet …………\r\nTo introduce others, the same team will be given practice first by introducing them and then others one by one. \r\nKarthik     : I’m Karthik. I am a first year Computer Science student. I come from Sattur.\r\nRavi	         : This is Karthik. He is a first year Computer Science student. He comes from  \r\n                   Sattur.\r\n                   I’m Ravi. I am a first year Literature student. I am a day-scholar.\r\nDheena     : This is Karthik. He is a first year Computer Science student. He comes from      \r\n                   Sattur.\r\n                   That’s  Ravi. He is a first year Literature student. He is  a day-scholar.                      \r\n                   I’m Dheena. I’m a first year Economics student. I am a hostellite.\r\nDeva        : This is Karthik. He is a first year Computer Science student. He comes from      \r\n                   Sattur.\r\n                   That’s  Ravi. He is a first year Literature student. He is  a day-scholar.                      \r\n                   He’s  Dheena. He is a first year Economics student. He is  a hostellite.\r\n                   I’m Deva. I’m a first year Commerce student. I come from my grandpa’s \r\n                   home in Virudhunagar. \r\nThe whole class should practice this Pattern in team. \r\nPractise the following in Pairs\r\nIntroducing your friend to your mother:\r\n    Nita     	: Latha, this is my mother. Ma, meet my friend Latha.\r\nMother  	: Hello, Latha. How are you?\r\nLatha	: I’m fine, thank you.\r\n   Mother	: Nita quite often talks about you. Why don’t you come home one day? \r\nLatha	: I’ll come on a holiday. Thank you, Aunty.\r\nWhen two people are introduced to each other, mention the senior person first.\r\nModel 3. Introducing the Chief Guest (who has come to honour the winners of the departmental competition) to the audience: (Fill the needed details of the Guest for the underlined words)\r\nFriends, let me introduce (or I am glad to introduce) our Chief Guest of the evening Ms.G.Thilakavathi. As you all know, she is the first woman Indian Police Service (IPS) Officer from Tamilnadu. She is also a famous short story writer. Her short story  Arasigal aluvathillai  won  the  Government of Tamil Nadu\'s best short story prize for 1988-89. She was awarded Sahitya Academi Award for Tamil for her novel ‘Kalmaram” in 2005.  She has been promoted to Director General of Police and is currently the chairperson of the Uniformed Services Recruitment Board. We feel highly elated and privileged to welcome you Madam to our Programme.\r\nModel 4. Introducing yourself to a VIP who has come to inaugurate Sports Meet: (Write about you in the place of underlined words)\r\n   Good morning Sir. I’m Rita, a final year PG Mathematics student of V.H.N.Senthikumara Nadar College (Autonomous), Virudhunagar. I am also the Student Representative of  our College. It is my pleasure to invite you to our College Sports Meet.\r\nWORKSHEET\r\n1.	Assume your friends Jay and Allan has come to your home. Introduce them to your parents.\r\n2.	Assume you are the representative of your class. Your department has arranged for UG Literary Association Meet. Introduce the Chief Guest to the audience.\r\n3.	Presume you are the compere of Youth Festival 2015 in your college. You are one among the group that welcomes the VIP who has come to deliver a lecture and distribute the prizes. Introduce yourself to the VIP.\r\n2.3.CONGRATULATING / COMPLIMENTING\r\nCongratulation is an expression of joy in the success or good fortune of another. The prefix \"con\" means \"with.\" When we congratulate someone, we are rejoicing \"with\" someone. So, blessings overflow from them to us. So the person who congratulates is to be blessed immeasurably; perhaps sometimes even more than the person you are congratulating.\r\nWhen we congratulate others for their accomplishments, we too, will soon have something to be congratulated for. Indirectly, we are investing in their success. We make ourselves part of their celebration. When we congratulate them and give to their cause, we open the windows for the success of our own cause. Congratulate and be \"with\" others in their success. Then when it is your turn, people will be with you.\r\nWe congratulate and compliment people on various occasions such as marriage, getting a rank or promotion, winning an election or a prize, etc. \r\nThe following are some common expressions to congratulate others.\r\n	1. Congratulations! / Congrats! / My hearty congratulations!\r\n	2. Hearty congratulations / Congrats on…!\r\n	3. It was nice to hear that you have got success in…………\r\n	4. What a wonderful / superb performance. Hearty congrats!\r\n	5. Let me congratulate you on……..\r\n	6. I’d like to congratulate you on …….\r\n        7. May I congratulate you on your …….\r\n \r\nSome common expressions used for complimenting others are given below.\r\n1. That’s a nice dress (you are wearing)\r\n2. You look smart / You’re looking very smart.\r\n3. The sweet you have made is absolutely delicious.\r\n          4. That’s nice.\r\n          5. My compliments on your delicious preparation.  \r\n          6. Well done! / Very well done! Keep it up!\r\n          7. You really deserve this honour.        \r\n          8. We are proud of you.\r\n \r\nRespond Congratulations / Compliments with\r\n          1. Thank you (for saying so).\r\n          2.  Oh, thanks, not really.\r\n          3.  I am glad you like it.          \r\n          4.  It is very good of you to say so.\r\nCommunication Activity: Congratulating/Complimenting and responding- Groupwork\r\nPractise the following in Pairs \r\nModel 1: Congratulating your friend on winning a championship:\r\n	Rakesh	: Rajeev, I’ve won the championship in athletics. Here’s the cup.   \r\n	Rajeev	: Well done, my friend! You deserve it. Hearty congrats!\r\nModel 2: The Principal congratulating a student for being one among the winners:\r\n	Principal : Divya, I’m happy to congratulate you for  bagging the State Level  Rank \r\n                          in National Talent Search Examination.\r\n	Divya	   : Thank you, madam.\r\n	Principal :You’ve brought glory to your college. My heartiest congratulations!\r\n	Divya	   :Thank you very much, madam. Your constant encouragement helps me \r\n                         a lot.\r\nModel 3: Sathish’s article on ‘Conservation of Natural resources’ wins the first prize in an international competition organised by UNESCO. His thesis Supervisor and Coordinator Dr. Ranjan congratulates him on his achievement.\r\n	Dr. Ranjan: Sathish, I have just heard the wonderful news. Congratulations on your \r\n                            remarkable achievement.\r\n	Sathish	     :  Thank you very much Sir. \r\n                             It’s all because of the encouragement and help that I have always got      \r\n                             from you.\r\n         Dr. Ranjan: Not entirely. It is the result of your own hard work. You really deserve \r\n                             this honour. Everyone of our department is really proud of you. I’m \r\n                             sure you will keep up the good work.\r\n         Sathish      : Thank you, Sir. It’s very kind of you.\r\nWORKSHEET\r\n1.	Congratulate your Boss on his promotion.\r\n2.	Congratulate your friend on winning the Best Student Award.\r\n3.	Compliment your sister’s new hair style.\r\n4.	Compliment your mother’s delicious preparation for the celebration of your birthday.\r\n\r\n2.4.REQUESTING\r\nThe common expressions of request are listed below:\r\n	  1. Could you help me please?\r\n	  2. Can I help you?\r\n	  3. Can you please lend me your pen?\r\n	  4. Can you do me a favour?\r\n          5. Do you mind helping please?\r\n	 6. Will / Would you please help me?\r\n	 7. I’m sorry to trouble you, but I need your help.\r\n             8. If you don’t mind, please help me? \r\nThe first four are informal, used when you talk with your friends and equals. The rest are rather formal and polite, used when you talk with superiors.\r\n    Some samples are given below:\r\n    Model 1:  In a Hotel\r\n	Keerthi :  Can you please serve some more rice?\r\n	Server 	 :  Yes, Madam. Anything else?\r\n	Keerthi :  Yes. Please get me a plate of mutton curry  in a parcel. \r\n	Server	 :  Okay, ma’am.\r\nModel 2: In the classroom\r\n	Shiva    : Could you please lend me a pen? Mine doesn’t write.\r\n	Raj	 : Sorry, I have only one pen with me.\r\n	Shiva    : Do you have a pencil?\r\n	Raj       : Sorry, I don’t have a pencil either.\r\n2.5. ACCEPTING / DECLINING AN INVITATION\r\n \r\nThe following are the expressions commonly used for inviting:\r\n	1. I would like to invite you for my birthday party.\r\n	2. Won’t you please accept my invitation for housewarming ceremony.\r\n	3. We are pleased to invite you for my wedding.	\r\n        4. We are delighted if you attend the party.\r\n	5. Please accept our invitation for family get-together.\r\nAn invitation has to be graciously accepted or declined.\r\ni) Accepting an invitation: \r\n	1. With pleasure.\r\n        2.  Okay / All right. \r\n	3. Thank you. I would be happy to.\r\n	4. That’s nice idea. Thank you.\r\n	5. We would be delighted to.\r\n	6. We would love to. Thank you.\r\n \r\nii) Declining an invitation:\r\n	 1. No, thank you. \r\n	 2. Thank you very much, but I have some important work.\r\n	 3. I am sorry. I can’t.\r\n	 4. I wish I could, but I can’t.\r\n	 5. I regret (feel sorry) that I’m unable to accept your invitation.\r\n	 6. Unfortunately I’m not free. But, thank you very much for your invitation.\r\nModel 1: Invitation to a birthday party (Accepted):\r\n	Riya	  :  My baby’s birthday is on 16th. Please join us  with  your family for the \r\n                          birthday party at 6 in the evening.\r\n	Reshma :  With pleasure. \r\nModel 2: Invitation to lunch (Declined):\r\n	Ravi	: Please join us for lunch.\r\n	Raj	: No, thank you. I just had my lunch.\r\nWORKSHEET\r\n1. You are in need of a pen. Write down five different expressions of request for a pen to your friend.  \r\n2. Your friend has come to invite you for her birthday party. Write down 5 different expressions of accepting and declining her invitation (each 5).	\r\n2.6. EXPRESSING GRATITUDE\r\nExpressions of gratitude are of great importance in our day to day life in many occasions. \r\n \r\n                                                                                          Source: www.karangandhi.org    \r\nThe most common expressions of gratitude are:\r\n         1. Thanks. / Thanks a lot.\r\n	 2. Thank you very much.\r\n	 3. I am happy to express my thanks to you.\r\n         4. That is indeed nice / kind of you.\r\n	5. I’m really grateful / obliged to you for your help.\r\n	6. I really can’t find words to express my thanks.\r\n	7. I / We would like to express my / our gratitude for your kind help.\r\nThe first three are more informal and the rest are often used in formal speeches or writing.\r\nRESPONSE TO SUCH EXPRESSIONS OF GRATITUDE:\r\n	  1. Welcome.\r\n	  2. You’re welcome.\r\n	  3. That’s okay. / all right.\r\n	  4. Please don’t mention it.\r\n	  5. No mention please.\r\n	  6. My pleasure.\r\n	  7. It was a pleasure.\r\n	  8. Glad I was able to help.\r\nModel 1:\r\n  Sita       	: Could anybody lend me a pen?\r\n  Reshma	: Take this. I’ve an extra one.\r\n  Sita	            : Thanks, Reshma.\r\n  Reshma	: That’s okay.\r\nModel 2:\r\n    Ram	: Time please.\r\n    Tom	: Half past one.\r\n    Ram	: Thank you.\r\n    Tom	: You’re welcome.\r\n2.7.APOLOGISING\r\nIt is good manners and courtesy to ask for apology during some occasions, for example, when you are late to your work, unable to keep your word, forget some important thing, etc. \r\n \r\n                                                                                           Source: www.slideshare.net \r\nCommon expressions of apology and response are given below.\r\n	1. Sorry.\r\n	2. I’m so / really / very / extremely sorry for being late to the class.\r\n	3. Excuse / Pardon me for forgetting my ID card.\r\n	4. Please forgive me for not keeping up my promise.\r\n	5. Please accept my apology for my harsh words to you.\r\nRESPONSE TO APOLOGY:\r\n	1. That’s okay / all right.\r\n	2. Please don’t worry.\r\n	3. It doesn’t matter at all.\r\n	4. Forget it. / Let us forget it.\r\n	5. Don’t feel bad about it please.\r\n	6. No need / reason to apologise.\r\n   Model 1: In the classroom of a college\r\n	Teacher     : Vasu, read the first paragraph in Page 10.\r\n	Vasu          : I’m really sorry Mam. I didn’t have the text book.\r\n	Teacher      : Why?\r\n         Vasu          : I gave the book for binding. They will give the book tomorrow only.\r\n                             Pardon me Mam.\r\n        Teacher      : All right. Bring the book tomorrow.\r\n Model 2: Apologising for interrupting\r\n	Attender    : Excuse me, madam. Phone call for you from a parent.\r\n	Teacher     : (to the students) Excuse me.\r\n                             (to the Attender) Ask them to phone me after this hour.\r\n2.8.SEEKING, GRANTING, REFUSING PERMISSION:\r\nThe common expressions for (a) Seeking permission, (b) Giving permission and (c) Refusing permission are the following:\r\n(a) Seeking permission:\r\n	1. May / Can / Could I go out please?\r\n	2. Do / Would you mind if I go out please?\r\n	3. Is it all right if I go out?\r\n	4. If you don’t mind, I would like to read newspaper now.\r\n(b) Giving permission:\r\n	1. Certainly you may.\r\n	2. By all means.\r\n	3. Yes, of course.\r\n	4. Go ahead.\r\n	5. It is perfectly all right / okay.\r\n	6. You can / may if you want.\r\n(c) Refusing permission:\r\n	1. I am sorry; I cannot allow you to go out.\r\n	2. I’m afraid it is not possible.\r\n	3. I’m sorry; I am not supposed to permit you.\r\n	4. No, you can’t / may not.\r\n	5. You are not allowed to read newspaper now.\r\n	6. Permission can’t / won’t be granted.\r\n \r\n                                                                       Source:speakenglishspeakeng.blogspot.com                                                               \r\n Model 1: Seeking and granting permission – formal\r\n	Divya	   : Good morning mam. May I take leave for three days?\r\n	Rita	   : Good morning. What! Leave for three days! \r\n	Divya	   : Mam, My mother has high fever. The doctor advised her to take complete  \r\n                          rest. I should take care of her. Please mam.\r\n        Rita         : Okay. Take care of your mother.\r\n        Divya      : Thank you, mam.\r\n Model 2: Seeking and refusing permission – formal\r\n	Ravi        : Good morning, sir.\r\n	Principal : Good morning Rakesh.\r\n	Ravi       :  Sir, we are first year literature students. Can we go on an excursion to \r\n                          Kodaikanal this weekend?\r\n	Principal :  I’m sorry. I can’t give you permission. The College Council has decided  \r\n                           that only during your final year, the students can go on an excursion.	\r\nRavi        : Would you please request the Council to reconsider its decision?\r\n	Principal : I’m afraid, I won’t.\r\n	Ravi       : That’s okay. We will go on an excursion in our final year. Thank you, sir. \r\n  Model 3:  Seeking, refusing and giving permission – informal\r\n	Tinku      : Can I have an ice-cream please?\r\n	Anu        : No, you can’t. You are advised to be on diet.\r\n	Tinku      : Can I have a piece of cake?\r\n	Anu	   : That’s okay. But have a cake with no icing on it.  	\r\nWORKSHEET\r\n1.	You have forgotten your ID. Your Head of the Department asks you to write an apology letter. Draft an apology letter.\r\n2.	Write down five different expressions of gratitude and the following response (each 5).\r\n3.	Write down three different ways of seeking, giving and refusing permission (each 3).\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n3. DIALOGUE  BUILDING\r\n            A dialogue is a written piece of conversation. In other words, it is a written version of something which is essentially spoken. Therefore, it has features of both speech and writing in it. A dialogue should never turn into an artificial speech. The main purpose of a dialogue is to convey the thoughts clearly, crisply, cogently and naturally.\r\n	Dialogue writing is a skill that helps us in developing both our speech and writing. Since, dialogue is the most natural form of exchanging ideas, it may be looked upon as a preparation for a conversation.\r\nEssential Features of   Dialogues / Conversations:\r\nThe essential features of dialogues and conversations are the same.\r\n•	A dialogue should reflect the speaker listener’s point of view.\r\n•	A dialogue must never be a monologue i.e. one person continue to speak endlessly.\r\n•	In a dialogue, the speaker and the listener keep changing their roles.\r\n(A speaker becomes a listener and a listener becomes a speaker). The shortest dialogue consists of two utterances by two different speakers.\r\nExample             A: May I know your name, please?\r\n	                B : I’m Rajendran.\r\nEach speaker has his / her turn at speaking and each participant’s contribution is interesting and relevant to the topic given for building up the dialogue. The dialogue may be formal or informal.\r\nMain factors:\r\nThe main factors that determine the formality or informality of a dialogue are:\r\na.	Topic or subject matter: 	\r\n          i. The topic decides the style of the dialogue.\r\n         ii. If the topic of the dialogue is “Discussion on Annual Budget” or “How to make\r\n             a computer virus free “or official etc…., the conversation is likely to be formal.\r\n        iii. If the topic is “planning for a picnic” or preparing a dish” or personal etc., then  \r\n             the conversation is likely to be informal\r\nb.	Purpose of Communication: \r\ni.	The formal style is usually associated with public purposes. \r\n  Example: Schedule of elections, television or radio \r\nii.	 The informal style is associated with private or personal purposes.\r\n   Example: The same ‘schedule of elections’ if  given to a close friend, informal style\r\n   can be  followed.\r\nc.	Relationship between participants:\r\n       Dialogues are based on relationships prevailing in a family or in a society.\r\n2.1.The relationship can be formal, semi-formal or informal. They are categorized as given   below:\r\n \r\nFORMAL  CONVERSATION\r\ni)	Strangers\r\nii)	Officials- government and private organizations\r\niii)	Superiors - working place\r\niv)	Acquaintances(those  whom you already met but not intimate)\r\nSEMI - FORMAL  CONVERSATION\r\ni)	Elders of the community / public figures\r\nii)	Colleagues - work place - but not intimate\r\niii)	 Friends - not intimate\r\niv)	 Relatives - distant by relationship and contact \r\nv)	Relatives - immediate by relationship but distant by contact\r\nvi)	Neighbours - not intimate\r\nINFORMAL  CONVERSATION\r\ni)	Friends\r\nii)	Relatives\r\niii)	Neighbours 	  intimate by contact\r\niv)	Collegues \r\n•	In formal conversations, speak only what is essential or unavoidable. The amount of \r\ncontent will be minimal. The language should be polite and respectful.\r\n•	In semi-formal conversations, the language should be limited and still be polite and \r\nrespectful as it is a conversation with colleagues, friends and neighbours whom we \r\n            may not feel free.\r\n•	In informal conversations, the intimacy level is high. There is no need to be formal, \r\npolite or respectful.\r\n\r\n\r\n\r\n\r\n\r\nEXPRESSION  FOR  FORMAL,  SEMI-FORMAL AND  INFORMAL DIALOGUES\r\n\r\nS.No.	Purpose	Formal	Semi formal	Informal\r\n1.	Greeting	1.Good morning Sir!\r\n2.Good afternoon Sir!\r\n3.Good evening Sir!\r\n (Greet with respect)	1.Same as in formal but there will be tonal difference.\r\n2.Casual Greeting	1.Hello!\r\n2.Hi!\r\n3.A smile\r\n4.A wave of the hand \r\n2.	Introductions	1.How d’ you do Mam? (Question by Starter)\r\n2.Fine. How d’ you do? (Answer)	1.Glad to meet  you.\r\n   (Starter)\r\n2.So am I (Answer)	1.Hi! Hello! Here.\r\n (Starter)\r\n2.Hai! Hello. (Ans)\r\n3.	Thanking	1.Thank you so  much.\r\n2.I am grateful to you.\r\n3.Not at all (or) \r\n Don’t mention it  (Answer)	1.Thank you.\r\n2.You’re welcome (Answer)	1.Thanks a lot.\r\n2.Thanks a million\r\n3.It’s okay /     That’s okay (Answer)\r\n4.	Parting/ Taking leave	1.Good night Sir!\r\n2.Good bye Mam!\r\n   (With respect)	1.Same as in  Formal but with tonal difference\r\n2.Casual Parting	1.Bye\r\n2.See you \r\n   later\r\n3.See you \r\n   tomorrow\r\n4.Okay. Bye.\r\n5.	Asking for advice \r\n(e.g. for illness)	1.It would be in your interest to meet the doctor.\r\n2.If I were you, I  should meet the doctor.	Please meet the doctor	Meet the doctor.\r\n6.	Leave the Place (or) person you are talking with, in the middle for some work.	      Excuse me	1.Just a moment.\r\n2.It won’t be long.	1.Be back in a moment\r\n2.Be back in a jiffy\r\n7.	Requesting for help	1.Would you help me?\r\n2.I wonder if you could help me.\r\n3.You couldn’t help me, could you?	Will you help me?	Help me.\r\n\r\n8.	Offering something when someone else comes to your place.	1.What would you\r\n    like to drink?\r\n    (Starter)\r\n2.I’d like a glass of\r\n    water. (Answer)	1.What will you \r\n   have / drink now?\r\n   (Starter)\r\n2.Please get me a \r\n   glass of water.    \r\n   (Answer)	1.A drink \r\n   (Starter)\r\n2. Okay.  \r\n    (Ans.)\r\n3.A glass of  \r\n   Water.\r\n    Yah. (Ans.)\r\n9.	For closing the window	1.Would you mind   if I close the window?\r\n2.Would you mind \r\n closing the window?	1.Please close the window.\r\n2.Do you mind closing the window?\r\n3.Do you mind if I close the window?	No permission is taken.\r\nJust say,\r\n‘Close the window.’\r\n10.	Asking the other person about their week end plans.	1.Would you be too  busy during the week end?\r\n2.Would you be free \r\n during the week end?	Will you be free this week end?	1.What are your plans for week end?\r\n2.Any plans for week end?\r\n11.	You didn’t understand what the other person is speaking. How do you ask for explanation?	1.I’m afraid I didn’t  \r\n understand.\r\n 2.Would you mind \r\n explaining this \r\n again?\r\n3.Could you  possibly say why  you are saying  like  this?	1.I don’t think I understand.\r\n2.Do you mind this Sir? Please explain again.\r\n3.Can you explain why?	1. I don’t understand.Explain.\r\n2.Will you again explain?\r\n3.Tell me why?\r\n12.	How do you ask for permission?\r\n(e.g.) To enter a place.	1.May I come  in?\r\n2.Could I have a word with you?\r\n3.Could I have a  moment with you?\r\n4.I would (I’d) like a word / moment with you.	1.Can I come in?\r\n2.Can you spare a \r\n moment for me?	(No permission is taken)\r\n1. I need to talk to you.\r\n2. I want to talk to you.\r\n13.	Suggestions to solve the problem in your class (or) department	1.May I suggest  that you meet the H.O.D./Principal.\r\n2.You could  probably \r\nmeet the H.O.D./ Principal.	1. I suggest you meet the H.O.D./Principal.\r\n2.You can meet the H.O.D./Principal.	Meet the H.O.D./ Principal.\r\n\r\nExamples:\r\n1.Formal Conversation: (Between Strangers)\r\n	A: Excuse me. Which is the way to the post office?\r\n	B: Sorry, I am also a stranger.\r\n	A: Yes, Please.\r\n	B: You might try the chemist in the shop across the street.\r\n	A: Thank you so much.\r\n2.Semi-Formal Conversation:\r\n(In a conference (during lunch) between participants)\r\nParticipant A: Congratulations! You have raised disturbing questions in the session. \r\n                        I’m Mrs.Deepika Chandran, Editor, Science Section, SCITECH, \r\n                        Chennai.\r\nParticipant B: Thank you Mrs.Deepika. I wondered if any one listened at all.\r\n		I’m Dr.Chandrika, Professor in Economics, SIET, Mayiladuthurai.\r\n3.Informal Conversation: (Between Friends)\r\n	A: Meet me this evening\r\n	B: No\r\n	A: Why?\r\n	B: Don’t you remember? I have a talk to give.\r\n	A: How about tomorrow morning then?\r\n	B: Okay.\r\nWORKSHEET \r\nBelow are several dialogues. Read them carefully and write down to which category (formal, semi-formal, informal) they belong. The first one is done for you.\r\n1.	A: Good morning Sir.\r\n     Could I meet Mr.Kadir?\r\nB: Oh, you must be Mr.Taman.\r\n     I’m Kadir, please come in. I have been expecting you.\r\nA: Nice to see you Sir.\r\nAnswer: Formal dialogue.\r\n2.	A: How are you Mrs.Sadhana?\r\nB: I am fine doctor. But I want to talk about my son Siva’s problem with you.\r\nA: Yes.\r\nB: You see, he’s always complaining of headache.\r\nAnswer: \r\n3.	A: Won’t you have another helping?\r\n     (‘Helping’ means ‘taking a dish more than once’)\r\nB: No, thank you.\r\n     I don’t like to get any, mother.\r\nAnswer:\r\n4.	A: We are all eating at the Taj Hotel tonight.\r\nB: Really? That’s great.\r\nA: Do you know why we are going?\r\nB: No.\r\nA: To celebrate your new appointment.\r\nB: Oh, it’s nice.\r\n     All our friends have agreed or not.\r\nA: Yes. All agreed.\r\n      Do you know who is paying the bill?\r\nB:  Who else? You.\r\nA:  Me? Oh, no!\r\nAnswer:\r\n5.	A: Excuse me, May I come in?\r\nB: Yes, come in.\r\n     Whom do you want to meet?\r\nA: Sir, I want to meet our house owner.\r\nB: Sir, my father has gone out now.\r\n     What is the problem?\r\nA: Our phone is not working.\r\nAnswer:\r\n6.	A: Ticket please.\r\nB: Where?\r\nA: To Anna Nagar.\r\nB: Give me twelve rupees.\r\nA: Do you have change for fifty rupees?\r\nB: Give me a two rupee coin. I will give you forty rupees.\r\nA: Okay.\r\nAnswer:\r\n2.2.DIALOGUE:  FILL  THE  BLANKS\r\n	We hope, now you have an idea on the concept “Dialogue”. Let’s move to the next stage of filling the dialogues with suitable responses. The response may either be questions or other forms of statements.\r\n	To complete the dialogue, it is necessary to learn ‘framing questions using specific/ open ended or Non-Specific/close - ended questions’.\r\nFraming Questions:\r\n	Non-specific or close ended questions begin with the auxiliary verbs such as ‘am’ is ‘are’ was, were, do, does, did, have, has, had, can, could, will, would, shall, should,”. They will have the short responses ‘Yes’ or ‘No’. The responses in both full and short form are accepted usually.\r\nThe following table helps you to learn the format better.\r\na) ‘Yes’ or ‘No’- Question and Answer (Non-Specific or close-ended questions)\r\n	Sample questions and answer for each auxiliary verb is given below for your learning. \r\nThe answer should be in full form if the situation is formal. Short form is used for informal occasions.\r\nS.\r\nNo.	Questions	Responses\r\n		Affirmative	Negative\r\n1.	Am I all right?	1. Yes, you are all right. (or)\r\n    Yes, you are. (short form)	1. No, you aren’t all right (or) No, you aren’t (short form)\r\n2. 	Is it your bag?	2. Yes, it is my bag. (or)\r\n    Yes, it is.	2. No, it is not my bag. (or)\r\n   No, it isn’t. \r\n3.	Are you a doctor?	3. Yes, I am a doctor. (or)\r\n    Yes, I am.	3. No, I am not a doctor. \r\n    (or) No, I am not.\r\n4.	Was she there?	4. Yes, she was there. (or)\r\n    Yes, she was.	4. No, she was not there.  \r\n    (or) No, she wasn’t\r\n5.	Were you insulted?	5. Yes, I am insulted. (or)\r\n    Yes, I am.	5. No, I am not insulted. \r\n    (or) No, I am not.\r\n6.	Do you go to school today?	6.Yes, I go to school today. (or)\r\n    Yes, I did.	6. No, I don’t go to school today. (or) No, I don’t.\r\n7.	Does this mango taste sweet?	7. Yes, this mango tastes sweet.  \r\n     (or)  Yes, this mango does.	7. No, this mango doesn’t taste sweet. (or) \r\nNo, this mango doesn’t.\r\n8.	Did you consult the doctor?	8. Yes, I consulted the doctor. (or) Yes, I did.	8. No, I didn’t consulted the doctor. (or) \r\nNo, I didn’t.\r\n9.	Have you had your lunch?	9. Yes, I have had my lunch. (or) Yes, I have	9. No, I haven’t had my lunch. (or) No, I haven’t.\r\n10	Has she got her book?	10. Yes, she has got her book. (or) Yes, she has.	10. No, she hasn’t got her book. (or)  No, she  hasn’t.\r\n11	Had you completed the work?	11. Yes, I had completed my work. (or) Yes, I had.	11. No, I hadn’t completed my work. (or) No, I hadn’t.\r\n12	Can you lend me your pen?	12. Yes, I can lend you my pen. (or) Yes, I can.	12. No, I cannot lend you my pen. (or) No, I can’t.\r\n13	Could you do that?	13. Yes, I could do that. (or) Yes, I could.	13. No, I couldn’t do that. (or) No, I  couldn’t. \r\n14. 	Shall I come with you?	14. Yes, you shall come with me. (or) Yes, you shall.	14. No, you shall not come with me. (or) No, you shan’t.\r\n15	Should you take the pill?	15. Yes, I should take the pill. (or) Yes, I should. 	15. No, I should not take the pill. (or) \r\nNo, I shouldn’t.\r\n16	Will you help me?	16. Yes, I will help you. (or) Yes, I will.	16. No, I will not help you. (or) No, I won’t.\r\n17	Would  you  like coffee?	17. Yes, I would like coffee. (or) Yes, I would.	17. No, I wouldn’t like coffee.(or) No,  I wouldn’t.\r\nThis table helps you to know how to frame and answer ‘yes’ or ‘No’ questions. Already,  you have undergone similar grammar exercise in ‘ changing statement to Negative and Interrogative’.  From the ‘Yes - No’ answers given, you should frame questions beginning with the auxiliary verbs; and by making change in the usage of pronouns. The pronoun chart given below helps you to use correct pronouns at the right place.\r\n	 I	   	my                  me	\r\n	We		our			us			First Person\r\n	\r\n	You		your		you\r\n                                       		                                      Second person\r\n	He 		his		him\r\n	She		her		her\r\n	They		their		them			Third Person\r\n	It 		its		it\r\na)	If the question has ‘first person’ pronoun, it should be changed to ‘second person’ pronoun in the answer.\r\nExample:	 Question :	Am I tired? (I- first person) \r\n			 Answer   :	Yes, you are  tired. (you – second person)\r\n	As the subject is ‘I’,  the verb ‘am’ is used in the first sentence. \r\n   As the subject is ‘you’, the verb ‘are’ is used in the second sentence.\r\nb)	‘Wh’ Questions and Answers / Statements:\r\nSpecific / Open - ended questions begin with the interrogatives such as ‘who, what when, where, why, which, whose, whom, how’ etc…\r\n	‘Wh’ Questions	Statements\r\n1	Who is standing there?	1. Ravi is standing there\r\n2	What is your father?	2. My father is a teacher\r\n3	When did you go home?	3. I went home at 4.30 p.m\r\n4	Where is he living?	4. He is living at Allampatti\r\n5	Why are you sad?	5. I am sad because I lost my pen\r\n6	Which is your native place?	6. Sivakasi is my native Place\r\n7	Whose bag is this?	7. This bag is mine.\r\n8	Whom do you want to meet?	8. I want to meet my English madam\r\n9	How old are you?	9. I am nineteen.\r\n10.	How far is your house from here?	10.My house is half-a-kilometre from \r\n      here.     \r\n11	How long were you waiting?	11. I was waiting for one hour.\r\n12	How many brothers do you have?	12. I have two brothers.\r\n13	How much is the cost of 1kg of apples?	13. The cost of 1kg  of apples is \r\n       Rs.200.\r\n14	How much does 1k.g apples cost?	14. 1kg apple costs Rs.200.\r\n15	How tall is your friend?	15. My friend is 6 feet tall.\r\n16	How high is the Eiffel tower?	16. The Eiffel tower is 986 feet.\r\n\r\nModel: Complete the following dialogue: (The first one  is done for you)	\r\n1.	Between a tourist and a guide:\r\nTourist:	1. …………………………….?\r\nGuide:		Hotel Janakiram is the best hotel in this locality.\r\nTourist:	2. …………………………..?\r\nGuide:		No, the charges are moderate. \r\n                        Do you need a single bed room or a double one?\r\n	Tourist:	3. …………………………………. as I have come alone.\r\n	Guide:		4……………………………………………….?\r\n	Tourist:	Yes, I can pay hundred rupees per day.\r\n			5. ………………………………….. ?\r\n	Guide:		Yes, it is a bath attached room.\r\nAnswers:	Let’s practice questioning and answering now. Go through the dialogue and understand  the idea.\r\n1.	For framing  question 1: Read the answer of that question. As the answer starts with the name of the place ‘Hotel Janakiram’, use ‘which’ to start the question. \r\nQuestion 1: 	Which is the best hotel in this locality?\r\n2.	The answer for the question 2, starts with ‘No’. So, the second question should start with the auxiliary verb ‘Are’.\r\nQuestion 2:	Are the charges very high?		\r\n3.	The third sentence has answer ‘partly’ i.e. ‘as  I have come alone’ already.\r\nSo, you should guess the remaining part only from the question. As the question starts with auxiliary verb, the answer should start with yes or No.\r\nAnswer 3:	(Yes) I need a single bed room.\r\nAs the question has choice with or’ there is no need to write ‘yes or No’.\r\n4.	For the question 4, again start it with auxiliary verb ‘ can’ as the answer has the verb ‘can’ and ‘yes’.\r\nQuestion 4: 	Can you pay hundred rupees per day?\r\n5.	The question 5 also starts with the auxiliary verb ‘is’ as the answer has the verb ‘is’ and ‘yes’.\r\nQuestion5:      Is it a bath attached one?\r\nWORKSHEET\r\n Assume yourself to be in the given situation and fill the following with meaningful  \r\n questions and answers as required.\r\n1. Rani has a severe head ache. She goes to an ENT specialist.\r\n	Doctor	:	………………………………………………………………………..?\r\n	Rani	:	I have a severe headache.\r\n	Doctor	:	………………………………………………………………………..?\r\n	Rani	:	For the past two days.\r\n	Doctor	:	You have  cold as well. Did you drink anything cool?\r\n	Rani	:	………………………………………………………………………?\r\n	Doctor	:	Did you take any pills?\r\n	Rani	:	……………………………………………………………………….?\r\n	Doctor	:	You have  sinus  problem. Take this prescription.\r\n	Rani	:	………………………………………………………………………?\r\n	Doctor	:	Please, come tomorrow.\r\n2. Father and his son (talking about the son’s examination)\r\n	Father	:	……………………………………………………………………?\r\n	Son	:	No, I have not answered all the questions.\r\n	Father	:	Were all the questions tough?\r\n	Son	:	No, ……………………………………………………………….\r\n	Father	:	…………………………………………………………………….?\r\n	Son	:	Yes, I will score more than 60%\r\n	Father	:	…………………………………………………………………….?\r\n	Son	:	Only 35% marks are required for a pass.\r\n	Father	:	……………………………………………………………………..?\r\n	Son 	:	Kumar has done well.\r\n3. A Customer and a salesman\r\n	Salesman:	…………………………………………………………… madam?\r\n	Customer:	I want to buy a wet grinder.\r\n	Salesman:	…………………………………………………………………….\r\n	Customer:	I want the tilting type…………………………………………….?\r\n	Salesman:	It costs about Rs.2500/- Do you like this one?\r\n	Customer:	Yes, I do…………………………………………………………?\r\n	Salesman:	Yes, it is ISI marked, Madam.\r\n	Customer:	…………………………………………………………………….?\r\n	Salesman:	The guarantee period is five years.\r\n	Customer:	It’s okay. Make the bill and pack it.\r\n4. Between the Principal and a student\r\n	Principal:	Where did you study last year?\r\n	Student  :	…………………………………………………….…… School, Erode.\r\n	Principal:	You have a college in Erode. ………………………………………….?\r\n	Student  :	I wish to study in your college because my father studied here.\r\n	Principal:	………………………………………………………………………….?\r\n	Student  :	My father’s name is E.V. Murthy.\r\n	Principal:	Oh, Yes. I remember him.  ……………………………………………?\r\n	Student  :	Yes, I wish to join the hostel.\r\n	Principal:	Ok. Submit the certificates.   …………………………………………?\r\n	Student  :	Yes sir, I have them here.\r\n5. A villager and a photographer\r\n            Villager         :   ……………………………………………………………………..?\r\n            Photographer:  Yes. I am the photographer.\r\n            Villager         :  What are your rates for taking photos?\r\n            Photographer:   If it is a passport size photo, it will be 60 rupees.\r\n            Villager         :  How many …………….…………………………………………..?\r\n            Photographer:   ……………………………………………………….. three copies.\r\n            Villager         :   When………………………………………………………………..?\r\n            Photographer:   I will give you the photos in ……………………………………….\r\n            Villager         :  I shall come with money next month.\r\n            Photographer:   !!!!!!!!!!!\r\n\r\n\r\n\r\n\r\n4. ASKING/  GIVING  DIRECTIONS\r\nWhy do I need to ask for or give someone directions?\r\n          Everyone  may  be asked by someone for directions  to a place where one hadn’t been\r\nearlier. There will be times, when you need a place- especially when you are away for studies\r\nor career and you ought to ask someone for directions.\r\n4.1.ASKING  SOMEONE  FOR  DIRECTIONS\r\n	A good way to start the conversation with a stranger is by saying “Excuse me” / “Hello” with “Sir / Madam”.  Use the word ‘please’ when you are asking for directions. It’s polite and people are more likely to help you.\r\nSome basic phrases you can ask for directions to go to a place.	\r\n?	Excuse me sir, can you give me directions to the nearest petrol station?\r\n?	Can you please tell me how I can get to East Street?\r\n?	Where is the nearest Supermarket?\r\n?	How can I get to the local Market?\r\n?	I’m trying to get to bazaar. Would you please help me?\r\n?	What is the best way to get to your street form here?\r\n?	Where can I find the nearest bakery?\r\n?	Is there a supermarket near here?\r\n?	Is there a sports shop around here?\r\n?	Hello Madam. I’m looking for the dentist in this street. How can I get there from here?\r\n?	What is the quickest way to get to the  store from here?\r\n?	What is the easiest way to get to the nearest bank from here?\r\n?	Excuse me sir, I seemed to be lost. Could you help me to get to the local Mall?\r\n4.2.GIVING  DIRECTIONS\r\nWhen giving directions, you will often use landmarks as a way of giving directions\r\nExample:\r\n?	Excuse me sir, Is there a bank around here?\r\n?	Yes, there is a bank next to Library.\r\nNotable landmarks are given below for your usage.\r\n?	Traffic lights		\r\n?	Cross roads\r\n?	Junction\r\n?	Level crossing\r\n?	Sign post\r\n?	T-Junction\r\n?	Dead  end\r\n?	Fly over\r\n?	Under pass\r\n?	Round about\r\n?	Pedestrian crossing\r\n?	Zebra crossing\r\n?	Motorway bridge\r\n?	Railway bridge\r\n	If you don’t understand when they give directions, don’t be afraid of asking them to tell you again. Most people will always do their best to help you. When you are speaking to someone for giving directions, use your hands to demonstrate what you mean – left, right or straight on.\r\nStock Expressions used for directing someone to some destination or landmark, are given below:\r\n?	Please go straight (or) Go straight ahead \r\n?	Go straight on your left\r\n?	Turn right / left\r\n?	Pass two roads on your right\r\n?	Walk past the bus stop\r\n?	Walk  along the Arch\r\n?	Look for the Post office\r\n?	Cross the first cutting / turning\r\n?	Turn the second corner from …………….\r\n?	It is on the third cut from ………………\r\n?	It’s adjacent to …………………  / It is near ………………………………\r\n?	It is in between …………………\r\n?	It’s behind the ………………….\r\n?	It is right in front of ………………..\r\n?	It is on the way to …………………..\r\n?	Don’t go beyond that …………………….\r\n?	Make enquiries at ……………. (the nearest traffic constable / shop etc…)\r\n?	Where the three roads meet, there is ………….\r\n?	Better hire an auto to reach …………………\r\n?	Keep going till you reach the Green Hotel.  On your left, you will see the Park. You will find a water tank near that Park.  The Indian Bank is just opposite the Park.\r\nSome samples are given below for your comprehension.\r\nSample: 1\r\n	A man approaches you to direct him to hospital nearby. Here, you find the road-map. Write down instructions by way of helping him at least 5)\r\n      \r\nVimal  Jewellry	 	\r\n			Main Road\r\n\r\n\r\nSelvi Hospital	  Bus Stop                      X\r\n							      You are here (your working place)	\r\nThe Man:	Sir, what is the quickest way to get to the nearby hospital?\r\nYou      :	Please go straight. As soon as you reach the main road, turn left. Walk past the  \r\n                        bus stop. Cross the first lane. Look for Selvi hospital. It is just opposite Vimal \r\n                        Jewellery.\r\nThe man:         Thank you\r\nNote :At the end, when you mention the destination, use it at the beginning of the sentence.\r\n(e.g)	Wrong  :  Vimal Jewellery is opposite Selvi hospital.\r\n	Right	:   Selvi hospital is opposite Vimal Jewellery.\r\nSample: 2\r\n	You are in Virudhunagar bus stand. A sranger approaches you to direct him to VHNSN college. Help him by showing directions with your instructions. \r\nStranger:	Excuse me sir, could you please tell me how to get to VHNSN College?\r\nYou	   :	Please board a bus from virudhunagar to Aruppukottai.\r\nThe bus fare is five rupees in town bus and six rupees in city bus and seven rupees in private bus. The bus will cross Meenambigai bungalow, Aaththupaalam, M.G.R. Statue. bridge, Allampatti road. It’s just a straight road. Then after a few minutes travel, you can see the Arch with VHNSN College name on your left. After the bus stops, get down from the bus. Give your details to the watchman at the entrance of the college  He will guide you to the office or department you want to go. \r\nStranger:	Thank you a lot for your  details.\r\n\r\nSample : 3\r\n	A lady riding in a two –wheeler asks you to direct to Sree petrol pump. Here you find the road map. Help her to reach the petrol pump with your instructions.\r\n	      You are \r\n	  X   here	\r\n	Ravi petrol pump\r\n							\r\n							     Main Road\r\n\r\n            Software 	\r\n                Tech\r\n	Sree Petrol Pump	\r\nThe lady	:	Sir, How do I get to Sree petrol pump?\r\nYou		:	Mam, Please ride straight and turn left. Cross past the first cutting on \r\n                                 your right. \r\n                                Pass Meena cinema and Vysya  Bank on your night. \r\n                	        Then take a turn at your right on the third cutting next to Vysya Bank.\r\n	Ride for a minute. Sree petrol Pump is on your left.\r\n	It’s just opposite Shopping Complex.\r\nThe lady	:       Thanks for your instructions and help.\r\nWORKSHEET \r\n1.	You are in the vehicle shed of VHNSN College. A newly admitted student approaches you and asks you directions to auditorium. Help him to reach auditorium with your instructions.\r\n2.	A tourist wants to go to the best hotel of your place. He seeks your help to direct him there. Show him the directions by way of helping him.\r\n3.	A middle aged woman asks your help as she wants to go to the nearby temple. You are also new to that place. How will you direct her?\r\n4.	Assume you are living near Virudhunagar bus station. You have Parents Teachers Meet in your department the next day. Your elder sister who has come there for vacation wants to attend the Meet. She asks you the way to your college. How will you direct her to reach your college?\r\n\r\n\r\n\r\n5.Writing Stories from Outline\r\n	Story Writing is an art. Each and every individual likes to listen to or read a good story. From the old days to the present technologically developed world, there is no second opinion and there is no variation in age in listening to stories with interest.\r\nDeveloping the Hints\r\n	Writing stories from the outlines given is not merely filling up dashes but developing the phrases into full sentences. Usually, students takedown hints or notes from various sources in the form of an outline. This outline has been elaborated in the form of sentence for their learning purpose during test or examination. So, the exercise on “Writing Stories from Outline” prepares the learners to develop their skill in elaborating gists or points into sentences and paragraphs.\r\nWhat is a Story?\r\n	Before analyzing “How to write stories from the given outline”, it would be better to know what a story is and what composes a story.\r\n	A story is a work of fiction or imagination that is usually written in easily understandable grammatical structure with natural flow of speech. A story is meant to be read at a single sitting and therefore it should be direct and brief as possible.\r\n	For developing the hints given, there is no need to cook the story as the outline of the story is provided to the learners. It is a piece of composition which implies the techniques of narration.\r\nHow to write stories from the outline given:\r\n?	Read the hints given very carefully.\r\n?	Understand all details given in the story.\r\n?	Think of setting or background of the story.\r\n?	Imagine the story in your mind’s eye.\r\n?	Choose an apt title for the story. The title should be short and catchy. It is good to use adjectives to describe important events or characters. \r\nFor eg. The honest farmer (or) The famous writer (or) The clever crow etc.\r\n?	Begin the story with description of the background and the main characters. Take care to make it an interesting one.\r\n?	The next paragraph should deal with the details or the problem mentioned in the story.\r\n?	The third paragraph should be the concluding part. It may end with solution to the problem discussed. It should satisfy the readers’ interest.\r\n?	Each new incident can also be written in a new paragraph.\r\n?	Use only past tense when narrating the story.\r\n?	The dialogues between characters make the story lively. For such dialogues, use present tense in direct form.\r\n?	There is no need to write rough draft.\r\n?	It is very important to build upon the story with coherence from the beginning to the end.\r\n?	The first paragraph should be the description of the place and characters as given in the outline. The next paragraph should deal with the problem or the twist in the story. The solution to the problem should form the concluding paragraph.\r\n?	Revise the story after completing it.\r\n?	If there is need, revise the title also.\r\n?	The moral of the story is implied. It need not be written explicitly.\r\nSome samples are given below for practice.\r\n1.Outlines:\r\nTwo friends – pass through a forest – a bear comes out – one friend climbs up the tree – the other lies on the ground – without movement – the bear sniffs – goes away – the friend on the tree gets down – enquires the other friend what the bear said into his ears – moral.\r\nStory:                                           Two friends and a Bear\r\nOnce, there were two friends. They decided to go to the nearby town for their business. On the way, they passed through a dense forest. Many wild animals lived in that forest. So, they walked very fast.\r\nWhen they were walking, they heard the growling of bear. Suddenly, they saw a black bear coming towards them. One of the friends knew how to climb up a tree. So, he ran and climbed up a tree. He thought he was safe. The other friend did not know how to climb up a tree. So, he felt helpless. He thought for a while and he lay down on the ground without movement. He pretended to be dead. The bear came near the man lying on the ground. He sniffed him. Then he left the place thinking that the man was dead.\r\nThe man on the tree climbed down. He said to the other friend, “Get up. Let us continue our journey. The bear has gone away.” He again asked “What did the bear whisper in your ears?” The other friend replied that the bear whispered in his ears not to trust a false friend.\r\n2. Outlines:\r\nA happy and rich family – father, mother and two sons – father’s plan about his children’s studies – sudden change in the younger son – his bad habits – dismissal from college – his departure from home with his share of the family property – he foolishly spends money on a new business – deceived by his friends – turns a beggar – chance meeting with his father – the generous love of the father.\r\nStory:                                   The Return of  the Prodigal Son\r\nOnce, a rich man named Keshav lived in a town. He was honest and good. So, people liked him. He lived with his wife and two sons Ramu and Balu. Both of his sons were at college. He had very high hopes about them. He wished his sons to join a foreign university for higher studies. So, he told his wife about his desire.\r\nWhen they were talking, Balu entered the room. He walked towards his parents unsteadily. He was drunk. The mother cried, “Oh, my God! What happened Balu?” He told them slowly that he had hit some of the students of his college in drunken state and he was dismissed from the college by the principal. Balu’s parents understood that their son had been keeping bad company. They were shocked when he demanded his share from his father’s property. He said stubbornly that he wanted to start a business of his own. The father agreed to divide the property with a broken heart.\r\nBalu started ‘Balu Films’ with his friends. His friends misused his money. No film was released. He understood lately that his friends had cheated him. They left him alone. He had no money. Days, months and years passed. One day he was hungry and he walked slowly on the road. On the way an old man asked him, “Could you bring this luggage to the Restaurant?” He also agreed to carry the heavy luggage. But when he saw the old man’s face, he was shocked. It was none other than his father. He cried, “Father” falling down on his father’s feet and said “forgive me”. Keshav also wept in joy. He embraced his son and they went back home. \r\nEach and every one of the family welcomed him. The home was happy again after many years.\r\nWORKSHEET \r\nConstruct stories using the following outlines:\r\n1. A boy falls into bad company – his father feels sad – wants to teach him a lesson – gives him a basket of good apples – places a rotten apple among them – some days pass – the rotten apple spoils the good apples.\r\n2. King Midas – loves gold very much – angel appears – Midas says, “Everything I touch should turn into gold” – angel blesses – he touches table – becomes gold – touches bed – becomes gold – touch coffee – becomes gold – he is unhappy – touches food – becomes gold – he is hungry and thirsty – touches his daughter – she becomes gold – desperate – prays to angel – blesses Midas – everything back as original.\r\n3. An old farmer – four sons – always quarrel – advice no use – farmer sad – falls ill – gives them a bundle of sticks – tells them to break the sticks – try in turn – in vain – farmer unties the bundle – they break them one by one – they have learnt a lesson.\r\n4. A farmer – had a goose -  laid a golden egg daily – the farmer became greedy – planned to become rich soon – killed the goose cut it open to get golden eggs – no golden egg  inside her – disappointed.\r\n5. Robert Bruce – king of Scotland – wanted to free his country from English – but defeated many times – to protect himself from enemies – hides in a cave - sees a spider – tries to climb up many times – fails – it tries again – succeeds at last – the king gathers his armymen – another battle against English – fight and wins.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n6. LETTER WRITING\r\n             Letter writing is a skill. It is the commonest form of written communication. Today’s computer age has superfast methods of communication such as e-mail, fax etc.  So, writing letters start losing its importance now-a-days. \r\nWhile writing a letter, you may have the following questions in your mind.\r\n•	How should I start the letter? \r\n•	What information do I include? \r\n•	Am I Communicating in the best way, needed for the situation? \r\n•	Is my approach the most effective one? \r\n•	Will the letter bring the action or reaction I want? \r\nYou may feel frustrated, aren’t you?  Do you want to know how to make it easier? \r\nRead on and learn now. \r\nLetters can be categorized under two headings- Informal and Formal. \r\nI. INFORMAL LETTERS - Personal Letters i.e. to parents, friends, and relatives fall under informal category. \r\nThe Informal Letter has six parts. \r\n1.	Heading or Return address / Sender’s address with Date – the sender’s address – on the right top. \r\nEg. 								           Bangalore \r\n								           February 5, 2015\r\n2.	Salutation \r\nDear / My dear ………… (relation / friend) \r\n3.	Body of the letter \r\n4.	Subscription 		-	(Yours friendly / lovingly/affectionately) \r\n5.	Signature 		-	Sender’s Signature / Name \r\n6.	Superscription 	-	Receiver’s Address \r\nINFORMAL LETTER: SAMPLE\r\n1. Letter to a friend asking him to spend a week’s holiday with you.                                                                                                                                  \r\n(Heading or Return address with Date)                                                     16, Fathima Nagar                                                                              \r\n                                                                                                                        II Street\r\n                                                                                                                        Virudhunagar\r\n                                                                                                                        6 March 2015\r\nMy dear Prema, 								 (Salutation) \r\n(Body of the letter) \r\n             Well and wish the same from you. I am sure you have done pretty well in your Summative Examinations. Here, I have done my Papers well. I am satisfied with my performance and I expect a good score with distinction. \r\n              My summer vacation starts at 18 May 2015 and our College reopens on 16 June only.  We plan to go on a tour to Kanyakumari on the 20th May morning and return back on the 22nd May morning. If you have no other programme, please join us. It would be really a fun and I will be happy to spend a week’s time with you during the vacation. My parents will talk to your mother if you are willing to join us. We shall feel honoured if you come over here and spend a week with us. My parents and I are eagerly waiting for your arrival and stay with us.\r\n              Convey my regards to your family members and kids. Awaiting your positive reply. (Subscription)                                                                                                  Yours lovingly\r\n(Signature)                                                                                                             R.Priya\r\nAddress on the envelope                                                                                  \r\nTo                                   Stamp	\r\nMiss.S.Prema                                                                                                   (Superscription)\r\nD/O. Mr.T.Gopal\r\n6, West Car Street,\r\nMadurai\r\n2. Letter to uncle thanking him for the gift that he sent on your birthday.\r\n                                                                                                                              12, R.K.Puram\r\n                                                                                                                              Madurai\r\n	12 March 2015  \r\nDear Uncle,\r\n        Received your letter with the greetings and gift sent by you on my birthday. It is really a pleasant surprise to me and my parents and brother liked it very much.  I thank you so much for your kindness and care. \r\n        You have sent me a real great gift. I am badly in need of a good watch and your present is a timely act.  Now, I can wake up early with the help of the alarm setting and prepare myself well for my examinations and routine college work.  I couldn’t find words to express my gratitude.\r\n         Convey my regards to Aunty and kids.\r\n	Yours affectionately\r\n                                                                                                                             J.Geetha\r\nAddress on the envelope\r\nTo                             Stamp\r\nThiru. D.Rajesh\r\n16, Town Hall Street\r\nMadurai        	 \r\nII. FORMAL LETTERS – The following letters fall under this category:\r\nA. Business Letters 	-  Letters regarding business dealings such as – \r\n     Complaint / Claim letters, Adjustment letters (in response to a complaint letter), \r\n     Collective letters (reminding one to make a payment that is overdue), \r\n     Enquiry letters / Order letters (seeking  information / asking for a quotation)  and \r\n     Quotation reply (a reply to an enquiry) \r\nB. Official letters 	- Letters to the Editors,  Office … \r\nC. Letter to the Staff / Head of the Department / Principal … \r\nD. Job Application / Resume / Covering Letter [dealt in a separate chapter of this book].\r\nIn this text, let us have a detailed outlook on the format, form and elements of FORMAL LETTER with examples and worksheet. It’s time to start your practice.\r\nFORMAL LETTERS:  BUSINESS  AND  ORDER LETTERS  \r\n	            The business letter is the basic means of communication between two or more companies or between two or more individuals. It has to be written with care because they leave a lasting impression and they can build or spoil the relationship between the parties concerned. Writing business letter is like any other technical communication. It has to convey specific information to the reader. \r\n             Order letter is sometimes placed through letters. It follows the general format of business correspondence. It gives a clear description of the items ordered, their quantities, catalogue numbers and prices. It should also specify the date of delivery, the mode of transport etc.\r\nThe General Format of Business Letter: \r\n?	A good letter should be clear and concise with short sentences and simple words. \r\n?	It should be straightforward and polite. \r\n?	It is better if it is limited to one single - spaced typewritten page. \r\n?	A business letter is often judged on the proper construction – format, content, grammar,\r\n      punctuation, openings and closings. \r\n?	There is no place for fancy fonts in business letters. \r\nThe elements of a standard business letter and their functions are given below \r\n1. HEADING OR RETURN ADDRESS (Sender’s Address)\r\nYour address (or the address of the company you represent) forms the Heading. \r\n2. DATE \r\nLeave two blank lines after the return address. Always spell out the month and then the day, a\r\ncomma followed by the year.                                                                           \r\nEg. August 2, 2014\r\n3. INSIDE ADDRESS (Receiver’s Address)\r\nLeave two blank lines after the date. Then type the address of the person or company to whom you are writing. \r\nEg. \r\nThe Manager\r\nNokia Service centre\r\n15, Anna Salai								              \r\nChennai\r\n4. SALUTATION \r\nType ‘Dear Sir’ (or) ‘Sir’, followed by the person’s name. End the line with a colon. If you don’t know the name of the person, use \r\nEg.  \r\nDear Editor, (or) Dear Madam, (or) Dear Sir, \r\n?	After the Salutation, mention about previous correspondence, if there is any. \r\n?	Subject      :\r\n?	Reference  :\r\n5. BODY \r\nAlign your message on the left margin. Skip a line before starting a new paragraph. But do not indent the paragraph’s first line. Make sure that each paragraph is clear and concise. \r\n?	The first paragraph of letter should introduce your purpose of the letter. \r\n?	The body of the letter should present the points to make clear your purpose. The points could be covered in a bulleted or numbered list so that the information is easy to process. \r\n?	Your concluding part should highlight your message. It should also clearly state what action; the receiver of the letter needs to take, in order to achieve the purpose. \r\n6. CLOSING \r\nLeave two lines of space after your last paragraph. Then use a conventional closing, followed by a comma.                                               \r\n      Eg. Yours sincerely, /Yours respectfully, /Yours truly, \r\n7. SIGNATURE \r\nYour signature appears below your closing. Use both your first and last name. \r\n                                                                               Eg. Mrs.Radha Mathivanan (and not) Radha\r\n8. NAME AND POSITION \r\nFour lines after the closing, type your full name. Do not include a title (Mr. / Mrs. / Shri / Smty). If you are writing on behalf of an organization, type your title on the next line. \r\n                 Eg. [RADHA MATHIVANAN]	\r\n             SECRETARY OF TAJ SPORTS CLUB  \r\n9. ABBREVIATIONS AT THE END OF A LETTER \r\nIf you send a copy of letter to someone other than the person addressed, write ‘cc:’ and the person’s name. Use ‘Enc.’ or ‘Enclosure’, if you enclose something with the letter. \r\nEg.   \r\nEnc : Copy of my sales receipt             \r\nSAMPLE BUSINESS LETTER \r\n1. Write a complaint letter to the Customer Sales Representative about the faulty mobile phone that you have bought recently.\r\n\r\nFrom\r\nMrs. Sita Rajendran\r\n121, New Street 							           (Return address)\r\nMadurai\r\nJanuary 11, 2015						                                         (Date) \r\n\r\nTo\r\nCustomer Sales Representative\r\nSony Service Centre\r\n15, Anna Salai								              (Inside address)\r\nChennai\r\n\r\nSirs, 				                                                                                (Salutation) \r\n		Sub.:  Request for replacement of faulty mobile phone - reg\r\n                        Ref.:  Invoice No. 115 dated January 10, 2015\r\nI recently bought one of your mobile phones (Model - Xperia Z) from one of your branches in Chennai. After observing the product, I discovered that two of the parts were missing, i.e. the Charger and the Headphone. The instruction booklet is not in English but in Japanese. \r\nI am writing this letter to replace the missing parts. Also I want a copy of the instruction booklet in English for the model I bought. I hope arrangements will be made for replacing the missing parts. \r\nIf I did not receive any reply within ten business days, I will return the handset to your branch and I expect a full refund / repayment. \r\nI include a copy of my sales receipt and a list of the missing parts for your kind reference.\r\n\r\nYours sincerely, 								(Closing) \r\nMrs.Sita Rajendran 								(Signature)\r\n[SITA  RAJENDRAN]							(Typed Name) \r\nEnc : Photocopy of my sales receipt						(Enclosure)\r\n2. Assume you are the Secretary of Taj Sports Club and write a letter to Mercury Sports Club asking for quotation.\r\nTAJ SPORTS CLUB\r\n34, Anna Nagar, Chennai -600 040. PH: +91-44-66222552.\r\n7th April 2015\r\n\r\nTo \r\nM/S. Mercury Sports Club, \r\nNo. 15, New Road, \r\nThousand Lights, \r\nChennai – 6.\r\nSirs, \r\n	Sub : Supply of sports materials – Quotation called for. \r\n            We are leading sports club in Chennai. We are placing an order for the following items with 20% discount for immediate purchase. \r\n  1. Volley ball (Practice)	   -	 20\r\n          2. Volley ball (Tournament)  -         15\r\n                                  3. Volley ball net (Practice)   -	           5\r\n                                  4. Volley ball net (Nylon)      -	           5\r\n          5. Basket ball		           -        15\r\nPlease take care to have the goods delivered carriage paid  at the above address by 20th April 2015. \r\nWe look forward to your immediate reply. \r\n                                                                                               Yours faithfully, \r\n                                                                                                               Sd/-\r\n                                                                                                         K.VASUDEVEN \r\n                                                                                        Secretary – Taj Sports Club\r\nWorksheet \r\n3. Order by post, some text books and guides from S.H.Book Depot, Chennai.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nSAMPLE OFFICIAL LETTER-1\r\n	Letter to the Editor, Office (Municipality, Commissioner etc.) fall under this category. Letter to the Editor is an explanatory letter about an issue or problem in the area known to the sender.  The matter should be precise. The format for the letter to the editor is same as business letters. The Salutation should be ‘Sir’ and the ending should be ‘Yours truly’. The sender should mention his/her complete address as anonymous letters are not published by the newspapers. At times, the sender may refer himself / herself as “A sufferer” but with his / her complete address.\r\n4. Write a letter to the Editor of a daily paper, pointing out the need for immediate improvements in the roads of your place of living.\r\nFrom\r\nR.Nirmal\r\nThe Councillor – Ward No. 24\r\n24, Amman Koil Street\r\nSattur\r\n\r\nTo\r\nThe Editor\r\nThe Hindu\r\nChennai\r\n\r\nSir,\r\n	Sub.  : Complaint about the bad condition of roads – regarding\r\nI wish to bring to your kind notice, the very bad condition of the roads in Sattur locality. We have a rich Municipality but the badly broken roads are a dishonor to the town. The buses which travel through Sattur are many in number.  Sattur is the only route through which people can travel from Sivakasi or Madurai to Kovilpatti, Tuticorin, Tirunelveli, Nagerkoil etc. \r\nSome of the roads are full of pits. They become nuisance during rainy days. The journey troubles people dangerously at such times. Sometimes, it results in loss of life also. Many of the roads need to be repaired.\r\nI hope this letter will awaken the authorities concerned, to their sense of duty. \r\n\r\nSattur,										Yours truly,\r\n11.03.2015.					\r\n\r\n 										A sufferer.\r\n \r\n\r\nSAMPLE OFFICIAL(GOV /PSU ) LETTER-2 \r\nThrough proper channel \r\nTo                                                                                                                     Date :02/02/2021\r\nThe HR /Manager \r\nDepartment: MFG/Testing \r\nChandigarh \r\nSir,\r\n	Sub.  : Complaint about the bad condition of roads – regarding\r\n   \r\n                 ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::\r\nI hope this letter will awaken the authorities concerned, to their sense of duty. \r\n\r\nThank you\r\nName of person or staff\r\n……………………………...							Yours truly,\r\n.					\r\n\r\n 										A sufferer.\r\n\r\n\r\n\r\nWorksheet \r\n5. Draft a letter to the Municipal Commissioner complaining of mosquito trouble in your locality.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nLETTER TO THE STAFF / HEAD OF THE DEPARTMENT / PRINCIPAL\r\nThese letters fall under formal category and the format is same as the business letters.\r\n6. Write a letter to the Principal of your College asking him for the testimonial.\r\nFrom\r\nMiss.M.Hema\r\nD/O. Mr.K.Babu\r\n16, Market Road\r\nMadurai\r\n22 February 2015\r\nTo\r\nThe Principal\r\nV.H.N.Senthikumara Nadar College (Autonomous)\r\nVirudhunagar\r\n\r\nRespected Sir,\r\n	Sub.: Requisition seeking for the issue of a testimonial – reg\r\n	I was a student of our College for the past five years. I passed M.Com., with distinction last year. Last month, I applied for an American scholarship. Now I have been asked to appear for an interview in Delhi with a certificate from my College Principal. \r\n	During my period of study, I was one of the best students of my class.  I was awarded the General Proficiency Prize. I was also the captain of our College Football team. \r\n	Kindly issue me the testimonial at the earliest.\r\n					Thanking you\r\nMadurai									 Yours obediently\r\n22 February 2015\r\n										        M.Hema\r\n7. Write a letter to the Head of the Department of your College, informing him that you have secured a good job and thanking him for all that the College has done for you. \r\nFrom\r\nMr.S.Gupta\r\n16, West Car Street\r\nSattur\r\nFebruary 12, 2015\r\n\r\nTo\r\nThe Head\r\nDepartment of English\r\nVHN Senthikumara Nadar College (Autonomous)\r\nVirudhunagar\r\n\r\nRespected Sir,\r\n	I am happy to inform you that I got selected as the Probationary Officer in Indian Bank, Chennai. I shall get Rs.25,000 as a basic pay.\r\n	I was your student (M.A., English) last year and it is my duty to offer my heartfelt thanks to you and other faculty members of our department. You have taken pains to mould our habits, characters and make us good citizens. The discipline that we learnt in the classroom and the playground really guide us. Your words of advice and encouragement light our path in life. I will never forget your effort in making us converse in English inside our college campus. 	We can never forget your kindness and interest in building up our career. I have no words to express my thanks for all your kindness.		\r\nSattur							                            Your most obedient pupil\r\nFebruary 12, 2015\r\n									                S.GUPTA\r\nWorksheet \r\n8. Write a leave letter to your Class – in – charge asking leave for three days. \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n7. MEMO WRITING\r\nA memorandum or memo for short is a means of conveying information within an organization or a company. It is different from a letter which is meant for persons outside the organization. \r\nA MEMO is written in a simple matter - of - fact language. It has direct appeal and is written in an unemotional tone. It maintains cordial relation among the employees. \r\nThe function of a memo is to establish accountability / responsibility. Memo forms a permanent record of office information and decisions, which can be referred at later date. To convey some official information to a person in the office without calling him, the authorities can have the choice of memo writing. \r\nIt is meant for the following three purposes:\r\n1.	issued to a person / persons who is / are at fault and pulled up for his / her / their acts of commission or omission. \r\n2.	to fix the responsibility on the employee / employees who has / have gone wrong in the execution of an official work. \r\n3.	to convey some official information to the workers in the office without calling them.\r\nIn some companies, a memo has a specific protocol and format in a printed form. If there is no such form, you can choose your own format. The word “MEMO” comes from the Latin Memorandum, ‘a thing which must be remembered’. \r\nTYPICAL COMPONENTS OF A MEMO:\r\n1. HEADER: The Opening / Header Component consists of - \r\n                       i.   the Name of the Receiver and the Department that he belongs to\r\n                       ii.  the Name of the Sender and the department to which he belongs\r\n                       iii. the Date. \r\n                       iv. Reference number is needed  if the action / enquiry takes a long period.\r\n2. PURPOSE: A clear purpose statement (Subject) of the Memo. \r\n3. DISCUSSION: A brief background of the subject of the Memo, the detailed information about the Subject. \r\n4. ACTION: The benefits / recommendations / actions taken, whichever is applicable. \r\n5. SUMMARY: A clear concise statement, which stresses the purpose once again. \r\n6. CC or BCC - to whom that Memo is meant and the name and signature of the sender.\r\nSAMPLE MEMO I : (Reason 1: to a person / persons who is / are at fault and pulled up for his / their acts of commission or omission) \r\nAs the Principal of a Private College, draft a Memo to an employee who always comes late -  issuing him a warning. \r\nST.JOHN’S COLLEGE\r\nCHENNAI\r\nInter office Memorandum \r\nTo : Dr.S.Keshav, Associate Professor of Bio-Chemistry					\r\nFrom :Principal					                                         Date : March 11, 2015\r\nSub : Warning for being late to the work\r\n              It is noticed that you have been always a late comer to the College mostly.  You belong to this place only and there is no genuine reason behind your act. \r\n             The information was taken to the Principal’s notice as it affects the normal functioning of classes which you are handling. The Staff who are adjusting your classes find it hard to fit in it as they have not been informed earlier about your absence. The students also find it very difficult to cope with the situation as exams are nearing. Already many staff are overworking and still they are adjusting the situation without even murmuring. \r\n            If you come late hereafter, it would be considered casual leave.\r\n            Hence, you are directed to handle your classes as per the time table allotted to you. Hope you will be inside the college campus at the right time from tomorrow onwards.\r\n\r\nCC : Head of the Department						         Dr. SABARISH.N\r\n										   (PRINCIPAL)\r\n\r\nSAMPLE MEMO II : (Reason 2: to fix the responsibility on the employee / employees who has / have gone wrong in the execution of an official work) \r\nAs the Managing Director of a reputed company, draft a memo to the employees who spends more time in coffee break – issuing them a warning.\r\nBALA CHEMICALS PRIVATE LIMITED\r\nTIRUNELVELI\r\nInter office Memorandum \r\nTo : The Heads of all the Sections						             \r\nFrom : Managing Director 						    Date : January 8, 2015\r\nSub : Supply of tea during tea break\r\n             It  is noticed that employees who  go to canteen during tea break, stay there for  more than the  specified break time of 15 minutes. It is learnt that some of the employees return to work only after 30 - 40 minutes. It affects the normal functioning of the office work. \r\n            Hence, arrangement has been made to supply tea in their place of working itself during tea breaks. \r\n            This will come into effect from January 10, 2015. \r\n\r\nCC : The Heads of all the Sections					         ASHOK  METHA\r\n\r\nSAMPLE MEMO III : (Reason 3: to convey some official information to the workers in the office without calling them)\r\nAs the Chief Executive Officer, draft a memo to the employees advising them to be more economical in using stationery.\r\nSRINITHI  ENGINEERING GOODS PRIVATE LIMITED\r\nCHENNAI\r\nInter office Memorandum \r\nTo : Department Staff						\r\nFrom : Chief Executive Officer  				Date : February 23, 2015\r\n\r\nSub : Economy measure in stationery items\r\n             The cost of the stationery has increased greatly. The budget provision has almost decreased. \r\n             Hence, it is proposed to strictly follow certain economic measures in the use of office stationery. \r\n             One side blank papers will be supplied to the Departments which may kindly be used for the rough drafting of letters and routine office memos. \r\n\r\nCC : Department Heads & Staff 					     T.SURENDHAR \r\n                                                                                                       (Chief Executive Officer)\r\n\r\nWORKSHEET\r\nDraft the following Memos, inventing the details you think necessary. \r\n1. To the employees of a company announcing a change in the working hours and explaining the reasons for the change – announcing bonus as per their productivity.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n2. As the Correspondent of a CBSE school, draft a memo to the faculties who have very poor result of the classes they are handling.  \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n \r\n8. NOTICE, AGENDA, MINUTES\r\nNOTICES \r\n	A Notice is a piece of written communication announcing news about an event of the future or past and is meant for a particular set of people. It may be in the printed, written, or typed form. In newspapers we find various notices such as company notices to its shareholders, legal notices to the people concerned, tender notices inviting tenders for different works etc. In Schools and Colleges, we have Notices put up on the notice board and also those read out in the classrooms. While writing a Notice, the following points should be borne in mind. \r\n1.	The message should be written in a clear, brief and precise way. \r\n2.	If you are writing one for the examination, limit the number of words to around fifty. \r\n3.	It is good to use sub headings if the notice is slightly longer. \r\n4.	Aim of drafting a notice should be to attract the attention of the people. \r\n5.	The sentences need not be complete and it should be brief.\r\n6.	Use proper punctuation marks. \r\n7.	Numbers and abbreviations may be used. \r\n8.	Generally, there is no need for any Salutation or Complimentary Close, which are essential in a Circular. \r\n9.	The date should be written either below the caption to the right or below the message to the right or left. \r\n10.	The caption should be in capital letters and the authority issuing the notice must be mentioned at the beginning or end of the message. \r\n11.	The entire message may be boxed.\r\n12.	Always display the Notice in public places. \r\nNotices can serve a number of purposes in a work place / an institution. \r\n•	Report on matters of importance to Staff.\r\n•	Advertise Posts for internal appointment. \r\n•	Inform staff in new procedures and rules. \r\n•	Convey growth in development of the company. \r\n•	Announce social Programmes. \r\nIt is better to nominate a person to be in charge of the notice board. He would keep notice board neat and tidy and also remove old and outdated notice. \r\nThe Notice will have the following parts:\r\n•	Heading or Subject\r\n•	Body\r\n•	Date of issue\r\n•	Signature or name of issuing authority with designation, if any.\r\na)	For the college Notice Board : \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nb) A Notice from IIIT, Chennai in a Daily Newspaper: \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nWORKSHEET\r\n1. As the Headmaster of Vikas School, draft a notice to be displayed at the entrance and office, giving details about the rescheduling of half-yearly examinations with the timetable and syllabus for each class. \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n2. As the Secretary of your College Arts Club, draft a notice regarding inter-class cultural competitions to select candidates for the University Youth Festival. \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nAGENDA and  MINUTES \r\n             For holding a meeting, we issue a Notice with all the details to the people concerned. There should be an Agenda for a meeting and the Minutes should be written after the meeting. \r\n1. AGENDA \r\n             An Agenda is the programme of the list of items of business to be transacted at a particular meeting.  It gives the workers who will be attending a meeting, its planned programme or an outline of the business that will be conducted during the meeting. It helps to conduct the meeting in order, proceeding from one item to the next. Moreover, since it is often circulated along with the Notice, the members will have an idea of what is going to be discussed. If it is one of a series of meetings, the first item will be the reading of the Minutes of the previous meeting. \r\nSample Agenda for a Valediction  Programme\r\nVIRUDHUNAGAR   HINDU NADARS’ SENTHIKUMARA NADAR COLLEGE\r\nVIRUDHUNAGAR\r\n**Re-Accredited with ‘A’ Grade by NAAC**                        \r\nSOFT SKILLS TRAINING CELL: VALEDICTION DAY\r\nPROGRAMME SCHEDULE\r\nVenue: Multimedia Hall	                Time: 4.15 p.m.	          		Date: 3 /04/ 2012\r\n1.	Prayer \r\n2.	Welcome Address 	           : Miss. Evelyn Lysander, Asst. Prof. in Computer Science                                                                                \r\n3.	Honoring the Chief Guest          \r\n4.	Presidential Address           : Thiru S.A.S.Muralitharan, M.B.A., Secretary \r\n        V.H.N.S.N. College Managing Board\r\n\r\n5.	Felicitations 		          : *Thiru.T.R.Kandasamy, M.A.,  President	\r\n                                                               V.H.N.S.N. College Managing Board        \r\n                   				                   \r\n                                                            *Thiru. K.A.P.R.R.Chandrasekaran, B.Sc., B.A.,                                  \r\n                   Vice - President \r\n   V.H.N.S.N. College Managing Board, \r\n                                                              \r\n                                                            * Tmty. K.V.R.P. Parimala Prabakaran                 \r\n                                                                               Vice - President  \r\n    V.H.N.S.N. College Managing Board\r\n                                                         \r\n* Thiru.S.S.P.S.Thangarajan, Treasurer  \r\n                                                                V.H.N.S.N. College Managing Board    \r\n         \r\n            * Dr.P.Sundara Pandian, \r\n                                                                      M.Com., M.B.A., M.A., M.Phil., PGDPM  & IR,\r\n          PGDCA., DLLAL., Ph.D.,                                \r\n    Principal, V.H.N.S.N. College\r\n\r\n          \r\n	\r\n            \r\n* Dr.A.Shunmugasundaram,  M.Sc., M.Phil., Ph.D.,\r\n    Director of S.F. Courses, V.H.N.S.N. College\r\n\r\n       6.  Key Note Address:	           * Dr.R.Vairamuthuvel, Associate Prof. of Commerce\r\n                 M.Com., M.Phil., M.B.A., PGDCA., Ph.D. \r\n\r\n		     * Dr. R. Selvam, M.A., M.Phil., Ph.D \r\n		   Associate Professor  of  English    \r\n\r\n		        * Dr.N.Anandam, M.Sc., M.Phil., Ph.D. \r\n                          Professor & Advisor of M.C.A.\r\n7.	Distribution of Certificates\r\n8.	Vote of Thanks                     :   Ms.V.Jeya Santhi ,  Asst. Prof. in English.\r\n9.	National Anthem\r\n                         [ Compere: Miss. P.Athirstalakshmi,  Asst. Prof. in Computer Science]\r\n\r\n2. MINUTES – Procedure\r\n1. Reading the minutes of the previous meeting and approving it, is the first activity. \r\n2. Next activity deals with the amount of progress on issues already discussed. \r\n3. Refers to any resolutions in relation to the programs / issues already discussed.\r\n4, 5, 6, 7. Related to matters discussed on agenda for this meeting and the resolutions regarding them. \r\n8. Activity that is not dealt in the agenda but can be taken up for discussion and possible resolutions.\r\nSPECIMEN – NOTICE, AGENDA , MINUTES \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nSPECIMEN – MINUTES \r\n\r\n\r\n\r\n\r\n\r\n\r\nMINUTES\r\nJOHN’S COLLEGE (AUTONOMOUS)\r\nMadurai\r\nMinutes of the annual meeting of the Board of Studies in English (UG) held at the Department of English, John’s College, Madurai at 11.00 a.m. on 20 January 2015.\r\nMembers Present : 1. Dr. Suresh Chand (Chairman) \r\n     2. Dr.  John \r\n 			                       	     3. Prof. Shilpa \r\n     4. Prof. Das \r\n           5. Dr. Manoj Kumar \r\n                                   Members absent : 1.Prof. Uma Sankar\r\n                                                                 2. Dr. James\r\n\r\n1. Syllabus\r\n    No change to be made for 2015-2016 admissions \r\n2. Prescription of Text books \r\n    No change to be made for 2015-2016 admissions \r\n3. Comments on question papers set for previous examinations \r\n    The following may be brought to the attention of the Controller of Examinations:\r\n      a. In  Paper  VI of November 2014, the following questions were asked from outside the  \r\n          syllabus – \r\n•	In Q.No.1 and  Q. No. 4 both (a) and (b) were  outside the syllabus. \r\n•	Q. No.12 was too vague and general for a short answer.\r\n•	Questions from outside the syllabus may be avoided in future. \r\n\r\n\r\n4. The Chairman has the authority to submit the panel of question paper setters and   \r\n    Examiners to the Controller of Examinations. \r\n5. Restructuring of Courses to introduce job – oriented courses. \r\n           The proposal by Dr. John and Prof. Das for Skill Based Programmes and Personality Development Programmes for all the students to be conducted by the Department of English was approved.  \r\n6. Any other item admitted by the Chair \r\n           The proposal by Dr. Manoj Kumar for a Certificate, Diploma and Advanced Diploma Courses in Communicative and  Functional English to be  conducted  by  the Department of English was approved. \r\n             The meeting came to a close at 1 p.m. with a vote of Thanks to the Chair. \r\nSd/-\r\nDr. Suresh Chand \r\n                                                                                                                                      Chairman\r\n\r\nWORKSHEET\r\n1. Assume you are the Student Representative of your Department. Draft an Agenda for the Inauguration of your Department Literary Association Meeting. \r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n2. As an Office Bearer of your College Students ’ Association, you are assigned the job of writing the minutes of your College Annual Literary Festival. The meeting has been called to discuss the venue, date, time, the events and the budget for the annual literary festival. Draft the Minutes of the meeting.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n9. Designing a Resume\r\n A FEW GUIDELINES FOR A BETTER PRESENTATION\r\n        		The term \'RESUME\' is used in the United States. Its equivalent \'CURRICULUM VITAE\'[CV] is preferred in England and European Countries. It is also used in India but of late \"RESUME\" has gained higher frequency of use.\r\n                  Resume writing is the first step in securing a job. It is a tool for obtaining an interview, not a job. You may have excellent subject knowledge and wonderful skill and talent.  But unless you communicate them explicitly, you may not be able to reach the interview stage. In the modern context, a resume should be considered a marketing tool. It is the content of the resume that determines whether or not you should be called for an interview. It is also your first indirect contact with your employer. The employers receive hundred / thousands of resumes every day.  If they look the same, it will be dull and dreary. So, your resume should be different from that of others in all respects. \r\nMAIN PURPOSE OF THE RESUME:\r\n As a marketing tool, the main purpose of the resume is to sell yourself. Hence-\r\n1.	Find out what type of candidates, the employer has in his mind and you should design your resume accordingly.\r\n2.	Find out whether your qualifications, experience, talents and personal skills match the employment needs and job requirements.\r\n3.	The next step is to do a SWOT [strengths – weakness – opportunities – threats] analysis. Outline your skills, abilities, work experience and extracurricular activities. What are your strong features and what makes you unique? Make sure you convey this information in your resume. \r\nSo, start designing your resume that could be your ticket to the job of your dreams.\r\nLet your resume speak for you even before you enter the interview hall.\r\nEMPLOYER’S /EMPLOYMENT           EMPLOYEE’S [YOUR] RESUME\r\n		NEEDS				CONTENT\r\n?	What are you?		            Your education, experience and \r\n personal skills\r\n?	What have you done so far?	Your past professional  accomplishments\r\n?	What can you do for us?	            Your plan for the development of the  \r\n					            Organization\r\n?	    What are your further plans?      Your professional growth and its \r\n						 contribution to the organization.\r\nThe above four items of information should form the ‘nuts and bolts’ of your resume. Apart from the basic categories, you can add on details to make  it   more impressive. Always \r\nmake a rough resume with all the details before you finalize onto the fair one.    \r\nDESIGNING AND FORMATTING YOUR RESUME:\r\nHere are some tips to help you in formatting your resume.\r\n?	Keep the  font size within 10 - 12.\r\n?	Use white or off-white paper and a skilled looking font such as Times                       \r\n       Roman, Ariel or Helvetica.\r\n?	Use non-decorative typefaces.\r\n?	Choose one typeface and stick to it. Avoid italics, script and underlined words.\r\n?	Do not use horizontal or vertical lines, graphics or shading.\r\n?	Do not fold  your resume.\r\n?	If you must mail your resume, put it in a large envelope.\r\n?	Resume is for freshers. So limit the length of your resume to 2 pages.\r\n?	Curriculum Vitae (CV) is for experienced candidates. So it can be \r\n      formatted up to 4 or 5 pages.\r\n?	It is advisable to use bulleted sentence format as it makes reading                          	easier.\r\n?	Use action words, while framing sentences, to convey your work \r\n      experience. Bulleted sentences that begin with action words like                                              ‘prepared’, ‘monitored’, and ‘presented’ are more impressive.\r\n?	Proofread, proofread, and proofread. Be sure to catch all spelling errors,         grammatical weaknesses, unusual  punctuation and inconsistent  \r\ncapitalizations.\r\n?	Laser print  it on plain, white paper.\r\nHere are two examples of bulleted sentences with action words and figures.\r\n?	Managed an academic department of 10 with an annual budget of Rs.1,00,000.\r\n?	Increased sales by 15% in a 5-state territory of Western India.\r\nSince a resume is typically reviewed in 30 seconds, take the time to determine which bullets most strongly support your job search objective and put those first.\r\nBUILD YOUR RESUME:\r\n		There is no standard format for preparing your resume. But, a resume should summarize your education, skills, accomplishments and experiences. We can go through the given basic categories, which help you to make a resume.\r\n\r\n\r\n  1.NAME, ADDRESS AND TELEPHONE:\r\nOne has to give his / her permanent address with phone number if any. If you have an e-mail address, include that too.\r\nFor example:\r\n             Affix    \r\n      your   recent \r\n     passport size    photo  if there is \r\n      need.                    \r\nSANJAY AMULRAJ\r\n42, Geetanjali apartment\r\nKodampakkam High Road\r\nChennai – 16\r\nMobile: 98462 38576	\r\nE – mail :  sanjay.r@yahoo.com\r\n\r\n2.OBJECTIVE:\r\nIt should be brief and to the point. It must give the employer an idea about your  work preferences and where you want to be in your career in future.\r\nFor example:\r\nSeeking a  challenging   position with opportunities for career advancement and learning.      \r\n					or\r\nTo have a   long  career in the (particular field), gain further skills and attain the goal of the organization aiming at mutual growth.\r\n					or	\r\nTo achieve a responsible position in your esteemed organization, where I can utilize my skills and talent; and be a part of the team that works towards the success of the organization.\r\n3.EDUCATION:\r\nHere, one has to include your degree, specialization, institutions attended, year of graduation, subsidiary subjects studied, and any special workshops, seminars, related courses or projects done. You can give your qualifications separately as   professional [PG/ Engineering], academic [your UG / +2 / S.S.L.C.] and  technical [Computer skills, typing, shorthand …]. Educational qualifications should be presented in the reverse order. Your highest educational qualification should top the list of your academic record.\r\n   For example:\r\n   i) PROFESSIONAL QUALIFICATION:\r\n?	M.B.A.: First class with distinction 		      	– 88% May 2014\r\n      PSG College of Engineering & Technology\r\n      Coimbatore. \r\n\r\nii) ACADEMIC QUALIFICATION:\r\n?	B.B.A.: First class with distinction		     	– 86% May, 2012\r\nSt.Xavier’s College of Arts & Science \r\n42, Church gate Road\r\nMumbai – 400 020.\r\n?	Standard XII: Mathematics & Science: First class 	 – 80% May 2009\r\n      St.Xavier’s  Hr.Sec. School,\r\n      Mumbai.\r\n?	S.S.L.C.: First class 					  – 88% May 2007\r\n                  St.Xavier’s High. School,\r\n                  Mumbai.\r\n\r\niii) TECHNICAL SKILLS:\r\n?	Computer Literacy: C, C++, Advanced java, Oracle\r\n?	Good knowledge on Internet Security\r\n?	E-Commerce transactions\r\n?	   System Analysis and any other technical skills you possess.\r\n\r\n4.CO-CURRICULAR ACTIVITIES:\r\nHere, you have to mention the projects done by you .\r\nFor example:\r\nPROJECT 1:\r\nTitle			:\r\nTeam Size		:\r\nLanguage		:\r\nSoftware		:\r\nObjective		:\r\n\r\n5.EXTRA CURRICULAR ACTIVITIES:\r\nHere, you have to mention  your activities regarding Sports, Games….. \r\nFor example:\r\n?	   Won State level Trophy in Football conducted in Thiyagaraja  \r\n             College, Madurai  20 November 2014.\r\n\r\n  6. SKILL SUMMARY / SKILL SETS:\r\nHere, you have to mention your skills such as:\r\n?	  Positive attitude\r\n?	  Problem solving skill\r\n?	  Individual as well as Team work\r\n?	Fluent in Tamil, English and Hindi\r\n\r\n\r\n7. WORK EXPERIENCE / CAREER GRAPH / EMPLOYMENT HISTORY:\r\nHere one must give the details regarding the place you have worked, the position you held, your responsibilities and achievements (work projects done, targets achieved), the dates or period you have served in the organization etc… Use action words to describe your job duties. The work experience should begin with your present position and move back to the entry level appointment. \r\n   Include the following information:\r\nTitle of position\r\nName of Organization\r\nLocation of work (town, state)\r\nDates of employment\r\nDescription of your work responsibilities with emphasis on achievements\r\nOther information\r\n\r\nYou may also add:\r\nLeadership experience in volunteer organizations\r\nParticipation in sports \r\n\r\nFor example:\r\nMay 2014 – till date: K.H.TEHNICAL SUPPORT INC, Sip cot, Ran pet\r\n                                    Sales Manager – senior.\r\n?	Establish corporate Accounting systems and procedures with the design of a computerized system for current Accounting practices.\r\n?	Responsible for profit and loss projections, cash flow projections and cash distributors.\r\n?	Prepare all Federal / State tax returns consistent with statuary requirements.\r\n\r\n   June 2011 – May 2013: IVANHOE EQUIPMENT CORPORATION, New Delhi                   \r\n                                           Accounting Conversation Staff.\r\n?	Contracted assignment through the Technical Aid Corporation.\r\n?	Performed accounting duties and functions during conversation of manual accounts payable procedure to computerized systems.\r\n\r\n  8. PERSONAL PROFILE or PERSONAL DATA:\r\nYour personal details like Your name, your Father’s Name, Your date of birth, permanent address and contact number, e-mail, passport details, hobbies, languages known etc… should be given here. While writing ‘Languages Known’, you have to mention whether you can “Read / Speak / Write’. For example\r\nLanguages Known: \r\n?	Tamil    : Read / Speak / Write\r\n?	English :  Read / Speak / Write\r\n?	Hindi    :  Speak\r\nThere is absolutely no need to write about your family background, marital status and health. Even hobbies like stamp and coin collecting is considered outdated.\r\n9. REFERENCES:\r\nThe resume generally ends with a reference. It is the usual practice to cite three persons – two to certify your professional skills, managerial abilities and academic records; and the third one to support your character and family background. Fresh candidates can cite their professors, research guides and dept. heads. The senior persons with several years of experience should make their superiors, colleagues and even persons who worked with / for them as their referees.\r\nReferences should be given with prior consent from the relevant people. This must include their name, posting, address and phone number. It is not essential to give reference in a resume. You can state that-\r\nReferences:        References can be furnished if needed.\r\n                                                 or\r\n                             References furnished on request.\r\n                                                 or \r\n                             Will be made  available on request.\r\n\r\n10.DECLARATION:\r\nA resume should end with Declaration. The usual format is-\r\nI hereby declare that the above given details are true to my knowledge and belief. If  given chance, I would do  my duty  sincerely and honestly.\r\n(or) any other related format.				\r\n				Thanking you / I thank you sir.\r\n\r\nPlace:					                            Yours truly (or) sincerely,\r\nDate		          : 							           S/d\r\n\r\n								                      [Your Name]\r\nELECTRONIC RESUME\r\n	Most of the companies have their own web page where they pay their application form with details of job requirements. You can download the relevant form and fill in and send it by post or even transmit it on line. The internet based resume has certain distinct features. It is the computer that sorts out the electronic resumes. The computer is programmed to read keywords like nouns or short phrases rather than action words. If the computer evaluates that there is a match between job requirements and your skills, talents and education spot highlighted by keywords, you are sure to be selected for interview. Repetition of keywords may not help you in any way. Visual appeal like different fonts, italics, bold face, underlining etc.. may have no effect on the computer and they are not required in an electronic resume.\r\n		 SAMPLE RESUME 1:  [FOR CS, IT & BCA]\r\nRESUME\r\nCareer Objective:  To be associated with a firm which provides opportunities for career development through my knowledge and skill. \r\n\r\nEducational Qualification \r\n\r\nQualification	University/Board	Month-Year 	Percentage\r\nB.C.A.,	Madurai Kamaraj University	April  2003	58.08 %\r\nH.S.C	State Board – Govt. Hr. Sec. School, Sattur	March 2002	75.33 %\r\nS.S.C	State Board- Govt. Hr. Sec. School, Sattur	March 2000	76.00%\r\n\r\nComputer Skills\r\n1	Basic of C Language \r\n2	Knowledge of AutoCAD with 2D & 3D Modeling.\r\n3	Knowledge of all editions of windows & MS Office.\r\n\r\nIndustrial Training\r\nOrganization:      		 XXXX\r\n                                                         THANE as trainee  engineer.\r\n         Job experience:     	         20 days\r\nProject                    \r\n “A Feasibility Study Of Modernisation Of Pump As Turbine And Motor As Generator”\r\n\r\nSeminar\r\n“Electronically Controlled Road Sensing Suspension Technology”\r\n\r\nElective Subject\r\nAutomobile \r\nPersonal Profile\r\nName                   : 	XXXXX\r\nFather’s Name     :	XXX\r\nNationality          :	Indian\r\nDate of Birth       :       25th may 1985\r\nSex	                :	Male\r\n\r\nAddress              :        AAAA-2\r\n		             XXXX-424001\r\nTelephone No     :        12121, 11111\r\nE-Mail Address    :       XXXX@yahoo.co.in	\r\nMarital Status	     :	Single\r\nHobbies	     :      Playing Cricket & chess, watching TV\r\nLanguages Known:     English, Hindi and Marathi\r\n\r\nI hereby declare that the information given herewith is correct to my knowledge and I will be responsible for any discrepancy.\r\n\r\nPlace:									Yours sincerely\r\nDate:                                                                                                          XXXXX\r\n                                      \r\nSAMPLE RESUME 2:    [FOR PG STUDENTS]\r\n                                                                 RESUME\r\nNAME XXX\r\nS/o YY\r\nAAAA,\r\nXXXXX,\r\nChennai.\r\nPin -\r\n                         		                                   	                 Ph: 1111111111  							                                         E-mail: xyz@zycx.com\r\n__________________________________________________________________________\r\n\r\nOBJECTIVE:\r\n	To be a part of a progressive firm offering opportunity for career advancement and Professional growth and which will help me gain sufficient knowledge\r\nEDUCATIONAL PROFILE \r\n\r\nCourse	\r\nInstitution\r\n	Board /\r\nUniversity	Year of\r\nCompletion	\r\nAggregate\r\n(%)\r\nMCA	Thiagarajar Engineering College\r\nMadurai.	Anna  University	\r\n2006\r\n	\r\n70\r\n\r\nB.Sc (IT)	\r\nB.C.A.S.College\r\nChennai	\r\nAnna University	\r\n2003	\r\n73\r\nH.Sc.,	\r\nRajus Hr. Sec. School\r\nRajapalayam	Board of  Higher Secondary Education	\r\n2000	\r\n66.3\r\nSSC	\r\nSai High School,\r\nMadurai	Board of\r\nSecondary\r\nEducation.	\r\n1998	\r\n66.3\r\n\r\n\r\nACADEMIC PROJECT (MCA)\r\nDuration: 5 months\r\nSoftware Requirements: Visual Studio.Net, SQL Server 2000 / MSAccess\r\nDescription:\r\nPoll Designer is a powerful .NET web control that will let you create any poll in seconds. It is very easy to use and is composed of two key controls. The poll box web control shows all answers of your poll in the specified format. This control can be used directly with the VS.NET visual designer or web matrix, however real questions / answers of your poll will only show up on a page served by IIS.\r\n\r\nSOFTWARE SKILLS: \r\n\r\nLanguages	:  C, C++,C#.NET\r\nOperating Systems	:  Windows XP, UNIX	\r\nRDBMS	:  Oracle (SQL, PL/SQL)                                      \r\nMarkup & Scripting	: HTML & Java Script\r\nWebApplication	: ASP.NET\r\nAREAS OF INTEREST:\r\n      Oops, D.B.M.S and O.S Concepts.\r\nPERSONAL PROFILE:\r\n	Name                             :	AAXXXXX\r\n	Date of Birth                  :	26-04-1983.\r\n	Father’s name               :	XXXXX\r\n	Languages Known        :	English and Telugu\r\n      Permanent Address      :	   S/o. XAXAX, \r\n		   XXXXXXX, \r\n		Chennai, Tamilnadu \r\n		Pin- 522101\r\n      Phone No                      :  91245 65744\r\n      E-mail                            :  xxxx@rediff.com \r\nDECLARATION:\r\nI hereby declare that the information furnished above is true to the best of my knowledge.   \r\n\r\nPlace:						                       		    Yours sincerely,\r\nDate :   															      															                             (XYZ) \r\n				\r\nSAMPLE RESUME 3: [IN GENERAL]\r\n\r\n\r\nRam K						      Mobile : +91 89905 42620\r\n      Mail me at : anbu@yahoo.in\r\n___________________________________________________________________________\r\nCareer Objective:\r\n	To become a ___________________ in your Esteemed Organization, where I can utilize my skills and talent; and be a part of the team, that works towards the success of the Organization.\r\nAcademic Profile:\r\n   i)PROFESSIONAL QUALIFICATION:\r\n?	Pursuing M.A., English (Batch 2011 – 2013)  \r\nFirst class with distinction upto 3nd Semester  – 88% :  May 2011\r\n               PSG Arts and Science College \r\n               Coimbatore. \r\nii)ACADEMIC QUALIFICATION:\r\n?	 B..A.,English  (Batch : 2008-2011), at  XXX College, Madurai  with  81 % \r\n?	Finished  Plus two at XXX Matric Hr. Sec. School, Sattur in 2008 with 81.5 % \r\n?	Completed SSLC at XXX  Hr.Sec. School, Sattur in 2006 with  84 % \r\nCo-Curricular  Activities :\r\n?	Bagged 2nd prize in an Inter Collegiate meet “ZESTA 2010” in XXX College , Kovilpatti\r\n?	Presented a Paper on “Indian Fiction: A Scrutiny” in SG College, Madurai on August 3, 2011\r\nExtra-Curricular  Activities :\r\n?	Obtained Grade A in Visual Basic course in SSS Infotech, Sattur\r\n?	Completed a course on Computer Hardware in Topcon Computer Education , Sattur\r\nAchievements:\r\n\r\n?	Scored Centum in Mathematics in SSLC.\r\n?	Bagged silver medal for scoring first mark (92.5%) in English in +2.\r\nSkill  sets : \r\n?	Excellent communication skills\r\n?	Positive Attitude\r\n?	Individual as well as Teamwork \r\n?	Problem Solving Skill\r\n?	Inclination to make a career out of technology support\r\nTechnical Knowledge: \r\n?	Languages 				: Basics of C, C++, VB                                                                                                                                                                                                                                                                                                                                                       \r\n?	Mark up / Scripting Languages	: HTML, Java Script\r\n?	DBMS  Related			: MS Access\r\nPERSONAL DETAILS\r\nDate of Birth                                      :  17 May 1992\r\nGender                                               :   Male\r\nFather’s Name                                   :   Krishnamoorthy. M\r\nLanguages Known                             :   English and Tamil.\r\nPermanent Address                            :   XX, YYY,\r\n	                                                Sattur – zzzzzz.\r\nI hereby declare that all the information above is true to the best of my knowledge.\r\nDate    :								         Yours sincerely,\r\nPlace   : Sattur								 \r\n										 Signature\r\n							                   [Name in CAPITALS]\r\nWORKSHEET\r\nDesign your Resume in the above given format highlighting your skills.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n10.Welcome Speech / Welcome Address\r\n               Welcome address is vital in any function because it heralds the commencement of the programme or function and sets the feel of the function. A pleasing welcome speech has its effect throughout the function from the beginning till the end. In English, it differs as per the occasion demands; for example, a wedding welcome speech, a graduation welcome speech, a welcome address in a seminar / conference etc will be totally different in the phrases and terms used. Giving away a “welcome speech” and \"vote of thanks\" are some of the responsibilities bestowed on us if we work in an organisation.\r\nThis chapter guides you with how to do a formal welcome speech.\r\nCharacteristics of a welcome speech:\r\n•	Welcome speech should be brief. It should start with greeting the dignitaries on and off the dais.\r\n•	This is followed by a brief description about the objectives of the meet. \r\n•	The chief guest of the formal function should be welcomed first; then the other important guests on the dais should be addressed; it should be followed by guests on the front row and then everybody down the hall. \r\n•	On some occasions, if the chief guest is not a known person, a brief introduction of the chief guest is also given by the person who gives the welcome speech.\r\n•	A welcome speech should not be concluded by thanking.  It should make the participants be at ease and eagerly waiting for the upcoming events. \r\n•	Maximum duration of welcome speech can be three to four minutes. \r\n•	Care should be taken to make the speech livelier. \r\nSome common \"welcome quotes\"\r\nI extend a hearty welcome to________________\r\nI offer a warm welcome to ____________________\r\nI accord a genial welcome to __________________________\r\nI am delighted to offer a happy welcome to _____________________\r\nI request the members of the audience to join me in offering a warm - hearted welcome \r\nto __________________\r\nI salute   him / her    with a winsome welcome \r\nI welcome  ____________________with the loving hearts of all present\r\nI welcome ________________ with my whole heart\r\nI welcome  ________________ with all my heart\r\nLet me offer     you      a pleasant welcome \r\nPlease permit me to offer     you      a fraternal welcome\r\nWe feel honored in offering     you     a cheerful welcome\r\nWELCOME SPEECH: SAMPLES\r\n1. Opening Speech for UG Literary  Association of your Department\r\nEsteemed Head of the Department of __________________ , honourable Chief Guest of the Programme Mr./Mrs./Dr.___________________, our most valued invited faculties and my sincere student friends, Good afternoon everybody.  \r\nIt gives me immense pleasure to welcome you all to this UG Literary Association Meet this year. I am extremely grateful to you all for sparing some of your precious moments (valuable time) for us and grace this occasion. \r\nThe presence of our Chief Guest in today’s programme inspite of his / her busy schedule is a reflection of the importance that is attached to the commitment of our department to quality growth. We are all inspired by your gracious presence Sir / Madam.\r\nI would like to take this opportunity to express our hearty welcome to the Head of our Department for the support and guidance he / she has extended to all the activities of our department.\r\nI take immense joy in welcoming the President of this Association who encourages us with his minute – to – minute guidance for the success of this programme. \r\nI take this opportunity to welcome all the faculties who are dedicated and result-oriented.\r\nWe welcome all our student friends who are eagerly waiting for listening to our chief guest’s motivational speech on __________________________.\r\nI owe my greeting to all who are associated with the success of this Meet.\r\nOnce again I welcome you all.\r\n2.Opening Speech for a Programme\r\nEsteemed excellencies, distinguished delegates, honourable teaching and non-teaching faculties, good morning to you all.\r\nIt gives me great pleasure to extend you all a very warm welcome on behalf of the ___________Name of the Department_________. We are grateful to the dignitaries who have accepted our invitation to this ________________Name  of the Programme________________ in our College. \r\nI am happy to note that the agenda of the Programme covers a wide range of very interesting topics for discussion. \r\nWe are aware of the tremendous effort made by the Management and the faculties of the Department for the success of this Programme. We wish them every success in their noble actions. \r\nIn concluding, I wish you success in your discussions and a very pleasant stay here.\r\n3. Opening Speech in a Seminar\r\nMr. Chairman, Honourable Delegates, Ladies and Gentlemen,\r\nIt is my privilege to address you, on behalf of the      Department_Name____.   We are happy to welcome the dignitaries and the participants to this Seminar on  ______Topic of the Seminar____.\r\nFirst of all, we express our sincere thanks and gratitude to our Management for hosting this Seminar; and for providing us with all the facilities which will undoubtedly contribute to the success of this Seminar. This magnificent meeting room with all modern interpretation equipment is but one example of these facilities.\r\nI wish to take this opportunity to welcome the participants from our State as well as other States like _____________________ who  have joined this seminar for the first time.\r\nI also wish to welcome ______________________________for financing the Seminar. \r\nMr. Chairman, Honourable Delegates, it should be pointed out that this Seminar was held in accordance with the recommendation of the UGC. Therefore, it becomes essential to research and discuss on the views on the               topic                                                           ; and of course, basically, the main purpose of the Seminar is to exchange ideas. We will have the opportunity to listen to experts at this Seminar on this matter. \r\nI am confident that the discussions held during the Seminar will lead us at the end to important conclusions on the subject of __________________________________.\r\nBefore I close, I’d like to thank each of your for attending our Seminar and bringing your expertise to our gathering. You, as organization leaders, have the vision, the knowledge, and the experience to help us pave our way into the future. You are truly our greatest asset today and we could not achieve in our future without your support and leadership. My personal respect and thanks goes out to all of you. \r\nIn conclusion, I should like to wish each and every one of you with success in their work. You can carry with you the best wishes of our College for a productive and successful Seminar, and a pleasant stay amongst us. \r\nThank you\r\n4. Opening Speech in an Association\r\nGood morning Members,\r\nWe thank you all for coming and joining us here today. We are pleased to welcome those who have been with us from the beginning and those who are new to our association. \r\n\r\nJust before we get started, I would like to express my gratitude to all of you who generously helped us to make this event successful,  (mention names of individuals you wish to thank here). We couldn\'t have done it without you! \r\n\r\nIn today\'s gathering I would like to focus on all our new volunteers who have joined us since January 2015. You have all chosen to be a part of our association and we hope we can achieve our individual as well as group goals.  During the next few months, you will be getting to know more about our planned activities and special events where you will be able to join in and get your very own hands on experiences.  I hope you will also be meeting lots of new people and making new friends along the way. \r\nHere at (name of association),  we value and cherish the friendships we make which in turn last for many many, years to come. So a very warm welcome to all of you, please come and find me in the (Place) if you have any questions, suggestions or just want to meet and say hi! \r\nLadies and gentleman, and our (Coordinator Name) - ...Thank you. \r\n5. Opening Speech for the Opening Day of a New School / College\r\nGood evening to one and all who assemble here.\r\nMay I take this opportunity to welcome you all, and to extend a further word of welcome to everyone here this evening?\r\nThe Opening Day of our new School / College Name is certainly a moment that we should all value and enjoy. If you take a quick look around you, I\'m sure you will all agree that our School  College  has come a long way in the last few months.\r\nIt all started as a dream of establishing a world class educational institution; a School / College that would mould and guide future generations of enlightened minds.\r\nWe would like to extend our gratitude and thanks to all those who made it possible for the dream to become a reality. Tonight marks this occasion - the Opening and Commencement Ceremony of our School / College. \r\nHowever, our young ladies and gentlemen students too are beginning to realize the importance of self-motivation and are prepared to help themselves to further their education. I have no doubt that they will remain motivated in the classroom to achieve their goals.  Their education is sound, creative and innovative; and with their parents’ support they will make this a reality. \r\nThis year, the Parents Association will continue to tirelessly take action to help raise funds for [name of school]. The Managing Board will plan and work towards an educationally sound and innovative future for our School. \r\nThe teachers / faculties at [name of school / College ] will help the students to achieve academic, sporting, cultural and life-long learning. May I take this opportunity to thank the teachers for their continued professionalism, excellence and dedication? It is your motivation in the classroom that helps to create a year that is bright with opportunities. \r\nYou will help the students to solve their problems through innovation and invention. And, you will help the students to  turn indifference into motivated, helpful action. \r\nThis is our goal as the year at [name of school / College] commences! Let\'s continue to work together to do our best for the world! \r\nYou are all most welcome to stay here this evening. I hope you enjoy the rest of the evening\'s program and thank you for sharing this special event with us.\r\n10.2.Vote of Thanks\r\nHow to write \"vote of thanks\"?\r\n               Vote of thanks for a function is given during the end of function. It is a brief talk given on behalf of the organization as group to a specific person or group of people. \r\n                For a formal function, the organizing secretary or an equivalent member who is involved in the function from beginning till end is the best person to give away the vote of thanks.\r\n                Just like a welcome speech, vote of thanks should also be brief. As thanksgiving is the concluding session, everyone including the person who is giving the \"vote of thanks\" may be tired and bored especially if it is for the valedictory function. The aim of vote of thanks is not to summarize the programme or to bore anyone else  but to thank everyone who has made the show a success.\r\nThe order of speech for \"vote of thanks\"\r\n              As in welcome speech, there should be an order of thanking according to the importance. For a formal function, it is best to thank the chief guest first, then the dignitaries on the dais, people in the front row and then everybody down the hall.\r\n              While drafting the speech, thanks should be given to each individual who is responsible for the arrangements, catering, setting up event, organizing the event etc. It ends with a call to applause from the crowd for all the efforts taken for the successful organization of programme.\r\nThink about people who are responsible for:\r\n•	invitations stage                   * setting and lighting         * catering\r\n•	technical arrangements        *  musicians                       *  the press and media contacts\r\nTo be avoided  \r\n•	Avoid too much of thanking own people from the organisation. \r\nFor example; when you deliver vote of thanks for an annual day or college day, one of the faculties who was involved in the organisation may be given the responsibility to give away the vote of thanks. It may not look appropriate to keep thanking the entire departmental faculty for their active participation in the programme, because they might have done it as part of their job responsibility and it may not look appropriate to pat our own shoulder in the public.\r\n•	Take care not to be critical or evaluative about the day\'s events in thanks giving speech.\r\n•	A vote of thanks speech is not an attempt at summarizing the events for the day. \r\nInstead it should be a way of showing appreciation with heartfelt words of gratitude. \r\n•	It can also be used as an opportunity to respond to the remarks, requests or promises made by the chief guest.\r\n•	Specify exactly what you are grateful for and it should be expressed in a sincere manner using suitable words. \r\n•	You will feel more confident if you have a small card with points written on who you want to thank and which phrase or words to be used for a particular person. \r\n•	Rehearsing the speech also helps in gaining confidence.\r\n•	Have eye contact with the audience and talk to the audience. \r\n•	Speak slowly with confidence and deliberately as you look around the hall.\r\n•	Use body language and gestures to emphasize the sincerity of your words. \r\n•	Smile on your face will enhance your appearance as well as leave the guests at ease.\r\nCommon expressions used for vote of thanks speech\r\nI thank……\r\nI am grateful to……\r\nLet me express my gratitude to ….\r\nI take this opportunity to thank…..\r\nWe remain grateful to…….\r\nOur words may not be capable of communicating our sense of gratitude to….\r\nWe offer our sincere thanks to….\r\nPermit me to mention our appreciation to …….\r\nI bow my head in gratitude towards …..\r\nMay I take this occasion to salute      him      with a great applause.\r\nWe are happy to mention our obligation to….\r\nWe express our gratefulness to…\r\nVOTE OF THANKS SAMPLES \r\n1. Vote of thanks for a Valedictory Programme \r\nWell, Mr. Chairman, ladies and gentlemen, an event like this cannot happen overnight. The wheels start rolling weeks ago. It requires planning and a bird’s eye for details. We have been fortunate enough to be backed by a team of very motivated and dedicated colleagues of our [institute /  organization] who know their job and are result oriented.\r\nI thank everyone for their involvement and their willingness to take on the completion of tasks beyond their comfort zones! \r\nGood morning everybody!\r\nIt gives me immense pleasure to welcome you all at this valedictory function of the_________________________________________. I am extremely grateful to you all for sparing some of your valuable time for us and grace this occasion. \r\nI deem it a great privilege to extend a vote of thanks on this historic occasion. This day will be remembered as a milestone in the history of  our ______department_____as it is the first occasion.\r\nWe thank the Hon\'ble __Chief Guest__in today\'s programme inspite of his extremely busy schedule. Thank you a lot Sir.\r\nI, on behalf of the entire organization  extend a very hearty vote of thanks for gracing the function and sharing with this august audience your vision of _____Topic________for our country.\r\nI would like to take this opportunity to express our hearty thanks to _____(organizer)_____for support and guidance he has extended to all of us in organizing this Programme.\r\nWe are very thankful to all the former Chairpersons & Vice-Chairpersons, Secretaries, Members for their support & valuable guidance.\r\nI take this opportunity to extend our most sincere thanks to all our guest invitees who have come from different places for their immense support and cooperation.\r\nI may also like to express our sincere thanks to media persons both print and electronic for giving an excellent coverage to our programme.\r\n\r\nMr. Chairman, ladies and gentlemen, once again I want to state that we are all most grateful to all speakers on this stage. We thank you for being with us this evening - it’s been a great pleasure. \r\nThank You Very Much!   [applause]\r\n2.Vote of thanks for the Valediction day of “Soft Skills Training Cell”\r\nGood morning to one and all who assemble here.\r\nWe feel honoured and delighted to have our College Managing Board, our esteemed dynamic Principal __________________________________, our beacon light ____________________, the Director of SF Courses, the backbone of this programme our Co-ordinator _________________________ who are with us here today.\r\nOn behalf of our Soft Skills Training Cell, I feel happy to deliver vote of thanks on this nice day.\r\nIt is a well-known fact that not only educational qualification but also the skills of the students that matters in getting and maintaining a good job. First of all, we thank our Management for establishing Soft Skills Training Cell in 2011. \r\nI wish to recall the selection of the name “Elite Forum”, a branch of this Training Cell. Elite Forum was named in honour of Evelyn Lysander Madam, who did her service as Assistant Professor in Computer Science, tirelessly for the success of this Cell. \r\nWe convey our thanks to our Principal and Director of SF Courses for their august presence here amidst their tight work schedule. We are happy to have their blessings also.\r\nTogether everyone achieves success – this acronym for TEAM becomes true here again  by   the Organizer’s    hard effort in arranging this successful programme. From the beginning, he takes effort in conducting coaching classes for Aptitude, Bank coaching examination and Group Discussion.\r\nWe thank all the members of the cell for their cooperation and effective contribution.\r\nWe thank our senior professors for training us in handling bank coaching classes.\r\nWe thank all the student participants for their energetic and enthusiastic participation in learning and enhancing their skills. \r\nWe thank our teaching and non-teaching faculties for their  help in successful completion of all the classes.\r\nFinally, we express our thanks to God, the ever powerful immortal behind us for giving us such great personalities and moral support for the success of this training cell.\r\nOnce again, I thank you all.\r\n3. Vote of thanks for a Seminar / Conference\r\nEsteemed………………………………………, Honorable…………………………………, Respected………………………….. , our most valued invited guests, ladies and gentlemen! \r\nIt\'s my privilege to propose a vote of thanks on this occasion. I, on behalf of [name of the organization of the event__________________________________] extend a very hearty vote of thanks to all, for sharing with us your ideas and opinions today!\r\nA big \'Thank You\' to [name speaker 1] for her/his efforts towards [speech topic]. \r\nI must mention our deep sense of appreciation for [name speaker 2], for her/his explanation of [speech topic]. \r\nFurther, we are grateful to [speaker 3], for demonstrating her/his [speech topic]. \r\nI also extend my thanks to [ organiser’s name_], for their enormous cooperation in the organization of this event.  \r\nI may like to express our sincere thanks to the media, press - both print and electronic, for giving an excellent coverage to the Programme. \r\nFinally, I would like to take this opportunity to place on record our hearty thanks to ………………………….for the support and guidance extended to all of us at [occasion__________________________________]. We are all inspired by your great words!  Once again, thank you.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n11. Group Discussion \r\n(www.freshers.com –website especially for fresher and final year students)\r\nAn interview can provide good data about an individual. Team work is important to make sure,  group and inter-personal qualities of an individual. Group discussion is a useful tool to make certain these qualities;  many organizations use GDs as a selection tool along with Personal Interviews, Aptitude Tests etc. A GD is an activity where \r\n•	Groups of 8-10 candidates are formed into a leaderless group, and are given a specific situation to analyse and discuss within a given time limit, which may vary between twenty minutes and forty-five minutes, or \r\n•	They may be given a case study and asked to come out with a solution for a problem \r\n•	They may be given a topic and are asked to discuss the same \r\nGD Tips   1. Initiation Techniques     2.Body of the group discussion   3.Summarization/ Conclusion \r\nInitiation Techniques\r\n•	Initiating a GD is a high profit-high loss strategy.\r\nWhen you initiate a GD, you not only grab the opportunity to speak, you also grab the attention of the examiner and your fellow candidates.\r\nWhen you start a GD, you are responsible for putting it into the right perspective or framework. So initiate one only if you have in-depth knowledge about the topic at hand. \r\nBody of the group discussion\r\n•	Different techniques to initiate a GD and make a good first impression:\r\ni. Quotes                       ii. Definition                        iii. Question          iv. Shock statement             v. Facts, figures and statistics          vi. Short story                     vii. General statement\r\ni.Quotes\r\nQuotes are an effective way of initiating a GD.\r\nIf the topic of a GD is: Should the Censor Board be abolished? you could start with a quote like, \'Hidden apples are always sweet\'.\r\nFor a GD topic like, Customer is King, you could quote Sam (Wall-mart) Walton\'s famous saying, \'There is only one boss: the customer. And he can fire everybody in the company -- from the chairman on down, simply by spending his money somewhere else.\'\r\n\r\nii. Definition\r\nStart a GD by defining the topic or an important term in the topic.\r\nFor example, if the topic of the GD is Advertising is a Diplomatic Way of Telling a Lie, why not start the GD by defining advertising as, \'Any paid form of non-personal presentation and promotion of ideas, goods or services through mass media like newspapers, magazines, television or radio by an identified sponsor\'?\r\n\r\niii. Question\r\nAsking a question is an impact way of starting a GD.\r\nIt does not signify asking a question to any of the candidates in a GD so as to hamper the flow. It implies asking a question, and answering it yourself.\r\nQuestions that promote a flow of ideas are always appreciated.\r\nFor a topic like, Should India go to war with Pakistan, you could start by asking, \'What does war bring to the people of a nation? We have had four clashes with Pakistan. The important question is: what have we achieved?\'\r\n\r\niv. Shock statement\r\nInitiating a GD with a shocking statement is the best way to capture immediate attention and put forth your point.\r\nIf a GD topic is, The Impact of Population on the Indian Economy, you could start with, \'At the centre of the Indian capital stands a population clock that ticks away relentlessly. It tracks 33 births a minute, 2,000 an hour, 48,000 a day which calculates to about 12 million every year. That is roughly the size of Australia. As a current political slogan puts it, \'Nothing\'s impossible when 1 billion Indians work together\'.\'\r\n\r\nv. Facts, figures and statistics\r\nIf you decide to initiate your GD with facts, figure and statistics, make sure to quote them accurately.\r\nFor example, you can say, approximately 70 per cent of the Indian population stays in rural areas (macro figures, approximation allowed).\r\nBut you cannot say 30 states of India instead of 28 (micro figures, no approximations).\r\nStating wrong facts works to your disadvantage.\r\nFor a GD topic like, China, a Rising Tiger, you could start with, \'In 1983, when China was still in its initial stages of reform and opening up, China\'s real use of Foreign Direct Investment only stood at $636 million. China actually utilized $60 billion of FID in 2004, which is almost 100 times that of its 1983 statistics.\"\r\n\r\nvi. Short story\r\nUse a short story in a GD topic like, Attitude is Everything.\r\nThis can be initiated with, \'A child once asked a balloon vendor, who was selling helium gas-filled balloons, whether a blue-colored balloon will go as high in the sky as a green-colored balloon. The balloon vendor told the child, it is not the color of the balloon but what is inside it that makes it go high.\'\r\nvii. General statement\r\nUse a general statement to put the GD in proper perspective.\r\nFor example, if the topic is, Should Sonia Gandhi be the prime minister of India?, you could start by saying, \'Before jumping to conclusions like, \'Yes, Sonia Gandhi should be\', or \'No, Sonia Gandhi should not be\', let\'s first find out the qualities one needs to be a a good prime minister of India. Then we can compare these qualities with those that Mrs. Gandhi possesses. This will help us reach the conclusion in a more objective and effective manner.\' \r\n1. Preparing for a Group Discussion: While GD reflects the inherent qualities of an individual, appearing for it unprepared may not foretell well for you. These tips would help you prepare for GDs: \r\nReading: This is the first and the most crucial step in preparation. While you may read anything to everything, you must ensure that you are in good touch with current affairs, the debates and hot topics of discussion and also with the latest in the IT industry. Also read multiple view points on the same topic and then create your point of view with rationale. Also create answers for counter arguments for your point of view. \r\nMocks: Create an informal GD group and meet regularly to discuss and exchange feedback. This is the best way to prepare. This would give you a good idea about your thoughts and how well can you convince. Remember, it is important that you are able to express your thoughts well. The better you perform in these mocks the better would be you chances to perform on the final day. Also try to interact and participate in other GD groups. This will develop in you a skill to discuss with unknown people as well. \r\n\r\n2. During the Group Discussion: \r\nWhat do the panelists assess: Some of the qualities assessed in a GD are:\r\nLeadership Skills - Ability to take leadership roles and be able to lead, inspire and carry the team along to help them achieve the group\'s objectives.\r\nCommunication Skills - Candidates will be assessed in terms of clarity of thought, expression and aptness of language. One key aspect is listening. It indicates a willingness to accommodate others views.\r\nInterpersonal Skills - People skills are an important aspect of any job. They are reflected in the ability to interact with other members of the group in a brief situation. Emotional maturity and balance promotes good interpersonal relationships. The person has to be more people centric and less self-centered.\r\nPersuasive Skills - The ability to analyze and persuade others to see the problem from multiple perspectives.\r\nGD is a test of your ability to think, your analytical capabilities and your ability to make your point in a team-based environment.\r\n•	Summarizing: If you have not been able to initiate the discussion, try to summarise and close it. Good summarizing would get you good reward points. A conclusion is where the whole group decides in favour or against the topic and most GDs do not have a closure. But every GD can be summarized by putting forth what the group has discussed in a nutshell. Keep the following points in mind while summarizing a discussion: \r\no	Avoid raising new points. \r\no	Avoid stating only your viewpoint. \r\no	Avoid dwelling only on one aspect of the GD \r\no	Keep it brief and concise. \r\no	It must include all the important points that came out during the GD \r\no	If you are asked to summarise a GD, it means the GD has come to an end. \r\no	Do not add anything once the GD has been summarized.\r\nSample Mock GD \r\nAditya, Bindhu, Charu, Daisy and Elango are waiting for their group discussion to start. They do not have a topic yet and are waiting for the moderator to make everybody comfortable. There, the moderator looks at the clock and announces: “You have 5 minutes for this group discussion. And your topic is ‘How to Succeed in Group Discussions.’ Please start.” \r\nBindhu: This should be interesting. A GD on GD! I think it is better if we should discuss the importance of a GD first. \r\nCharu: I find this very strange. How can you have a GD on GD? We should be discussing some current topic to test our knowledge. \r\nElango: I agree that this is rather unusual. At the same time, our job is to conduct a meaningful discussion regardless of the topic. Bindhu has suggested we start with the importance of GD. Today, GD is a very important part of various selection procedures. \r\nAditya: GD is all about teamwork. That’s all.  \r\nBindhu: Management is all about working with people. I suppose GD is one way of establishing one’s ability to work with others. How we are able to lead and be led. \r\nElango: We have some interesting points here. Leadership and sharing knowledge. Perhaps, a GD is a good tool to judge how well you are able to function within a group. \r\nDaisy: I want to say something. Pardon if I make any wrong. I am from vernacular medium… \r\nAditya: Don’t waste our time talking about your background. The topic is GD. Talk about that. \r\nBindhu: Every subject has various angles. So, many heads can raise many ideas. \r\nCharu: Also, too many cooks spoil the broth (laughs). \r\nElango: Yes, a group makes it possible to brainstorm any issue. Perhaps Daisy has something to add to this thought.\r\nDaisy: Thanks for giving me chance. A GD is good for ‘compromise.’ It is always better everybody agree. Otherwise only one person is there. \r\nBindhu: But the question is how to succeed in GDs. I think the first prerequisite is patience. Some of us must learn to shut up and let others talk (looks directly at Charu).  \r\n\r\nElango: I suppose the point is to participate and give others also a chance to participate. \r\nDaisy: Please can I speak? \r\nAditya: Come on! You don’t have to beg for permission to speak! \r\nDaisy: I said that because I thought someone might have wanted to speak before me. Anyway, is it not possible to only listen? \r\nModerator: Your time is up. Thank you everyone. \r\nModerator’s notes: Elango shows leadership skills and the ability to hold a group together. He appears to have a good grasp of the subject.  Bindhu also has some interesting ideas but she  is irritated easily. Charu is too sure and too full of herself to be able to contribute to a group. Aditya is guilty of  intolerance and rude interruptions. Daisy needs to work on her language and her confidence, though she may have the right concept.\r\n\r\nSample Group Discussion Topics for Campus Recruitment \r\nGD topics given for campus recruitments are normally fairly simple. You will be able to speak on them comfortably with a moderate level of knowledge base. The focus here is on the logic of the points that the participant puts forward, his communication skills and how well he is able to mix with the group. \r\nWe strongly advise students to read an English Newspaper daily and be abreast of current happenings and issues. \r\nI. IT INDUSTRY RELATED \r\n1. The future of Indian IT industry\r\n2. BPO - a rising opportunity or a passing fad?\r\n3. With the increasing use of IT in daily life, machines are controlling man.\r\n4. India - an IT super power?\r\n5. IT helps social integration\r\n6. Increasing use of computers is de-humanizing society. \r\nII. SPORTS \r\n1. Is cricket hampering the growth of other sports in India?\r\n2. What is wrong with Indian sports?\r\n3. One billon people and only one Olympic medal!\r\n4. How can we make India a sporting super power?\r\n5. Sania Mirza - the Indian Kournikova\r\n6. Are Indian cricketers over-rated?\r\n7. Should the Indian cricket team have a foreign coach?\r\n8. Cricket telecast is a waste of time. \r\nIII. SOCIAL \r\n1. Should euthanasia be legalized?\r\n2. Capital punishment should be abolished.\r\n3. Cloning of human beings should be allowed.\r\n4. Is pocket money enough for the youth of today?\r\n5. Love cannot be confined to Valentine’s Day.\r\n6. A women’s place is at home.\r\n7. Parents don’t understand children.\r\n8. Are we raising a society of burnt out children?\r\n9. Should we have job reservation in the private sector?\r\n10. Beauty pageants are a waste of time and should be banned.\r\n11. Is women empowerment a myth?\r\n12.The biggest problem facing India is _________\r\n13 Film awards are a farce and should be stopped.\r\n14 Brain drain vs brain in the drain.\r\n15. The media should be more socially responsible. \r\nIV. POLITICS \r\n1. Politics is the root cause of all problems in India.\r\n2. Politics of criminals vs criminalisation of politics.\r\n3. For true democracy to happen, it must first happen within all political parties.\r\n4. Women’s reservation in Parliament.\r\n5. Should India give up Kashmir? \r\nV. CAMPUS \r\n1. Should use of mobile phones be banned on campus?\r\n2. Should college students wear uniforms?\r\n3. Privatisation of professional education: Is it good or bad?\r\n4. Should politics be allowed on campus?\r\n5. We should shift to Open Book Policy for examinations.\r\n6. Our education system should be revamped. \r\nVI. ETHICAL \r\n1. Is honesty the best policy for a citizen of India?\r\n2. Profit is a bad word in business.\r\n3. Ethics and business do not co-exist.\r\n4. Advertising is all glitter and no truth. \r\nVII. ABSTRACT \r\n1. The Sun always rises in the East.\r\n2. The colour of the cat is not a matter of concern as long as it catches mice.\r\n3. Green is better than red.\r\n4. Life is like a box of chocolates.', 10, 1, NULL, '2020-11-10 06:12:53', '2021-01-03 15:39:36');
INSERT INTO `blogs` (`id`, `title`, `image_id`, `description`, `cat_id`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(4, 'Where does it come from?', 189, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 3, 1, NULL, '2020-11-10 11:52:52', '2020-11-10 11:52:52'),
(5, 'Where can I get some?', 156, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 4, 1, NULL, '2020-11-10 11:53:53', '2020-11-10 11:53:53'),
(6, 'The standard Lorem Ipsum passage, used since the 1500s', 175, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 5, 1, NULL, '2020-11-10 11:54:39', '2020-11-10 11:54:39'),
(7, 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 168, '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"', 6, 1, NULL, '2020-11-10 11:55:18', '2020-11-10 11:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `cat_name` text DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `cat_name`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'EDUCATOR TOOLS', 0, 1, '2020-11-10 05:01:53', '2020-11-10 05:01:53'),
(2, 'Help needy & Guides', 1, 1, '2020-11-10 05:04:50', '2020-11-10 05:04:50'),
(3, 'Presentation', 1, 1, '2020-11-10 05:04:59', '2020-11-10 05:04:59'),
(4, 'Project Based Learning', 1, 1, '2020-11-10 05:05:06', '2020-11-10 05:05:06'),
(5, 'Research', 1, 1, '2020-11-10 05:05:12', '2020-11-10 05:05:12'),
(6, 'Applying & Evaluating Information', 1, 1, '2020-11-10 05:05:17', '2020-11-10 05:06:47'),
(7, 'Quizlet', 1, 1, '2020-11-10 05:05:31', '2020-11-10 05:05:31'),
(8, 'Curriculum Development', 1, 1, '2020-11-10 05:05:36', '2020-11-10 05:05:36'),
(9, 'NEWS', 1, 1, '2020-11-10 05:05:42', '2020-11-10 05:05:42'),
(10, 'PROFESSIONAL DEVELOPMENT', 0, 1, '2020-11-10 05:06:01', '2020-11-10 05:06:01'),
(13, 'Exam Tips And Techniques', 1, 1, '2020-12-11 17:27:21', '2020-12-11 17:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `sort_order` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `categories_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_image`, `categories_icon`, `parent_id`, `sort_order`, `date_added`, `last_modified`, `categories_slug`, `categories_status`, `created_at`, `updated_at`, `level`) VALUES
(74, NULL, NULL, 47, NULL, NULL, NULL, 'family-relationships', 1, '2020-11-02 11:26:54', NULL, 1),
(66, NULL, NULL, 45, NULL, NULL, NULL, 'banking-insurance', 1, '2020-11-02 11:23:37', NULL, 1),
(65, NULL, NULL, 44, NULL, NULL, NULL, 'geography', 1, '2020-11-02 11:23:09', NULL, 1),
(64, NULL, NULL, 44, NULL, NULL, NULL, 'entrance-exams', 1, '2020-11-02 11:22:47', NULL, 1),
(63, NULL, NULL, 44, NULL, NULL, NULL, 'business', 1, '2020-11-02 11:22:23', NULL, 1),
(58, NULL, NULL, 43, NULL, NULL, NULL, 'business-self-help', 1, '2020-11-02 11:20:17', NULL, 1),
(57, NULL, NULL, 42, NULL, NULL, NULL, 'essays', 1, '2020-11-02 11:19:30', NULL, 1),
(56, NULL, NULL, 42, NULL, NULL, NULL, 'contemporary-fiction', 1, '2020-11-02 11:19:09', NULL, 1),
(55, NULL, NULL, 42, NULL, NULL, NULL, 'classic-fiction', 1, '2020-11-02 11:18:46', NULL, 1),
(54, NULL, NULL, 42, NULL, NULL, NULL, 'anthologies', 1, '2020-11-02 11:11:00', NULL, 1),
(111, '163', '162', 44, NULL, NULL, NULL, 'top', 1, '2021-07-16 02:00:49', NULL, 1),
(44, '263', '251', 0, NULL, NULL, NULL, 'women-fashion', 1, '2020-11-02 11:05:27', '2021-02-12 16:35:07', 0),
(45, '258', '255', 0, NULL, NULL, NULL, 'home-kitchen-pets', 1, '2020-11-02 11:05:53', '2021-02-12 16:35:18', 0),
(46, '264', '130', 0, NULL, NULL, NULL, 'beauty-health-grocery', 1, '2020-11-02 11:06:22', '2021-02-12 16:35:30', 0),
(47, '260', '138', 0, NULL, NULL, NULL, 'sports-and-accessories', 1, '2020-11-02 11:06:44', '2021-02-12 16:35:50', 0),
(48, '261', '253', 0, NULL, NULL, NULL, 'toys-baby-products-kid-fashion', 1, '2020-11-02 11:07:26', '2021-02-12 16:36:28', 0),
(51, '259', '252', 0, NULL, NULL, NULL, 'movie-music-games', 1, '2020-11-02 11:08:31', '2021-02-12 16:33:22', 0),
(49, '266', '136', 0, NULL, NULL, NULL, 'car-motorbike-industrial', 1, '2020-11-02 11:07:48', '2021-02-12 16:36:47', 0),
(42, '262', '250', 0, NULL, NULL, NULL, 'tv-appliances-electronics', 1, '2020-11-02 11:04:06', '2021-02-12 16:34:47', 0),
(73, NULL, NULL, 46, NULL, NULL, NULL, 'specialty-travel', 1, '2020-11-02 11:26:25', NULL, 1),
(72, NULL, NULL, 46, NULL, NULL, NULL, 'other-travel', 1, '2020-11-02 11:26:03', NULL, 1),
(71, NULL, NULL, 46, NULL, NULL, NULL, 'illustrated-books', 1, '2020-11-02 11:25:43', NULL, 1),
(70, NULL, NULL, 46, NULL, NULL, NULL, 'food-lodging-transportation', 1, '2020-11-02 11:25:33', NULL, 1),
(69, NULL, NULL, 45, NULL, NULL, NULL, 'exams-by-upsc', 1, '2020-11-02 11:24:46', NULL, 1),
(68, NULL, NULL, 45, NULL, NULL, NULL, 'engineering-entrance-exams', 1, '2020-11-02 11:24:23', NULL, 1),
(67, NULL, NULL, 45, NULL, NULL, NULL, 'defence', 1, '2020-11-02 11:23:58', NULL, 1),
(50, '265', '246', 0, NULL, NULL, NULL, 'books', 1, '2020-11-02 11:08:06', '2021-02-12 16:37:06', 0),
(41, '151', '254', 0, NULL, NULL, NULL, 'mobile-computers', 1, '2020-11-02 10:57:47', '2021-02-12 16:34:31', 0),
(75, NULL, NULL, 47, NULL, NULL, NULL, 'healthy-living-wellness', 1, '2020-11-02 11:27:20', NULL, 1),
(76, NULL, NULL, 47, NULL, NULL, NULL, 'mind-body-spirit', 1, '2020-11-02 11:27:42', NULL, 1),
(77, NULL, NULL, 47, NULL, NULL, NULL, 'other-health-family-personal-development', 1, '2020-11-02 11:28:04', NULL, 1),
(78, NULL, NULL, 48, NULL, NULL, NULL, 'bengali', 1, '2020-11-02 11:28:36', NULL, 1),
(79, NULL, NULL, 48, NULL, NULL, NULL, 'english', 1, '2020-11-02 11:28:52', NULL, 1),
(80, NULL, NULL, 48, NULL, NULL, NULL, 'gujrati', 1, '2020-11-02 11:29:16', NULL, 1),
(81, NULL, NULL, 48, NULL, NULL, NULL, 'hindi', 1, '2020-11-02 11:29:37', NULL, 1),
(82, NULL, NULL, 49, NULL, NULL, NULL, '13-16-years', 1, '2020-11-02 11:31:38', NULL, 1),
(83, NULL, NULL, 49, NULL, NULL, NULL, '3-5-years', 1, '2020-11-02 11:31:52', NULL, 1),
(84, NULL, NULL, 49, NULL, NULL, NULL, '6-8-years', 1, '2020-11-02 11:32:13', NULL, 1),
(85, NULL, NULL, 49, NULL, NULL, NULL, '9-12-years', 1, '2020-11-02 11:32:32', NULL, 1),
(86, NULL, NULL, 50, NULL, NULL, NULL, 'computer-video-games', 1, '2020-11-02 11:32:57', NULL, 1),
(87, NULL, NULL, 50, NULL, NULL, NULL, 'computer-science', 1, '2020-11-02 11:34:24', NULL, 1),
(88, NULL, NULL, 50, NULL, NULL, NULL, 'computer-security', 1, '2020-11-02 11:34:54', NULL, 1),
(89, NULL, NULL, 50, NULL, NULL, NULL, 'databases', 1, '2020-11-02 11:35:20', NULL, 1),
(90, NULL, NULL, 51, NULL, NULL, NULL, 'antiques-collectables', 1, '2020-11-02 11:35:51', NULL, 1),
(91, NULL, NULL, 51, NULL, NULL, NULL, 'food-drink-entertaining', 1, '2020-11-02 11:36:09', NULL, 1),
(92, NULL, NULL, 51, NULL, NULL, NULL, 'food-drink-entertaining-1', 1, '2020-11-02 11:36:44', NULL, 1),
(93, NULL, NULL, 51, NULL, NULL, NULL, 'games-quizzes', 1, '2020-11-02 11:37:06', NULL, 1),
(94, NULL, NULL, 51, NULL, NULL, NULL, 'gardening', 1, '2020-11-02 11:37:28', NULL, 1),
(95, NULL, NULL, 52, NULL, NULL, NULL, 'dictionaries', 1, '2020-11-02 11:37:53', NULL, 1),
(96, NULL, NULL, 52, NULL, NULL, NULL, 'grammar', 1, '2020-11-02 11:38:19', NULL, 1),
(97, NULL, NULL, 52, NULL, NULL, NULL, 'journalism', 1, '2020-11-02 11:38:39', NULL, 1),
(98, NULL, NULL, 52, NULL, NULL, NULL, 'language-learning-teaching', 1, '2020-11-02 11:39:06', NULL, 1),
(99, NULL, NULL, 53, NULL, NULL, NULL, 'best-of-authors-combos', 1, '2020-11-02 11:39:39', NULL, 1),
(100, NULL, NULL, 53, NULL, NULL, NULL, 'best-sellers', 1, '2020-11-02 11:40:00', NULL, 1),
(101, NULL, NULL, 53, NULL, NULL, NULL, 'combo-offers', 1, '2020-11-02 11:40:18', NULL, 1),
(102, NULL, NULL, 53, NULL, NULL, NULL, 'gandhi-jayanti-special', 1, '2020-11-02 11:40:45', NULL, 1),
(108, NULL, NULL, 41, NULL, NULL, NULL, 'biographies', 1, '2020-11-04 10:19:19', NULL, 1),
(105, NULL, NULL, 41, NULL, NULL, NULL, 'action-adventure-books', 1, '2020-11-04 09:45:15', NULL, 1),
(106, NULL, NULL, 41, NULL, NULL, NULL, 'activities-crafts-games-books', 1, '2020-11-04 09:45:28', NULL, 1),
(107, NULL, NULL, 41, NULL, NULL, NULL, 'arts-music-photography', 1, '2020-11-04 09:45:58', NULL, 1),
(110, NULL, NULL, 0, NULL, NULL, NULL, 'test-category', 1, '2021-05-07 22:43:27', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories_description`
--

CREATE TABLE `categories_description` (
  `categories_description_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL DEFAULT 0,
  `language_id` int(11) NOT NULL DEFAULT 1,
  `categories_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories_description`
--

INSERT INTO `categories_description` (`categories_description_id`, `categories_id`, `language_id`, `categories_name`) VALUES
(79, 65, 1, 'Geography'),
(80, 66, 1, 'Banking & Insurance'),
(72, 58, 1, 'Business Self-Help'),
(56, 42, 1, 'Tv, Appliances, Electronics'),
(125, 111, 1, 'top'),
(58, 44, 1, 'Women\'s Fashion'),
(59, 45, 1, 'Home, Kitchen, Pets'),
(60, 46, 1, 'Beauty, Health, Grocery'),
(61, 47, 1, 'Sports, Fitness, Bags, Luggage'),
(62, 48, 1, 'Toys, Baby Products, Kid\'s Fashion'),
(63, 49, 1, 'Car, Motorbike, Industrial'),
(64, 50, 1, 'Books'),
(65, 51, 1, 'Movies, Musics & Video Games'),
(66, 52, 1, 'Language, Linguistics & Writing'),
(67, 53, 1, 'Other (Books)'),
(68, 54, 1, 'Anthologies'),
(69, 55, 1, 'Classic Fiction'),
(70, 56, 1, 'Contemporary Fiction'),
(71, 57, 1, 'Essays'),
(78, 64, 1, 'Entrance Exams'),
(77, 63, 1, 'Business'),
(55, 41, 1, 'Mobile, Computers'),
(54, 40, 1, 'Exam\'s Books'),
(81, 67, 1, 'Defence'),
(82, 68, 1, 'Engineering Entrance Exams'),
(83, 69, 1, 'Exams by UPSC'),
(84, 70, 1, 'Food, Lodging & Transportation'),
(85, 71, 1, 'Illustrated Books'),
(86, 72, 1, 'Other (Travel)'),
(87, 73, 1, 'Specialty Travel'),
(88, 74, 1, 'Family & Relationships'),
(89, 75, 1, 'Healthy Living & Wellness'),
(90, 76, 1, 'Mind, Body & Spirit'),
(91, 77, 1, 'Other (Health, Family & Personal Development)'),
(92, 78, 1, 'Bengali'),
(93, 79, 1, 'English'),
(94, 80, 1, 'Gujrati'),
(95, 81, 1, 'Hindi'),
(96, 82, 1, '13-16 Years'),
(97, 83, 1, '3-5 Years'),
(98, 84, 1, '6-8 Years'),
(99, 85, 1, '9-12 Years'),
(100, 86, 1, 'Computer & Video Games'),
(101, 87, 1, 'Computer Science'),
(102, 88, 1, 'Computer Security'),
(103, 89, 1, 'Databases'),
(104, 90, 1, 'Antiques & Collectables'),
(105, 91, 1, 'Food, Drink & Entertaining'),
(106, 92, 1, 'Food, Drink & Entertaining'),
(107, 93, 1, 'Games & Quizzes'),
(108, 94, 1, 'Gardening'),
(109, 95, 1, 'Dictionaries'),
(110, 96, 1, 'Grammar'),
(111, 97, 1, 'Journalism'),
(112, 98, 1, 'Language Learning & Teaching'),
(113, 99, 1, 'Best of Authors Combos'),
(114, 100, 1, 'Best Sellers'),
(115, 101, 1, 'Combo Offers'),
(116, 102, 1, 'Gandhi Jayanti Special'),
(122, 108, 1, 'Biographies'),
(123, 109, 1, 'Science & Technology'),
(119, 105, 1, 'Action & Adventure Books'),
(120, 106, 1, 'Activities, Crafts & Games Books'),
(121, 107, 1, 'Arts, Music & Photography'),
(124, 110, 1, 'test category');

-- --------------------------------------------------------

--
-- Table structure for table `categories_role`
--

CREATE TABLE `categories_role` (
  `categories_role_id` int(11) NOT NULL,
  `categories_ids` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compare`
--

CREATE TABLE `compare` (
  `id` int(11) NOT NULL,
  `product_ids` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `constant_banners`
--

CREATE TABLE `constant_banners` (
  `banners_id` int(11) NOT NULL,
  `banners_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banners_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banners_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_added` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `languages_id` int(11) NOT NULL,
  `type` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `constant_banners`
--

INSERT INTO `constant_banners` (`banners_id`, `banners_title`, `banners_url`, `banners_image`, `date_added`, `status`, `languages_id`, `type`) VALUES
(1, '1', '', '215', '2021-02-09 09:28:15', 1, 1, '1'),
(2, 'style0', '', '114', '2019-09-08 18:43:25', 1, 1, '2'),
(3, 'banner1', '', '83', '2019-09-08 18:43:34', 1, 1, '3'),
(4, 'banner1', '', '83', '2019-09-08 18:43:42', 1, 1, '4'),
(5, 'banner1', '', '83', '2019-09-08 18:44:15', 1, 1, '5'),
(6, 'banner2_3_4', '', '84', '2019-09-10 08:50:55', 1, 1, '6'),
(7, 'banner2_3_4', '', '85', '2019-09-10 08:54:18', 1, 1, '7'),
(8, 'banner2_3_4', '', '86', '2019-09-10 08:54:28', 1, 1, '8'),
(9, 'banner2_3_4', '', '86', '2019-09-10 08:54:38', 1, 1, '9'),
(10, 'banner5_6', '', '92', '2019-09-10 09:31:13', 1, 1, '10'),
(11, 'banner5_6', '', '92', '2019-09-10 09:31:24', 1, 1, '11'),
(12, 'banner5_6', '', '92', '2019-09-10 09:31:35', 1, 1, '12'),
(13, 'banner5_6', '', '92', '2019-09-10 09:32:18', 1, 1, '13'),
(14, 'banner5_6', '', '91', '2019-09-10 09:32:28', 1, 1, '14'),
(15, 'banner7_8', '', '95', '2019-09-10 09:52:02', 1, 1, '15'),
(16, 'banner7_8', '', '96', '2019-09-10 09:52:29', 1, 1, '16'),
(17, 'banner7_8', '', '96', '2019-09-10 09:47:56', 1, 1, '17'),
(18, 'banner7_8', '', '94', '2019-09-10 09:48:05', 1, 1, '18'),
(19, 'banner9', '', '97', '2019-09-10 10:19:03', 1, 1, '19'),
(20, 'banner9', '', '97', '2019-09-10 10:19:13', 1, 1, '20'),
(21, 'banner10_11_12', '', '98', '2019-09-10 10:26:12', 1, 1, '21'),
(22, 'banner10_11_12', '', '96', '2019-09-10 10:26:30', 1, 1, '22'),
(23, 'banner10_11_12', '', '96', '2019-09-10 10:26:41', 1, 1, '23'),
(24, 'banner10_11_12', '', '99', '2019-09-10 10:26:54', 1, 1, '24'),
(25, 'banner13_14_15', '', '100', '2019-09-10 11:01:09', 1, 1, '25'),
(26, 'banner13_14_15', '', '101', '2019-09-10 11:01:27', 1, 1, '26'),
(27, 'banner13_14_15', '', '101', '2019-09-10 11:02:12', 1, 1, '27'),
(28, 'banner13_14_15', '', '101', '2019-09-10 11:02:23', 1, 1, '28'),
(29, 'banner13_14_15', '', '101', '2019-09-10 11:02:36', 1, 1, '29'),
(30, 'banner16_17', '', '104', '2019-09-10 11:19:45', 1, 1, '30'),
(31, 'banner16_17', '', '104', '2019-09-10 11:19:58', 1, 1, '31'),
(32, 'banner16_17', '', '105', '2019-09-10 11:21:00', 1, 1, '32'),
(33, 'banner18_19', '', '116', '2019-09-10 11:30:35', 1, 1, '33'),
(34, 'banner18_19', '', '116', '2019-09-10 11:30:49', 1, 1, '34'),
(35, 'banner18_19', '', '96', '2019-09-10 11:31:04', 1, 1, '35'),
(36, 'banner18_19', '', '96', '2019-09-10 11:31:20', 1, 1, '36'),
(37, 'banner18_19', '', '115', '2019-09-10 11:31:54', 1, 1, '37'),
(38, 'banner18_19', '', '115', '2019-09-10 11:32:06', 1, 1, '38'),
(39, 'ad_banner1', '', '107', '2019-09-11 06:17:45', 1, 1, '39'),
(40, 'ad_banner2', '', '106', '2019-09-11 06:17:58', 1, 1, '40');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `countries_id` int(11) NOT NULL,
  `countries_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countries_iso_code_2` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countries_iso_code_3` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_format_id` int(11) NOT NULL,
  `country_code` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`countries_id`, `countries_name`, `countries_iso_code_2`, `countries_iso_code_3`, `address_format_id`, `country_code`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', 1, NULL),
(2, 'Albania', 'AL', 'ALB', 1, NULL),
(3, 'Algeria', 'DZ', 'DZA', 1, NULL),
(4, 'American Samoa', 'AS', 'ASM', 1, NULL),
(5, 'Andorra', 'AD', 'AND', 1, NULL),
(6, 'Angola', 'AO', 'AGO', 1, NULL),
(7, 'Anguilla', 'AI', 'AIA', 1, NULL),
(8, 'Antarctica', 'AQ', 'ATA', 1, NULL),
(9, 'Antigua and Barbuda', 'AG', 'ATG', 1, NULL),
(10, 'Argentina', 'AR', 'ARG', 1, NULL),
(11, 'Armenia', 'AM', 'ARM', 1, NULL),
(12, 'Aruba', 'AW', 'ABW', 1, NULL),
(13, 'Australia', 'AU', 'AUS', 1, NULL),
(14, 'Austria', 'AT', 'AUT', 5, NULL),
(15, 'Azerbaijan', 'AZ', 'AZE', 1, NULL),
(16, 'Bahamas', 'BS', 'BHS', 1, NULL),
(17, 'Bahrain', 'BH', 'BHR', 1, NULL),
(18, 'Bangladesh', 'BD', 'BGD', 1, NULL),
(19, 'Barbados', 'BB', 'BRB', 1, NULL),
(20, 'Belarus', 'BY', 'BLR', 1, NULL),
(21, 'Belgium', 'BE', 'BEL', 1, NULL),
(22, 'Belize', 'BZ', 'BLZ', 1, NULL),
(23, 'Benin', 'BJ', 'BEN', 1, NULL),
(24, 'Bermuda', 'BM', 'BMU', 1, NULL),
(25, 'Bhutan', 'BT', 'BTN', 1, NULL),
(26, 'Bolivia', 'BO', 'BOL', 1, NULL),
(27, 'Bosnia and Herzegowina', 'BA', 'BIH', 1, NULL),
(28, 'Botswana', 'BW', 'BWA', 1, NULL),
(29, 'Bouvet Island', 'BV', 'BVT', 1, NULL),
(30, 'Brazil', 'BR', 'BRA', 1, NULL),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', 1, NULL),
(32, 'Brunei Darussalam', 'BN', 'BRN', 1, NULL),
(33, 'Bulgaria', 'BG', 'BGR', 1, NULL),
(34, 'Burkina Faso', 'BF', 'BFA', 1, NULL),
(35, 'Burundi', 'BI', 'BDI', 1, NULL),
(36, 'Cambodia', 'KH', 'KHM', 1, NULL),
(37, 'Cameroon', 'CM', 'CMR', 1, NULL),
(38, 'Canada', 'CA', 'CAN', 1, NULL),
(39, 'Cape Verde', 'CV', 'CPV', 1, NULL),
(40, 'Cayman Islands', 'KY', 'CYM', 1, NULL),
(41, 'Central African Republic', 'CF', 'CAF', 1, NULL),
(42, 'Chad', 'TD', 'TCD', 1, NULL),
(43, 'Chile', 'CL', 'CHL', 1, NULL),
(44, 'China', 'CN', 'CHN', 1, NULL),
(45, 'Christmas Island', 'CX', 'CXR', 1, NULL),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK', 1, NULL),
(47, 'Colombia', 'CO', 'COL', 1, NULL),
(48, 'Comoros', 'KM', 'COM', 1, NULL),
(49, 'Congo', 'CG', 'COG', 1, NULL),
(50, 'Cook Islands', 'CK', 'COK', 1, NULL),
(51, 'Costa Rica', 'CR', 'CRI', 1, NULL),
(52, 'Cote D\'Ivoire', 'CI', 'CIV', 1, NULL),
(53, 'Croatia', 'HR', 'HRV', 1, NULL),
(54, 'Cuba', 'CU', 'CUB', 1, NULL),
(55, 'Cyprus', 'CY', 'CYP', 1, NULL),
(56, 'Czech Republic', 'CZ', 'CZE', 1, NULL),
(57, 'Denmark', 'DK', 'DNK', 1, NULL),
(58, 'Djibouti', 'DJ', 'DJI', 1, NULL),
(59, 'Dominica', 'DM', 'DMA', 1, NULL),
(60, 'Dominican Republic', 'DO', 'DOM', 1, NULL),
(61, 'East Timor', 'TP', 'TMP', 1, NULL),
(62, 'Ecuador', 'EC', 'ECU', 1, NULL),
(63, 'Egypt', 'EG', 'EGY', 1, NULL),
(64, 'El Salvador', 'SV', 'SLV', 1, NULL),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', 1, NULL),
(66, 'Eritrea', 'ER', 'ERI', 1, NULL),
(67, 'Estonia', 'EE', 'EST', 1, NULL),
(68, 'Ethiopia', 'ET', 'ETH', 1, NULL),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 1, NULL),
(70, 'Faroe Islands', 'FO', 'FRO', 1, NULL),
(71, 'Fiji', 'FJ', 'FJI', 1, NULL),
(72, 'Finland', 'FI', 'FIN', 1, NULL),
(73, 'France', 'FR', 'FRA', 1, NULL),
(74, 'France, Metropolitan', 'FX', 'FXX', 1, NULL),
(75, 'French Guiana', 'GF', 'GUF', 1, NULL),
(76, 'French Polynesia', 'PF', 'PYF', 1, NULL),
(77, 'French Southern Territories', 'TF', 'ATF', 1, NULL),
(78, 'Gabon', 'GA', 'GAB', 1, NULL),
(79, 'Gambia', 'GM', 'GMB', 1, NULL),
(80, 'Georgia', 'GE', 'GEO', 1, NULL),
(81, 'Germany', 'DE', 'DEU', 5, NULL),
(82, 'Ghana', 'GH', 'GHA', 1, NULL),
(83, 'Gibraltar', 'GI', 'GIB', 1, NULL),
(84, 'Greece', 'GR', 'GRC', 1, NULL),
(85, 'Greenland', 'GL', 'GRL', 1, NULL),
(86, 'Grenada', 'GD', 'GRD', 1, NULL),
(87, 'Guadeloupe', 'GP', 'GLP', 1, NULL),
(88, 'Guam', 'GU', 'GUM', 1, NULL),
(89, 'Guatemala', 'GT', 'GTM', 1, NULL),
(90, 'Guinea', 'GN', 'GIN', 1, NULL),
(91, 'Guinea-bissau', 'GW', 'GNB', 1, NULL),
(92, 'Guyana', 'GY', 'GUY', 1, NULL),
(93, 'Haiti', 'HT', 'HTI', 1, NULL),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD', 1, NULL),
(95, 'Honduras', 'HN', 'HND', 1, NULL),
(96, 'Hong Kong', 'HK', 'HKG', 1, NULL),
(97, 'Hungary', 'HU', 'HUN', 1, NULL),
(98, 'Iceland', 'IS', 'ISL', 1, NULL),
(99, 'India', 'IN', 'IND', 1, NULL),
(100, 'Indonesia', 'ID', 'IDN', 1, NULL),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN', 1, NULL),
(102, 'Iraq', 'IQ', 'IRQ', 1, NULL),
(103, 'Ireland', 'IE', 'IRL', 1, NULL),
(104, 'Israel', 'IL', 'ISR', 1, NULL),
(105, 'Italy', 'IT', 'ITA', 1, NULL),
(106, 'Jamaica', 'JM', 'JAM', 1, NULL),
(107, 'Japan', 'JP', 'JPN', 1, NULL),
(108, 'Jordan', 'JO', 'JOR', 1, NULL),
(109, 'Kazakhstan', 'KZ', 'KAZ', 1, NULL),
(110, 'Kenya', 'KE', 'KEN', 1, NULL),
(111, 'Kiribati', 'KI', 'KIR', 1, NULL),
(112, 'Korea, Democratic People\'s Republic of', 'KP', 'PRK', 1, NULL),
(113, 'Korea, Republic of', 'KR', 'KOR', 1, NULL),
(114, 'Kuwait', 'KW', 'KWT', 1, NULL),
(115, 'Kyrgyzstan', 'KG', 'KGZ', 1, NULL),
(116, 'Lao People\'s Democratic Republic', 'LA', 'LAO', 1, NULL),
(117, 'Latvia', 'LV', 'LVA', 1, NULL),
(118, 'Lebanon', 'LB', 'LBN', 1, NULL),
(119, 'Lesotho', 'LS', 'LSO', 1, NULL),
(120, 'Liberia', 'LR', 'LBR', 1, NULL),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', 1, NULL),
(122, 'Liechtenstein', 'LI', 'LIE', 1, NULL),
(123, 'Lithuania', 'LT', 'LTU', 1, NULL),
(124, 'Luxembourg', 'LU', 'LUX', 1, NULL),
(125, 'Macau', 'MO', 'MAC', 1, NULL),
(126, 'Macedonia, The Former Yugoslav Republic of', 'MK', 'MKD', 1, NULL),
(127, 'Madagascar', 'MG', 'MDG', 1, NULL),
(128, 'Malawi', 'MW', 'MWI', 1, NULL),
(129, 'Malaysia', 'MY', 'MYS', 1, NULL),
(130, 'Maldives', 'MV', 'MDV', 1, NULL),
(131, 'Mali', 'ML', 'MLI', 1, NULL),
(132, 'Malta', 'MT', 'MLT', 1, NULL),
(133, 'Marshall Islands', 'MH', 'MHL', 1, NULL),
(134, 'Martinique', 'MQ', 'MTQ', 1, NULL),
(135, 'Mauritania', 'MR', 'MRT', 1, NULL),
(136, 'Mauritius', 'MU', 'MUS', 1, NULL),
(137, 'Mayotte', 'YT', 'MYT', 1, NULL),
(138, 'Mexico', 'MX', 'MEX', 1, NULL),
(139, 'Micronesia, Federated States of', 'FM', 'FSM', 1, NULL),
(140, 'Moldova, Republic of', 'MD', 'MDA', 1, NULL),
(141, 'Monaco', 'MC', 'MCO', 1, NULL),
(142, 'Mongolia', 'MN', 'MNG', 1, NULL),
(143, 'Montserrat', 'MS', 'MSR', 1, NULL),
(144, 'Morocco', 'MA', 'MAR', 1, NULL),
(145, 'Mozambique', 'MZ', 'MOZ', 1, NULL),
(146, 'Myanmar', 'MM', 'MMR', 1, NULL),
(147, 'Namibia', 'NA', 'NAM', 1, NULL),
(148, 'Nauru', 'NR', 'NRU', 1, NULL),
(149, 'Nepal', 'NP', 'NPL', 1, NULL),
(150, 'Netherlands', 'NL', 'NLD', 1, NULL),
(151, 'Netherlands Antilles', 'AN', 'ANT', 1, NULL),
(152, 'New Caledonia', 'NC', 'NCL', 1, NULL),
(153, 'New Zealand', 'NZ', 'NZL', 1, NULL),
(154, 'Nicaragua', 'NI', 'NIC', 1, NULL),
(155, 'Niger', 'NE', 'NER', 1, NULL),
(156, 'Nigeria', 'NG', 'NGA', 1, NULL),
(157, 'Niue', 'NU', 'NIU', 1, NULL),
(158, 'Norfolk Island', 'NF', 'NFK', 1, NULL),
(159, 'Northern Mariana Islands', 'MP', 'MNP', 1, NULL),
(160, 'Norway', 'NO', 'NOR', 1, NULL),
(161, 'Oman', 'OM', 'OMN', 1, NULL),
(162, 'Pakistan', 'PK', 'PAK', 1, NULL),
(163, 'Palau', 'PW', 'PLW', 1, NULL),
(164, 'Panama', 'PA', 'PAN', 1, NULL),
(165, 'Papua New Guinea', 'PG', 'PNG', 1, NULL),
(166, 'Paraguay', 'PY', 'PRY', 1, NULL),
(167, 'Peru', 'PE', 'PER', 1, NULL),
(168, 'Philippines', 'PH', 'PHL', 1, NULL),
(169, 'Pitcairn', 'PN', 'PCN', 1, NULL),
(170, 'Poland', 'PL', 'POL', 1, NULL),
(171, 'Portugal', 'PT', 'PRT', 1, NULL),
(172, 'Puerto Rico', 'PR', 'PRI', 1, NULL),
(173, 'Qatar', 'QA', 'QAT', 1, NULL),
(174, 'Reunion', 'RE', 'REU', 1, NULL),
(175, 'Romania', 'RO', 'ROM', 1, NULL),
(176, 'Russian Federation', 'RU', 'RUS', 1, NULL),
(177, 'Rwanda', 'RW', 'RWA', 1, NULL),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA', 1, NULL),
(179, 'Saint Lucia', 'LC', 'LCA', 1, NULL),
(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 1, NULL),
(181, 'Samoa', 'WS', 'WSM', 1, NULL),
(182, 'San Marino', 'SM', 'SMR', 1, NULL),
(183, 'Sao Tome and Principe', 'ST', 'STP', 1, NULL),
(184, 'Saudi Arabia', 'SA', 'SAU', 1, NULL),
(185, 'Senegal', 'SN', 'SEN', 1, NULL),
(186, 'Seychelles', 'SC', 'SYC', 1, NULL),
(187, 'Sierra Leone', 'SL', 'SLE', 1, NULL),
(188, 'Singapore', 'SG', 'SGP', 4, NULL),
(189, 'Slovakia (Slovak Republic)', 'SK', 'SVK', 1, NULL),
(190, 'Slovenia', 'SI', 'SVN', 1, NULL),
(191, 'Solomon Islands', 'SB', 'SLB', 1, NULL),
(192, 'Somalia', 'SO', 'SOM', 1, NULL),
(193, 'South Africa', 'ZA', 'ZAF', 1, NULL),
(194, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', 1, NULL),
(195, 'Spain', 'ES', 'ESP', 3, NULL),
(196, 'Sri Lanka', 'LK', 'LKA', 1, NULL),
(197, 'St. Helena', 'SH', 'SHN', 1, NULL),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM', 1, NULL),
(199, 'Sudan', 'SD', 'SDN', 1, NULL),
(200, 'Suriname', 'SR', 'SUR', 1, NULL),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', 1, NULL),
(202, 'Swaziland', 'SZ', 'SWZ', 1, NULL),
(203, 'Sweden', 'SE', 'SWE', 1, NULL),
(204, 'Switzerland', 'CH', 'CHE', 1, NULL),
(205, 'Syrian Arab Republic', 'SY', 'SYR', 1, NULL),
(206, 'Taiwan', 'TW', 'TWN', 1, NULL),
(207, 'Tajikistan', 'TJ', 'TJK', 1, NULL),
(208, 'Tanzania, United Republic of', 'TZ', 'TZA', 1, NULL),
(209, 'Thailand', 'TH', 'THA', 1, NULL),
(210, 'Togo', 'TG', 'TGO', 1, NULL),
(211, 'Tokelau', 'TK', 'TKL', 1, NULL),
(212, 'Tonga', 'TO', 'TON', 1, NULL),
(213, 'Trinidad and Tobago', 'TT', 'TTO', 1, NULL),
(214, 'Tunisia', 'TN', 'TUN', 1, NULL),
(215, 'Turkey', 'TR', 'TUR', 1, NULL),
(216, 'Turkmenistan', 'TM', 'TKM', 1, NULL),
(217, 'Turks and Caicos Islands', 'TC', 'TCA', 1, NULL),
(218, 'Tuvalu', 'TV', 'TUV', 1, NULL),
(219, 'Uganda', 'UG', 'UGA', 1, NULL),
(220, 'Ukraine', 'UA', 'UKR', 1, NULL),
(221, 'United Arab Emirates', 'AE', 'ARE', 1, NULL),
(222, 'United Kingdom', 'GB', 'GBR', 1, NULL),
(223, 'United States', 'US', 'USA', 2, NULL),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI', 1, NULL),
(225, 'Uruguay', 'UY', 'URY', 1, NULL),
(226, 'Uzbekistan', 'UZ', 'UZB', 1, NULL),
(227, 'Vanuatu', 'VU', 'VUT', 1, NULL),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT', 1, NULL),
(229, 'Venezuela', 'VE', 'VEN', 1, NULL),
(230, 'Viet Nam', 'VN', 'VNM', 1, NULL),
(231, 'Virgin Islands (British)', 'VG', 'VGB', 1, NULL),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR', 1, NULL),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF', 1, NULL),
(234, 'Western Sahara', 'EH', 'ESH', 1, NULL),
(235, 'Yemen', 'YE', 'YEM', 1, NULL),
(236, 'Yugoslavia', 'YU', 'YUG', 1, NULL),
(237, 'Zaire', 'ZR', 'ZAR', 1, NULL),
(238, 'Zambia', 'ZM', 'ZMB', 1, NULL),
(239, 'Zimbabwe', 'ZW', 'ZWE', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupans_id` int(11) NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Options: fixed_cart, percent, fixed_product and percent_product. Default: fixed_cart.',
  `amount` int(11) NOT NULL,
  `expiry_date` datetime NOT NULL,
  `usage_count` int(11) NOT NULL,
  `individual_use` tinyint(1) NOT NULL DEFAULT 0,
  `product_ids` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exclude_product_ids` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usage_limit` int(11) DEFAULT NULL,
  `usage_limit_per_user` int(11) DEFAULT NULL,
  `limit_usage_to_x_items` int(11) NOT NULL,
  `free_shipping` tinyint(1) NOT NULL DEFAULT 0,
  `product_categories` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excluded_product_categories` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exclude_sale_items` tinyint(1) NOT NULL DEFAULT 0,
  `minimum_amount` decimal(10,2) NOT NULL,
  `maximum_amount` decimal(10,2) NOT NULL,
  `email_restrictions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `used_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupans_id`, `code`, `date_created`, `date_modified`, `description`, `discount_type`, `amount`, `expiry_date`, `usage_count`, `individual_use`, `product_ids`, `exclude_product_ids`, `usage_limit`, `usage_limit_per_user`, `limit_usage_to_x_items`, `free_shipping`, `product_categories`, `excluded_product_categories`, `exclude_sale_items`, `minimum_amount`, `maximum_amount`, `email_restrictions`, `used_by`, `created_at`, `updated_at`) VALUES
(1, 'FIRST10%', NULL, NULL, NULL, 'percent', 10, '2020-12-05 00:00:00', 0, 1, '', '', 10, 1, 0, 0, '', '', 0, '100.00', '1000.00', '', ',4,4,4,4,4,4,4,4,4', '2020-11-04 09:39:36', '2020-11-04 16:14:44'),
(2, 'PRICE10', NULL, NULL, NULL, 'fixed_cart', 10, '2020-12-17 00:00:00', 0, 1, '', '', NULL, NULL, 0, 0, '', '', 0, '150.00', '1000.00', '', ',,,,,,,,', '2020-11-04 12:41:39', '2020-11-04 12:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `title` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol_left` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol_right` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decimal_point` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thousands_point` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decimal_places` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `value` double(13,8) DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_current` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `title`, `code`, `symbol_left`, `symbol_right`, `decimal_point`, `thousands_point`, `decimal_places`, `created_at`, `updated_at`, `value`, `is_default`, `status`, `is_current`) VALUES
(1, 'Indian Rupee', 'INR', 'Rs', NULL, NULL, NULL, '2', '2020-11-06 17:59:24', '2020-11-06 17:59:24', 1.00000000, 1, 1, 1),
(9, 'AED', 'AED', 'د.إ', NULL, NULL, NULL, '2', '2019-10-11 16:09:42', '2019-10-11 16:09:42', 3.67000000, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `currency_record`
--

CREATE TABLE `currency_record` (
  `id` int(11) NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency_record`
--

INSERT INTO `currency_record` (`id`, `code`, `currency_name`) VALUES
(1, 'AED', 'United Arab Emirates Dirham'),
(2, 'AFN', 'Afghan Afghani'),
(3, 'ALL', 'Albanian Lek'),
(4, 'AMD', 'Armenian Dram'),
(5, 'ANG', 'Netherlands Antillean Guilder'),
(6, 'AOA', 'Angolan Kwanza'),
(7, 'ARS', 'Argentine Peso'),
(8, 'AUD', 'Australian Dollar'),
(9, 'AWG', 'Aruban Florin'),
(10, 'AZN', 'Azerbaijani Manat'),
(11, 'BAM', 'Bosnia-Herzegovina Convertible Mark'),
(12, 'BBD', 'Barbadian Dollar'),
(13, 'BDT', 'Bangladeshi Taka'),
(14, 'BGN', 'Bulgarian Lev'),
(15, 'BHD', 'Bahraini Dinar'),
(16, 'BIF', 'Burundian Franc'),
(17, 'BMD', 'Bermudan Dollar'),
(18, 'BND', 'Brunei Dollar'),
(19, 'BOB', 'Bolivian Boliviano'),
(20, 'BRL', 'Brazilian Real'),
(21, 'BSD', 'Bahamian Dollar'),
(22, 'BTC', 'Bitcoin'),
(23, 'BTN', 'Bhutanese Ngultrum'),
(24, 'BWP', 'Botswanan Pula'),
(25, 'BYN', 'Belarusian Ruble'),
(26, 'BZD', 'Belize Dollar'),
(27, 'CAD', 'Canadian Dollar'),
(28, 'CDF', 'Congolese Franc'),
(29, 'CHF', 'Swiss Franc'),
(30, 'CLF', 'Chilean Unit of Account (UF)'),
(31, 'CLP', 'Chilean Peso'),
(32, 'CNH', 'Chinese Yuan (Offshore)'),
(33, 'CNY', 'Chinese Yuan'),
(34, 'COP', 'Colombian Peso'),
(35, 'CRC', 'Costa Rican Colón'),
(36, 'CUC', 'Cuban Convertible Peso'),
(37, 'CUP', 'Cuban Peso'),
(38, 'CVE', 'Cape Verdean Escudo'),
(39, 'CZK', 'Czech Republic Koruna'),
(40, 'DJF', 'Djiboutian Franc'),
(41, 'DKK', 'Danish Krone'),
(42, 'DOP', 'Dominican Peso'),
(43, 'DZD', 'Algerian Dinar'),
(44, 'EGP', 'Egyptian Pound'),
(45, 'ERN', 'Eritrean Nakfa'),
(46, 'ETB', 'Ethiopian Birr'),
(47, 'EUR', 'Euro'),
(48, 'FJD', 'Fijian Dollar'),
(49, 'FKP', 'Falkland Islands Pound'),
(50, 'GBP', 'British Pound Sterling'),
(51, 'GEL', 'Georgian Lari'),
(52, 'GGP', 'Guernsey Pound'),
(53, 'GHS', 'Ghanaian Cedi'),
(54, 'GIP', 'Gibraltar Pound'),
(55, 'GMD', 'Gambian Dalasi'),
(56, 'GNF', 'Guinean Franc'),
(57, 'GTQ', 'Guatemalan Quetzal'),
(58, 'GYD', 'Guyanaese Dollar'),
(59, 'HKD', 'Hong Kong Dollar'),
(60, 'HNL', 'Honduran Lempira'),
(61, 'HRK', 'Croatian Kuna'),
(62, 'HTG', 'Haitian Gourde'),
(63, 'HUF', 'Hungarian Forint'),
(64, 'IDR', 'Indonesian Rupiah'),
(65, 'ILS', 'Israeli New Sheqel'),
(66, 'IMP', 'Manx pound'),
(67, 'INR', 'Indian Rupee'),
(68, 'IQD', 'Iraqi Dinar'),
(69, 'IRR', 'Iranian Rial'),
(70, 'ISK', 'Icelandic Króna'),
(71, 'JEP', 'Jersey Pound'),
(72, 'JMD', 'Jamaican Dollar'),
(73, 'JOD', 'Jordanian Dinar'),
(74, 'JPY', 'Japanese Yen'),
(75, 'KES', 'Kenyan Shilling'),
(76, 'KGS', 'Kyrgystani Som'),
(77, 'KHR', 'Cambodian Riel'),
(78, 'KMF', 'Comorian Franc'),
(79, 'KPW', 'North Korean Won'),
(80, 'KRW', 'South Korean Won'),
(81, 'KWD', 'Kuwaiti Dinar'),
(82, 'KYD', 'Cayman Islands Dollar'),
(83, 'KZT', 'Kazakhstani Tenge'),
(84, 'LAK', 'Laotian Kip'),
(85, 'LBP', 'Lebanese Pound'),
(86, 'LKR', 'Sri Lankan Rupee'),
(87, 'LRD', 'Liberian Dollar'),
(88, 'LSL', 'Lesotho Loti'),
(89, 'LYD', 'Libyan Dinar'),
(90, 'MAD', 'Moroccan Dirham'),
(91, 'MDL', 'Moldovan Leu'),
(92, 'MGA', 'Malagasy Ariary'),
(93, 'MKD', 'Macedonian Denar'),
(94, 'MMK', 'Myanma Kyat'),
(95, 'MNT', 'Mongolian Tugrik'),
(96, 'MOP', 'Macanese Pataca'),
(97, 'MRO', 'Mauritanian Ouguiya (pre-2018)'),
(98, 'MRU', 'Mauritanian Ouguiya'),
(99, 'MUR', 'Mauritian Rupee'),
(100, 'MVR', 'Maldivian Rufiyaa'),
(101, 'MWK', 'Malawian Kwacha'),
(102, 'MXN', 'Mexican Peso'),
(103, 'MYR', 'Malaysian Ringgit'),
(104, 'MZN', 'Mozambican Metical'),
(105, 'NAD', 'Namibian Dollar'),
(106, 'NGN', 'Nigerian Naira'),
(107, 'NIO', 'Nicaraguan Córdoba'),
(108, 'NOK', 'Norwegian Krone'),
(109, 'NPR', 'Nepalese Rupee'),
(110, 'NZD', 'New Zealand Dollar'),
(111, 'OMR', 'Omani Rial'),
(112, 'PAB', 'Panamanian Balboa'),
(113, 'PEN', 'Peruvian Nuevo Sol'),
(114, 'PGK', 'Papua New Guinean Kina'),
(115, 'PHP', 'Philippine Peso'),
(116, 'PKR', 'Pakistani Rupee'),
(117, 'PLN', 'Polish Zloty'),
(118, 'PYG', 'Paraguayan Guarani'),
(119, 'QAR', 'Qatari Rial'),
(120, 'RON', 'Romanian Leu'),
(121, 'RSD', 'Serbian Dinar'),
(122, 'RUB', 'Russian Ruble'),
(123, 'RWF', 'Rwandan Franc'),
(124, 'SAR', 'Saudi Riyal'),
(125, 'SBD', 'Solomon Islands Dollar'),
(126, 'SCR', 'Seychellois Rupee'),
(127, 'SDG', 'Sudanese Pound'),
(128, 'SEK', 'Swedish Krona'),
(129, 'SGD', 'Singapore Dollar'),
(130, 'SHP', 'Saint Helena Pound'),
(131, 'SLL', 'Sierra Leonean Leone'),
(132, 'SOS', 'Somali Shilling'),
(133, 'SRD', 'Surinamese Dollar'),
(134, 'SSP', 'South Sudanese Pound'),
(135, 'STD', 'São Tomé and Príncipe Dobra (pre-2018)'),
(136, 'STN', 'São Tomé and Príncipe Dobra'),
(137, 'SVC', 'Salvadoran Colón'),
(138, 'SYP', 'Syrian Pound'),
(139, 'SZL', 'Swazi Lilangeni'),
(140, 'THB', 'Thai Baht'),
(141, 'TJS', 'Tajikistani Somoni'),
(142, 'TMT', 'Turkmenistani Manat'),
(143, 'TND', 'Tunisian Dinar'),
(144, 'TOP', 'Tongan Pa\'anga'),
(145, 'TRY', 'Turkish Lira'),
(146, 'TTD', 'Trinidad and Tobago Dollar'),
(147, 'TWD', 'New Taiwan Dollar'),
(148, 'TZS', 'Tanzanian Shilling'),
(149, 'UAH', 'Ukrainian Hryvnia'),
(150, 'UGX', 'Ugandan Shilling'),
(151, 'USD', 'United States Dollar'),
(152, 'UYU', 'Uruguayan Peso'),
(153, 'UZS', 'Uzbekistan Som'),
(154, 'VEF', 'Venezuelan Bolívar Fuerte'),
(155, 'VND', 'Vietnamese Dong'),
(156, 'VUV', 'Vanuatu Vatu'),
(157, 'WST', 'Samoan Tala'),
(158, 'XAF', 'CFA Franc BEAC'),
(159, 'XAG', 'Silver Ounce'),
(160, 'XAU', 'Gold Ounce'),
(161, 'XCD', 'East Caribbean Dollar'),
(162, 'XDR', 'Special Drawing Rights'),
(163, 'XOF', 'CFA Franc BCEAO'),
(164, 'XPD', 'Palladium Ounce'),
(165, 'XPF', 'CFP Franc'),
(166, 'XPT', 'Platinum Ounce'),
(167, 'YER', 'Yemeni Rial'),
(168, 'ZAR', 'South African Rand'),
(169, 'ZMW', 'Zambian Kwacha'),
(170, 'ZWL', 'Zimbabwean Dollar');

-- --------------------------------------------------------

--
-- Table structure for table `current_theme`
--

CREATE TABLE `current_theme` (
  `id` int(11) NOT NULL,
  `header` int(11) NOT NULL,
  `carousel` int(11) NOT NULL,
  `banner` int(11) NOT NULL,
  `footer` int(11) NOT NULL,
  `product_section_order` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart` int(11) NOT NULL,
  `news` int(11) NOT NULL,
  `detail` int(11) NOT NULL,
  `shop` int(11) NOT NULL,
  `contact` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `current_theme`
--

INSERT INTO `current_theme` (`id`, `header`, `carousel`, `banner`, `footer`, `product_section_order`, `cart`, `news`, `detail`, `shop`, `contact`) VALUES
(1, 1, 1, 1, 1, '[{\"id\":10,\"name\":\"Second Ad Section\",\"order\":1,\"file_name\":\"sec_ad_banner\",\"status\":1,\"image\":\"images\\/prototypes\\/sec_ad_section.jpg\",\"disabled_image\":\"images\\/prototypes\\/sec_ad_section-cross.jpg\",\"alt\":\"Second Ad Section\"},{\"id\":5,\"name\":\"Categories\",\"order\":2,\"file_name\":\"categories\",\"status\":1,\"image\":\"images\\/prototypes\\/categories.jpg\",\"disabled_image\":\"images\\/prototypes\\/categories-cross.jpg\",\"alt\":\"Categories\"},{\"id\":1,\"name\":\"Banner Section\",\"order\":3,\"file_name\":\"banner_section\",\"status\":1,\"image\":\"images\\/prototypes\\/banner_section.jpg\",\"alt\":\"Banner Section\"},{\"id\":9,\"name\":\"Top Selling\",\"order\":4,\"file_name\":\"top\",\"status\":1,\"image\":\"images\\/prototypes\\/top.jpg\",\"disabled_image\":\"images\\/prototypes\\/top-cross.jpg\",\"alt\":\"Top Selling\"},{\"id\":8,\"name\":\"Newest Product Section\",\"order\":5,\"file_name\":\"newest_product\",\"status\":1,\"image\":\"images\\/prototypes\\/newest_product.jpg\",\"disabled_image\":\"images\\/prototypes\\/newest_product-cross.jpg\",\"alt\":\"Newest Product Section\"},{\"id\":11,\"name\":\"Tab Products View\",\"order\":6,\"file_name\":\"tab\",\"status\":1,\"image\":\"images\\/prototypes\\/tab.jpg\",\"disabled_image\":\"images\\/prototypes\\/tab-cross.jpg\",\"alt\":\"Tab Products View\"},{\"id\":3,\"name\":\"Special Products Section\",\"order\":7,\"file_name\":\"special\",\"status\":1,\"image\":\"images\\/prototypes\\/special_product.jpg\",\"disabled_image\":\"images\\/prototypes\\/special_product-cross.jpg\",\"alt\":\"Special Products Section\"},{\"id\":2,\"name\":\"Flash Sale Section\",\"order\":8,\"file_name\":\"flash_sale_section\",\"status\":1,\"image\":\"images\\/prototypes\\/flash_sale_section.jpg\",\"disabled_image\":\"images\\/prototypes\\/flash_sale_section-cross.jpg\",\"alt\":\"Flash Sale Section\"},{\"id\":4,\"name\":\"Ad Section\",\"order\":9,\"file_name\":\"ad_banner_section\",\"status\":1,\"image\":\"images\\/prototypes\\/ad_banner_section.jpg\",\"disabled_image\":\"images\\/prototypes\\/ad_banner_section-cross.jpg\",\"alt\":\"Ad Section\"},{\"id\":6,\"name\":\"Blog Section\",\"order\":10,\"file_name\":\"blog_section\",\"status\":1,\"image\":\"images\\/prototypes\\/blog_section.jpg\",\"disabled_image\":\"images\\/prototypes\\/blog_section-cross.jpg\",\"alt\":\"Blog Section\"},{\"id\":7,\"name\":\"Info Boxes\",\"order\":11,\"file_name\":\"info_boxes\",\"status\":1,\"image\":\"images\\/prototypes\\/info_boxes.jpg\",\"disabled_image\":\"images\\/prototypes\\/info_boxes-cross.jpg\",\"alt\":\"Info Boxes\"}]', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customers_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `customers_fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customers_newsletter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_id_tiwilo` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers_basket`
--

CREATE TABLE `customers_basket` (
  `customers_basket_id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `products_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1,
  `customers_basket_quantity` int(11) NOT NULL,
  `final_price` decimal(15,2) DEFAULT NULL,
  `rent_period` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_price` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customers_basket_date_added` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_order` tinyint(1) NOT NULL DEFAULT 0,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers_basket`
--

INSERT INTO `customers_basket` (`customers_basket_id`, `customers_id`, `products_id`, `type`, `customers_basket_quantity`, `final_price`, `rent_period`, `rent_price`, `customers_basket_date_added`, `is_order`, `session_id`, `created_at`, `updated_at`) VALUES
(5, 4, '1', 1, 2, '36.78', NULL, NULL, '2020-10-22', 1, 'uXWcJ9tmVq7bfbw5Kl2igLKQ8yW0GvwXxlf0rbNK', '2020-10-22 12:17:36', '2020-10-23 05:21:20'),
(6, 4, '3', 1, 1, '156.00', NULL, NULL, '2020-10-22', 1, 'uXWcJ9tmVq7bfbw5Kl2igLKQ8yW0GvwXxlf0rbNK', '2020-10-22 12:18:09', '2020-10-23 05:21:20'),
(7, 4, '1', 1, 2, '36.78', NULL, NULL, '2020-10-23', 1, '5B81uHNbRob2dmwfOlNWUXSlPGb9ruTrYatvJIkX', '2020-10-23 05:45:19', '2020-10-26 11:12:26'),
(8, 4, '3', 1, 1, '156.00', NULL, NULL, '2020-10-23', 1, '5B81uHNbRob2dmwfOlNWUXSlPGb9ruTrYatvJIkX', '2020-10-23 06:11:40', '2020-10-26 11:12:26'),
(9, 4, '3', 1, 2, '156.00', NULL, NULL, '2020-10-26', 1, 'BZUh6vz3QS7tRQUSkKeN3L2LLTNZIfRm0hJa7rKT', '2020-10-26 11:17:21', '2020-10-26 11:18:13'),
(10, 4, '3', 1, 1, '156.00', NULL, NULL, '2020-10-26', 1, 'BZUh6vz3QS7tRQUSkKeN3L2LLTNZIfRm0hJa7rKT', '2020-10-26 11:33:40', '2020-10-26 13:00:04'),
(12, 4, '1', 1, 2, '36.78', NULL, NULL, '2020-10-26', 1, 'BZUh6vz3QS7tRQUSkKeN3L2LLTNZIfRm0hJa7rKT', '2020-10-26 12:45:37', '2020-10-26 13:00:04'),
(13, 0, '1', 1, 2, '36.78', NULL, NULL, '2020-10-26', 0, 'wE1MIoq1aWJSQJNFZOdFsEZa4rwjV8PujsdPaaoD', '2020-10-26 12:52:08', '2020-10-26 12:56:13'),
(25, 4, '3', 1, 6, '156.00', NULL, NULL, '2020-10-30', 1, 'n5cf4QVHnDWaE8GQTOhal2XNSM8C7UrkiQk8bVce', '2020-10-30 07:42:29', '2020-10-30 13:08:02'),
(15, 0, '1', 1, 2, '36.78', NULL, NULL, '2020-10-29', 0, 'gsXmaR5zHkX7MGTVmPVXZGChGlvaEX44MDVmcSIk', '2020-10-29 05:59:05', '2020-10-29 06:02:13'),
(21, 4, '1', 2, 1, '36.78', NULL, NULL, '2020-10-29', 1, 'HKp3yAIcqavc7gFEKYJ5PBub3Twxj2Cew6hfAMp7', '2020-10-29 10:47:11', '2020-10-29 11:15:24'),
(26, 4, '1', 1, 4, '36.78', NULL, NULL, '2020-10-30', 1, '1a7ROCeG9TZLOYd9kzlHjI26tIQbvqQZyuze5uwr', '2020-10-30 07:53:46', '2020-10-30 13:08:02'),
(23, 4, '3', 1, 2, '156.00', NULL, NULL, '2020-10-29', 1, 'IlRWoFQbFr0I44yB3vGtf1F10kaGKXJTqHgOFny7', '2020-10-29 10:56:13', '2020-10-29 11:15:24'),
(27, 10, '3', 1, 1, '156.00', NULL, NULL, '2020-10-30', 1, 'CkcXBDMnouDRxeG5RyXibnF05o8yuoCnd1imr9o1', '2020-10-30 12:29:24', '2020-10-30 13:06:09'),
(28, 10, '3', 1, 1, '156.00', NULL, NULL, '2020-10-30', 1, 'CkcXBDMnouDRxeG5RyXibnF05o8yuoCnd1imr9o1', '2020-10-30 13:05:44', '2020-10-30 13:06:09'),
(29, 10, '3', 1, 1, '156.00', NULL, NULL, '2020-10-30', 0, 'CkcXBDMnouDRxeG5RyXibnF05o8yuoCnd1imr9o1', '2020-10-30 13:06:43', '2020-10-30 13:06:43'),
(30, 4, '1', 1, 2, '36.78', NULL, NULL, '2020-10-31', 1, 'j9aNrv2uuuoMwWiLgBWyhiIxg5aPc0ix5qDLZY9v', '2020-10-31 04:17:05', '2020-10-31 07:39:48'),
(31, 4, '3', 1, 1, '156.00', NULL, NULL, '2020-10-31', 1, 'j9aNrv2uuuoMwWiLgBWyhiIxg5aPc0ix5qDLZY9v', '2020-10-31 04:23:49', '2020-10-31 07:39:48'),
(32, 4, '2', 1, 1, '56.99', NULL, NULL, '2020-10-31', 1, 'j9aNrv2uuuoMwWiLgBWyhiIxg5aPc0ix5qDLZY9v', '2020-10-31 04:25:27', '2020-10-31 07:39:48'),
(33, 4, '3', 1, 1, '156.00', NULL, NULL, '2020-10-31', 1, 'j9aNrv2uuuoMwWiLgBWyhiIxg5aPc0ix5qDLZY9v', '2020-10-31 07:41:49', '2020-10-31 07:42:36'),
(34, 4, '1', 1, 1, '36.78', NULL, NULL, '2020-10-31', 1, 'j9aNrv2uuuoMwWiLgBWyhiIxg5aPc0ix5qDLZY9v', '2020-10-31 07:41:59', '2020-10-31 07:42:36'),
(35, 4, '3', 1, 1, '156.00', NULL, NULL, '2020-10-31', 1, 'j9aNrv2uuuoMwWiLgBWyhiIxg5aPc0ix5qDLZY9v', '2020-10-31 08:02:07', '2020-10-31 10:10:00'),
(36, 4, '3', 1, 1, '156.00', NULL, NULL, '2020-10-31', 1, 'XWRnc5MNTmy6q50jWH3BvK6td2H4hyi4iVLMM9Br', '2020-10-31 10:24:03', '2020-10-31 10:29:54'),
(37, 4, '1', 1, 2, '36.78', NULL, NULL, '2020-10-31', 1, 'XWRnc5MNTmy6q50jWH3BvK6td2H4hyi4iVLMM9Br', '2020-10-31 10:24:15', '2020-10-31 10:29:54'),
(38, 4, '3', 1, 1, '156.00', NULL, NULL, '2020-10-31', 1, 'XWRnc5MNTmy6q50jWH3BvK6td2H4hyi4iVLMM9Br', '2020-10-31 10:30:09', '2020-10-31 10:31:03'),
(46, 0, '3', 1, 2, '156.00', NULL, NULL, '2020-10-31', 0, 'QNO5mgPhwUxw4GCCvArSZgxHbksrzfaVg18pUVsM', '2020-10-31 11:12:43', '2020-10-31 11:12:48'),
(40, 0, '1', 1, 1, '36.78', NULL, NULL, '2020-10-31', 0, 'N1fMLM0bpypxKH1OCuHnvvAPwicbTHv17oa1D4Rw', '2020-10-31 10:38:11', '2020-10-31 10:38:11'),
(41, 0, '1', 1, 2, '36.78', NULL, NULL, '2020-10-31', 0, 'C8j9MnD8zClv8DMi9GJU30Jsp6YpHrIsDRHROTnD', '2020-10-31 10:41:57', '2020-10-31 10:42:02'),
(42, 0, '2', 1, 1, '56.99', NULL, NULL, '2020-10-31', 0, 'SoEfWAuHZatG3MP1TIY11JcoLrQMhtbPf6Qeoq37', '2020-10-31 10:59:43', '2020-10-31 10:59:43'),
(43, 0, '1', 1, 1, '36.78', NULL, NULL, '2020-10-31', 0, 'rbLSF21BPdiBMQOHrYRDQtCYzJHSXPLUQKd2NqrN', '2020-10-31 11:03:56', '2020-10-31 11:03:56'),
(44, 17, '2', 1, 1, '56.99', NULL, NULL, '2020-10-31', 0, 'vVDmRUXUdxka7S7z5LJuALkIvWG6nUyRdeuZorBL', '2020-10-31 11:06:10', '2020-10-31 11:06:10'),
(45, 4, '3', 1, 1, '156.00', NULL, NULL, '2020-10-31', 1, 'mBx8LlkC19O6bAuddzF19ulakIgPP4OLHN53jwhA', '2020-10-31 11:06:36', '2020-10-31 11:12:16'),
(47, 20, '3', 1, 3, '156.00', NULL, NULL, '2020-10-31', 1, 'r0j7abX2EGAsP8N8qw6HfIekSFe3IUlk4XFBGNhm', '2020-10-31 11:13:35', '2020-10-31 11:32:22'),
(48, 4, '3', 1, 1, '156.00', NULL, NULL, '2020-10-31', 1, '2P3XUkAxodMNW67xqxfb3NGkANI5RJoJfYMiLjrx', '2020-10-31 11:34:48', '2020-10-31 11:36:54'),
(49, 4, '1', 1, 6, '36.78', NULL, NULL, '2020-10-31', 1, '4IY1h3uyGeKoagoAl4sfRlL0ZT8xLJmg6FftmKyl', '2020-10-31 11:37:12', '2020-10-31 11:38:21'),
(50, 4, '3', 1, 1, '156.00', NULL, NULL, '2020-10-31', 1, '4IY1h3uyGeKoagoAl4sfRlL0ZT8xLJmg6FftmKyl', '2020-10-31 11:39:55', '2020-10-31 11:41:56'),
(51, 4, '3', 1, 1, '156.00', NULL, NULL, '2020-10-31', 1, '4IY1h3uyGeKoagoAl4sfRlL0ZT8xLJmg6FftmKyl', '2020-10-31 11:57:18', '2020-10-31 12:10:39'),
(52, 4, '3', 1, 1, '156.00', NULL, NULL, '2020-10-31', 1, '4IY1h3uyGeKoagoAl4sfRlL0ZT8xLJmg6FftmKyl', '2020-10-31 12:11:13', '2020-10-31 12:22:23'),
(53, 4, '3', 1, 1, '156.00', NULL, NULL, '2020-10-31', 1, '4IY1h3uyGeKoagoAl4sfRlL0ZT8xLJmg6FftmKyl', '2020-10-31 12:22:54', '2020-10-31 12:24:19'),
(54, 4, '1', 1, 2, '36.78', NULL, NULL, '2020-10-31', 1, '4IY1h3uyGeKoagoAl4sfRlL0ZT8xLJmg6FftmKyl', '2020-10-31 12:23:01', '2020-10-31 12:24:19'),
(55, 4, '3', 1, 4, '156.00', NULL, NULL, '2020-10-31', 1, '6Gh5NCWjJ4PgMTwux1txxPUJngj23DuheIrrh5Qd', '2020-10-31 12:24:42', '2020-10-31 12:27:06'),
(56, 4, '3', 1, 1, '156.00', NULL, NULL, '2020-10-31', 1, '6PaUv9uWGdlhaWEbymTkpFyI9i9sV1xV3o67kbgi', '2020-10-31 12:27:40', '2020-11-03 12:57:23'),
(57, 0, '1', 1, 3, '36.78', NULL, NULL, '2020-10-31', 0, 'Cm4it7qNPWS5AqcyV1kDUP7dZ9TqfElUufOAyNVg', '2020-10-31 12:28:10', '2020-10-31 12:28:15'),
(58, 4, '5', 1, 1, '500.00', NULL, NULL, '2020-11-02', 1, 'aBDem23C7V8JYIk7IM7JrwDmbfwAS6aQ3XxL3KcN', '2020-11-02 05:44:46', '2020-11-03 12:57:22'),
(61, 4, '16', 1, 1, '56.99', NULL, NULL, '2020-11-02', 1, 'aBDem23C7V8JYIk7IM7JrwDmbfwAS6aQ3XxL3KcN', '2020-11-02 07:41:35', '2020-11-03 12:57:22'),
(62, 4, '22', 1, 1, '56.99', NULL, NULL, '2020-11-02', 1, '1xGA7Na8tFmebR5kEe6kzejJ1xmEovaoWidAbcgM', '2020-11-02 10:20:25', '2020-11-03 12:57:23'),
(64, 4, '1', 1, 1, '36.78', NULL, NULL, '2020-11-03', 1, 'yDqwGRxBa3LIrPmy2oaeW8BjQaDaeXFXPbOzlNsD', '2020-11-03 12:57:07', '2020-11-03 12:57:23'),
(65, 4, '24', 1, 2, '300.00', NULL, NULL, '2020-11-04', 1, 'X8W8er6gqAb5Yl8WVgEjqTiNXlyzPGqN7W35thAw', '2020-11-04 04:36:19', '2020-11-04 11:35:47'),
(66, 4, '1', 1, 2, '36.78', NULL, NULL, '2020-11-04', 1, 'X8W8er6gqAb5Yl8WVgEjqTiNXlyzPGqN7W35thAw', '2020-11-04 10:55:30', '2020-11-04 11:35:47'),
(67, 0, '19', 1, 1, '300.00', NULL, NULL, '2020-11-04', 0, 'xAJW11WrfrzkxqIAYoIc4kZnTDJhdVKL3Fhp5TFW', '2020-11-04 11:21:54', '2020-11-04 11:21:54'),
(68, 4, '1', 1, 1, '36.78', NULL, NULL, '2020-11-04', 1, '8rTUOrjGpgZtEhqfD7Y4BW9dtfTSJ7eLIV9N6u7f', '2020-11-04 11:39:30', '2020-11-04 12:00:05'),
(69, 4, '24', 1, 2, '300.00', NULL, NULL, '2020-11-04', 1, '8rTUOrjGpgZtEhqfD7Y4BW9dtfTSJ7eLIV9N6u7f', '2020-11-04 11:39:56', '2020-11-04 12:00:05'),
(70, 4, '1', 1, 1, '36.78', NULL, NULL, '2020-11-04', 1, '8rTUOrjGpgZtEhqfD7Y4BW9dtfTSJ7eLIV9N6u7f', '2020-11-04 12:01:49', '2020-11-04 12:11:01'),
(71, 4, '24', 1, 2, '300.00', NULL, NULL, '2020-11-04', 1, '8rTUOrjGpgZtEhqfD7Y4BW9dtfTSJ7eLIV9N6u7f', '2020-11-04 12:02:00', '2020-11-04 12:11:01'),
(72, 4, '1', 1, 1, '36.78', NULL, NULL, '2020-11-04', 1, '8rTUOrjGpgZtEhqfD7Y4BW9dtfTSJ7eLIV9N6u7f', '2020-11-04 12:16:03', '2020-11-04 12:18:14'),
(73, 4, '24', 1, 2, '300.00', NULL, NULL, '2020-11-04', 1, '8rTUOrjGpgZtEhqfD7Y4BW9dtfTSJ7eLIV9N6u7f', '2020-11-04 12:16:08', '2020-11-04 12:18:14'),
(74, 4, '1', 1, 1, '36.78', NULL, NULL, '2020-11-04', 1, '8rTUOrjGpgZtEhqfD7Y4BW9dtfTSJ7eLIV9N6u7f', '2020-11-04 12:19:36', '2020-11-04 12:22:10'),
(75, 4, '24', 1, 2, '300.00', NULL, NULL, '2020-11-04', 1, '8rTUOrjGpgZtEhqfD7Y4BW9dtfTSJ7eLIV9N6u7f', '2020-11-04 12:19:41', '2020-11-04 12:22:10'),
(76, 4, '1', 1, 1, '36.78', NULL, NULL, '2020-11-04', 1, '8rTUOrjGpgZtEhqfD7Y4BW9dtfTSJ7eLIV9N6u7f', '2020-11-04 12:22:34', '2020-11-04 12:23:21'),
(77, 4, '24', 1, 2, '300.00', NULL, NULL, '2020-11-04', 1, '8rTUOrjGpgZtEhqfD7Y4BW9dtfTSJ7eLIV9N6u7f', '2020-11-04 12:22:40', '2020-11-04 12:23:21'),
(78, 4, '1', 1, 1, '36.78', NULL, NULL, '2020-11-04', 1, '8rTUOrjGpgZtEhqfD7Y4BW9dtfTSJ7eLIV9N6u7f', '2020-11-04 12:24:01', '2020-11-04 12:24:57'),
(79, 4, '24', 1, 2, '300.00', NULL, NULL, '2020-11-04', 1, '8rTUOrjGpgZtEhqfD7Y4BW9dtfTSJ7eLIV9N6u7f', '2020-11-04 12:24:07', '2020-11-04 12:24:57'),
(80, 22, '24', 1, 1, '300.00', NULL, NULL, '2020-11-04', 1, 'vHfZEzycCf3bhYEqGiQ424f2pXPiFWvUI91W4pHZ', '2020-11-04 12:35:46', '2020-11-04 12:53:53'),
(81, 22, '22', 1, 2, '56.99', NULL, NULL, '2020-11-04', 1, 'vHfZEzycCf3bhYEqGiQ424f2pXPiFWvUI91W4pHZ', '2020-11-04 12:35:56', '2020-11-04 12:53:53'),
(82, 22, '24', 1, 1, '300.00', NULL, NULL, '2020-11-04', 0, 'vHfZEzycCf3bhYEqGiQ424f2pXPiFWvUI91W4pHZ', '2020-11-04 12:39:23', '2020-11-04 12:53:53'),
(83, 22, '22', 1, 2, '56.99', NULL, NULL, '2020-11-04', 0, 'vHfZEzycCf3bhYEqGiQ424f2pXPiFWvUI91W4pHZ', '2020-11-04 12:39:32', '2020-11-04 12:53:53'),
(84, 4, '1', 1, 1, '36.78', NULL, NULL, '2020-11-05', 1, 'IfAq9bwRCEdnPlfHpnq9emTScTBIrr8HDe5nRqMa', '2020-11-05 05:00:27', '2020-11-05 05:00:47'),
(85, 4, '1', 1, 1, '36.78', NULL, NULL, '2020-11-05', 1, 'IfAq9bwRCEdnPlfHpnq9emTScTBIrr8HDe5nRqMa', '2020-11-05 05:01:47', '2020-11-05 05:01:57'),
(86, 4, '1', 1, 1, '36.78', NULL, NULL, '2020-11-05', 1, 'IfAq9bwRCEdnPlfHpnq9emTScTBIrr8HDe5nRqMa', '2020-11-05 05:02:44', '2020-11-05 05:02:55'),
(87, 4, '1', 1, 1, '36.78', NULL, NULL, '2020-11-05', 1, 'IfAq9bwRCEdnPlfHpnq9emTScTBIrr8HDe5nRqMa', '2020-11-05 05:04:40', '2020-11-05 05:04:50'),
(88, 4, '1', 1, 1, '36.78', NULL, NULL, '2020-11-05', 1, 'IfAq9bwRCEdnPlfHpnq9emTScTBIrr8HDe5nRqMa', '2020-11-05 05:07:24', '2020-11-05 05:08:52'),
(89, 4, '1', 1, 2, '36.78', NULL, NULL, '2020-11-05', 1, 'IfAq9bwRCEdnPlfHpnq9emTScTBIrr8HDe5nRqMa', '2020-11-05 05:12:16', '2020-11-05 05:12:42'),
(90, 4, '1', 1, 1, '36.78', NULL, NULL, '2020-11-05', 1, 'IfAq9bwRCEdnPlfHpnq9emTScTBIrr8HDe5nRqMa', '2020-11-05 05:13:39', '2020-11-05 05:13:54'),
(91, 4, '1', 1, 1, '36.78', NULL, NULL, '2020-11-05', 1, 'IfAq9bwRCEdnPlfHpnq9emTScTBIrr8HDe5nRqMa', '2020-11-05 05:17:43', '2020-11-05 05:18:03'),
(92, 4, '1', 1, 3, '36.78', NULL, NULL, '2020-11-05', 1, 'IfAq9bwRCEdnPlfHpnq9emTScTBIrr8HDe5nRqMa', '2020-11-05 05:18:34', '2020-11-05 05:19:11'),
(93, 24, '24', 1, 1, '300.00', NULL, NULL, '2020-11-05', 1, 'qWgvkSmtiOS2va7Y7xVWAjL0CAwOXVb9zOE1Q0AT', '2020-11-05 05:19:50', '2020-11-05 05:31:04'),
(94, 24, '24', 1, 1, '300.00', NULL, NULL, '2020-11-05', 1, 'qWgvkSmtiOS2va7Y7xVWAjL0CAwOXVb9zOE1Q0AT', '2020-11-05 05:22:20', '2020-11-05 05:31:04'),
(95, 24, '24', 1, 1, '300.00', NULL, NULL, '2020-11-05', 1, 'qWgvkSmtiOS2va7Y7xVWAjL0CAwOXVb9zOE1Q0AT', '2020-11-05 05:24:55', '2020-11-05 05:31:04'),
(96, 24, '24', 1, 1, '300.00', NULL, NULL, '2020-11-05', 1, 'qWgvkSmtiOS2va7Y7xVWAjL0CAwOXVb9zOE1Q0AT', '2020-11-05 05:27:07', '2020-11-05 05:31:04'),
(97, 4, '24', 1, 1, '300.00', NULL, NULL, '2020-11-05', 1, 'Uf2GInco3GFHkj1RR9tkRSPm03OCoLS1kaoMtgOa', '2020-11-05 06:20:49', '2020-11-05 06:22:24'),
(98, 4, '1', 1, 2, '36.78', NULL, NULL, '2020-11-05', 1, 'Uf2GInco3GFHkj1RR9tkRSPm03OCoLS1kaoMtgOa', '2020-11-05 06:21:29', '2020-11-05 06:22:24'),
(99, 4, '23', 1, 1, '300.00', NULL, NULL, '2020-11-05', 1, 'Sw6hW3pIsBH5X91FYTrMsqeHW3IOe2mIHHMDuPK9', '2020-11-05 09:03:56', '2020-11-05 09:05:01'),
(100, 4, '29', 1, 2, '50.00', NULL, NULL, '2020-11-05', 1, 'Sw6hW3pIsBH5X91FYTrMsqeHW3IOe2mIHHMDuPK9', '2020-11-05 09:04:07', '2020-11-05 09:05:01'),
(101, 4, '23', 1, 1, '300.00', NULL, NULL, '2020-11-05', 1, 'oBNMv7QfT3idr4WZSNpoFAXas0yx7PgQINzL48AR', '2020-11-05 09:45:57', '2020-11-05 09:46:32'),
(102, 4, '24', 1, 1, '300.00', NULL, NULL, '2020-11-05', 1, 'oBNMv7QfT3idr4WZSNpoFAXas0yx7PgQINzL48AR', '2020-11-05 09:46:00', '2020-11-05 09:46:32'),
(103, 4, '29', 1, 1, '50.00', NULL, NULL, '2020-11-05', 1, 'oBNMv7QfT3idr4WZSNpoFAXas0yx7PgQINzL48AR', '2020-11-05 09:46:03', '2020-11-05 09:46:32'),
(105, 4, '22', 1, 1, '56.99', NULL, NULL, '2020-11-06', 1, 'O4bRwFpDffKV0NhPbBiRhRm9bHrpo1S6SYn9JQKr', '2020-11-06 06:59:43', '2020-11-06 07:01:04'),
(106, 4, '2', 1, 1, '56.99', NULL, NULL, '2020-11-06', 1, 'O4bRwFpDffKV0NhPbBiRhRm9bHrpo1S6SYn9JQKr', '2020-11-06 06:59:58', '2020-11-06 07:01:04'),
(107, 4, '6', 1, 1, '156.00', NULL, NULL, '2020-11-06', 1, 'O4bRwFpDffKV0NhPbBiRhRm9bHrpo1S6SYn9JQKr', '2020-11-06 07:00:18', '2020-11-06 07:01:04'),
(108, 4, '8', 1, 1, '156.00', NULL, NULL, '2020-11-06', 1, 'O4bRwFpDffKV0NhPbBiRhRm9bHrpo1S6SYn9JQKr', '2020-11-06 07:00:31', '2020-11-06 07:01:04'),
(109, 4, '13', 1, 1, '56.99', NULL, NULL, '2020-11-06', 1, 'O4bRwFpDffKV0NhPbBiRhRm9bHrpo1S6SYn9JQKr', '2020-11-06 07:00:44', '2020-11-06 07:01:04'),
(110, 4, '29', 1, 4, '50.00', NULL, NULL, '2020-11-06', 1, 'SLBAzznvTNbKRcm2KIdpBd5fxOIKXxy8DkmkSUZR', '2020-11-06 11:40:31', '2020-11-07 06:03:36'),
(111, 4, '22', 1, 2, '56.99', NULL, NULL, '2020-11-06', 1, 'SLBAzznvTNbKRcm2KIdpBd5fxOIKXxy8DkmkSUZR', '2020-11-06 13:05:51', '2020-11-07 06:03:36'),
(112, 4, '9', 1, 2, '400.00', NULL, NULL, '2020-11-07', 1, 'Ea2HaNr7Rptbd3owCFzWzohGl49YJgrmgd3KE04r', '2020-11-07 04:16:08', '2020-11-07 06:03:36'),
(113, 0, '29', 1, 1, '50.00', NULL, NULL, '2020-11-07', 0, 'RMk727VmV6mo6usZymyQ9UZNxbmuiYHt0zvcFbCQ', '2020-11-07 04:34:39', '2020-11-07 05:05:44'),
(115, 0, '13', 1, 4, '56.99', NULL, NULL, '2020-11-07', 0, 'FajoyFmP6BptULvWeQ33ZXn2dFKQ2QDFOhFEMT7q', '2020-11-07 05:05:44', '2020-11-07 05:05:45'),
(117, 4, '10', 1, 2, '180.00', NULL, NULL, '2020-11-07', 1, 'Ea2HaNr7Rptbd3owCFzWzohGl49YJgrmgd3KE04r', '2020-11-07 06:02:38', '2020-11-07 06:03:36'),
(133, 0, '8', 1, 1, '156.00', NULL, NULL, '2020-11-30', 0, 'vnQWP1sWOTGMtON2wU7LE1Zmy1gSTMqTfQkYmsgg', '2020-11-30 09:29:02', '2020-11-30 09:29:02'),
(119, 0, '22', 1, 2, '56.99', NULL, NULL, '2020-11-09', 0, '8e4ygCCylo8asPEJ3nXdeEx1lDqNz1HYTHLj8Tbo', '2020-11-09 04:21:38', '2020-11-09 04:21:45'),
(120, 0, '9', 1, 1, '400.00', NULL, NULL, '2020-11-09', 0, '8e4ygCCylo8asPEJ3nXdeEx1lDqNz1HYTHLj8Tbo', '2020-11-09 04:35:15', '2020-11-09 04:35:15'),
(121, 0, '21', 1, 1, '156.00', NULL, NULL, '2020-11-09', 0, 'gQ5wmvurI9pNj0PT1Ghoo5lHccWTtUUKh5PSPJ9b', '2020-11-09 08:02:51', '2020-11-09 08:02:51'),
(122, 0, '16', 1, 1, '56.99', NULL, NULL, '2020-11-09', 0, 'gQ5wmvurI9pNj0PT1Ghoo5lHccWTtUUKh5PSPJ9b', '2020-11-09 09:53:45', '2020-11-09 09:53:45'),
(123, 0, '29', 1, 1, '50.00', NULL, NULL, '2020-11-09', 0, 'gQ5wmvurI9pNj0PT1Ghoo5lHccWTtUUKh5PSPJ9b', '2020-11-09 13:39:12', '2020-11-09 13:39:12'),
(124, 0, '15', 1, 1, '156.00', NULL, NULL, '2020-11-09', 0, 'gQ5wmvurI9pNj0PT1Ghoo5lHccWTtUUKh5PSPJ9b', '2020-11-09 13:49:48', '2020-11-09 13:49:48'),
(125, 0, '10', 1, 1, '180.00', NULL, NULL, '2020-11-09', 0, 'lKkSPAQHKFoFUKWpciWHWFJD0q0tRdbkEzV1rCsm', '2020-11-09 13:53:24', '2020-11-09 13:53:24'),
(126, 0, '9', 1, 1, '400.00', NULL, NULL, '2020-11-09', 0, 'rdZCMz944TP3Fu51EXUN0GL4OBYCGW8aVbkcCd5j', '2020-11-09 13:58:23', '2020-11-09 13:58:23'),
(127, 0, '10', 1, 1, '180.00', NULL, NULL, '2020-11-10', 0, 'sVyCl0phzbX2FX8TPKT7fDZ8iC90SnS6iJfyJGbs', '2020-11-10 04:21:15', '2020-11-10 04:21:15'),
(128, 0, '1', 1, 1, '36.78', NULL, NULL, '2020-11-10', 0, 'sVyCl0phzbX2FX8TPKT7fDZ8iC90SnS6iJfyJGbs', '2020-11-10 04:21:35', '2020-11-10 04:21:35'),
(129, 0, '2', 1, 1, '56.99', NULL, NULL, '2020-11-10', 0, 'sVyCl0phzbX2FX8TPKT7fDZ8iC90SnS6iJfyJGbs', '2020-11-10 04:21:36', '2020-11-10 04:21:36'),
(130, 0, '3', 1, 1, '156.00', NULL, NULL, '2020-11-10', 0, 'sVyCl0phzbX2FX8TPKT7fDZ8iC90SnS6iJfyJGbs', '2020-11-10 04:21:37', '2020-11-10 04:21:37'),
(131, 0, '5', 1, 2, '500.00', NULL, NULL, '2020-11-10', 0, 'sVyCl0phzbX2FX8TPKT7fDZ8iC90SnS6iJfyJGbs', '2020-11-10 04:21:38', '2020-11-10 07:24:35'),
(132, 0, '24', 1, 1, '300.00', NULL, NULL, '2020-11-10', 0, 'sVyCl0phzbX2FX8TPKT7fDZ8iC90SnS6iJfyJGbs', '2020-11-10 12:42:39', '2020-11-10 12:42:39'),
(137, 0, '2', 1, 1, '56.99', NULL, NULL, '2020-12-10', 0, 'CvxuQCv55Buqxs4xhlvR4R4tFjTzx6OAB0MDuUuG', '2020-12-10 15:14:37', '2020-12-10 15:14:37'),
(138, 32, '23', 1, 1, '300.00', NULL, NULL, '2020-12-11', 1, 'ZkA8XUrs1Iz4krNYQzY5csa40mITDsElRVyeOCFB', '2020-12-11 12:35:19', '2020-12-11 12:36:37'),
(141, 0, '9', 2, 1, '400.00', NULL, NULL, '2020-12-14', 0, 'jHGzftvP9VirSvoDpBzrdI5xOG6Mpgx2XGuON9Pm', '2020-12-14 12:06:44', '2020-12-14 12:41:53'),
(140, 0, '9', 1, 1, '400.00', NULL, NULL, '2020-12-14', 0, 'w7n6xB1mH2AOuosJFCtPzWMdGA74bfAp7aZ51gOx', '2020-12-14 10:35:26', '2020-12-14 10:35:29'),
(142, 4, '29', 1, 1, '50.00', NULL, NULL, '2020-12-16', 0, 'zsREH2rkvuJgwS9sA5gOkIcZ7aST6EZNn6l5oAN3', '2020-12-16 04:58:32', '2020-12-16 04:59:42'),
(143, 0, '29', 1, 3, '50.00', NULL, NULL, '2020-12-30', 0, 'k2D0FF1V5sHs7in3XcE8tJEzOg05GDNld8QxUHKF', '2020-12-30 05:20:17', '2020-12-30 05:20:35'),
(144, 0, '2', 1, 1, '56.99', NULL, NULL, '2021-01-01', 0, 'MPDXPYYpjka3ZEDBum20zHcY88jeRwU4Iqn8QDM3', '2021-01-01 05:10:09', '2021-01-01 05:10:09'),
(145, 34, '19', 1, 1, '300.00', NULL, NULL, '2021-01-06', 1, 'hVjlmH9662TUf69XepyfbJEuabhpSm8ovaghM2lM', '2021-01-06 09:42:23', '2021-01-06 09:52:11'),
(146, 34, '1', 2, 1, '36.78', NULL, NULL, '2021-01-06', 1, 'cgrAhiSoTtjdoxNIfhS1rwdqeBh0Q5rDmsqk4YL4', '2021-01-06 09:50:40', '2021-01-06 09:52:11'),
(147, 35, '2', 1, 1, '56.99', NULL, NULL, '2021-01-19', 0, '4UT0rDJ72EPWgT6FJBe8GC0pynVlIEjsDilQlhpv', '2021-01-19 05:30:10', '2021-01-19 05:30:10'),
(148, 36, '9', 1, 1, '400.00', NULL, NULL, '2021-01-19', 1, 'sDWjuPIKxtiaSOGWGOOvIitHPSe4RbP39vMyaOkJ', '2021-01-19 06:58:37', '2021-01-19 07:05:21'),
(149, 36, '24', 1, 1, '300.00', NULL, NULL, '2021-01-19', 1, 'sDWjuPIKxtiaSOGWGOOvIitHPSe4RbP39vMyaOkJ', '2021-01-19 07:00:34', '2021-01-19 07:05:21'),
(150, 0, '6', 1, 2, '156.00', NULL, NULL, '2021-02-01', 0, 'EDRPLthQrHhFaIrI81tGHl47oWFs1uUkuCt07EhD', '2021-02-01 07:32:25', '2021-02-01 07:32:25'),
(151, 0, '22', 1, 1, '56.99', NULL, NULL, '2021-02-08', 0, 'SO6JYHVHfLWQI879suxQQ3BdDBTQho5gewh81wga', '2021-02-08 11:18:56', '2021-02-08 11:18:56'),
(152, 0, '24', 1, 1, '300.00', NULL, NULL, '2021-02-09', 0, 'sIOtIDyyqcPGt6baD3HxodAckqrjT7mLx947CjMi', '2021-02-09 04:32:04', '2021-02-09 04:32:04'),
(153, 0, '24', 1, 2, '300.00', NULL, NULL, '2021-02-09', 0, 'OclG8hE8KHu46KW5lLvkpKLsp86TL1rJR0yFxTjN', '2021-02-09 06:18:37', '2021-02-09 07:29:33'),
(154, 0, '24', 1, 1, '300.00', NULL, NULL, '2021-02-09', 1, 'cultbYcT5UBP1dHKwNXNtzLKf9I7daB99TLSUvqG', '2021-02-09 07:27:02', '2021-02-09 07:28:47'),
(155, 0, '8', 1, 2, '156.00', NULL, NULL, '2021-02-09', 0, 'cultbYcT5UBP1dHKwNXNtzLKf9I7daB99TLSUvqG', '2021-02-09 07:56:11', '2021-02-09 07:57:49'),
(156, 0, '24', 1, 1, '300.00', NULL, NULL, '2021-02-09', 0, 'iRGJNKdtgMVsRPOwfLJrxV4anptmuTO62a5w6lJ0', '2021-02-09 08:21:41', '2021-02-09 08:21:41'),
(157, 0, '29', 1, 2, '50.00', NULL, NULL, '2021-02-09', 0, 'WJ5eI9YpqKKy2HBYfIfp19KPzjuv1ZzYIJGroEVu', '2021-02-09 09:45:33', '2021-02-09 09:45:41'),
(158, 0, '2', 1, 1, '56.99', NULL, NULL, '2021-02-09', 0, 'WJ5eI9YpqKKy2HBYfIfp19KPzjuv1ZzYIJGroEVu', '2021-02-09 09:59:11', '2021-02-09 09:59:11'),
(159, 32, '17', 1, 5, '36.78', NULL, NULL, '2021-02-09', 1, 'BJwcg7b9ptca1EGiJ6MbwMz2mZrW53UrN7HGvTo4', '2021-02-09 10:08:03', '2021-02-09 12:00:31'),
(160, 0, '16', 1, 1, '56.99', NULL, NULL, '2021-02-09', 1, 'iSIK3rfQA27qfUDe7SvKPCXukUQk2Pclv57HHIOH', '2021-02-09 12:17:16', '2021-02-09 12:17:48'),
(161, 0, '32', 1, 1, '123.00', NULL, NULL, '2021-02-09', 1, '9X7UDAO7NQ6jPTHwEbG0yxeg8GnMRXEPSl3co0ti', '2021-02-09 12:35:56', '2021-02-09 12:37:23'),
(162, 0, '29', 1, 1, '50.00', NULL, NULL, '2021-02-09', 1, '9X7UDAO7NQ6jPTHwEbG0yxeg8GnMRXEPSl3co0ti', '2021-02-09 12:46:59', '2021-02-09 12:47:26'),
(163, 37, '21', 1, 1, '156.00', NULL, NULL, '2021-02-10', 1, 'x7YMUzzVMjHr9lV12TdMK8wQbY7VHVZZvKbplaJL', '2021-02-10 04:35:14', '2021-02-10 04:36:18'),
(164, 37, '31', 1, 1, '70.00', NULL, NULL, '2021-02-10', 1, 'UCtSArTQpaQyq9vXtpOgMPy7A6jFrQ2b8Mho8MPi', '2021-02-10 09:36:04', '2021-02-10 09:36:39'),
(165, 37, '29', 1, 1, '50.00', NULL, NULL, '2021-02-10', 1, 'UCtSArTQpaQyq9vXtpOgMPy7A6jFrQ2b8Mho8MPi', '2021-02-10 09:36:15', '2021-02-10 09:36:39'),
(166, 0, '9', 1, 1, '400.00', NULL, NULL, '2021-02-10', 0, 'GkAlFzmsWXCTdQdHqwd1SDt7Kq01rZYyz6CbdbpX', '2021-02-10 10:41:34', '2021-02-10 10:41:34'),
(167, 0, '22', 1, 2, '56.99', NULL, NULL, '2021-02-10', 0, 'GkAlFzmsWXCTdQdHqwd1SDt7Kq01rZYyz6CbdbpX', '2021-02-10 10:42:12', '2021-02-10 10:45:22'),
(168, 0, '31', 1, 1, '70.00', NULL, NULL, '2021-02-10', 0, 'GkAlFzmsWXCTdQdHqwd1SDt7Kq01rZYyz6CbdbpX', '2021-02-10 10:45:50', '2021-02-10 10:45:50'),
(169, 0, '29', 1, 2, '50.00', NULL, NULL, '2021-02-10', 0, 'GkAlFzmsWXCTdQdHqwd1SDt7Kq01rZYyz6CbdbpX', '2021-02-10 10:51:26', '2021-02-10 10:51:57'),
(170, 0, '3', 1, 1, '156.00', NULL, NULL, '2021-02-10', 0, 'd38jQkxFzsPtnZs54YRsQpfunCmhI1u3RPCVo8wn', '2021-02-10 11:06:48', '2021-02-10 11:06:48'),
(171, 37, '29', 1, 1, '50.00', NULL, NULL, '2021-02-10', 1, 'UCtSArTQpaQyq9vXtpOgMPy7A6jFrQ2b8Mho8MPi', '2021-02-10 12:43:47', '2021-02-10 12:44:08'),
(172, 23, '18', 1, 1, '56.99', NULL, NULL, '2021-02-10', 1, 'VNEyd2U09FdxkrLquudpYTLB7gRXMDrT9YX0hTdV', '2021-02-10 12:50:51', '2021-02-10 12:51:32'),
(173, 23, '2', 1, 7, '56.99', NULL, NULL, '2021-02-10', 0, 'VNEyd2U09FdxkrLquudpYTLB7gRXMDrT9YX0hTdV', '2021-02-10 12:57:36', '2021-02-10 12:57:38'),
(174, 0, '31', 1, 1, '70.00', NULL, NULL, '2021-02-11', 0, 'nPIq5TGVGGAwBwsECav6lYm0Sf02vxxs4pMtUpNk', '2021-02-11 04:55:37', '2021-02-11 04:55:37'),
(175, 0, '18', 1, 1, '56.99', NULL, NULL, '2021-02-11', 0, 'LNOQyU2Z7ZelJEJKKNR6HvNqpFqgwj8io2Ueix3N', '2021-02-11 05:06:00', '2021-02-11 05:06:00'),
(176, 0, '29', 1, 4, '50.00', NULL, NULL, '2021-02-11', 0, 'LNOQyU2Z7ZelJEJKKNR6HvNqpFqgwj8io2Ueix3N', '2021-02-11 05:13:40', '2021-02-11 05:34:14'),
(177, 0, '31', 1, 1, '70.00', NULL, NULL, '2021-02-11', 0, 'LNOQyU2Z7ZelJEJKKNR6HvNqpFqgwj8io2Ueix3N', '2021-02-11 05:44:00', '2021-02-11 05:44:00'),
(178, 0, '20', 1, 1, '156.00', NULL, NULL, '2021-02-11', 0, 'LNOQyU2Z7ZelJEJKKNR6HvNqpFqgwj8io2Ueix3N', '2021-02-11 05:56:42', '2021-02-11 05:56:42'),
(179, 37, '24', 1, 1, '300.00', NULL, NULL, '2021-02-11', 1, 'yut0cbFZGzTr0YbzUk8Ii72X2HQbDMSirTMdsQmu', '2021-02-11 06:43:31', '2021-02-11 06:45:51'),
(180, 37, '21', 1, 2, '156.00', NULL, NULL, '2021-02-11', 1, 'yut0cbFZGzTr0YbzUk8Ii72X2HQbDMSirTMdsQmu', '2021-02-11 06:53:00', '2021-02-11 06:53:44'),
(181, 37, '32', 1, 1, '123.00', NULL, NULL, '2021-02-11', 1, 'yut0cbFZGzTr0YbzUk8Ii72X2HQbDMSirTMdsQmu', '2021-02-11 09:44:27', '2021-02-11 10:09:14'),
(182, 32, '29', 1, 1, '50.00', NULL, NULL, '2021-02-11', 1, 'ckpZJF31zYjNnDprZbjJBx4xJokWGpNIui7wsy9F', '2021-02-11 10:04:24', '2021-02-11 10:06:21'),
(183, 37, '31', 1, 1, '70.00', NULL, NULL, '2021-02-11', 1, 'yut0cbFZGzTr0YbzUk8Ii72X2HQbDMSirTMdsQmu', '2021-02-11 10:08:41', '2021-02-11 10:09:14'),
(184, 37, '32', 1, 1, '123.00', NULL, NULL, '2021-02-11', 1, 'yut0cbFZGzTr0YbzUk8Ii72X2HQbDMSirTMdsQmu', '2021-02-11 12:00:23', '2021-02-11 12:00:38'),
(185, 37, '32', 1, 1, '123.00', NULL, NULL, '2021-02-11', 1, 'yut0cbFZGzTr0YbzUk8Ii72X2HQbDMSirTMdsQmu', '2021-02-11 12:28:37', '2021-02-11 12:28:55'),
(186, 0, '22', 1, 1, '56.99', NULL, NULL, '2021-02-12', 0, 'KVPHwVlZBocY6hZBE1LH8wx0M9iDpXagk1HAB2eR', '2021-02-12 10:44:31', '2021-02-12 10:44:31'),
(187, 0, '16', 1, 1, '56.99', NULL, NULL, '2021-02-15', 0, 'P3BN4N7ByHmCqXmdJLt1qHQVmmELZS9vskHOP5ro', '2021-02-15 09:48:26', '2021-02-15 09:48:26'),
(191, 0, '21', 1, 1, '156.00', NULL, NULL, '2021-02-20', 0, 'mx3A6TVecaj7dhNIDEF1Wi3XXAzJN52W0PavwbGv', '2021-02-20 06:06:29', '2021-02-20 06:06:29'),
(190, 0, '3', 1, 1, '156.00', NULL, NULL, '2021-02-18', 0, '2H1jk5nFbfRCpKYoGaxii7bMZIQUgW1VFgg4D8HA', '2021-02-18 04:55:53', '2021-02-18 04:55:53'),
(192, 40, '16', 1, 7, '56.99', NULL, NULL, '2021-02-23', 0, 'J49zaxtbzSb7JTYI9CsotUnUQZ7MJwljqlFKk8sJ', '2021-02-23 07:15:34', '2021-02-23 07:15:52'),
(193, 41, '21', 1, 1, '156.00', NULL, NULL, '2021-02-23', 0, 'PxjxwD1hYQa86kBANUut3WJc2xm9OT9wrXGAnSnX', '2021-02-23 07:19:12', '2021-02-23 07:42:17'),
(194, 0, '20', 1, 1, '156.00', NULL, NULL, '2021-02-23', 1, 'IvnngcFm5bjmJ0OCXKUstvwxecLblqWaprLC5TOV', '2021-02-23 08:10:42', '2021-02-23 08:19:19'),
(195, 0, '29', 1, 1, '50.00', NULL, NULL, '2021-02-23', 1, 'IvnngcFm5bjmJ0OCXKUstvwxecLblqWaprLC5TOV', '2021-02-23 08:18:56', '2021-02-23 08:19:19'),
(196, 44, '22', 1, 1, '56.99', NULL, NULL, '2021-02-23', 1, 'sWNhaey9uKo44VjuXbJOCREMDtjVLzP23QzAX4g6', '2021-02-23 08:43:54', '2021-02-23 09:00:21'),
(197, 44, '24', 1, 1, '300.00', NULL, NULL, '2021-02-23', 1, 'sWNhaey9uKo44VjuXbJOCREMDtjVLzP23QzAX4g6', '2021-02-23 08:58:15', '2021-02-23 09:00:21'),
(198, 44, '16', 1, 1, '56.99', NULL, NULL, '2021-02-23', 1, 'QLgQ1c1zpgGWJ1LFVzXtDu7BNdZClY6XrK84W96G', '2021-02-23 08:59:59', '2021-02-23 09:00:21'),
(199, 45, '29', 1, 1, '50.00', NULL, NULL, '2021-02-23', 1, 'iBexbKnGOVjkz02BDg2yo52xc6lx7mkW1gaCWVUq', '2021-02-23 09:06:36', '2021-02-23 09:06:56'),
(200, 46, '29', 1, 1, '50.00', NULL, NULL, '2021-02-23', 1, 'TDOOPD4xyqjzm4CbJ5M20qw0qNubqhIc18IhnYDq', '2021-02-23 09:57:49', '2021-02-23 09:58:40'),
(201, 46, '31', 1, 1, '70.00', NULL, NULL, '2021-02-23', 1, 'TDOOPD4xyqjzm4CbJ5M20qw0qNubqhIc18IhnYDq', '2021-02-23 09:57:51', '2021-02-23 09:58:40'),
(202, 0, '10', 1, 1, '180.00', NULL, NULL, '2021-02-23', 0, 'uYDEjekfhLmPZELIaLdizc6307qU0916HsevUHvI', '2021-02-23 10:08:27', '2021-02-23 10:08:27'),
(203, 0, '1', 1, 1, '36.78', NULL, NULL, '2021-02-23', 0, 'uYDEjekfhLmPZELIaLdizc6307qU0916HsevUHvI', '2021-02-23 10:10:29', '2021-02-23 10:10:29'),
(204, 47, '31', 1, 3, '70.00', NULL, NULL, '2021-02-26', 1, 'O9eXeZeH1gfJvWuxJBqbxztHdAifhD1hQiQIh5IF', '2021-02-25 06:33:27', '2021-02-26 05:30:13'),
(205, 47, '17', 1, 1, '36.78', NULL, NULL, '2021-02-25', 1, 'xctBUGtN9Ivsiy4W2j1CoZRPa2WTjU0AUf3fsZ0o', '2021-02-25 06:53:43', '2021-02-26 05:30:13'),
(206, 0, '2', 1, 1, '56.99', NULL, NULL, '2021-02-25', 0, '0ZimOVWInBDBkSBmGQpzTOFtpCwOQ0XluQyGBWGE', '2021-02-25 09:46:26', '2021-02-25 09:46:26'),
(207, 0, '20', 1, 1, '156.00', NULL, NULL, '2021-02-26', 0, 'nc8LSD50kUEaxWkFxTNf8l9O4WKT2m7tx3FApwv9', '2021-02-26 05:20:48', '2021-02-26 05:20:48'),
(208, 47, '29', 1, 1, '50.00', NULL, NULL, '2021-02-26', 1, 'NhaCrYGNxVk2MRX5o2VcFBntJ63p2oF9ikwwJLMJ', '2021-02-26 05:21:56', '2021-02-26 05:30:13'),
(209, 47, '31', 1, 1, '70.00', NULL, NULL, '2021-02-26', 1, 'uFwDGo5xGnTYOrZJ6RVUkE0t5n4eKIwxxMEchkFY', '2021-02-26 06:24:18', '2021-02-26 06:34:54'),
(210, 0, '17', 1, 2, '36.78', NULL, NULL, '2021-02-26', 0, 'yjAlCtWWMJ6jb6c7mc1n5iqPOuNocq0HVFNfIIVv', '2021-02-26 08:10:32', '2021-02-26 08:10:40'),
(211, 0, '9', 1, 1, '400.00', NULL, NULL, '2021-03-03', 0, 'GO7oZOmyhHVfd2VL0bdNfO94cMuFfM4AKGCRM7bj', '2021-03-03 02:51:17', '2021-03-03 02:51:17'),
(212, 0, '29', 1, 7, '50.00', NULL, NULL, '2021-03-04', 0, '7tKBt5GNlsOsdhYA8PCS4hYTOztbynkCicx2kLwX', '2021-03-04 07:15:41', '2021-03-04 07:15:50'),
(213, 46, '29', 1, 2, '50.00', NULL, NULL, '2021-07-16', 1, 'IA0bq5gWU3SgN2N2dtPxXOGTRTFfL3piGBXX9tx7', '2021-03-09 05:00:39', '2021-07-16 07:21:19'),
(215, 0, '29', 1, 1, '50.00', NULL, NULL, '2021-03-30', 0, 'hBQPbaxFtjaBQV0lYsA2dT49Ng9Urr60O2xdfDDU', '2021-03-30 07:04:48', '2021-03-30 07:04:48'),
(216, 23, '29', 1, 1, '50.00', NULL, NULL, '2021-03-30', 1, 'a1EfsoR8114L00Dhmo2i8ZbnGQAxxqEfQqoBdSCx', '2021-03-30 07:26:29', '2021-03-30 07:27:24'),
(217, 0, '1', 1, 1, '36.78', NULL, NULL, '2021-03-30', 0, 'l2w76k14u5rumJ6JnX7mQLbfrJL41PnCVaxkHBlI', '2021-03-30 07:26:47', '2021-03-30 07:26:47'),
(218, 0, '1', 1, 1, '36.78', NULL, NULL, '2021-04-01', 0, 'HeCo96THsjW0Ulb34qlo4sShB3taSm9Hw4X7qZnl', '2021-04-01 06:14:46', '2021-04-01 06:14:46'),
(219, 0, '31', 1, 3, '70.00', NULL, NULL, '2021-04-01', 0, 'qzhOXp8piShnhL51VWEmA3l5NSzi9TYSenLh2KEo', '2021-04-01 08:26:01', '2021-04-01 09:59:49'),
(220, 0, '29', 1, 1, '50.00', NULL, NULL, '2021-04-28', 0, 'xTXeDbzpaDZowHToD8YK2KPaW2fHLMXg52jknzwX', '2021-04-28 06:53:45', '2021-04-28 06:53:45'),
(221, 0, '1', 1, 1, '36.78', NULL, NULL, '2021-04-28', 0, 'aUEOUAH3MkQbgwZxadVYzmWkpCgvr5caqw0IJ69F', '2021-04-28 07:07:09', '2021-04-28 07:07:09'),
(223, 0, '1', 1, 1, '36.78', NULL, NULL, '2021-05-05', 0, '3SGJkldYihiP3WGB4pWAkS9RPXygCvBHJzVseK5A', '2021-05-05 08:52:23', '2021-05-05 08:52:23'),
(224, 0, '2', 1, 1, '56.99', NULL, NULL, '2021-05-05', 0, '3SGJkldYihiP3WGB4pWAkS9RPXygCvBHJzVseK5A', '2021-05-05 08:52:24', '2021-05-05 08:52:24'),
(225, 0, '21', 1, 2, '156.00', NULL, NULL, '2021-05-05', 0, '3SGJkldYihiP3WGB4pWAkS9RPXygCvBHJzVseK5A', '2021-05-05 08:53:16', '2021-05-05 08:53:17'),
(226, 0, '19', 1, 1, '300.00', NULL, NULL, '2021-05-05', 0, 'mzotUXLrSF49l28IKD6SedEI5J0j1HPuZ9zSAiVY', '2021-05-05 09:14:45', '2021-05-05 09:14:45'),
(227, 0, '13', 1, 1, '56.99', NULL, NULL, '2021-05-08', 0, 'RNA1F27E9qbPG5McCM6ZXEb2LAzVG74vpbVOn81N', '2021-05-08 03:59:12', '2021-05-08 03:59:12'),
(228, 0, '31', 1, 1, '70.00', NULL, NULL, '2021-05-11', 0, 'hA55Cz2Nn3vJYbXjMNgVNcIk4gfwO59Lrq6Py3y9', '2021-05-11 11:57:00', '2021-05-11 11:57:00'),
(229, 0, '6', 1, 2, '156.00', NULL, NULL, '2021-05-11', 0, 'WPlOfoDRsHTcSyfDATG3K12sGvAcrJy930VJcySK', '2021-05-11 12:53:11', '2021-05-11 16:40:34'),
(230, 0, '1', 1, 1, '36.78', NULL, NULL, '2021-05-11', 0, 'WPlOfoDRsHTcSyfDATG3K12sGvAcrJy930VJcySK', '2021-05-11 16:35:15', '2021-05-11 16:35:15'),
(231, 0, '31', 1, 1, '70.00', NULL, NULL, '2021-05-11', 0, 'WPlOfoDRsHTcSyfDATG3K12sGvAcrJy930VJcySK', '2021-05-11 16:36:10', '2021-05-11 16:36:10'),
(232, 0, '29', 1, 3, '50.00', NULL, NULL, '2021-06-04', 0, 'jW6DhpIl3aO24CVcJlIjzztd1vDN8vTNsBQkrtF8', '2021-06-04 07:36:40', '2021-06-04 07:36:43'),
(233, 0, '18', 1, 1, '56.99', NULL, NULL, '2021-06-04', 0, 'jW6DhpIl3aO24CVcJlIjzztd1vDN8vTNsBQkrtF8', '2021-06-04 07:43:25', '2021-06-04 07:43:25'),
(234, 0, '31', 1, 1, '70.00', NULL, NULL, '2021-07-01', 0, 'DK1g7QoLTRMec6mOKkzZ5k22L5yyOkcfegIoRJ1s', '2021-07-01 08:42:30', '2021-07-01 08:42:30'),
(235, 46, '31', 1, 1, '70.00', NULL, NULL, '2021-07-15', 1, 'SIn4yr2lnAIAwQ49Q00v52djspQnxyZkY5XmYliV', '2021-07-15 09:52:46', '2021-07-16 07:21:19'),
(236, 0, '22', 1, 1, '56.99', NULL, NULL, '2021-07-15', 0, '1pjzv3edBWyS5kQK24dMTxYlHv5HBazB1aJfka4K', '2021-07-15 10:10:47', '2021-07-15 10:10:47'),
(237, 0, '24', 1, 1, '300.00', NULL, NULL, '2021-07-16', 0, 'PFPw7GtD476P3beh2XVPehLVb3VQFxFqsdetOT8a', '2021-07-16 08:28:11', '2021-07-16 08:28:52'),
(240, 49, '31', 1, 1, '70.00', NULL, NULL, '2021-07-22', 1, 't2CxIXx9Y29RDXesbILqo1hmBLUYHq0WpsvIJnGr', '2021-07-22 07:13:23', '2021-07-22 11:46:30'),
(241, 49, '9', 1, 1, '400.00', NULL, NULL, '2021-07-22', 1, 't2CxIXx9Y29RDXesbILqo1hmBLUYHq0WpsvIJnGr', '2021-07-22 07:13:44', '2021-07-22 11:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `customers_basket_attributes`
--

CREATE TABLE `customers_basket_attributes` (
  `customers_basket_attributes_id` int(11) NOT NULL,
  `customers_basket_id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `products_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_options_id` int(11) NOT NULL,
  `products_options_values_id` int(11) NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers_info`
--

CREATE TABLE `customers_info` (
  `customers_info_id` int(11) NOT NULL,
  `customers_info_date_of_last_logon` datetime DEFAULT NULL,
  `customers_info_number_of_logons` int(11) DEFAULT NULL,
  `customers_info_date_account_created` datetime DEFAULT NULL,
  `customers_info_date_account_last_modified` datetime DEFAULT NULL,
  `global_product_notifications` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers_info`
--

INSERT INTO `customers_info` (`customers_info_id`, `customers_info_date_of_last_logon`, `customers_info_number_of_logons`, `customers_info_date_account_created`, `customers_info_date_account_last_modified`, `global_product_notifications`) VALUES
(1, '2020-11-06 11:46:34', 1, '2020-11-06 11:46:34', NULL, 1),
(2, '2020-11-06 11:47:34', 1, '2020-11-06 11:47:34', NULL, 1),
(28, '2020-11-06 11:54:02', 2, '2020-11-06 11:53:20', NULL, 1),
(4, '2020-11-06 12:03:44', 1, '2020-11-06 12:03:44', '2020-11-07 10:29:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders_returns`
--

CREATE TABLE `customer_orders_returns` (
  `id` int(11) NOT NULL,
  `order_product_id` int(11) NOT NULL,
  `reason` int(11) NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_orders_returns`
--

INSERT INTO `customer_orders_returns` (`id`, `order_product_id`, `reason`, `comments`, `status`, `created_at`, `updated_at`) VALUES
(1, 27, 3, 'TERSTT', 0, '2021-02-10 16:08:34', '2021-02-11 10:34:26'),
(2, 28, 2, 'Test', 0, '2021-02-10 16:17:33', '2021-02-11 10:30:24'),
(3, 29, 1, 'TEST 56', 0, '2021-02-10 17:45:08', '2021-02-11 10:36:28'),
(4, 26, 3, NULL, 0, '2021-02-11 11:23:19', '2021-02-11 07:08:17'),
(5, 31, 1, 'I ordered wrong product. Please cancel this item.', 0, '2021-02-11 11:47:13', '2021-02-11 11:47:26'),
(6, 32, 1, NULL, 0, '2021-02-11 12:01:38', '2021-02-11 07:06:29'),
(7, 33, 1, NULL, 0, '2021-02-11 15:06:52', '2021-02-11 17:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `device_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `device_type` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `ram` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processor` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_os` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latittude` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operating_system` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `browser_info` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_notify` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` mediumtext DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `name`, `email`, `phone`, `address`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'nitin', 'teamwavechd@gmail.com', '321654987', 'wave', 'donation of books', 'hello i would like to donate some books', 1, '2020-11-06 05:03:52', '2020-11-06 06:33:42'),
(2, 'rahul', 'rahul@gmail.com', '654987321', 'wave', 'no subject', 'i have very nice books. i want to donate them.', 0, '2020-11-06 05:51:26', '2020-11-06 06:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) NOT NULL,
  `title` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(3, 'What Shipping Methods Are Available?', 'Ex Portland Pitchfork irure mustache. Eutra fap before they sold out literally. Aliquip ugh bicycle rights actually mlkshk, seitan squid craft beer tempor.', '2020-10-20 09:57:33', '2020-10-20 09:58:30'),
(4, 'Do You Ship Internationally?', 'Hoodie tote bag mixtape tofu. Typewriter jean shorts wolf quinoa, messenger bag organic freegan cray.', '2020-10-20 09:57:57', '2020-10-20 09:57:57'),
(5, 'How Long Will It Take To Get My Package?', 'Swag slow-carb quinoa VHS typewriter pork belly brunch, paleo single-origin coffee Wes Anderson. Flexitarian Pitchfork forage, literally paleo fap pour-over. Wes Anderson Pinterest YOLO fanny pack meggings, deep v XOXO chambray sustainable slow-carb raw denim church-key fap chillwave Etsy. +1 typewriter kitsch, American Apparel tofu Banksy Vice.', '2020-10-20 09:58:13', '2020-10-20 09:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `fedex_shipping`
--

CREATE TABLE `fedex_shipping` (
  `fedex_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parcel_height` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parcel_width` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_2` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_package` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flash_sale`
--

CREATE TABLE `flash_sale` (
  `flash_sale_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `flash_sale_products_price` decimal(15,2) NOT NULL,
  `flash_sale_date_added` int(11) NOT NULL,
  `flash_sale_last_modified` int(11) NOT NULL,
  `flash_start_date` int(11) NOT NULL,
  `flash_expires_date` int(11) NOT NULL,
  `flash_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flate_rate`
--

CREATE TABLE `flate_rate` (
  `id` int(11) NOT NULL,
  `flate_rate` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flate_rate`
--

INSERT INTO `flate_rate` (`id`, `flate_rate`, `currency`) VALUES
(1, '11', 'INR');

-- --------------------------------------------------------

--
-- Table structure for table `front_end_theme_content`
--

CREATE TABLE `front_end_theme_content` (
  `id` int(11) NOT NULL,
  `headers` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `carousels` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banners` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `footers` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_section_order` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `news` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `front_end_theme_content`
--

INSERT INTO `front_end_theme_content` (`id`, `headers`, `carousels`, `banners`, `footers`, `product_section_order`, `cart`, `news`, `detail`, `shop`, `contact`) VALUES
(1, '[\n{\n\"id\": 1,\n\"name\": \"Header One\",\n\"image\": \"images/prototypes/header1.jpg\",\n\"alt\" : \"header One\" \n},\n{\n\"id\": 2,\n\"name\": \"Header Two\",\n\"image\": \"images/prototypes/header2.jpg\",\n\"alt\" : \"header Two\" \n},\n{\n\"id\": 3,\n\"name\": \"Header Three\",\n\"image\": \"images/prototypes/header3.jpg\",\n\"alt\" : \"header Three\" \n},\n{\n\"id\": 4,\n\"name\": \"Header Four\",\n\"image\": \"images/prototypes/header4.jpg\",\n\"alt\" : \"header Four\" \n},\n{\n\"id\": 5,\n\"name\": \"Header Five\",\n\"image\": \"images/prototypes/header5.jpg\",\n\"alt\" : \"header Five\" \n},\n{\n\"id\": 6,\n\"name\": \"Header Six\",\n\"image\": \"images/prototypes/header6.jpg\",\n\"alt\" : \"header Six\" \n},\n{\n\"id\": 7,\n\"name\": \"Header Seven\",\n\"image\": \"images/prototypes/header7.jpg\",\n\"alt\" : \"header Seven\" \n},\n{\n\"id\": 8,\n\"name\": \"Header Eight\",\n\"image\": \"images/prototypes/header8.jpg\",\n\"alt\" : \"header Eight\" \n},\n{\n\"id\": 9,\n\"name\": \"Header Nine\",\n\"image\": \"images/prototypes/header9.jpg\",\n\"alt\" : \"header Nine\" \n},\n{\n\"id\": 10,\n\"name\": \"Header Ten\",\n\"image\": \"images/prototypes/header10.jpg\",\n\"alt\" : \"header Ten\" \n}\n]', '[\n{\n\"id\": 1,\n\"name\": \"Bootstrap Carousel Content Full Screen\",\n\"image\": \"images/prototypes/carousal1.jpg\",\n\"alt\": \"Bootstrap Carousel Content Full Screen\"\n},\n{\n\"id\": 2,\n\"name\": \"Bootstrap Carousel Content Full Width\",\n\"image\": \"images/prototypes/carousal2.jpg\",\n\"alt\": \"Bootstrap Carousel Content Full Width\"\n},\n{\n\"id\": 3,\n\"name\": \"Bootstrap Carousel Content with Left Banner\",\n\"image\": \"images/prototypes/carousal3.jpg\",\n\"alt\": \"Bootstrap Carousel Content with Left Banner\"\n},\n{\n\"id\": 4,\n\"name\": \"Bootstrap Carousel Content with Navigation\",\n\"image\": \"images/prototypes/carousal4.jpg\",\n\"alt\": \"Bootstrap Carousel Content with Navigation\"\n},\n{\n\"id\": 5,\n\"name\": \"Bootstrap Carousel Content with Right Banner\",\n\"image\": \"images/prototypes/carousal5.jpg\",\n\"alt\": \"Bootstrap Carousel Content with Right Banner\"\n}\n]', '[\n{\n\"id\": 1,\n\"name\": \"Banner One\",\n\"image\": \"images/prototypes/banner1.jpg\",\n\"alt\": \"Banner One\"\n},\n{\n\"id\": 2,\n\"name\": \"Banner Two\",\n\"image\": \"images/prototypes/banner2.jpg\",\n\"alt\": \"Banner Two\"\n},\n{\n\"id\": 3,\n\"name\": \"Banner Three\",\n\"image\": \"images/prototypes/banner3.jpg\",\n\"alt\": \"Banner Three\"\n},\n{\n\"id\": 4,\n\"name\": \"Banner Four\",\n\"image\": \"images/prototypes/banner4.jpg\",\n\"alt\": \"Banner Four\"\n},\n{\n\"id\": 5,\n\"name\": \"Banner Five\",\n\"image\": \"images/prototypes/banner5.jpg\",\n\"alt\": \"Banner Five\"\n},\n{\n\"id\": 6,\n\"name\": \"Banner Six\",\n\"image\": \"images/prototypes/banner6.jpg\",\n\"alt\": \"Banner Six\"\n},\n{\n\"id\": 7,\n\"name\": \"Banner Seven\",\n\"image\": \"images/prototypes/banner7.jpg\",\n\"alt\": \"Banner Seven\"\n},\n{\n\"id\": 8,\n\"name\": \"Banner Eight\",\n\"image\": \"images/prototypes/banner8.jpg\",\n\"alt\": \"Banner Eight\"\n},\n{\n\"id\": 9,\n\"name\": \"Banner Nine\",\n\"image\": \"images/prototypes/banner9.jpg\",\n\"alt\": \"Banner Nine\"\n},\n{\n\"id\": 10,\n\"name\": \"Banner Ten\",\n\"image\": \"images/prototypes/banner10.jpg\",\n\"alt\": \"Banner Ten\"\n},\n{\n\"id\": 11,\n\"name\": \"Banner Eleven\",\n\"image\": \"images/prototypes/banner11.jpg\",\n\"alt\": \"Banner Eleven\"\n},\n{\n\"id\": 12,\n\"name\": \"Banner Twelve\",\n\"image\": \"images/prototypes/banner12.jpg\",\n\"alt\": \"Banner Twelve\"\n},\n{\n\"id\": 13,\n\"name\": \"Banner Thirteen\",\n\"image\": \"images/prototypes/banner13.jpg\",\n\"alt\": \"Banner Thirteen\"\n},\n{\n\"id\": 14,\n\"name\": \"Banner Fourteen\",\n\"image\": \"images/prototypes/banner14.jpg\",\n\"alt\": \"Banner Fourteen\"\n},\n{\n\"id\": 15,\n\"name\": \"Banner Fifteen\",\n\"image\": \"images/prototypes/banner15.jpg\",\n\"alt\": \"Banner Fifteen\"\n},\n{\n\"id\": 16,\n\"name\": \"Banner Sixteen\",\n\"image\": \"images/prototypes/banner16.jpg\",\n\"alt\": \"Banner Sixteen\"\n},\n{\n\"id\": 17,\n\"name\": \"Banner Seventeen\",\n\"image\": \"images/prototypes/banner17.jpg\",\n\"alt\": \"Banner Seventeen\"\n},\n{\n\"id\": 18,\n\"name\": \"Banner Eighteen\",\n\"image\": \"images/prototypes/banner18.jpg\",\n\"alt\": \"Banner Eighteen\"\n},\n{\n\"id\": 19,\n\"name\": \"Banner Nineteen\",\n\"image\": \"images/prototypes/banner19.jpg\",\n\"alt\": \"Banner Nineteen\"\n}\n]', '[\n{\n\"id\": 1,\n\"name\": \"Footer One\",\n\"image\": \"images/prototypes/footer1.png\",\n\"alt\" : \"Footer One\"\n},\n{\n\"id\": 2,\n\"name\": \"Footer Two\",\n\"image\": \"images/prototypes/footer2.png\",\n\"alt\" : \"Footer Two\"\n},\n{\n\"id\": 3,\n\"name\": \"Footer Three\",\n\"image\": \"images/prototypes/footer3.png\",\n\"alt\" : \"Footer Three\"\n},\n{\n\"id\": 4,\n\"name\": \"Footer Four\",\n\"image\": \"images/prototypes/footer4.png\",\n\"alt\" : \"Footer Four\"\n},\n{\n\"id\": 5,\n\"name\": \"Footer Five\",\n\"image\": \"images/prototypes/footer5.png\",\n\"alt\" : \"Footer Five\"\n},\n{\n\"id\": 6,\n\"name\": \"Footer Six\",\n\"image\": \"images/prototypes/footer6.png\",\n\"alt\" : \"Footer Six\"\n},\n{\n\"id\": 7,\n\"name\": \"Footer Seven\",\n\"image\": \"images/prototypes/footer7.png\",\n\"alt\" : \"Footer Seven\"\n},\n{\n\"id\": 8,\n\"name\": \"Footer Eight\",\n\"image\": \"images/prototypes/footer8.png\",\n\"alt\" : \"Footer Eight\"\n},\n{\n\"id\": 9,\n\"name\": \"Footer Nine\",\n\"image\": \"images/prototypes/footer9.png\",\n\"alt\" : \"Footer Nine\"\n},\n{\n\"id\": 10,\n\"name\": \"Footer Ten\",\n\"image\": \"images/prototypes/footer10.png\",\n\"alt\" : \"Footer Ten\"\n}\n]', '[{\"id\":10,\"name\":\"Second Ad Section\",\"order\":1,\"file_name\":\"sec_ad_banner\",\"status\":1,\"image\":\"images\\/prototypes\\/sec_ad_section.jpg\",\"disabled_image\":\"images\\/prototypes\\/sec_ad_section-cross.jpg\",\"alt\":\"Second Ad Section\"},{\"id\":5,\"name\":\"Categories\",\"order\":2,\"file_name\":\"categories\",\"status\":1,\"image\":\"images\\/prototypes\\/categories.jpg\",\"disabled_image\":\"images\\/prototypes\\/categories-cross.jpg\",\"alt\":\"Categories\"},{\"id\":1,\"name\":\"Banner Section\",\"order\":3,\"file_name\":\"banner_section\",\"status\":1,\"image\":\"images\\/prototypes\\/banner_section.jpg\",\"alt\":\"Banner Section\"},{\"id\":9,\"name\":\"Top Selling\",\"order\":4,\"file_name\":\"top\",\"status\":1,\"image\":\"images\\/prototypes\\/top.jpg\",\"disabled_image\":\"images\\/prototypes\\/top-cross.jpg\",\"alt\":\"Top Selling\"},{\"id\":8,\"name\":\"Newest Product Section\",\"order\":5,\"file_name\":\"newest_product\",\"status\":1,\"image\":\"images\\/prototypes\\/newest_product.jpg\",\"disabled_image\":\"images\\/prototypes\\/newest_product-cross.jpg\",\"alt\":\"Newest Product Section\"},{\"id\":11,\"name\":\"Tab Products View\",\"order\":6,\"file_name\":\"tab\",\"status\":1,\"image\":\"images\\/prototypes\\/tab.jpg\",\"disabled_image\":\"images\\/prototypes\\/tab-cross.jpg\",\"alt\":\"Tab Products View\"},{\"id\":3,\"name\":\"Special Products Section\",\"order\":7,\"file_name\":\"special\",\"status\":1,\"image\":\"images\\/prototypes\\/special_product.jpg\",\"disabled_image\":\"images\\/prototypes\\/special_product-cross.jpg\",\"alt\":\"Special Products Section\"},{\"id\":2,\"name\":\"Flash Sale Section\",\"order\":8,\"file_name\":\"flash_sale_section\",\"status\":1,\"image\":\"images\\/prototypes\\/flash_sale_section.jpg\",\"disabled_image\":\"images\\/prototypes\\/flash_sale_section-cross.jpg\",\"alt\":\"Flash Sale Section\"},{\"id\":4,\"name\":\"Ad Section\",\"order\":9,\"file_name\":\"ad_banner_section\",\"status\":1,\"image\":\"images\\/prototypes\\/ad_banner_section.jpg\",\"disabled_image\":\"images\\/prototypes\\/ad_banner_section-cross.jpg\",\"alt\":\"Ad Section\"},{\"id\":6,\"name\":\"Blog Section\",\"order\":10,\"file_name\":\"blog_section\",\"status\":1,\"image\":\"images\\/prototypes\\/blog_section.jpg\",\"disabled_image\":\"images\\/prototypes\\/blog_section-cross.jpg\",\"alt\":\"Blog Section\"},{\"id\":7,\"name\":\"Info Boxes\",\"order\":11,\"file_name\":\"info_boxes\",\"status\":1,\"image\":\"images\\/prototypes\\/info_boxes.jpg\",\"disabled_image\":\"images\\/prototypes\\/info_boxes-cross.jpg\",\"alt\":\"Info Boxes\"}]', '[      {         \"id\":1,       \"name\":\"Cart One\"    },    {         \"id\":2,       \"name\":\"Cart Two\"    }     ]', '[      {         \"id\":1,       \"name\":\"Blog One\"    },    {         \"id\":2,       \"name\":\"Blog Two\"    }     ]', '[  \n{  \n\"id\":1,\n\"name\":\"Product Detail Page One\"\n},\n{  \n\"id\":2,\n\"name\":\"Product Detail Page Two\"\n},\n{  \n\"id\":3,\n\"name\":\"Product Detail Page Three\"\n},\n{  \n\"id\":4,\n\"name\":\"Product Detail Page Four\"\n},\n{  \n\"id\":5,\n\"name\":\"Product Detail Page Five\"\n},\n{  \n\"id\":6,\n\"name\":\"Product Detail Page Six\"\n}\n\n]', '[      {         \"id\":1,       \"name\":\"Shop Page One\"    },    {         \"id\":2,       \"name\":\"Shop Page Two\"    },    {         \"id\":3,       \"name\":\"Shop Page Two\"    },    {         \"id\":4,       \"name\":\"Shop Page Two\"    },    {         \"id\":5,       \"name\":\"Shop Page Two\"    }     ]', '[      {         \"id\":1,       \"name\":\"Contact Page One\"    },    {         \"id\":2,       \"name\":\"Contact Page Two\"    } ]');

-- --------------------------------------------------------

--
-- Table structure for table `geo_zones`
--

CREATE TABLE `geo_zones` (
  `geo_zone_id` int(11) NOT NULL,
  `geo_zone_name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geo_zone_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_page`
--

CREATE TABLE `home_page` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `comic_img` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_page`
--

INSERT INTO `home_page` (`id`, `title`, `description`, `comic_img`) VALUES
(1, 'Comic Book or Graphic Novel', 'The stories in comic books and graphic novels are presented to the reader through engaging, sequential narrative art (illustrations and typography) that\'s either presented in a specific design or the traditional panel layout you find in comics. With both, you\'ll often find the dialogue presented in the tell-tale \"word balloons\" next to the respective characters.\r\n\r\nMeant to cause discomfort and fear for both the character and readers, horror writers often make use of supernatural and paranormal elements in morbid stories that are sometimes a little too realistic. The master of horror fiction? None other than Stephen King.', '152');

-- --------------------------------------------------------

--
-- Table structure for table `http_call_record`
--

CREATE TABLE `http_call_record` (
  `id` int(11) NOT NULL,
  `device_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ping_time` datetime DEFAULT NULL,
  `difference_from_previous` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hula_our_infos`
--

CREATE TABLE `hula_our_infos` (
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 'XUF1110211.png', 1, NULL, NULL, NULL),
(4, '0S9Uj10711.png', 1, NULL, NULL, NULL),
(5, '49YbL10411.png', 1, NULL, NULL, NULL),
(156, 'bVcOg02504.jpg', 1, NULL, NULL, NULL),
(155, '4A7uJ02304.jpg', 1, NULL, NULL, NULL),
(154, 'gWJz530709.jpg', 1, NULL, NULL, NULL),
(153, 'nhbfJ30709.jpg', 1, NULL, NULL, NULL),
(152, 'X268330406.png', 1, NULL, NULL, NULL),
(151, 's1jNr29612.jpg', 1, NULL, NULL, NULL),
(150, 'WrWnm29312.jpg', 1, NULL, NULL, NULL),
(148, 'kytGq21507.jpg', 1, NULL, NULL, NULL),
(147, 'Is6Gk21107.jpg', 1, NULL, NULL, NULL),
(146, '1uqJX21506.jpg', 1, NULL, NULL, NULL),
(145, '4AOZr19711.png', 1, NULL, NULL, NULL),
(144, 'a3RKK19706.png', 1, NULL, NULL, NULL),
(143, 'OYgMe19506.png', 1, NULL, NULL, NULL),
(142, 'rBuhc19406.jpg', 1, NULL, NULL, NULL),
(141, 'cb83x19606.jpg', 1, NULL, NULL, NULL),
(138, 'uFuHV19906.png', 1, NULL, NULL, NULL),
(137, 'Pj2Ye19306.png', 1, NULL, NULL, NULL),
(136, '9yM2r19406.png', 1, NULL, NULL, NULL),
(135, 'vghYV19706.png', 1, NULL, NULL, NULL),
(134, 'rSWCc19706.png', 1, NULL, NULL, NULL),
(140, 'IEH2219706.png', 1, NULL, NULL, NULL),
(130, 'ZLqsi19305.png', 1, NULL, NULL, NULL),
(129, 'NhSBS19905.png', 1, NULL, NULL, NULL),
(128, 'DGOhG19905.png', 1, NULL, NULL, NULL),
(132, 'j8wIC19406.png', 1, NULL, NULL, NULL),
(139, 'BdrVG19306.png', 1, NULL, NULL, NULL),
(125, '4I8as19205.png', 1, NULL, NULL, NULL),
(124, '3AJAe19305.png', 1, NULL, NULL, NULL),
(123, 'fvSZw19205.png', 1, NULL, NULL, NULL),
(206, '3jZs711903.jpg', 1, NULL, NULL, NULL),
(122, 'C5P3o19405.png', 1, NULL, NULL, NULL),
(120, 'WrqUR17712.png', 1, NULL, NULL, NULL),
(121, 'Eot2Q17112.png', 1, NULL, NULL, NULL),
(157, 'ckEXf02104.jpg', 1, NULL, NULL, NULL),
(158, 'dNNIx02904.jpg', 1, NULL, NULL, NULL),
(159, 'i9gp502804.jpg', 1, NULL, NULL, NULL),
(160, '12a2h02904.jpg', 1, NULL, NULL, NULL),
(161, 'sO7B102304.jpg', 1, NULL, NULL, NULL),
(162, 'XG75s02404.jpg', 1, NULL, NULL, NULL),
(163, 'IazQp02604.jpg', 1, NULL, NULL, NULL),
(164, '24cL102304.jpg', 1, NULL, NULL, NULL),
(165, 'kFUFC02204.jpg', 1, NULL, NULL, NULL),
(166, 'yJnTH02204.jpg', 1, NULL, NULL, NULL),
(167, 'bo2fT02304.jpg', 1, NULL, NULL, NULL),
(168, '9BvuP02904.jpg', 1, NULL, NULL, NULL),
(169, 'SooyI02304.jpg', 1, NULL, NULL, NULL),
(170, 'xPH4S02804.jpg', 1, NULL, NULL, NULL),
(171, 'ZY6DV02904.jpg', 1, NULL, NULL, NULL),
(172, 'DX73X02404.jpg', 1, NULL, NULL, NULL),
(173, '99Lrj02504.jpg', 1, NULL, NULL, NULL),
(174, 'tHFO102804.jpg', 1, NULL, NULL, NULL),
(175, 'g9ajd02804.jpg', 1, NULL, NULL, NULL),
(176, 'ebNX902807.png', 1, NULL, NULL, NULL),
(177, 'eg40402207.png', 1, NULL, NULL, NULL),
(178, 'QqnBn02807.png', 1, NULL, NULL, NULL),
(179, '89Ylk02607.png', 1, NULL, NULL, NULL),
(180, 'GzzSM02407.png', 1, NULL, NULL, NULL),
(181, 'bnz7402507.png', 1, NULL, NULL, NULL),
(182, 'NFH2x02107.png', 1, NULL, NULL, NULL),
(183, 'kYTPf02908.png', 1, NULL, NULL, NULL),
(184, 'Q692X02408.png', 1, NULL, NULL, NULL),
(195, 'L5wKK06107.jpeg', 1, NULL, NULL, NULL),
(186, '9mHuE02109.png', 1, NULL, NULL, NULL),
(187, 'SzQbG02309.png', 1, NULL, NULL, NULL),
(188, 'EZPQp02109.png', 1, NULL, NULL, NULL),
(189, 'JPhGn04704.jpg', 1, NULL, NULL, NULL),
(190, 'XMEoo04504.jpg', 1, NULL, NULL, NULL),
(207, 'EW23911303.png', 1, NULL, NULL, NULL),
(192, 'YOD2l04104.jpg', 1, NULL, NULL, NULL),
(193, '898UI04705.jpg', 1, NULL, NULL, NULL),
(194, 'peFzr05505.png', 1, NULL, NULL, NULL),
(196, 'U2jHS06907.jpg', 1, NULL, NULL, NULL),
(197, 'uAgpo06107.jpg', 1, NULL, NULL, NULL),
(210, 'qWVvg11904.jpg', 1, NULL, NULL, NULL),
(204, '4eAel11902.png', 1, NULL, NULL, NULL),
(202, '3CQpW11202.png', 1, NULL, NULL, NULL),
(209, 'bXoL011104.jpg', 1, NULL, NULL, NULL),
(211, 'zwuat11605.jpg', 1, NULL, NULL, NULL),
(212, 'kcI0M09607.png', 1, NULL, NULL, NULL),
(213, 'eOmoL09907.png', 1, NULL, NULL, NULL),
(214, 'gfkVK09408.jpg', 1, NULL, NULL, NULL),
(215, 'PzkUk09209.jpg', 1, NULL, NULL, NULL),
(216, 'g6dwr09609.jpg', 1, NULL, NULL, NULL),
(217, 'nhTRm09509.jpg', 1, NULL, NULL, NULL),
(218, 'f9QqK09709.jpg', 1, NULL, NULL, NULL),
(219, '58K0R09909.jpg', 1, NULL, NULL, NULL),
(265, 'srruI12511.jpg', 1, NULL, NULL, NULL),
(264, 'pcupp12511.jpg', 1, NULL, NULL, NULL),
(222, 'KFj7610405.jpg', 1, NULL, NULL, NULL),
(223, 'FNkOF10605.jpg', 1, NULL, NULL, NULL),
(224, 'LMjUD10605.jpg', 1, NULL, NULL, NULL),
(250, '0Cqbd12711.png', 1, NULL, NULL, NULL),
(226, 'ymjnv10305.jpg', 1, NULL, NULL, NULL),
(263, 'hwkUS12211.jpg', 1, NULL, NULL, NULL),
(262, 'nQIx212811.jpg', 1, NULL, NULL, NULL),
(257, 'nP4z312611.jpg', 1, NULL, NULL, NULL),
(258, 'le6tq12811.jpg', 1, NULL, NULL, NULL),
(259, 'NTA3I12911.jpg', 1, NULL, NULL, NULL),
(253, 'oFDRq12911.png', 1, NULL, NULL, NULL),
(254, 'TnTaG12311.png', 1, NULL, NULL, NULL),
(236, 'j4D9j10705.jpg', 1, NULL, NULL, NULL),
(252, '7jvfT12511.png', 1, NULL, NULL, NULL),
(255, 'LYESx12911.png', 1, NULL, NULL, NULL),
(240, 'nMTeE10605.jpg', 1, NULL, NULL, NULL),
(241, 'naTui10305.jpg', 1, NULL, NULL, NULL),
(256, 'PfPvp12911.png', 1, NULL, NULL, NULL),
(243, 'xaUXS10605.jpg', 1, NULL, NULL, NULL),
(261, 'YRHYA12111.jpg', 1, NULL, NULL, NULL),
(260, 'iHZdc12311.jpg', 1, NULL, NULL, NULL),
(251, 'EIS8X12211.png', 1, NULL, NULL, NULL),
(247, 'CMbGF10705.jpg', 1, NULL, NULL, NULL),
(248, 'LHDIj10506.jpg', 1, NULL, NULL, NULL),
(249, 'rfkLi10906.png', 1, NULL, NULL, NULL),
(266, 'ePYgf12211.jpg', 1, NULL, NULL, NULL),
(267, 'efhIc12312.jpg', 1, NULL, NULL, NULL),
(268, 'dbvBF12112.jpg', 1, NULL, NULL, NULL),
(269, 'XAxRw12612.jpg', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image_categories`
--

CREATE TABLE `image_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_id` int(10) UNSIGNED NOT NULL,
  `image_type` enum('ACTUAL','THUMBNAIL','LARGE','MEDIUM') COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_categories`
--

INSERT INTO `image_categories` (`id`, `image_id`, `image_type`, `height`, `width`, `path`, `created_at`, `updated_at`) VALUES
(256, 163, 'ACTUAL', 284, 184, 'images/media/2020/11/IazQp02604.jpg', NULL, NULL),
(255, 162, 'THUMBNAIL', 150, 91, 'images/media/2020/11/thumbnail1604292133XG75s02404.jpg', NULL, NULL),
(254, 162, 'ACTUAL', 302, 184, 'images/media/2020/11/XG75s02404.jpg', NULL, NULL),
(253, 161, 'THUMBNAIL', 150, 100, 'images/media/2020/11/thumbnail1604292117sO7B102304.jpg', NULL, NULL),
(252, 161, 'ACTUAL', 276, 184, 'images/media/2020/11/sO7B102304.jpg', NULL, NULL),
(251, 160, 'THUMBNAIL', 150, 97, 'images/media/2020/11/thumbnail160429210912a2h02904.jpg', NULL, NULL),
(250, 160, 'ACTUAL', 286, 184, 'images/media/2020/11/12a2h02904.jpg', NULL, NULL),
(249, 159, 'MEDIUM', 400, 269, 'images/media/2020/11/medium1604292103i9gp502804.jpg', NULL, NULL),
(248, 159, 'THUMBNAIL', 150, 101, 'images/media/2020/11/thumbnail1604292103i9gp502804.jpg', NULL, NULL),
(247, 159, 'ACTUAL', 499, 335, 'images/media/2020/11/i9gp502804.jpg', NULL, NULL),
(246, 158, 'THUMBNAIL', 150, 100, 'images/media/2020/11/thumbnail1604292093dNNIx02904.jpg', NULL, NULL),
(245, 158, 'ACTUAL', 276, 184, 'images/media/2020/11/dNNIx02904.jpg', NULL, NULL),
(244, 157, 'THUMBNAIL', 150, 98, 'images/media/2020/11/thumbnail1604292086ckEXf02104.jpg', NULL, NULL),
(243, 157, 'ACTUAL', 282, 184, 'images/media/2020/11/ckEXf02104.jpg', NULL, NULL),
(242, 156, 'THUMBNAIL', 150, 100, 'images/media/2020/11/thumbnail1604292075bVcOg02504.jpg', NULL, NULL),
(241, 156, 'ACTUAL', 276, 184, 'images/media/2020/11/bVcOg02504.jpg', NULL, NULL),
(240, 155, 'MEDIUM', 400, 224, 'images/media/2020/11/medium16042920684A7uJ02304.jpg', NULL, NULL),
(239, 155, 'THUMBNAIL', 150, 84, 'images/media/2020/11/thumbnail16042920684A7uJ02304.jpg', NULL, NULL),
(238, 155, 'ACTUAL', 498, 279, 'images/media/2020/11/4A7uJ02304.jpg', NULL, NULL),
(237, 154, 'LARGE', 300, 900, 'images/media/2020/10/large1604050350gWJz530709.jpg', NULL, NULL),
(236, 154, 'MEDIUM', 133, 400, 'images/media/2020/10/medium1604050350gWJz530709.jpg', NULL, NULL),
(235, 154, 'THUMBNAIL', 50, 150, 'images/media/2020/10/thumbnail1604050350gWJz530709.jpg', NULL, NULL),
(234, 154, 'ACTUAL', 640, 1920, 'images/media/2020/10/gWJz530709.jpg', NULL, NULL),
(233, 153, 'THUMBNAIL', 150, 150, 'images/media/2020/10/thumbnail1604049674nhbfJ30709.jpg', NULL, NULL),
(232, 153, 'ACTUAL', 270, 270, 'images/media/2020/10/nhbfJ30709.jpg', NULL, NULL),
(231, 152, 'THUMBNAIL', 150, 150, 'images/media/2020/10/thumbnail1604039921X268330406.png', NULL, NULL),
(230, 152, 'ACTUAL', 400, 400, 'images/media/2020/10/X268330406.png', NULL, NULL),
(229, 151, 'THUMBNAIL', 74, 150, 'images/media/2020/10/thumbnail1603972973s1jNr29612.jpg', NULL, NULL),
(228, 151, 'ACTUAL', 193, 390, 'images/media/2020/10/s1jNr29612.jpg', NULL, NULL),
(227, 150, 'THUMBNAIL', 74, 150, 'images/media/2020/10/thumbnail1603972964WrWnm29312.jpg', NULL, NULL),
(226, 150, 'ACTUAL', 193, 390, 'images/media/2020/10/WrWnm29312.jpg', NULL, NULL),
(310, 195, 'THUMBNAIL', 150, 150, 'images/media/2020/11/thumbnail1604646515L5wKK06107.jpeg', NULL, NULL),
(224, 147, 'LARGE', 311, 900, 'images/media/2020/10/large1603263630Is6Gk21107.jpg', NULL, NULL),
(223, 148, 'LARGE', 311, 900, 'images/media/2020/10/large1603263630kytGq21507.jpg', NULL, NULL),
(222, 148, 'MEDIUM', 138, 400, 'images/media/2020/10/medium1603263630kytGq21507.jpg', NULL, NULL),
(221, 147, 'MEDIUM', 138, 400, 'images/media/2020/10/medium1603263630Is6Gk21107.jpg', NULL, NULL),
(220, 147, 'THUMBNAIL', 52, 150, 'images/media/2020/10/thumbnail1603263630Is6Gk21107.jpg', NULL, NULL),
(219, 148, 'THUMBNAIL', 52, 150, 'images/media/2020/10/thumbnail1603263630kytGq21507.jpg', NULL, NULL),
(218, 148, 'ACTUAL', 425, 1230, 'images/media/2020/10/kytGq21507.jpg', NULL, NULL),
(217, 147, 'ACTUAL', 425, 1230, 'images/media/2020/10/Is6Gk21107.jpg', NULL, NULL),
(216, 146, 'LARGE', 314, 900, 'images/media/2020/10/large16032635641uqJX21506.jpg', NULL, NULL),
(215, 146, 'MEDIUM', 139, 400, 'images/media/2020/10/medium16032635641uqJX21506.jpg', NULL, NULL),
(214, 146, 'THUMBNAIL', 52, 150, 'images/media/2020/10/thumbnail16032635641uqJX21506.jpg', NULL, NULL),
(213, 146, 'ACTUAL', 371, 1064, 'images/media/2020/10/1uqJX21506.jpg', NULL, NULL),
(212, 145, 'THUMBNAIL', 150, 150, 'images/media/2020/10/thumbnail16031082274AOZr19711.png', NULL, NULL),
(211, 145, 'ACTUAL', 400, 400, 'images/media/2020/10/4AOZr19711.png', NULL, NULL),
(210, 144, 'MEDIUM', 400, 400, 'images/media/2020/10/medium1603090266a3RKK19706.png', NULL, NULL),
(209, 144, 'THUMBNAIL', 150, 150, 'images/media/2020/10/thumbnail1603090266a3RKK19706.png', NULL, NULL),
(208, 144, 'ACTUAL', 400, 400, 'images/media/2020/10/a3RKK19706.png', NULL, NULL),
(207, 143, 'MEDIUM', 400, 267, 'images/media/2020/10/medium1603090108OYgMe19506.png', NULL, NULL),
(206, 143, 'THUMBNAIL', 150, 100, 'images/media/2020/10/thumbnail1603090108OYgMe19506.png', NULL, NULL),
(205, 143, 'ACTUAL', 700, 468, 'images/media/2020/10/OYgMe19506.png', NULL, NULL),
(204, 142, 'THUMBNAIL', 111, 150, 'images/media/2020/10/thumbnail1603089902rBuhc19406.jpg', NULL, NULL),
(203, 141, 'THUMBNAIL', 150, 150, 'images/media/2020/10/thumbnail1603089902cb83x19606.jpg', NULL, NULL),
(202, 142, 'ACTUAL', 193, 261, 'images/media/2020/10/rBuhc19406.jpg', NULL, NULL),
(201, 141, 'ACTUAL', 150, 150, 'images/media/2020/10/cb83x19606.jpg', NULL, NULL),
(198, 138, 'ACTUAL', 128, 128, 'images/media/2020/10/uFuHV19906.png', NULL, NULL),
(197, 137, 'ACTUAL', 128, 128, 'images/media/2020/10/Pj2Ye19306.png', NULL, NULL),
(196, 136, 'ACTUAL', 128, 128, 'images/media/2020/10/9yM2r19406.png', NULL, NULL),
(195, 135, 'ACTUAL', 128, 128, 'images/media/2020/10/vghYV19706.png', NULL, NULL),
(194, 134, 'ACTUAL', 128, 128, 'images/media/2020/10/rSWCc19706.png', NULL, NULL),
(200, 140, 'ACTUAL', 128, 128, 'images/media/2020/10/IEH2219706.png', NULL, NULL),
(190, 130, 'ACTUAL', 128, 128, 'images/media/2020/10/ZLqsi19305.png', NULL, NULL),
(189, 129, 'ACTUAL', 128, 128, 'images/media/2020/10/NhSBS19905.png', NULL, NULL),
(188, 128, 'ACTUAL', 128, 128, 'images/media/2020/10/DGOhG19905.png', NULL, NULL),
(192, 132, 'ACTUAL', 128, 128, 'images/media/2020/10/j8wIC19406.png', NULL, NULL),
(199, 139, 'ACTUAL', 128, 128, 'images/media/2020/10/BdrVG19306.png', NULL, NULL),
(185, 125, 'ACTUAL', 128, 128, 'images/media/2020/10/4I8as19205.png', NULL, NULL),
(184, 124, 'ACTUAL', 128, 128, 'images/media/2020/10/3AJAe19305.png', NULL, NULL),
(183, 123, 'ACTUAL', 128, 128, 'images/media/2020/10/fvSZw19205.png', NULL, NULL),
(343, 207, 'THUMBNAIL', 150, 150, 'images/media/2020/12/thumbnail1607701270EW23911303.png', NULL, NULL),
(182, 122, 'ACTUAL', 128, 128, 'images/media/2020/10/C5P3o19405.png', NULL, NULL),
(178, 120, 'ACTUAL', 26, 248, 'images/media/2020/10/WrqUR17712.png', NULL, NULL),
(179, 120, 'THUMBNAIL', 16, 150, 'images/media/2020/10/thumbnail1602936287WrqUR17712.png', NULL, NULL),
(180, 121, 'ACTUAL', 32, 156, 'images/media/2020/10/Eot2Q17112.png', NULL, NULL),
(181, 121, 'THUMBNAIL', 31, 150, 'images/media/2020/10/thumbnail1602936297Eot2Q17112.png', NULL, NULL),
(257, 163, 'THUMBNAIL', 150, 97, 'images/media/2020/11/thumbnail1604292144IazQp02604.jpg', NULL, NULL),
(258, 164, 'ACTUAL', 284, 184, 'images/media/2020/11/24cL102304.jpg', NULL, NULL),
(259, 164, 'THUMBNAIL', 150, 97, 'images/media/2020/11/thumbnail160429215424cL102304.jpg', NULL, NULL),
(260, 165, 'ACTUAL', 284, 184, 'images/media/2020/11/kFUFC02204.jpg', NULL, NULL),
(261, 165, 'THUMBNAIL', 150, 97, 'images/media/2020/11/thumbnail1604292178kFUFC02204.jpg', NULL, NULL),
(262, 166, 'ACTUAL', 271, 184, 'images/media/2020/11/yJnTH02204.jpg', NULL, NULL),
(263, 166, 'THUMBNAIL', 150, 102, 'images/media/2020/11/thumbnail1604292192yJnTH02204.jpg', NULL, NULL),
(264, 167, 'ACTUAL', 284, 184, 'images/media/2020/11/bo2fT02304.jpg', NULL, NULL),
(265, 167, 'THUMBNAIL', 150, 97, 'images/media/2020/11/thumbnail1604292201bo2fT02304.jpg', NULL, NULL),
(266, 168, 'ACTUAL', 276, 184, 'images/media/2020/11/9BvuP02904.jpg', NULL, NULL),
(267, 168, 'THUMBNAIL', 150, 100, 'images/media/2020/11/thumbnail16042922089BvuP02904.jpg', NULL, NULL),
(268, 169, 'ACTUAL', 280, 184, 'images/media/2020/11/SooyI02304.jpg', NULL, NULL),
(269, 169, 'THUMBNAIL', 150, 99, 'images/media/2020/11/thumbnail1604292215SooyI02304.jpg', NULL, NULL),
(270, 170, 'ACTUAL', 275, 184, 'images/media/2020/11/xPH4S02804.jpg', NULL, NULL),
(271, 170, 'THUMBNAIL', 150, 100, 'images/media/2020/11/thumbnail1604292275xPH4S02804.jpg', NULL, NULL),
(272, 171, 'ACTUAL', 276, 184, 'images/media/2020/11/ZY6DV02904.jpg', NULL, NULL),
(273, 171, 'THUMBNAIL', 150, 100, 'images/media/2020/11/thumbnail1604292355ZY6DV02904.jpg', NULL, NULL),
(274, 172, 'ACTUAL', 291, 184, 'images/media/2020/11/DX73X02404.jpg', NULL, NULL),
(275, 172, 'THUMBNAIL', 150, 95, 'images/media/2020/11/thumbnail1604292366DX73X02404.jpg', NULL, NULL),
(276, 173, 'ACTUAL', 296, 184, 'images/media/2020/11/99Lrj02504.jpg', NULL, NULL),
(277, 173, 'THUMBNAIL', 150, 93, 'images/media/2020/11/thumbnail160429237799Lrj02504.jpg', NULL, NULL),
(278, 174, 'ACTUAL', 273, 184, 'images/media/2020/11/tHFO102804.jpg', NULL, NULL),
(279, 174, 'THUMBNAIL', 150, 101, 'images/media/2020/11/thumbnail1604292388tHFO102804.jpg', NULL, NULL),
(280, 175, 'ACTUAL', 284, 184, 'images/media/2020/11/g9ajd02804.jpg', NULL, NULL),
(281, 175, 'THUMBNAIL', 150, 97, 'images/media/2020/11/thumbnail1604292399g9ajd02804.jpg', NULL, NULL),
(282, 176, 'ACTUAL', 128, 128, 'images/media/2020/11/ebNX902807.png', NULL, NULL),
(283, 177, 'ACTUAL', 128, 128, 'images/media/2020/11/eg40402207.png', NULL, NULL),
(284, 178, 'ACTUAL', 128, 128, 'images/media/2020/11/QqnBn02807.png', NULL, NULL),
(285, 179, 'ACTUAL', 128, 128, 'images/media/2020/11/89Ylk02607.png', NULL, NULL),
(286, 180, 'ACTUAL', 128, 128, 'images/media/2020/11/GzzSM02407.png', NULL, NULL),
(287, 181, 'ACTUAL', 128, 128, 'images/media/2020/11/bnz7402507.png', NULL, NULL),
(288, 182, 'ACTUAL', 128, 128, 'images/media/2020/11/NFH2x02107.png', NULL, NULL),
(289, 183, 'ACTUAL', 128, 128, 'images/media/2020/11/kYTPf02908.png', NULL, NULL),
(290, 184, 'ACTUAL', 128, 128, 'images/media/2020/11/Q692X02408.png', NULL, NULL),
(309, 195, 'ACTUAL', 400, 400, 'images/media/2020/11/L5wKK06107.jpeg', NULL, NULL),
(292, 186, 'ACTUAL', 128, 128, 'images/media/2020/11/9mHuE02109.png', NULL, NULL),
(293, 187, 'ACTUAL', 128, 128, 'images/media/2020/11/SzQbG02309.png', NULL, NULL),
(294, 188, 'ACTUAL', 128, 128, 'images/media/2020/11/EZPQp02109.png', NULL, NULL),
(295, 189, 'ACTUAL', 280, 184, 'images/media/2020/11/JPhGn04704.jpg', NULL, NULL),
(296, 189, 'THUMBNAIL', 150, 99, 'images/media/2020/11/thumbnail1604463510JPhGn04704.jpg', NULL, NULL),
(297, 190, 'ACTUAL', 499, 341, 'images/media/2020/11/XMEoo04504.jpg', NULL, NULL),
(298, 190, 'THUMBNAIL', 150, 103, 'images/media/2020/11/thumbnail1604465269XMEoo04504.jpg', NULL, NULL),
(299, 190, 'MEDIUM', 400, 273, 'images/media/2020/11/medium1604465269XMEoo04504.jpg', NULL, NULL),
(339, 206, 'ACTUAL', 812, 779, 'images/media/2020/12/3jZs711903.jpg', NULL, NULL),
(340, 206, 'THUMBNAIL', 150, 144, 'images/media/2020/12/thumbnail16076999253jZs711903.jpg', NULL, NULL),
(303, 192, 'ACTUAL', 346, 228, 'images/media/2020/11/YOD2l04104.jpg', NULL, NULL),
(304, 192, 'THUMBNAIL', 150, 99, 'images/media/2020/11/thumbnail1604465295YOD2l04104.jpg', NULL, NULL),
(305, 193, 'ACTUAL', 491, 500, 'images/media/2020/11/898UI04705.jpg', NULL, NULL),
(306, 193, 'THUMBNAIL', 147, 150, 'images/media/2020/11/thumbnail1604467324898UI04705.jpg', NULL, NULL),
(307, 193, 'MEDIUM', 393, 400, 'images/media/2020/11/medium1604467324898UI04705.jpg', NULL, NULL),
(308, 194, 'ACTUAL', 128, 128, 'images/media/2020/11/peFzr05505.png', NULL, NULL),
(311, 195, 'MEDIUM', 400, 400, 'images/media/2020/11/medium1604646515L5wKK06107.jpeg', NULL, NULL),
(312, 196, 'ACTUAL', 683, 683, 'images/media/2020/11/U2jHS06907.jpg', NULL, NULL),
(313, 196, 'THUMBNAIL', 150, 150, 'images/media/2020/11/thumbnail1604646593U2jHS06907.jpg', NULL, NULL),
(314, 196, 'MEDIUM', 400, 400, 'images/media/2020/11/medium1604646593U2jHS06907.jpg', NULL, NULL),
(315, 197, 'ACTUAL', 230, 219, 'images/media/2020/11/uAgpo06107.jpg', NULL, NULL),
(316, 197, 'THUMBNAIL', 150, 143, 'images/media/2020/11/thumbnail1604646727uAgpo06107.jpg', NULL, NULL),
(350, 210, 'ACTUAL', 351, 351, 'images/media/2020/12/qWVvg11904.jpg', NULL, NULL),
(341, 206, 'MEDIUM', 400, 384, 'images/media/2020/12/medium16076999253jZs711903.jpg', NULL, NULL),
(342, 207, 'ACTUAL', 374, 374, 'images/media/2020/12/EW23911303.png', NULL, NULL),
(333, 204, 'ACTUAL', 604, 571, 'images/media/2020/12/4eAel11902.png', NULL, NULL),
(334, 204, 'THUMBNAIL', 150, 142, 'images/media/2020/12/thumbnail16076983044eAel11902.png', NULL, NULL),
(335, 204, 'MEDIUM', 400, 378, 'images/media/2020/12/medium16076983044eAel11902.png', NULL, NULL),
(351, 210, 'THUMBNAIL', 150, 150, 'images/media/2020/12/thumbnail1607705560qWVvg11904.jpg', NULL, NULL),
(329, 202, 'ACTUAL', 614, 614, 'images/media/2020/12/3CQpW11202.png', NULL, NULL),
(330, 202, 'THUMBNAIL', 150, 150, 'images/media/2020/12/thumbnail16076977343CQpW11202.png', NULL, NULL),
(331, 202, 'MEDIUM', 400, 400, 'images/media/2020/12/medium16076977343CQpW11202.png', NULL, NULL),
(352, 211, 'ACTUAL', 462, 440, 'images/media/2020/12/zwuat11605.jpg', NULL, NULL),
(347, 209, 'ACTUAL', 507, 514, 'images/media/2020/12/bXoL011104.jpg', NULL, NULL),
(348, 209, 'THUMBNAIL', 148, 150, 'images/media/2020/12/thumbnail1607704206bXoL011104.jpg', NULL, NULL),
(349, 209, 'MEDIUM', 395, 400, 'images/media/2020/12/medium1607704206bXoL011104.jpg', NULL, NULL),
(353, 211, 'THUMBNAIL', 150, 143, 'images/media/2020/12/thumbnail1607707141zwuat11605.jpg', NULL, NULL),
(354, 211, 'MEDIUM', 400, 381, 'images/media/2020/12/medium1607707141zwuat11605.jpg', NULL, NULL),
(355, 212, 'ACTUAL', 100, 432, 'images/media/2021/02/kcI0M09607.png', NULL, NULL),
(356, 212, 'THUMBNAIL', 35, 150, 'images/media/2021/02/thumbnail1612857160kcI0M09607.png', NULL, NULL),
(357, 212, 'MEDIUM', 93, 400, 'images/media/2021/02/medium1612857160kcI0M09607.png', NULL, NULL),
(358, 213, 'ACTUAL', 100, 432, 'images/media/2021/02/eOmoL09907.png', NULL, NULL),
(359, 213, 'THUMBNAIL', 35, 150, 'images/media/2021/02/thumbnail1612857370eOmoL09907.png', NULL, NULL),
(360, 213, 'MEDIUM', 93, 400, 'images/media/2021/02/medium1612857370eOmoL09907.png', NULL, NULL),
(361, 214, 'ACTUAL', 356, 750, 'images/media/2021/02/gfkVK09408.jpg', NULL, NULL),
(362, 214, 'THUMBNAIL', 71, 150, 'images/media/2021/02/thumbnail1612861067gfkVK09408.jpg', NULL, NULL),
(363, 214, 'MEDIUM', 190, 400, 'images/media/2021/02/medium1612861067gfkVK09408.jpg', NULL, NULL),
(364, 215, 'ACTUAL', 356, 750, 'images/media/2021/02/PzkUk09209.jpg', NULL, NULL),
(365, 215, 'THUMBNAIL', 71, 150, 'images/media/2021/02/thumbnail1612862597PzkUk09209.jpg', NULL, NULL),
(366, 215, 'MEDIUM', 190, 400, 'images/media/2021/02/medium1612862597PzkUk09209.jpg', NULL, NULL),
(367, 216, 'ACTUAL', 356, 750, 'images/media/2021/02/g6dwr09609.jpg', NULL, NULL),
(368, 216, 'THUMBNAIL', 71, 150, 'images/media/2021/02/thumbnail1612862616g6dwr09609.jpg', NULL, NULL),
(369, 216, 'MEDIUM', 190, 400, 'images/media/2021/02/medium1612862616g6dwr09609.jpg', NULL, NULL),
(370, 217, 'ACTUAL', 356, 750, 'images/media/2021/02/nhTRm09509.jpg', NULL, NULL),
(371, 217, 'THUMBNAIL', 71, 150, 'images/media/2021/02/thumbnail1612862625nhTRm09509.jpg', NULL, NULL),
(372, 217, 'MEDIUM', 190, 400, 'images/media/2021/02/medium1612862625nhTRm09509.jpg', NULL, NULL),
(373, 218, 'ACTUAL', 356, 750, 'images/media/2021/02/f9QqK09709.jpg', NULL, NULL),
(374, 218, 'THUMBNAIL', 71, 150, 'images/media/2021/02/thumbnail1612862634f9QqK09709.jpg', NULL, NULL),
(375, 218, 'MEDIUM', 190, 400, 'images/media/2021/02/medium1612862634f9QqK09709.jpg', NULL, NULL),
(376, 219, 'ACTUAL', 356, 750, 'images/media/2021/02/58K0R09909.jpg', NULL, NULL),
(377, 219, 'THUMBNAIL', 71, 150, 'images/media/2021/02/thumbnail161286264258K0R09909.jpg', NULL, NULL),
(378, 219, 'MEDIUM', 190, 400, 'images/media/2021/02/medium161286264258K0R09909.jpg', NULL, NULL),
(473, 268, 'MEDIUM', 140, 400, 'images/media/2021/02/medium1613132127dbvBF12112.jpg', NULL, NULL),
(472, 268, 'THUMBNAIL', 53, 150, 'images/media/2021/02/thumbnail1613132127dbvBF12112.jpg', NULL, NULL),
(471, 267, 'MEDIUM', 140, 400, 'images/media/2021/02/medium1613132127efhIc12312.jpg', NULL, NULL),
(383, 222, 'ACTUAL', 240, 240, 'images/media/2021/02/KFj7610405.jpg', NULL, NULL),
(384, 222, 'THUMBNAIL', 150, 150, 'images/media/2021/02/thumbnail1612935987KFj7610405.jpg', NULL, NULL),
(385, 223, 'ACTUAL', 240, 240, 'images/media/2021/02/FNkOF10605.jpg', NULL, NULL),
(386, 223, 'THUMBNAIL', 150, 150, 'images/media/2021/02/thumbnail1612935997FNkOF10605.jpg', NULL, NULL),
(387, 224, 'ACTUAL', 240, 240, 'images/media/2021/02/LMjUD10605.jpg', NULL, NULL),
(388, 224, 'THUMBNAIL', 150, 150, 'images/media/2021/02/thumbnail1612936001LMjUD10605.jpg', NULL, NULL),
(442, 251, 'ACTUAL', 128, 128, 'images/media/2021/02/EIS8X12211.png', NULL, NULL),
(441, 250, 'ACTUAL', 128, 128, 'images/media/2021/02/0Cqbd12711.png', NULL, NULL),
(391, 226, 'ACTUAL', 240, 240, 'images/media/2021/02/ymjnv10305.jpg', NULL, NULL),
(392, 226, 'THUMBNAIL', 150, 150, 'images/media/2021/02/thumbnail1612936012ymjnv10305.jpg', NULL, NULL),
(470, 268, 'ACTUAL', 420, 1200, 'images/media/2021/02/dbvBF12112.jpg', NULL, NULL),
(469, 267, 'THUMBNAIL', 53, 150, 'images/media/2021/02/thumbnail1613132127efhIc12312.jpg', NULL, NULL),
(468, 267, 'ACTUAL', 420, 1200, 'images/media/2021/02/efhIc12312.jpg', NULL, NULL),
(467, 266, 'THUMBNAIL', 150, 150, 'images/media/2021/02/thumbnail1613129563ePYgf12211.jpg', NULL, NULL),
(461, 263, 'THUMBNAIL', 150, 150, 'images/media/2021/02/thumbnail1613129563hwkUS12211.jpg', NULL, NULL),
(462, 264, 'ACTUAL', 150, 150, 'images/media/2021/02/pcupp12511.jpg', NULL, NULL),
(463, 264, 'THUMBNAIL', 150, 150, 'images/media/2021/02/thumbnail1613129563pcupp12511.jpg', NULL, NULL),
(464, 265, 'ACTUAL', 150, 150, 'images/media/2021/02/srruI12511.jpg', NULL, NULL),
(465, 265, 'THUMBNAIL', 150, 150, 'images/media/2021/02/thumbnail1613129563srruI12511.jpg', NULL, NULL),
(466, 266, 'ACTUAL', 150, 150, 'images/media/2021/02/ePYgf12211.jpg', NULL, NULL),
(452, 259, 'ACTUAL', 150, 150, 'images/media/2021/02/NTA3I12911.jpg', NULL, NULL),
(453, 259, 'THUMBNAIL', 150, 150, 'images/media/2021/02/thumbnail1613129562NTA3I12911.jpg', NULL, NULL),
(454, 260, 'ACTUAL', 150, 150, 'images/media/2021/02/iHZdc12311.jpg', NULL, NULL),
(455, 260, 'THUMBNAIL', 150, 150, 'images/media/2021/02/thumbnail1613129562iHZdc12311.jpg', NULL, NULL),
(411, 236, 'ACTUAL', 240, 240, 'images/media/2021/02/j4D9j10705.jpg', NULL, NULL),
(412, 236, 'THUMBNAIL', 150, 150, 'images/media/2021/02/thumbnail1612936087j4D9j10705.jpg', NULL, NULL),
(451, 258, 'THUMBNAIL', 150, 150, 'images/media/2021/02/thumbnail1613129561le6tq12811.jpg', NULL, NULL),
(445, 254, 'ACTUAL', 128, 128, 'images/media/2021/02/TnTaG12311.png', NULL, NULL),
(446, 255, 'ACTUAL', 128, 128, 'images/media/2021/02/LYESx12911.png', NULL, NULL),
(447, 256, 'ACTUAL', 128, 128, 'images/media/2021/02/PfPvp12911.png', NULL, NULL),
(448, 257, 'ACTUAL', 150, 150, 'images/media/2021/02/nP4z312611.jpg', NULL, NULL),
(449, 258, 'ACTUAL', 150, 150, 'images/media/2021/02/le6tq12811.jpg', NULL, NULL),
(450, 257, 'THUMBNAIL', 150, 150, 'images/media/2021/02/thumbnail1613129561nP4z312611.jpg', NULL, NULL),
(420, 240, 'ACTUAL', 240, 332, 'images/media/2021/02/nMTeE10605.jpg', NULL, NULL),
(421, 241, 'ACTUAL', 240, 240, 'images/media/2021/02/naTui10305.jpg', NULL, NULL),
(422, 240, 'THUMBNAIL', 108, 150, 'images/media/2021/02/thumbnail1612936523nMTeE10605.jpg', NULL, NULL),
(423, 241, 'THUMBNAIL', 150, 150, 'images/media/2021/02/thumbnail1612936523naTui10305.jpg', NULL, NULL),
(425, 243, 'ACTUAL', 240, 240, 'images/media/2021/02/xaUXS10605.jpg', NULL, NULL),
(426, 243, 'THUMBNAIL', 150, 150, 'images/media/2021/02/thumbnail1612936532xaUXS10605.jpg', NULL, NULL),
(456, 261, 'ACTUAL', 150, 150, 'images/media/2021/02/YRHYA12111.jpg', NULL, NULL),
(457, 261, 'THUMBNAIL', 150, 150, 'images/media/2021/02/thumbnail1613129562YRHYA12111.jpg', NULL, NULL),
(458, 262, 'ACTUAL', 150, 150, 'images/media/2021/02/nQIx212811.jpg', NULL, NULL),
(459, 262, 'THUMBNAIL', 150, 150, 'images/media/2021/02/thumbnail1613129563nQIx212811.jpg', NULL, NULL),
(460, 263, 'ACTUAL', 150, 150, 'images/media/2021/02/hwkUS12211.jpg', NULL, NULL),
(444, 253, 'ACTUAL', 128, 128, 'images/media/2021/02/oFDRq12911.png', NULL, NULL),
(443, 252, 'ACTUAL', 128, 128, 'images/media/2021/02/7jvfT12511.png', NULL, NULL),
(434, 247, 'ACTUAL', 240, 240, 'images/media/2021/02/CMbGF10705.jpg', NULL, NULL),
(435, 247, 'THUMBNAIL', 150, 150, 'images/media/2021/02/thumbnail1612936747CMbGF10705.jpg', NULL, NULL),
(436, 248, 'ACTUAL', 240, 421, 'images/media/2021/02/LHDIj10506.jpg', NULL, NULL),
(437, 248, 'THUMBNAIL', 86, 150, 'images/media/2021/02/thumbnail1612937470LHDIj10506.jpg', NULL, NULL),
(438, 248, 'MEDIUM', 228, 400, 'images/media/2021/02/medium1612937470LHDIj10506.jpg', NULL, NULL),
(439, 249, 'ACTUAL', 200, 200, 'images/media/2021/02/rfkLi10906.png', NULL, NULL),
(440, 249, 'THUMBNAIL', 150, 150, 'images/media/2021/02/thumbnail1612937844rfkLi10906.png', NULL, NULL),
(474, 267, 'LARGE', 315, 900, 'images/media/2021/02/large1613132127efhIc12312.jpg', NULL, NULL),
(475, 268, 'LARGE', 315, 900, 'images/media/2021/02/large1613132127dbvBF12112.jpg', NULL, NULL),
(476, 269, 'ACTUAL', 420, 1200, 'images/media/2021/02/XAxRw12612.jpg', NULL, NULL),
(477, 269, 'THUMBNAIL', 53, 150, 'images/media/2021/02/thumbnail1613132128XAxRw12612.jpg', NULL, NULL),
(478, 269, 'MEDIUM', 140, 400, 'images/media/2021/02/medium1613132128XAxRw12612.jpg', NULL, NULL),
(479, 269, 'LARGE', 315, 900, 'images/media/2021/02/large1613132129XAxRw12612.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_ref_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `added_date` int(11) NOT NULL,
  `reference_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `stock_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_ref_id`, `admin_id`, `added_date`, `reference_code`, `stock`, `products_id`, `purchase_price`, `stock_type`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '10001', 100, 1, '150.00', 'in', '2020-10-20 15:54:02', NULL),
(2, 1, 0, '10001', 200, 1, '140.00', 'in', '2020-10-22 13:40:07', NULL),
(3, 1, 0, '10002', 1000, 3, '156.00', 'in', '2020-10-22 14:22:14', NULL),
(4, 1, 0, '10002', 1000, 3, '140.00', 'in', '2020-10-22 14:23:16', NULL),
(5, 0, 1603430480, '', 1, 3, '0.00', 'out', NULL, NULL),
(6, 0, 1603430480, '', 2, 1, '0.00', 'out', NULL, NULL),
(7, 0, 1603710746, '', 1, 3, '0.00', 'out', NULL, NULL),
(8, 0, 1603710746, '', 2, 1, '0.00', 'out', NULL, NULL),
(9, 0, 1603711093, '', 2, 3, '0.00', 'out', NULL, NULL),
(10, 0, 1603717204, '', 1, 3, '0.00', 'out', NULL, NULL),
(11, 0, 1603717204, '', 2, 1, '0.00', 'out', NULL, NULL),
(12, 0, 1603970124, '', 2, 3, '0.00', 'out', NULL, NULL),
(13, 0, 1603970124, '', 1, 1, '0.00', 'out', NULL, NULL),
(14, 0, 1604063282, '', 6, 3, '0.00', 'out', NULL, NULL),
(15, 0, 1604063282, '', 4, 1, '0.00', 'out', NULL, NULL),
(16, 1, 0, '10003', 500, 2, '100.00', 'in', '2020-10-31 08:25:13', NULL),
(17, 0, 1604129988, '', 1, 2, '0.00', 'out', NULL, NULL),
(18, 0, 1604129988, '', 1, 3, '0.00', 'out', NULL, NULL),
(19, 0, 1604129988, '', 2, 1, '0.00', 'out', NULL, NULL),
(20, 0, 1604130156, '', 1, 3, '0.00', 'out', NULL, NULL),
(21, 0, 1604130156, '', 1, 1, '0.00', 'out', NULL, NULL),
(22, 0, 1604139000, '', 1, 3, '0.00', 'out', NULL, NULL),
(23, 0, 1604140194, '', 1, 3, '0.00', 'out', NULL, NULL),
(24, 0, 1604140194, '', 2, 1, '0.00', 'out', NULL, NULL),
(25, 0, 1604140263, '', 1, 3, '0.00', 'out', NULL, NULL),
(26, 0, 1604142736, '', 1, 3, '0.00', 'out', NULL, NULL),
(27, 0, 1604142794, '', 2, 3, '0.00', 'out', NULL, NULL),
(28, 0, 1604143047, '', 3, 3, '0.00', 'out', NULL, NULL),
(29, 0, 1604144122, '', 1, 3, '0.00', 'out', NULL, NULL),
(30, 0, 1604144301, '', 6, 1, '0.00', 'out', NULL, NULL),
(31, 0, 1604144516, '', 1, 3, '0.00', 'out', NULL, NULL),
(32, 0, 1604146239, '', 1, 3, '0.00', 'out', NULL, NULL),
(33, 0, 1604146943, '', 1, 3, '0.00', 'out', NULL, NULL),
(34, 0, 1604147059, '', 1, 3, '0.00', 'out', NULL, NULL),
(35, 0, 1604147059, '', 2, 1, '0.00', 'out', NULL, NULL),
(36, 0, 1604147226, '', 4, 3, '0.00', 'out', NULL, NULL),
(37, 0, 1604147313, '', 3, 1, '0.00', 'out', NULL, NULL),
(38, 1, 0, '123', 300, 5, '400.00', 'in', '2020-11-02 10:34:37', NULL),
(39, 1, 0, '1003', 500, 6, '1000.00', 'in', '2020-11-02 10:36:30', NULL),
(40, 1, 0, '11223', 1000, 8, '5000.00', 'in', '2020-11-02 10:37:15', NULL),
(41, 1, 0, '1090', 1000, 9, '4000.00', 'in', '2020-11-02 10:37:55', NULL),
(42, 1, 0, '1003', 5000, 10, '4000.00', 'in', '2020-11-02 10:38:14', NULL),
(43, 1, 0, '10203', 5000, 11, '6000.00', 'in', '2020-11-02 10:38:40', NULL),
(44, 1, 0, '11004', 1000, 12, '800.00', 'in', '2020-11-02 10:39:16', NULL),
(45, 1, 0, '70708', 4000, 13, '2000.00', 'in', '2020-11-02 10:39:43', NULL),
(46, 1, 0, '60100', 3000, 14, '4000.00', 'in', '2020-11-02 10:40:05', NULL),
(47, 1, 0, '10004', 3000, 15, '1000.00', 'in', '2020-11-02 10:40:31', NULL),
(48, 1, 0, '10098', 5000, 16, '4000.00', 'in', '2020-11-02 10:40:53', NULL),
(49, 1, 0, '45450', 3200, 17, '4000.00', 'in', '2020-11-02 10:41:12', NULL),
(50, 1, 0, '34342', 4000, 18, '6500.00', 'in', '2020-11-02 10:41:35', NULL),
(51, 1, 0, '123', 2000, 19, '3000.00', 'in', '2020-11-02 10:42:08', NULL),
(52, 1, 0, '10090', 4000, 20, '5000.00', 'in', '2020-11-02 10:42:28', NULL),
(53, 1, 0, '12120', 5000, 21, '3500.00', 'in', '2020-11-02 10:42:55', NULL),
(54, 1, 0, '14090', 3000, 22, '1500.00', 'in', '2020-11-02 10:43:20', NULL),
(55, 1, 0, '10009', 3000, 23, '1000.00', 'in', '2020-11-02 10:43:43', NULL),
(56, 1, 0, '1003', 4000, 24, '5000.00', 'in', '2020-11-02 10:44:02', NULL),
(57, 0, 1604408242, '', 1, 16, '0.00', 'out', NULL, NULL),
(58, 0, 1604408242, '', 1, 5, '0.00', 'out', NULL, NULL),
(59, 0, 1604408243, '', 1, 3, '0.00', 'out', NULL, NULL),
(60, 0, 1604408243, '', 1, 1, '0.00', 'out', NULL, NULL),
(61, 0, 1604408243, '', 1, 22, '0.00', 'out', NULL, NULL),
(62, 0, 1604488947, '', 1, 19, '0.00', 'out', NULL, NULL),
(63, 0, 1604489747, '', 2, 1, '0.00', 'out', NULL, NULL),
(64, 0, 1604489747, '', 2, 24, '0.00', 'out', NULL, NULL),
(65, 0, 1604491205, '', 1, 1, '0.00', 'out', NULL, NULL),
(66, 0, 1604491205, '', 2, 24, '0.00', 'out', NULL, NULL),
(67, 0, 1604491861, '', 1, 1, '0.00', 'out', NULL, NULL),
(68, 0, 1604491861, '', 2, 24, '0.00', 'out', NULL, NULL),
(69, 0, 1604492294, '', 1, 1, '0.00', 'out', NULL, NULL),
(70, 0, 1604492294, '', 2, 24, '0.00', 'out', NULL, NULL),
(71, 0, 1604492530, '', 1, 1, '0.00', 'out', NULL, NULL),
(72, 0, 1604492530, '', 2, 24, '0.00', 'out', NULL, NULL),
(73, 0, 1604492601, '', 1, 1, '0.00', 'out', NULL, NULL),
(74, 0, 1604492601, '', 2, 24, '0.00', 'out', NULL, NULL),
(75, 0, 1604492697, '', 1, 1, '0.00', 'out', NULL, NULL),
(76, 0, 1604492697, '', 2, 24, '0.00', 'out', NULL, NULL),
(77, 0, 1604493461, '', 2, 22, '0.00', 'out', NULL, NULL),
(78, 0, 1604493461, '', 1, 24, '0.00', 'out', NULL, NULL),
(79, 0, 1604552447, '', 1, 1, '0.00', 'out', NULL, NULL),
(80, 0, 1604552517, '', 1, 1, '0.00', 'out', NULL, NULL),
(81, 0, 1604552575, '', 1, 1, '0.00', 'out', NULL, NULL),
(82, 0, 1604552690, '', 1, 1, '0.00', 'out', NULL, NULL),
(83, 0, 1604552932, '', 1, 1, '0.00', 'out', NULL, NULL),
(84, 0, 1604553162, '', 2, 1, '0.00', 'out', NULL, NULL),
(85, 0, 1604553234, '', 1, 1, '0.00', 'out', NULL, NULL),
(86, 0, 1604553483, '', 1, 1, '0.00', 'out', NULL, NULL),
(87, 0, 1604553551, '', 3, 1, '0.00', 'out', NULL, NULL),
(88, 0, 1604553635, '', 1, 24, '0.00', 'out', NULL, NULL),
(89, 0, 1604553776, '', 1, 24, '0.00', 'out', NULL, NULL),
(90, 0, 1604553941, '', 1, 24, '0.00', 'out', NULL, NULL),
(91, 0, 1604554078, '', 1, 24, '0.00', 'out', NULL, NULL),
(92, 22, 0, NULL, 1000, 29, '40.00', 'in', '2020-11-05 11:21:13', NULL),
(93, 0, 1604557344, '', 2, 1, '0.00', 'out', NULL, NULL),
(94, 0, 1604557344, '', 1, 24, '0.00', 'out', NULL, NULL),
(95, 0, 1604567101, '', 2, 29, '0.00', 'out', NULL, NULL),
(96, 0, 1604567101, '', 1, 23, '0.00', 'out', NULL, NULL),
(97, 0, 1604569592, '', 1, 29, '0.00', 'out', NULL, NULL),
(98, 0, 1604569592, '', 1, 23, '0.00', 'out', NULL, NULL),
(99, 0, 1604569592, '', 1, 24, '0.00', 'out', NULL, NULL),
(100, 0, 1604646064, '', 1, 8, '0.00', 'out', NULL, NULL),
(101, 0, 1604646064, '', 1, 6, '0.00', 'out', NULL, NULL),
(102, 0, 1604646064, '', 1, 2, '0.00', 'out', NULL, NULL),
(103, 0, 1604646064, '', 1, 13, '0.00', 'out', NULL, NULL),
(104, 0, 1604646064, '', 1, 22, '0.00', 'out', NULL, NULL),
(105, 0, 1604729016, '', 4, 29, '0.00', 'out', NULL, NULL),
(106, 0, 1604729016, '', 2, 10, '0.00', 'out', NULL, NULL),
(107, 0, 1604729016, '', 2, 9, '0.00', 'out', NULL, NULL),
(108, 0, 1604729016, '', 2, 22, '0.00', 'out', NULL, NULL),
(109, 0, 1607690197, '', 1, 23, '0.00', 'out', NULL, NULL),
(110, 0, 1609926731, '', 1, 19, '0.00', 'out', NULL, NULL),
(111, 0, 1609926731, '', 1, 1, '0.00', 'out', NULL, NULL),
(112, 0, 1611039606, '', 1, 9, '0.00', 'out', NULL, NULL),
(113, 0, 1611039674, '', 1, 24, '0.00', 'out', NULL, NULL),
(114, 0, 1612855727, '', 1, 24, '0.00', 'out', NULL, NULL),
(115, 0, 1612855813, '', 2, 24, '0.00', 'out', NULL, NULL),
(116, 0, 1612865356, '', 5, 17, '0.00', 'out', NULL, NULL),
(117, 1, 0, 'TEST', 100, 31, '80.00', 'in', '2021-02-09 17:10:03', NULL),
(118, 0, 1612873067, '', 1, 16, '0.00', 'out', NULL, NULL),
(119, 35, 0, NULL, 10, 32, '10.00', 'in', '2021-02-09 17:35:42', NULL),
(120, 0, 1612874242, '', 1, 32, '0.00', 'out', NULL, NULL),
(121, 0, 1612874846, '', 1, 29, '0.00', 'out', NULL, NULL),
(122, 0, 1612931778, '', 1, 21, '0.00', 'out', NULL, NULL),
(123, 0, 1612949799, '', 1, 29, '0.00', 'out', NULL, NULL),
(124, 0, 1612949799, '', 1, 31, '0.00', 'out', NULL, NULL),
(125, 0, 1612961048, '', 1, 29, '0.00', 'out', NULL, NULL),
(126, 0, 1612961491, '', 1, 18, '0.00', 'out', NULL, NULL),
(127, 0, 1613025951, '', 1, 24, '0.00', 'out', NULL, NULL),
(128, 0, 1613026424, '', 2, 21, '0.00', 'out', NULL, NULL),
(129, 0, 1613037981, '', 1, 29, '0.00', 'out', NULL, NULL),
(130, 0, 1613038154, '', 1, 32, '0.00', 'out', NULL, NULL),
(131, 0, 1613038154, '', 1, 31, '0.00', 'out', NULL, NULL),
(132, 0, 1613044838, '', 1, 32, '0.00', 'out', NULL, NULL),
(133, 0, 1613046535, '', 1, 32, '0.00', 'out', NULL, NULL),
(134, 0, 1613624218, '', 1, 3, '0.00', 'out', NULL, NULL),
(135, 0, 1614067983, '', 1, 20, '0.00', 'out', NULL, NULL),
(136, 0, 1614068359, '', 1, 29, '0.00', 'out', NULL, NULL),
(137, 0, 1614070821, '', 1, 16, '0.00', 'out', NULL, NULL),
(138, 0, 1614070821, '', 1, 22, '0.00', 'out', NULL, NULL),
(139, 0, 1614070821, '', 1, 24, '0.00', 'out', NULL, NULL),
(140, 0, 1614071216, '', 1, 29, '0.00', 'out', NULL, NULL),
(141, 0, 1614074320, '', 1, 29, '0.00', 'out', NULL, NULL),
(142, 0, 1614074320, '', 1, 31, '0.00', 'out', NULL, NULL),
(143, 0, 1614317413, '', 1, 29, '0.00', 'out', NULL, NULL),
(144, 0, 1614317413, '', 1, 17, '0.00', 'out', NULL, NULL),
(145, 0, 1614317413, '', 3, 31, '0.00', 'out', NULL, NULL),
(146, 0, 1614321294, '', 1, 31, '0.00', 'out', NULL, NULL),
(147, 0, 1617089224, '', 1, 29, '0.00', 'out', NULL, NULL),
(148, 1, 0, 'test', 80, 31, '100.00', 'in', '2021-05-07 23:23:30', NULL),
(149, 0, 1626420079, '', 2, 29, '0.00', 'out', NULL, NULL),
(150, 0, 1626420079, '', 1, 31, '0.00', 'out', NULL, NULL),
(151, 0, 1626954390, '', 1, 31, '0.00', 'out', NULL, NULL),
(152, 0, 1626954390, '', 1, 9, '0.00', 'out', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_detail`
--

CREATE TABLE `inventory_detail` (
  `inventory_ref_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE `labels` (
  `label_id` int(11) NOT NULL,
  `label_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`label_id`, `label_name`) VALUES
(1, 'I\'ve forgotten my password?'),
(2, 'Creating an account means you’re okay with shopify\'s Terms of Service, Privacy Policy'),
(872, 'Login with'),
(873, 'or'),
(874, 'Email'),
(875, 'Password'),
(876, 'Register'),
(877, 'Forgot Password'),
(878, 'Send'),
(879, 'About Us'),
(880, 'Categories'),
(881, 'Contact Us'),
(882, 'Name'),
(883, 'Your Messsage'),
(884, 'Please connect to the internet'),
(885, 'Recently Viewed'),
(886, 'Products are available.'),
(887, 'Top Seller'),
(888, 'Special Deals'),
(889, 'Most Liked'),
(890, 'All Categories'),
(891, 'Deals'),
(892, 'REMOVE'),
(893, 'Intro'),
(894, 'Skip Intro'),
(895, 'Got It!'),
(896, 'Order Detail'),
(897, 'Price Detail'),
(898, 'Total'),
(899, 'Sub Total'),
(900, 'Shipping'),
(901, 'Product Details'),
(902, 'New'),
(903, 'Out of Stock'),
(904, 'In Stock'),
(905, 'Add to Cart'),
(906, 'ADD TO CART'),
(907, 'Product Description'),
(908, 'Techincal details'),
(909, 'OFF'),
(910, 'No Products Found'),
(911, 'Reset Filters'),
(912, 'Search'),
(913, 'Main Categories'),
(914, 'Sub Categories'),
(915, 'Shipping method'),
(916, 'Thank You'),
(917, 'Thank you for shopping with us.'),
(918, 'My Orders'),
(919, 'Continue Shopping'),
(920, 'Favourite'),
(921, 'Your wish List is empty'),
(922, 'Continue Adding'),
(923, 'Explore'),
(924, 'Word Press Post Detail'),
(925, 'Go Back'),
(926, 'Top Sellers'),
(927, 'News'),
(928, 'Enter keyword'),
(929, 'Settings'),
(930, 'Shop'),
(931, 'Reset'),
(932, 'Select Language'),
(933, 'OUT OF STOCK'),
(934, 'Newest'),
(935, 'Refund Policy'),
(936, 'Privacy Policy'),
(937, 'Term and Services'),
(938, 'Skip'),
(939, 'Top Dishes'),
(940, 'Recipe of Day'),
(941, 'Food Categories'),
(942, 'Coupon Code'),
(943, 'Coupon Amount'),
(944, 'coupon code'),
(945, 'Coupon'),
(946, 'Note to the buyer'),
(947, 'Explore More'),
(948, 'All'),
(949, 'A - Z'),
(950, 'Z - A'),
(951, 'Price : high - low'),
(952, 'Price : low - high'),
(953, 'Special Products'),
(954, 'Sort Products'),
(955, 'Cancel'),
(956, 'most liked'),
(957, 'special'),
(958, 'top seller'),
(959, 'newest'),
(960, 'Likes'),
(961, 'My Account'),
(962, 'Mobile'),
(963, 'Date of Birth'),
(964, 'Update'),
(965, 'Current Password'),
(966, 'New Password'),
(967, 'Change Password'),
(968, 'Customer Orders'),
(969, 'Order Status'),
(970, 'Orders ID'),
(971, 'Product Price'),
(972, 'No. of Products'),
(973, 'Date'),
(974, 'Customer Address'),
(975, 'Please add your new shipping address for the futher processing of the your order'),
(976, 'Add new Address'),
(977, 'Create an Account'),
(978, 'First Name'),
(979, 'Last Name'),
(980, 'Already Memeber?'),
(981, 'Billing Info'),
(982, 'Address'),
(983, 'Phone'),
(984, 'Same as Shipping Address'),
(985, 'Next'),
(986, 'Order'),
(987, 'Billing Address'),
(988, 'Shipping Method'),
(989, 'Products'),
(990, 'SubTotal'),
(991, 'Products Price'),
(992, 'Tax'),
(993, 'Shipping Cost'),
(994, 'Order Notes'),
(995, 'Payment'),
(996, 'Card Number'),
(997, 'Expiration Date'),
(998, 'Expiration'),
(999, 'Error: invalid card number!'),
(1000, 'Error: invalid expiry date!'),
(1001, 'Error: invalid cvc number!'),
(1002, 'Continue'),
(1003, 'My Cart'),
(1004, 'Your cart is empty'),
(1005, 'continue shopping'),
(1006, 'Price'),
(1007, 'Quantity'),
(1008, 'by'),
(1009, 'View'),
(1010, 'Remove'),
(1011, 'Proceed'),
(1012, 'Shipping Address'),
(1013, 'Country'),
(1014, 'other'),
(1015, 'Zone'),
(1016, 'City'),
(1017, 'Post code'),
(1018, 'State'),
(1019, 'Update Address'),
(1020, 'Save Address'),
(1021, 'Login & Register'),
(1022, 'Please login or create an account for free'),
(1023, 'Log Out'),
(1024, 'My Wish List'),
(1025, 'Filters'),
(1026, 'Price Range'),
(1027, 'Close'),
(1028, 'Apply'),
(1029, 'Clear'),
(1030, 'Menu'),
(1031, 'Home'),
(1033, 'Creating an account means you’re okay with our'),
(1034, 'Login'),
(1035, 'Turn on/off Local Notifications'),
(1036, 'Turn on/off Notifications'),
(1037, 'Change Language'),
(1038, 'Official Website'),
(1039, 'Rate Us'),
(1040, 'Share'),
(1041, 'Edit Profile'),
(1042, 'A percentage discount for the entire cart'),
(1043, 'A fixed total discount for the entire cart'),
(1044, 'A fixed total discount for selected products only'),
(1045, 'A percentage discount for selected products only'),
(1047, 'Network Connected Reloading Data'),
(1048, 'Sort by'),
(1049, 'Flash Sale'),
(1050, 'ok'),
(1051, 'Number'),
(1052, 'Expire Month'),
(1053, 'Expire Year'),
(1054, 'Payment Method'),
(1055, 'Status'),
(1056, 'And'),
(1057, 'cccc'),
(1058, 'All Products'),
(1059, 'Coupon Codes List'),
(1060, 'Custom Orders'),
(1061, 'DETAILS'),
(1062, 'Deals Products'),
(1063, 'Discount ends in'),
(1064, 'Featured Products'),
(1065, 'Most Liked Products'),
(1066, 'Newest Products'),
(1067, 'On Sale Products'),
(1068, 'Posts'),
(1069, 'Safe Payment'),
(1070, 'Secure Online Paymen'),
(1071, 'Select Currency'),
(1072, 'Terms and Services'),
(1073, 'Top Seller Products'),
(1074, 'Wish List'),
(1075, 'Product Quantity is Limited!'),
(1076, 'Error server not reponding'),
(1077, 'Please Enter Your New Password!'),
(1078, 'Please Enter Your Current Password!'),
(1079, 'Current Password is Wrong!'),
(1080, 'Product Not Available With these Attributes!'),
(1081, 'Please enter something'),
(1082, 'Disconnected'),
(1083, 'Connected'),
(1084, 'Error logging into Facebook'),
(1085, 'Error Check Login Status Facebook'),
(1086, 'Please enter coupon code!'),
(1087, 'Error or render dialog closed without being successful'),
(1088, 'Error in configuration'),
(1089, 'Error in initialization, maybe PayPal isnt supported or something else'),
(1090, 'Sorry Coupon is Expired'),
(1091, 'Sorry your Cart total is low than coupon min limit!'),
(1092, 'Sorry your Cart total is Higher than coupon Max limit!'),
(1093, 'Sorry, this coupon is not valid for this email address!'),
(1094, 'Sorry, this coupon is not valid for sale items.'),
(1095, 'Coupon code already applied!'),
(1096, 'Sorry Individual Use Coupon is already applied any other coupon cannot be applied with it !'),
(1097, 'Coupon usage limit has been reached.'),
(1098, 'Account');

-- --------------------------------------------------------

--
-- Table structure for table `label_value`
--

CREATE TABLE `label_value` (
  `label_value_id` int(11) NOT NULL,
  `label_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `label_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `label_value`
--

INSERT INTO `label_value` (`label_value_id`, `label_value`, `language_id`, `label_id`) VALUES
(1297, 'Home', 1, 1031),
(1298, 'Menu', 1, 1030),
(1299, 'Clear', 1, 1029),
(1300, 'Apply', 1, 1028),
(1301, 'Close', 1, 1027),
(1302, 'Price Range', 1, 1026),
(1303, 'Filters', 1, 1025),
(1304, 'My Wish List', 1, 1024),
(1305, 'Log Out', 1, 1023),
(1306, 'Please login or create an account for free', 1, 1022),
(1307, 'login & Register', 1, 1021),
(1308, 'Save Address', 1, 1020),
(1309, 'State', 1, 1018),
(1310, 'Update Address', 1, 1019),
(1311, 'Post code', 1, 1017),
(1312, 'City', 1, 1016),
(1313, 'Zone', 1, 1015),
(1314, 'other', 1, 1014),
(1315, 'Country', 1, 1013),
(1316, 'Shipping Address', 1, 1012),
(1317, 'Proceed', 1, 1011),
(1318, 'Remove', 1, 1010),
(1319, 'by', 1, 1008),
(1320, 'View', 1, 1009),
(1321, 'Quantity', 1, 1007),
(1322, 'Price', 1, 1006),
(1323, 'continue shopping', 1, 1005),
(1324, 'Your cart is empty', 1, 1004),
(1325, 'My Cart', 1, 1003),
(1326, 'Continue', 1, 1002),
(1327, 'Error: invalid cvc number!', 1, 1001),
(1328, 'Error: invalid expiry date!', 1, 1000),
(1329, 'Error: invalid card number!', 1, 999),
(1330, 'Expiration', 1, 998),
(1331, 'Expiration Date', 1, 997),
(1332, 'Card Number', 1, 996),
(1333, 'Payment', 1, 995),
(1334, 'Order Notes', 1, 994),
(1335, 'Shipping Cost', 1, 993),
(1336, 'Tax', 1, 992),
(1337, 'Products Price', 1, 991),
(1338, 'SubTotal', 1, 990),
(1339, 'Products', 1, 989),
(1340, 'Shipping Method', 1, 988),
(1341, 'Billing Address', 1, 987),
(1342, 'Order', 1, 986),
(1343, 'Next', 1, 985),
(1344, 'Same as Shipping Address', 1, 984),
(1345, 'Billing Info', 1, 981),
(1346, 'Address', 1, 982),
(1347, 'Phone', 1, 983),
(1348, 'Already Memeber?', 1, 980),
(1349, 'Last Name', 1, 979),
(1350, 'First Name', 1, 978),
(1351, 'Create an Account', 1, 977),
(1352, 'Add new Address', 1, 976),
(1353, 'Please add your new shipping address for the futher processing of the your order', 1, 975),
(1354, 'Order Status', 1, 969),
(1355, 'Orders ID', 1, 970),
(1356, 'Product Price', 1, 971),
(1357, 'No. of Products', 1, 972),
(1358, 'Date', 1, 973),
(1359, 'Customer Address', 1, 974),
(1360, 'Customer Orders', 1, 968),
(1361, 'Change Password', 1, 967),
(1362, 'New Password', 1, 966),
(1363, 'Current Password', 1, 965),
(1364, 'Update', 1, 964),
(1365, 'Date of Birth', 1, 963),
(1366, 'Mobile', 1, 962),
(1367, 'My Account', 1, 961),
(1368, 'Likes', 1, 960),
(1369, 'Newest', 1, 959),
(1370, 'Top Seller', 1, 958),
(1371, 'Special', 1, 957),
(1372, 'Most Liked', 1, 956),
(1373, 'Cancel', 1, 955),
(1374, 'Sort Products', 1, 954),
(1375, 'Special Products', 1, 953),
(1376, 'Price : low - high', 1, 952),
(1377, 'Price : high - low', 1, 951),
(1378, 'Z - A', 1, 950),
(1379, 'A - Z', 1, 949),
(1380, 'All', 1, 948),
(1381, 'Explore More', 1, 947),
(1382, 'Note to the buyer', 1, 946),
(1383, 'Coupon', 1, 945),
(1384, 'coupon code', 1, 944),
(1385, 'Coupon Amount', 1, 943),
(1386, 'Coupon Code', 1, 942),
(1387, 'Food Categories', 1, 941),
(1388, 'Recipe of Day', 1, 940),
(1389, 'Top Dishes', 1, 939),
(1390, 'Skip', 1, 938),
(1391, 'Term and Services', 1, 937),
(1392, 'Privacy Policy', 1, 936),
(1393, 'Refund Policy', 1, 935),
(1394, 'Newest', 1, 934),
(1395, 'OUT OF STOCK', 1, 933),
(1396, 'Select Language', 1, 932),
(1397, 'Reset', 1, 931),
(1398, 'Shop', 1, 930),
(1399, 'Settings', 1, 929),
(1400, 'Enter keyword', 1, 928),
(1401, 'News', 1, 927),
(1402, 'Top Sellers', 1, 926),
(1403, 'Go Back', 1, 925),
(1404, 'Word Press Post Detail', 1, 924),
(1405, 'Explore', 1, 923),
(1406, 'Continue Adding', 1, 922),
(1407, 'Your wish List is empty', 1, 921),
(1408, 'Favourite', 1, 920),
(1409, 'Continue Shopping', 1, 919),
(1410, 'My Orders', 1, 918),
(1411, 'Thank you for shopping with us.', 1, 917),
(1412, 'Thank You', 1, 916),
(1413, 'Shipping method', 1, 915),
(1414, 'Sub Categories', 1, 914),
(1415, 'Main Categories', 1, 913),
(1416, 'Search', 1, 912),
(1417, 'Reset Filters', 1, 911),
(1418, 'No Products Found', 1, 910),
(1419, 'OFF', 1, 909),
(1420, 'Techincal details', 1, 908),
(1421, 'Product Description', 1, 907),
(1422, 'ADD TO CART', 1, 906),
(1423, 'Add to Cart', 1, 905),
(1424, 'In Stock', 1, 904),
(1425, 'Out of Stock', 1, 903),
(1426, 'New', 1, 902),
(1427, 'Product Details', 1, 901),
(1428, 'Shipping', 1, 900),
(1429, 'Sub Total', 1, 899),
(1430, 'Total', 1, 898),
(1431, 'Price Detail', 1, 897),
(1432, 'Order Detail', 1, 896),
(1433, 'Got It!', 1, 895),
(1434, 'Skip Intro', 1, 894),
(1435, 'Intro', 1, 893),
(1436, 'REMOVE', 1, 892),
(1437, 'Deals', 1, 891),
(1438, 'All Categories', 1, 890),
(1439, 'Most Liked', 1, 889),
(1440, 'Special Deals', 1, 888),
(1441, 'Top Seller', 1, 887),
(1442, 'Products are available.', 1, 886),
(1443, 'Recently Viewed', 1, 885),
(1444, 'Please connect to the internet', 1, 884),
(1445, 'Contact Us', 1, 881),
(1446, 'Name', 1, 882),
(1447, 'Your Message', 1, 883),
(1448, 'Categories', 1, 880),
(1449, 'About Us', 1, 879),
(1450, 'Send', 1, 878),
(1451, 'Forgot Password', 1, 877),
(1452, 'Register', 1, 876),
(1453, 'Password', 1, 875),
(1454, 'Email', 1, 874),
(1455, 'or', 1, 873),
(1456, 'Login with', 1, 872),
(1457, 'Creating an account means you\'re okay with shopify\'s Terms of Service, Privacy Policy', 1, 2),
(1458, 'I\'ve forgotten my password?', 1, 1),
(1459, NULL, 1, NULL),
(1462, 'Creating an account means you’re okay with our', 1, 1033),
(1465, 'Login', 1, 1034),
(1468, 'Turn on/off Local Notifications', 1, 1035),
(1471, 'Turn on/off Notifications', 1, 1036),
(1474, 'Change Language', 1, 1037),
(1477, 'Official Website', 1, 1038),
(1480, 'Rate Us', 1, 1039),
(1483, 'Share', 1, 1040),
(1486, 'Edit Profile', 1, 1041),
(1489, 'A percentage discount for the entire cart', 1, 1042),
(1492, 'A fixed total discount for the entire cart', 1, 1043),
(1495, 'A fixed total discount for selected products only', 1, 1044),
(1498, 'A percentage discount for selected products only', 1, 1045),
(1501, 'Network Connected Reloading Data', 1, 1047),
(1503, 'Sort by', 1, 1048),
(1505, 'Flash Sale', 1, 1049),
(1507, 'ok', 1, 1050),
(1509, 'Number', 1, 1051),
(1511, 'Expire Month', 1, 1052),
(1513, 'Expire Year', 1, 1053),
(1515, 'Payment Method', 1, 1054),
(1517, 'Status', 1, 1055),
(1519, 'And', 1, 1056),
(1520, NULL, 2, NULL),
(1521, NULL, 1, 1072),
(1522, NULL, 2, 1072),
(1523, NULL, 1, 1073),
(1524, NULL, 2, 1073),
(1525, NULL, 1, 1074),
(1526, NULL, 2, 1074),
(1527, NULL, 1, 1075),
(1528, NULL, 2, 1075),
(1529, NULL, 1, 1076),
(1530, NULL, 2, 1076),
(1531, NULL, 1, 1077),
(1532, NULL, 2, 1077),
(1533, NULL, 1, 1078),
(1534, NULL, 2, 1078),
(1535, NULL, 1, 1079),
(1536, NULL, 2, 1079),
(1537, NULL, 1, 1080),
(1538, NULL, 2, 1080),
(1539, NULL, 1, 1081),
(1540, NULL, 2, 1081),
(1541, NULL, 1, 1082),
(1542, NULL, 2, 1082),
(1543, NULL, 1, 1083),
(1544, NULL, 2, 1083),
(1545, NULL, 1, 1084),
(1546, NULL, 2, 1084),
(1547, NULL, 1, 1085),
(1548, NULL, 2, 1085),
(1549, NULL, 1, 1086),
(1550, NULL, 2, 1086),
(1551, NULL, 1, 1087),
(1552, NULL, 2, 1087),
(1553, NULL, 1, 1088),
(1554, NULL, 2, 1088),
(1555, NULL, 1, 1089),
(1556, NULL, 2, 1089),
(1557, NULL, 1, 1090),
(1558, NULL, 2, 1090),
(1559, NULL, 1, 1091),
(1560, NULL, 2, 1091),
(1561, NULL, 1, 1092),
(1562, NULL, 2, 1092),
(1563, NULL, 1, 1093),
(1564, NULL, 2, 1093),
(1565, NULL, 1, 1094),
(1566, NULL, 2, 1094),
(1567, NULL, 1, 1095),
(1568, NULL, 2, 1095),
(1569, NULL, 1, 1096),
(1570, NULL, 2, 1096),
(1571, NULL, 1, 1097),
(1572, NULL, 2, 1097),
(1573, 'Account', 1, 1098),
(1574, NULL, 2, 1098),
(1575, NULL, 2, 1020),
(1576, NULL, 2, 1021),
(1577, NULL, 2, 1022),
(1578, NULL, 2, 1023),
(1579, NULL, 2, 1024),
(1580, NULL, 2, 1025),
(1581, NULL, 2, 1026),
(1582, NULL, 2, 1027),
(1583, NULL, 2, 1028),
(1584, NULL, 2, 1029),
(1585, NULL, 2, 1030),
(1586, NULL, 2, 1031),
(1587, NULL, 2, 1033),
(1588, NULL, 2, 1034),
(1589, NULL, 2, 1035),
(1590, NULL, 2, 1036),
(1591, NULL, 2, 1037),
(1592, NULL, 2, 1038),
(1593, NULL, 2, 1039),
(1594, NULL, 2, 1040),
(1595, NULL, 2, 1041),
(1596, NULL, 2, 1042),
(1597, NULL, 2, 1043),
(1598, NULL, 2, 1044),
(1599, NULL, 2, 1045),
(1600, NULL, 2, 1047),
(1601, NULL, 2, 1048),
(1602, NULL, 2, 1049),
(1603, NULL, 2, 1050),
(1604, NULL, 2, 1051),
(1605, NULL, 2, 1052),
(1606, NULL, 2, 1053),
(1607, NULL, 2, 1054),
(1608, NULL, 2, 1055),
(1609, NULL, 2, 1056),
(1610, NULL, 1, 1057),
(1611, NULL, 2, 1057),
(1612, 'All Products', 1, 1058),
(1613, NULL, 2, 1058),
(1614, 'Coupon Codes List', 1, 1059),
(1615, NULL, 2, 1059),
(1616, 'Custom Orders', 1, 1060),
(1617, NULL, 2, 1060),
(1618, 'DETAILS', 1, 1061),
(1619, NULL, 2, 1061),
(1620, 'Deals Products', 1, 1062),
(1621, NULL, 2, 1062),
(1622, 'Discount ends in', 1, 1063),
(1623, NULL, 2, 1063),
(1624, 'Featured Products', 1, 1064),
(1625, NULL, 2, 1064),
(1626, 'Most Liked Products', 1, 1065),
(1627, NULL, 2, 1065),
(1628, 'Newest Products', 1, 1066),
(1629, NULL, 2, 1066),
(1630, 'On Sale Products', 1, 1067),
(1631, NULL, 2, 1067),
(1632, 'Posts', 1, 1068),
(1633, NULL, 2, 1068),
(1634, 'Safe Payment', 1, 1069),
(1635, NULL, 2, 1069),
(1636, 'Secure Online Paymen', 1, 1070),
(1637, NULL, 2, 1070),
(1638, 'Select Currency', 1, 1071),
(1639, NULL, 2, 1071);

-- --------------------------------------------------------

--
-- Table structure for table `label_values`
--

CREATE TABLE `label_values` (
  `label_value_id` int(10) UNSIGNED NOT NULL,
  `label_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` int(11) NOT NULL,
  `label_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `languages_id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `directory` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `direction` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`languages_id`, `name`, `code`, `image`, `directory`, `sort_order`, `direction`, `is_default`) VALUES
(1, 'English', 'en', '179', NULL, 1, 'ltr', 1);

-- --------------------------------------------------------

--
-- Table structure for table `liked_products`
--

CREATE TABLE `liked_products` (
  `like_id` int(11) NOT NULL,
  `liked_products_id` int(11) NOT NULL,
  `liked_customers_id` int(11) NOT NULL,
  `date_liked` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `liked_products`
--

INSERT INTO `liked_products` (`like_id`, `liked_products_id`, `liked_customers_id`, `date_liked`) VALUES
(5, 1, 7, '2020-10-30 07:20:05'),
(17, 22, 32, '2021-02-11 10:04:55'),
(16, 9, 37, '2021-02-09 13:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `manage_min_max`
--

CREATE TABLE `manage_min_max` (
  `min_max_id` int(11) NOT NULL,
  `min_level` int(11) NOT NULL,
  `max_level` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `inventory_ref_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manage_role`
--

CREATE TABLE `manage_role` (
  `manage_role_id` int(11) NOT NULL,
  `user_types_id` tinyint(1) NOT NULL DEFAULT 0,
  `dashboard_view` tinyint(1) NOT NULL DEFAULT 0,
  `manufacturer_view` tinyint(1) NOT NULL DEFAULT 0,
  `manufacturer_create` tinyint(1) NOT NULL DEFAULT 0,
  `manufacturer_update` tinyint(1) NOT NULL DEFAULT 0,
  `manufacturer_delete` tinyint(1) NOT NULL DEFAULT 0,
  `categories_view` tinyint(1) NOT NULL DEFAULT 0,
  `categories_create` tinyint(1) NOT NULL DEFAULT 0,
  `categories_update` tinyint(1) NOT NULL DEFAULT 0,
  `categories_delete` tinyint(1) NOT NULL DEFAULT 0,
  `products_view` tinyint(1) NOT NULL DEFAULT 0,
  `products_create` tinyint(1) NOT NULL DEFAULT 0,
  `products_update` tinyint(1) NOT NULL DEFAULT 0,
  `products_delete` tinyint(1) NOT NULL DEFAULT 0,
  `news_view` tinyint(1) NOT NULL DEFAULT 0,
  `news_create` tinyint(1) NOT NULL DEFAULT 0,
  `news_update` tinyint(1) NOT NULL DEFAULT 0,
  `news_delete` tinyint(1) NOT NULL DEFAULT 0,
  `customers_view` tinyint(1) NOT NULL DEFAULT 0,
  `customers_create` tinyint(1) NOT NULL DEFAULT 0,
  `customers_update` tinyint(1) NOT NULL DEFAULT 0,
  `customers_delete` tinyint(1) NOT NULL DEFAULT 0,
  `tax_location_view` tinyint(1) NOT NULL DEFAULT 0,
  `tax_location_create` tinyint(1) NOT NULL DEFAULT 0,
  `tax_location_update` tinyint(1) NOT NULL DEFAULT 0,
  `tax_location_delete` tinyint(1) NOT NULL DEFAULT 0,
  `coupons_view` tinyint(1) NOT NULL DEFAULT 0,
  `coupons_create` tinyint(1) NOT NULL DEFAULT 0,
  `coupons_update` tinyint(1) NOT NULL DEFAULT 0,
  `coupons_delete` tinyint(1) NOT NULL DEFAULT 0,
  `notifications_view` tinyint(1) NOT NULL DEFAULT 0,
  `notifications_send` tinyint(1) NOT NULL DEFAULT 0,
  `orders_view` tinyint(1) NOT NULL DEFAULT 0,
  `orders_confirm` tinyint(1) NOT NULL DEFAULT 0,
  `shipping_methods_view` tinyint(1) NOT NULL DEFAULT 0,
  `shipping_methods_update` tinyint(1) NOT NULL DEFAULT 0,
  `payment_methods_view` tinyint(1) NOT NULL DEFAULT 0,
  `payment_methods_update` tinyint(1) NOT NULL DEFAULT 0,
  `reports_view` tinyint(1) NOT NULL DEFAULT 0,
  `website_setting_view` tinyint(1) NOT NULL DEFAULT 0,
  `website_setting_update` tinyint(1) NOT NULL DEFAULT 0,
  `application_setting_view` tinyint(1) NOT NULL DEFAULT 0,
  `application_setting_update` tinyint(1) NOT NULL DEFAULT 0,
  `general_setting_view` tinyint(1) NOT NULL DEFAULT 0,
  `general_setting_update` tinyint(1) NOT NULL DEFAULT 0,
  `manage_admins_view` tinyint(1) NOT NULL DEFAULT 0,
  `manage_admins_create` tinyint(1) NOT NULL DEFAULT 0,
  `manage_admins_update` tinyint(1) NOT NULL DEFAULT 0,
  `manage_admins_delete` tinyint(1) NOT NULL DEFAULT 0,
  `language_view` tinyint(1) NOT NULL DEFAULT 0,
  `language_create` tinyint(1) NOT NULL DEFAULT 0,
  `language_update` tinyint(1) NOT NULL DEFAULT 0,
  `language_delete` tinyint(1) NOT NULL DEFAULT 0,
  `profile_view` tinyint(1) NOT NULL DEFAULT 0,
  `profile_update` tinyint(1) NOT NULL DEFAULT 0,
  `admintype_view` tinyint(1) NOT NULL DEFAULT 0,
  `admintype_create` tinyint(1) NOT NULL DEFAULT 0,
  `admintype_update` tinyint(1) NOT NULL DEFAULT 0,
  `admintype_delete` tinyint(1) NOT NULL DEFAULT 0,
  `manage_admins_role` tinyint(1) NOT NULL DEFAULT 0,
  `add_media` tinyint(1) NOT NULL DEFAULT 0,
  `edit_media` tinyint(1) NOT NULL DEFAULT 0,
  `view_media` tinyint(1) NOT NULL DEFAULT 0,
  `delete_media` tinyint(1) NOT NULL DEFAULT 0,
  `edit_management` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manage_role`
--

INSERT INTO `manage_role` (`manage_role_id`, `user_types_id`, `dashboard_view`, `manufacturer_view`, `manufacturer_create`, `manufacturer_update`, `manufacturer_delete`, `categories_view`, `categories_create`, `categories_update`, `categories_delete`, `products_view`, `products_create`, `products_update`, `products_delete`, `news_view`, `news_create`, `news_update`, `news_delete`, `customers_view`, `customers_create`, `customers_update`, `customers_delete`, `tax_location_view`, `tax_location_create`, `tax_location_update`, `tax_location_delete`, `coupons_view`, `coupons_create`, `coupons_update`, `coupons_delete`, `notifications_view`, `notifications_send`, `orders_view`, `orders_confirm`, `shipping_methods_view`, `shipping_methods_update`, `payment_methods_view`, `payment_methods_update`, `reports_view`, `website_setting_view`, `website_setting_update`, `application_setting_view`, `application_setting_update`, `general_setting_view`, `general_setting_update`, `manage_admins_view`, `manage_admins_create`, `manage_admins_update`, `manage_admins_delete`, `language_view`, `language_create`, `language_update`, `language_delete`, `profile_view`, `profile_update`, `admintype_view`, `admintype_create`, `admintype_update`, `admintype_delete`, `manage_admins_role`, `add_media`, `edit_media`, `view_media`, `delete_media`, `edit_management`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturers_id` int(10) UNSIGNED NOT NULL,
  `manufacturer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturers_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_added` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_modified` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturers_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturers_id`, `manufacturer_name`, `manufacturer_image`, `manufacturers_slug`, `date_added`, `last_modified`, `manufacturers_image`, `created_at`, `updated_at`) VALUES
(1, 'Marshall Kilburn', '142', 'marshall-kilburn', NULL, NULL, NULL, '2020-10-19 10:46:06', NULL),
(2, 'Lucy Bevan', '141', 'lucy-bevan', NULL, NULL, NULL, '2020-10-19 10:46:46', NULL),
(3, 'Rahul Mishra', '153', 'rahul-mishra', NULL, NULL, NULL, '2020-11-06 12:06:56', NULL),
(4, 'Robert Kiyoski', '195', 'robert-kiyoski', NULL, NULL, NULL, '2020-11-06 12:08:50', NULL),
(5, 'Mark Manson', '196', 'mark-manson', NULL, NULL, NULL, '2020-11-06 12:10:25', NULL),
(6, 'Joseph Murphy', '197', 'joseph-murphy', NULL, NULL, NULL, '2020-11-06 12:12:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers_info`
--

CREATE TABLE `manufacturers_info` (
  `manufacturers_id` int(11) NOT NULL,
  `languages_id` int(11) NOT NULL,
  `manufacturers_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_clicked` int(11) NOT NULL DEFAULT 0,
  `date_last_click` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufacturers_info`
--

INSERT INTO `manufacturers_info` (`manufacturers_id`, `languages_id`, `manufacturers_url`, `url_clicked`, `date_last_click`) VALUES
(1, 1, 'http://', 0, NULL),
(2, 1, 'http://', 0, NULL),
(3, 1, 'http://rahulmishra.com', 0, NULL),
(4, 1, 'http://robertkiyoski.com', 0, NULL),
(5, 1, 'http://markmanson.com', 0, NULL),
(6, 1, 'http://josephmurphy.com', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `address1` mediumtext DEFAULT NULL,
  `address2` mediumtext DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `city` text DEFAULT NULL,
  `pincode` int(25) DEFAULT NULL,
  `member_type` int(1) NOT NULL DEFAULT 1,
  `membership_plan` int(1) NOT NULL DEFAULT 1,
  `book` int(11) DEFAULT NULL,
  `months` int(11) DEFAULT NULL,
  `avail_prime` int(1) NOT NULL DEFAULT 0,
  `magazines` int(1) NOT NULL DEFAULT 1,
  `how_to_find` mediumtext DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `amount` varchar(10) DEFAULT NULL,
  `payment_status` char(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `user_id`, `name`, `email`, `mobile`, `address1`, `address2`, `phone`, `zone_id`, `city`, `pincode`, `member_type`, `membership_plan`, `book`, `months`, `avail_prime`, `magazines`, `how_to_find`, `status`, `amount`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 4, 'nitin', 'teamwavechd@gmail.com', '1234567890', 'wave1', 'wave2', '9876543210', 192, 'pkl', 134109, 1, 1, 12, 6, 1, 3, 'net', 1, NULL, '2', '2020-11-06 10:19:36', '2020-11-27 09:34:26'),
(2, 4, 'asdsadsad', 'wave@gmail.com', 'asfsafsa', 'fasfasfasfas', NULL, 'fasfsaf', 191, 'fsafsafas', 0, 1, 1, 9, 8, 0, 2, 'fasfasfas', 1, NULL, '1', '2020-11-06 10:20:33', '2020-11-27 09:27:26'),
(3, 4, 'asdsadas', 'abc@gmail.com', 'fasfa', 'sfasfasfasf', 'fasfasfasfasf', 'fafasfas', 192, 'fsafsafasf', 0, 2, 5, 5, 3, 0, 1, 'sadasdasd', 0, NULL, '1', '2020-11-06 11:13:56', '2020-11-27 09:27:35'),
(4, 4, 'asdsadasdasd', 'pankajwaveinfo@gmail.com', 'dsad', 'sadasdasd', 'asdsadasd', 'asdasdasdasdasd', 185, 'fsafsafsafsaf', 2147483647, 1, 4, 6, 10, 1, 2, 'sdsafas', 0, NULL, '1', '2020-11-06 11:16:22', '2020-11-27 09:27:11'),
(17, 4, 'Wave', 'teamwavechd@gmail.com', '1255487888', 'dfgsdg', 'dfhdf', '3464564567', 192, 'Chandigarh', 123456, 1, 2, 15, 2, 0, 3, 'zdfgvdxfgd', 0, '200', '1', '2020-11-27 07:19:04', '2020-11-27 07:19:18'),
(16, 4, 'Wave', 'teamwavechd@gmail.com', '1255487888', 'dfghdf', 'hdfghgdf', '3464564567', 196, 'dfhdf', 123456, 1, 6, 14, 10, 0, 2, 'cvbfdgbhfg', 0, NULL, '1', '2020-11-27 07:00:46', '2020-11-27 07:01:00'),
(15, 4, 'Wave', 'teamwavechd@gmail.com', '1236547899', 'fghdfh', 'gdfghfdgh', '3464564567', 195, 'Chandigarh', 123456, 1, 1, 5, 5, 0, 3, 'dfghdfgh', 0, NULL, '2', '2020-11-27 06:45:39', '2020-11-27 06:45:50'),
(14, 4, 'Wave', 'teamwavechd@gmail.com', '1255487888', 'hello', 'asdfasdf', '3464564567', 192, 'arsdgfsd', 123456, 1, 1, 13, 8, 0, 1, 'fghdfhgf', 0, NULL, '1', '2020-11-27 06:43:28', '2020-11-27 06:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_09_24_122557_create_action_recorder_table', 1),
(2, '2019_09_24_122557_create_address_book_table', 1),
(3, '2019_09_24_122557_create_address_format_table', 1),
(4, '2019_09_24_122557_create_alert_settings_table', 1),
(5, '2019_09_24_122557_create_api_calls_list_table', 1),
(6, '2019_09_24_122557_create_banners_history_table', 1),
(7, '2019_09_24_122557_create_banners_table', 1),
(8, '2019_09_24_122557_create_block_ips_table', 1),
(9, '2019_09_24_122557_create_categories_description_table', 1),
(10, '2019_09_24_122557_create_categories_role_table', 1),
(11, '2019_09_24_122557_create_categories_table', 1),
(12, '2019_09_24_122557_create_compare_table', 1),
(13, '2019_09_24_122557_create_constant_banners_table', 1),
(14, '2019_09_24_122557_create_countries_table', 1),
(15, '2019_09_24_122557_create_coupons_table', 1),
(16, '2019_09_24_122557_create_currencies_table', 1),
(17, '2019_09_24_122557_create_currency_record_table', 1),
(18, '2019_09_24_122557_create_current_theme_table', 1),
(19, '2019_09_24_122557_create_customers_basket_attributes_table', 1),
(20, '2019_09_24_122557_create_customers_basket_table', 1),
(21, '2019_09_24_122557_create_customers_info_table', 1),
(22, '2019_09_24_122557_create_customers_table', 1),
(23, '2019_09_24_122557_create_devices_table', 1),
(24, '2019_09_24_122557_create_fedex_shipping_table', 1),
(25, '2019_09_24_122557_create_flash_sale_table', 1),
(26, '2019_09_24_122557_create_flate_rate_table', 1),
(27, '2019_09_24_122557_create_front_end_theme_content_table', 1),
(28, '2019_09_24_122557_create_geo_zones_table', 1),
(29, '2019_09_24_122557_create_http_call_record_table', 1),
(30, '2019_09_24_122557_create_hula_our_infos_table', 1),
(31, '2019_09_24_122557_create_image_categories_table', 1),
(32, '2019_09_24_122557_create_images_table', 1),
(33, '2019_09_24_122557_create_inventory_detail_table', 1),
(34, '2019_09_24_122557_create_inventory_table', 1),
(35, '2019_09_24_122557_create_label_value_table', 1),
(36, '2019_09_24_122557_create_label_values_table', 1),
(37, '2019_09_24_122557_create_labels_table', 1),
(38, '2019_09_24_122557_create_languages_table', 1),
(39, '2019_09_24_122557_create_liked_products_table', 1),
(40, '2019_09_24_122557_create_manage_min_max_table', 1),
(41, '2019_09_24_122557_create_manage_role_table', 1),
(42, '2019_09_24_122557_create_manufacturers_info_table', 1),
(43, '2019_09_24_122557_create_manufacturers_table', 1),
(44, '2019_09_24_122557_create_news_categories_description_table', 1),
(45, '2019_09_24_122557_create_news_categories_table', 1),
(46, '2019_09_24_122557_create_news_description_table', 1),
(47, '2019_09_24_122557_create_news_table', 1),
(48, '2019_09_24_122557_create_news_to_news_categories_table', 1),
(49, '2019_09_24_122557_create_newsletters_table', 1),
(50, '2019_09_24_122557_create_orders_products_attributes_table', 1),
(51, '2019_09_24_122557_create_orders_products_download_table', 1),
(52, '2019_09_24_122557_create_orders_products_table', 1),
(53, '2019_09_24_122557_create_orders_status_description_table', 1),
(54, '2019_09_24_122557_create_orders_status_history_table', 1),
(55, '2019_09_24_122557_create_orders_status_table', 1),
(56, '2019_09_24_122557_create_orders_table', 1),
(57, '2019_09_24_122557_create_orders_total_table', 1),
(58, '2019_09_24_122557_create_pages_description_table', 1),
(59, '2019_09_24_122557_create_pages_table', 1),
(60, '2019_09_24_122557_create_payment_description_table', 1),
(61, '2019_09_24_122557_create_payment_methods_detail_table', 1),
(62, '2019_09_24_122557_create_payment_methods_table', 1),
(63, '2019_09_24_122557_create_permissions_table', 1),
(64, '2019_09_24_122557_create_products_attributes_download_table', 1),
(65, '2019_09_24_122557_create_products_attributes_table', 1),
(66, '2019_09_24_122557_create_products_description_table', 1),
(67, '2019_09_24_122557_create_products_images_table', 1),
(68, '2019_09_24_122557_create_products_notifications_table', 1),
(69, '2019_09_24_122557_create_products_options_descriptions_table', 1),
(70, '2019_09_24_122557_create_products_options_table', 1),
(71, '2019_09_24_122557_create_products_options_values_descriptions_table', 1),
(72, '2019_09_24_122557_create_products_options_values_table', 1),
(73, '2019_09_24_122557_create_products_shipping_rates_table', 1),
(74, '2019_09_24_122557_create_products_table', 1),
(75, '2019_09_24_122557_create_products_to_categories_table', 1),
(76, '2019_09_24_122557_create_reviews_description_table', 1),
(77, '2019_09_24_122557_create_reviews_table', 1),
(78, '2019_09_24_122557_create_sec_directory_whitelist_table', 1),
(79, '2019_09_24_122557_create_sessions_table', 1),
(80, '2019_09_24_122557_create_settings_table', 1),
(81, '2019_09_24_122557_create_shipping_description_table', 1),
(82, '2019_09_24_122557_create_shipping_methods_table', 1),
(83, '2019_09_24_122557_create_sliders_images_table', 1),
(84, '2019_09_24_122557_create_specials_table', 1),
(85, '2019_09_24_122557_create_tax_class_table', 1),
(86, '2019_09_24_122557_create_tax_rates_table', 1),
(87, '2019_09_24_122557_create_units_descriptions_table', 1),
(88, '2019_09_24_122557_create_units_table', 1),
(89, '2019_09_24_122557_create_ups_shipping_table', 1),
(90, '2019_09_24_122557_create_user_to_address_table', 1),
(91, '2019_09_24_122557_create_user_types_table', 1),
(92, '2019_09_24_122557_create_users_table', 1),
(93, '2019_09_24_122557_create_whos_online_table', 1),
(94, '2019_09_24_122557_create_zones_table', 1),
(95, '2019_09_24_122557_create_zones_to_geo_zones_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_date_added` datetime NOT NULL,
  `news_last_modified` datetime DEFAULT NULL,
  `news_status` tinyint(1) NOT NULL,
  `is_feature` tinyint(1) NOT NULL DEFAULT 0,
  `news_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `newsletters_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_added` datetime NOT NULL,
  `date_sent` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `locked` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscriptions`
--

CREATE TABLE `newsletter_subscriptions` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter_subscriptions`
--

INSERT INTO `newsletter_subscriptions` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'teamwavechd@gmail.com', '2020-10-21 12:20:03', '2020-10-21 12:20:03'),
(4, 'nitinwaveinfotech@gmail.com', '2020-10-26 06:53:13', '2020-10-26 06:53:13'),
(5, 'admin@ecom.com', '2020-10-26 10:31:05', '2020-10-26 10:31:05'),
(6, 'team@gmail.com', '2020-10-30 10:45:14', '2020-10-30 10:45:14'),
(7, 'asdfasdfa@gmaki.com', '2020-10-30 11:29:20', '2020-10-30 11:29:20'),
(8, 'dummy@gmail.com', '2020-10-30 11:30:12', '2020-10-30 11:30:12'),
(9, 'adam@gmail.com', '2020-10-30 11:30:56', '2020-10-30 11:30:56'),
(10, 'pankajwaveinfo@gmail.com', '2020-10-30 11:31:03', '2020-10-30 11:31:03'),
(11, 'admin@gmail.com', '2021-02-09 09:56:43', '2021-02-09 09:56:43'),
(12, 'adminddfd@gmail.com', '2021-02-09 09:56:52', '2021-02-09 09:56:52'),
(13, 'admindfdfdfdfd@gmail.com', '2021-02-09 09:57:04', '2021-02-09 09:57:04'),
(14, 'admin6767@example.com', '2021-02-09 09:57:33', '2021-02-09 09:57:33');

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

CREATE TABLE `news_categories` (
  `categories_id` int(11) NOT NULL,
  `categories_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `sort_order` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `news_categories_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_categories_description`
--

CREATE TABLE `news_categories_description` (
  `categories_description_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL DEFAULT 0,
  `language_id` int(11) NOT NULL DEFAULT 1,
  `categories_name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_description`
--

CREATE TABLE `news_description` (
  `language_id` int(11) NOT NULL DEFAULT 1,
  `news_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `news_id` int(11) NOT NULL,
  `news_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_viewed` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_to_news_categories`
--

CREATE TABLE `news_to_news_categories` (
  `news_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `total_tax` decimal(7,2) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `customers_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customers_company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customers_street_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customers_suburb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customers_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customers_postcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customers_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customers_country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customers_telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customers_address_format_id` int(11) DEFAULT NULL,
  `delivery_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_street_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_suburb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_postcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_address_format_id` int(11) DEFAULT NULL,
  `billing_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_street_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_suburb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_postcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address_format_id` int(11) NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_owner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_number` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_expires` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_purchased` datetime DEFAULT NULL,
  `orders_date_finished` datetime DEFAULT NULL,
  `currency` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_value` decimal(14,6) DEFAULT NULL,
  `order_price` decimal(10,2) NOT NULL,
  `shipping_cost` decimal(10,2) NOT NULL,
  `shipping_method` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_duration` int(11) DEFAULT NULL,
  `order_information` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `coupon_code` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` float(10,2) NOT NULL DEFAULT 0.00,
  `exclude_product_ids` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_categories` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excluded_product_categories` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free_shipping` tinyint(1) NOT NULL DEFAULT 0,
  `product_ids` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordered_source` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Website, 2: App',
  `delivery_phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `total_tax`, `customers_id`, `customers_name`, `customers_company`, `customers_street_address`, `customers_suburb`, `customers_city`, `customers_postcode`, `customers_state`, `customers_country`, `customers_telephone`, `email`, `customers_address_format_id`, `delivery_name`, `delivery_company`, `delivery_street_address`, `delivery_suburb`, `delivery_city`, `delivery_postcode`, `delivery_state`, `delivery_country`, `delivery_address_format_id`, `billing_name`, `billing_company`, `billing_street_address`, `billing_suburb`, `billing_city`, `billing_postcode`, `billing_state`, `billing_country`, `billing_address_format_id`, `payment_method`, `cc_type`, `cc_owner`, `cc_number`, `cc_expires`, `last_modified`, `date_purchased`, `orders_date_finished`, `currency`, `currency_value`, `order_price`, `shipping_cost`, `shipping_method`, `shipping_duration`, `order_information`, `is_seen`, `coupon_code`, `coupon_amount`, `exclude_product_ids`, `product_categories`, `excluded_product_categories`, `free_shipping`, `product_ids`, `ordered_source`, `delivery_phone`, `billing_phone`, `transaction_id`, `created_at`, `updated_at`) VALUES
(1, '40.00', 4, 'nitin wave', NULL, 'wave', '', 'pkl', '134109', 'Haryana', 'India', '', 'teamwavechd@gmail.com', NULL, 'nitin wave', 'wave', 'wave', '', 'pkl', '134109', 'Haryana', 'India', NULL, 'nitin wave', 'wave', 'wave', '', 'pkl', '134109', 'Haryana', 'India', 0, 'Cash on Delivery', '', '', '', '', '2020-11-05 09:05:01', '2020-11-05 09:05:01', NULL, 'Rs', NULL, '510.00', '70.00', 'Shipping By Weight', NULL, '[]', 1, '', 0.00, '', '', '', 0, '', 1, '457432567654', '457432567654', NULL, '2020-11-05 09:05:01', '2020-11-05 09:05:45'),
(2, '0.00', 4, 'nitin wave wave', NULL, 'wave', '', 'pkl', '134109', 'Gujarat', 'India', '', 'teamwavechd@gmail.com', NULL, 'nitin wave wave', 'wave', 'wave', '', 'pkl', '134109', 'Gujarat', 'India', NULL, 'nitin wave wave', 'wave', 'wave', '', 'pkl', '134109', 'Gujarat', 'India', 0, 'Cash on Delivery', '', '', '', '', '2020-11-05 09:46:32', '2020-11-05 09:46:32', NULL, 'Rs', NULL, '720.00', '70.00', 'Shipping By Weight', NULL, '[]', 1, '', 0.00, '', '', '', 0, '', 1, '457432567654', '457432567654', NULL, '2020-11-05 09:46:32', '2020-11-05 09:47:03'),
(3, '0.00', 4, 'nitin wave wave', NULL, 'wave', '', 'pkl', '134109', 'Gujarat', 'India', '', 'teamwavechd@gmail.com', NULL, 'nitin wave wave', 'wave', 'wave', '', 'pkl', '134109', 'Gujarat', 'India', NULL, 'nitin wave wave', 'wave', 'wave', '', 'pkl', '134109', 'Gujarat', 'India', 0, 'Cash on Delivery', '', '', '', '', '2020-11-06 07:01:04', '2020-11-06 07:01:04', NULL, 'Rs', NULL, '552.97', '70.00', 'Shipping By Weight', NULL, '[]', 1, '', 0.00, '', '', '', 0, '', 1, '457432567654', '457432567654', NULL, '2020-11-06 07:01:04', '2020-11-06 07:55:55'),
(4, '147.40', 4, 'nitin wave Kumar', NULL, 'wave', '', 'pkl', '134109', 'Haryana', 'India', '', 'teamwavechd@gmail.com', NULL, 'nitin wave Kumar', 'wave', 'wave', '', 'pkl', '134109', 'Haryana', 'India', NULL, 'nitin wave Kumar', 'wave', 'wave', '', 'pkl', '134109', 'Haryana', 'India', 0, 'Cash on Delivery', '', '', '', '', '2020-11-07 06:03:36', '2020-11-07 06:03:36', NULL, 'Rs', NULL, '1691.38', '70.00', 'Shipping By Weight', NULL, '[]', 1, '', 0.00, '', '', '', 0, '', 1, '457432567654', '457432567654', NULL, '2020-11-07 06:03:36', '2020-11-07 06:11:24'),
(5, '0.00', 32, 'wave wave', NULL, 'adsasdf', '', 'Namsai', '134109', 'Arunachal Pradesh', 'India', '', 'waveinfotech.biz@gmail.com', NULL, 'wave wave', 'Allroundfix LLC', 'adsasdf', '', 'Namsai', '134109', 'Arunachal Pradesh', 'India', NULL, 'wave wave', 'Allroundfix LLC', 'adsasdf', '', 'Namsai', '134109', 'Arunachal Pradesh', 'India', 0, 'Cash on Delivery', '', '', '', '', '2020-12-11 12:36:37', '2020-12-11 12:36:37', NULL, 'Rs', NULL, '370.00', '70.00', 'Shipping By Weight', NULL, '[]', 1, '', 0.00, '', '', '', 0, '', 1, '09041065990', '09041065990', NULL, '2020-12-11 12:36:37', '2020-12-11 12:38:09'),
(6, '0.00', 34, 'Tarun Tarun', NULL, 'H.No-131 Shri Nagar PIpal Chowk', '', 'Hathras', '134109', 'Uttar Pradesh', 'India', '', 'varshney.5tarun@gmail.com', NULL, 'Tarun Tarun', 'test', 'H.No-131 Shri Nagar PIpal Chowk', '', 'Hathras', '134109', 'Uttar Pradesh', 'India', NULL, 'Tarun Tarun', 'test', 'H.No-131 Shri Nagar PIpal Chowk', '', 'Hathras', '134109', 'Uttar Pradesh', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-01-06 09:52:11', '2021-01-06 09:52:11', NULL, 'Rs', NULL, '406.78', '70.00', 'Shipping By Weight', NULL, '[]', 0, '', 0.00, '', '', '', 0, '', 1, '09286949968', '09286949968', NULL, '2021-01-06 09:52:11', '2021-01-06 09:52:11'),
(7, '20.00', 0, 'asfdasf sdsdff', NULL, 'pucnchkula', '', 'chd', '134109', 'Chandigarh', 'India', '', 'avinash.waveinfotech.biz@gmail.com', NULL, 'asfdasf sdsdff', 'sadfd', 'pucnchkula', '', 'chd', '134109', 'Chandigarh', 'India', NULL, 'asfdasf sdsdff', 'sadfd', 'pucnchkula', '', 'chd', '134109', 'Chandigarh', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-01-19 07:00:06', '2021-01-19 07:00:06', NULL, 'Rs', NULL, '490.00', '70.00', 'Shipping By Weight', NULL, '[]', 0, '', 0.00, '', '', '', 0, '', 1, '1234567890', '1234567890', NULL, '2021-01-19 07:00:06', '2021-01-19 07:00:06'),
(8, '15.00', 0, 'asfdasf sdsdff', NULL, 'pucnchkula', '', 'chd', '134109', 'Chandigarh', 'India', '', 'avinash.waveinfotech.biz@gmail.com', NULL, 'asfdasf sdsdff', 'sadfd', 'pucnchkula', '', 'chd', '134109', 'Chandigarh', 'India', NULL, 'asfdasf sdsdff', 'sadfd', 'pucnchkula', '', 'chd', '134109', 'Chandigarh', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-01-19 07:01:14', '2021-01-19 07:01:14', NULL, 'Rs', NULL, '325.00', '10.00', 'Shipping By Weight', NULL, '[]', 0, '', 0.00, '', '', '', 0, '', 1, '01234567890', '01234567890', NULL, '2021-01-19 07:01:14', '2021-01-19 07:01:14'),
(9, '15.00', 0, 'praveeb rai', NULL, 'sasjlkasjdlfkasjdf asldfjalsdfj asdjfasdjflk', '', 'chandigarh', '134109', 'Chandigarh', 'India', '', 'waveinfotech.biz@gmail.com', NULL, 'praveeb rai', 'wavee', 'sasjlkasjdlfkasjdf asldfjalsdfj asdjfasdjflk', '', 'chandigarh', '134109', 'Chandigarh', 'India', NULL, 'praveeb rai', 'wavee', 'sasjlkasjdlfkasjdf asldfjalsdfj asdjfasdjflk', '', 'chandigarh', '134109', 'Chandigarh', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-09 07:28:47', '2021-02-09 07:28:47', NULL, 'Rs', NULL, '325.00', '10.00', 'Shipping By Weight', NULL, '[]', 0, '', 0.00, '', '', '', 0, '', 1, '909909090909', '909909090909', NULL, '2021-02-09 07:28:47', '2021-02-09 07:28:47'),
(10, '15.00', 0, 'praveeb rai', NULL, 'sasjlkasjdlfkasjdf asldfjalsdfj asdjfasdjflk', '', 'chandigarh', '134109', 'Chandigarh', 'India', '', 'waveinfotech.biz@gmail.com', NULL, 'praveeb rai', 'wavee', 'sasjlkasjdlfkasjdf asldfjalsdfj asdjfasdjflk', '', 'chandigarh', '134109', 'Chandigarh', 'India', NULL, 'praveeb rai', 'wavee', 'sasjlkasjdlfkasjdf asldfjalsdfj asdjfasdjflk', '', 'chandigarh', '134109', 'Chandigarh', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-09 07:29:53', '2021-02-09 07:29:53', NULL, 'Rs', NULL, '325.00', '10.00', 'Shipping By Weight', NULL, '[]', 0, '', 0.00, '', '', '', 0, '', 1, '909909090909', '909909090909', NULL, '2021-02-09 07:29:53', '2021-02-09 07:29:53'),
(11, '0.00', 37, 'Komal Test', NULL, 'Panchkula', '', 'Chandigarh', '123456', 'Jammu and Kashmir', 'India', '', 'abc211@gmail.com', NULL, 'Komal Test', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Jammu and Kashmir', 'India', NULL, 'Komal Test', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Jammu and Kashmir', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-09 07:30:13', '2021-02-09 07:30:13', NULL, 'Rs', NULL, '670.00', '70.00', 'Shipping By Weight', NULL, '[]', 0, '', 0.00, '', '', '', 0, '', 1, '09988334455', '09988334455', NULL, '2021-02-09 07:30:13', '2021-02-09 07:30:13'),
(12, '0.00', 37, 'Komal Test', NULL, 'Panchkula', '', 'Chandigarh', '123456', 'Jammu and Kashmir', 'India', '', 'abc211@gmail.com', NULL, 'Komal Test', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Jammu and Kashmir', 'India', NULL, 'Komal Test', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Jammu and Kashmir', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-09 07:35:22', '2021-02-09 07:35:22', NULL, 'Rs', NULL, '610.00', '10.00', 'Shipping By Weight', NULL, '[]', 0, '', 0.00, '', '', '', 0, '', 1, '09988334455', '09988334455', NULL, '2021-02-09 07:35:22', '2021-02-09 07:35:22'),
(13, '0.00', 37, 'Komal Test', NULL, 'Panchkula', '', 'Chandigarh', '123456', 'Jammu and Kashmir', 'India', '', 'abc211@gmail.com', NULL, 'Komal Test', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Jammu and Kashmir', 'India', NULL, 'Komal Test', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Jammu and Kashmir', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-09 07:38:28', '2021-02-09 07:38:28', NULL, 'Rs', NULL, '610.00', '10.00', 'Shipping By Weight', NULL, '[]', 0, '', 0.00, '', '', '', 0, '', 1, '09988334455', '09988334455', NULL, '2021-02-09 07:38:28', '2021-02-09 07:38:28'),
(14, '0.00', 37, 'Komal Test', NULL, 'Panchkula', '', 'Chandigarh', '123456', 'Jammu and Kashmir', 'India', '', 'abc211@gmail.com', NULL, 'Komal Test', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Jammu and Kashmir', 'India', NULL, 'Komal Test', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Jammu and Kashmir', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-09 07:43:00', '2021-02-09 07:43:00', NULL, 'Rs', NULL, '610.00', '10.00', 'Shipping By Weight', NULL, '[]', 1, '', 0.00, '', '', '', 0, '', 1, '09988334455', '09988334455', NULL, '2021-02-09 07:43:00', '2021-02-09 07:43:50'),
(15, '18.39', 23, 'seafood seefood', NULL, 'adsasdf', '', 'Panchkulasdasdfa', '134109', 'Haryana', 'India', '', 'admin@gmail.com', NULL, 'seafood seefood', 'Allroundfix LLC', 'adsasdf', '', 'Panchkulasdasdfa', '134109', 'Haryana', 'India', NULL, 'seafood seefood', 'Allroundfix LLC', 'adsasdf', '', 'Panchkulasdasdfa', '134109', 'Haryana', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-09 10:09:16', '2021-02-09 10:09:16', NULL, 'Rs', NULL, '272.29', '70.00', 'Shipping By Weight', NULL, '[]', 0, '', 0.00, '', '', '', 0, '', 1, '09041065990', '09041065990', NULL, '2021-02-09 10:09:16', '2021-02-09 10:09:16'),
(16, '18.39', 23, 'seafood seefood', NULL, 'adsasdf', '', 'Panchkulasdasdfa', '134109', 'Haryana', 'India', '', 'admin@gmail.com', NULL, 'seafood seefood', 'Allroundfix LLC', 'adsasdf', '', 'Panchkulasdasdfa', '134109', 'Haryana', 'India', NULL, 'seafood seefood', 'Allroundfix LLC', 'adsasdf', '', 'Panchkulasdasdfa', '134109', 'Haryana', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-09 10:09:17', '2021-02-09 10:09:17', NULL, 'Rs', NULL, '212.29', '10.00', 'Shipping By Weight', NULL, '[]', 0, '', 0.00, '', '', '', 0, '', 1, '09041065990', '09041065990', NULL, '2021-02-09 10:09:17', '2021-02-09 10:09:17'),
(17, '0.00', 0, 'wave wave', NULL, 'adsasdf', '', 'Namsai', '134109', 'Arunachal Pradesh', 'India', '', 'waveinfotech.biz@gmail.com', NULL, 'wave wave', 'Allroundfix LLC', 'adsasdf', '', 'Namsai', '134109', 'Arunachal Pradesh', 'India', NULL, 'wave wave', 'Allroundfix LLC', 'adsasdf', '', 'Namsai', '134109', 'Arunachal Pradesh', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-09 12:17:47', '2021-02-09 12:17:47', NULL, 'Rs', NULL, '66.99', '10.00', 'Shipping By Weight', NULL, '[]', 0, '', 0.00, '', '', '', 0, '', 1, '09041065990', '09041065990', NULL, '2021-02-09 12:17:47', '2021-02-09 12:17:47'),
(18, '12.30', 0, 'Komal Burman', NULL, 'Panchkula', '', 'Chandigarh', '123456', 'Haryana', 'India', '', 'komal2492@yopmail.com', NULL, 'Komal Burman', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Haryana', 'India', NULL, 'Komal Burman', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Haryana', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-09 12:37:22', '2021-02-09 12:37:22', NULL, 'Rs', NULL, '205.30', '70.00', 'Shipping By Weight', NULL, '[]', 1, '', 0.00, '', '', '', 0, '', 1, '09988334455', '09988334455', NULL, '2021-02-09 12:37:22', '2021-02-09 12:52:45'),
(19, '0.00', 0, 'Komal Test asddff', NULL, 'Panchkula', '', 'Chandigarh', '123456', 'Jharkhand', 'India', '', 'abc211@gmail.com', NULL, 'Komal Test asddff', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Jharkhand', 'India', NULL, 'Komal Test asddff', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Jharkhand', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-09 12:47:26', '2021-02-09 12:47:26', NULL, 'Rs', NULL, '100.00', '50.00', 'Shipping By Weight', NULL, '[]', 0, '', 0.00, '', '', '', 0, '', 1, '09988334455', '09988334455', NULL, '2021-02-09 12:47:26', '2021-02-09 12:47:26'),
(20, '7.80', 37, 'Komal Burman', NULL, 'Panchkula', '', 'Chandigarh', '123456', 'Chandigarh', 'India', '', 'komal2492@yopmail.com', NULL, 'Komal Burman', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Chandigarh', 'India', NULL, 'Komal Burman', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Chandigarh', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-10 04:36:18', '2021-02-10 04:36:18', NULL, 'Rs', NULL, '233.80', '70.00', 'Shipping By Weight', NULL, '[]', 1, '', 0.00, '', '', '', 0, '', 1, '09988334455', '09988334455', NULL, '2021-02-10 04:36:18', '2021-02-10 04:37:59'),
(21, '0.00', 37, 'Test Test', NULL, 'Panchkula', '', 'Chandigarh', '123456', 'Lakshadweep', 'India', '', 'komal2492@yopmail.com', NULL, 'Test Test', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Lakshadweep', 'India', NULL, 'Test Test', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Lakshadweep', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-10 09:36:39', '2021-02-10 09:36:39', NULL, 'Rs', NULL, '190.00', '70.00', 'Shipping By Weight', NULL, '[]', 1, '', 0.00, '', '', '', 0, '', 1, '09988334455', '09988334455', NULL, '2021-02-10 09:36:39', '2021-02-10 09:37:01'),
(22, '0.00', 37, 'Komal Test TEST', NULL, 'Panchkula', '', 'Chandigarh', '123456', 'Karnataka', 'India', '', 'komal2492@yopmail.com', NULL, 'Komal Test TEST', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Karnataka', 'India', NULL, 'Komal Test TEST', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Karnataka', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-10 12:44:08', '2021-02-10 12:44:08', NULL, 'Rs', NULL, '100.00', '50.00', 'Shipping By Weight', NULL, '[]', 1, '', 0.00, '', '', '', 0, '', 1, '09988334455', '09988334455', NULL, '2021-02-10 12:44:08', '2021-02-10 12:44:20'),
(23, '5.70', 23, 'jagriti seefood', NULL, 'wavee', '', 'Panchkula', '134109', 'Haryana', 'India', '', 'admin@gmail.com', NULL, 'jagriti seefood', 'Mndcube', 'wavee', '', 'Panchkula', '134109', 'Haryana', 'India', NULL, 'jagriti seefood', 'Mndcube', 'wavee', '', 'Panchkula', '134109', 'Haryana', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-10 12:51:31', '2021-02-10 12:51:31', NULL, 'Rs', NULL, '132.69', '70.00', 'Shipping By Weight', NULL, '[]', 0, '', 0.00, '', '', '', 0, '', 1, '09068920822', '09068920822', NULL, '2021-02-10 12:51:31', '2021-02-10 12:51:31'),
(24, '0.00', 37, 'Komal Test Komal Test', NULL, 'Panchkula', '', 'Chandigarh', '123456', 'Maharashtra', 'India', '', 'komal2492@yopmail.com', NULL, 'Komal Test Komal Test', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Maharashtra', 'India', NULL, 'Komal Test Komal Test', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Maharashtra', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-11 06:45:51', '2021-02-11 06:45:51', NULL, 'Rs', NULL, '310.00', '10.00', 'Shipping By Weight', NULL, '[]', 1, '', 0.00, '', '', '', 0, '', 1, '09988334455', '09988334455', NULL, '2021-02-11 06:45:51', '2021-02-11 06:46:19'),
(25, '31.20', 37, 'Komal Test Komal Test', NULL, 'Panchkula', '', 'Chandigarh', '123456', 'Haryana', 'India', '', 'komal2492@yopmail.com', NULL, 'Komal Test Komal Test', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Haryana', 'India', NULL, 'Komal Test Komal Test', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Haryana', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-11 06:53:44', '2021-02-11 06:53:44', NULL, 'Rs', NULL, '413.20', '70.00', 'Shipping By Weight', NULL, '[]', 1, '', 0.00, '', '', '', 0, '', 1, '09988334455', '09988334455', NULL, '2021-02-11 06:53:44', '2021-02-11 07:08:30'),
(26, '0.00', 32, 'wave wave wave wave', NULL, 'adsasdf', '', 'Namsai', '134109', 'Lakshadweep', 'India', '', 'waveinfotech.biz@gmail.com', NULL, 'wave wave wave wave', 'Allroundfix LLC', 'adsasdf', '', 'Namsai', '134109', 'Lakshadweep', 'India', NULL, 'wave wave wave wave', 'Allroundfix LLC', 'adsasdf', '', 'Namsai', '134109', 'Lakshadweep', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-11 10:06:21', '2021-02-11 10:06:21', NULL, 'Rs', NULL, '100.00', '50.00', 'Shipping By Weight', NULL, '[]', 1, '', 0.00, '', '', '', 0, '', 1, '09041065990', '09041065990', NULL, '2021-02-11 10:06:21', '2021-02-11 12:55:43'),
(27, '0.00', 37, 'Komal Test Komal Test', NULL, 'Panchkula', '', 'Chandigarh', '123456', 'Karnataka', 'India', '', 'komal2492@yopmail.com', NULL, 'Komal Test Komal Test', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Karnataka', 'India', NULL, 'Komal Test Komal Test', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Karnataka', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-11 10:09:14', '2021-02-11 10:09:14', NULL, 'Rs', NULL, '263.00', '70.00', 'Shipping By Weight', NULL, '[]', 0, '', 0.00, '', '', '', 0, '', 1, '09988334455', '09988334455', NULL, '2021-02-11 10:09:14', '2021-02-11 10:09:14'),
(28, '0.00', 37, 'Komal Test Komal Test', NULL, 'Panchkula', '', 'Chandigarh', '123456', 'Kerala', 'India', '', 'komal2492@yopmail.com', NULL, 'Komal Test Komal Test', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Kerala', 'India', NULL, 'Komal Test Komal Test', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Kerala', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-11 12:00:38', '2021-02-11 12:00:38', NULL, 'Rs', NULL, '193.00', '70.00', 'Shipping By Weight', NULL, '[]', 1, '', 0.00, '', '', '', 0, '', 1, '09988334455', '09988334455', NULL, '2021-02-11 12:00:38', '2021-02-11 12:18:37'),
(29, '0.00', 37, 'Komal Test Komal Test', NULL, 'Panchkula', '', 'Chandigarh', '123456', 'Goa', 'India', '', 'komal2492@yopmail.com', NULL, 'Komal Test Komal Test', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Goa', 'India', NULL, 'Komal Test Komal Test', 'Wave Infotech', 'Panchkula', '', 'Chandigarh', '123456', 'Goa', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-11 12:28:55', '2021-02-11 12:28:55', NULL, 'Rs', NULL, '193.00', '70.00', 'Shipping By Weight', NULL, '[]', 1, '', 0.00, '', '', '', 0, '', 1, '09988334455', '09988334455', NULL, '2021-02-11 12:28:55', '2021-02-11 12:55:24'),
(30, '15.60', 38, 'test test', NULL, 'test', '', 'panchkula', '134109', 'Haryana', 'India', '', 'pratiksha.wave@gmail.com', NULL, 'test test', 'test', 'test', '', 'panchkula', '134109', 'Haryana', 'India', NULL, 'test test', 'test', 'test', '', 'panchkula', '134109', 'Haryana', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-18 04:56:58', '2021-02-18 04:56:58', NULL, 'Rs', NULL, '181.60', '10.00', 'Shipping By Weight', NULL, '[]', 1, '', 0.00, '', '', '', 0, '', 1, '0172-123456', '0172-123456', NULL, '2021-02-18 04:56:58', '2021-02-18 05:00:03'),
(31, '0.00', 32, 'waveinfotech seefood', NULL, 'adsasdf', '', 'Panchkulasdasdfa', '134109', 'Haryana', 'India', '', 'waveinfotech.biz@gmail.com', NULL, 'waveinfotech seefood', 'Allroundfix LLC', 'adsasdf', '', 'Panchkulasdasdfa', '134109', 'Haryana', 'India', NULL, 'waveinfotech seefood', 'Allroundfix LLC', 'wave infotech sco 44 sector 5 mdc panchkula', '', 'Namsai', '134109', 'Arunachal Pradesh', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-23 08:13:03', '2021-02-23 08:13:03', NULL, 'Rs', NULL, '226.00', '70.00', 'Shipping By Weight', NULL, '[]', 0, '', 0.00, '', '', '', 0, '', 1, '09041065990', '09068920822', NULL, '2021-02-23 08:13:03', '2021-02-23 08:13:03'),
(32, '0.00', 0, 'seafood seefood', NULL, 'adsasdf', '', 'Panchkulasdasdfa', '134109', 'Arunachal Pradesh', 'India', '', 'admin@gmail.com', NULL, 'seafood seefood', 'Allroundfix LLC', 'adsasdf', '', 'Panchkulasdasdfa', '134109', 'Arunachal Pradesh', 'India', NULL, 'seafood seefood', 'Allroundfix LLC', 'adsasdf', '', 'Panchkulasdasdfa', '134109', 'Arunachal Pradesh', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-23 08:19:19', '2021-02-23 08:19:19', NULL, 'Rs', NULL, '100.00', '50.00', 'Shipping By Weight', NULL, '[]', 0, '', 0.00, '', '', '', 0, '', 1, '09041065990', '09041065990', NULL, '2021-02-23 08:19:19', '2021-02-23 08:19:19'),
(33, '0.00', 44, 'wave wave', NULL, 'adsasdf', '', 'Namsai', '134109', 'Arunachal Pradesh', 'India', '', 'waveinfotech.biz78787@gmail.com', NULL, 'wave wave', 'Allroundfix LLC', 'adsasdf', '', 'Namsai', '134109', 'Arunachal Pradesh', 'India', NULL, 'wave wave', 'Allroundfix LLC', 'adsasdf', '', 'Namsai', '134109', 'Arunachal Pradesh', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-23 09:00:21', '2021-02-23 09:00:21', NULL, 'Rs', NULL, '483.98', '70.00', 'Shipping By Weight', NULL, '[]', 0, '', 0.00, '', '', '', 0, '', 1, '+919041065990', '+919041065990', NULL, '2021-02-23 09:00:21', '2021-02-23 09:00:21'),
(34, '0.00', 45, 'seafood seefood', NULL, 'adsasdf', '', 'Delhi', '134109', 'Delhi', 'India', '', 'komal2409@yopmail.com', NULL, 'seafood seefood', 'Allroundfix LLC', 'adsasdf', '', 'Delhi', '134109', 'Delhi', 'India', NULL, 'seafood seefood', 'Allroundfix LLC', 'adsasdf', '', 'Delhi', '134109', 'Delhi', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-23 09:06:56', '2021-02-23 09:06:56', NULL, 'Rs', NULL, '100.00', '50.00', 'Shipping By Weight', NULL, '[]', 0, '', 0.00, '', '', '', 0, '', 1, '09041065990', '09041065990', NULL, '2021-02-23 09:06:56', '2021-02-23 09:06:56'),
(35, '0.00', 46, 'waveinfotech seefood', NULL, 'wave infotech sco 44 sector 5 mdc panchkula', '', 'Namsai', '134109', 'Arunachal Pradesh', 'India', '', 'smartpraveenrai@gmail.com', NULL, 'waveinfotech seefood', 'Allroundfix LLC', 'wave infotech sco 44 sector 5 mdc panchkula', '', 'Namsai', '134109', 'Arunachal Pradesh', 'India', NULL, 'waveinfotech seefood', 'Allroundfix LLC', 'wave infotech sco 44 sector 5 mdc panchkula', '', 'Namsai', '134109', 'Arunachal Pradesh', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-23 09:58:40', '2021-02-23 09:58:40', NULL, 'Rs', NULL, '190.00', '70.00', 'Shipping By Weight', NULL, '[]', 0, '', 0.00, '', '', '', 0, '', 1, '09068920822', '09068920822', NULL, '2021-02-23 09:58:40', '2021-02-23 09:58:40'),
(36, '29.68', 47, 'Komal Burman', NULL, 'TEST', '', 'TEST', '123456', 'Haryana', 'India', '', 'komal24@yopmail.com', NULL, 'Komal Burman', 'wave infotech', 'TEST', '', 'TEST', '123456', 'Haryana', 'India', NULL, 'Komal Burman', 'wave infotech', 'TEST', '', 'TEST', '123456', 'Haryana', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-26 05:30:13', '2021-02-26 05:30:13', NULL, 'Rs', NULL, '396.46', '70.00', 'Shipping By Weight', NULL, '[]', 0, '', 0.00, '', '', '', 0, '', 1, '9876543210', '9876543210', NULL, '2021-02-26 05:30:13', '2021-02-26 05:30:13'),
(37, '0.00', 47, 'Komal Burman Komal Burman', NULL, 'TEST', '', 'TEST', '123456', 'Bihar', 'India', '', 'komal24@yopmail.com', NULL, 'Komal Burman Komal Burman', 'wave infotech', 'TEST', '', 'TEST', '123456', 'Bihar', 'India', NULL, 'Komal Burman Komal Burman', 'wave infotech', 'TEST', '', 'TEST', '123456', 'Bihar', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-02-26 06:34:54', '2021-02-26 06:34:54', NULL, 'Rs', NULL, '140.00', '70.00', 'Shipping By Weight', NULL, '[]', 0, '', 0.00, '', '', '', 0, '', 1, '9876543210', '9876543210', NULL, '2021-02-26 06:34:54', '2021-02-26 06:34:54'),
(38, '0.00', 23, 'wave wave', NULL, 'adsasdf', '', 'Namsai', '134109', 'Arunachal Pradesh', 'India', '', 'admin@gmail.com', NULL, 'wave wave', 'Allroundfix LLC', 'adsasdf', '', 'Namsai', '134109', 'Arunachal Pradesh', 'India', NULL, 'wave wave', 'Allroundfix LLC', 'adsasdf', '', 'Namsai', '134109', 'Arunachal Pradesh', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-03-30 07:27:04', '2021-03-30 07:27:04', NULL, 'Rs', NULL, '100.00', '50.00', 'Shipping By Weight', NULL, '[]', 1, '', 0.00, '', '', '', 0, '', 1, '09041065990', '09041065990', NULL, '2021-03-30 07:27:04', '2021-06-04 07:38:51'),
(39, '8.50', 46, 'waveinfotech seefood waveinfotech seefood', NULL, 'wave infotech sco 44 sector 5 mdc panchkula', '', 'chandigarh', '134109', 'Chandigarh', 'India', '', 'smartpraveenrai@gmail.com', NULL, 'waveinfotech seefood waveinfotech seefood', 'Allroundfix LLC', 'wave infotech sco 44 sector 5 mdc panchkula', '', 'chandigarh', '134109', 'Chandigarh', 'India', NULL, 'waveinfotech seefood waveinfotech seefood', 'Allroundfix LLC', 'wave infotech sco 44 sector 5 mdc panchkula', '', 'chandigarh', '134109', 'Chandigarh', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-07-16 07:21:19', '2021-07-16 07:21:19', NULL, 'Rs', NULL, '248.50', '70.00', 'Shipping By Weight', NULL, '[]', 1, '', 0.00, '', '', '', 0, '', 1, '09068920822', '09068920822', NULL, '2021-07-16 07:21:19', '2021-07-22 07:25:04'),
(40, '8.50', 46, 'waveinfotech seefood waveinfotech seefood', NULL, 'wave infotech sco 44 sector 5 mdc panchkula', '', 'chandigarh', '134109', 'Chandigarh', 'India', '', 'smartpraveenrai@gmail.com', NULL, 'waveinfotech seefood waveinfotech seefood', 'Allroundfix LLC', 'wave infotech sco 44 sector 5 mdc panchkula', '', 'chandigarh', '134109', 'Chandigarh', 'India', NULL, 'waveinfotech seefood waveinfotech seefood', 'Allroundfix LLC', 'wave infotech sco 44 sector 5 mdc panchkula', '', 'chandigarh', '134109', 'Chandigarh', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-07-16 07:22:21', '2021-07-16 07:22:21', NULL, 'Rs', NULL, '188.50', '10.00', 'Shipping By Weight', NULL, '[]', 1, '', 0.00, '', '', '', 0, '', 1, '09068920822', '09068920822', NULL, '2021-07-16 07:22:21', '2021-07-16 07:23:41'),
(41, '23.50', 49, 'Rajlaxmi Kairamkonda', NULL, 'A wing, 3rd floor, Falt no 23, Gajraj apartment, behind linen king, Kashinath Patil Nagar, Dhankwadi, Pune 411043', '', 'Pune', '134109', 'Chandigarh', 'India', '', 'shilpa.jadhav@iping.in', NULL, 'Rajlaxmi Kairamkonda', 'iPing Data Labs', 'A wing, 3rd floor, Falt no 23, Gajraj apartment, behind linen king, Kashinath Patil Nagar, Dhankwadi, Pune 411043', '', 'Pune', '134109', 'Chandigarh', 'India', NULL, 'Rajlaxmi Kairamkonda', 'iPing Data Labs', 'A wing, 3rd floor, Falt no 23, Gajraj apartment, behind linen king, Kashinath Patil Nagar, Dhankwadi, Pune 411043', '', 'Pune', '134109', 'Chandigarh', 'India', 0, 'Cash on Delivery', '', '', '', '', '2021-07-22 11:46:30', '2021-07-22 11:46:30', NULL, 'Rs', NULL, '563.50', '70.00', 'Shipping By Weight', NULL, '[]', 1, '', 0.00, '', '', '', 0, '', 1, '09545447017', '09545447017', NULL, '2021-07-22 11:46:30', '2021-07-22 11:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `orders_products_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `type` int(11) DEFAULT 1,
  `products_model` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_price` decimal(15,2) NOT NULL,
  `final_price` decimal(15,2) NOT NULL,
  `products_tax` decimal(7,0) NOT NULL,
  `products_quantity` int(11) NOT NULL,
  `returned` int(1) NOT NULL DEFAULT 0 COMMENT '0-no 1-requested 2-approved'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`orders_products_id`, `orders_id`, `products_id`, `type`, `products_model`, `products_name`, `products_price`, `final_price`, `products_tax`, `products_quantity`, `returned`) VALUES
(1, 1, 29, 1, NULL, 'Alternative Spirituality', '50.00', '100.00', '1', 2, 0),
(2, 1, 23, 1, NULL, 'The Fault in Our Stars Paperback – April 8, 2014', '300.00', '300.00', '1', 1, 0),
(3, 2, 29, 1, NULL, 'Alternative Spirituality', '50.00', '50.00', '1', 1, 0),
(4, 2, 23, 1, NULL, 'The Fault in Our Stars Paperback – April 8, 2014', '300.00', '300.00', '1', 1, 0),
(5, 2, 24, 1, NULL, 'The Giver Paperback – January 24, 2006', '300.00', '300.00', '1', 1, 0),
(6, 3, 8, 1, NULL, 'A Long Way Gone: Memoirs of a Boy Soldier Paperback – August 5,', '156.00', '156.00', '1', 1, 0),
(7, 3, 6, 1, NULL, 'A Brief History of Time Paperback – Illustrated, September 1, 19', '156.00', '156.00', '1', 1, 0),
(8, 3, 2, 1, NULL, 'Men’s Sports Runnning Swim Board Shorts', '56.99', '56.99', '1', 1, 0),
(9, 3, 13, 1, NULL, 'Fear and Loathing in Las Vegas: A Savage Journey to the Heart of', '56.99', '56.99', '1', 1, 0),
(10, 3, 22, 1, NULL, 'The Diary of a Young Girl Hardcover – October 19, 2010', '56.99', '56.99', '1', 1, 0),
(11, 4, 29, 1, NULL, 'Alternative Spirituality', '50.00', '200.00', '1', 4, 0),
(12, 4, 10, 1, NULL, 'Diary of a Wimpy Kid, Book 1 Hardcover – April 1, 2007', '180.00', '360.00', '1', 2, 0),
(13, 4, 9, 1, NULL, 'The Bad Beginning: Or, Orphans! (A Series of Unfortunate Events,', '400.00', '800.00', '1', 2, 0),
(14, 4, 22, 1, NULL, 'The Diary of a Young Girl Hardcover – October 19, 2010', '56.99', '113.98', '1', 2, 0),
(15, 5, 23, 1, NULL, 'The Fault in Our Stars Paperback – April 8, 2014', '300.00', '300.00', '1', 1, 0),
(16, 6, 19, 1, NULL, 'Of Human Bondage (Bantam Classics) Mass Market Paperback – June', '300.00', '300.00', '1', 1, 0),
(17, 6, 1, 2, NULL, 'Aldous Huxley and Alternative Spirituality', '36.78', '36.78', '1', 1, 0),
(18, 7, 9, 1, NULL, 'The Bad Beginning: Or, Orphans! (A Series of Unfortunate Events,', '400.00', '400.00', '1', 1, 0),
(19, 8, 24, 1, NULL, 'The Giver Paperback – January 24, 2006', '300.00', '300.00', '1', 1, 0),
(20, 9, 24, 1, NULL, 'The Giver Paperback – January 24, 2006', '300.00', '300.00', '1', 1, 0),
(21, 11, 24, 1, NULL, 'The Giver Paperback – January 24, 2006', '300.00', '600.00', '1', 2, 0),
(22, 15, 17, 1, NULL, 'Midnight\'s Children: A Novel (Modern Library 100 Best Novels) Pa', '36.78', '183.90', '1', 5, 0),
(23, 17, 16, 1, NULL, 'Middlesex: A Novel (Oprah\'s Book Club) Paperback – June 5, 2002', '56.99', '56.99', '1', 1, 0),
(24, 18, 32, 1, NULL, 'Test Product 2', '123.00', '123.00', '1', 1, 0),
(25, 19, 29, 1, NULL, 'Alternative Spirituality', '50.00', '50.00', '1', 1, 0),
(26, 20, 21, 1, NULL, 'The Devil in the White City: Murder, Magic, and Madness at the F', '156.00', '156.00', '1', 1, 0),
(27, 21, 29, 1, NULL, 'Alternative Spirituality', '50.00', '50.00', '1', 1, 0),
(28, 21, 31, 1, NULL, 'Test', '70.00', '70.00', '1', 1, 0),
(29, 22, 29, 1, NULL, 'Alternative Spirituality', '50.00', '50.00', '1', 1, 0),
(30, 23, 18, 1, NULL, 'Moneyball: The Art of Winning an Unfair Game Paperback – March 1', '56.99', '56.99', '1', 1, 0),
(31, 24, 24, 1, NULL, 'The Giver Paperback – January 24, 2006', '300.00', '300.00', '1', 1, 0),
(32, 25, 21, 1, NULL, 'The Devil in the White City: Murder, Magic, and Madness at the F', '156.00', '312.00', '1', 2, 0),
(33, 26, 29, 1, NULL, 'Alternative Spirituality', '50.00', '50.00', '1', 1, 0),
(34, 27, 32, 1, NULL, 'Test Product 2', '123.00', '123.00', '1', 0, 0),
(35, 27, 31, 1, NULL, 'Test', '70.00', '70.00', '1', 0, 0),
(37, 29, 32, 1, NULL, 'Test Product 2', '123.00', '123.00', '1', 0, 0),
(38, 30, 3, 1, NULL, 'Alternative Spirituality', '156.00', '156.00', '1', 1, 0),
(39, 31, 20, 1, NULL, 'The Corrections: A Novel Paperback – September 1, 2002', '156.00', '156.00', '1', 1, 0),
(40, 32, 29, 1, NULL, 'Alternative Spirituality', '50.00', '50.00', '1', 1, 0),
(41, 33, 16, 1, NULL, 'Middlesex: A Novel (Oprah\'s Book Club) Paperback – June 5, 2002', '56.99', '56.99', '1', 1, 0),
(42, 33, 22, 1, NULL, 'The Diary of a Young Girl Hardcover – October 19, 2010', '56.99', '56.99', '1', 1, 0),
(43, 33, 24, 1, NULL, 'The Giver Paperback – January 24, 2006', '300.00', '300.00', '1', 1, 0),
(44, 34, 29, 1, NULL, 'Alternative Spirituality', '50.00', '50.00', '1', 1, 0),
(45, 35, 29, 1, NULL, 'Alternative Spirituality', '50.00', '50.00', '1', 1, 0),
(46, 35, 31, 1, NULL, 'Test', '70.00', '70.00', '1', 1, 0),
(47, 36, 29, 1, NULL, 'Alternative Spirituality', '50.00', '50.00', '1', 0, 0),
(48, 36, 17, 1, NULL, 'Midnight\'s Children: A Novel (Modern Library 100 Best Novels) Pa', '36.78', '36.78', '1', 0, 0),
(49, 36, 31, 1, NULL, 'Test', '70.00', '210.00', '1', 0, 0),
(50, 37, 31, 1, NULL, 'Test', '70.00', '70.00', '1', 1, 0),
(51, 38, 29, 1, NULL, 'Alternative Spirituality', '50.00', '50.00', '1', 1, 0),
(52, 39, 29, 1, NULL, 'Alternative Spirituality', '50.00', '100.00', '1', 0, 0),
(53, 39, 31, 1, NULL, 'Test', '70.00', '70.00', '1', 0, 0),
(54, 41, 31, 1, NULL, 'Test', '70.00', '70.00', '1', 0, 0),
(55, 41, 9, 1, NULL, 'The Bad Beginning: Or, Orphans! (A Series of Unfortunate Events,', '400.00', '400.00', '1', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders_products_attributes`
--

CREATE TABLE `orders_products_attributes` (
  `orders_products_attributes_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `orders_products_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `products_options` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_options_values` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options_values_price` decimal(15,2) NOT NULL,
  `price_prefix` char(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_products_download`
--

CREATE TABLE `orders_products_download` (
  `orders_products_download_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL DEFAULT 0,
  `orders_products_id` int(11) NOT NULL DEFAULT 0,
  `orders_products_filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `download_maxdays` int(11) NOT NULL DEFAULT 0,
  `download_count` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_status`
--

CREATE TABLE `orders_status` (
  `orders_status_id` int(11) NOT NULL,
  `public_flag` int(11) DEFAULT 0,
  `downloads_flag` int(11) DEFAULT 0,
  `role_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_status`
--

INSERT INTO `orders_status` (`orders_status_id`, `public_flag`, `downloads_flag`, `role_id`) VALUES
(1, 0, 0, 2),
(2, 0, 0, 2),
(3, 0, 0, 2),
(4, 0, 0, 2),
(5, 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders_status_description`
--

CREATE TABLE `orders_status_description` (
  `orders_status_description_id` int(11) NOT NULL,
  `orders_status_id` int(11) NOT NULL,
  `orders_status_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_status_description`
--

INSERT INTO `orders_status_description` (`orders_status_description_id`, `orders_status_id`, `orders_status_name`, `language_id`) VALUES
(1, 1, 'Pending', 1),
(2, 2, 'Completed', 1),
(3, 3, 'Cancel', 1),
(4, 4, 'Return', 1),
(5, 5, 'Processed', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_status_history`
--

CREATE TABLE `orders_status_history` (
  `orders_status_history_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `orders_status_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  `customer_notified` int(11) DEFAULT 0,
  `comments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_status_history`
--

INSERT INTO `orders_status_history` (`orders_status_history_id`, `orders_id`, `orders_status_id`, `date_added`, `customer_notified`, `comments`) VALUES
(1, 1, 1, '2020-11-05 09:05:01', 1, 'notes'),
(2, 2, 1, '2020-11-05 09:46:32', 1, ''),
(3, 1, 2, '2020-11-05 09:47:46', 1, NULL),
(4, 1, 1, '2020-11-05 09:51:22', 1, NULL),
(5, 1, 2, '2020-11-05 09:51:27', 1, NULL),
(6, 1, 1, '2020-11-05 09:58:38', 1, NULL),
(7, 1, 2, '2020-11-05 09:59:33', 1, NULL),
(8, 2, 2, '2020-11-05 09:59:54', 1, NULL),
(9, 2, 1, '2020-11-05 10:02:57', 1, NULL),
(10, 2, 3, '2020-11-05 10:03:18', 1, NULL),
(11, 1, 4, '2020-11-05 10:03:37', 1, NULL),
(12, 1, 2, '2020-11-05 10:05:09', 1, NULL),
(13, 2, 1, '2020-11-05 10:05:41', 1, NULL),
(14, 1, 1, '2020-11-06 06:44:47', 1, NULL),
(15, 1, 2, '2020-11-06 06:45:05', 1, NULL),
(16, 3, 1, '2020-11-06 07:01:04', 1, ''),
(17, 4, 1, '2020-11-07 06:03:36', 1, 'Test'),
(18, 5, 1, '2020-12-11 12:36:36', 1, ''),
(19, 5, 3, '2021-01-04 09:16:28', 1, NULL),
(20, 6, 1, '2021-01-06 09:52:11', 1, ''),
(21, 7, 1, '2021-01-19 07:00:06', 1, ''),
(22, 8, 1, '2021-01-19 07:01:14', 1, ''),
(23, 9, 1, '2021-02-09 07:28:47', 1, ''),
(24, 10, 1, '2021-02-09 07:29:53', 1, ''),
(25, 11, 1, '2021-02-09 07:30:12', 1, 'Test'),
(26, 12, 1, '2021-02-09 07:35:22', 1, 'Test'),
(27, 13, 1, '2021-02-09 07:38:28', 1, 'Test'),
(28, 14, 1, '2021-02-09 07:43:00', 1, 'Test'),
(29, 15, 1, '2021-02-09 10:09:16', 1, ''),
(30, 16, 1, '2021-02-09 10:09:17', 1, ''),
(31, 17, 1, '2021-02-09 12:17:47', 1, ''),
(32, 18, 1, '2021-02-09 12:37:22', 1, 'This is for testing purpose.'),
(33, 18, 2, '2021-02-09 12:39:54', 1, NULL),
(34, 18, 2, '2021-02-09 12:42:27', 1, NULL),
(35, 18, 2, '2021-02-09 12:42:50', 1, NULL),
(36, 19, 1, '2021-02-09 12:47:26', 1, ''),
(37, 18, 2, '2021-02-09 12:48:12', 1, NULL),
(38, 18, 2, '2021-02-09 12:48:30', 1, NULL),
(39, 18, 2, '2021-02-09 12:50:22', 1, NULL),
(40, 19, 2, '2021-02-09 12:52:17', 1, NULL),
(41, 17, 2, '2021-02-10 04:33:39', 1, NULL),
(42, 14, 2, '2021-02-10 04:34:15', 1, NULL),
(43, 20, 1, '2021-02-10 04:36:18', 1, '17 Queen St, Southbank, Melbourne, Australia\r\nteamwavechd@gmail.com17 Queen St, Southbank, Melbourne, Australia\r\nteamwavechd@gmail.com'),
(44, 20, 2, '2021-02-10 04:38:12', 1, NULL),
(45, 21, 1, '2021-02-10 09:36:39', 1, ''),
(46, 21, 2, '2021-02-10 09:37:07', 1, NULL),
(47, 22, 1, '2021-02-10 12:44:08', 1, ''),
(48, 22, 2, '2021-02-10 12:44:47', 1, NULL),
(49, 23, 1, '2021-02-10 12:51:31', 1, ''),
(50, 21, 4, '2021-02-11 05:06:45', 1, ''),
(51, 22, 4, '2021-02-11 05:29:48', 1, ''),
(52, 21, 4, '2021-02-11 05:30:24', 1, ''),
(53, 21, 4, '2021-02-11 05:32:43', 1, ''),
(54, 21, 4, '2021-02-11 05:32:49', 1, ''),
(55, 21, 4, '2021-02-11 05:34:26', 1, ''),
(56, 22, 4, '2021-02-11 05:36:28', 1, ''),
(57, 24, 1, '2021-02-11 06:45:51', 1, ''),
(58, 24, 2, '2021-02-11 06:46:37', 1, NULL),
(59, 24, 4, '2021-02-11 06:47:26', 1, ''),
(60, 25, 1, '2021-02-11 06:53:44', 1, ''),
(61, 25, 2, '2021-02-11 07:08:43', 1, 'Completed!!'),
(62, 26, 1, '2021-02-11 10:06:21', 1, ''),
(63, 27, 1, '2021-02-11 10:09:14', 1, ''),
(64, 26, 4, '2021-02-11 12:00:10', 1, ''),
(65, 28, 1, '2021-02-11 12:00:38', 1, ''),
(66, 28, 3, '2021-02-11 12:26:46', 1, ''),
(67, 29, 1, '2021-02-11 12:28:55', 1, ''),
(68, 29, 3, '2021-02-11 12:33:10', 1, ''),
(69, 29, 3, '2021-02-11 12:33:24', 1, ''),
(70, 29, 3, '2021-02-11 12:37:13', 1, ''),
(71, 29, 3, '2021-02-11 12:37:53', 1, ''),
(72, 29, 3, '2021-02-11 12:38:05', 1, ''),
(73, 29, 3, '2021-02-11 12:40:12', 1, ''),
(74, 29, 3, '2021-02-11 12:49:59', 1, ''),
(75, 27, 3, '2021-02-11 12:52:37', 1, ''),
(76, 27, 3, '2021-02-11 12:54:36', 1, ''),
(77, 30, 1, '2021-02-18 04:56:57', 1, ''),
(78, 31, 1, '2021-02-23 08:13:03', 1, 'asdfasdfasdf'),
(79, 32, 1, '2021-02-23 08:19:19', 1, ''),
(80, 33, 1, '2021-02-23 09:00:21', 1, ''),
(81, 34, 1, '2021-02-23 09:06:56', 1, ''),
(82, 35, 1, '2021-02-23 09:58:40', 1, ''),
(83, 36, 1, '2021-02-26 05:30:13', 1, 'TEST'),
(84, 36, 3, '2021-02-26 05:31:05', 1, ''),
(85, 36, 3, '2021-02-26 05:31:08', 1, ''),
(86, 36, 3, '2021-02-26 05:31:17', 1, ''),
(87, 36, 3, '2021-02-26 05:31:19', 1, ''),
(88, 36, 3, '2021-02-26 05:35:56', 1, ''),
(89, 36, 3, '2021-02-26 05:49:12', 1, ''),
(90, 37, 1, '2021-02-26 06:34:54', 1, 'deded'),
(91, 38, 1, '2021-03-30 07:27:04', 1, ''),
(92, 39, 1, '2021-07-16 07:21:19', 1, ''),
(93, 40, 1, '2021-07-16 07:22:21', 1, ''),
(94, 40, 5, '2021-07-16 07:23:49', 1, NULL),
(95, 40, 2, '2021-07-16 07:24:43', 1, NULL),
(96, 39, 3, '2021-07-16 07:27:07', 1, ''),
(97, 39, 3, '2021-07-16 07:27:11', 1, ''),
(98, 39, 3, '2021-07-16 07:27:12', 1, ''),
(99, 39, 3, '2021-07-16 07:27:13', 1, ''),
(100, 39, 3, '2021-07-16 07:27:14', 1, ''),
(101, 39, 3, '2021-07-16 07:27:43', 1, ''),
(102, 41, 1, '2021-07-22 11:46:30', 1, ''),
(103, 41, 3, '2021-07-22 11:48:13', 1, ''),
(104, 41, 3, '2021-07-22 11:48:15', 1, ''),
(105, 41, 3, '2021-07-22 11:48:15', 1, ''),
(106, 41, 3, '2021-07-22 11:48:16', 1, ''),
(107, 41, 3, '2021-07-22 11:48:17', 1, ''),
(108, 41, 3, '2021-07-22 11:48:19', 1, ''),
(109, 41, 3, '2021-07-22 11:48:20', 1, ''),
(110, 41, 3, '2021-07-22 11:48:21', 1, ''),
(111, 41, 3, '2021-07-22 11:48:22', 1, ''),
(112, 41, 3, '2021-07-22 11:48:23', 1, ''),
(113, 41, 3, '2021-07-22 11:48:24', 1, ''),
(114, 41, 3, '2021-07-22 11:48:25', 1, ''),
(115, 41, 3, '2021-07-22 11:48:26', 1, ''),
(116, 41, 3, '2021-07-22 11:48:27', 1, ''),
(117, 41, 3, '2021-07-22 11:48:27', 1, ''),
(118, 41, 3, '2021-07-22 11:48:28', 1, ''),
(119, 41, 3, '2021-07-22 11:48:29', 1, ''),
(120, 41, 3, '2021-07-22 11:48:30', 1, ''),
(121, 41, 3, '2021-07-22 11:48:31', 1, ''),
(122, 41, 3, '2021-07-22 11:48:32', 1, ''),
(123, 41, 3, '2021-07-22 11:48:33', 1, ''),
(124, 41, 3, '2021-07-22 11:48:34', 1, ''),
(125, 41, 3, '2021-07-22 11:51:34', 1, ''),
(126, 41, 3, '2021-07-22 11:51:34', 1, ''),
(127, 41, 3, '2021-07-22 11:51:35', 1, ''),
(128, 41, 3, '2021-07-22 11:51:36', 1, ''),
(129, 41, 3, '2021-07-22 11:54:50', 1, ''),
(130, 41, 3, '2021-07-22 11:54:51', 1, ''),
(131, 41, 3, '2021-07-22 11:54:52', 1, ''),
(132, 41, 3, '2021-07-22 11:54:52', 1, ''),
(133, 41, 3, '2021-07-22 11:54:53', 1, ''),
(134, 41, 3, '2021-07-22 11:54:54', 1, ''),
(135, 41, 3, '2021-07-22 11:54:54', 1, ''),
(136, 41, 3, '2021-07-22 11:54:55', 1, ''),
(137, 41, 3, '2021-07-22 11:54:56', 1, ''),
(138, 41, 3, '2021-07-22 11:54:56', 1, ''),
(139, 41, 4, '2021-07-22 11:56:12', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_total`
--

CREATE TABLE `orders_total` (
  `orders_total_id` int(10) UNSIGNED NOT NULL,
  `orders_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(15,4) NOT NULL,
  `class` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `type` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `slug`, `status`, `type`) VALUES
(5, 'privacy-policy', 1, 2),
(6, 'term-conditions', 1, 2),
(7, 'return-refund', 1, 2),
(8, 'about-us', 1, 2),
(11, 'home-page', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pages_description`
--

CREATE TABLE `pages_description` (
  `page_description_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages_description`
--

INSERT INTO `pages_description` (`page_description_id`, `name`, `description`, `language_id`, `page_id`) VALUES
(13, 'Privacy Policy', '<p><strong>Welcome to Apnamal.com</strong></p>\r\n\r\n<h3><strong>We connect millions of &nbsp;buyers and sellers around the world.</strong></h3>\r\n\r\n<p>Apnamal (&quot;APNAMAL&quot;) A Division of the brand apnamal.com&nbsp;and the website APNAMAL.COM&nbsp;(&quot;The Site&quot;) from ( respects your privacy. This Privacy Policy provides succinctly the manner your data is collected and used by APNAMAL on the Site. As a visitor to the Site/ Customer you are advised to please read the Privacy Policy carefully. By accessing the services provided by the Site you agree to the collection and use of your data by APNAMAL in the manner provided in this Privacy Policy.</p>\r\n\r\n<h3><strong>Eligibility</strong></h3>\r\n\r\n<p>Site would be available to only select geographies in India. Persons who are &quot;incompetent to contract&quot; within the meaning of the Indian Contract Act, 1872 including un-discharged insolvents etc. are not eligible to use the Site. If you are a minor i.e. under the age of 18 years but at least 13 years of age you may use the Site only under the supervision of a parent or legal guardian who agrees to be bound by these Terms of Use. If your age is below 18 years your parents or legal guardians can transact on behalf of you if they are registered users. You are prohibited from purchasing any material which is for adult consumption and the sale of which to minors is prohibited.</p>\r\n\r\n<h3><strong>Account &amp; Registration Obligations</strong></h3>\r\n\r\n<p>have to register and login for placing orders on the Site. You have to keep your account and registration details current and correct for communications related to your purchases from the site. By agreeing to the terms and conditions, the shopper agrees to receive promotional communication and newsletters upon registration. The customer can opt out either by unsubscribing in &quot;My Account&quot; or by contacting the customer service<strong>.</strong></p>\r\n\r\n<h3><strong>Pricing</strong></h3>\r\n\r\n<p>All the products listed on the Site will be sold at MRP unless otherwise specified. The prices mentioned at the time of ordering will be the prices charged on the date of the delivery. Although prices of most of the products do not fluctuate on a daily basis but some of the commodities and fresh food prices do change on a daily basis. In case the prices are higher or lower on the date of delivery not additional charges will be collected or refunded as the case may be at the time of the delivery of the order.</p>\r\n\r\n<p>&nbsp;</p>', 1, 5),
(16, 'Term & Condition', '<p><strong>Welcome to Apnamal.com</strong></p>\r\n\r\n<h3><strong>We connect millions of&nbsp; buyers and sellers around the world.</strong></h3>\r\n\r\n<p>APNAMAL (&quot;APNAMAL&quot;) A Division of the brand Apnamal.com and the website APNAMAL.COM (&quot;The Site&quot;) from ( respects your privacy. This Privacy Policy provides succinctly the manner your data is collected and used by APNAMAL&nbsp;on the Site. As a visitor to the Site/ Customer you are advised to please read the Privacy Policy carefully. By accessing the services provided by the Site you agree to the collection and use of your data by APNAMAL in the manner provided in this Privacy Policy.</p>\r\n\r\n<h3><strong>Eligibility</strong></h3>\r\n\r\n<p>Site would be available to only select geographies in India. Persons who are &quot;incompetent to contract&quot; within the meaning of the Indian Contract Act, 1872 including un-discharged insolvents etc. are not eligible to use the Site. If you are a minor i.e. under the age of 18 years but at least 13 years of age you may use the Site only under the supervision of a parent or legal guardian who agrees to be bound by these Terms of Use. If your age is below 18 years your parents or legal guardians can transact on behalf of you if they are registered users. You are prohibited from purchasing any material which is for adult consumption and the sale of which to minors is prohibited.</p>\r\n\r\n<h3><strong>Account &amp; Registration Obligations</strong></h3>\r\n\r\n<p>have to register and login for placing orders on the Site. You have to keep your account and registration details current and correct for communications related to your purchases from the site. By agreeing to the terms and conditions, the shopper agrees to receive promotional communication and newsletters upon registration. The customer can opt out either by unsubscribing in &quot;My Account&quot; or by contacting the customer service.</p>\r\n\r\n<h3><strong>Pricing</strong></h3>\r\n\r\n<p>All the products listed on the Site will be sold at MRP unless otherwise specified. The prices mentioned at the time of ordering will be the prices charged on the date of the delivery. Although prices of most of the products do not fluctuate on a daily basis but some of the commodities and fresh food prices do change on a daily basis. In case the prices are higher or lower on the date of delivery not additional charges will be collected or refunded as the case may be at the time of the delivery of the order.</p>', 1, 6),
(25, 'home page', '<p>Comic Book or Graphic Novel</p>\r\n\r\n<p>The stories in comic books and graphic novels are presented to the reader through engaging, sequential narrative art (illustrations and typography) that&#39;s either presented in a specific design or the traditional panel layout you find in comics. With both, you&#39;ll often find the dialogue presented in the tell-tale &quot;word balloons&quot; next to the respective characters.</p>\r\n\r\n<p>Meant to cause discomfort and fear for both the character and readers, horror writers often make use of supernatural and paranormal elements in morbid stories that are sometimes a little too realistic. The master of horror fiction? None other than Stephen King.</p>', 1, 11),
(19, 'Return & Refund', '<p><strong>Welcome to Apnamal.com</strong></p>\r\n\r\n<h3><strong>We connect millions of&nbsp; and sellers around the world.</strong></h3>\r\n\r\n<p>The refund policy applies to all payments sent to Apnamal website, services, or applications. You agree to this refund policy by signing up, accessing our website, application, services, or any product we offer on our website.</p>\r\n\r\n<p>Apnamal may amend or change any part of this refund policy with or without notification. The revised version will be available to everyone and published with an effective date. We will notify you ahead if we need to make an important change before the revised refund policy&#39;s effective date. You agree to have read, understood, and consent to all amendments.</p>\r\n\r\n<p>By using Apnamal, you accept that the local laws of your jurisdiction do not alter our refund policy. You solely agree to continue using Apnamal by agreeing to our refund policy; Otherwise, you can discontinue or unsubscribe.</p>\r\n\r\n<h3><strong>Purchases, subscriptions and&nbsp;opting in</strong></h3>\r\n\r\n<p>At Apnamal, all charges for in-app purchases are non-refundable. Also, there is no refund for partially used subscription period. But an exception for refund may be made for a Apnamal subscription within 14days of the transaction date or if the laws applicable in your jurisdiction provide for refund.</p>\r\n\r\n<h3>Requesting a&nbsp;refund</h3>\r\n\r\n<p>Even if you choose to cancel your Apnamal paid subscriptions within the first 3 days of subscribing, the refund process is still not easy. Requesting a refund usually takes time and effort, while non-refundable cancellations opting out of auto-renewal can be made in your account settings.</p>\r\n\r\n<p>Suppose you qualify for a refund using one of the methods below. In that case, Apnamal will process your request and return your money back as soon as they get notification of receipt of your cancellation. We cannot exactly say how long this will take.</p>\r\n\r\n<p>It gets more complicated if you subscribed through the a third-party. Therefore, all your requested funds should be directed to them and not Apnamal. Suppose you purchased the subscriptionIn that case, you only have 48hours after making payment to ask Apnamal for refunds.</p>\r\n\r\n<p>But, you can request a refund via:</p>\r\n\r\n<ul>\r\n	<li>DoNotPay&mdash;this works easily for residents of some states in the US and EU</li>\r\n	<li>Email&mdash;send us a mail via&nbsp;&nbsp; within 3days following the start of your subscription. Include the reason why you choose to cancel and your account information</li>\r\n</ul>\r\n\r\n<p>To request a refund from Apnamal:</p>\r\n\r\n<ul>\r\n	<li>Choose purchase/transaction history</li>\r\n	<li>Select the purchase/transaction you want your refund against</li>\r\n	<li>Select report problem</li>\r\n</ul>\r\n\r\n<h3>Technical issues</h3>\r\n\r\n<p>Apnamal will refund your money for payments executed accidentally or third parties&#39; technical issues. We may compensate you for downtimes in paid features by extending your subscription.</p>\r\n\r\n<p>We do not refund money for technical issues other than wrong payments.</p>', 1, 7),
(22, 'About Us', '<h3><strong>Welcome to apnamal.com</strong></h3>\r\n\r\n<p><strong>We are Apnamal.com We&rsquo;re a young start-up that work for your needs in fitness and well-being. We deliver everything from genuine at honest prices.</strong></p>\r\n\r\n<p><strong>Apnamal always try toprovide the best because we are nothing without you. You make us proud. We are helping thousands of People for their preparation.</strong></p>', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `payment_description`
--

CREATE TABLE `payment_description` (
  `id` int(11) NOT NULL,
  `payment_methods_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` int(11) NOT NULL,
  `sub_name_1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_name_2` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_description`
--

INSERT INTO `payment_description` (`id`, `payment_methods_id`, `name`, `language_id`, `sub_name_1`, `sub_name_2`) VALUES
(1, 1, 'Braintree', 1, 'Credit Card', 'Paypal'),
(4, 2, 'Stripe', 1, '', ''),
(5, 3, 'Paypal', 1, '', ''),
(6, 4, 'Cash on Delivery', 1, '', ''),
(7, 5, 'Instamojo', 1, '', ''),
(8, 0, 'Cybersoure', 1, '', ''),
(9, 6, 'Hyperpay', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `payment_methods_id` int(11) NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `environment` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`payment_methods_id`, `payment_method`, `status`, `environment`, `created_at`, `updated_at`) VALUES
(1, 'braintree', 1, 0, '2019-09-18 20:40:13', '0000-00-00 00:00:00'),
(2, 'stripe', 1, 0, '2019-09-18 20:56:17', '0000-00-00 00:00:00'),
(3, 'paypal', 1, 0, '2019-09-18 20:56:04', '0000-00-00 00:00:00'),
(4, 'cash_on_delivery', 1, 0, '2019-09-18 20:56:37', '0000-00-00 00:00:00'),
(5, 'instamojo', 1, 0, '2019-09-18 20:57:23', '0000-00-00 00:00:00'),
(6, 'hyperpay', 1, 0, '2019-09-18 20:56:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods_detail`
--

CREATE TABLE `payment_methods_detail` (
  `id` int(11) NOT NULL,
  `payment_methods_id` int(11) NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods_detail`
--

INSERT INTO `payment_methods_detail` (`id`, `payment_methods_id`, `key`, `value`) VALUES
(3, 1, 'merchant_id', 'wrv3cwbft6n3bg5g'),
(4, 1, 'public_key', '2bz5kxcj2gs3hdbx'),
(5, 1, 'private_key', '55ae08cb061e36dca59aaf2a883190bf'),
(9, 2, 'secret_key', 'sk_test_Gsz7jL4wRikI8YFaNzbwxKOF'),
(10, 2, 'publishable_key', 'pk_test_cCAEC6EejawuAvsvR9bhKrGR'),
(15, 3, 'id', 'AULJ0Q_kdXwEbi7PCBunUBJc4Kkg2vvdazF8kJoywAV9_i7iJMQphB9NLwdR0v2BAUlLF974iTrynbys'),
(18, 3, 'payment_currency', 'USD'),
(21, 5, 'api_key', 'c5a348bd5fcb4c866074c48e9c77c6c4'),
(22, 5, 'auth_token', '99448897defb4423b921fe47e0851b86'),
(23, 5, 'client_id', 'test_9l7MW8I7c2bwIw7q0koc6B1j5NrvzyhasQh'),
(24, 5, 'client_secret', 'test_m9Ey3Jqp9AfmyWKmUMktt4K3g1uMIdapledVRRYJha7WinxOsBVV5900QMlwvv3l2zRmzcYDEOKPh1cvnVedkAKtHOFFpJbqcoNCNrjx1FtZhtDMkEJFv9MJuXD'),
(32, 6, 'userid', '8a82941865340dc8016537cdac1e0841'),
(33, 6, 'password', 'sXrYy8pnsf'),
(34, 6, 'entityid', '8a82941865340dc8016537ce08db0845');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pincodes`
--

CREATE TABLE `pincodes` (
  `id` bigint(20) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pincodes`
--

INSERT INTO `pincodes` (`id`, `code`, `created_at`, `updated_at`) VALUES
(2, '134109', '2020-11-02 04:57:48', '2020-11-02 04:57:48'),
(3, '134110', '2020-11-02 04:57:51', '2020-11-02 04:57:51'),
(7, '111111', '2020-11-02 05:41:29', '2020-11-02 05:41:29'),
(5, '123456', '2020-11-02 04:57:57', '2020-11-02 04:58:14'),
(6, '123123', '2020-11-02 04:58:01', '2020-11-02 04:58:01'),
(8, '111112', '2020-11-02 05:41:29', '2020-11-02 05:41:29'),
(9, '111113', '2020-11-02 05:41:29', '2020-11-02 05:41:29'),
(10, '111114', '2020-11-02 05:41:29', '2020-11-02 05:41:29'),
(11, '111115', '2020-11-02 05:41:29', '2020-11-02 05:41:29'),
(12, '111116', '2020-11-02 05:41:29', '2020-11-02 05:41:29'),
(13, '111117', '2020-11-02 05:41:29', '2020-11-02 05:41:29'),
(14, '111118', '2020-11-02 05:41:29', '2020-11-02 05:41:29'),
(15, '111119', '2020-11-02 05:41:29', '2020-11-02 05:41:29'),
(16, '111110', '2020-11-02 05:41:29', '2020-11-02 05:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `products_id` int(11) NOT NULL,
  `products_quantity` int(11) NOT NULL,
  `products_model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products_mrp` decimal(15,2) NOT NULL,
  `products_price` decimal(15,2) NOT NULL,
  `products_date_added` datetime NOT NULL,
  `products_last_modified` datetime DEFAULT NULL,
  `products_date_available` datetime DEFAULT NULL,
  `products_weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_weight_unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products_status` tinyint(1) NOT NULL,
  `is_current` tinyint(1) NOT NULL,
  `products_tax_class_id` int(11) NOT NULL,
  `manufacturers_id` int(11) DEFAULT NULL,
  `products_ordered` int(11) NOT NULL DEFAULT 0,
  `products_liked` int(11) NOT NULL,
  `low_limit` int(11) NOT NULL,
  `is_feature` tinyint(1) NOT NULL DEFAULT 0,
  `products_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_type` int(11) NOT NULL DEFAULT 0,
  `products_min_order` int(11) NOT NULL DEFAULT 1,
  `products_max_stock` int(11) DEFAULT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specification` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor` int(11) NOT NULL DEFAULT 1,
  `avg_rating` float NOT NULL DEFAULT 0,
  `buy_for_rent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `security_15days` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `security_30days` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `security_2months` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `security_3months` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `security_6months` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `security_1year` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `products_quantity`, `products_model`, `products_image`, `products_mrp`, `products_price`, `products_date_added`, `products_last_modified`, `products_date_available`, `products_weight`, `products_weight_unit`, `products_status`, `is_current`, `products_tax_class_id`, `manufacturers_id`, `products_ordered`, `products_liked`, `low_limit`, `is_feature`, `products_slug`, `products_type`, `products_min_order`, `products_max_stock`, `short_description`, `specification`, `vendor`, `avg_rating`, `buy_for_rent`, `security_15days`, `security_30days`, `security_2months`, `security_3months`, `security_6months`, `security_1year`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, '143', '60.00', '36.78', '0000-00-00 00:00:00', NULL, NULL, '2', 'Gram', 1, 1, 0, 2, 2, 1, 0, 0, 'aldous-huxley-and-alternative-spirituality', 0, 1, NULL, '<ul>\r\n	<li>This book is a collection of the writings of John Cross on the theory and practice of meditation.</li>\r\n	<li>Aldous Huxley is considered as the introduce of meditation to the Western countries.</li>\r\n	<li>It is more of an introductory book with plenty of inspiration passages to motivate a reader to adopt meditation for a better and peaceful life.</li>\r\n</ul>', '<p><strong>Total Pages:</strong>&nbsp;9600-1</p>\r\n\r\n<p><strong>Edition:</strong>&nbsp;1st Edition</p>\r\n\r\n<p><strong>Author Nam :</strong>&nbsp;John Cross</p>\r\n\r\n<p><strong>Book Language:</strong>English</p>\r\n\r\n<p><strong>Available Book Formats:</strong>&nbsp;Paperback</p>\r\n\r\n<p><strong>Year:</strong>2017</p>\r\n\r\n<p><strong>Publication Date:</strong>Month- Year</p>\r\n\r\n<p><strong>Publisher/Manufacturer:</strong>Tata McGraw Hill Publications</p>\r\n\r\n<p><strong>ISBN-13:</strong>9789352606894</p>', 22, 2, 'New Book', '100', '200', '300', '500', '1000', '1800', '2020-10-19 10:49:47', '2020-12-14 14:09:09'),
(2, 0, NULL, '145', '100.00', '56.99', '0000-00-00 00:00:00', NULL, NULL, '2', 'Gram', 1, 1, 0, 1, 0, 0, 0, 0, 'men-s-sports-runnning-swim-board-shorts', 0, 1, NULL, '<ul>\r\n	<li>This book is a collection of the writings of John Cross on the theory and practice of meditation.</li>\r\n	<li>Aldous Huxley is considered as the introduce of meditation to the Western countries.</li>\r\n	<li>It is more of an introductory book with plenty of inspiration passages to motivate a reader to adopt meditation for a better and peaceful life.</li>\r\n</ul>', '<p><strong>Total Pages:</strong>&nbsp;9600-1</p>\r\n\r\n<p><strong>Edition:</strong>&nbsp;1st Edition</p>\r\n\r\n<p><strong>Author Nam :</strong>&nbsp;John Cross</p>\r\n\r\n<p><strong>Book Language:</strong>English</p>\r\n\r\n<p><strong>Available Book Formats:</strong>&nbsp;Paperback</p>\r\n\r\n<p><strong>Year:</strong>2017</p>\r\n\r\n<p><strong>Publication Date:</strong>Month- Year</p>\r\n\r\n<p><strong>Publisher/Manufacturer:</strong>Tata McGraw Hill Publications</p>\r\n\r\n<p><strong>ISBN-13:</strong>9789352606894</p>', 1, 0, 'Very Good', '100', '200', '300', '500', '1000', '1800', '2020-10-19 15:51:17', '2020-12-14 14:25:33'),
(3, 0, NULL, '144', '200.00', '156.00', '0000-00-00 00:00:00', NULL, NULL, '30', 'Gram', 1, 1, 0, 1, 3, 0, 0, 0, 'alternative-spirituality', 0, 1, NULL, '<p>Alternative Spirituality</p>\r\n\r\n<p>Alternative Spirituality</p>\r\n\r\n<p>Alternative Spirituality</p>\r\n\r\n<p>Alternative Spirituality</p>', '<p>Alternative Spirituality</p>\r\n\r\n<p>Alternative SpiritualityAlternative Spirituality</p>\r\n\r\n<p>Alternative SpiritualityAlternative SpiritualityAlternative Spirituality</p>\r\n\r\n<p>Alternative SpiritualityAlternative SpiritualityAlternative SpiritualityAlternative Spirituality</p>', 1, 3, 'Good', '100', '200', '300', '500', '1000', '1800', '2020-10-22 11:24:49', '2020-12-14 14:25:52'),
(5, 0, NULL, '155', '600.00', '500.00', '0000-00-00 00:00:00', NULL, NULL, '30', 'Gram', 1, 1, 0, 2, 0, 0, 0, 0, '1984-signet-classics-mass-market-paperback-unabridged-january-1-1961', 0, 1, NULL, '<p><strong>Written more than 70 years ago, <em>1984</em> was George Orwell&rsquo;s chilling prophecy about the future. And while 1984 has come and gone, his dystopian vision of a government that will do anything to control the narrative is timelier than ever...</strong></p>\r\n\r\n<p><strong><strong>Nominated as one of America&rsquo;s best-loved novels by PBS&rsquo;s <em>The Great American Read &bull;</em></strong></strong><br />\r\n&nbsp;</p>', '<p><strong>Written more than 70 years ago, <em>1984</em> was George Orwell&rsquo;s chilling prophecy about the future. And while 1984 has come and gone, his dystopian vision of a government that will do anything to control the narrative is timelier than ever...<br />\r\n<br />\r\n<strong>&bull; Nominated as one of America&rsquo;s best-loved novels by PBS&rsquo;s <em>The Great American Read &bull;</em></strong></strong><br />\r\n<br />\r\n&ldquo;<em>The Party told you to reject the evidence of your eyes and ears. It was their final, most essential command.</em>&rdquo;<br />\r\n<br />\r\nWinston Smith toes the Party line, rewriting history to satisfy the demands of the Ministry of Truth. With each lie he writes, Winston grows to hate the Party that seeks power for its own sake and persecutes those who dare to commit thoughtcrimes. But as he starts to think for himself, Winston can&rsquo;t escape the fact that Big Brother is always watching...<br />\r\n<br />\r\nA startling and haunting novel, <em>1984</em> creates an imaginary world that is completely convincing from start to finish. No one can deny the novel&rsquo;s hold on the imaginations of whole generations, or the power of its admonitions&mdash;a power that seems to grow, not lessen, with the passage of time.</p>', 1, 0, 'New Book', '100', '200', '300', '500', '1000', '1800', '2020-11-02 09:52:16', '2020-12-14 14:26:13'),
(6, 0, NULL, '159', '200.00', '156.00', '0000-00-00 00:00:00', NULL, NULL, '56', 'Gram', 1, 1, 0, 1, 0, 0, 0, 0, 'a-brief-history-of-time-paperback-illustrated-september-1-1998', 0, 1, NULL, '<p>A landmark volume in science writing by one of the great minds of our time, Stephen Hawking&rsquo;s book explores such profound questions as: How did the universe begin&mdash;and what made its start possible? Does time always flow forward? Is the universe unending&mdash;or are there boundaries? Are there other dimensions in space? What will happen when it all ends?<br />\r\n&nbsp;</p>', '<p>A landmark volume in science writing by one of the great minds of our time, Stephen Hawking&rsquo;s book explores such profound questions as: How did the universe begin&mdash;and what made its start possible? Does time always flow forward? Is the universe unending&mdash;or are there boundaries? Are there other dimensions in space? What will happen when it all ends?<br />\r\n<br />\r\nTold in language we all can understand, <em>A Brief History of Time</em> plunges into the exotic realms of black holes and quarks, of antimatter and &ldquo;arrows of time,&rdquo; of the big bang and a bigger God&mdash;where the possibilities are wondrous and unexpected. With exciting images and profound imagination, Stephen Hawking brings us closer to the ultimate secrets at the very heart of creation.</p>', 1, 0, 'Very Good', '100', '200', '300', '500', '1000', '1800', '2020-11-02 09:54:15', '2020-12-14 14:27:13'),
(7, 0, NULL, '160', '300.00', '200.00', '0000-00-00 00:00:00', NULL, NULL, '100', 'Gram', 1, 1, 0, 2, 0, 0, 0, 0, 'a-heartbreaking-work-of-staggering-genius-paperback-february-13-2001', 0, 1, NULL, '<p><strong>&quot;This is a beautifully ragged, laugh-out-loud funny and utterly unforgettable book.&quot;&nbsp;&mdash;<em>San Francisco Chronicle</em><br />\r\n<br />\r\nNational Bestseller&nbsp;</strong><br />\r\n<strong>Pulitzer Prize Finalist</strong></p>', '<p><strong>&quot;This is a beautifully ragged, laugh-out-loud funny and utterly unforgettable book.&quot;&nbsp;&mdash;<em>San Francisco Chronicle</em><br />\r\n<br />\r\nNational Bestseller&nbsp;</strong><br />\r\n<strong>Pulitzer Prize Finalist</strong><br />\r\n<br />\r\nA book that redefines both family and narrative for the twenty-first century. <em>A Heartbreaking Work of Staggering Genius</em> is the moving memoir of a college senior who, in the space of five weeks, loses both of his parents to cancer and inherits his eight-year-old brother. Here is an exhilarating debut that manages to be simultaneously hilarious and wildly inventive as well as a deeply heartfelt story of the love that holds a family together.<br />\r\n<br />\r\n<em>A Heartbreaking Work of Staggering Genius</em> is an instant classic that will be read for decades to come.</p>', 1, 0, 'New Book', '100', '200', '300', '500', '1000', '1800', '2020-11-02 09:55:57', '2020-12-14 14:27:37'),
(8, 0, NULL, '161', '200.00', '156.00', '0000-00-00 00:00:00', NULL, NULL, '30', 'Gram', 1, 1, 0, 1, 0, 0, 0, 0, 'a-long-way-gone-memoirs-of-a-boy-soldier-paperback-august-5-2008', 0, 1, NULL, '<p>This is how wars are fought now: by children, hopped-up on drugs and wielding AK-47s. Children have become soldiers of choice. In the more than fifty conflicts going on worldwide, it is estimated that there are some 300,000 child soldiers. Ishmael Beah used to be one of them.</p>', '<p>This is how wars are fought now: by children, hopped-up on drugs and wielding AK-47s. Children have become soldiers of choice. In the more than fifty conflicts going on worldwide, it is estimated that there are some 300,000 child soldiers. Ishmael Beah used to be one of them.</p>\r\n\r\n<p><br />\r\nWhat is war like through the eyes of a child soldier? How does one become a killer? How does one stop? Child soldiers have been profiled by journalists, and novelists have struggled to imagine their lives. But until now, there has not been a first-person account from someone who came through this hell and survived.<br />\r\n<br />\r\nIn <em>A Long Way Gone</em>, Beah, now twenty-five years old, tells a riveting story: how at the age of twelve, he fled attacking rebels and wandered a land rendered unrecognizable by violence. By thirteen, he&#39;d been picked up by the government army, and Beah, at heart a gentle boy, found that he was capable of truly terrible acts.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This is a rare and mesmerizing account, told with real literary force and heartbreaking honesty.<br />\r\n<br />\r\n&quot;My new friends have begun to suspect I haven&#39;t told them the full story of my life.<br />\r\n&#39;Why did you leave Sierra Leone?&#39;<br />\r\n&#39;Because there is a war.&#39;<br />\r\n&#39;You mean, you saw people running around with guns and shooting each other?&#39;<br />\r\n&#39;Yes, all the time.&#39;<br />\r\n&#39;Cool.&#39;<br />\r\nI smile a little.<br />\r\n&#39;You should tell us about it sometime.&#39;<br />\r\n&#39;Yes, sometime.&#39;&quot;</p>', 1, 0, 'Good', '100', '200', '300', '500', '1000', '1800', '2020-11-02 09:57:39', '2020-12-14 17:02:46'),
(9, 1, NULL, '170', '500.00', '400.00', '0000-00-00 00:00:00', NULL, NULL, '56', 'Gram', 1, 1, 0, 1, 1, 1, 0, 0, 'the-bad-beginning-or-orphans-a-series-of-unfortunate-events-book-1-paperback-illustrated-may-8-2007', 0, 1, NULL, '<p><strong>This middle grade novel is an excellent choice for tween readers in grades 5 to 6, especially during homeschooling. It&rsquo;s a fun way to keep your child entertained and engaged while not in the classroom.</strong></p>', '<p><strong>This middle grade novel is an excellent choice for tween readers in grades 5 to 6, especially during homeschooling. It&rsquo;s a fun way to keep your child entertained and engaged while not in the classroom.</strong></p>\r\n\r\n<p>Are you made fainthearted by death? Does fire unnerve you? Is a villain something that might crop up in future nightmares of yours? Are you thrilled by nefarious plots? Is cold porridge upsetting to you? Vicious threats? Hooks? Uncomfortable clothing?</p>\r\n\r\n<p>It is likely that your answers will reveal A Series of Unfortunate Events to be ill-suited for your personal use. A librarian, bookseller, or acquaintance should be able to suggest books more appropriate for your fragile temperament. But to the rarest of readers we say, &quot;Proceed, but cautiously.&quot;</p>', 1, 0, 'New Book', '100', '200', '300', '500', '1000', '1800', '2020-11-02 09:59:31', '2020-12-14 17:14:20'),
(10, 0, NULL, '166', '200.00', '180.00', '0000-00-00 00:00:00', NULL, NULL, '100', 'Gram', 1, 1, 0, NULL, 0, 0, 0, 0, 'diary-of-a-wimpy-kid-book-1-hardcover-april-1-2007', 0, 1, NULL, '<p>This edition of Diary of a Wimpy Kid can longer be ordered. Please go to https://www.amazon.com/Diary-Wimpy-Kid/dp/B0051XV5Y6/ref=dp_ob_title_bk to order this title.</p>', '<p>This edition of Diary of a Wimpy Kid can longer be ordered. Please go to https://www.amazon.com/Diary-Wimpy-Kid/dp/B0051XV5Y6/ref=dp_ob_title_bk to order this title.</p>', 1, 0, 'Good', '100', '200', '300', '500', '1000', '1800', '2020-11-02 10:01:32', '2020-12-14 14:28:28'),
(11, 0, NULL, '158', '400.00', '300.00', '0000-00-00 00:00:00', NULL, NULL, '100', 'Gram', 1, 1, 0, 1, 0, 0, 0, 0, 'dune-dune-chronicles-book-1-paperback-august-2-2005', 0, 1, NULL, '<p><strong>SOON TO BE A MAJOR MOTION PICTURE directed by&nbsp;Denis Villeneuve, starring&nbsp;Timoth&eacute;e Chalamet,&nbsp;Josh Brolin,&nbsp;Jason Momoa,&nbsp;Oscar Isaac,&nbsp;Javier Bardem,&nbsp;Dave Bautista,&nbsp;Stellan Skarsg&aring;rd,&nbsp;Rebecca Ferguson,&nbsp;Zendaya, and Charlotte Rampling.</strong></p>', '<p><strong>SOON TO BE A MAJOR MOTION PICTURE directed by&nbsp;Denis Villeneuve, starring&nbsp;Timoth&eacute;e Chalamet,&nbsp;Josh Brolin,&nbsp;Jason Momoa,&nbsp;Oscar Isaac,&nbsp;Javier Bardem,&nbsp;Dave Bautista,&nbsp;Stellan Skarsg&aring;rd,&nbsp;Rebecca Ferguson,&nbsp;Zendaya, and Charlotte Rampling.<br />\r\n<br />\r\n<strong>Frank Herbert&rsquo;s classic masterpiece&mdash;a triumph of the imagination and one of the bestselling science fiction novels of all time.</strong></strong><br />\r\n<br />\r\nSet on the desert planet Arrakis, <em>Dune</em> is the story of the boy Paul Atreides, heir to a noble family tasked with ruling an inhospitable world where the only thing of value is the &ldquo;spice&rdquo; melange, a drug capable of extending life and enhancing consciousness. Coveted across the known universe, melange is a prize worth killing for....<br />\r\n<br />\r\nWhen House Atreides is betrayed, the destruction of Paul&rsquo;s family will set the boy on a journey toward a destiny greater than he could ever have imagined. And as he evolves into the mysterious man known as Muad&rsquo;Dib, he will bring to fruition humankind&rsquo;s most ancient and unattainable dream.&nbsp;<br />\r\n<br />\r\nA stunning blend of adventure and mysticism, environmentalism and politics, <em>Dune</em> won the first Nebula Award, shared the Hugo Award, and formed the basis of what is undoubtedly the grandest epic in science fiction.</p>', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 10:04:12', '2020-11-02 11:59:38'),
(12, 0, NULL, '157', '200.00', '156.00', '0000-00-00 00:00:00', NULL, NULL, '200', 'Gram', 1, 1, 0, NULL, 0, 0, 0, 0, 'fahrenheit-451-paperback-january-10-2012', 0, 1, NULL, '<p><strong>NOW AN HBO FILM STARRING MICHAEL B. JORDAN AND MICHAEL SHANNON</strong><br />\r\n<br />\r\n<strong>Sixty years after its originally publication, Ray Bradbury&rsquo;s internationally acclaimed novel <em>Fahrenheit 451 </em>stands as a classic of world literature set in a bleak, dystopian future. Today its message has grown more relevant than ever before.</strong></p>', '<p><strong>NOW AN HBO FILM STARRING MICHAEL B. JORDAN AND MICHAEL SHANNON</strong><br />\r\n<br />\r\n<strong>Sixty years after its originally publication, Ray Bradbury&rsquo;s internationally acclaimed novel <em>Fahrenheit 451 </em>stands as a classic of world literature set in a bleak, dystopian future. Today its message has grown more relevant than ever before.</strong><br />\r\n<br />\r\nGuy Montag is a fireman. His job is to destroy the most illegal of commodities, the printed book, along with the houses in which they are hidden. Montag never questions the destruction and ruin his actions produce, returning each day to his bland life and wife, Mildred, who spends all day with her television &ldquo;family.&rdquo; But when he meets an eccentric young neighbor, Clarisse, who introduces him to a past where people didn&rsquo;t live in fear and to a present where one sees the world through the ideas in books instead of the mindless chatter of television, Montag begins to question everything he has ever known.</p>', 1, 0, 'Good', '100', '200', '300', '500', '1000', '1800', '2020-11-02 10:06:26', '2020-12-14 14:28:51'),
(13, 0, NULL, '164', '100.00', '56.99', '0000-00-00 00:00:00', NULL, NULL, '100', 'Gram', 1, 1, 0, 2, 0, 0, 0, 0, 'fear-and-loathing-in-las-vegas-a-savage-journey-to-the-heart-of-the-american-dream-paperback-illustrated-may-12-1998', 0, 1, NULL, '<p>This cult classic of gonzo journalism is the&nbsp;best chronicle of drug-soaked, addle-brained, rollicking good times ever committed to the printed page.&nbsp;&nbsp;It is also the tale of a long weekend road trip that has gone down in the annals of American pop culture as one of the strangest journeys ever undertaken.</p>', '<p>This cult classic of gonzo journalism is the&nbsp;best chronicle of drug-soaked, addle-brained, rollicking good times ever committed to the printed page.&nbsp;&nbsp;It is also the tale of a long weekend road trip that has gone down in the annals of American pop culture as one of the strangest journeys ever undertaken.<br />\r\n<br />\r\nNow &nbsp;a major motion picture from Universal, directed by Terry Gilliam and starring Johnny Depp and Benicio del Toro.</p>', 1, 0, 'New Book', '100', '200', '300', '500', '1000', '1800', '2020-11-02 10:08:09', '2020-12-14 14:29:12'),
(14, 0, NULL, '167', '200.00', '156.00', '0000-00-00 00:00:00', NULL, NULL, '30', 'Gram', 1, 1, 0, NULL, 0, 0, 0, 0, 'gone-girl-paperback-april-22-2014', 0, 1, NULL, '<p><strong>#1&nbsp;<em>NEW YORK TIMES&nbsp;</em>BESTSELLER &bull; The&nbsp;&ldquo;mercilessly entertaining&rdquo; (<em>Vanity Fair</em>)&nbsp;instant classic &ldquo;about the nature of identity and the terrible secrets that can survive and thrive in even the most intimate relationships&rdquo; (Lev Grossman,&nbsp;<em>Time</em>).</strong></p>', '<p><strong>NAMED ONE OF THE BEST BOOKS OF THE YEAR BY</strong>&nbsp;<strong><em>San Francisco Chronicle&nbsp;</em>&bull;&nbsp;<em>St. Louis Post Dispatch&nbsp;</em>&bull;&nbsp;<em>Chicago Tribune&nbsp;</em>&bull;&nbsp;<em>HuffPost&nbsp;</em>&bull;&nbsp;<em>Newsday</em></strong><br />\r\n<br />\r\n&ldquo;Absorbing . . . In masterly fashion, Flynn depicts the unraveling of a marriage&mdash;and of a recession-hit Midwest&mdash;by interweaving the wife&rsquo;s diary entries with the husband&rsquo;s first-person account.&rdquo;<strong>&mdash;<em>New Yorker</em></strong><br />\r\n<br />\r\n&ldquo;Ms. Flynn writes dark suspense novels that anatomize violence without splashing barrels of blood around the pages . . . Ms. Flynn has much more up her sleeve than a simple missing-person case. As Nick and Amy alternately tell their stories, marriage has never looked so menacing, narrators so unreliable.&rdquo;<strong>&mdash;<em>The Wall Street Journal</em></strong></p>', 1, 0, 'New Book', '100', '200', '300', '500', '1000', '1800', '2020-11-02 10:10:57', '2020-12-14 14:29:37'),
(15, 0, NULL, '168', '200.00', '156.00', '0000-00-00 00:00:00', NULL, NULL, '56', 'Gram', 1, 1, 0, 2, 0, 0, 0, 0, 'me-talk-pretty-one-day-paperback-june-5-2001', 0, 1, NULL, '<p>A recent transplant to Paris, humorist David Sedaris, bestselling author of &quot;Naked&quot;, presents a collection of his strongest work yet, including the title story about his hilarious attempt to learn French. A number one national bestseller now in paperback.</p>', '<p>A recent transplant to Paris, humorist David Sedaris, bestselling author of &quot;Naked&quot;, presents a collection of his strongest work yet, including the title story about his hilarious attempt to learn French. A number one national bestseller now in paperback.</p>', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 10:12:37', '2020-11-02 11:58:04'),
(16, -1, NULL, '156', '100.00', '56.99', '0000-00-00 00:00:00', NULL, NULL, '30', 'Gram', 1, 1, 0, 1, 1, 0, 0, 0, 'middlesex-a-novel-oprah-s-book-club-paperback-june-5-2002', 0, 1, NULL, '<p><em>&quot;I was born twice: first, as a baby girl, on a remarkably smogless Detroit day of January 1960; and then again, as a teenage boy, in an emergency room near Petoskey, Michigan, in August of l974. . . My birth certificate lists my name as Calliope Helen Stephanides. My most recent driver&#39;s license...records my first name simply as Cal.&quot;</em></p>', '<p><em>&quot;I was born twice: first, as a baby girl, on a remarkably smogless Detroit day of January 1960; and then again, as a teenage boy, in an emergency room near Petoskey, Michigan, in August of l974. . . My birth certificate lists my name as Calliope Helen Stephanides. My most recent driver&#39;s license...records my first name simply as Cal.&quot;</em><br />\r\n<br />\r\nSo begins the breathtaking story of Calliope Stephanides and three generations of the Greek-American Stephanides family who travel from a tiny village overlooking Mount Olympus in Asia Minor to Prohibition-era Detroit, witnessing its glory days as the Motor City, and the race riots of l967, before they move out to the tree-lined streets of suburban Grosse Pointe, Michigan. To understand why Calliope is not like other girls, she has to uncover a guilty family secret and the astonishing genetic history that turns Callie into Cal, one of the most audacious and wondrous narrators in contemporary fiction. Lyrical and thrilling, <em>Middlesex </em>is an exhilarating reinvention of the American epic.<br />\r\n<br />\r\n<em>Middlesex </em>is the winner of the 2003 Pulitzer Prize for Fiction.</p>', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 10:14:21', '2020-11-02 11:57:34'),
(17, 1, NULL, '165', '100.00', '36.78', '0000-00-00 00:00:00', NULL, NULL, '100', 'Gram', 1, 1, 0, 1, 0, 0, 0, 0, 'midnight-s-children-a-novel-modern-library-100-best-novels-paperback-april-4-2006', 0, 1, NULL, '<p><strong><strong><strong>The iconic masterpiece of India that introduced the world to &ldquo;a glittering novelist&mdash;one with startling imaginative and intellectual resources, a master of perpetual storytelling&rdquo; (<em>The New Yorker</em>)</strong></strong></strong></p>', '<p><strong><strong><strong>The iconic masterpiece of India that introduced the world to &ldquo;a glittering novelist&mdash;one with startling imaginative and intellectual resources, a master of perpetual storytelling&rdquo; (<em>The New Yorker</em>)</strong><br />\r\n<br />\r\nWINNER OF THE BEST OF THE BOOKERS &bull;&nbsp;SOON TO BE A NETFLIX ORIGINAL SERIES</strong><br />\r\n<strong>&nbsp;</strong><br />\r\n<strong>Selected by the Modern Library as one of the 100 best novels of all time&nbsp;&bull;&nbsp;The twenty-fifth anniversary edition, featuring a new introduction by the author</strong></strong><br />\r\n<br />\r\nSaleem Sinai is born at the stroke of midnight on August 15, 1947, the very moment of India&rsquo;s independence. Greeted by fireworks displays, cheering crowds, and Prime Minister Nehru himself, Saleem grows up to learn the ominous consequences of this coincidence. His every act is mirrored and magnified in events that sway the course of national affairs; his health and well-being are inextricably bound to those of his nation; his life is inseparable, at times indistinguishable, from the history of his country. Perhaps most remarkable are the telepathic powers linking him with India&rsquo;s 1,000 other &ldquo;midnight&rsquo;s children,&rdquo; all born in that initial hour and endowed with magical gifts.<br />\r\n<br />\r\nThis novel is at once a fascinating family saga and an astonishing evocation of a vast land and its people&ndash;a brilliant incarnation of the universal human comedy. Twenty-five years after its publication, Midnight&rsquo; s Children stands apart as both an epochal work of fiction and a brilliant performance by one of the great literary voices of our time.</p>', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 10:16:06', '2020-11-02 11:57:11'),
(18, 0, NULL, '169', '200.00', '56.99', '0000-00-00 00:00:00', NULL, NULL, '100', 'Gram', 1, 1, 0, 2, 0, 0, 0, 0, 'moneyball-the-art-of-winning-an-unfair-game-paperback-march-17-2004', 0, 1, NULL, '<p><strong>&quot;This delightfully written, lesson-laden book deserves a place of its own in the Baseball Hall of Fame.&quot; ―<em>Forbes</em></strong></p>', '<p><strong>&quot;This delightfully written, lesson-laden book deserves a place of its own in the Baseball Hall of Fame.&quot; ―<em>Forbes</em></strong></p>\r\n\r\n<p><em>Moneyball</em> is a quest for the secret of success in baseball. In a narrative full of fabulous characters and brilliant excursions into the unexpected, Michael Lewis follows the low-budget Oakland A&#39;s, visionary general manager Billy Beane, and the strange brotherhood of amateur baseball theorists. They are all in search of new baseball knowledge―insights that will give the little guy who is willing to discard old wisdom the edge over big money.</p>', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 10:18:12', '2020-11-02 11:56:14'),
(19, 0, NULL, '162', '500.00', '300.00', '0000-00-00 00:00:00', NULL, NULL, '200', 'Gram', 1, 1, 0, 2, 0, 0, 0, 0, 'of-human-bondage-bantam-classics-mass-market-paperback-june-1-1991', 0, 1, NULL, '<p><strong>A masterpiece of modern literature that mirrors Maugham&rsquo;s own career.</strong></p>', '<p><strong>A masterpiece of modern literature that mirrors Maugham&rsquo;s own career.</strong><br />\r\n<br />\r\n<em>Of Human Bondage</em> is the first and most autobiographical of Maugham&#39;s novels. It is the story of Philip Carey, an orphan eager for life, love and adventure. After a few months studying in Heidelberg, and a brief spell in Paris as a would-be artist, Philip settles in London to train as a doctor. And that is where he meets Mildred, the loud but irresistible waitress with whom he plunges into a formative, tortured and masochistic affair which very nearly ruins him.</p>', 1, 0, 'Very Good', '100', '200', '300', '500', '1000', '1800', '2020-11-02 10:19:45', '2020-12-14 16:56:08'),
(20, 0, NULL, '171', '200.00', '156.00', '0000-00-00 00:00:00', NULL, NULL, '100', 'Gram', 1, 1, 0, 1, 0, 0, 0, 0, 'the-corrections-a-novel-paperback-september-1-2002', 0, 1, NULL, '<p><strong>Winner of the 2001 National Book Award for Fiction</strong></p>', '<p><strong>Winner of the 2001 National Book Award for Fiction</strong></p>\r\n\r\n<p>After almost fifty years as a wife and mother, Enid Lambert is ready to have some fun. Unfortunately, her husband, Alfred, is losing his sanity to Parkinson&#39;s disease, and their children have long since flown the family nest to the catastrophes of their own lives. The oldest, Gary, a once-stable portfolio manager and family man, is trying to convince his wife and himself, despite clear signs to the contrary, that he is not clinically depressed. The middle child, Chip, has lost his seemingly secure academic job and is failing spectacularly at his new line of work. And Denise, the youngest, has escaped a disastrous marriage only to pour her youth and beauty down the drain of an affair with a married man-or so her mother fears. Desperate for some pleasure to look forward to, Enid has set her heart on an elusive goal: bringing her family together for one last Christmas at home.</p>', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 10:21:48', '2020-11-02 11:55:39'),
(21, -3, NULL, '172', '200.00', '156.00', '0000-00-00 00:00:00', NULL, NULL, '200', 'Gram', 1, 1, 0, NULL, 2, 0, 0, 0, 'the-devil-in-the-white-city-murder-magic-and-madness-at-the-fair-that-changed-america-paperback-illustrated-february-10-2004', 0, 1, NULL, '<p>Erik Larson&mdash;author of #1 bestseller <em>In the Garden of Beasts</em>&mdash;intertwines the true tale of the 1893 World&#39;s Fair and the cunning serial killer who used the fair to lure his victims to their death. Combining meticulous research with nail-biting storytelling, Erik Larson has crafted a narrative with all the wonder of newly discovered history and the thrills of the best fiction.</p>', '<p>Erik Larson&mdash;author of #1 bestseller <em>In the Garden of Beasts</em>&mdash;intertwines the true tale of the 1893 World&#39;s Fair and the cunning serial killer who used the fair to lure his victims to their death. Combining meticulous research with nail-biting storytelling, Erik Larson has crafted a narrative with all the wonder of newly discovered history and the thrills of the best fiction.</p>', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 10:25:33', '2020-11-02 11:55:21'),
(22, 0, NULL, '173', '100.00', '56.99', '0000-00-00 00:00:00', NULL, NULL, '100', 'Gram', 1, 1, 0, 1, 0, 1, 0, 0, 'the-diary-of-a-young-girl-hardcover-october-19-2010', 0, 1, NULL, '<p>In Everyman&rsquo;s Library for the first time&mdash;one of the most moving and eloquent accounts of the Holocaust, read by tens of millions of people around the world since its publication in 1947.<br />\r\n<br />\r\n<em>The Diary of a Young Girl</em> is the record of two years in the life of a remarkable Jewish girl whose triumphant humanity in the face of unfathomable deprivation and fear has made the book one of the most enduring documents of our time.<br />\r\n<br />\r\nThe Everyman&rsquo;s hardcover edition reprints the Definitive Edition authorized by the Frank estate, plus a new introduction, a bibliography, and a chronology of Anne Frank&rsquo;s life and times.</p>', '<p>In Everyman&rsquo;s Library for the first time&mdash;one of the most moving and eloquent accounts of the Holocaust, read by tens of millions of people around the world since its publication in 1947.<br />\r\n<br />\r\n<em>The Diary of a Young Girl</em> is the record of two years in the life of a remarkable Jewish girl whose triumphant humanity in the face of unfathomable deprivation and fear has made the book one of the most enduring documents of our time.<br />\r\n<br />\r\nThe Everyman&rsquo;s hardcover edition reprints the Definitive Edition authorized by the Frank estate, plus a new introduction, a bibliography, and a chronology of Anne Frank&rsquo;s life and times.</p>', 22, 0, 'Very Good', '100', '200', '300', '500', '1000', '1800', '2020-11-02 10:26:56', '2020-12-14 16:55:46'),
(23, 0, NULL, '174', '500.00', '300.00', '0000-00-00 00:00:00', NULL, NULL, '56', 'Gram', 1, 1, 0, NULL, 6, 0, 0, 0, 'the-fault-in-our-stars-paperback-april-8-2014', 0, 1, NULL, '<p><strong>From John Green, the #1 bestselling author of <em>Turtles All the Way Down</em><br />\r\n<br />\r\n&quot;The greatest romance story of this decade.&quot; </strong>&mdash;<em>Entertainment Weekly</em><br />\r\n<br />\r\n<strong>-Millions of copies sold-</strong><br />\r\n<br />\r\n<strong>#1 <em>New York Times</em> Bestseller</strong><br />\r\n<strong>#1 <em>Wall Street Journal</em> Bestseller</strong><br />\r\n<strong>#1 <em>USA Today</em> Bestseller</strong><br />\r\n<strong>#1 International Bestseller</strong><br />\r\n<br />\r\n<strong><strong>TIME Magazine&rsquo;s #1 Fiction Book of 2012</strong><br />\r\nTODAY Book Club pick</strong><br />\r\n<strong>Now a Major Motion Picture</strong></p>', '<p>Despite the tumor-shrinking medical miracle that has bought her a few years, Hazel has never been anything but terminal, her final chapter inscribed upon diagnosis. But when a gorgeous plot twist named Augustus Waters suddenly appears at Cancer Kid Support Group, Hazel&rsquo;s story is about to be completely rewritten.<br />\r\n<br />\r\nInsightful, bold, irreverent, and raw, <em>The Fault in Our Stars</em> brilliantly explores the funny, thrilling, and tragic business of being alive and in love.</p>', 1, 0, 'Very Good', '100', '200', '300', '500', '1000', '1800', '2020-11-02 10:29:30', '2020-12-14 16:55:21'),
(24, -1, NULL, '175', '500.00', '300.00', '0000-00-00 00:00:00', NULL, NULL, '30', 'Gram', 1, 1, 0, 1, 2, 0, 0, 0, 'the-giver-paperback-january-24-2006', 0, 1, NULL, '<p>Jonas&#39;s world is perfect. Everything is under control. There is no war or fear of pain. There are no choices. Every person is assigned a role in the community. Jonas lives in a seemingly ideal world.<br />\r\n<br />\r\nWhen Jonas turns 12 he is singled out to receive special training from The Giver. The Giver alone holds the memories of the true pain and pleasure of life. Not until he is given his life assignment as the Receiver does Jonas begin to understand the dark secrets behind this fragile community. Now, it is time for Jonas to receive the truth. There is no turning back.</p>', '<p>Jonas&#39;s world is perfect. Everything is under control. There is no war or fear of pain. There are no choices. Every person is assigned a role in the community. Jonas lives in a seemingly ideal world.<br />\r\n<br />\r\nWhen Jonas turns 12 he is singled out to receive special training from The Giver. The Giver alone holds the memories of the true pain and pleasure of life. Not until he is given his life assignment as the Receiver does Jonas begin to understand the dark secrets behind this fragile community. Now, it is time for Jonas to receive the truth. There is no turning back.</p>', 1, 0, 'New Book', '100', '200', '300', '500', '1000', '1800', '2020-11-02 10:31:01', '2020-12-14 16:54:51'),
(28, 0, NULL, '193', '600.00', '400.00', '0000-00-00 00:00:00', NULL, NULL, '30', 'Gram', 1, 1, 0, 1, 0, 0, 0, 0, 'think-big-little-one-vashti-harrison-board-book-illustrated-october-1-2019', 0, 20, NULL, '<p><strong>This board book edition of <em>Little Dreamers: Visionary Women Around the World</em> by <em>New York Times</em> bestselling author Vashti Harrison is a beautiful first book to teach your little dreamers to follow all their biggest ideas. </strong></p>', '<p>Featuring eighteen women creators, ranging from writers to inventors, artists to scientists, this board book adaptation of <em>Little Dreamers: Visionary Women Around the World</em> introduces trailblazing women like Mary Blair, an American modernist painter who had a major influence on how color was used in early animated films, environmental activist Wangari Maathai, and architect Zaha Hadid.<br />\r\n<br />\r\nThe irresistible full-color illustrations show the Dreamers as both accessible and aspirational so reader knows they, too, can grow up to do something amazing.</p>', 1, 0, 'Very Good', '100', '200', '300', '500', '1000', '1800', '2020-11-04 10:22:20', '2020-12-14 16:54:25'),
(26, 0, NULL, '191', '500.00', '400.00', '0000-00-00 00:00:00', NULL, NULL, '100', 'Gram', 1, 1, 0, NULL, 0, 0, 0, 0, 'marvel-spider-man-look-and-find-activity-book-pi-kids-hardcover-picture-book-march-30-2017', 0, 30, NULL, '<p>When J. Jonah Jameson demands photos for the Daily Bugle, Peter Parker hits the streets as Spider-Man, encountering infamous super villans along the way! Help Spidey save the day while you search for hidden objects in eight busy scenes. Then sling to the back of the book for more spectacular Look and Find challenges.</p>', '<p><strong>This book is super because:</strong></p>\r\n\r\n<ul>\r\n	<li>Look and Find play encourages focus and exploration</li>\r\n	<li>Connecting words with pictures builds vocabulary</li>\r\n	<li>Includes Marvel favorites:Spider-man, Green Goblin, Doctor Octopus (Doc Ock), Mysterio, Electro, Sandman, Lizard, and more!</li>\r\n</ul>', 1, 0, 'Very Good', '100', '200', '300', '500', '1000', '1800', '2020-11-04 09:50:06', '2020-12-14 16:53:50'),
(27, 0, NULL, '192', '200.00', '156.00', '0000-00-00 00:00:00', NULL, NULL, '30', 'Gram', 1, 1, 0, 2, 0, 0, 0, 0, 'the-secret-lake-a-children-s-mystery-adventure-paperback-august-4-2011', 0, 20, NULL, '<p><strong>A lost dog, a hidden time tunnel and a secret lake. A page-turning time travel adventure for children aged 8-11. Now enjoyed by thousands of young readers!</strong></p>', '<p><strong>A modern children&#39;s classic</strong></p>\r\n\r\n<p>The Secret Lake has been described by readers as a modern Tom&#39;s Midnight Garden and compared in atmosphere with The Secret Garden and the Enid Blyton and Nancy Drew mystery adventure stories. Its page-turning plot, with its many twists and turns, makes it a firm favourite with both boys and girls.</p>\r\n\r\n<p>Karen Inglis describes it as, <em>a time travel mystery adventure with modern twists - the kind of story that I loved to read as a child, but brought right up to date.</em></p>\r\n\r\n<p><strong>The adventure starts here! Order today with one click, in print or for kindle</strong></p>', 1, 0, 'Good', '100', '200', '300', '500', '1000', '1800', '2020-11-04 09:52:14', '2020-12-14 16:53:27'),
(29, 4, NULL, '158', '60.00', '50.00', '0000-00-00 00:00:00', NULL, NULL, '50', 'Gram', 1, 1, 0, 2, 4, 0, 0, 0, 'alternative-spirituality-1', 0, 1, NULL, '<ul>\r\n	<li>This book is a collection of the writings of John Cross on the theory and practice of meditation.</li>\r\n	<li>Aldous Huxley is considered as the introduce of meditation to the Western countries.</li>\r\n	<li>It is more of an introductory book with plenty of inspiration passages to motivate a reader to adopt meditation for a better and peaceful life.</li>\r\n</ul>', '<p><strong>Total Pages:</strong>&nbsp;9600-1</p>\r\n\r\n<p><strong>Edition:</strong>&nbsp;1st Edition</p>\r\n\r\n<p><strong>Author Nam :</strong>&nbsp;John Cross</p>\r\n\r\n<p><strong>Book Language:</strong>English</p>\r\n\r\n<p><strong>Available Book Formats:</strong>&nbsp;Paperback</p>\r\n\r\n<p><strong>Year:</strong>2017</p>\r\n\r\n<p><strong>Publication Date:</strong>Month- Year</p>\r\n\r\n<p><strong>Publisher/Manufacturer:</strong>Tata McGraw Hill Publications</p>\r\n\r\n<p><strong>ISBN-13:</strong>9789352606894</p>', 22, 0, 'Very Good', '100', '200', '300', '500', '1000', '1800', '2020-11-05 10:18:08', '2020-12-14 16:53:04'),
(31, 6, NULL, '169', '100.00', '70.00', '0000-00-00 00:00:00', NULL, NULL, '150', 'Gram', 1, 1, 1, 6, 6, 0, 0, 1, 'test', 0, 1, 10, '<p>Test product</p>', '<ul>\r\n	<li>Test product</li>\r\n	<li>Test product</li>\r\n	<li>Test product</li>\r\n	<li>Test product</li>\r\n	<li>Test product</li>\r\n</ul>', 22, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-09 17:06:39', '2021-02-09 17:08:06'),
(32, 0, NULL, '153', '100.00', '123.00', '0000-00-00 00:00:00', NULL, NULL, '130', 'Gram', 2, 1, 1, NULL, 8, 0, 0, 0, 'test-product-2', 0, 1, 5, '<p>Test Product 2</p>', '<p>Test Product 2</p>\r\n\r\n<p>Test Product 2</p>\r\n\r\n<p>Test Product 2</p>\r\n\r\n<p>Test Product 2</p>', 35, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-09 17:33:59', '2021-02-11 06:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

CREATE TABLE `products_attributes` (
  `products_attributes_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `options_id` int(11) NOT NULL,
  `options_values_id` int(11) NOT NULL,
  `options_values_price` decimal(15,2) NOT NULL,
  `price_prefix` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes_download`
--

CREATE TABLE `products_attributes_download` (
  `products_attributes_id` int(11) NOT NULL,
  `products_attributes_filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `products_attributes_maxdays` int(11) DEFAULT 0,
  `products_attributes_maxcount` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_description`
--

CREATE TABLE `products_description` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 1,
  `products_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `products_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products_viewed` int(11) DEFAULT 0,
  `products_left_banner` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products_left_banner_start_date` int(11) DEFAULT NULL,
  `products_left_banner_expire_date` int(11) DEFAULT NULL,
  `products_right_banner` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products_right_banner_start_date` int(11) DEFAULT NULL,
  `products_right_banner_expire_date` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_description`
--

INSERT INTO `products_description` (`id`, `products_id`, `language_id`, `products_name`, `products_description`, `products_url`, `products_viewed`, `products_left_banner`, `products_left_banner_start_date`, `products_left_banner_expire_date`, `products_right_banner`, `products_right_banner_start_date`, `products_right_banner_expire_date`) VALUES
(1, 1, 1, 'Aldous Huxley and Alternative Spirituality', '<p><strong>Queen Mary University of London, is the editor of Altered Consciousness in the Twentieth Century (Routledge, 2019). His chapters and articles have appeared in The Occult Imagination in Britain (Routledge, 2018), Aries and Aldous Huxley Annual.</strong></p>\r\n\r\n<p>Aldous Huxley and Alternative Spirituality offers an incisive analysis of the full range of Huxley&rsquo;s spiritual interests, spanning both mysticism (neo-Vedanta, Taoism, Mahayana and Zen Buddhism) and Western esotericism (mesmerism, spiritualism, the paranormal). Jake Poller examines how Huxley&rsquo;s shifting spiritual convictions influenced his fiction, such as his depiction of the body and sex, and reveals how Huxley&rsquo;s use of psychedelic substances affected his spiritual convictions, resulting in a Tantric turn in his work. Poller demonstrates how Huxley&rsquo;s vision of a new alternative spirituality in Island, in which the Palanese select their beliefs from different religious traditions, anticipates the New Age spiritual supermarket and traces the profound influence of Huxley&rsquo;s ideas on the spiritual seekers of the twentieth century and beyond.</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(2, 2, 1, 'Men’s Sports Runnning Swim Board Shorts', '<p><strong>Queen Mary University of London, is the editor of Altered Consciousness in the Twentieth Century (Routledge, 2019). His chapters and articles have appeared in The Occult Imagination in Britain (Routledge, 2018), Aries and Aldous Huxley Annual.</strong></p>\r\n\r\n<p>Aldous Huxley and Alternative Spirituality offers an incisive analysis of the full range of Huxley&rsquo;s spiritual interests, spanning both mysticism (neo-Vedanta, Taoism, Mahayana and Zen Buddhism) and Western esotericism (mesmerism, spiritualism, the paranormal). Jake Poller examines how Huxley&rsquo;s shifting spiritual convictions influenced his fiction, such as his depiction of the body and sex, and reveals how Huxley&rsquo;s use of psychedelic substances affected his spiritual convictions, resulting in a Tantric turn in his work. Poller demonstrates how Huxley&rsquo;s vision of a new alternative spirituality in Island, in which the Palanese select their beliefs from different religious traditions, anticipates the New Age spiritual supermarket and traces the profound influence of Huxley&rsquo;s ideas on the spiritual seekers of the twentieth century and beyond.</p>\r\n\r\n<p>Sorry no more offers available</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(3, 3, 1, 'Alternative Spirituality', '<p>Alternative SpiritualityAlternative SpiritualityAlternative SpiritualityAlternative SpiritualityAlternative SpiritualityAlternative SpiritualityAlternative SpiritualityAlternative SpiritualityAlternative Spirituality</p>\r\n\r\n<p>Alternative SpiritualityAlternative SpiritualityAlternative SpiritualityAlternative SpiritualityAlternative SpiritualityAlternative SpiritualityAlternative Spirituality</p>\r\n\r\n<p>Alternative SpiritualityAlternative SpiritualityAlternative SpiritualityAlternative SpiritualityAlternative SpiritualityAlternative SpiritualityAlternative SpiritualityAlternative SpiritualityAlternative Spirituality</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(5, 5, 1, '1984 (Signet Classics) Mass Market Paperback – Unabridged, Janua', '<p>&ldquo;<em>The Party told you to reject the evidence of your eyes and ears. It was their final, most essential command.</em>&rdquo;<br />\r\n<br />\r\nWinston Smith toes the Party line, rewriting history to satisfy the demands of the Ministry of Truth. With each lie he writes, Winston grows to hate the Party that seeks power for its own sake and persecutes those who dare to commit thoughtcrimes. But as he starts to think for himself, Winston can&rsquo;t escape the fact that Big Brother is always watching...<br />\r\n<br />\r\nA startling and haunting novel, <em>1984</em> creates an imaginary world that is completely convincing from start to finish. No one can deny the novel&rsquo;s hold on the imaginations of whole generations, or the power of its admonitions&mdash;a power that seems to grow, not lessen, with the passage of time.</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(6, 6, 1, 'A Brief History of Time Paperback – Illustrated, September 1, 19', '<p>A landmark volume in science writing by one of the great minds of our time, Stephen Hawking&rsquo;s book explores such profound questions as: How did the universe begin&mdash;and what made its start possible? Does time always flow forward? Is the universe unending&mdash;or are there boundaries? Are there other dimensions in space? What will happen when it all ends?<br />\r\n<br />\r\nTold in language we all can understand, <em>A Brief History of Time</em> plunges into the exotic realms of black holes and quarks, of antimatter and &ldquo;arrows of time,&rdquo; of the big bang and a bigger God&mdash;where the possibilities are wondrous and unexpected. With exciting images and profound imagination, Stephen Hawking brings us closer to the ultimate secrets at the very heart of creation.</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(7, 7, 1, 'A Heartbreaking Work of Staggering Genius Paperback – February 1', '<p>A book that redefines both family and narrative for the twenty-first century. <em>A Heartbreaking Work of Staggering Genius</em> is the moving memoir of a college senior who, in the space of five weeks, loses both of his parents to cancer and inherits his eight-year-old brother. Here is an exhilarating debut that manages to be simultaneously hilarious and wildly inventive as well as a deeply heartfelt story of the love that holds a family together.<br />\r\n<br />\r\n<em>A Heartbreaking Work of Staggering Genius</em> is an instant classic that will be read for decades to come.</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(8, 8, 1, 'A Long Way Gone: Memoirs of a Boy Soldier Paperback – August 5,', '<p>What is war like through the eyes of a child soldier? How does one become a killer? How does one stop? Child soldiers have been profiled by journalists, and novelists have struggled to imagine their lives. But until now, there has not been a first-person account from someone who came through this hell and survived.<br />\r\n<br />\r\nIn <em>A Long Way Gone</em>, Beah, now twenty-five years old, tells a riveting story: how at the age of twelve, he fled attacking rebels and wandered a land rendered unrecognizable by violence. By thirteen, he&#39;d been picked up by the government army, and Beah, at heart a gentle boy, found that he was capable of truly terrible acts.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>This is a rare and mesmerizing account, told with real literary force and heartbreaking honesty.<br />\r\n<br />\r\n&quot;My new friends have begun to suspect I haven&#39;t told them the full story of my life.<br />\r\n&#39;Why did you leave Sierra Leone?&#39;<br />\r\n&#39;Because there is a war.&#39;<br />\r\n&#39;You mean, you saw people running around with guns and shooting each other?&#39;<br />\r\n&#39;Yes, all the time.&#39;<br />\r\n&#39;Cool.&#39;<br />\r\nI smile a little.<br />\r\n&#39;You should tell us about it sometime.&#39;<br />\r\n&#39;Yes, sometime.&#39;&quot;</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(9, 9, 1, 'The Bad Beginning: Or, Orphans! (A Series of Unfortunate Events,', '<p>Are you made fainthearted by death? Does fire unnerve you? Is a villain something that might crop up in future nightmares of yours? Are you thrilled by nefarious plots? Is cold porridge upsetting to you? Vicious threats? Hooks? Uncomfortable clothing?</p>\r\n\r\n<p>It is likely that your answers will reveal A Series of Unfortunate Events to be ill-suited for your personal use. A librarian, bookseller, or acquaintance should be able to suggest books more appropriate for your fragile temperament. But to the rarest of readers we say, &quot;Proceed, but cautiously.&quot;</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(10, 10, 1, 'Diary of a Wimpy Kid, Book 1 Hardcover – April 1, 2007', '<p>This edition of Diary of a Wimpy Kid can longer be ordered. Please go to https://www.amazon.com/Diary-Wimpy-Kid/dp/B0051XV5Y6/ref=dp_ob_title_bk to order this title.</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(11, 11, 1, 'Dune (Dune Chronicles, Book 1) Paperback – August 2, 2005', '<p><strong><strong>Frank Herbert&rsquo;s classic masterpiece&mdash;a triumph of the imagination and one of the bestselling science fiction novels of all time.</strong></strong><br />\r\n<br />\r\nSet on the desert planet Arrakis, <em>Dune</em> is the story of the boy Paul Atreides, heir to a noble family tasked with ruling an inhospitable world where the only thing of value is the &ldquo;spice&rdquo; melange, a drug capable of extending life and enhancing consciousness. Coveted across the known universe, melange is a prize worth killing for....<br />\r\n<br />\r\nWhen House Atreides is betrayed, the destruction of Paul&rsquo;s family will set the boy on a journey toward a destiny greater than he could ever have imagined. And as he evolves into the mysterious man known as Muad&rsquo;Dib, he will bring to fruition humankind&rsquo;s most ancient and unattainable dream.&nbsp;<br />\r\n<br />\r\nA stunning blend of adventure and mysticism, environmentalism and politics, <em>Dune</em> won the first Nebula Award, shared the Hugo Award, and formed the basis of what is undoubtedly the grandest epic in science fiction.</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(12, 12, 1, 'Fahrenheit 451 Paperback – January 10, 2012', '<p>Guy Montag is a fireman. His job is to destroy the most illegal of commodities, the printed book, along with the houses in which they are hidden. Montag never questions the destruction and ruin his actions produce, returning each day to his bland life and wife, Mildred, who spends all day with her television &ldquo;family.&rdquo; But when he meets an eccentric young neighbor, Clarisse, who introduces him to a past where people didn&rsquo;t live in fear and to a present where one sees the world through the ideas in books instead of the mindless chatter of television, Montag begins to question everything he has ever known.</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(13, 13, 1, 'Fear and Loathing in Las Vegas: A Savage Journey to the Heart of', '<p>This cult classic of gonzo journalism is the&nbsp;best chronicle of drug-soaked, addle-brained, rollicking good times ever committed to the printed page.&nbsp;&nbsp;It is also the tale of a long weekend road trip that has gone down in the annals of American pop culture as one of the strangest journeys ever undertaken.<br />\r\n<br />\r\nNow &nbsp;a major motion picture from Universal, directed by Terry Gilliam and starring Johnny Depp and Benicio del Toro.</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(14, 14, 1, 'Gone Girl Paperback – April 22, 2014', '<p><strong><strong>NAMED ONE OF THE MOST INFLUENTIAL BOOKS OF THE DECADE BY CNN</strong>&nbsp;&bull; NAMED ONE OF <em>TIME</em>&rsquo;<em>S&nbsp;</em>TEN BEST FICTION BOOKS OF THE DECADE AND ONE OF <em>ENTERTAINMENT WEEKLY</em><strong>&rsquo;</strong>S BEST BOOKS OF THE DECADE</strong><br />\r\n<br />\r\n<strong>NAMED ONE OF THE TEN BEST BOOKS OF THE YEAR BY Janet Maslin,&nbsp;<em>The New York Times&nbsp;</em>&bull;&nbsp;<em>People&nbsp;</em>&bull;&nbsp;<em>Entertainment Weekly&nbsp;</em>&bull;&nbsp;<em>O: The Oprah Magazine&nbsp;</em>&bull;&nbsp;<em>Slate&nbsp;</em>&bull;&nbsp;<em>Kansas City Star&nbsp;</em>&bull;&nbsp;<em>USA Today&nbsp;</em>&bull;&nbsp;<em>Christian Science Monitor</em></strong><br />\r\n<br />\r\nOn a warm summer morning in North Carthage, Missouri, it is Nick and Amy Dunne&rsquo;s fifth wedding anniversary. Presents are being wrapped and reservations are being made when Nick&rsquo;s clever and beautiful wife disappears. Husband-of-the-Year Nick isn&rsquo;t doing himself any favors with cringe-worthy daydreams about the slope and shape of his wife&rsquo;s head, but passages from Amy&#39;s diary reveal the alpha-girl perfectionist could have put anyone dangerously on edge<strong>.</strong>&nbsp;Under mounting pressure from the police and the media&mdash;as well as Amy&rsquo;s fiercely doting parents&mdash;the town golden boy parades an endless series of lies, deceits, and inappropriate behavior. Nick is oddly evasive, and he&rsquo;s definitely bitter&mdash;but is he really a killer?&nbsp;<br />\r\n<br />\r\n<strong>NAMED ONE OF THE BEST BOOKS OF THE YEAR BY</strong>&nbsp;<strong><em>San Francisco Chronicle&nbsp;</em>&bull;&nbsp;<em>St. Louis Post Dispatch&nbsp;</em>&bull;&nbsp;<em>Chicago Tribune&nbsp;</em>&bull;&nbsp;<em>HuffPost&nbsp;</em>&bull;&nbsp;<em>Newsday</em></strong><br />\r\n<br />\r\n&ldquo;Absorbing . . . In masterly fashion, Flynn depicts the unraveling of a marriage&mdash;and of a recession-hit Midwest&mdash;by interweaving the wife&rsquo;s diary entries with the husband&rsquo;s first-person account.&rdquo;<strong>&mdash;<em>New Yorker</em></strong><br />\r\n<br />\r\n&ldquo;Ms. Flynn writes dark suspense novels that anatomize violence without splashing barrels of blood around the pages . . . Ms. Flynn has much more up her sleeve than a simple missing-person case. As Nick and Amy alternately tell their stories, marriage has never looked so menacing, narrators so unreliable.&rdquo;<strong>&mdash;<em>The Wall Street Journal</em></strong><br />\r\n<br />\r\n&ldquo;The story unfolds in precise and riveting prose . . . even while you know you&rsquo;re being manipulated, searching for the missing pieces is half the thrill of this wickedly absorbing tale.&rdquo;<strong>&mdash;<em>O: The Oprah Magazine</em></strong></p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(15, 15, 1, 'Me Talk Pretty One Day Paperback – June 5, 2001', '<p>A recent transplant to Paris, humorist David Sedaris, bestselling author of &quot;Naked&quot;, presents a collection of his strongest work yet, including the title story about his hilarious attempt to learn French. A number one national bestseller now in paperback.</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(16, 16, 1, 'Middlesex: A Novel (Oprah\'s Book Club) Paperback – June 5, 2002', '<p><em>&quot;I was born twice: first, as a baby girl, on a remarkably smogless Detroit day of January 1960; and then again, as a teenage boy, in an emergency room near Petoskey, Michigan, in August of l974. . . My birth certificate lists my name as Calliope Helen Stephanides. My most recent driver&#39;s license...records my first name simply as Cal.&quot;</em><br />\r\n<br />\r\nSo begins the breathtaking story of Calliope Stephanides and three generations of the Greek-American Stephanides family who travel from a tiny village overlooking Mount Olympus in Asia Minor to Prohibition-era Detroit, witnessing its glory days as the Motor City, and the race riots of l967, before they move out to the tree-lined streets of suburban Grosse Pointe, Michigan. To understand why Calliope is not like other girls, she has to uncover a guilty family secret and the astonishing genetic history that turns Callie into Cal, one of the most audacious and wondrous narrators in contemporary fiction. Lyrical and thrilling, <em>Middlesex </em>is an exhilarating reinvention of the American epic.<br />\r\n<br />\r\n<em>Middlesex </em>is the winner of the 2003 Pulitzer Prize for Fiction.</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(17, 17, 1, 'Midnight\'s Children: A Novel (Modern Library 100 Best Novels) Pa', '<p><strong><strong>WINNER OF THE BEST OF THE BOOKERS &bull;&nbsp;SOON TO BE A NETFLIX ORIGINAL SERIES</strong><br />\r\n<strong>&nbsp;</strong><br />\r\n<strong>Selected by the Modern Library as one of the 100 best novels of all time&nbsp;&bull;&nbsp;The twenty-fifth anniversary edition, featuring a new introduction by the author</strong></strong><br />\r\n<br />\r\nSaleem Sinai is born at the stroke of midnight on August 15, 1947, the very moment of India&rsquo;s independence. Greeted by fireworks displays, cheering crowds, and Prime Minister Nehru himself, Saleem grows up to learn the ominous consequences of this coincidence. His every act is mirrored and magnified in events that sway the course of national affairs; his health and well-being are inextricably bound to those of his nation; his life is inseparable, at times indistinguishable, from the history of his country. Perhaps most remarkable are the telepathic powers linking him with India&rsquo;s 1,000 other &ldquo;midnight&rsquo;s children,&rdquo; all born in that initial hour and endowed with magical gifts.<br />\r\n<br />\r\nThis novel is at once a fascinating family saga and an astonishing evocation of a vast land and its people&ndash;a brilliant incarnation of the universal human comedy. Twenty-five years after its publication, Midnight&rsquo; s Children stands apart as both an epochal work of fiction and a brilliant performance by one of the great literary voices of our time.</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(18, 18, 1, 'Moneyball: The Art of Winning an Unfair Game Paperback – March 1', '<p><em>Moneyball</em> is a quest for the secret of success in baseball. In a narrative full of fabulous characters and brilliant excursions into the unexpected, Michael Lewis follows the low-budget Oakland A&#39;s, visionary general manager Billy Beane, and the strange brotherhood of amateur baseball theorists. They are all in search of new baseball knowledge―insights that will give the little guy who is willing to discard old wisdom the edge over big money.</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(19, 19, 1, 'Of Human Bondage (Bantam Classics) Mass Market Paperback – June', '<p><em>Of Human Bondage</em> is the first and most autobiographical of Maugham&#39;s novels. It is the story of Philip Carey, an orphan eager for life, love and adventure. After a few months studying in Heidelberg, and a brief spell in Paris as a would-be artist, Philip settles in London to train as a doctor. And that is where he meets Mildred, the loud but irresistible waitress with whom he plunges into a formative, tortured and masochistic affair which very nearly ruins him.</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(20, 20, 1, 'The Corrections: A Novel Paperback – September 1, 2002', '<p>After almost fifty years as a wife and mother, Enid Lambert is ready to have some fun. Unfortunately, her husband, Alfred, is losing his sanity to Parkinson&#39;s disease, and their children have long since flown the family nest to the catastrophes of their own lives. The oldest, Gary, a once-stable portfolio manager and family man, is trying to convince his wife and himself, despite clear signs to the contrary, that he is not clinically depressed. The middle child, Chip, has lost his seemingly secure academic job and is failing spectacularly at his new line of work. And Denise, the youngest, has escaped a disastrous marriage only to pour her youth and beauty down the drain of an affair with a married man-or so her mother fears. Desperate for some pleasure to look forward to, Enid has set her heart on an elusive goal: bringing her family together for one last Christmas at home.</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(21, 21, 1, 'The Devil in the White City: Murder, Magic, and Madness at the F', '<p>Erik Larson&mdash;author of #1 bestseller <em>In the Garden of Beasts</em>&mdash;intertwines the true tale of the 1893 World&#39;s Fair and the cunning serial killer who used the fair to lure his victims to their death. Combining meticulous research with nail-biting storytelling, Erik Larson has crafted a narrative with all the wonder of newly discovered history and the thrills of the best fiction.</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(22, 22, 1, 'The Diary of a Young Girl Hardcover – October 19, 2010', '<p>In Everyman&rsquo;s Library for the first time&mdash;one of the most moving and eloquent accounts of the Holocaust, read by tens of millions of people around the world since its publication in 1947.<br />\r\n<br />\r\n<em>The Diary of a Young Girl</em> is the record of two years in the life of a remarkable Jewish girl whose triumphant humanity in the face of unfathomable deprivation and fear has made the book one of the most enduring documents of our time.<br />\r\n<br />\r\nThe Everyman&rsquo;s hardcover edition reprints the Definitive Edition authorized by the Frank estate, plus a new introduction, a bibliography, and a chronology of Anne Frank&rsquo;s life and times.</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(23, 23, 1, 'The Fault in Our Stars Paperback – April 8, 2014', '<p><strong>From John Green, the #1 bestselling author of <em>Turtles All the Way Down</em><br />\r\n<br />\r\n&quot;The greatest romance story of this decade.&quot; </strong>&mdash;<em>Entertainment Weekly</em><br />\r\n<br />\r\n<strong>-Millions of copies sold-</strong><br />\r\n<br />\r\n<strong>#1 <em>New York Times</em> Bestseller</strong><br />\r\n<strong>#1 <em>Wall Street Journal</em> Bestseller</strong><br />\r\n<strong>#1 <em>USA Today</em> Bestseller</strong><br />\r\n<strong>#1 International Bestseller</strong><br />\r\n<br />\r\n<strong><strong>TIME Magazine&rsquo;s #1 Fiction Book of 2012</strong><br />\r\nTODAY Book Club pick</strong><br />\r\n<strong>Now a Major Motion Picture</strong><br />\r\n<br />\r\nDespite the tumor-shrinking medical miracle that has bought her a few years, Hazel has never been anything but terminal, her final chapter inscribed upon diagnosis. But when a gorgeous plot twist named Augustus Waters suddenly appears at Cancer Kid Support Group, Hazel&rsquo;s story is about to be completely rewritten.<br />\r\n<br />\r\nInsightful, bold, irreverent, and raw, <em>The Fault in Our Stars</em> brilliantly explores the funny, thrilling, and tragic business of being alive and in love.</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(24, 24, 1, 'The Giver Paperback – January 24, 2006', '<p>Jonas&#39;s world is perfect. Everything is under control. There is no war or fear of pain. There are no choices. Every person is assigned a role in the community. Jonas lives in a seemingly ideal world.<br />\r\n<br />\r\nWhen Jonas turns 12 he is singled out to receive special training from The Giver. The Giver alone holds the memories of the true pain and pleasure of life. Not until he is given his life assignment as the Receiver does Jonas begin to understand the dark secrets behind this fragile community. Now, it is time for Jonas to receive the truth. There is no turning back.</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(28, 28, 1, 'Think Big, Little One (Vashti Harrison) Board book – Illustrated', '<p><strong>This board book edition of <em>Little Dreamers: Visionary Women Around the World</em> by <em>New York Times</em> bestselling author Vashti Harrison is a beautiful first book to teach your little dreamers to follow all their biggest ideas. </strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Featuring eighteen women creators, ranging from writers to inventors, artists to scientists, this board book adaptation of <em>Little Dreamers: Visionary Women Around the World</em> introduces trailblazing women like Mary Blair, an American modernist painter who had a major influence on how color was used in early animated films, environmental activist Wangari Maathai, and architect Zaha Hadid.<br />\r\n<br />\r\nThe irresistible full-color illustrations show the Dreamers as both accessible and aspirational so reader knows they, too, can grow up to do something amazing.</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(29, 29, 1, 'Alternative Spirituality', '<p><strong>Queen Mary University of London, is the editor of Altered Consciousness in the Twentieth Century (Routledge, 2019). His chapters and articles have appeared in The Occult Imagination in Britain (Routledge, 2018), Aries and Aldous Huxley Annual.</strong></p>\r\n\r\n<p>Aldous Huxley and Alternative Spirituality offers an incisive analysis of the full range of Huxley&rsquo;s spiritual interests, spanning both mysticism (neo-Vedanta, Taoism, Mahayana and Zen Buddhism) and Western esotericism (mesmerism, spiritualism, the paranormal). Jake Poller examines how Huxley&rsquo;s shifting spiritual convictions influenced his fiction, such as his depiction of the body and sex, and reveals how Huxley&rsquo;s use of psychedelic substances affected his spiritual convictions, resulting in a Tantric turn in his work. Poller demonstrates how Huxley&rsquo;s vision of a new alternative spirituality in Island, in which the Palanese select their beliefs from different religious traditions, anticipates the New Age spiritual supermarket and traces the profound influence of Huxley&rsquo;s ideas on the spiritual seekers of the twentieth century and beyond.</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(26, 26, 1, 'Marvel Spider-Man Look and Find Activity Book - PI Kids Hardcove', '<p>When J. Jonah Jameson demands photos for the Daily Bugle, Peter Parker hits the streets as Spider-Man, encountering infamous super villans along the way! Help Spidey save the day while you search for hidden objects in eight busy scenes. Then sling to the back of the book for more spectacular Look and Find challenges.<br />\r\n<br />\r\n<strong>This book is super because:</strong></p>\r\n\r\n<ul>\r\n	<li>Look and Find play encourages focus and exploration</li>\r\n	<li>Connecting words with pictures builds vocabulary</li>\r\n	<li>Includes Marvel favorites:Spider-man, Green Goblin, Doctor Octopus (Doc Ock), Mysterio, Electro, Sandman, Lizard, and more!</li>\r\n</ul>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(27, 27, 1, 'The Secret Lake: A children\'s mystery adventure Paperback – Augu', '<p>When Stella and her younger brother, Tom, move to their new London home, they become mystified by the disappearances of Harry, their elderly neighbour&rsquo;s small dog. Where does he go? And why does he keep reappearing wet-through?</p>\r\n\r\n<p>Their quest to solve the riddle over the summer holidays leads to a boat buried under a grassy mound, and a tunnel that takes them to a secret lake.</p>\r\n\r\n<p>Who is the boy rowing towards them who looks so terrified? And whose are those children&rsquo;s voices carried on the wind from beyond the woods?</p>\r\n\r\n<p>Stella and Tom soon discover that they have travelled back in time to their home and its gardens almost 100 years earlier. Here they make both friends and enemies, and uncover startling connections between the past and present.</p>\r\n\r\n<p><strong>A modern children&#39;s classic</strong></p>\r\n\r\n<p>The Secret Lake has been described by readers as a modern Tom&#39;s Midnight Garden and compared in atmosphere with The Secret Garden and the Enid Blyton and Nancy Drew mystery adventure stories. Its page-turning plot, with its many twists and turns, makes it a firm favourite with both boys and girls.</p>\r\n\r\n<p>Karen Inglis describes it as, <em>a time travel mystery adventure with modern twists - the kind of story that I loved to read as a child, but brought right up to date.</em></p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(31, 31, 1, 'Test', '<p>Test productTest productTest product</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0),
(32, 32, 1, 'Test Product 2', '<p>Test Product 2Test Product 2</p>', NULL, 0, NULL, 0, 0, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `htmlcontent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `products_id`, `image`, `htmlcontent`, `sort_order`) VALUES
(1, 1, '144', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_notifications`
--

CREATE TABLE `products_notifications` (
  `products_id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_options`
--

CREATE TABLE `products_options` (
  `products_options_id` int(11) NOT NULL,
  `products_options_name` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_options`
--

INSERT INTO `products_options` (`products_options_id`, `products_options_name`) VALUES
(1, 'color'),
(2, 'size');

-- --------------------------------------------------------

--
-- Table structure for table `products_options_descriptions`
--

CREATE TABLE `products_options_descriptions` (
  `products_options_descriptions_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `options_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products_options_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_options_descriptions`
--

INSERT INTO `products_options_descriptions` (`products_options_descriptions_id`, `language_id`, `options_name`, `products_options_id`) VALUES
(1, 1, 'color', 1),
(2, 1, 'size', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products_options_values`
--

CREATE TABLE `products_options_values` (
  `products_options_values_id` int(11) NOT NULL,
  `products_options_id` int(11) NOT NULL,
  `products_options_values_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_options_values`
--

INSERT INTO `products_options_values` (`products_options_values_id`, `products_options_id`, `products_options_values_name`) VALUES
(1, 1, 'Blck'),
(2, 1, 'Red');

-- --------------------------------------------------------

--
-- Table structure for table `products_options_values_descriptions`
--

CREATE TABLE `products_options_values_descriptions` (
  `products_options_values_descriptions_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `options_values_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_options_values_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_options_values_descriptions`
--

INSERT INTO `products_options_values_descriptions` (`products_options_values_descriptions_id`, `language_id`, `options_values_name`, `products_options_values_id`) VALUES
(1, 1, 'Blck', 1),
(2, 1, 'Red', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products_shipping_rates`
--

CREATE TABLE `products_shipping_rates` (
  `products_shipping_rates_id` int(11) NOT NULL,
  `weight_from` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight_to` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight_price` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `products_shipping_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_shipping_rates`
--

INSERT INTO `products_shipping_rates` (`products_shipping_rates_id`, `weight_from`, `weight_to`, `weight_price`, `unit_id`, `products_shipping_status`) VALUES
(1, '0', '10', 10, 1, 1),
(2, '10', '20', 10, 1, 1),
(3, '20', '30', 10, 1, 1),
(4, '30', '50', 50, 1, 1),
(5, '50', '100000', 70, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_to_categories`
--

CREATE TABLE `products_to_categories` (
  `products_to_categories_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_to_categories`
--

INSERT INTO `products_to_categories` (`products_to_categories_id`, `products_id`, `categories_id`) VALUES
(383, 14, 72),
(361, 7, 85),
(379, 13, 72),
(382, 14, 71),
(381, 14, 70),
(378, 13, 71),
(360, 7, 84),
(359, 7, 82),
(420, 8, 40),
(380, 14, 46),
(419, 8, 84),
(198, 15, 68),
(418, 8, 83),
(177, 20, 57),
(417, 8, 82),
(197, 15, 67),
(176, 20, 54),
(426, 9, 108),
(196, 15, 66),
(175, 20, 42),
(425, 9, 41),
(195, 15, 45),
(424, 9, 77),
(194, 16, 45),
(173, 21, 56),
(423, 9, 76),
(193, 16, 64),
(172, 21, 54),
(371, 10, 40),
(192, 16, 65),
(171, 21, 42),
(370, 10, 76),
(191, 16, 44),
(411, 22, 41),
(369, 10, 75),
(190, 17, 63),
(410, 22, 57),
(368, 10, 74),
(189, 17, 64),
(409, 22, 56),
(214, 11, 80),
(188, 17, 65),
(408, 22, 54),
(213, 11, 79),
(187, 17, 44),
(406, 23, 56),
(212, 11, 78),
(186, 18, 56),
(405, 23, 55),
(211, 11, 48),
(185, 18, 55),
(404, 23, 54),
(375, 12, 73),
(184, 18, 54),
(403, 23, 42),
(374, 12, 72),
(183, 18, 42),
(396, 28, 107),
(373, 12, 70),
(395, 28, 106),
(372, 12, 46),
(414, 19, 55),
(402, 24, 105),
(377, 13, 70),
(413, 19, 54),
(401, 24, 41),
(376, 13, 46),
(412, 19, 42),
(337, 1, 40),
(358, 7, 49),
(357, 6, 97),
(356, 6, 96),
(355, 6, 95),
(354, 6, 52),
(353, 5, 40),
(352, 5, 88),
(351, 5, 87),
(350, 5, 86),
(348, 3, 40),
(347, 3, 41),
(346, 3, 101),
(345, 3, 100),
(342, 2, 40),
(341, 2, 89),
(340, 2, 88),
(339, 2, 87),
(400, 24, 56),
(399, 24, 55),
(344, 3, 99),
(343, 3, 53),
(394, 28, 105),
(393, 28, 108),
(391, 26, 107),
(390, 26, 106),
(389, 26, 105),
(388, 26, 41),
(387, 27, 106),
(386, 27, 105),
(385, 27, 41),
(392, 28, 41),
(407, 22, 42),
(384, 29, 40),
(338, 2, 50),
(349, 5, 50),
(416, 8, 49),
(367, 10, 47),
(422, 9, 74),
(421, 9, 47),
(398, 24, 54),
(397, 24, 42),
(428, 31, 42),
(429, 31, 46),
(430, 31, 47),
(435, 32, 42);

-- --------------------------------------------------------

--
-- Table structure for table `razorpay_res`
--

CREATE TABLE `razorpay_res` (
  `id` int(20) NOT NULL,
  `razorpay_payment_id` varchar(100) DEFAULT NULL,
  `entity` varchar(50) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `currency` varchar(10) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `order_id` varchar(100) DEFAULT NULL,
  `sale_id` int(20) DEFAULT NULL,
  `invoice_id` varchar(100) DEFAULT NULL,
  `international` varchar(100) DEFAULT NULL,
  `method` varchar(100) DEFAULT NULL,
  `amount_refunded` varchar(100) DEFAULT NULL,
  `refund_status` varchar(100) DEFAULT NULL,
  `captured` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `card_id` varchar(100) DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `wallet` varchar(100) DEFAULT NULL,
  `vpa` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `fee` varchar(100) DEFAULT NULL,
  `tax` varchar(100) DEFAULT NULL,
  `error_code` varchar(100) DEFAULT NULL,
  `error_description` varchar(255) DEFAULT NULL,
  `error_source` varchar(100) DEFAULT NULL,
  `error_step` varchar(100) DEFAULT NULL,
  `error_reason` varchar(255) DEFAULT NULL,
  `step` varchar(100) DEFAULT NULL,
  `reason` varchar(100) DEFAULT NULL,
  `metadata` longtext DEFAULT NULL,
  `type` text DEFAULT NULL,
  `createdat` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `razorpay_res`
--

INSERT INTO `razorpay_res` (`id`, `razorpay_payment_id`, `entity`, `source`, `amount`, `currency`, `status`, `order_id`, `sale_id`, `invoice_id`, `international`, `method`, `amount_refunded`, `refund_status`, `captured`, `description`, `card_id`, `bank`, `wallet`, `vpa`, `email`, `contact`, `fee`, `tax`, `error_code`, `error_description`, `error_source`, `error_step`, `error_reason`, `step`, `reason`, `metadata`, `type`, `createdat`, `created_at`, `updated_at`) VALUES
(1, 'pay_G6687Q9eouEJlx', 'payment', NULL, 100, 'INR', 'authorized', 'order_G6680gnsMhU5Wd', 14, NULL, '0', 'netbanking', '0', NULL, '0', NULL, NULL, 'HDFC', NULL, NULL, 'teamwavechd@gmail.com', '21313123213213', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'membership', '1606459416', '2020-11-27 06:43:30', '2020-11-27 07:31:07'),
(2, NULL, NULL, 'bank', 0, NULL, 'failed', 'order_G66AJ3JClLlAPH', 15, NULL, NULL, NULL, NULL, NULL, NULL, 'Payment failed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'payment_authorization', 'payment_failed', '{\"payment_id\":\"pay_G66APhscmOeWAD\",\"order_id\":\"order_G66AJ3JClLlAPH\"}', 'membership', NULL, '2020-11-27 06:45:40', '2020-11-27 07:38:33'),
(3, 'pay_G66QOsyq11NGpl', 'payment', NULL, 100, 'INR', 'authorized', 'order_G66QHtT6xO0NwG', 16, NULL, '0', 'netbanking', '0', NULL, '0', NULL, NULL, 'HDFC', NULL, NULL, 'teamwavechd@gmail.com', '21313123213213', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'membership', '1606460454', '2020-11-27 07:00:48', '2020-11-27 07:38:47'),
(4, 'pay_G66jjyagZhLLLY', 'payment', NULL, 200, 'INR', 'authorized', 'order_G66jcWwmSU8dZi', 17, NULL, '0', 'netbanking', '0', NULL, '0', NULL, NULL, 'HDFC', NULL, NULL, 'teamwavechd@gmail.com', '21313123213213', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'membership', '1606461553', '2020-11-27 07:19:06', '2020-11-27 07:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviews_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `customers_id` int(11) DEFAULT NULL,
  `customers_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reviews_rating` int(11) DEFAULT NULL,
  `review_comment` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reviews_status` tinyint(1) NOT NULL DEFAULT 0,
  `reviews_read` int(11) NOT NULL DEFAULT 0,
  `vendors_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviews_id`, `products_id`, `customers_id`, `customers_name`, `reviews_rating`, `review_comment`, `reviews_status`, `reviews_read`, `vendors_id`, `created_at`, `updated_at`) VALUES
(1, 3, 4, NULL, 4, 'Nice Book', 0, 0, NULL, NULL, NULL),
(4, 3, 4, NULL, 5, 'good', 0, 0, NULL, NULL, NULL),
(10, 3, 4, NULL, 2, 'ok', 0, 0, NULL, NULL, NULL),
(9, 1, 4, NULL, 4, 'Good', 0, 0, NULL, NULL, NULL),
(11, 3, 4, NULL, 2, 'ok1', 0, 0, NULL, NULL, NULL),
(12, 3, 4, NULL, 3, 'ok2', 0, 0, NULL, NULL, NULL),
(13, 3, 4, NULL, 3, 'ok3', 0, 0, NULL, NULL, NULL),
(14, 3, 4, NULL, 3, 'ok4', 0, 0, NULL, NULL, NULL),
(15, 3, 4, NULL, 4, 'nico', 0, 0, NULL, NULL, NULL),
(16, 1, 22, NULL, 2, 'ok', 0, 0, NULL, NULL, NULL),
(17, 1, 22, NULL, 1, 'ok1', 0, 0, NULL, NULL, NULL),
(18, 1, 4, NULL, 2, 'yes', 0, 0, NULL, NULL, NULL),
(19, 18, 32, NULL, 1, 'bkhkhjkjhk', 0, 0, NULL, NULL, NULL),
(20, 31, 37, NULL, 2, 'Testing review', 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews_description`
--

CREATE TABLE `reviews_description` (
  `reviews_id` int(11) NOT NULL,
  `languages_id` int(11) NOT NULL,
  `reviews_text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sec_directory_whitelist`
--

CREATE TABLE `sec_directory_whitelist` (
  `id` int(11) NOT NULL,
  `directory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `sesskey` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry` int(10) UNSIGNED NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'facebook_app_id', '396202891789209', '2018-04-27 04:00:00', '2020-11-07 16:04:52'),
(2, 'facebook_secret_id', 'a76d3af119ce327d78845573e79e28f6', '2018-04-27 04:00:00', '2020-11-07 16:04:52'),
(3, 'facebook_login', '1', '2018-04-27 04:00:00', '2020-11-07 16:04:52'),
(4, 'contact_us_email', 'admin@apnamal.com', '2018-04-27 04:00:00', '2020-11-05 12:30:16'),
(5, 'address', 'SCO 44, Sector 5, MDC', '2018-04-27 04:00:00', '2020-11-05 12:30:16'),
(6, 'city', 'Panchkula', '2018-04-27 04:00:00', '2020-11-05 12:30:16'),
(7, 'state', 'Haryana', '2018-04-27 04:00:00', '2020-11-05 12:30:16'),
(8, 'zip', '134109', '2018-04-27 04:00:00', '2020-11-05 12:30:16'),
(9, 'country', 'India', '2018-04-27 04:00:00', '2020-11-05 12:30:16'),
(10, 'latitude', 'Latitude', '2018-04-27 04:00:00', '2020-11-05 12:30:16'),
(11, 'longitude', 'Longitude', '2018-04-27 04:00:00', '2020-11-05 12:30:16'),
(12, 'phone_no', '+91-9816078320', '2018-04-27 04:00:00', '2020-11-05 12:30:16'),
(13, 'fcm_android', '', '2018-04-27 04:00:00', '2019-02-05 16:42:15'),
(14, 'fcm_ios', NULL, '2018-04-27 04:00:00', NULL),
(15, 'fcm_desktop', NULL, '2018-04-27 04:00:00', NULL),
(16, 'website_logo', 'images/media/2021/02/eOmoL09907.png', '2018-04-27 04:00:00', '2021-02-09 12:56:24'),
(17, 'fcm_android_sender_id', NULL, '2018-04-27 04:00:00', NULL),
(18, 'fcm_ios_sender_id', '', '2018-04-27 04:00:00', '2019-02-05 16:42:15'),
(19, 'app_name', 'www.apnamal.com', '2018-04-27 04:00:00', '2020-11-05 12:30:16'),
(20, 'currency_symbol', 'Rs', '2018-04-27 04:00:00', '2018-11-19 12:26:01'),
(21, 'new_product_duration', '20', '2018-04-27 04:00:00', '2020-11-05 12:30:16'),
(22, 'notification_title', 'Ionic Ecommerce', '2018-04-27 04:00:00', '2019-05-15 14:58:30'),
(23, 'notification_text', 'A bundle of products waiting for you!', '2018-04-27 04:00:00', NULL),
(24, 'lazzy_loading_effect', 'Detail', '2018-04-27 04:00:00', '2019-05-15 14:58:30'),
(25, 'footer_button', '1', '2018-04-27 04:00:00', '2019-05-15 14:58:30'),
(26, 'cart_button', '1', '2018-04-27 04:00:00', '2019-05-15 14:58:30'),
(27, 'featured_category', NULL, '2018-04-27 04:00:00', NULL),
(28, 'notification_duration', 'year', '2018-04-27 04:00:00', '2019-05-15 14:58:30'),
(29, 'home_style', '1', '2018-04-27 04:00:00', '2019-05-15 14:58:30'),
(30, 'wish_list_page', '1', '2018-04-27 04:00:00', '2019-05-15 14:58:30'),
(31, 'edit_profile_page', '1', '2018-04-27 04:00:00', '2019-05-15 14:58:30'),
(32, 'shipping_address_page', '1', '2018-04-27 04:00:00', '2019-05-15 14:58:30'),
(33, 'my_orders_page', '1', '2018-04-27 04:00:00', '2019-05-15 14:58:30'),
(34, 'contact_us_page', '1', '2018-04-27 04:00:00', '2019-05-15 14:58:30'),
(35, 'about_us_page', '1', '2018-04-27 04:00:00', '2019-05-15 14:58:30'),
(36, 'news_page', '1', '2018-04-27 04:00:00', '2019-05-15 14:58:30'),
(37, 'intro_page', '1', '2018-04-27 04:00:00', '2019-05-15 14:58:30'),
(38, 'setting_page', '1', '2018-04-27 04:00:00', NULL),
(39, 'share_app', '1', '2018-04-27 04:00:00', '2019-05-15 14:58:30'),
(40, 'rate_app', '1', '2018-04-27 04:00:00', '2019-05-15 14:58:30'),
(41, 'site_url', 'URL', '2018-04-27 04:00:00', '2018-11-19 12:26:01'),
(42, 'admob', '0', '2018-04-27 04:00:00', '2019-05-15 14:58:05'),
(43, 'admob_id', 'ID', '2018-04-27 04:00:00', '2019-05-15 14:58:05'),
(44, 'ad_unit_id_banner', 'Unit ID', '2018-04-27 04:00:00', '2019-05-15 14:58:05'),
(45, 'ad_unit_id_interstitial', 'Indestrial', '2018-04-27 04:00:00', '2019-05-15 14:58:05'),
(46, 'category_style', '4', '2018-04-27 04:00:00', '2019-05-15 14:58:30'),
(47, 'package_name', 'package name', '2018-04-27 04:00:00', '2019-05-15 14:58:30'),
(48, 'google_analytic_id', 'test', '2018-04-27 04:00:00', '2019-05-15 14:58:30'),
(49, 'themes', 'themeone', '2018-04-27 04:00:00', NULL),
(50, 'company_name', '#', '2018-04-27 04:00:00', '2019-10-07 13:52:24'),
(51, 'facebook_url', 'https://www.facebook.com/', '2018-04-27 04:00:00', '2021-02-09 12:56:24'),
(52, 'google_url', '#', '2018-04-27 04:00:00', '2021-02-09 12:56:24'),
(53, 'twitter_url', 'https://twitter.com/', '2018-04-27 04:00:00', '2021-02-09 12:56:24'),
(54, 'linked_in', 'https://www.instagram.com/', '2018-04-27 04:00:00', '2021-02-09 12:56:24'),
(55, 'default_notification', 'onesignal', '2018-04-27 04:00:00', '2019-02-05 16:42:15'),
(56, 'onesignal_app_id', '6053d948-b8f6-472a-87e4-379fa89f78d8', '2018-04-27 04:00:00', '2019-02-05 16:42:15'),
(57, 'onesignal_sender_id', '50877237723', '2018-04-27 04:00:00', '2019-02-05 16:42:15'),
(58, 'ios_admob', '1', '2018-04-27 04:00:00', '2019-05-15 14:58:05'),
(59, 'ios_admob_id', 'AdMob ID', '2018-04-27 04:00:00', '2019-05-15 14:58:05'),
(60, 'ios_ad_unit_id_banner', 'Unit ID Banner', '2018-04-27 04:00:00', '2019-05-15 14:58:05'),
(61, 'ios_ad_unit_id_interstitial', 'ID Interstitial', '2018-04-27 04:00:00', '2019-05-15 14:58:05'),
(62, 'google_login', '1', NULL, '2020-11-07 16:05:07'),
(63, 'google_app_id', NULL, NULL, NULL),
(64, 'google_secret_id', NULL, NULL, NULL),
(65, 'google_callback_url', NULL, NULL, NULL),
(66, 'facebook_callback_url', NULL, NULL, NULL),
(67, 'is_app_purchased', '0', NULL, '2018-05-04 07:24:44'),
(68, 'is_web_purchased', '1', NULL, '2018-05-04 07:24:44'),
(69, 'consumer_key', 'dadb7a7c1557917902724bbbf5', NULL, '2019-05-15 14:58:22'),
(70, 'consumer_secret', '3ba77f821557917902b1d57373', NULL, '2019-05-15 14:58:22'),
(71, 'order_email', 'admin@apnamal.com', NULL, '2020-11-05 12:30:16'),
(72, 'website_themes', '1', NULL, NULL),
(73, 'seo_title', '', NULL, '2018-11-19 12:21:57'),
(74, 'seo_metatag', '', NULL, '2018-11-19 12:21:57'),
(75, 'seo_keyword', '', NULL, '2018-11-19 12:21:57'),
(76, 'seo_description', '', NULL, '2018-11-19 12:21:57'),
(77, 'before_head_tag', '', NULL, '2018-11-19 12:22:15'),
(78, 'end_body_tag', 'logo', NULL, '2021-02-09 12:56:24'),
(79, 'sitename_logo', 'Library World Book', NULL, '2021-02-09 12:56:24'),
(80, 'website_name', '<strong>E</strong>COMMERCE', NULL, '2018-11-19 12:22:25'),
(81, 'web_home_pages_style', 'two', NULL, '2018-11-19 12:22:25'),
(82, 'web_color_style', 'app', NULL, '2018-11-19 12:22:25'),
(83, 'free_shipping_limit', '400', NULL, '2020-11-05 12:30:16'),
(84, 'app_icon_image', 'icon', NULL, '2019-02-05 15:12:59'),
(85, 'twilio_status', '0', NULL, NULL),
(86, 'twilio_authy_api_id', '1213213', NULL, NULL),
(87, 'favicon', '', NULL, NULL),
(88, 'Thumbnail_height', '150', NULL, NULL),
(89, 'Thumbnail_width', '150', NULL, NULL),
(90, 'Medium_height', '400', NULL, NULL),
(91, 'Medium_width', '400', NULL, NULL),
(92, 'Large_height', '900', NULL, NULL),
(93, 'Large_width', '900', NULL, NULL),
(94, 'environment', 'production', NULL, '2020-11-05 12:30:16'),
(95, 'maintenance_text', 'Maintenance', NULL, '2020-11-05 12:30:16'),
(96, 'package_charge_taxt', '0', NULL, NULL),
(97, 'order_commission', '0', NULL, NULL),
(98, 'all_items_price_included_tax', 'yes', NULL, NULL),
(99, 'all_items_price_included_tax_value', '0', NULL, NULL),
(100, 'driver_accept_multiple_order', '1', NULL, NULL),
(101, 'min_order_price', '100', NULL, '2020-11-05 12:30:16'),
(102, 'youtube_link', '0', NULL, NULL),
(103, 'external_website_link', 'https://www.apnamal.com/', NULL, '2020-11-05 12:30:16'),
(104, 'google_map_api', '', NULL, '2020-11-05 12:30:16'),
(105, 'is_pos_purchased', '0', NULL, NULL),
(106, 'admin_version', '4.0.6', NULL, NULL),
(107, 'app_version', '4.0', NULL, NULL),
(108, 'web_version', '4.0.6', NULL, NULL),
(109, 'pos_version', '0', NULL, NULL),
(110, 'android_app_link', '#', NULL, NULL),
(111, 'iphone_app_link', '#', NULL, NULL),
(112, 'about_content', 'Lorum Ipsum Upsum Kupsum Jipsum Mipsum Lorum Ipsum Upsum Kupsum Jipsum Mipsum Lorum Ipsum Upsum Kupsum Jipsum Mipsum Lorum Ipsum Upsum Kupsum Jipsum Mipsum Lorum Ipsum Upsum Kupsum Jipsum Mipsum Lorum Ipsum Upsum Kupsum Jipsum Mipsum Lorum Ipsum Upsum Kupsum Jipsum Mipsum', NULL, '2021-02-09 12:56:24'),
(113, 'contact_content', 'Lorum Ipsum Upsum Kupsum Jipsum Mipsum Lorum Ipsum Upsum Kupsum Jipsum Mipsum Lorum Ipsum Upsum Kupsum Jipsum Mipsum Lorum Ipsum Upsum Kupsum Jipsum Mipsum Lorum Ipsum Upsum Kupsum Jipsum Mipsum Lorum Ipsum Upsum Kupsum Jipsum Mipsum Lorum Ipsum Upsum Kupsum Jipsum Mipsum', NULL, '2021-02-09 12:56:24'),
(114, 'testkh', '2654', NULL, NULL),
(115, 'fb_redirect_url', 'https://www.apnamal.com/login/facebook/callback', NULL, '2020-11-07 16:04:52'),
(116, 'google_client_id', '843370875009-750eegcsc1l13koel9vvip79btahb4sr.apps.googleusercontent.com', NULL, '2020-11-07 16:05:07'),
(117, 'google_client_secret', '3d4MG0GRIfG6vGv9oaOJqDgk', NULL, '2020-11-07 16:05:07'),
(118, 'google_redirect_url', 'https://www.apnamal.com/login/google/callback', NULL, '2020-11-07 16:05:07'),
(119, 'admin_charges', '10', NULL, '2020-11-05 12:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_description`
--

CREATE TABLE `shipping_description` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` int(11) NOT NULL,
  `table_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_labels` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_description`
--

INSERT INTO `shipping_description` (`id`, `name`, `language_id`, `table_name`, `sub_labels`) VALUES
(1, 'Free Shipping', 1, 'free_shipping', ''),
(4, 'Local Pickup', 1, 'local_pickup', ''),
(7, 'Flat Rate', 1, 'flate_rate', ''),
(10, 'UPS Shipping', 1, 'ups_shipping', '{\"nextDayAir\":\"Next Day Air\",\"secondDayAir\":\"2nd Day Air\",\"ground\":\"Ground\",\"threeDaySelect\":\"3 Day Select\",\"nextDayAirSaver\":\"Next Day AirSaver\",\"nextDayAirEarlyAM\":\"Next Day Air Early A.M.\",\"secondndDayAirAM\":\"2nd Day Air A.M.\"}'),
(13, 'Shipping Price', 1, 'shipping_by_weight', '');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_methods`
--

CREATE TABLE `shipping_methods` (
  `shipping_methods_id` int(11) NOT NULL,
  `methods_type_link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isDefault` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_methods`
--

INSERT INTO `shipping_methods` (`shipping_methods_id`, `methods_type_link`, `isDefault`, `status`, `table_name`) VALUES
(1, 'upsShipping', 0, 0, 'ups_shipping'),
(2, 'freeShipping', 0, 0, 'free_shipping'),
(3, 'localPickup', 0, 0, 'local_pickup'),
(4, 'flateRate', 1, 0, 'flate_rate'),
(5, 'shippingByWeight', 0, 1, 'shipping_by_weight');

-- --------------------------------------------------------

--
-- Table structure for table `sliders_images`
--

CREATE TABLE `sliders_images` (
  `sliders_id` int(11) NOT NULL,
  `sliders_title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sliders_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carousel_id` int(11) DEFAULT NULL,
  `sliders_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sliders_group` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sliders_html_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_date` datetime NOT NULL,
  `date_added` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `type` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_status_change` datetime DEFAULT NULL,
  `languages_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders_images`
--

INSERT INTO `sliders_images` (`sliders_id`, `sliders_title`, `sliders_url`, `carousel_id`, `sliders_image`, `sliders_group`, `sliders_html_text`, `expires_date`, `date_added`, `status`, `type`, `date_status_change`, `languages_id`) VALUES
(35, 'home-3-slide', 'electronic', 1, '267', '', '', '2021-12-30 00:00:00', '2021-02-12 12:17:29', 1, 'category', '2021-02-12 12:17:29', 1),
(32, 'home-2-slide', 'electronic', 1, '268', '', '', '2021-12-31 00:00:00', '2021-02-12 12:17:02', 1, 'category', '2021-02-12 12:17:02', 1),
(31, 'home-1-slide', 'electronic', 1, '269', '', '', '2021-12-31 00:00:00', '2021-02-12 12:16:29', 1, 'category', '2021-02-12 12:16:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `specials`
--

CREATE TABLE `specials` (
  `specials_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `specials_new_products_price` decimal(15,2) NOT NULL,
  `specials_date_added` int(11) NOT NULL,
  `specials_last_modified` int(11) NOT NULL,
  `expires_date` int(11) NOT NULL,
  `date_status_change` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_class`
--

CREATE TABLE `tax_class` (
  `tax_class_id` int(11) NOT NULL,
  `tax_class_title` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_class_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tax_class`
--

INSERT INTO `tax_class` (`tax_class_id`, `tax_class_title`, `tax_class_description`, `last_modified`, `date_added`, `created_at`, `updated_at`) VALUES
(1, 'Sales Tax', NULL, NULL, '0000-00-00 00:00:00', '2020-10-31 08:27:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tax_rates`
--

CREATE TABLE `tax_rates` (
  `tax_rates_id` int(11) NOT NULL,
  `tax_zone_id` int(11) NOT NULL,
  `tax_class_id` int(11) NOT NULL,
  `tax_priority` int(11) DEFAULT 1,
  `tax_rate` decimal(7,2) NOT NULL,
  `tax_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tax_rates`
--

INSERT INTO `tax_rates` (`tax_rates_id`, `tax_zone_id`, `tax_class_id`, `tax_priority`, `tax_rate`, `tax_description`, `last_modified`, `date_added`, `created_at`, `updated_at`) VALUES
(1, 192, 1, 1, '10.00', 'This is sales tax', NULL, '0000-00-00 00:00:00', '2020-10-31 08:28:30', '2020-10-31 08:54:07'),
(2, 187, 1, 1, '5.00', 'Tax Description', NULL, '0000-00-00 00:00:00', '2020-10-31 08:29:10', '2020-10-31 08:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `date_added` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `is_active`, `date_added`, `last_modified`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, '2019-01-01 13:04:18', '2019-01-01 13:04:18'),
(2, 1, NULL, NULL, '2019-01-01 13:04:18', '2019-01-01 13:04:18'),
(3, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units_descriptions`
--

CREATE TABLE `units_descriptions` (
  `units_description_id` int(10) UNSIGNED NOT NULL,
  `units_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `languages_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units_descriptions`
--

INSERT INTO `units_descriptions` (`units_description_id`, `units_name`, `languages_id`, `unit_id`, `created_at`, `updated_at`) VALUES
(1, 'Gram', 1, 1, '2019-01-01 13:04:18', '2019-01-01 13:04:18'),
(2, 'غرام', 2, 1, '2019-01-01 13:04:18', '2019-01-01 13:04:18'),
(3, 'Kilogram', 1, 2, '2019-01-01 13:04:18', '2019-01-01 13:04:18'),
(4, 'كيلوغرام', 2, 2, '2019-01-01 13:04:18', '2019-01-01 13:04:18'),
(5, 'Dozen', 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ups_shipping`
--

CREATE TABLE `ups_shipping` (
  `ups_id` int(11) NOT NULL,
  `pickup_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isDisplayCal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serviceType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shippingEnvironment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_package` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parcel_height` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parcel_width` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ups_shipping`
--

INSERT INTO `ups_shipping` (`ups_id`, `pickup_method`, `isDisplayCal`, `serviceType`, `shippingEnvironment`, `user_name`, `access_key`, `password`, `person_name`, `company_name`, `phone_number`, `address_line_1`, `address_line_2`, `country`, `state`, `post_code`, `city`, `no_of_package`, `parcel_height`, `parcel_width`, `title`) VALUES
(1, '07', '', 'US_01,US_02,US_03,US_12,US_13,US_14,US_59', '0', 'nyblueprint', 'FCD7C8F94CB5EF46', 'delfia11', '', '', '', 'D Ground', '', 'US', 'NY', '10312', 'New York City', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `user_type` int(1) NOT NULL DEFAULT 1,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_address_id` int(11) NOT NULL DEFAULT 0,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone` int(11) DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_pass` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `phone_verified` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_id_tiwilo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(33) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkdein_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rss_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `user_type`, `user_name`, `company`, `first_name`, `last_name`, `gender`, `default_address_id`, `country_code`, `zone`, `phone`, `email`, `password`, `show_pass`, `avatar`, `status`, `is_seen`, `phone_verified`, `remember_token`, `auth_id_tiwilo`, `dob`, `company_description`, `facebook_link`, `twitter_link`, `linkdein_link`, `rss_link`, `created_at`, `updated_at`) VALUES
(1, 1, 0, NULL, NULL, 'Apnamal', 'admin', NULL, 0, NULL, NULL, '9041065990', 'admin@apnamal.com', '$2y$10$gprlIrDkALokW8SuMqL6IOoeZnjRpVnhvWLkPzj94utukN1JHHaaS', 'wavedemo', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-17 15:08:03', '2021-05-07 00:52:55'),
(33, 2, 1, NULL, NULL, 's', 'k singh', NULL, 0, NULL, NULL, NULL, 'indiaecommercesmart@gmail.com', '$2y$10$XXl5BH31XV3WmuQRFu682eRGVWpmkAk8aL4.lf/yqqgl8mX6SlERC', '9c671a1b', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2020-12-17 15:25:38'),
(30, 2, 1, NULL, NULL, 'neha', 'waveinfotech', '0', 0, NULL, NULL, NULL, 'neha.waveinfotech.biz@gmail.com', '$2y$10$ajJWApiRzGXhmm8zAPBhCOL7xwj4zeY.uAJKe8fBKi4B0/JJjmdOe', '5e0c203f', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2020-11-06 12:11:21'),
(31, 2, 1, NULL, NULL, 'Rahul', 'Kumar', NULL, 0, NULL, NULL, NULL, 'rahul.wave.biz@gmail.com', '$2y$10$7/btNQA7XFsWNPXXAhRnWu5.bZ9T9/pdebFQu4tupmwDCVGG29eJG', '9bb63e56', NULL, '1', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2020-11-09 13:55:04'),
(32, 2, 1, NULL, NULL, 'Wave', 'Infotech', NULL, 0, NULL, NULL, NULL, 'waveinfotech.biz@gmail.com', '$2y$10$5ZrGFrqF.XToeNemruUgCeaWxbq3TZVkOElgzYS6FOuswX5lzRQb6', '39cdd023', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-02-23 08:13:22'),
(4, 2, 1, NULL, NULL, 'Wave', 'Infotech', '1', 0, '223', 1, '21313123213213', 'teamwavechd@gmail.com', '$2y$10$3CDmchk/f65hIREahsExo.ri41btFUfGsOvcR8bH1GKZ8vURJdoSS', '1234', 'resources/assets/images/user_profile/1603457262.nitin-f2369790453b211108889973820e0208-b.jpg', '1', 1, NULL, NULL, NULL, '2020-10-21', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2020-11-07 10:29:23'),
(9, 2, 1, NULL, NULL, 'rahul', 'wave', NULL, 0, '223', 1, '420840420840', 'wave.biz@gmail.com', '$2y$10$lRpnGMKTwRSPtTdUBiiZ1O19ZCJYfNKJD92ind7xCJecEP3D4gTkK', '123456dfdfdf', NULL, '1', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-30 13:01:00', '2021-06-04 07:41:49'),
(22, 2, 2, NULL, 'Wave Infotech', 'Wave', 'Books', '1', 0, '99', 192, '98765465498712', 'wave@gmail.com', '$2y$10$qkKMB/O6crg00DeQC6t0u.zDqKxQP/kjT4KDfdyjrduz1GVs5FAF6', '123456', 'resources/assets/images/user_profile/1604568505.avatar10.jpg', '1', 0, NULL, NULL, NULL, '2010-04-04', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://www.facebook.com/', 'https://twitter.com/', 'https://in.linkedin.com/', 'https://rss.com/', '2020-11-02 06:59:04', '2020-11-06 16:16:34'),
(10, 2, 1, NULL, NULL, 'fasfasf', 'fasf', NULL, 0, '223', 1, '2143124214', 'nitinwaveinfotech@gmail.comfasfasfasf', '$2y$10$swhv1c1MzNTyWRa5VkgnR.133PiKuZ91exJy87yPEcej2pRu7P57a', '123456dfdfdf', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-30 13:06:09', '2020-10-30 13:06:09'),
(11, 2, 1, NULL, NULL, 'asfasfa', 'sfasfasf', NULL, 0, '223', 1, '23462362346', 'digitalworldus@gmail.comwetwertesgds', '$2y$10$7XZ0H2cBN.aZYCNIvefFP.GZMVMyfJ3Eyqiw4KSVRhZdFQ8HPEUaW', '123456dfdfdf', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-30 13:07:06', '2020-10-30 13:07:06'),
(12, 2, 1, NULL, NULL, 'SASA', 'FSAFSA', NULL, 0, '99', 187, 'asfasfasf', 'test@gmail.com21321', '$2y$10$ndAtAV0AeH.IRyo8PpVlieK0L1KFQhAg.lO8mI26htXKnP6Q87pRC', '123456dfdfdf', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-31 10:40:17', '2020-10-31 10:40:17'),
(13, 2, 1, NULL, NULL, 'sdfasfas', 'fasfasfasf', NULL, 0, '99', 192, 'asfasf', 'abc@gmail.com7896', '$2y$10$ZemeXn2.NpSAbcJ7PY2fcu0zSVDORJIA7IAjGjefEz0AAk3xgOdZi', '123456dfdfdf', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-31 10:42:36', '2020-10-31 10:42:36'),
(14, 2, 1, NULL, NULL, 'rh', 'rfhsdhsdhsdh', NULL, 0, '99', 187, 'fdgdfgcxvb', 'abc@gmail.com2134', '$2y$10$A63Qymce3mcj5kJftiRm1OqTi5LZsnX6Emgl676j9YHDA2ivILPsS', '123456dfdfdf', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-31 11:00:59', '2020-10-31 11:00:59'),
(15, 2, 1, NULL, NULL, 'asf', 'safasfasfasf', NULL, 0, '99', 190, 'safasf', 'abc@gmail.com5645', '$2y$10$oSi0ZUGzhb9.eUTjQ99YL.1/VLEosJ3fvERqPoenuRH7OwbP1EBVm', '123456dfdfdf', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-31 11:02:51', '2020-10-31 11:02:51'),
(16, 2, 1, NULL, NULL, 'ad', 'aDAdaDD', NULL, 0, '99', 192, 'sgasgas', 'dfd@gmail.com8970', '$2y$10$SaoIhWvVigCvBJXee7Uw1uAT9jnv6th02udOcisR0iVPzhpBmf5NO', '123456dfdfdf', NULL, '1', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-31 11:04:21', '2020-11-09 13:54:51'),
(17, 2, 1, NULL, NULL, 'ada', 'DAdaD', NULL, 0, '99', 191, 'dsgds', 'teamwavechd@gmail.com98098', '$2y$10$WHPXTOnkArDyQh723p90JuBJLNHQghC1mPug3SC1BBbfgeSqWLpIq', '123456dfdfdf', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-31 11:05:04', '2020-10-31 11:05:04'),
(18, 2, 1, NULL, NULL, 'asf', 'asfsafasf', NULL, 0, '99', 193, 'dsg', 'pankajwaveinfo@gmail.com123124', '$2y$10$zPWuXByjPkdWuLgz3acQiOk44rwE4UG7loLKjqSrzFnRpd1eCXZK.', '123456dfdfdf', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-31 11:07:00', '2020-10-31 11:07:00'),
(19, 2, 1, NULL, NULL, 'safasf', 'asfsafasf', NULL, 0, '99', 191, 'fsaf', 'dfd@gmail.com4643', '$2y$10$sD/3SdwnDeK2NovkTCAQLuxuhe.uFjvRH6kUbis/NcLSlpEJvhMr2', '123456dfdfdf', NULL, '1', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-31 11:07:59', '2020-11-05 16:20:35'),
(20, 2, 1, NULL, NULL, 'asdfsafgas', 'fgasgasgasg', NULL, 0, '99', 192, 'saiupiupiu', 'pankajwaveinfo@gmail.com89012', '$2y$10$Caz9fgVNUNQnxKivP2edFO9Bcq5VnPFRFrLygbacDxEuueg4eT10m', '123456dfdfdf', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-31 11:13:14', '2020-10-31 11:13:14'),
(21, 2, 1, NULL, NULL, 'sdgfsdsdgsdg', 'sdgsdgsdg', NULL, 0, '99', 195, 'sdgsdg', 'pankajwaveinfo@gmail.com', '$2y$10$.trGyxwpF0Jy.fjcQHuPMuxylH6.Gbp7nPQk2tRvHNYPsI5ko0L1O', '123456dfdfdf', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-31 12:28:33', '2020-10-31 12:28:33'),
(23, 2, 1, NULL, NULL, 'seafood', 'seefood', NULL, 0, '99', 184, '09041065990', 'admin@gmail.com', '$2y$10$7Y6Pc/sGM3tqrWBNnFcSeuqm8/UUtSXrQAkjR8ILr9DSkJ7PL/G0u', '123456dfdfdf', NULL, '1', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-04 11:22:26', '2020-11-04 12:57:31'),
(34, 2, 1, NULL, NULL, 'Tarun', 'varshney', NULL, 0, NULL, NULL, NULL, 'varshney.5tarun@gmail.com', '$2y$10$.7cbNSaq809nBvLVqR6h7.Sr2vIChstr1FYDOPJbpeZLxlKb3zTFe', '9313f662', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2021-01-06 09:49:07'),
(35, 2, 2, NULL, 'avinash book store', 'avinash lawania', NULL, NULL, 0, '99', 209, '545645646', 'avinash.waveinfotech.biz@gmail.com', '$2y$10$soHnzpo9N7DlS8YGKXHILOEZ7o4Z4gMtA2dcgKqE0tHzRaJykSBX2', '12345', NULL, '1', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-19 05:22:31', '2021-02-11 06:48:33'),
(36, 2, 2, NULL, 'sadfd', 'asfdasf sdsdff', NULL, NULL, 0, '99', 182, '01234567890', 'admin@ashwamedhmart.com', '$2y$10$g4alOc6xhoM7R2.MvDNeyuaDOkvVwP732K9J33/VJVe1HBp1tX/X2', '12345', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-19 07:05:21', '2021-01-19 07:05:21'),
(37, 2, 1, NULL, NULL, 'Komal', 'Burman', '0', 0, '99', 194, '999124521', 'komal2492@yopmail.com', '$2y$10$g4alOc6xhoM7R2.MvDNeyuaDOkvVwP732K9J33/VJVe1HBp1tX/X2', '12345', NULL, '1', 1, NULL, NULL, NULL, '2009-12-28', NULL, NULL, NULL, NULL, NULL, '2021-02-09 07:30:12', '2021-02-11 06:48:41'),
(38, 2, 1, NULL, NULL, 'test', 'test', NULL, 0, '99', 192, '0172-123456', 'pratiksha.wave@gmail.com', '$2y$10$TntnXrIVNvg3Ro6phZGlFuphZaIwQ43NA6zuTPDJ9iRwNAawg7iMG', '123456dfdfdf', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-18 04:56:57', '2021-02-18 04:56:57'),
(39, 2, 1, NULL, NULL, 'wave wave', NULL, NULL, 0, '99', 182, '+919041065990', 'contactpraveenrai@gmail.com', '$2y$10$0gmCS/iO01jRvv7HWc2HmeX1PuA96AMg7fr.HhKgx1j3lzgKDclyO', 'wave', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-23 07:09:54', '2021-02-23 07:09:54'),
(40, 2, 1, NULL, NULL, 'wave wave', NULL, NULL, 0, '99', 198, '+919010659900', 'praveenraigarg@gmail.com', '$2y$10$NwFCGzReiJjpNqFyx/3d/e07wlvkPcYeyp.jFN9yQ9lXtRIbL5uLi', 'wave', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-23 07:13:54', '2021-02-23 07:13:54'),
(41, 2, 1, NULL, NULL, 'Komal', NULL, NULL, 0, '223', 1, '9874563211', 'komal24892@yopmail.com', '$2y$10$T6EgLrvPB9RbkDkxbVxk..V1LH5lQKkQcHXKY7cXH9nHeX14op44u', '123456789', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-23 07:42:17', '2021-02-23 07:42:17'),
(42, 2, 1, NULL, NULL, 'komal', NULL, NULL, 0, '223', 1, '1111111111', 'komal2490@yopmail.com', '$2y$10$bbxPN7A6C/MxRa..JEEOB.VWh8EbHIY/sDfzlXIASeS.pRqQiW9cK', '00000000', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-23 07:48:44', '2021-02-23 07:48:44'),
(43, 2, 1, NULL, NULL, 'qw', NULL, NULL, 0, '73', 1249, 'qweddd', 'komal248www92@yopmail.com', '$2y$10$nobsR/I5AFRpCLTo6an2lO.911psttLNB4W3IEvATAdcCk.b8EonG', '11111111', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-23 08:00:21', '2021-02-23 08:00:21'),
(44, 2, 1, NULL, NULL, 'waveinfotech seefood', NULL, NULL, 0, '99', 199, '09068920822', 'waveinfotech.biz78787@gmail.com', '$2y$10$LqOsBdRDv65B3xuZpd30z.9mL..UMgu41K.UXtN85m16yvbYOkSda', 'wavedemo', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-23 08:42:41', '2021-02-23 08:42:41'),
(45, 2, 1, NULL, NULL, 'wave infotech', NULL, NULL, 0, '99', 182, '55657676678', 'komal2409@yopmail.com', '$2y$10$EYGGi6Bc/DxTv7B7soXqDuvwqFrgYkeSKcdl1ks7x4OLFIwKdg7eW', '11111111', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-23 09:05:08', '2021-02-23 09:05:08'),
(46, 2, 1, NULL, NULL, 'wave', NULL, NULL, 0, '99', 193, '87878787878787', 'smartpraveenrai@gmail.com', '$2y$10$h2V2C173SV0q33zjeqsQr.PXeTOreh5HZUCpaojnlOfUqnGm8JZ72', 'wave', NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-23 09:57:15', '2021-02-23 09:57:15'),
(47, 2, 1, NULL, NULL, 'Komal Test Test', NULL, '0', 0, '99', 182, '09988334455', 'komal24@yopmail.com', '$2y$10$yX7TgbIn6STT88oLW70AKet8WtmCisOmqTkZ5RMPCwlqHb9h4bGxK', 'wavedemo', 'resources/assets/images/user_profile/1614323085.avatar.jpg', '1', 0, NULL, NULL, NULL, '2021-02-24', NULL, NULL, NULL, NULL, NULL, '2021-02-25 10:44:21', '2021-02-26 07:04:45'),
(48, 2, 1, NULL, NULL, 'Komal', NULL, NULL, 0, '99', 182, '9991812536', 'komal.burman234@gmail.com', '$2y$10$r9qgtepaicXarmdq29AOUe/7awpHT7EKJuiP8bxCjsSCLB318Mnt.', '1111111111', NULL, '1', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-24 10:30:27', '2021-07-22 07:11:55'),
(49, 2, 1, NULL, NULL, 'Shilpa', 'Jadhav', '0', 0, '99', 200, '9021121916', 'shilpa.jadhav@iping.in', '$2y$10$Ot6iCscrlNc8KlTqTt0n0eYyAFfoQIV/L6ScSNMq1ygr0.lpdGA8.', 'Shilpa@123', NULL, '1', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-22 07:11:29', '2021-07-22 07:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_to_address`
--

CREATE TABLE `user_to_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_book_id` int(11) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_to_address`
--

INSERT INTO `user_to_address` (`id`, `user_id`, `address_book_id`, `is_default`) VALUES
(1, 1, 1, 1),
(2, 22, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `user_types_id` int(11) NOT NULL,
  `user_types_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`user_types_id`, `user_types_name`, `created_at`, `updated_at`, `isActive`) VALUES
(1, 'Super Admin', 1534774230, NULL, 1),
(2, 'Customers', 1534777027, NULL, 1),
(3, 'Vendors', 1538390209, NULL, 1),
(4, 'Delivery Guy', 1542965906, NULL, 1),
(5, 'Test 1', 1542965906, NULL, 1),
(6, 'Test 2', 1542965906, NULL, 1),
(7, 'Test 3', 1542965906, NULL, 1),
(8, 'Test 4', 1542965906, NULL, 1),
(9, 'Test 5', 1542965906, NULL, 1),
(10, 'Test 6', 1542965906, NULL, 1),
(11, 'vendor', 1603180512, NULL, 1),
(12, 'asdfasdfad', 1626343393, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `whos_online`
--

CREATE TABLE `whos_online` (
  `customer_id` int(11) NOT NULL DEFAULT 0,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_entry` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_last_click` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_page_url` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `whos_online`
--

INSERT INTO `whos_online` (`customer_id`, `full_name`, `session_id`, `ip_address`, `time_entry`, `time_last_click`, `last_page_url`) VALUES
(1, 'library admin', '', '', '2020-11-06 11:', '', ''),
(28, 'team wave', '', '', '2020-11-06 11:', '', ''),
(4, 'nitin wave', '', '', '2020-11-06 12:', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `withdrawal_request` varchar(100) DEFAULT NULL,
  `special_notes` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`id`, `vendor_id`, `withdrawal_request`, `special_notes`, `status`, `created_at`, `updated_at`) VALUES
(4, 22, '100', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only', 1, '2020-11-06 09:40:06', '2020-11-07 05:40:01'),
(5, 35, '123', 'Test', 1, '2021-02-09 12:44:53', '2021-02-09 12:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `zone_id` int(11) NOT NULL,
  `zone_country_id` int(11) NOT NULL,
  `zone_code` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`zone_id`, `zone_country_id`, `zone_code`, `zone_name`) VALUES
(1, 223, 'AL', 'Alabama'),
(2, 223, 'AK', 'Alaska'),
(3, 223, 'AS', 'American Samoa'),
(4, 223, 'AZ', 'Arizona'),
(5, 223, 'AR', 'Arkansas'),
(6, 223, 'AF', 'Armed Forces Africa'),
(7, 223, 'AA', 'Armed Forces Americas'),
(8, 223, 'AC', 'Armed Forces Canada'),
(9, 223, 'AE', 'Armed Forces Europe'),
(10, 223, 'AM', 'Armed Forces Middle East'),
(11, 223, 'AP', 'Armed Forces Pacific'),
(12, 223, 'CA', 'California'),
(13, 223, 'CO', 'Colorado'),
(14, 223, 'CT', 'Connecticut'),
(15, 223, 'DE', 'Delaware'),
(16, 223, 'DC', 'District of Columbia'),
(17, 223, 'FM', 'Federated States Of Micronesia'),
(18, 223, 'FL', 'Florida'),
(19, 223, 'GA', 'Georgia'),
(20, 223, 'GU', 'Guam'),
(21, 223, 'HI', 'Hawaii'),
(22, 223, 'ID', 'Idaho'),
(23, 223, 'IL', 'Illinois'),
(24, 223, 'IN', 'Indiana'),
(25, 223, 'IA', 'Iowa'),
(26, 223, 'KS', 'Kansas'),
(27, 223, 'KY', 'Kentucky'),
(28, 223, 'LA', 'Louisiana'),
(29, 223, 'ME', 'Maine'),
(30, 223, 'MH', 'Marshall Islands'),
(31, 223, 'MD', 'Maryland'),
(32, 223, 'MA', 'Massachusetts'),
(33, 223, 'MI', 'Michigan'),
(34, 223, 'MN', 'Minnesota'),
(35, 223, 'MS', 'Mississippi'),
(36, 223, 'MO', 'Missouri'),
(37, 223, 'MT', 'Montana'),
(38, 223, 'NE', 'Nebraska'),
(39, 223, 'NV', 'Nevada'),
(40, 223, 'NH', 'New Hampshire'),
(41, 223, 'NJ', 'New Jersey'),
(42, 223, 'NM', 'New Mexico'),
(43, 223, 'NY', 'New York'),
(44, 223, 'NC', 'North Carolina'),
(45, 223, 'ND', 'North Dakota'),
(46, 223, 'MP', 'Northern Mariana Islands'),
(47, 223, 'OH', 'Ohio'),
(48, 223, 'OK', 'Oklahoma'),
(49, 223, 'OR', 'Oregon'),
(50, 223, 'PW', 'Palau'),
(51, 223, 'PA', 'Pennsylvania'),
(52, 223, 'PR', 'Puerto Rico'),
(53, 223, 'RI', 'Rhode Island'),
(54, 223, 'SC', 'South Carolina'),
(55, 223, 'SD', 'South Dakota'),
(56, 223, 'TN', 'Tennessee'),
(57, 223, 'TX', 'Texas'),
(58, 223, 'UT', 'Utah'),
(59, 223, 'VT', 'Vermont'),
(60, 223, 'VI', 'Virgin Islands'),
(61, 223, 'VA', 'Virginia'),
(62, 223, 'WA', 'Washington'),
(63, 223, 'WV', 'West Virginia'),
(64, 223, 'WI', 'Wisconsin'),
(65, 223, 'WY', 'Wyoming'),
(66, 38, 'AB', 'Alberta'),
(67, 38, 'BC', 'British Columbia'),
(68, 38, 'MB', 'Manitoba'),
(69, 38, 'NF', 'Newfoundland'),
(70, 38, 'NB', 'New Brunswick'),
(71, 38, 'NS', 'Nova Scotia'),
(72, 38, 'NT', 'Northwest Territories'),
(73, 38, 'NU', 'Nunavut'),
(74, 38, 'ON', 'Ontario'),
(75, 38, 'PE', 'Prince Edward Island'),
(76, 38, 'QC', 'Quebec'),
(77, 38, 'SK', 'Saskatchewan'),
(78, 38, 'YT', 'Yukon Territory'),
(79, 81, 'NDS', 'Niedersachsen'),
(80, 81, 'BAW', 'Baden-Württemberg'),
(81, 81, 'BAY', 'Bayern'),
(82, 81, 'BER', 'Berlin'),
(83, 81, 'BRG', 'Brandenburg'),
(84, 81, 'BRE', 'Bremen'),
(85, 81, 'HAM', 'Hamburg'),
(86, 81, 'HES', 'Hessen'),
(87, 81, 'MEC', 'Mecklenburg-Vorpommern'),
(88, 81, 'NRW', 'Nordrhein-Westfalen'),
(89, 81, 'RHE', 'Rheinland-Pfalz'),
(90, 81, 'SAR', 'Saarland'),
(91, 81, 'SAS', 'Sachsen'),
(92, 81, 'SAC', 'Sachsen-Anhalt'),
(93, 81, 'SCN', 'Schleswig-Holstein'),
(94, 81, 'THE', 'Thüringen'),
(95, 14, 'WI', 'Wien'),
(96, 14, 'NO', 'Niederösterreich'),
(97, 14, 'OO', 'Oberösterreich'),
(98, 14, 'SB', 'Salzburg'),
(99, 14, 'KN', 'Kärnten'),
(100, 14, 'ST', 'Steiermark'),
(101, 14, 'TI', 'Tirol'),
(102, 14, 'BL', 'Burgenland'),
(103, 14, 'VB', 'Voralberg'),
(104, 204, 'AG', 'Aargau'),
(105, 204, 'AI', 'Appenzell Innerrhoden'),
(106, 204, 'AR', 'Appenzell Ausserrhoden'),
(107, 204, 'BE', 'Bern'),
(108, 204, 'BL', 'Basel-Landschaft'),
(109, 204, 'BS', 'Basel-Stadt'),
(110, 204, 'FR', 'Freiburg'),
(111, 204, 'GE', 'Genf'),
(112, 204, 'GL', 'Glarus'),
(113, 204, 'JU', 'Graubünden'),
(114, 204, 'JU', 'Jura'),
(115, 204, 'LU', 'Luzern'),
(116, 204, 'NE', 'Neuenburg'),
(117, 204, 'NW', 'Nidwalden'),
(118, 204, 'OW', 'Obwalden'),
(119, 204, 'SG', 'St. Gallen'),
(120, 204, 'SH', 'Schaffhausen'),
(121, 204, 'SO', 'Solothurn'),
(122, 204, 'SZ', 'Schwyz'),
(123, 204, 'TG', 'Thurgau'),
(124, 204, 'TI', 'Tessin'),
(125, 204, 'UR', 'Uri'),
(126, 204, 'VD', 'Waadt'),
(127, 204, 'VS', 'Wallis'),
(128, 204, 'ZG', 'Zug'),
(129, 204, 'ZH', 'Zürich'),
(130, 195, 'A Coruña', 'A Coruña'),
(131, 195, 'Alava', 'Alava'),
(132, 195, 'Albacete', 'Albacete'),
(133, 195, 'Alicante', 'Alicante'),
(134, 195, 'Almeria', 'Almeria'),
(135, 195, 'Asturias', 'Asturias'),
(136, 195, 'Avila', 'Avila'),
(137, 195, 'Badajoz', 'Badajoz'),
(138, 195, 'Baleares', 'Baleares'),
(139, 195, 'Barcelona', 'Barcelona'),
(140, 195, 'Burgos', 'Burgos'),
(141, 195, 'Caceres', 'Caceres'),
(142, 195, 'Cadiz', 'Cadiz'),
(143, 195, 'Cantabria', 'Cantabria'),
(144, 195, 'Castellon', 'Castellon'),
(145, 195, 'Ceuta', 'Ceuta'),
(146, 195, 'Ciudad Real', 'Ciudad Real'),
(147, 195, 'Cordoba', 'Cordoba'),
(148, 195, 'Cuenca', 'Cuenca'),
(149, 195, 'Girona', 'Girona'),
(150, 195, 'Granada', 'Granada'),
(151, 195, 'Guadalajara', 'Guadalajara'),
(152, 195, 'Guipuzcoa', 'Guipuzcoa'),
(153, 195, 'Huelva', 'Huelva'),
(154, 195, 'Huesca', 'Huesca'),
(155, 195, 'Jaen', 'Jaen'),
(156, 195, 'La Rioja', 'La Rioja'),
(157, 195, 'Las Palmas', 'Las Palmas'),
(158, 195, 'Leon', 'Leon'),
(159, 195, 'Lleida', 'Lleida'),
(160, 195, 'Lugo', 'Lugo'),
(161, 195, 'Madrid', 'Madrid'),
(162, 195, 'Malaga', 'Malaga'),
(163, 195, 'Melilla', 'Melilla'),
(164, 195, 'Murcia', 'Murcia'),
(165, 195, 'Navarra', 'Navarra'),
(166, 195, 'Ourense', 'Ourense'),
(167, 195, 'Palencia', 'Palencia'),
(168, 195, 'Pontevedra', 'Pontevedra'),
(169, 195, 'Salamanca', 'Salamanca'),
(170, 195, 'Santa Cruz de Tenerife', 'Santa Cruz de Tenerife'),
(171, 195, 'Segovia', 'Segovia'),
(172, 195, 'Sevilla', 'Sevilla'),
(173, 195, 'Soria', 'Soria'),
(174, 195, 'Tarragona', 'Tarragona'),
(175, 195, 'Teruel', 'Teruel'),
(176, 195, 'Toledo', 'Toledo'),
(177, 195, 'Valencia', 'Valencia'),
(178, 195, 'Valladolid', 'Valladolid'),
(179, 195, 'Vizcaya', 'Vizcaya'),
(180, 195, 'Zamora', 'Zamora'),
(181, 195, 'Zaragoza', 'Zaragoza'),
(182, 99, '', 'Andaman and Nicobar Islands'),
(183, 99, '', 'Andhra Pradesh'),
(184, 99, '', 'Arunachal Pradesh'),
(185, 99, '', 'Assam'),
(186, 99, '', 'Bihar'),
(187, 99, '', 'Chandigarh'),
(188, 99, '', 'Chhattisgarh'),
(189, 99, '', 'Delhi'),
(190, 99, '', 'Goa'),
(191, 99, '', 'Gujarat'),
(192, 99, '', 'Haryana'),
(193, 99, '', 'Himachal Pradesh'),
(194, 99, '', 'Jammu and Kashmir'),
(195, 99, '', 'Jharkhand'),
(196, 99, '', 'Karnataka'),
(197, 99, '', 'Kerala'),
(198, 99, '', 'Lakshadweep'),
(199, 99, '', 'Madhya Pradesh'),
(200, 99, '', 'Maharashtra'),
(201, 99, '', 'Manipur'),
(202, 99, '', 'Meghalaya'),
(203, 99, '', 'Mizoram'),
(204, 99, '', 'Odisha'),
(205, 99, '', 'Punjab'),
(206, 99, '', 'Rajasthan'),
(207, 99, '', 'Sikkim'),
(208, 99, '', 'Tamil Nadu'),
(209, 99, '', 'Uttar Pradesh'),
(210, 99, '', 'Uttarakhand'),
(211, 1, '', 'Qandahar'),
(212, 1, '', 'Qunduz'),
(213, 1, '', 'Samangan'),
(214, 1, '', 'Sar-e Pul'),
(215, 1, '', 'Takhar'),
(216, 1, '', 'Uruzgan'),
(217, 1, '', 'Wardag'),
(218, 1, '', 'Zabul'),
(219, 2, '', 'Berat'),
(220, 2, '', 'Bulqize'),
(221, 2, '', 'Delvine'),
(222, 2, '', 'Devoll'),
(223, 2, '', 'Dibre'),
(224, 2, '', 'Durres'),
(225, 2, '', 'Elbasan'),
(226, 2, '', 'Fier'),
(227, 2, '', 'Gjirokaster'),
(228, 2, '', 'Gramsh'),
(229, 2, '', 'Has'),
(230, 2, '', 'Kavaje'),
(231, 2, '', 'Kolonje'),
(232, 2, '', 'Korce'),
(233, 2, '', 'Kruje'),
(234, 2, '', 'Kucove'),
(235, 2, '', 'Kukes'),
(236, 2, '', 'Kurbin'),
(237, 2, '', 'Lezhe'),
(238, 2, '', 'Librazhd'),
(239, 2, '', 'Lushnje'),
(240, 2, '', 'Mallakaster'),
(241, 2, '', 'Malsi e Madhe'),
(242, 2, '', 'Mat'),
(243, 2, '', 'Mirdite'),
(244, 2, '', 'Peqin'),
(245, 2, '', 'Permet'),
(246, 2, '', 'Pogradec'),
(247, 2, '', 'Puke'),
(248, 2, '', 'Sarande'),
(249, 2, '', 'Shkoder'),
(250, 2, '', 'Skrapar'),
(251, 2, '', 'Tepelene'),
(252, 2, '', 'Tirane'),
(253, 2, '', 'Tropoje'),
(254, 2, '', 'Vlore'),
(255, 3, '', '\'Ayn Daflah'),
(256, 3, '', '\'Ayn Tamushanat'),
(257, 3, '', 'Adrar'),
(258, 3, '', 'Algiers'),
(259, 3, '', 'Annabah'),
(260, 3, '', 'Bashshar'),
(261, 3, '', 'Batnah'),
(262, 3, '', 'Bijayah'),
(263, 3, '', 'Biskrah'),
(264, 3, '', 'Blidah'),
(265, 3, '', 'Buirah'),
(266, 3, '', 'Bumardas'),
(267, 3, '', 'Burj Bu Arririj'),
(268, 3, '', 'Ghalizan'),
(269, 3, '', 'Ghardayah'),
(270, 3, '', 'Ilizi'),
(271, 3, '', 'Jijili'),
(272, 3, '', 'Jilfah'),
(273, 3, '', 'Khanshalah'),
(274, 3, '', 'Masilah'),
(275, 3, '', 'Midyah'),
(276, 3, '', 'Milah'),
(277, 3, '', 'Muaskar'),
(278, 3, '', 'Mustaghanam'),
(279, 3, '', 'Naama'),
(280, 3, '', 'Oran'),
(281, 3, '', 'Ouargla'),
(282, 3, '', 'Qalmah'),
(283, 3, '', 'Qustantinah'),
(284, 3, '', 'Sakikdah'),
(285, 3, '', 'Satif'),
(286, 3, '', 'Sayda\''),
(287, 3, '', 'Sidi ban-al-\'Abbas'),
(288, 3, '', 'Suq Ahras'),
(289, 3, '', 'Tamanghasat'),
(290, 3, '', 'Tibazah'),
(291, 3, '', 'Tibissah'),
(292, 3, '', 'Tilimsan'),
(293, 3, '', 'Tinduf'),
(294, 3, '', 'Tisamsilt'),
(295, 3, '', 'Tiyarat'),
(296, 3, '', 'Tizi Wazu'),
(297, 3, '', 'Umm-al-Bawaghi'),
(298, 3, '', 'Wahran'),
(299, 3, '', 'Warqla'),
(300, 3, '', 'Wilaya d Alger'),
(301, 3, '', 'Wilaya de Bejaia'),
(302, 3, '', 'Wilaya de Constantine'),
(303, 3, '', 'al-Aghwat'),
(304, 3, '', 'al-Bayadh'),
(305, 3, '', 'al-Jaza\'ir'),
(306, 3, '', 'al-Wad'),
(307, 3, '', 'ash-Shalif'),
(308, 3, '', 'at-Tarif'),
(309, 4, '', 'Eastern'),
(310, 4, '', 'Manu\'a'),
(311, 4, '', 'Swains Island'),
(312, 4, '', 'Western'),
(313, 5, '', 'Andorra la Vella'),
(314, 5, '', 'Canillo'),
(315, 5, '', 'Encamp'),
(316, 5, '', 'La Massana'),
(317, 5, '', 'Les Escaldes'),
(318, 5, '', 'Ordino'),
(319, 5, '', 'Sant Julia de Loria'),
(320, 6, '', 'Bengo'),
(321, 6, '', 'Benguela'),
(322, 6, '', 'Bie'),
(323, 6, '', 'Cabinda'),
(324, 6, '', 'Cunene'),
(325, 6, '', 'Huambo'),
(326, 6, '', 'Huila'),
(327, 6, '', 'Kuando-Kubango'),
(328, 6, '', 'Kwanza Norte'),
(329, 6, '', 'Kwanza Sul'),
(330, 6, '', 'Luanda'),
(331, 6, '', 'Lunda Norte'),
(332, 6, '', 'Lunda Sul'),
(333, 6, '', 'Malanje'),
(334, 6, '', 'Moxico'),
(335, 6, '', 'Namibe'),
(336, 6, '', 'Uige'),
(337, 6, '', 'Zaire'),
(338, 7, '', 'Other Provinces'),
(339, 8, '', 'Sector claimed by Argentina/Ch'),
(340, 8, '', 'Sector claimed by Argentina/UK'),
(341, 8, '', 'Sector claimed by Australia'),
(342, 8, '', 'Sector claimed by France'),
(343, 8, '', 'Sector claimed by New Zealand'),
(344, 8, '', 'Sector claimed by Norway'),
(345, 8, '', 'Unclaimed Sector'),
(346, 9, '', 'Barbuda'),
(347, 9, '', 'Saint George'),
(348, 9, '', 'Saint John'),
(349, 9, '', 'Saint Mary'),
(350, 9, '', 'Saint Paul'),
(351, 9, '', 'Saint Peter'),
(352, 9, '', 'Saint Philip'),
(353, 10, '', 'Buenos Aires'),
(354, 10, '', 'Catamarca'),
(355, 10, '', 'Chaco'),
(356, 10, '', 'Chubut'),
(357, 10, '', 'Cordoba'),
(358, 10, '', 'Corrientes'),
(359, 10, '', 'Distrito Federal'),
(360, 10, '', 'Entre Rios'),
(361, 10, '', 'Formosa'),
(362, 10, '', 'Jujuy'),
(363, 10, '', 'La Pampa'),
(364, 10, '', 'La Rioja'),
(365, 10, '', 'Mendoza'),
(366, 10, '', 'Misiones'),
(367, 10, '', 'Neuquen'),
(368, 10, '', 'Rio Negro'),
(369, 10, '', 'Salta'),
(370, 10, '', 'San Juan'),
(371, 10, '', 'San Luis'),
(372, 10, '', 'Santa Cruz'),
(373, 10, '', 'Santa Fe'),
(374, 10, '', 'Santiago del Estero'),
(375, 10, '', 'Tierra del Fuego'),
(376, 10, '', 'Tucuman'),
(377, 11, '', 'Aragatsotn'),
(378, 11, '', 'Ararat'),
(379, 11, '', 'Armavir'),
(380, 11, '', 'Gegharkunik'),
(381, 11, '', 'Kotaik'),
(382, 11, '', 'Lori'),
(383, 11, '', 'Shirak'),
(384, 11, '', 'Stepanakert'),
(385, 11, '', 'Syunik'),
(386, 11, '', 'Tavush'),
(387, 11, '', 'Vayots Dzor'),
(388, 11, '', 'Yerevan'),
(389, 12, '', 'Aruba'),
(390, 13, '', 'Auckland'),
(391, 13, '', 'Australian Capital Territory'),
(392, 13, '', 'Chatswood'),
(393, 13, '', 'Cheltenham'),
(394, 13, '', 'Cherrybrook'),
(395, 13, '', 'Clayton'),
(396, 13, '', 'Collingwood'),
(397, 13, '', 'Frenchs Forest'),
(398, 13, '', 'Hawthorn'),
(399, 13, '', 'Jannnali'),
(400, 13, '', 'Knoxfield'),
(401, 13, '', 'Melbourne'),
(402, 13, '', 'New South Wales'),
(403, 13, '', 'Northern Territory'),
(404, 13, '', 'Perth'),
(405, 15, '', 'Mugan-Salyan'),
(406, 15, '', 'Nagorni-Qarabax'),
(407, 15, '', 'Naxcivan'),
(408, 15, '', 'Priaraks'),
(409, 15, '', 'Qazax'),
(410, 15, '', 'Saki'),
(411, 15, '', 'Sirvan'),
(412, 15, '', 'Xacmaz'),
(413, 16, '', 'Abaco'),
(414, 16, '', 'Acklins Island'),
(415, 16, '', 'Andros'),
(416, 16, '', 'Berry Islands'),
(417, 16, '', 'Biminis'),
(418, 16, '', 'Cat Island'),
(419, 16, '', 'Crooked Island'),
(420, 16, '', 'Eleuthera'),
(421, 16, '', 'Exuma and Cays'),
(422, 16, '', 'Grand Bahama'),
(423, 16, '', 'Inagua Islands'),
(424, 16, '', 'Long Island'),
(425, 16, '', 'Mayaguana'),
(426, 16, '', 'New Providence'),
(427, 16, '', 'Ragged Island'),
(428, 16, '', 'Rum Cay'),
(429, 16, '', 'San Salvador'),
(430, 17, '', '\'Isa'),
(431, 17, '', 'Badiyah'),
(432, 17, '', 'Hidd'),
(433, 17, '', 'Jidd Hafs'),
(434, 17, '', 'Mahama'),
(435, 17, '', 'Manama'),
(436, 17, '', 'Sitrah'),
(437, 17, '', 'al-Manamah'),
(438, 17, '', 'al-Muharraq'),
(439, 17, '', 'ar-Rifa\'a'),
(440, 18, '', 'Bagar Hat'),
(441, 18, '', 'Bandarban'),
(442, 18, '', 'Barguna'),
(443, 18, '', 'Barisal'),
(444, 18, '', 'Bhola'),
(445, 18, '', 'Bogora'),
(446, 18, '', 'Brahman Bariya'),
(447, 18, '', 'Chandpur'),
(448, 18, '', 'Chattagam'),
(449, 18, '', 'Chittagong Division'),
(450, 18, '', 'Chuadanga'),
(451, 18, '', 'Dhaka'),
(452, 18, '', 'Dinajpur'),
(453, 18, '', 'Faridpur'),
(454, 18, '', 'Feni'),
(455, 18, '', 'Gaybanda'),
(456, 18, '', 'Gazipur'),
(457, 18, '', 'Gopalganj'),
(458, 18, '', 'Habiganj'),
(459, 18, '', 'Jaipur Hat'),
(460, 18, '', 'Jamalpur'),
(461, 18, '', 'Jessor'),
(462, 18, '', 'Jhalakati'),
(463, 18, '', 'Jhanaydah'),
(464, 18, '', 'Khagrachhari'),
(465, 18, '', 'Khulna'),
(466, 18, '', 'Kishorganj'),
(467, 18, '', 'Koks Bazar'),
(468, 18, '', 'Komilla'),
(469, 18, '', 'Kurigram'),
(470, 18, '', 'Kushtiya'),
(471, 18, '', 'Lakshmipur'),
(472, 18, '', 'Lalmanir Hat'),
(473, 18, '', 'Madaripur'),
(474, 18, '', 'Magura'),
(475, 18, '', 'Maimansingh'),
(476, 18, '', 'Manikganj'),
(477, 18, '', 'Maulvi Bazar'),
(478, 18, '', 'Meherpur'),
(479, 18, '', 'Munshiganj'),
(480, 18, '', 'Naral'),
(481, 18, '', 'Narayanganj'),
(482, 18, '', 'Narsingdi'),
(483, 18, '', 'Nator'),
(484, 18, '', 'Naugaon'),
(485, 18, '', 'Nawabganj'),
(486, 18, '', 'Netrakona'),
(487, 18, '', 'Nilphamari'),
(488, 18, '', 'Noakhali'),
(489, 18, '', 'Pabna'),
(490, 18, '', 'Panchagarh'),
(491, 18, '', 'Patuakhali'),
(492, 18, '', 'Pirojpur'),
(493, 18, '', 'Rajbari'),
(494, 18, '', 'Rajshahi'),
(495, 18, '', 'Rangamati'),
(496, 18, '', 'Rangpur'),
(497, 18, '', 'Satkhira'),
(498, 18, '', 'Shariatpur'),
(499, 18, '', 'Sherpur'),
(500, 18, '', 'Silhat'),
(501, 18, '', 'Sirajganj'),
(502, 18, '', 'Sunamganj'),
(503, 18, '', 'Tangayal'),
(504, 18, '', 'Thakurgaon'),
(505, 19, '', 'Christ Church'),
(506, 19, '', 'Saint Andrew'),
(507, 19, '', 'Saint George'),
(508, 19, '', 'Saint James'),
(509, 19, '', 'Saint John'),
(510, 19, '', 'Saint Joseph'),
(511, 19, '', 'Saint Lucy'),
(512, 19, '', 'Saint Michael'),
(513, 19, '', 'Saint Peter'),
(514, 19, '', 'Saint Philip'),
(515, 19, '', 'Saint Thomas'),
(516, 20, '', 'Brest'),
(517, 20, '', 'Homjel\''),
(518, 20, '', 'Hrodna'),
(519, 20, '', 'Mahiljow'),
(520, 20, '', 'Mahilyowskaya Voblasts'),
(521, 20, '', 'Minsk'),
(522, 20, '', 'Minskaja Voblasts\''),
(523, 20, '', 'Petrik'),
(524, 20, '', 'Vicebsk'),
(525, 21, '', 'Antwerpen'),
(526, 21, '', 'Berchem'),
(527, 21, '', 'Brabant'),
(528, 21, '', 'Brabant Wallon'),
(529, 21, '', 'Brussel'),
(530, 21, '', 'East Flanders'),
(531, 21, '', 'Hainaut'),
(532, 21, '', 'Liege'),
(533, 21, '', 'Limburg'),
(534, 21, '', 'Luxembourg'),
(535, 21, '', 'Namur'),
(536, 21, '', 'Ontario'),
(537, 21, '', 'Oost-Vlaanderen'),
(538, 21, '', 'Provincie Brabant'),
(539, 21, '', 'Vlaams-Brabant'),
(540, 21, '', 'Wallonne'),
(541, 21, '', 'West-Vlaanderen'),
(542, 22, '', 'Belize'),
(543, 22, '', 'Cayo'),
(544, 22, '', 'Corozal'),
(545, 22, '', 'Orange Walk'),
(546, 22, '', 'Stann Creek'),
(547, 22, '', 'Toledo'),
(548, 23, '', 'Alibori'),
(549, 23, '', 'Atacora'),
(550, 23, '', 'Atlantique'),
(551, 23, '', 'Borgou'),
(552, 23, '', 'Collines'),
(553, 23, '', 'Couffo'),
(554, 23, '', 'Donga'),
(555, 23, '', 'Littoral'),
(556, 23, '', 'Mono'),
(557, 23, '', 'Oueme'),
(558, 23, '', 'Plateau'),
(559, 23, '', 'Zou'),
(560, 24, '', 'Hamilton'),
(561, 24, '', 'Saint George'),
(562, 25, '', 'Bumthang'),
(563, 25, '', 'Chhukha'),
(564, 25, '', 'Chirang'),
(565, 25, '', 'Daga'),
(566, 25, '', 'Geylegphug'),
(567, 25, '', 'Ha'),
(568, 25, '', 'Lhuntshi'),
(569, 25, '', 'Mongar'),
(570, 25, '', 'Pemagatsel'),
(571, 25, '', 'Punakha'),
(572, 25, '', 'Rinpung'),
(573, 25, '', 'Samchi'),
(574, 25, '', 'Samdrup Jongkhar'),
(575, 25, '', 'Shemgang'),
(576, 25, '', 'Tashigang'),
(577, 25, '', 'Timphu'),
(578, 25, '', 'Tongsa'),
(579, 25, '', 'Wangdiphodrang'),
(580, 26, '', 'Beni'),
(581, 26, '', 'Chuquisaca'),
(582, 26, '', 'Cochabamba'),
(583, 26, '', 'La Paz'),
(584, 26, '', 'Oruro'),
(585, 26, '', 'Pando'),
(586, 26, '', 'Potosi'),
(587, 26, '', 'Santa Cruz'),
(588, 26, '', 'Tarija'),
(589, 27, '', 'Federacija Bosna i Hercegovina'),
(590, 27, '', 'Republika Srpska'),
(591, 28, '', 'Central Bobonong'),
(592, 28, '', 'Central Boteti'),
(593, 28, '', 'Central Mahalapye'),
(594, 28, '', 'Central Serowe-Palapye'),
(595, 28, '', 'Central Tutume'),
(596, 28, '', 'Chobe'),
(597, 28, '', 'Francistown'),
(598, 28, '', 'Gaborone'),
(599, 28, '', 'Ghanzi'),
(600, 28, '', 'Jwaneng'),
(601, 28, '', 'Kgalagadi North'),
(602, 28, '', 'Kgalagadi South'),
(603, 28, '', 'Kgatleng'),
(604, 28, '', 'Kweneng'),
(605, 28, '', 'Lobatse'),
(606, 28, '', 'Ngamiland'),
(607, 28, '', 'Ngwaketse'),
(608, 28, '', 'North East'),
(609, 28, '', 'Okavango'),
(610, 28, '', 'Orapa'),
(611, 28, '', 'Selibe Phikwe'),
(612, 28, '', 'South East'),
(613, 28, '', 'Sowa'),
(614, 29, '', 'Bouvet Island'),
(615, 30, '', 'Acre'),
(616, 30, '', 'Alagoas'),
(617, 30, '', 'Amapa'),
(618, 30, '', 'Amazonas'),
(619, 30, '', 'Bahia'),
(620, 30, '', 'Ceara'),
(621, 30, '', 'Distrito Federal'),
(622, 30, '', 'Espirito Santo'),
(623, 30, '', 'Estado de Sao Paulo'),
(624, 30, '', 'Goias'),
(625, 30, '', 'Maranhao'),
(626, 30, '', 'Mato Grosso'),
(627, 30, '', 'Mato Grosso do Sul'),
(628, 30, '', 'Minas Gerais'),
(629, 30, '', 'Para'),
(630, 30, '', 'Paraiba'),
(631, 30, '', 'Parana'),
(632, 30, '', 'Pernambuco'),
(633, 30, '', 'Piaui'),
(634, 30, '', 'Rio Grande do Norte'),
(635, 30, '', 'Rio Grande do Sul'),
(636, 30, '', 'Rio de Janeiro'),
(637, 30, '', 'Rondonia'),
(638, 30, '', 'Roraima'),
(639, 30, '', 'Santa Catarina'),
(640, 30, '', 'Sao Paulo'),
(641, 30, '', 'Sergipe'),
(642, 30, '', 'Tocantins'),
(643, 31, '', 'British Indian Ocean Territory'),
(644, 32, '', 'Belait'),
(645, 32, '', 'Brunei-Muara'),
(646, 32, '', 'Temburong'),
(647, 32, '', 'Tutong'),
(648, 33, '', 'Blagoevgrad'),
(649, 33, '', 'Burgas'),
(650, 33, '', 'Dobrich'),
(651, 33, '', 'Gabrovo'),
(652, 33, '', 'Haskovo'),
(653, 33, '', 'Jambol'),
(654, 33, '', 'Kardzhali'),
(655, 33, '', 'Kjustendil'),
(656, 33, '', 'Lovech'),
(657, 33, '', 'Montana'),
(658, 33, '', 'Oblast Sofiya-Grad'),
(659, 33, '', 'Pazardzhik'),
(660, 33, '', 'Pernik'),
(661, 33, '', 'Pleven'),
(662, 33, '', 'Plovdiv'),
(663, 33, '', 'Razgrad'),
(664, 33, '', 'Ruse'),
(665, 33, '', 'Shumen'),
(666, 33, '', 'Silistra'),
(667, 33, '', 'Sliven'),
(668, 33, '', 'Smoljan'),
(669, 33, '', 'Sofija grad'),
(670, 33, '', 'Sofijska oblast'),
(671, 33, '', 'Stara Zagora'),
(672, 33, '', 'Targovishte'),
(673, 33, '', 'Varna'),
(674, 33, '', 'Veliko Tarnovo'),
(675, 33, '', 'Vidin'),
(676, 33, '', 'Vraca'),
(677, 33, '', 'Yablaniza'),
(678, 34, '', 'Bale'),
(679, 34, '', 'Bam'),
(680, 34, '', 'Bazega'),
(681, 34, '', 'Bougouriba'),
(682, 34, '', 'Boulgou'),
(683, 34, '', 'Boulkiemde'),
(684, 34, '', 'Comoe'),
(685, 34, '', 'Ganzourgou'),
(686, 34, '', 'Gnagna'),
(687, 34, '', 'Gourma'),
(688, 34, '', 'Houet'),
(689, 34, '', 'Ioba'),
(690, 34, '', 'Kadiogo'),
(691, 34, '', 'Kenedougou'),
(692, 34, '', 'Komandjari'),
(693, 34, '', 'Kompienga'),
(694, 34, '', 'Kossi'),
(695, 34, '', 'Kouritenga'),
(696, 34, '', 'Kourweogo'),
(697, 34, '', 'Leraba'),
(698, 34, '', 'Mouhoun'),
(699, 34, '', 'Nahouri'),
(700, 34, '', 'Namentenga'),
(701, 34, '', 'Noumbiel'),
(702, 34, '', 'Oubritenga'),
(703, 34, '', 'Oudalan'),
(704, 34, '', 'Passore'),
(705, 34, '', 'Poni'),
(706, 34, '', 'Sanguie'),
(707, 34, '', 'Sanmatenga'),
(708, 34, '', 'Seno'),
(709, 34, '', 'Sissili'),
(710, 34, '', 'Soum'),
(711, 34, '', 'Sourou'),
(712, 34, '', 'Tapoa'),
(713, 34, '', 'Tuy'),
(714, 34, '', 'Yatenga'),
(715, 34, '', 'Zondoma'),
(716, 34, '', 'Zoundweogo'),
(717, 35, '', 'Bubanza'),
(718, 35, '', 'Bujumbura'),
(719, 35, '', 'Bururi'),
(720, 35, '', 'Cankuzo'),
(721, 35, '', 'Cibitoke'),
(722, 35, '', 'Gitega'),
(723, 35, '', 'Karuzi'),
(724, 35, '', 'Kayanza'),
(725, 35, '', 'Kirundo'),
(726, 35, '', 'Makamba'),
(727, 35, '', 'Muramvya'),
(728, 35, '', 'Muyinga'),
(729, 35, '', 'Ngozi'),
(730, 35, '', 'Rutana'),
(731, 35, '', 'Ruyigi'),
(732, 36, '', 'Banteay Mean Chey'),
(733, 36, '', 'Bat Dambang'),
(734, 36, '', 'Kampong Cham'),
(735, 36, '', 'Kampong Chhnang'),
(736, 36, '', 'Kampong Spoeu'),
(737, 36, '', 'Kampong Thum'),
(738, 36, '', 'Kampot'),
(739, 36, '', 'Kandal'),
(740, 36, '', 'Kaoh Kong'),
(741, 36, '', 'Kracheh'),
(742, 36, '', 'Krong Kaeb'),
(743, 36, '', 'Krong Pailin'),
(744, 36, '', 'Krong Preah Sihanouk'),
(745, 36, '', 'Mondol Kiri'),
(746, 36, '', 'Otdar Mean Chey'),
(747, 36, '', 'Phnum Penh'),
(748, 36, '', 'Pousat'),
(749, 36, '', 'Preah Vihear'),
(750, 36, '', 'Prey Veaeng'),
(751, 36, '', 'Rotanak Kiri'),
(752, 36, '', 'Siem Reab'),
(753, 36, '', 'Stueng Traeng'),
(754, 36, '', 'Svay Rieng'),
(755, 36, '', 'Takaev'),
(756, 37, '', 'Adamaoua'),
(757, 37, '', 'Centre'),
(758, 37, '', 'Est'),
(759, 37, '', 'Littoral'),
(760, 37, '', 'Nord'),
(761, 37, '', 'Nord Extreme'),
(762, 37, '', 'Nordouest'),
(763, 37, '', 'Ouest'),
(764, 37, '', 'Sud'),
(765, 37, '', 'Sudouest'),
(766, 38, '', 'Alberta'),
(767, 38, '', 'British Columbia'),
(768, 38, '', 'Manitoba'),
(769, 38, '', 'New Brunswick'),
(770, 38, '', 'Newfoundland and Labrador'),
(771, 38, '', 'Northwest Territories'),
(772, 38, '', 'Nova Scotia'),
(773, 38, '', 'Nunavut'),
(774, 38, '', 'Ontario'),
(775, 38, '', 'Prince Edward Island'),
(776, 38, '', 'Quebec'),
(777, 38, '', 'Saskatchewan'),
(778, 38, '', 'Yukon'),
(779, 39, '', 'Boavista'),
(780, 39, '', 'Brava'),
(781, 39, '', 'Fogo'),
(782, 39, '', 'Maio'),
(783, 39, '', 'Sal'),
(784, 39, '', 'Santo Antao'),
(785, 39, '', 'Sao Nicolau'),
(786, 39, '', 'Sao Tiago'),
(787, 39, '', 'Sao Vicente'),
(788, 40, '', 'Grand Cayman'),
(789, 41, '', 'Bamingui-Bangoran'),
(790, 41, '', 'Bangui'),
(791, 41, '', 'Basse-Kotto'),
(792, 41, '', 'Haut-Mbomou'),
(793, 41, '', 'Haute-Kotto'),
(794, 41, '', 'Kemo'),
(795, 41, '', 'Lobaye'),
(796, 41, '', 'Mambere-Kadei'),
(797, 41, '', 'Mbomou'),
(798, 41, '', 'Nana-Gribizi'),
(799, 41, '', 'Nana-Mambere'),
(800, 41, '', 'Ombella Mpoko'),
(801, 41, '', 'Ouaka'),
(802, 41, '', 'Ouham'),
(803, 41, '', 'Ouham-Pende'),
(804, 41, '', 'Sangha-Mbaere'),
(805, 41, '', 'Vakaga'),
(806, 42, '', 'Batha'),
(807, 42, '', 'Biltine'),
(808, 42, '', 'Bourkou-Ennedi-Tibesti'),
(809, 42, '', 'Chari-Baguirmi'),
(810, 42, '', 'Guera'),
(811, 42, '', 'Kanem'),
(812, 42, '', 'Lac'),
(813, 42, '', 'Logone Occidental'),
(814, 42, '', 'Logone Oriental'),
(815, 42, '', 'Mayo-Kebbi'),
(816, 42, '', 'Moyen-Chari'),
(817, 42, '', 'Ouaddai'),
(818, 42, '', 'Salamat'),
(819, 42, '', 'Tandjile'),
(820, 43, '', 'Aisen'),
(821, 43, '', 'Antofagasta'),
(822, 43, '', 'Araucania'),
(823, 43, '', 'Atacama'),
(824, 43, '', 'Bio Bio'),
(825, 43, '', 'Coquimbo'),
(826, 43, '', 'Libertador General Bernardo O\''),
(827, 43, '', 'Los Lagos'),
(828, 43, '', 'Magellanes'),
(829, 43, '', 'Maule'),
(830, 43, '', 'Metropolitana'),
(831, 43, '', 'Metropolitana de Santiago'),
(832, 43, '', 'Tarapaca'),
(833, 43, '', 'Valparaiso'),
(834, 44, '', 'Anhui'),
(835, 44, '', 'Anhui Province'),
(836, 44, '', 'Anhui Sheng'),
(837, 44, '', 'Aomen'),
(838, 44, '', 'Beijing'),
(839, 44, '', 'Beijing Shi'),
(840, 44, '', 'Chongqing'),
(841, 44, '', 'Fujian'),
(842, 44, '', 'Fujian Sheng'),
(843, 44, '', 'Gansu'),
(844, 44, '', 'Guangdong'),
(845, 44, '', 'Guangdong Sheng'),
(846, 44, '', 'Guangxi'),
(847, 44, '', 'Guizhou'),
(848, 44, '', 'Hainan'),
(849, 44, '', 'Hebei'),
(850, 44, '', 'Heilongjiang'),
(851, 44, '', 'Henan'),
(852, 44, '', 'Hubei'),
(853, 44, '', 'Hunan'),
(854, 44, '', 'Jiangsu'),
(855, 44, '', 'Jiangsu Sheng'),
(856, 44, '', 'Jiangxi'),
(857, 44, '', 'Jilin'),
(858, 44, '', 'Liaoning'),
(859, 44, '', 'Liaoning Sheng'),
(860, 44, '', 'Nei Monggol'),
(861, 44, '', 'Ningxia Hui'),
(862, 44, '', 'Qinghai'),
(863, 44, '', 'Shaanxi'),
(864, 44, '', 'Shandong'),
(865, 44, '', 'Shandong Sheng'),
(866, 44, '', 'Shanghai'),
(867, 44, '', 'Shanxi'),
(868, 44, '', 'Sichuan'),
(869, 44, '', 'Tianjin'),
(870, 44, '', 'Xianggang'),
(871, 44, '', 'Xinjiang'),
(872, 44, '', 'Xizang'),
(873, 44, '', 'Yunnan'),
(874, 44, '', 'Zhejiang'),
(875, 44, '', 'Zhejiang Sheng'),
(876, 45, '', 'Christmas Island'),
(877, 46, '', 'Cocos (Keeling) Islands'),
(878, 47, '', 'Amazonas'),
(879, 47, '', 'Antioquia'),
(880, 47, '', 'Arauca'),
(881, 47, '', 'Atlantico'),
(882, 47, '', 'Bogota'),
(883, 47, '', 'Bolivar'),
(884, 47, '', 'Boyaca'),
(885, 47, '', 'Caldas'),
(886, 47, '', 'Caqueta'),
(887, 47, '', 'Casanare'),
(888, 47, '', 'Cauca'),
(889, 47, '', 'Cesar'),
(890, 47, '', 'Choco'),
(891, 47, '', 'Cordoba'),
(892, 47, '', 'Cundinamarca'),
(893, 47, '', 'Guainia'),
(894, 47, '', 'Guaviare'),
(895, 47, '', 'Huila'),
(896, 47, '', 'La Guajira'),
(897, 47, '', 'Magdalena'),
(898, 47, '', 'Meta'),
(899, 47, '', 'Narino'),
(900, 47, '', 'Norte de Santander'),
(901, 47, '', 'Putumayo'),
(902, 47, '', 'Quindio'),
(903, 47, '', 'Risaralda'),
(904, 47, '', 'San Andres y Providencia'),
(905, 47, '', 'Santander'),
(906, 47, '', 'Sucre'),
(907, 47, '', 'Tolima'),
(908, 47, '', 'Valle del Cauca'),
(909, 47, '', 'Vaupes'),
(910, 47, '', 'Vichada'),
(911, 48, '', 'Mwali'),
(912, 48, '', 'Njazidja'),
(913, 48, '', 'Nzwani'),
(914, 49, '', 'Bouenza'),
(915, 49, '', 'Brazzaville'),
(916, 49, '', 'Cuvette'),
(917, 49, '', 'Kouilou'),
(918, 49, '', 'Lekoumou'),
(919, 49, '', 'Likouala'),
(920, 49, '', 'Niari'),
(921, 49, '', 'Plateaux'),
(922, 49, '', 'Pool'),
(923, 49, '', 'Sangha'),
(924, 50, '', 'Bandundu'),
(925, 50, '', 'Bas-Congo'),
(926, 50, '', 'Equateur'),
(927, 50, '', 'Haut-Congo'),
(928, 50, '', 'Kasai-Occidental'),
(929, 50, '', 'Kasai-Oriental'),
(930, 50, '', 'Katanga'),
(931, 50, '', 'Kinshasa'),
(932, 50, '', 'Maniema'),
(933, 50, '', 'Nord-Kivu'),
(934, 50, '', 'Sud-Kivu'),
(935, 51, '', 'Aitutaki'),
(936, 51, '', 'Atiu'),
(937, 51, '', 'Mangaia'),
(938, 51, '', 'Manihiki'),
(939, 51, '', 'Mauke'),
(940, 51, '', 'Mitiaro'),
(941, 51, '', 'Nassau'),
(942, 51, '', 'Pukapuka'),
(943, 51, '', 'Rakahanga'),
(944, 51, '', 'Rarotonga'),
(945, 51, '', 'Tongareva'),
(946, 52, '', 'Alajuela'),
(947, 52, '', 'Cartago'),
(948, 52, '', 'Guanacaste'),
(949, 52, '', 'Heredia'),
(950, 52, '', 'Limon'),
(951, 52, '', 'Puntarenas'),
(952, 52, '', 'San Jose'),
(953, 53, '', 'Abidjan'),
(954, 53, '', 'Agneby'),
(955, 53, '', 'Bafing'),
(956, 53, '', 'Denguele'),
(957, 53, '', 'Dix-huit Montagnes'),
(958, 53, '', 'Fromager'),
(959, 53, '', 'Haut-Sassandra'),
(960, 53, '', 'Lacs'),
(961, 53, '', 'Lagunes'),
(962, 53, '', 'Marahoue'),
(963, 53, '', 'Moyen-Cavally'),
(964, 53, '', 'Moyen-Comoe'),
(965, 53, '', 'N\'zi-Comoe'),
(966, 53, '', 'Sassandra'),
(967, 53, '', 'Savanes'),
(968, 53, '', 'Sud-Bandama'),
(969, 53, '', 'Sud-Comoe'),
(970, 53, '', 'Vallee du Bandama'),
(971, 53, '', 'Worodougou'),
(972, 53, '', 'Zanzan'),
(973, 54, '', 'Bjelovar-Bilogora'),
(974, 54, '', 'Dubrovnik-Neretva'),
(975, 54, '', 'Grad Zagreb'),
(976, 54, '', 'Istra'),
(977, 54, '', 'Karlovac'),
(978, 54, '', 'Koprivnica-Krizhevci'),
(979, 54, '', 'Krapina-Zagorje'),
(980, 54, '', 'Lika-Senj'),
(981, 54, '', 'Medhimurje'),
(982, 54, '', 'Medimurska Zupanija'),
(983, 54, '', 'Osijek-Baranja'),
(984, 54, '', 'Osjecko-Baranjska Zupanija'),
(985, 54, '', 'Pozhega-Slavonija'),
(986, 54, '', 'Primorje-Gorski Kotar'),
(987, 54, '', 'Shibenik-Knin'),
(988, 54, '', 'Sisak-Moslavina'),
(989, 54, '', 'Slavonski Brod-Posavina'),
(990, 54, '', 'Split-Dalmacija'),
(991, 54, '', 'Varazhdin'),
(992, 54, '', 'Virovitica-Podravina'),
(993, 54, '', 'Vukovar-Srijem'),
(994, 54, '', 'Zadar'),
(995, 54, '', 'Zagreb'),
(996, 55, '', 'Camaguey'),
(997, 55, '', 'Ciego de Avila'),
(998, 55, '', 'Cienfuegos'),
(999, 55, '', 'Ciudad de la Habana'),
(1000, 55, '', 'Granma'),
(1001, 55, '', 'Guantanamo'),
(1002, 55, '', 'Habana'),
(1003, 55, '', 'Holguin'),
(1004, 55, '', 'Isla de la Juventud'),
(1005, 55, '', 'La Habana'),
(1006, 55, '', 'Las Tunas'),
(1007, 55, '', 'Matanzas'),
(1008, 55, '', 'Pinar del Rio'),
(1009, 55, '', 'Sancti Spiritus'),
(1010, 55, '', 'Santiago de Cuba'),
(1011, 55, '', 'Villa Clara'),
(1012, 56, '', 'Government controlled area'),
(1013, 56, '', 'Limassol'),
(1014, 56, '', 'Nicosia District'),
(1015, 56, '', 'Paphos'),
(1016, 56, '', 'Turkish controlled area'),
(1017, 57, '', 'Central Bohemian'),
(1018, 57, '', 'Frycovice'),
(1019, 57, '', 'Jihocesky Kraj'),
(1020, 57, '', 'Jihochesky'),
(1021, 57, '', 'Jihomoravsky'),
(1022, 57, '', 'Karlovarsky'),
(1023, 57, '', 'Klecany'),
(1024, 57, '', 'Kralovehradecky'),
(1025, 57, '', 'Liberecky'),
(1026, 57, '', 'Lipov'),
(1027, 57, '', 'Moravskoslezsky'),
(1028, 57, '', 'Olomoucky'),
(1029, 57, '', 'Olomoucky Kraj'),
(1030, 57, '', 'Pardubicky'),
(1031, 57, '', 'Plzensky'),
(1032, 57, '', 'Praha'),
(1033, 57, '', 'Rajhrad'),
(1034, 57, '', 'Smirice'),
(1035, 57, '', 'South Moravian'),
(1036, 57, '', 'Straz nad Nisou'),
(1037, 57, '', 'Stredochesky'),
(1038, 57, '', 'Unicov'),
(1039, 57, '', 'Ustecky'),
(1040, 57, '', 'Valletta'),
(1041, 57, '', 'Velesin'),
(1042, 57, '', 'Vysochina'),
(1043, 57, '', 'Zlinsky'),
(1044, 58, '', 'Arhus'),
(1045, 58, '', 'Bornholm'),
(1046, 58, '', 'Frederiksborg'),
(1047, 58, '', 'Fyn'),
(1048, 58, '', 'Hovedstaden'),
(1049, 58, '', 'Kobenhavn'),
(1050, 58, '', 'Kobenhavns Amt'),
(1051, 58, '', 'Kobenhavns Kommune'),
(1052, 58, '', 'Nordjylland'),
(1053, 58, '', 'Ribe'),
(1054, 58, '', 'Ringkobing'),
(1055, 58, '', 'Roervig'),
(1056, 58, '', 'Roskilde'),
(1057, 58, '', 'Roslev'),
(1058, 58, '', 'Sjaelland'),
(1059, 58, '', 'Soeborg'),
(1060, 58, '', 'Sonderjylland'),
(1061, 58, '', 'Storstrom'),
(1062, 58, '', 'Syddanmark'),
(1063, 58, '', 'Toelloese'),
(1064, 58, '', 'Vejle'),
(1065, 58, '', 'Vestsjalland'),
(1066, 58, '', 'Viborg'),
(1067, 59, '', '\'Ali Sabih'),
(1068, 59, '', 'Dikhil'),
(1069, 59, '', 'Jibuti'),
(1070, 59, '', 'Tajurah'),
(1071, 59, '', 'Ubuk'),
(1072, 60, '', 'Saint Andrew'),
(1073, 60, '', 'Saint David'),
(1074, 60, '', 'Saint George'),
(1075, 60, '', 'Saint John'),
(1076, 60, '', 'Saint Joseph'),
(1077, 60, '', 'Saint Luke'),
(1078, 60, '', 'Saint Mark'),
(1079, 60, '', 'Saint Patrick'),
(1080, 60, '', 'Saint Paul'),
(1081, 60, '', 'Saint Peter'),
(1082, 61, '', 'Azua'),
(1083, 61, '', 'Bahoruco'),
(1084, 61, '', 'Barahona'),
(1085, 61, '', 'Dajabon'),
(1086, 61, '', 'Distrito Nacional'),
(1087, 61, '', 'Duarte'),
(1088, 61, '', 'El Seybo'),
(1089, 61, '', 'Elias Pina'),
(1090, 61, '', 'Espaillat'),
(1091, 61, '', 'Hato Mayor'),
(1092, 61, '', 'Independencia'),
(1093, 61, '', 'La Altagracia'),
(1094, 61, '', 'La Romana'),
(1095, 61, '', 'La Vega'),
(1096, 61, '', 'Maria Trinidad Sanchez'),
(1097, 61, '', 'Monsenor Nouel'),
(1098, 61, '', 'Monte Cristi'),
(1099, 61, '', 'Monte Plata'),
(1100, 61, '', 'Pedernales'),
(1101, 61, '', 'Peravia'),
(1102, 61, '', 'Puerto Plata'),
(1103, 61, '', 'Salcedo'),
(1104, 61, '', 'Samana'),
(1105, 61, '', 'San Cristobal'),
(1106, 61, '', 'San Juan'),
(1107, 61, '', 'San Pedro de Macoris'),
(1108, 61, '', 'Sanchez Ramirez'),
(1109, 61, '', 'Santiago'),
(1110, 61, '', 'Santiago Rodriguez'),
(1111, 61, '', 'Valverde'),
(1112, 62, '', 'Aileu'),
(1113, 62, '', 'Ainaro'),
(1114, 62, '', 'Ambeno'),
(1115, 62, '', 'Baucau'),
(1116, 62, '', 'Bobonaro'),
(1117, 62, '', 'Cova Lima'),
(1118, 62, '', 'Dili'),
(1119, 62, '', 'Ermera'),
(1120, 62, '', 'Lautem'),
(1121, 62, '', 'Liquica'),
(1122, 62, '', 'Manatuto'),
(1123, 62, '', 'Manufahi'),
(1124, 62, '', 'Viqueque'),
(1125, 63, '', 'Azuay'),
(1126, 63, '', 'Bolivar'),
(1127, 63, '', 'Canar'),
(1128, 63, '', 'Carchi'),
(1129, 63, '', 'Chimborazo'),
(1130, 63, '', 'Cotopaxi'),
(1131, 63, '', 'El Oro'),
(1132, 63, '', 'Esmeraldas'),
(1133, 63, '', 'Galapagos'),
(1134, 63, '', 'Guayas'),
(1135, 63, '', 'Imbabura'),
(1136, 63, '', 'Loja'),
(1137, 63, '', 'Los Rios'),
(1138, 63, '', 'Manabi'),
(1139, 63, '', 'Morona Santiago'),
(1140, 63, '', 'Napo'),
(1141, 63, '', 'Orellana'),
(1142, 63, '', 'Pastaza'),
(1143, 63, '', 'Pichincha'),
(1144, 63, '', 'Sucumbios'),
(1145, 63, '', 'Tungurahua'),
(1146, 63, '', 'Zamora Chinchipe'),
(1147, 64, '', 'Aswan'),
(1148, 64, '', 'Asyut'),
(1149, 64, '', 'Bani Suwayf'),
(1150, 64, '', 'Bur Sa\'id'),
(1151, 64, '', 'Cairo'),
(1152, 64, '', 'Dumyat'),
(1153, 64, '', 'Kafr-ash-Shaykh'),
(1154, 64, '', 'Matruh'),
(1155, 64, '', 'Muhafazat ad Daqahliyah'),
(1156, 64, '', 'Muhafazat al Fayyum'),
(1157, 64, '', 'Muhafazat al Gharbiyah'),
(1158, 64, '', 'Muhafazat al Iskandariyah'),
(1159, 64, '', 'Muhafazat al Qahirah'),
(1160, 64, '', 'Qina'),
(1161, 64, '', 'Sawhaj'),
(1162, 64, '', 'Sina al-Janubiyah'),
(1163, 64, '', 'Sina ash-Shamaliyah'),
(1164, 64, '', 'ad-Daqahliyah'),
(1165, 64, '', 'al-Bahr-al-Ahmar'),
(1166, 64, '', 'al-Buhayrah'),
(1167, 64, '', 'al-Fayyum'),
(1168, 64, '', 'al-Gharbiyah'),
(1169, 64, '', 'al-Iskandariyah'),
(1170, 64, '', 'al-Ismailiyah'),
(1171, 64, '', 'al-Jizah'),
(1172, 64, '', 'al-Minufiyah'),
(1173, 64, '', 'al-Minya'),
(1174, 64, '', 'al-Qahira'),
(1175, 64, '', 'al-Qalyubiyah'),
(1176, 64, '', 'al-Uqsur'),
(1177, 64, '', 'al-Wadi al-Jadid'),
(1178, 64, '', 'as-Suways'),
(1179, 64, '', 'ash-Sharqiyah'),
(1180, 65, '', 'Ahuachapan'),
(1181, 65, '', 'Cabanas'),
(1182, 65, '', 'Chalatenango'),
(1183, 65, '', 'Cuscatlan'),
(1184, 65, '', 'La Libertad'),
(1185, 65, '', 'La Paz'),
(1186, 65, '', 'La Union'),
(1187, 65, '', 'Morazan'),
(1188, 65, '', 'San Miguel'),
(1189, 65, '', 'San Salvador'),
(1190, 65, '', 'San Vicente'),
(1191, 65, '', 'Santa Ana'),
(1192, 65, '', 'Sonsonate'),
(1193, 65, '', 'Usulutan'),
(1194, 66, '', 'Annobon'),
(1195, 66, '', 'Bioko Norte'),
(1196, 66, '', 'Bioko Sur'),
(1197, 66, '', 'Centro Sur'),
(1198, 66, '', 'Kie-Ntem'),
(1199, 66, '', 'Litoral'),
(1200, 66, '', 'Wele-Nzas'),
(1201, 67, '', 'Anseba'),
(1202, 67, '', 'Debub'),
(1203, 67, '', 'Debub-Keih-Bahri'),
(1204, 67, '', 'Gash-Barka'),
(1205, 67, '', 'Maekel'),
(1206, 67, '', 'Semien-Keih-Bahri'),
(1207, 68, '', 'Harju'),
(1208, 68, '', 'Hiiu'),
(1209, 68, '', 'Ida-Viru'),
(1210, 68, '', 'Jarva'),
(1211, 68, '', 'Jogeva'),
(1212, 68, '', 'Laane'),
(1213, 68, '', 'Laane-Viru'),
(1214, 68, '', 'Parnu'),
(1215, 68, '', 'Polva'),
(1216, 68, '', 'Rapla'),
(1217, 68, '', 'Saare'),
(1218, 68, '', 'Tartu'),
(1219, 68, '', 'Valga'),
(1220, 68, '', 'Viljandi'),
(1221, 68, '', 'Voru'),
(1222, 69, '', 'Addis Abeba'),
(1223, 69, '', 'Afar'),
(1224, 69, '', 'Amhara'),
(1225, 69, '', 'Benishangul'),
(1226, 69, '', 'Diredawa'),
(1227, 69, '', 'Gambella'),
(1228, 69, '', 'Harar'),
(1229, 69, '', 'Jigjiga'),
(1230, 69, '', 'Mekele'),
(1231, 69, '', 'Oromia'),
(1232, 69, '', 'Somali'),
(1233, 69, '', 'Southern'),
(1234, 69, '', 'Tigray'),
(1235, 70, '', 'Christmas Island'),
(1236, 70, '', 'Cocos Islands'),
(1237, 70, '', 'Coral Sea Islands'),
(1238, 71, '', 'Falkland Islands'),
(1239, 71, '', 'South Georgia'),
(1240, 72, '', 'Klaksvik'),
(1241, 72, '', 'Nor ara Eysturoy'),
(1242, 72, '', 'Nor oy'),
(1243, 72, '', 'Sandoy'),
(1244, 72, '', 'Streymoy'),
(1245, 72, '', 'Su uroy'),
(1246, 72, '', 'Sy ra Eysturoy'),
(1247, 72, '', 'Torshavn'),
(1248, 72, '', 'Vaga'),
(1249, 73, '', 'Central'),
(1250, 73, '', 'Eastern'),
(1251, 73, '', 'Northern'),
(1252, 73, '', 'South Pacific'),
(1253, 73, '', 'Western'),
(1254, 74, '', 'Ahvenanmaa'),
(1255, 74, '', 'Etela-Karjala'),
(1256, 74, '', 'Etela-Pohjanmaa'),
(1257, 74, '', 'Etela-Savo'),
(1258, 74, '', 'Etela-Suomen Laani'),
(1259, 74, '', 'Ita-Suomen Laani'),
(1260, 74, '', 'Ita-Uusimaa'),
(1261, 74, '', 'Kainuu'),
(1262, 74, '', 'Kanta-Hame'),
(1263, 74, '', 'Keski-Pohjanmaa'),
(1264, 74, '', 'Keski-Suomi'),
(1265, 74, '', 'Kymenlaakso'),
(1266, 74, '', 'Lansi-Suomen Laani'),
(1267, 74, '', 'Lappi'),
(1268, 74, '', 'Northern Savonia'),
(1269, 74, '', 'Ostrobothnia'),
(1270, 74, '', 'Oulun Laani'),
(1271, 74, '', 'Paijat-Hame'),
(1272, 74, '', 'Pirkanmaa'),
(1273, 74, '', 'Pohjanmaa'),
(1274, 74, '', 'Pohjois-Karjala'),
(1275, 74, '', 'Pohjois-Pohjanmaa'),
(1276, 74, '', 'Pohjois-Savo'),
(1277, 74, '', 'Saarijarvi'),
(1278, 74, '', 'Satakunta'),
(1279, 74, '', 'Southern Savonia'),
(1280, 74, '', 'Tavastia Proper'),
(1281, 74, '', 'Uleaborgs Lan'),
(1282, 74, '', 'Uusimaa'),
(1283, 74, '', 'Varsinais-Suomi'),
(1284, 75, '', 'Ain'),
(1285, 75, '', 'Aisne'),
(1286, 75, '', 'Albi Le Sequestre'),
(1287, 75, '', 'Allier'),
(1288, 75, '', 'Alpes-Cote dAzur'),
(1289, 75, '', 'Alpes-Maritimes'),
(1290, 75, '', 'Alpes-de-Haute-Provence'),
(1291, 75, '', 'Alsace'),
(1292, 75, '', 'Aquitaine'),
(1293, 75, '', 'Ardeche'),
(1294, 75, '', 'Ardennes'),
(1295, 75, '', 'Ariege'),
(1296, 75, '', 'Aube'),
(1297, 75, '', 'Aude'),
(1298, 75, '', 'Auvergne'),
(1299, 75, '', 'Aveyron'),
(1300, 75, '', 'Bas-Rhin'),
(1301, 75, '', 'Basse-Normandie'),
(1302, 75, '', 'Bouches-du-Rhone'),
(1303, 75, '', 'Bourgogne'),
(1304, 75, '', 'Bretagne'),
(1305, 75, '', 'Brittany'),
(1306, 75, '', 'Burgundy'),
(1307, 75, '', 'Calvados'),
(1308, 75, '', 'Cantal'),
(1309, 75, '', 'Cedex'),
(1310, 75, '', 'Centre'),
(1311, 75, '', 'Charente'),
(1312, 75, '', 'Charente-Maritime'),
(1313, 75, '', 'Cher'),
(1314, 75, '', 'Correze'),
(1315, 75, '', 'Corse-du-Sud'),
(1316, 75, '', 'Cote-d\'Or'),
(1317, 75, '', 'Cotes-d\'Armor'),
(1318, 75, '', 'Creuse'),
(1319, 75, '', 'Crolles'),
(1320, 75, '', 'Deux-Sevres'),
(1321, 75, '', 'Dordogne'),
(1322, 75, '', 'Doubs'),
(1323, 75, '', 'Drome'),
(1324, 75, '', 'Essonne'),
(1325, 75, '', 'Eure'),
(1326, 75, '', 'Eure-et-Loir'),
(1327, 75, '', 'Feucherolles'),
(1328, 75, '', 'Finistere'),
(1329, 75, '', 'Franche-Comte'),
(1330, 75, '', 'Gard'),
(1331, 75, '', 'Gers'),
(1332, 75, '', 'Gironde'),
(1333, 75, '', 'Haut-Rhin'),
(1334, 75, '', 'Haute-Corse'),
(1335, 75, '', 'Haute-Garonne'),
(1336, 75, '', 'Haute-Loire'),
(1337, 75, '', 'Haute-Marne'),
(1338, 75, '', 'Haute-Saone'),
(1339, 75, '', 'Haute-Savoie'),
(1340, 75, '', 'Haute-Vienne'),
(1341, 75, '', 'Hautes-Alpes'),
(1342, 75, '', 'Hautes-Pyrenees'),
(1343, 75, '', 'Hauts-de-Seine'),
(1344, 75, '', 'Herault'),
(1345, 75, '', 'Ile-de-France'),
(1346, 75, '', 'Ille-et-Vilaine'),
(1347, 75, '', 'Indre'),
(1348, 75, '', 'Indre-et-Loire'),
(1349, 75, '', 'Isere'),
(1350, 75, '', 'Jura'),
(1351, 75, '', 'Klagenfurt'),
(1352, 75, '', 'Landes'),
(1353, 75, '', 'Languedoc-Roussillon'),
(1354, 75, '', 'Larcay'),
(1355, 75, '', 'Le Castellet'),
(1356, 75, '', 'Le Creusot'),
(1357, 75, '', 'Limousin'),
(1358, 75, '', 'Loir-et-Cher'),
(1359, 75, '', 'Loire'),
(1360, 75, '', 'Loire-Atlantique'),
(1361, 75, '', 'Loiret'),
(1362, 75, '', 'Lorraine'),
(1363, 75, '', 'Lot'),
(1364, 75, '', 'Lot-et-Garonne'),
(1365, 75, '', 'Lower Normandy'),
(1366, 75, '', 'Lozere'),
(1367, 75, '', 'Maine-et-Loire'),
(1368, 75, '', 'Manche'),
(1369, 75, '', 'Marne'),
(1370, 75, '', 'Mayenne'),
(1371, 75, '', 'Meurthe-et-Moselle'),
(1372, 75, '', 'Meuse'),
(1373, 75, '', 'Midi-Pyrenees'),
(1374, 75, '', 'Morbihan'),
(1375, 75, '', 'Moselle'),
(1376, 75, '', 'Nievre'),
(1377, 75, '', 'Nord'),
(1378, 75, '', 'Nord-Pas-de-Calais'),
(1379, 75, '', 'Oise'),
(1380, 75, '', 'Orne'),
(1381, 75, '', 'Paris'),
(1382, 75, '', 'Pas-de-Calais'),
(1383, 75, '', 'Pays de la Loire'),
(1384, 75, '', 'Pays-de-la-Loire'),
(1385, 75, '', 'Picardy'),
(1386, 75, '', 'Puy-de-Dome'),
(1387, 75, '', 'Pyrenees-Atlantiques'),
(1388, 75, '', 'Pyrenees-Orientales'),
(1389, 75, '', 'Quelmes'),
(1390, 75, '', 'Rhone'),
(1391, 75, '', 'Rhone-Alpes'),
(1392, 75, '', 'Saint Ouen'),
(1393, 75, '', 'Saint Viatre'),
(1394, 75, '', 'Saone-et-Loire'),
(1395, 75, '', 'Sarthe'),
(1396, 75, '', 'Savoie'),
(1397, 75, '', 'Seine-Maritime'),
(1398, 75, '', 'Seine-Saint-Denis'),
(1399, 75, '', 'Seine-et-Marne'),
(1400, 75, '', 'Somme'),
(1401, 75, '', 'Sophia Antipolis'),
(1402, 75, '', 'Souvans'),
(1403, 75, '', 'Tarn'),
(1404, 75, '', 'Tarn-et-Garonne'),
(1405, 75, '', 'Territoire de Belfort'),
(1406, 75, '', 'Treignac'),
(1407, 75, '', 'Upper Normandy'),
(1408, 75, '', 'Val-d\'Oise'),
(1409, 75, '', 'Val-de-Marne'),
(1410, 75, '', 'Var'),
(1411, 75, '', 'Vaucluse'),
(1412, 75, '', 'Vellise'),
(1413, 75, '', 'Vendee'),
(1414, 75, '', 'Vienne'),
(1415, 75, '', 'Vosges'),
(1416, 75, '', 'Yonne'),
(1417, 75, '', 'Yvelines'),
(1418, 76, '', 'Cayenne'),
(1419, 76, '', 'Saint-Laurent-du-Maroni'),
(1420, 77, '', 'Iles du Vent'),
(1421, 77, '', 'Iles sous le Vent'),
(1422, 77, '', 'Marquesas'),
(1423, 77, '', 'Tuamotu'),
(1424, 77, '', 'Tubuai'),
(1425, 78, '', 'Amsterdam'),
(1426, 78, '', 'Crozet Islands'),
(1427, 78, '', 'Kerguelen'),
(1428, 79, '', 'Estuaire'),
(1429, 79, '', 'Haut-Ogooue'),
(1430, 79, '', 'Moyen-Ogooue'),
(1431, 79, '', 'Ngounie'),
(1432, 79, '', 'Nyanga'),
(1433, 79, '', 'Ogooue-Ivindo'),
(1434, 79, '', 'Ogooue-Lolo'),
(1435, 79, '', 'Ogooue-Maritime'),
(1436, 79, '', 'Woleu-Ntem'),
(1437, 80, '', 'Banjul'),
(1438, 80, '', 'Basse'),
(1439, 80, '', 'Brikama'),
(1440, 80, '', 'Janjanbureh'),
(1441, 80, '', 'Kanifing'),
(1442, 80, '', 'Kerewan'),
(1443, 80, '', 'Kuntaur'),
(1444, 80, '', 'Mansakonko'),
(1445, 81, '', 'Abhasia'),
(1446, 81, '', 'Ajaria'),
(1447, 81, '', 'Guria'),
(1448, 81, '', 'Imereti'),
(1449, 81, '', 'Kaheti'),
(1450, 81, '', 'Kvemo Kartli'),
(1451, 81, '', 'Mcheta-Mtianeti'),
(1452, 81, '', 'Racha'),
(1453, 81, '', 'Samagrelo-Zemo Svaneti'),
(1454, 81, '', 'Samche-Zhavaheti'),
(1455, 81, '', 'Shida Kartli'),
(1456, 81, '', 'Tbilisi'),
(1457, 82, '', 'Auvergne'),
(1458, 82, '', 'Baden-Wurttemberg'),
(1459, 82, '', 'Bavaria'),
(1460, 82, '', 'Bayern'),
(1461, 82, '', 'Beilstein Wurtt'),
(1462, 82, '', 'Berlin'),
(1463, 82, '', 'Brandenburg'),
(1464, 82, '', 'Bremen'),
(1465, 82, '', 'Dreisbach'),
(1466, 82, '', 'Freistaat Bayern'),
(1467, 82, '', 'Hamburg'),
(1468, 82, '', 'Hannover'),
(1469, 82, '', 'Heroldstatt'),
(1470, 82, '', 'Hessen'),
(1471, 82, '', 'Kortenberg'),
(1472, 82, '', 'Laasdorf'),
(1473, 82, '', 'Land Baden-Wurttemberg'),
(1474, 82, '', 'Land Bayern'),
(1475, 82, '', 'Land Brandenburg'),
(1476, 82, '', 'Land Hessen'),
(1477, 82, '', 'Land Mecklenburg-Vorpommern'),
(1478, 82, '', 'Land Nordrhein-Westfalen'),
(1479, 82, '', 'Land Rheinland-Pfalz'),
(1480, 82, '', 'Land Sachsen'),
(1481, 82, '', 'Land Sachsen-Anhalt'),
(1482, 82, '', 'Land Thuringen'),
(1483, 82, '', 'Lower Saxony'),
(1484, 82, '', 'Mecklenburg-Vorpommern'),
(1485, 82, '', 'Mulfingen'),
(1486, 82, '', 'Munich'),
(1487, 82, '', 'Neubeuern'),
(1488, 82, '', 'Niedersachsen'),
(1489, 82, '', 'Noord-Holland'),
(1490, 82, '', 'Nordrhein-Westfalen'),
(1491, 82, '', 'North Rhine-Westphalia'),
(1492, 82, '', 'Osterode'),
(1493, 82, '', 'Rheinland-Pfalz'),
(1494, 82, '', 'Rhineland-Palatinate'),
(1495, 82, '', 'Saarland'),
(1496, 82, '', 'Sachsen'),
(1497, 82, '', 'Sachsen-Anhalt'),
(1498, 82, '', 'Saxony'),
(1499, 82, '', 'Schleswig-Holstein'),
(1500, 82, '', 'Thuringia'),
(1501, 82, '', 'Webling'),
(1502, 82, '', 'Weinstrabe'),
(1503, 82, '', 'schlobborn'),
(1504, 83, '', 'Ashanti'),
(1505, 83, '', 'Brong-Ahafo'),
(1506, 83, '', 'Central'),
(1507, 83, '', 'Eastern'),
(1508, 83, '', 'Greater Accra'),
(1509, 83, '', 'Northern'),
(1510, 83, '', 'Upper East'),
(1511, 83, '', 'Upper West'),
(1512, 83, '', 'Volta'),
(1513, 83, '', 'Western'),
(1514, 84, '', 'Gibraltar'),
(1515, 85, '', 'Acharnes'),
(1516, 85, '', 'Ahaia'),
(1517, 85, '', 'Aitolia kai Akarnania'),
(1518, 85, '', 'Argolis'),
(1519, 85, '', 'Arkadia'),
(1520, 85, '', 'Arta'),
(1521, 85, '', 'Attica'),
(1522, 85, '', 'Attiki'),
(1523, 85, '', 'Ayion Oros'),
(1524, 85, '', 'Crete'),
(1525, 85, '', 'Dodekanisos'),
(1526, 85, '', 'Drama'),
(1527, 85, '', 'Evia'),
(1528, 85, '', 'Evritania'),
(1529, 85, '', 'Evros'),
(1530, 85, '', 'Evvoia'),
(1531, 85, '', 'Florina'),
(1532, 85, '', 'Fokis'),
(1533, 85, '', 'Fthiotis'),
(1534, 85, '', 'Grevena'),
(1535, 85, '', 'Halandri'),
(1536, 85, '', 'Halkidiki'),
(1537, 85, '', 'Hania'),
(1538, 85, '', 'Heraklion'),
(1539, 85, '', 'Hios'),
(1540, 85, '', 'Ilia'),
(1541, 85, '', 'Imathia'),
(1542, 85, '', 'Ioannina'),
(1543, 85, '', 'Iraklion'),
(1544, 85, '', 'Karditsa'),
(1545, 85, '', 'Kastoria'),
(1546, 85, '', 'Kavala'),
(1547, 85, '', 'Kefallinia'),
(1548, 85, '', 'Kerkira'),
(1549, 85, '', 'Kiklades'),
(1550, 85, '', 'Kilkis'),
(1551, 85, '', 'Korinthia'),
(1552, 85, '', 'Kozani'),
(1553, 85, '', 'Lakonia'),
(1554, 85, '', 'Larisa'),
(1555, 85, '', 'Lasithi'),
(1556, 85, '', 'Lesvos'),
(1557, 85, '', 'Levkas'),
(1558, 85, '', 'Magnisia'),
(1559, 85, '', 'Messinia'),
(1560, 85, '', 'Nomos Attikis'),
(1561, 85, '', 'Nomos Zakynthou'),
(1562, 85, '', 'Pella'),
(1563, 85, '', 'Pieria'),
(1564, 85, '', 'Piraios'),
(1565, 85, '', 'Preveza'),
(1566, 85, '', 'Rethimni'),
(1567, 85, '', 'Rodopi'),
(1568, 85, '', 'Samos'),
(1569, 85, '', 'Serrai'),
(1570, 85, '', 'Thesprotia'),
(1571, 85, '', 'Thessaloniki'),
(1572, 85, '', 'Trikala'),
(1573, 85, '', 'Voiotia'),
(1574, 85, '', 'West Greece'),
(1575, 85, '', 'Xanthi'),
(1576, 85, '', 'Zakinthos'),
(1577, 86, '', 'Aasiaat'),
(1578, 86, '', 'Ammassalik'),
(1579, 86, '', 'Illoqqortoormiut'),
(1580, 86, '', 'Ilulissat'),
(1581, 86, '', 'Ivittuut'),
(1582, 86, '', 'Kangaatsiaq'),
(1583, 86, '', 'Maniitsoq'),
(1584, 86, '', 'Nanortalik'),
(1585, 86, '', 'Narsaq'),
(1586, 86, '', 'Nuuk'),
(1587, 86, '', 'Paamiut'),
(1588, 86, '', 'Qaanaaq'),
(1589, 86, '', 'Qaqortoq'),
(1590, 86, '', 'Qasigiannguit'),
(1591, 86, '', 'Qeqertarsuaq'),
(1592, 86, '', 'Sisimiut'),
(1593, 86, '', 'Udenfor kommunal inddeling'),
(1594, 86, '', 'Upernavik'),
(1595, 86, '', 'Uummannaq'),
(1596, 87, '', 'Carriacou-Petite Martinique'),
(1597, 87, '', 'Saint Andrew'),
(1598, 87, '', 'Saint Davids'),
(1599, 87, '', 'Saint George\'s'),
(1600, 87, '', 'Saint John'),
(1601, 87, '', 'Saint Mark'),
(1602, 87, '', 'Saint Patrick'),
(1603, 88, '', 'Basse-Terre'),
(1604, 88, '', 'Grande-Terre'),
(1605, 88, '', 'Iles des Saintes'),
(1606, 88, '', 'La Desirade'),
(1607, 88, '', 'Marie-Galante'),
(1608, 88, '', 'Saint Barthelemy'),
(1609, 88, '', 'Saint Martin'),
(1610, 89, '', 'Agana Heights'),
(1611, 89, '', 'Agat'),
(1612, 89, '', 'Barrigada'),
(1613, 89, '', 'Chalan-Pago-Ordot'),
(1614, 89, '', 'Dededo'),
(1615, 89, '', 'Hagatna'),
(1616, 89, '', 'Inarajan'),
(1617, 89, '', 'Mangilao'),
(1618, 89, '', 'Merizo'),
(1619, 89, '', 'Mongmong-Toto-Maite'),
(1620, 89, '', 'Santa Rita'),
(1621, 89, '', 'Sinajana'),
(1622, 89, '', 'Talofofo'),
(1623, 89, '', 'Tamuning'),
(1624, 89, '', 'Yigo'),
(1625, 89, '', 'Yona'),
(1626, 90, '', 'Alta Verapaz'),
(1627, 90, '', 'Baja Verapaz'),
(1628, 90, '', 'Chimaltenango'),
(1629, 90, '', 'Chiquimula'),
(1630, 90, '', 'El Progreso'),
(1631, 90, '', 'Escuintla'),
(1632, 90, '', 'Guatemala'),
(1633, 90, '', 'Huehuetenango'),
(1634, 90, '', 'Izabal'),
(1635, 90, '', 'Jalapa'),
(1636, 90, '', 'Jutiapa'),
(1637, 90, '', 'Peten'),
(1638, 90, '', 'Quezaltenango'),
(1639, 90, '', 'Quiche'),
(1640, 90, '', 'Retalhuleu'),
(1641, 90, '', 'Sacatepequez'),
(1642, 90, '', 'San Marcos'),
(1643, 90, '', 'Santa Rosa'),
(1644, 90, '', 'Solola'),
(1645, 90, '', 'Suchitepequez'),
(1646, 90, '', 'Totonicapan'),
(1647, 90, '', 'Zacapa'),
(1648, 91, '', 'Alderney'),
(1649, 91, '', 'Castel'),
(1650, 91, '', 'Forest'),
(1651, 91, '', 'Saint Andrew'),
(1652, 91, '', 'Saint Martin'),
(1653, 91, '', 'Saint Peter Port'),
(1654, 91, '', 'Saint Pierre du Bois'),
(1655, 91, '', 'Saint Sampson'),
(1656, 91, '', 'Saint Saviour'),
(1657, 91, '', 'Sark'),
(1658, 91, '', 'Torteval'),
(1659, 91, '', 'Vale'),
(1660, 92, '', 'Beyla'),
(1661, 92, '', 'Boffa'),
(1662, 92, '', 'Boke'),
(1663, 92, '', 'Conakry'),
(1664, 92, '', 'Coyah'),
(1665, 92, '', 'Dabola'),
(1666, 92, '', 'Dalaba'),
(1667, 92, '', 'Dinguiraye'),
(1668, 92, '', 'Faranah'),
(1669, 92, '', 'Forecariah'),
(1670, 92, '', 'Fria'),
(1671, 92, '', 'Gaoual'),
(1672, 92, '', 'Gueckedou'),
(1673, 92, '', 'Kankan'),
(1674, 92, '', 'Kerouane'),
(1675, 92, '', 'Kindia'),
(1676, 92, '', 'Kissidougou'),
(1677, 92, '', 'Koubia'),
(1678, 92, '', 'Koundara'),
(1679, 92, '', 'Kouroussa'),
(1680, 92, '', 'Labe'),
(1681, 92, '', 'Lola'),
(1682, 92, '', 'Macenta'),
(1683, 92, '', 'Mali'),
(1684, 92, '', 'Mamou'),
(1685, 92, '', 'Mandiana'),
(1686, 92, '', 'Nzerekore'),
(1687, 92, '', 'Pita'),
(1688, 92, '', 'Siguiri'),
(1689, 92, '', 'Telimele'),
(1690, 92, '', 'Tougue'),
(1691, 92, '', 'Yomou'),
(1692, 93, '', 'Bafata'),
(1693, 93, '', 'Bissau'),
(1694, 93, '', 'Bolama'),
(1695, 93, '', 'Cacheu'),
(1696, 93, '', 'Gabu'),
(1697, 93, '', 'Oio'),
(1698, 93, '', 'Quinara'),
(1699, 93, '', 'Tombali'),
(1700, 94, '', 'Barima-Waini'),
(1701, 94, '', 'Cuyuni-Mazaruni'),
(1702, 94, '', 'Demerara-Mahaica'),
(1703, 94, '', 'East Berbice-Corentyne'),
(1704, 94, '', 'Essequibo Islands-West Demerar'),
(1705, 94, '', 'Mahaica-Berbice'),
(1706, 94, '', 'Pomeroon-Supenaam'),
(1707, 94, '', 'Potaro-Siparuni'),
(1708, 94, '', 'Upper Demerara-Berbice'),
(1709, 94, '', 'Upper Takutu-Upper Essequibo'),
(1710, 95, '', 'Artibonite'),
(1711, 95, '', 'Centre'),
(1712, 95, '', 'Grand\'Anse'),
(1713, 95, '', 'Nord'),
(1714, 95, '', 'Nord-Est'),
(1715, 95, '', 'Nord-Ouest'),
(1716, 95, '', 'Ouest'),
(1717, 95, '', 'Sud'),
(1718, 95, '', 'Sud-Est'),
(1719, 96, '', 'Heard and McDonald Islands'),
(1720, 97, '', 'Atlantida'),
(1721, 97, '', 'Choluteca'),
(1722, 97, '', 'Colon'),
(1723, 97, '', 'Comayagua'),
(1724, 97, '', 'Copan'),
(1725, 97, '', 'Cortes'),
(1726, 97, '', 'Distrito Central'),
(1727, 97, '', 'El Paraiso'),
(1728, 97, '', 'Francisco Morazan'),
(1729, 97, '', 'Gracias a Dios'),
(1730, 97, '', 'Intibuca'),
(1731, 97, '', 'Islas de la Bahia'),
(1732, 97, '', 'La Paz'),
(1733, 97, '', 'Lempira'),
(1734, 97, '', 'Ocotepeque'),
(1735, 97, '', 'Olancho'),
(1736, 97, '', 'Santa Barbara'),
(1737, 97, '', 'Valle'),
(1738, 97, '', 'Yoro'),
(1739, 98, '', 'Hong Kong'),
(1760, 100, '', 'Austurland'),
(1761, 100, '', 'Gullbringusysla'),
(1762, 100, '', 'Hofu borgarsva i'),
(1763, 100, '', 'Nor urland eystra'),
(1764, 100, '', 'Nor urland vestra'),
(1765, 100, '', 'Su urland'),
(1766, 100, '', 'Su urnes'),
(1767, 100, '', 'Vestfir ir'),
(1768, 100, '', 'Vesturland'),
(1769, 102, '', 'Aceh'),
(1770, 102, '', 'Bali'),
(1771, 102, '', 'Bangka-Belitung'),
(1772, 102, '', 'Banten'),
(1773, 102, '', 'Bengkulu'),
(1774, 102, '', 'Gandaria'),
(1775, 102, '', 'Gorontalo'),
(1776, 102, '', 'Jakarta'),
(1777, 102, '', 'Jambi'),
(1778, 102, '', 'Jawa Barat'),
(1779, 102, '', 'Jawa Tengah'),
(1780, 102, '', 'Jawa Timur'),
(1781, 102, '', 'Kalimantan Barat'),
(1782, 102, '', 'Kalimantan Selatan'),
(1783, 102, '', 'Kalimantan Tengah'),
(1784, 102, '', 'Kalimantan Timur'),
(1785, 102, '', 'Kendal'),
(1786, 102, '', 'Lampung'),
(1787, 102, '', 'Maluku'),
(1788, 102, '', 'Maluku Utara'),
(1789, 102, '', 'Nusa Tenggara Barat'),
(1790, 102, '', 'Nusa Tenggara Timur'),
(1791, 102, '', 'Papua'),
(1792, 102, '', 'Riau'),
(1793, 102, '', 'Riau Kepulauan'),
(1794, 102, '', 'Solo'),
(1795, 102, '', 'Sulawesi Selatan'),
(1796, 102, '', 'Sulawesi Tengah'),
(1797, 102, '', 'Sulawesi Tenggara'),
(1798, 102, '', 'Sulawesi Utara'),
(1799, 102, '', 'Sumatera Barat'),
(1800, 102, '', 'Sumatera Selatan'),
(1801, 102, '', 'Sumatera Utara'),
(1802, 102, '', 'Yogyakarta'),
(1803, 103, '', 'Ardabil'),
(1804, 103, '', 'Azarbayjan-e Bakhtari'),
(1805, 103, '', 'Azarbayjan-e Khavari'),
(1806, 103, '', 'Bushehr'),
(1807, 103, '', 'Chahar Mahal-e Bakhtiari'),
(1808, 103, '', 'Esfahan'),
(1809, 103, '', 'Fars'),
(1810, 103, '', 'Gilan'),
(1811, 103, '', 'Golestan'),
(1812, 103, '', 'Hamadan'),
(1813, 103, '', 'Hormozgan'),
(1814, 103, '', 'Ilam'),
(1815, 103, '', 'Kerman'),
(1816, 103, '', 'Kermanshah'),
(1817, 103, '', 'Khorasan'),
(1818, 103, '', 'Khuzestan'),
(1819, 103, '', 'Kohgiluyeh-e Boyerahmad'),
(1820, 103, '', 'Kordestan'),
(1821, 103, '', 'Lorestan'),
(1822, 103, '', 'Markazi'),
(1823, 103, '', 'Mazandaran'),
(1824, 103, '', 'Ostan-e Esfahan'),
(1825, 103, '', 'Qazvin'),
(1826, 103, '', 'Qom'),
(1827, 103, '', 'Semnan'),
(1828, 103, '', 'Sistan-e Baluchestan'),
(1829, 103, '', 'Tehran'),
(1830, 103, '', 'Yazd'),
(1831, 103, '', 'Zanjan'),
(1832, 104, '', 'Babil'),
(1833, 104, '', 'Baghdad'),
(1834, 104, '', 'Dahuk'),
(1835, 104, '', 'Dhi Qar'),
(1836, 104, '', 'Diyala'),
(1837, 104, '', 'Erbil'),
(1838, 104, '', 'Irbil'),
(1839, 104, '', 'Karbala'),
(1840, 104, '', 'Kurdistan'),
(1841, 104, '', 'Maysan'),
(1842, 104, '', 'Ninawa'),
(1843, 104, '', 'Salah-ad-Din'),
(1844, 104, '', 'Wasit'),
(1845, 104, '', 'al-Anbar'),
(1846, 104, '', 'al-Basrah'),
(1847, 104, '', 'al-Muthanna'),
(1848, 104, '', 'al-Qadisiyah'),
(1849, 104, '', 'an-Najaf'),
(1850, 104, '', 'as-Sulaymaniyah'),
(1851, 104, '', 'at-Ta\'mim'),
(1852, 105, '', 'Armagh');
INSERT INTO `zones` (`zone_id`, `zone_country_id`, `zone_code`, `zone_name`) VALUES
(1853, 105, '', 'Carlow'),
(1854, 105, '', 'Cavan'),
(1855, 105, '', 'Clare'),
(1856, 105, '', 'Cork'),
(1857, 105, '', 'Donegal'),
(1858, 105, '', 'Dublin'),
(1859, 105, '', 'Galway'),
(1860, 105, '', 'Kerry'),
(1861, 105, '', 'Kildare'),
(1862, 105, '', 'Kilkenny'),
(1863, 105, '', 'Laois'),
(1864, 105, '', 'Leinster'),
(1865, 105, '', 'Leitrim'),
(1866, 105, '', 'Limerick'),
(1867, 105, '', 'Loch Garman'),
(1868, 105, '', 'Longford'),
(1869, 105, '', 'Louth'),
(1870, 105, '', 'Mayo'),
(1871, 105, '', 'Meath'),
(1872, 105, '', 'Monaghan'),
(1873, 105, '', 'Offaly'),
(1874, 105, '', 'Roscommon'),
(1875, 105, '', 'Sligo'),
(1876, 105, '', 'Tipperary North Riding'),
(1877, 105, '', 'Tipperary South Riding'),
(1878, 105, '', 'Ulster'),
(1879, 105, '', 'Waterford'),
(1880, 105, '', 'Westmeath'),
(1881, 105, '', 'Wexford'),
(1882, 105, '', 'Wicklow'),
(1883, 106, '', 'Beit Hanania'),
(1884, 106, '', 'Ben Gurion Airport'),
(1885, 106, '', 'Bethlehem'),
(1886, 106, '', 'Caesarea'),
(1887, 106, '', 'Centre'),
(1888, 106, '', 'Gaza'),
(1889, 106, '', 'Hadaron'),
(1890, 106, '', 'Haifa District'),
(1891, 106, '', 'Hamerkaz'),
(1892, 106, '', 'Hazafon'),
(1893, 106, '', 'Hebron'),
(1894, 106, '', 'Jaffa'),
(1895, 106, '', 'Jerusalem'),
(1896, 106, '', 'Khefa'),
(1897, 106, '', 'Kiryat Yam'),
(1898, 106, '', 'Lower Galilee'),
(1899, 106, '', 'Qalqilya'),
(1900, 106, '', 'Talme Elazar'),
(1901, 106, '', 'Tel Aviv'),
(1902, 106, '', 'Tsafon'),
(1903, 106, '', 'Umm El Fahem'),
(1904, 106, '', 'Yerushalayim'),
(1905, 107, '', 'Abruzzi'),
(1906, 107, '', 'Abruzzo'),
(1907, 107, '', 'Agrigento'),
(1908, 107, '', 'Alessandria'),
(1909, 107, '', 'Ancona'),
(1910, 107, '', 'Arezzo'),
(1911, 107, '', 'Ascoli Piceno'),
(1912, 107, '', 'Asti'),
(1913, 107, '', 'Avellino'),
(1914, 107, '', 'Bari'),
(1915, 107, '', 'Basilicata'),
(1916, 107, '', 'Belluno'),
(1917, 107, '', 'Benevento'),
(1918, 107, '', 'Bergamo'),
(1919, 107, '', 'Biella'),
(1920, 107, '', 'Bologna'),
(1921, 107, '', 'Bolzano'),
(1922, 107, '', 'Brescia'),
(1923, 107, '', 'Brindisi'),
(1924, 107, '', 'Calabria'),
(1925, 107, '', 'Campania'),
(1926, 107, '', 'Cartoceto'),
(1927, 107, '', 'Caserta'),
(1928, 107, '', 'Catania'),
(1929, 107, '', 'Chieti'),
(1930, 107, '', 'Como'),
(1931, 107, '', 'Cosenza'),
(1932, 107, '', 'Cremona'),
(1933, 107, '', 'Cuneo'),
(1934, 107, '', 'Emilia-Romagna'),
(1935, 107, '', 'Ferrara'),
(1936, 107, '', 'Firenze'),
(1937, 107, '', 'Florence'),
(1938, 107, '', 'Forli-Cesena '),
(1939, 107, '', 'Friuli-Venezia Giulia'),
(1940, 107, '', 'Frosinone'),
(1941, 107, '', 'Genoa'),
(1942, 107, '', 'Gorizia'),
(1943, 107, '', 'L\'Aquila'),
(1944, 107, '', 'Lazio'),
(1945, 107, '', 'Lecce'),
(1946, 107, '', 'Lecco'),
(1947, 107, '', 'Lecco Province'),
(1948, 107, '', 'Liguria'),
(1949, 107, '', 'Lodi'),
(1950, 107, '', 'Lombardia'),
(1951, 107, '', 'Lombardy'),
(1952, 107, '', 'Macerata'),
(1953, 107, '', 'Mantova'),
(1954, 107, '', 'Marche'),
(1955, 107, '', 'Messina'),
(1956, 107, '', 'Milan'),
(1957, 107, '', 'Modena'),
(1958, 107, '', 'Molise'),
(1959, 107, '', 'Molteno'),
(1960, 107, '', 'Montenegro'),
(1961, 107, '', 'Monza and Brianza'),
(1962, 107, '', 'Naples'),
(1963, 107, '', 'Novara'),
(1964, 107, '', 'Padova'),
(1965, 107, '', 'Parma'),
(1966, 107, '', 'Pavia'),
(1967, 107, '', 'Perugia'),
(1968, 107, '', 'Pesaro-Urbino'),
(1969, 107, '', 'Piacenza'),
(1970, 107, '', 'Piedmont'),
(1971, 107, '', 'Piemonte'),
(1972, 107, '', 'Pisa'),
(1973, 107, '', 'Pordenone'),
(1974, 107, '', 'Potenza'),
(1975, 107, '', 'Puglia'),
(1976, 107, '', 'Reggio Emilia'),
(1977, 107, '', 'Rimini'),
(1978, 107, '', 'Roma'),
(1979, 107, '', 'Salerno'),
(1980, 107, '', 'Sardegna'),
(1981, 107, '', 'Sassari'),
(1982, 107, '', 'Savona'),
(1983, 107, '', 'Sicilia'),
(1984, 107, '', 'Siena'),
(1985, 107, '', 'Sondrio'),
(1986, 107, '', 'South Tyrol'),
(1987, 107, '', 'Taranto'),
(1988, 107, '', 'Teramo'),
(1989, 107, '', 'Torino'),
(1990, 107, '', 'Toscana'),
(1991, 107, '', 'Trapani'),
(1992, 107, '', 'Trentino-Alto Adige'),
(1993, 107, '', 'Trento'),
(1994, 107, '', 'Treviso'),
(1995, 107, '', 'Udine'),
(1996, 107, '', 'Umbria'),
(1997, 107, '', 'Valle d\'Aosta'),
(1998, 107, '', 'Varese'),
(1999, 107, '', 'Veneto'),
(2000, 107, '', 'Venezia'),
(2001, 107, '', 'Verbano-Cusio-Ossola'),
(2002, 107, '', 'Vercelli'),
(2003, 107, '', 'Verona'),
(2004, 107, '', 'Vicenza'),
(2005, 107, '', 'Viterbo'),
(2006, 108, '', 'Buxoro Viloyati'),
(2007, 108, '', 'Clarendon'),
(2008, 108, '', 'Hanover'),
(2009, 108, '', 'Kingston'),
(2010, 108, '', 'Manchester'),
(2011, 108, '', 'Portland'),
(2012, 108, '', 'Saint Andrews'),
(2013, 108, '', 'Saint Ann'),
(2014, 108, '', 'Saint Catherine'),
(2015, 108, '', 'Saint Elizabeth'),
(2016, 108, '', 'Saint James'),
(2017, 108, '', 'Saint Mary'),
(2018, 108, '', 'Saint Thomas'),
(2019, 108, '', 'Trelawney'),
(2020, 108, '', 'Westmoreland'),
(2021, 109, '', 'Aichi'),
(2022, 109, '', 'Akita'),
(2023, 109, '', 'Aomori'),
(2024, 109, '', 'Chiba'),
(2025, 109, '', 'Ehime'),
(2026, 109, '', 'Fukui'),
(2027, 109, '', 'Fukuoka'),
(2028, 109, '', 'Fukushima'),
(2029, 109, '', 'Gifu'),
(2030, 109, '', 'Gumma'),
(2031, 109, '', 'Hiroshima'),
(2032, 109, '', 'Hokkaido'),
(2033, 109, '', 'Hyogo'),
(2034, 109, '', 'Ibaraki'),
(2035, 109, '', 'Ishikawa'),
(2036, 109, '', 'Iwate'),
(2037, 109, '', 'Kagawa'),
(2038, 109, '', 'Kagoshima'),
(2039, 109, '', 'Kanagawa'),
(2040, 109, '', 'Kanto'),
(2041, 109, '', 'Kochi'),
(2042, 109, '', 'Kumamoto'),
(2043, 109, '', 'Kyoto'),
(2044, 109, '', 'Mie'),
(2045, 109, '', 'Miyagi'),
(2046, 109, '', 'Miyazaki'),
(2047, 109, '', 'Nagano'),
(2048, 109, '', 'Nagasaki'),
(2049, 109, '', 'Nara'),
(2050, 109, '', 'Niigata'),
(2051, 109, '', 'Oita'),
(2052, 109, '', 'Okayama'),
(2053, 109, '', 'Okinawa'),
(2054, 109, '', 'Osaka'),
(2055, 109, '', 'Saga'),
(2056, 109, '', 'Saitama'),
(2057, 109, '', 'Shiga'),
(2058, 109, '', 'Shimane'),
(2059, 109, '', 'Shizuoka'),
(2060, 109, '', 'Tochigi'),
(2061, 109, '', 'Tokushima'),
(2062, 109, '', 'Tokyo'),
(2063, 109, '', 'Tottori'),
(2064, 109, '', 'Toyama'),
(2065, 109, '', 'Wakayama'),
(2066, 109, '', 'Yamagata'),
(2067, 109, '', 'Yamaguchi'),
(2068, 109, '', 'Yamanashi'),
(2069, 110, '', 'Grouville'),
(2070, 110, '', 'Saint Brelade'),
(2071, 110, '', 'Saint Clement'),
(2072, 110, '', 'Saint Helier'),
(2073, 110, '', 'Saint John'),
(2074, 110, '', 'Saint Lawrence'),
(2075, 110, '', 'Saint Martin'),
(2076, 110, '', 'Saint Mary'),
(2077, 110, '', 'Saint Peter'),
(2078, 110, '', 'Saint Saviour'),
(2079, 110, '', 'Trinity'),
(2080, 111, '', '\'Ajlun'),
(2081, 111, '', 'Amman'),
(2082, 111, '', 'Irbid'),
(2083, 111, '', 'Jarash'),
(2084, 111, '', 'Ma\'an'),
(2085, 111, '', 'Madaba'),
(2086, 111, '', 'al-\'Aqabah'),
(2087, 111, '', 'al-Balqa\''),
(2088, 111, '', 'al-Karak'),
(2089, 111, '', 'al-Mafraq'),
(2090, 111, '', 'at-Tafilah'),
(2091, 111, '', 'az-Zarqa\''),
(2092, 112, '', 'Akmecet'),
(2093, 112, '', 'Akmola'),
(2094, 112, '', 'Aktobe'),
(2095, 112, '', 'Almati'),
(2096, 112, '', 'Atirau'),
(2097, 112, '', 'Batis Kazakstan'),
(2098, 112, '', 'Burlinsky Region'),
(2099, 112, '', 'Karagandi'),
(2100, 112, '', 'Kostanay'),
(2101, 112, '', 'Mankistau'),
(2102, 112, '', 'Ontustik Kazakstan'),
(2103, 112, '', 'Pavlodar'),
(2104, 112, '', 'Sigis Kazakstan'),
(2105, 112, '', 'Soltustik Kazakstan'),
(2106, 112, '', 'Taraz'),
(2107, 113, '', 'Central'),
(2108, 113, '', 'Coast'),
(2109, 113, '', 'Eastern'),
(2110, 113, '', 'Nairobi'),
(2111, 113, '', 'North Eastern'),
(2112, 113, '', 'Nyanza'),
(2113, 113, '', 'Rift Valley'),
(2114, 113, '', 'Western'),
(2115, 114, '', 'Abaiang'),
(2116, 114, '', 'Abemana'),
(2117, 114, '', 'Aranuka'),
(2118, 114, '', 'Arorae'),
(2119, 114, '', 'Banaba'),
(2120, 114, '', 'Beru'),
(2121, 114, '', 'Butaritari'),
(2122, 114, '', 'Kiritimati'),
(2123, 114, '', 'Kuria'),
(2124, 114, '', 'Maiana'),
(2125, 114, '', 'Makin'),
(2126, 114, '', 'Marakei'),
(2127, 114, '', 'Nikunau'),
(2128, 114, '', 'Nonouti'),
(2129, 114, '', 'Onotoa'),
(2130, 114, '', 'Phoenix Islands'),
(2131, 114, '', 'Tabiteuea North'),
(2132, 114, '', 'Tabiteuea South'),
(2133, 114, '', 'Tabuaeran'),
(2134, 114, '', 'Tamana'),
(2135, 114, '', 'Tarawa North'),
(2136, 114, '', 'Tarawa South'),
(2137, 114, '', 'Teraina'),
(2138, 115, '', 'Chagangdo'),
(2139, 115, '', 'Hamgyeongbukto'),
(2140, 115, '', 'Hamgyeongnamdo'),
(2141, 115, '', 'Hwanghaebukto'),
(2142, 115, '', 'Hwanghaenamdo'),
(2143, 115, '', 'Kaeseong'),
(2144, 115, '', 'Kangweon'),
(2145, 115, '', 'Nampo'),
(2146, 115, '', 'Pyeonganbukto'),
(2147, 115, '', 'Pyeongannamdo'),
(2148, 115, '', 'Pyeongyang'),
(2149, 115, '', 'Yanggang'),
(2150, 116, '', 'Busan'),
(2151, 116, '', 'Cheju'),
(2152, 116, '', 'Chollabuk'),
(2153, 116, '', 'Chollanam'),
(2154, 116, '', 'Chungbuk'),
(2155, 116, '', 'Chungcheongbuk'),
(2156, 116, '', 'Chungcheongnam'),
(2157, 116, '', 'Chungnam'),
(2158, 116, '', 'Daegu'),
(2159, 116, '', 'Gangwon-do'),
(2160, 116, '', 'Goyang-si'),
(2161, 116, '', 'Gyeonggi-do'),
(2162, 116, '', 'Gyeongsang '),
(2163, 116, '', 'Gyeongsangnam-do'),
(2164, 116, '', 'Incheon'),
(2165, 116, '', 'Jeju-Si'),
(2166, 116, '', 'Jeonbuk'),
(2167, 116, '', 'Kangweon'),
(2168, 116, '', 'Kwangju'),
(2169, 116, '', 'Kyeonggi'),
(2170, 116, '', 'Kyeongsangbuk'),
(2171, 116, '', 'Kyeongsangnam'),
(2172, 116, '', 'Kyonggi-do'),
(2173, 116, '', 'Kyungbuk-Do'),
(2174, 116, '', 'Kyunggi-Do'),
(2175, 116, '', 'Kyunggi-do'),
(2176, 116, '', 'Pusan'),
(2177, 116, '', 'Seoul'),
(2178, 116, '', 'Sudogwon'),
(2179, 116, '', 'Taegu'),
(2180, 116, '', 'Taejeon'),
(2181, 116, '', 'Taejon-gwangyoksi'),
(2182, 116, '', 'Ulsan'),
(2183, 116, '', 'Wonju'),
(2184, 116, '', 'gwangyoksi'),
(2185, 117, '', 'Al Asimah'),
(2186, 117, '', 'Hawalli'),
(2187, 117, '', 'Mishref'),
(2188, 117, '', 'Qadesiya'),
(2189, 117, '', 'Safat'),
(2190, 117, '', 'Salmiya'),
(2191, 117, '', 'al-Ahmadi'),
(2192, 117, '', 'al-Farwaniyah'),
(2193, 117, '', 'al-Jahra'),
(2194, 117, '', 'al-Kuwayt'),
(2195, 118, '', 'Batken'),
(2196, 118, '', 'Bishkek'),
(2197, 118, '', 'Chui'),
(2198, 118, '', 'Issyk-Kul'),
(2199, 118, '', 'Jalal-Abad'),
(2200, 118, '', 'Naryn'),
(2201, 118, '', 'Osh'),
(2202, 118, '', 'Talas'),
(2203, 119, '', 'Attopu'),
(2204, 119, '', 'Bokeo'),
(2205, 119, '', 'Bolikhamsay'),
(2206, 119, '', 'Champasak'),
(2207, 119, '', 'Houaphanh'),
(2208, 119, '', 'Khammouane'),
(2209, 119, '', 'Luang Nam Tha'),
(2210, 119, '', 'Luang Prabang'),
(2211, 119, '', 'Oudomxay'),
(2212, 119, '', 'Phongsaly'),
(2213, 119, '', 'Saravan'),
(2214, 119, '', 'Savannakhet'),
(2215, 119, '', 'Sekong'),
(2216, 119, '', 'Viangchan Prefecture'),
(2217, 119, '', 'Viangchan Province'),
(2218, 119, '', 'Xaignabury'),
(2219, 119, '', 'Xiang Khuang'),
(2220, 120, '', 'Aizkraukles'),
(2221, 120, '', 'Aluksnes'),
(2222, 120, '', 'Balvu'),
(2223, 120, '', 'Bauskas'),
(2224, 120, '', 'Cesu'),
(2225, 120, '', 'Daugavpils'),
(2226, 120, '', 'Daugavpils City'),
(2227, 120, '', 'Dobeles'),
(2228, 120, '', 'Gulbenes'),
(2229, 120, '', 'Jekabspils'),
(2230, 120, '', 'Jelgava'),
(2231, 120, '', 'Jelgavas'),
(2232, 120, '', 'Jurmala City'),
(2233, 120, '', 'Kraslavas'),
(2234, 120, '', 'Kuldigas'),
(2235, 120, '', 'Liepaja'),
(2236, 120, '', 'Liepajas'),
(2237, 120, '', 'Limbazhu'),
(2238, 120, '', 'Ludzas'),
(2239, 120, '', 'Madonas'),
(2240, 120, '', 'Ogres'),
(2241, 120, '', 'Preilu'),
(2242, 120, '', 'Rezekne'),
(2243, 120, '', 'Rezeknes'),
(2244, 120, '', 'Riga'),
(2245, 120, '', 'Rigas'),
(2246, 120, '', 'Saldus'),
(2247, 120, '', 'Talsu'),
(2248, 120, '', 'Tukuma'),
(2249, 120, '', 'Valkas'),
(2250, 120, '', 'Valmieras'),
(2251, 120, '', 'Ventspils'),
(2252, 120, '', 'Ventspils City'),
(2253, 121, '', 'Beirut'),
(2254, 121, '', 'Jabal Lubnan'),
(2255, 121, '', 'Mohafazat Liban-Nord'),
(2256, 121, '', 'Mohafazat Mont-Liban'),
(2257, 121, '', 'Sidon'),
(2258, 121, '', 'al-Biqa'),
(2259, 121, '', 'al-Janub'),
(2260, 121, '', 'an-Nabatiyah'),
(2261, 121, '', 'ash-Shamal'),
(2262, 122, '', 'Berea'),
(2263, 122, '', 'Butha-Buthe'),
(2264, 122, '', 'Leribe'),
(2265, 122, '', 'Mafeteng'),
(2266, 122, '', 'Maseru'),
(2267, 122, '', 'Mohale\'s Hoek'),
(2268, 122, '', 'Mokhotlong'),
(2269, 122, '', 'Qacha\'s Nek'),
(2270, 122, '', 'Quthing'),
(2271, 122, '', 'Thaba-Tseka'),
(2272, 123, '', 'Bomi'),
(2273, 123, '', 'Bong'),
(2274, 123, '', 'Grand Bassa'),
(2275, 123, '', 'Grand Cape Mount'),
(2276, 123, '', 'Grand Gedeh'),
(2277, 123, '', 'Loffa'),
(2278, 123, '', 'Margibi'),
(2279, 123, '', 'Maryland and Grand Kru'),
(2280, 123, '', 'Montserrado'),
(2281, 123, '', 'Nimba'),
(2282, 123, '', 'Rivercess'),
(2283, 123, '', 'Sinoe'),
(2284, 124, '', 'Ajdabiya'),
(2285, 124, '', 'Fezzan'),
(2286, 124, '', 'Banghazi'),
(2287, 124, '', 'Darnah'),
(2288, 124, '', 'Ghadamis'),
(2289, 124, '', 'Gharyan'),
(2290, 124, '', 'Misratah'),
(2291, 124, '', 'Murzuq'),
(2292, 124, '', 'Sabha'),
(2293, 124, '', 'Sawfajjin'),
(2294, 124, '', 'Surt'),
(2295, 124, '', 'Tarabulus'),
(2296, 124, '', 'Tarhunah'),
(2297, 124, '', 'Tripolitania'),
(2298, 124, '', 'Tubruq'),
(2299, 124, '', 'Yafran'),
(2300, 124, '', 'Zlitan'),
(2301, 124, '', 'al-\'Aziziyah'),
(2302, 124, '', 'al-Fatih'),
(2303, 124, '', 'al-Jabal al Akhdar'),
(2304, 124, '', 'al-Jufrah'),
(2305, 124, '', 'al-Khums'),
(2306, 124, '', 'al-Kufrah'),
(2307, 124, '', 'an-Nuqat al-Khams'),
(2308, 124, '', 'ash-Shati\''),
(2309, 124, '', 'az-Zawiyah'),
(2310, 125, '', 'Balzers'),
(2311, 125, '', 'Eschen'),
(2312, 125, '', 'Gamprin'),
(2313, 125, '', 'Mauren'),
(2314, 125, '', 'Planken'),
(2315, 125, '', 'Ruggell'),
(2316, 125, '', 'Schaan'),
(2317, 125, '', 'Schellenberg'),
(2318, 125, '', 'Triesen'),
(2319, 125, '', 'Triesenberg'),
(2320, 125, '', 'Vaduz'),
(2321, 126, '', 'Alytaus'),
(2322, 126, '', 'Anyksciai'),
(2323, 126, '', 'Kauno'),
(2324, 126, '', 'Klaipedos'),
(2325, 126, '', 'Marijampoles'),
(2326, 126, '', 'Panevezhio'),
(2327, 126, '', 'Panevezys'),
(2328, 126, '', 'Shiauliu'),
(2329, 126, '', 'Taurages'),
(2330, 126, '', 'Telshiu'),
(2331, 126, '', 'Telsiai'),
(2332, 126, '', 'Utenos'),
(2333, 126, '', 'Vilniaus'),
(2334, 127, '', 'Capellen'),
(2335, 127, '', 'Clervaux'),
(2336, 127, '', 'Diekirch'),
(2337, 127, '', 'Echternach'),
(2338, 127, '', 'Esch-sur-Alzette'),
(2339, 127, '', 'Grevenmacher'),
(2340, 127, '', 'Luxembourg'),
(2341, 127, '', 'Mersch'),
(2342, 127, '', 'Redange'),
(2343, 127, '', 'Remich'),
(2344, 127, '', 'Vianden'),
(2345, 127, '', 'Wiltz'),
(2346, 128, '', 'Macau'),
(2347, 129, '', 'Berovo'),
(2348, 129, '', 'Bitola'),
(2349, 129, '', 'Brod'),
(2350, 129, '', 'Debar'),
(2351, 129, '', 'Delchevo'),
(2352, 129, '', 'Demir Hisar'),
(2353, 129, '', 'Gevgelija'),
(2354, 129, '', 'Gostivar'),
(2355, 129, '', 'Kavadarci'),
(2356, 129, '', 'Kichevo'),
(2357, 129, '', 'Kochani'),
(2358, 129, '', 'Kratovo'),
(2359, 129, '', 'Kriva Palanka'),
(2360, 129, '', 'Krushevo'),
(2361, 129, '', 'Kumanovo'),
(2362, 129, '', 'Negotino'),
(2363, 129, '', 'Ohrid'),
(2364, 129, '', 'Prilep'),
(2365, 129, '', 'Probishtip'),
(2366, 129, '', 'Radovish'),
(2367, 129, '', 'Resen'),
(2368, 129, '', 'Shtip'),
(2369, 129, '', 'Skopje'),
(2370, 129, '', 'Struga'),
(2371, 129, '', 'Strumica'),
(2372, 129, '', 'Sveti Nikole'),
(2373, 129, '', 'Tetovo'),
(2374, 129, '', 'Valandovo'),
(2375, 129, '', 'Veles'),
(2376, 129, '', 'Vinica'),
(2377, 130, '', 'Antananarivo'),
(2378, 130, '', 'Antsiranana'),
(2379, 130, '', 'Fianarantsoa'),
(2380, 130, '', 'Mahajanga'),
(2381, 130, '', 'Toamasina'),
(2382, 130, '', 'Toliary'),
(2383, 131, '', 'Balaka'),
(2384, 131, '', 'Blantyre City'),
(2385, 131, '', 'Chikwawa'),
(2386, 131, '', 'Chiradzulu'),
(2387, 131, '', 'Chitipa'),
(2388, 131, '', 'Dedza'),
(2389, 131, '', 'Dowa'),
(2390, 131, '', 'Karonga'),
(2391, 131, '', 'Kasungu'),
(2392, 131, '', 'Lilongwe City'),
(2393, 131, '', 'Machinga'),
(2394, 131, '', 'Mangochi'),
(2395, 131, '', 'Mchinji'),
(2396, 131, '', 'Mulanje'),
(2397, 131, '', 'Mwanza'),
(2398, 131, '', 'Mzimba'),
(2399, 131, '', 'Mzuzu City'),
(2400, 131, '', 'Nkhata Bay'),
(2401, 131, '', 'Nkhotakota'),
(2402, 131, '', 'Nsanje'),
(2403, 131, '', 'Ntcheu'),
(2404, 131, '', 'Ntchisi'),
(2405, 131, '', 'Phalombe'),
(2406, 131, '', 'Rumphi'),
(2407, 131, '', 'Salima'),
(2408, 131, '', 'Thyolo'),
(2409, 131, '', 'Zomba Municipality'),
(2410, 132, '', 'Johor'),
(2411, 132, '', 'Kedah'),
(2412, 132, '', 'Kelantan'),
(2413, 132, '', 'Kuala Lumpur'),
(2414, 132, '', 'Labuan'),
(2415, 132, '', 'Melaka'),
(2416, 132, '', 'Negeri Johor'),
(2417, 132, '', 'Negeri Sembilan'),
(2418, 132, '', 'Pahang'),
(2419, 132, '', 'Penang'),
(2420, 132, '', 'Perak'),
(2421, 132, '', 'Perlis'),
(2422, 132, '', 'Pulau Pinang'),
(2423, 132, '', 'Sabah'),
(2424, 132, '', 'Sarawak'),
(2425, 132, '', 'Selangor'),
(2426, 132, '', 'Sembilan'),
(2427, 132, '', 'Terengganu'),
(2428, 133, '', 'Alif Alif'),
(2429, 133, '', 'Alif Dhaal'),
(2430, 133, '', 'Baa'),
(2431, 133, '', 'Dhaal'),
(2432, 133, '', 'Faaf'),
(2433, 133, '', 'Gaaf Alif'),
(2434, 133, '', 'Gaaf Dhaal'),
(2435, 133, '', 'Ghaviyani'),
(2436, 133, '', 'Haa Alif'),
(2437, 133, '', 'Haa Dhaal'),
(2438, 133, '', 'Kaaf'),
(2439, 133, '', 'Laam'),
(2440, 133, '', 'Lhaviyani'),
(2441, 133, '', 'Male'),
(2442, 133, '', 'Miim'),
(2443, 133, '', 'Nuun'),
(2444, 133, '', 'Raa'),
(2445, 133, '', 'Shaviyani'),
(2446, 133, '', 'Siin'),
(2447, 133, '', 'Thaa'),
(2448, 133, '', 'Vaav'),
(2449, 134, '', 'Bamako'),
(2450, 134, '', 'Gao'),
(2451, 134, '', 'Kayes'),
(2452, 134, '', 'Kidal'),
(2453, 134, '', 'Koulikoro'),
(2454, 134, '', 'Mopti'),
(2455, 134, '', 'Segou'),
(2456, 134, '', 'Sikasso'),
(2457, 134, '', 'Tombouctou'),
(2458, 135, '', 'Gozo and Comino'),
(2459, 135, '', 'Inner Harbour'),
(2460, 135, '', 'Northern'),
(2461, 135, '', 'Outer Harbour'),
(2462, 135, '', 'South Eastern'),
(2463, 135, '', 'Valletta'),
(2464, 135, '', 'Western'),
(2465, 136, '', 'Castletown'),
(2466, 136, '', 'Douglas'),
(2467, 136, '', 'Laxey'),
(2468, 136, '', 'Onchan'),
(2469, 136, '', 'Peel'),
(2470, 136, '', 'Port Erin'),
(2471, 136, '', 'Port Saint Mary'),
(2472, 136, '', 'Ramsey'),
(2473, 137, '', 'Ailinlaplap'),
(2474, 137, '', 'Ailuk'),
(2475, 137, '', 'Arno'),
(2476, 137, '', 'Aur'),
(2477, 137, '', 'Bikini'),
(2478, 137, '', 'Ebon'),
(2479, 137, '', 'Enewetak'),
(2480, 137, '', 'Jabat'),
(2481, 137, '', 'Jaluit'),
(2482, 137, '', 'Kili'),
(2483, 137, '', 'Kwajalein'),
(2484, 137, '', 'Lae'),
(2485, 137, '', 'Lib'),
(2486, 137, '', 'Likiep'),
(2487, 137, '', 'Majuro'),
(2488, 137, '', 'Maloelap'),
(2489, 137, '', 'Mejit'),
(2490, 137, '', 'Mili'),
(2491, 137, '', 'Namorik'),
(2492, 137, '', 'Namu'),
(2493, 137, '', 'Rongelap'),
(2494, 137, '', 'Ujae'),
(2495, 137, '', 'Utrik'),
(2496, 137, '', 'Wotho'),
(2497, 137, '', 'Wotje'),
(2498, 138, '', 'Fort-de-France'),
(2499, 138, '', 'La Trinite'),
(2500, 138, '', 'Le Marin'),
(2501, 138, '', 'Saint-Pierre'),
(2502, 139, '', 'Adrar'),
(2503, 139, '', 'Assaba'),
(2504, 139, '', 'Brakna'),
(2505, 139, '', 'Dhakhlat Nawadibu'),
(2506, 139, '', 'Hudh-al-Gharbi'),
(2507, 139, '', 'Hudh-ash-Sharqi'),
(2508, 139, '', 'Inshiri'),
(2509, 139, '', 'Nawakshut'),
(2510, 139, '', 'Qidimagha'),
(2511, 139, '', 'Qurqul'),
(2512, 139, '', 'Taqant'),
(2513, 139, '', 'Tiris Zammur'),
(2514, 139, '', 'Trarza'),
(2515, 140, '', 'Black River'),
(2516, 140, '', 'Eau Coulee'),
(2517, 140, '', 'Flacq'),
(2518, 140, '', 'Floreal'),
(2519, 140, '', 'Grand Port'),
(2520, 140, '', 'Moka'),
(2521, 140, '', 'Pamplempousses'),
(2522, 140, '', 'Plaines Wilhelm'),
(2523, 140, '', 'Port Louis'),
(2524, 140, '', 'Riviere du Rempart'),
(2525, 140, '', 'Rodrigues'),
(2526, 140, '', 'Rose Hill'),
(2527, 140, '', 'Savanne'),
(2528, 141, '', 'Mayotte'),
(2529, 141, '', 'Pamanzi'),
(2530, 142, '', 'Aguascalientes'),
(2531, 142, '', 'Baja California'),
(2532, 142, '', 'Baja California Sur'),
(2533, 142, '', 'Campeche'),
(2534, 142, '', 'Chiapas'),
(2535, 142, '', 'Chihuahua'),
(2536, 142, '', 'Coahuila'),
(2537, 142, '', 'Colima'),
(2538, 142, '', 'Distrito Federal'),
(2539, 142, '', 'Durango'),
(2540, 142, '', 'Estado de Mexico'),
(2541, 142, '', 'Guanajuato'),
(2542, 142, '', 'Guerrero'),
(2543, 142, '', 'Hidalgo'),
(2544, 142, '', 'Jalisco'),
(2545, 142, '', 'Mexico'),
(2546, 142, '', 'Michoacan'),
(2547, 142, '', 'Morelos'),
(2548, 142, '', 'Nayarit'),
(2549, 142, '', 'Nuevo Leon'),
(2550, 142, '', 'Oaxaca'),
(2551, 142, '', 'Puebla'),
(2552, 142, '', 'Queretaro'),
(2553, 142, '', 'Quintana Roo'),
(2554, 142, '', 'San Luis Potosi'),
(2555, 142, '', 'Sinaloa'),
(2556, 142, '', 'Sonora'),
(2557, 142, '', 'Tabasco'),
(2558, 142, '', 'Tamaulipas'),
(2559, 142, '', 'Tlaxcala'),
(2560, 142, '', 'Veracruz'),
(2561, 142, '', 'Yucatan'),
(2562, 142, '', 'Zacatecas'),
(2563, 143, '', 'Chuuk'),
(2564, 143, '', 'Kusaie'),
(2565, 143, '', 'Pohnpei'),
(2566, 143, '', 'Yap'),
(2567, 144, '', 'Balti'),
(2568, 144, '', 'Cahul'),
(2569, 144, '', 'Chisinau'),
(2570, 144, '', 'Chisinau Oras'),
(2571, 144, '', 'Edinet'),
(2572, 144, '', 'Gagauzia'),
(2573, 144, '', 'Lapusna'),
(2574, 144, '', 'Orhei'),
(2575, 144, '', 'Soroca'),
(2576, 144, '', 'Taraclia'),
(2577, 144, '', 'Tighina'),
(2578, 144, '', 'Transnistria'),
(2579, 144, '', 'Ungheni'),
(2580, 145, '', 'Fontvieille'),
(2581, 145, '', 'La Condamine'),
(2582, 145, '', 'Monaco-Ville'),
(2583, 145, '', 'Monte Carlo'),
(2584, 146, '', 'Arhangaj'),
(2585, 146, '', 'Bajan-Olgij'),
(2586, 146, '', 'Bajanhongor'),
(2587, 146, '', 'Bulgan'),
(2588, 146, '', 'Darhan-Uul'),
(2589, 146, '', 'Dornod'),
(2590, 146, '', 'Dornogovi'),
(2591, 146, '', 'Dundgovi'),
(2592, 146, '', 'Govi-Altaj'),
(2593, 146, '', 'Govisumber'),
(2594, 146, '', 'Hentij'),
(2595, 146, '', 'Hovd'),
(2596, 146, '', 'Hovsgol'),
(2597, 146, '', 'Omnogovi'),
(2598, 146, '', 'Orhon'),
(2599, 146, '', 'Ovorhangaj'),
(2600, 146, '', 'Selenge'),
(2601, 146, '', 'Suhbaatar'),
(2602, 146, '', 'Tov'),
(2603, 146, '', 'Ulaanbaatar'),
(2604, 146, '', 'Uvs'),
(2605, 146, '', 'Zavhan'),
(2606, 147, '', 'Montserrat'),
(2607, 148, '', 'Agadir'),
(2608, 148, '', 'Casablanca'),
(2609, 148, '', 'Chaouia-Ouardigha'),
(2610, 148, '', 'Doukkala-Abda'),
(2611, 148, '', 'Fes-Boulemane'),
(2612, 148, '', 'Gharb-Chrarda-Beni Hssen'),
(2613, 148, '', 'Guelmim'),
(2614, 148, '', 'Kenitra'),
(2615, 148, '', 'Marrakech-Tensift-Al Haouz'),
(2616, 148, '', 'Meknes-Tafilalet'),
(2617, 148, '', 'Oriental'),
(2618, 148, '', 'Oujda'),
(2619, 148, '', 'Province de Tanger'),
(2620, 148, '', 'Rabat-Sale-Zammour-Zaer'),
(2621, 148, '', 'Sala Al Jadida'),
(2622, 148, '', 'Settat'),
(2623, 148, '', 'Souss Massa-Draa'),
(2624, 148, '', 'Tadla-Azilal'),
(2625, 148, '', 'Tangier-Tetouan'),
(2626, 148, '', 'Taza-Al Hoceima-Taounate'),
(2627, 148, '', 'Wilaya de Casablanca'),
(2628, 148, '', 'Wilaya de Rabat-Sale'),
(2629, 149, '', 'Cabo Delgado'),
(2630, 149, '', 'Gaza'),
(2631, 149, '', 'Inhambane'),
(2632, 149, '', 'Manica'),
(2633, 149, '', 'Maputo'),
(2634, 149, '', 'Maputo Provincia'),
(2635, 149, '', 'Nampula'),
(2636, 149, '', 'Niassa'),
(2637, 149, '', 'Sofala'),
(2638, 149, '', 'Tete'),
(2639, 149, '', 'Zambezia'),
(2640, 150, '', 'Ayeyarwady'),
(2641, 150, '', 'Bago'),
(2642, 150, '', 'Chin'),
(2643, 150, '', 'Kachin'),
(2644, 150, '', 'Kayah'),
(2645, 150, '', 'Kayin'),
(2646, 150, '', 'Magway'),
(2647, 150, '', 'Mandalay'),
(2648, 150, '', 'Mon');

-- --------------------------------------------------------

--
-- Table structure for table `zones1`
--

CREATE TABLE `zones1` (
  `zone_id` int(11) NOT NULL,
  `zone_country_id` int(11) NOT NULL,
  `zone_code` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones1`
--

INSERT INTO `zones1` (`zone_id`, `zone_country_id`, `zone_code`, `zone_name`) VALUES
(1, 223, 'AL', 'Alabama'),
(2, 223, 'AK', 'Alaska'),
(3, 223, 'AS', 'American Samoa'),
(4, 223, 'AZ', 'Arizona'),
(5, 223, 'AR', 'Arkansas'),
(6, 223, 'AF', 'Armed Forces Africa'),
(7, 223, 'AA', 'Armed Forces Americas'),
(8, 223, 'AC', 'Armed Forces Canada'),
(9, 223, 'AE', 'Armed Forces Europe'),
(10, 223, 'AM', 'Armed Forces Middle East'),
(11, 223, 'AP', 'Armed Forces Pacific'),
(12, 223, 'CA', 'California'),
(13, 223, 'CO', 'Colorado'),
(14, 223, 'CT', 'Connecticut'),
(15, 223, 'DE', 'Delaware'),
(16, 223, 'DC', 'District of Columbia'),
(17, 223, 'FM', 'Federated States Of Micronesia'),
(18, 223, 'FL', 'Florida'),
(19, 223, 'GA', 'Georgia'),
(20, 223, 'GU', 'Guam'),
(21, 223, 'HI', 'Hawaii'),
(22, 223, 'ID', 'Idaho'),
(23, 223, 'IL', 'Illinois'),
(24, 223, 'IN', 'Indiana'),
(25, 223, 'IA', 'Iowa'),
(26, 223, 'KS', 'Kansas'),
(27, 223, 'KY', 'Kentucky'),
(28, 223, 'LA', 'Louisiana'),
(29, 223, 'ME', 'Maine'),
(30, 223, 'MH', 'Marshall Islands'),
(31, 223, 'MD', 'Maryland'),
(32, 223, 'MA', 'Massachusetts'),
(33, 223, 'MI', 'Michigan'),
(34, 223, 'MN', 'Minnesota'),
(35, 223, 'MS', 'Mississippi'),
(36, 223, 'MO', 'Missouri'),
(37, 223, 'MT', 'Montana'),
(38, 223, 'NE', 'Nebraska'),
(39, 223, 'NV', 'Nevada'),
(40, 223, 'NH', 'New Hampshire'),
(41, 223, 'NJ', 'New Jersey'),
(42, 223, 'NM', 'New Mexico'),
(43, 223, 'NY', 'New York'),
(44, 223, 'NC', 'North Carolina'),
(45, 223, 'ND', 'North Dakota'),
(46, 223, 'MP', 'Northern Mariana Islands'),
(47, 223, 'OH', 'Ohio'),
(48, 223, 'OK', 'Oklahoma'),
(49, 223, 'OR', 'Oregon'),
(50, 223, 'PW', 'Palau'),
(51, 223, 'PA', 'Pennsylvania'),
(52, 223, 'PR', 'Puerto Rico'),
(53, 223, 'RI', 'Rhode Island'),
(54, 223, 'SC', 'South Carolina'),
(55, 223, 'SD', 'South Dakota'),
(56, 223, 'TN', 'Tennessee'),
(57, 223, 'TX', 'Texas'),
(58, 223, 'UT', 'Utah'),
(59, 223, 'VT', 'Vermont'),
(60, 223, 'VI', 'Virgin Islands'),
(61, 223, 'VA', 'Virginia'),
(62, 223, 'WA', 'Washington'),
(63, 223, 'WV', 'West Virginia'),
(64, 223, 'WI', 'Wisconsin'),
(65, 223, 'WY', 'Wyoming'),
(66, 38, 'AB', 'Alberta'),
(67, 38, 'BC', 'British Columbia'),
(68, 38, 'MB', 'Manitoba'),
(69, 38, 'NF', 'Newfoundland'),
(70, 38, 'NB', 'New Brunswick'),
(71, 38, 'NS', 'Nova Scotia'),
(72, 38, 'NT', 'Northwest Territories'),
(73, 38, 'NU', 'Nunavut'),
(74, 38, 'ON', 'Ontario'),
(75, 38, 'PE', 'Prince Edward Island'),
(76, 38, 'QC', 'Quebec'),
(77, 38, 'SK', 'Saskatchewan'),
(78, 38, 'YT', 'Yukon Territory'),
(79, 81, 'NDS', 'Niedersachsen'),
(80, 81, 'BAW', 'Baden-Württemberg'),
(81, 81, 'BAY', 'Bayern'),
(82, 81, 'BER', 'Berlin'),
(83, 81, 'BRG', 'Brandenburg'),
(84, 81, 'BRE', 'Bremen'),
(85, 81, 'HAM', 'Hamburg'),
(86, 81, 'HES', 'Hessen'),
(87, 81, 'MEC', 'Mecklenburg-Vorpommern'),
(88, 81, 'NRW', 'Nordrhein-Westfalen'),
(89, 81, 'RHE', 'Rheinland-Pfalz'),
(90, 81, 'SAR', 'Saarland'),
(91, 81, 'SAS', 'Sachsen'),
(92, 81, 'SAC', 'Sachsen-Anhalt'),
(93, 81, 'SCN', 'Schleswig-Holstein'),
(94, 81, 'THE', 'Thüringen'),
(95, 14, 'WI', 'Wien'),
(96, 14, 'NO', 'Niederösterreich'),
(97, 14, 'OO', 'Oberösterreich'),
(98, 14, 'SB', 'Salzburg'),
(99, 14, 'KN', 'Kärnten'),
(100, 14, 'ST', 'Steiermark'),
(101, 14, 'TI', 'Tirol'),
(102, 14, 'BL', 'Burgenland'),
(103, 14, 'VB', 'Voralberg'),
(104, 204, 'AG', 'Aargau'),
(105, 204, 'AI', 'Appenzell Innerrhoden'),
(106, 204, 'AR', 'Appenzell Ausserrhoden'),
(107, 204, 'BE', 'Bern'),
(108, 204, 'BL', 'Basel-Landschaft'),
(109, 204, 'BS', 'Basel-Stadt'),
(110, 204, 'FR', 'Freiburg'),
(111, 204, 'GE', 'Genf'),
(112, 204, 'GL', 'Glarus'),
(113, 204, 'JU', 'Graubünden'),
(114, 204, 'JU', 'Jura'),
(115, 204, 'LU', 'Luzern'),
(116, 204, 'NE', 'Neuenburg'),
(117, 204, 'NW', 'Nidwalden'),
(118, 204, 'OW', 'Obwalden'),
(119, 204, 'SG', 'St. Gallen'),
(120, 204, 'SH', 'Schaffhausen'),
(121, 204, 'SO', 'Solothurn'),
(122, 204, 'SZ', 'Schwyz'),
(123, 204, 'TG', 'Thurgau'),
(124, 204, 'TI', 'Tessin'),
(125, 204, 'UR', 'Uri'),
(126, 204, 'VD', 'Waadt'),
(127, 204, 'VS', 'Wallis'),
(128, 204, 'ZG', 'Zug'),
(129, 204, 'ZH', 'Zürich'),
(130, 195, 'A Coruña', 'A Coruña'),
(131, 195, 'Alava', 'Alava'),
(132, 195, 'Albacete', 'Albacete'),
(133, 195, 'Alicante', 'Alicante'),
(134, 195, 'Almeria', 'Almeria'),
(135, 195, 'Asturias', 'Asturias'),
(136, 195, 'Avila', 'Avila'),
(137, 195, 'Badajoz', 'Badajoz'),
(138, 195, 'Baleares', 'Baleares'),
(139, 195, 'Barcelona', 'Barcelona'),
(140, 195, 'Burgos', 'Burgos'),
(141, 195, 'Caceres', 'Caceres'),
(142, 195, 'Cadiz', 'Cadiz'),
(143, 195, 'Cantabria', 'Cantabria'),
(144, 195, 'Castellon', 'Castellon'),
(145, 195, 'Ceuta', 'Ceuta'),
(146, 195, 'Ciudad Real', 'Ciudad Real'),
(147, 195, 'Cordoba', 'Cordoba'),
(148, 195, 'Cuenca', 'Cuenca'),
(149, 195, 'Girona', 'Girona'),
(150, 195, 'Granada', 'Granada'),
(151, 195, 'Guadalajara', 'Guadalajara'),
(152, 195, 'Guipuzcoa', 'Guipuzcoa'),
(153, 195, 'Huelva', 'Huelva'),
(154, 195, 'Huesca', 'Huesca'),
(155, 195, 'Jaen', 'Jaen'),
(156, 195, 'La Rioja', 'La Rioja'),
(157, 195, 'Las Palmas', 'Las Palmas'),
(158, 195, 'Leon', 'Leon'),
(159, 195, 'Lleida', 'Lleida'),
(160, 195, 'Lugo', 'Lugo'),
(161, 195, 'Madrid', 'Madrid'),
(162, 195, 'Malaga', 'Malaga'),
(163, 195, 'Melilla', 'Melilla'),
(164, 195, 'Murcia', 'Murcia'),
(165, 195, 'Navarra', 'Navarra'),
(166, 195, 'Ourense', 'Ourense'),
(167, 195, 'Palencia', 'Palencia'),
(168, 195, 'Pontevedra', 'Pontevedra'),
(169, 195, 'Salamanca', 'Salamanca'),
(170, 195, 'Santa Cruz de Tenerife', 'Santa Cruz de Tenerife'),
(171, 195, 'Segovia', 'Segovia'),
(172, 195, 'Sevilla', 'Sevilla'),
(173, 195, 'Soria', 'Soria'),
(174, 195, 'Tarragona', 'Tarragona'),
(175, 195, 'Teruel', 'Teruel'),
(176, 195, 'Toledo', 'Toledo'),
(177, 195, 'Valencia', 'Valencia'),
(178, 195, 'Valladolid', 'Valladolid'),
(179, 195, 'Vizcaya', 'Vizcaya'),
(180, 195, 'Zamora', 'Zamora'),
(181, 195, 'Zaragoza', 'Zaragoza');

-- --------------------------------------------------------

--
-- Table structure for table `zones_to_geo_zones`
--

CREATE TABLE `zones_to_geo_zones` (
  `association_id` int(11) NOT NULL,
  `zone_country_id` int(11) NOT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `geo_zone_id` int(11) DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `action_recorder`
--
ALTER TABLE `action_recorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_action_recorder_module` (`module`),
  ADD KEY `idx_action_recorder_user_id` (`user_id`),
  ADD KEY `idx_action_recorder_identifier` (`identifier`),
  ADD KEY `idx_action_recorder_date_added` (`date_added`);

--
-- Indexes for table `address_book`
--
ALTER TABLE `address_book`
  ADD PRIMARY KEY (`address_book_id`),
  ADD KEY `idx_address_book_customers_id` (`user_id`);

--
-- Indexes for table `address_format`
--
ALTER TABLE `address_format`
  ADD PRIMARY KEY (`address_format_id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alert_settings`
--
ALTER TABLE `alert_settings`
  ADD PRIMARY KEY (`alert_id`);

--
-- Indexes for table `api_calls_list`
--
ALTER TABLE `api_calls_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banners_id`),
  ADD KEY `idx_banners_group` (`banners_group`);

--
-- Indexes for table `banners_history`
--
ALTER TABLE `banners_history`
  ADD PRIMARY KEY (`banners_history_id`),
  ADD KEY `idx_banners_history_banners_id` (`banners_id`);

--
-- Indexes for table `block_ips`
--
ALTER TABLE `block_ips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`),
  ADD KEY `idx_categories_parent_id` (`parent_id`);

--
-- Indexes for table `categories_description`
--
ALTER TABLE `categories_description`
  ADD PRIMARY KEY (`categories_description_id`),
  ADD KEY `idx_categories_name` (`categories_name`(250));

--
-- Indexes for table `categories_role`
--
ALTER TABLE `categories_role`
  ADD PRIMARY KEY (`categories_role_id`);

--
-- Indexes for table `compare`
--
ALTER TABLE `compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `constant_banners`
--
ALTER TABLE `constant_banners`
  ADD PRIMARY KEY (`banners_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`countries_id`),
  ADD KEY `IDX_COUNTRIES_NAME` (`countries_name`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupans_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_currencies_code` (`code`);

--
-- Indexes for table `currency_record`
--
ALTER TABLE `currency_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `current_theme`
--
ALTER TABLE `current_theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customers_id`);

--
-- Indexes for table `customers_basket`
--
ALTER TABLE `customers_basket`
  ADD PRIMARY KEY (`customers_basket_id`),
  ADD KEY `idx_customers_basket_customers_id` (`customers_id`);

--
-- Indexes for table `customers_basket_attributes`
--
ALTER TABLE `customers_basket_attributes`
  ADD PRIMARY KEY (`customers_basket_attributes_id`),
  ADD KEY `idx_customers_basket_att_customers_id` (`customers_id`);

--
-- Indexes for table `customers_info`
--
ALTER TABLE `customers_info`
  ADD PRIMARY KEY (`customers_info_id`);

--
-- Indexes for table `customer_orders_returns`
--
ALTER TABLE `customer_orders_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fedex_shipping`
--
ALTER TABLE `fedex_shipping`
  ADD PRIMARY KEY (`fedex_id`);

--
-- Indexes for table `flash_sale`
--
ALTER TABLE `flash_sale`
  ADD PRIMARY KEY (`flash_sale_id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `flate_rate`
--
ALTER TABLE `flate_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_end_theme_content`
--
ALTER TABLE `front_end_theme_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `geo_zones`
--
ALTER TABLE `geo_zones`
  ADD PRIMARY KEY (`geo_zone_id`);

--
-- Indexes for table `home_page`
--
ALTER TABLE `home_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `http_call_record`
--
ALTER TABLE `http_call_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_categories`
--
ALTER TABLE `image_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_ref_id`);

--
-- Indexes for table `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`label_id`);

--
-- Indexes for table `label_value`
--
ALTER TABLE `label_value`
  ADD PRIMARY KEY (`label_value_id`);

--
-- Indexes for table `label_values`
--
ALTER TABLE `label_values`
  ADD PRIMARY KEY (`label_value_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`languages_id`),
  ADD KEY `IDX_LANGUAGES_NAME` (`name`);

--
-- Indexes for table `liked_products`
--
ALTER TABLE `liked_products`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `manage_min_max`
--
ALTER TABLE `manage_min_max`
  ADD PRIMARY KEY (`min_max_id`);

--
-- Indexes for table `manage_role`
--
ALTER TABLE `manage_role`
  ADD PRIMARY KEY (`manage_role_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturers_id`);

--
-- Indexes for table `manufacturers_info`
--
ALTER TABLE `manufacturers_info`
  ADD PRIMARY KEY (`manufacturers_id`,`languages_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `idx_products_date_added` (`news_date_added`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`newsletters_id`);

--
-- Indexes for table `newsletter_subscriptions`
--
ALTER TABLE `newsletter_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`categories_id`),
  ADD KEY `idx_categories_parent_id` (`parent_id`);

--
-- Indexes for table `news_categories_description`
--
ALTER TABLE `news_categories_description`
  ADD PRIMARY KEY (`categories_description_id`),
  ADD KEY `idx_categories_name` (`categories_name`);

--
-- Indexes for table `news_description`
--
ALTER TABLE `news_description`
  ADD KEY `products_name` (`news_name`);

--
-- Indexes for table `news_to_news_categories`
--
ALTER TABLE `news_to_news_categories`
  ADD PRIMARY KEY (`news_id`,`categories_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `idx_orders_customers_id` (`customers_id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`orders_products_id`),
  ADD KEY `idx_orders_products_orders_id` (`orders_id`),
  ADD KEY `idx_orders_products_products_id` (`products_id`);

--
-- Indexes for table `orders_products_attributes`
--
ALTER TABLE `orders_products_attributes`
  ADD PRIMARY KEY (`orders_products_attributes_id`),
  ADD KEY `idx_orders_products_att_orders_id` (`orders_id`);

--
-- Indexes for table `orders_products_download`
--
ALTER TABLE `orders_products_download`
  ADD PRIMARY KEY (`orders_products_download_id`),
  ADD KEY `idx_orders_products_download_orders_id` (`orders_id`);

--
-- Indexes for table `orders_status`
--
ALTER TABLE `orders_status`
  ADD PRIMARY KEY (`orders_status_id`);

--
-- Indexes for table `orders_status_description`
--
ALTER TABLE `orders_status_description`
  ADD PRIMARY KEY (`orders_status_description_id`);

--
-- Indexes for table `orders_status_history`
--
ALTER TABLE `orders_status_history`
  ADD PRIMARY KEY (`orders_status_history_id`),
  ADD KEY `idx_orders_status_history_orders_id` (`orders_id`);

--
-- Indexes for table `orders_total`
--
ALTER TABLE `orders_total`
  ADD PRIMARY KEY (`orders_total_id`),
  ADD KEY `idx_orders_total_orders_id` (`orders_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `pages_description`
--
ALTER TABLE `pages_description`
  ADD PRIMARY KEY (`page_description_id`);

--
-- Indexes for table `payment_description`
--
ALTER TABLE `payment_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`payment_methods_id`);

--
-- Indexes for table `payment_methods_detail`
--
ALTER TABLE `payment_methods_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pincodes`
--
ALTER TABLE `pincodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`),
  ADD KEY `idx_products_model` (`products_model`),
  ADD KEY `idx_products_date_added` (`products_date_added`);

--
-- Indexes for table `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`products_attributes_id`),
  ADD KEY `idx_products_attributes_products_id` (`products_id`);

--
-- Indexes for table `products_attributes_download`
--
ALTER TABLE `products_attributes_download`
  ADD PRIMARY KEY (`products_attributes_id`);

--
-- Indexes for table `products_description`
--
ALTER TABLE `products_description`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_name` (`products_name`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_images_prodid` (`products_id`);

--
-- Indexes for table `products_notifications`
--
ALTER TABLE `products_notifications`
  ADD PRIMARY KEY (`products_id`,`customers_id`);

--
-- Indexes for table `products_options`
--
ALTER TABLE `products_options`
  ADD PRIMARY KEY (`products_options_id`);

--
-- Indexes for table `products_options_descriptions`
--
ALTER TABLE `products_options_descriptions`
  ADD PRIMARY KEY (`products_options_descriptions_id`);

--
-- Indexes for table `products_options_values`
--
ALTER TABLE `products_options_values`
  ADD PRIMARY KEY (`products_options_values_id`);

--
-- Indexes for table `products_options_values_descriptions`
--
ALTER TABLE `products_options_values_descriptions`
  ADD PRIMARY KEY (`products_options_values_descriptions_id`);

--
-- Indexes for table `products_shipping_rates`
--
ALTER TABLE `products_shipping_rates`
  ADD PRIMARY KEY (`products_shipping_rates_id`);

--
-- Indexes for table `products_to_categories`
--
ALTER TABLE `products_to_categories`
  ADD PRIMARY KEY (`products_to_categories_id`);

--
-- Indexes for table `razorpay_res`
--
ALTER TABLE `razorpay_res`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviews_id`),
  ADD KEY `idx_reviews_products_id` (`products_id`),
  ADD KEY `idx_reviews_customers_id` (`customers_id`);

--
-- Indexes for table `reviews_description`
--
ALTER TABLE `reviews_description`
  ADD PRIMARY KEY (`reviews_id`,`languages_id`);

--
-- Indexes for table `sec_directory_whitelist`
--
ALTER TABLE `sec_directory_whitelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`sesskey`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_name_unique` (`name`);

--
-- Indexes for table `shipping_description`
--
ALTER TABLE `shipping_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  ADD PRIMARY KEY (`shipping_methods_id`);

--
-- Indexes for table `sliders_images`
--
ALTER TABLE `sliders_images`
  ADD PRIMARY KEY (`sliders_id`);

--
-- Indexes for table `specials`
--
ALTER TABLE `specials`
  ADD PRIMARY KEY (`specials_id`),
  ADD KEY `idx_specials_products_id` (`products_id`);

--
-- Indexes for table `tax_class`
--
ALTER TABLE `tax_class`
  ADD PRIMARY KEY (`tax_class_id`);

--
-- Indexes for table `tax_rates`
--
ALTER TABLE `tax_rates`
  ADD PRIMARY KEY (`tax_rates_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `units_descriptions`
--
ALTER TABLE `units_descriptions`
  ADD PRIMARY KEY (`units_description_id`);

--
-- Indexes for table `ups_shipping`
--
ALTER TABLE `ups_shipping`
  ADD PRIMARY KEY (`ups_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_to_address`
--
ALTER TABLE `user_to_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`user_types_id`);

--
-- Indexes for table `whos_online`
--
ALTER TABLE `whos_online`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`zone_id`),
  ADD KEY `idx_zones_country_id` (`zone_country_id`);

--
-- Indexes for table `zones1`
--
ALTER TABLE `zones1`
  ADD PRIMARY KEY (`zone_id`),
  ADD KEY `idx_zones_country_id` (`zone_country_id`);

--
-- Indexes for table `zones_to_geo_zones`
--
ALTER TABLE `zones_to_geo_zones`
  ADD PRIMARY KEY (`association_id`),
  ADD KEY `idx_zones_to_geo_zones_country_id` (`zone_country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `action_recorder`
--
ALTER TABLE `action_recorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `address_book`
--
ALTER TABLE `address_book`
  MODIFY `address_book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `address_format`
--
ALTER TABLE `address_format`
  MODIFY `address_format_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `alert_settings`
--
ALTER TABLE `alert_settings`
  MODIFY `alert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `api_calls_list`
--
ALTER TABLE `api_calls_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `banners_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners_history`
--
ALTER TABLE `banners_history`
  MODIFY `banners_history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `block_ips`
--
ALTER TABLE `block_ips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `categories_description`
--
ALTER TABLE `categories_description`
  MODIFY `categories_description_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `categories_role`
--
ALTER TABLE `categories_role`
  MODIFY `categories_role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compare`
--
ALTER TABLE `compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `constant_banners`
--
ALTER TABLE `constant_banners`
  MODIFY `banners_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `countries_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `currency_record`
--
ALTER TABLE `currency_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `current_theme`
--
ALTER TABLE `current_theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers_basket`
--
ALTER TABLE `customers_basket`
  MODIFY `customers_basket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `customers_basket_attributes`
--
ALTER TABLE `customers_basket_attributes`
  MODIFY `customers_basket_attributes_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_orders_returns`
--
ALTER TABLE `customer_orders_returns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fedex_shipping`
--
ALTER TABLE `fedex_shipping`
  MODIFY `fedex_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flash_sale`
--
ALTER TABLE `flash_sale`
  MODIFY `flash_sale_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flate_rate`
--
ALTER TABLE `flate_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `front_end_theme_content`
--
ALTER TABLE `front_end_theme_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `geo_zones`
--
ALTER TABLE `geo_zones`
  MODIFY `geo_zone_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_page`
--
ALTER TABLE `home_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `http_call_record`
--
ALTER TABLE `http_call_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT for table `image_categories`
--
ALTER TABLE `image_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=480;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_ref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `labels`
--
ALTER TABLE `labels`
  MODIFY `label_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1099;

--
-- AUTO_INCREMENT for table `label_value`
--
ALTER TABLE `label_value`
  MODIFY `label_value_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1640;

--
-- AUTO_INCREMENT for table `label_values`
--
ALTER TABLE `label_values`
  MODIFY `label_value_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `languages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `liked_products`
--
ALTER TABLE `liked_products`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `manage_min_max`
--
ALTER TABLE `manage_min_max`
  MODIFY `min_max_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manage_role`
--
ALTER TABLE `manage_role`
  MODIFY `manage_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturers_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `newsletters_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter_subscriptions`
--
ALTER TABLE `newsletter_subscriptions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news_categories_description`
--
ALTER TABLE `news_categories_description`
  MODIFY `categories_description_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `orders_products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `orders_products_attributes`
--
ALTER TABLE `orders_products_attributes`
  MODIFY `orders_products_attributes_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_products_download`
--
ALTER TABLE `orders_products_download`
  MODIFY `orders_products_download_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_status`
--
ALTER TABLE `orders_status`
  MODIFY `orders_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders_status_description`
--
ALTER TABLE `orders_status_description`
  MODIFY `orders_status_description_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders_status_history`
--
ALTER TABLE `orders_status_history`
  MODIFY `orders_status_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `orders_total`
--
ALTER TABLE `orders_total`
  MODIFY `orders_total_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pages_description`
--
ALTER TABLE `pages_description`
  MODIFY `page_description_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payment_description`
--
ALTER TABLE `payment_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `payment_methods_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_methods_detail`
--
ALTER TABLE `payment_methods_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pincodes`
--
ALTER TABLE `pincodes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `products_attributes_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_description`
--
ALTER TABLE `products_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products_options`
--
ALTER TABLE `products_options`
  MODIFY `products_options_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products_options_descriptions`
--
ALTER TABLE `products_options_descriptions`
  MODIFY `products_options_descriptions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products_options_values`
--
ALTER TABLE `products_options_values`
  MODIFY `products_options_values_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products_options_values_descriptions`
--
ALTER TABLE `products_options_values_descriptions`
  MODIFY `products_options_values_descriptions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products_shipping_rates`
--
ALTER TABLE `products_shipping_rates`
  MODIFY `products_shipping_rates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products_to_categories`
--
ALTER TABLE `products_to_categories`
  MODIFY `products_to_categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=437;

--
-- AUTO_INCREMENT for table `razorpay_res`
--
ALTER TABLE `razorpay_res`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviews_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sec_directory_whitelist`
--
ALTER TABLE `sec_directory_whitelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `shipping_description`
--
ALTER TABLE `shipping_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  MODIFY `shipping_methods_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders_images`
--
ALTER TABLE `sliders_images`
  MODIFY `sliders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `specials`
--
ALTER TABLE `specials`
  MODIFY `specials_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_class`
--
ALTER TABLE `tax_class`
  MODIFY `tax_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tax_rates`
--
ALTER TABLE `tax_rates`
  MODIFY `tax_rates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `units_descriptions`
--
ALTER TABLE `units_descriptions`
  MODIFY `units_description_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ups_shipping`
--
ALTER TABLE `ups_shipping`
  MODIFY `ups_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user_to_address`
--
ALTER TABLE `user_to_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `user_types_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `zone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2649;

--
-- AUTO_INCREMENT for table `zones1`
--
ALTER TABLE `zones1`
  MODIFY `zone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `zones_to_geo_zones`
--
ALTER TABLE `zones_to_geo_zones`
  MODIFY `association_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
