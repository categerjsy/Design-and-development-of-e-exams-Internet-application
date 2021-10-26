-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: localhost
-- Χρόνος δημιουργίας: 22 Σεπ 2021 στις 10:37:35
-- Έκδοση διακομιστή: 10.5.3-MariaDB
-- Έκδοση PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `examination_system_db`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `answer`
--

CREATE TABLE `answer` (
  `time_answer` varchar(15) NOT NULL,
  `student_answer` longtext CHARACTER SET utf8 NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `id_exam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `answer`
--

INSERT INTO `answer` (`time_answer`, `student_answer`, `id_student`, `id_question`, `id_exam`) VALUES
('00:01:56', '7', 1, 5, 1),
('00:01:54', '26', 1, 12, 1),
('00:01:54', '27', 1, 12, 1),
('00:01:54', '28', 1, 12, 1),
('00:01:54', '29', 1, 12, 1),
('00:01:54', '30', 1, 12, 1),
('00:01:54', '31', 1, 12, 1),
('00:01:55', '12', 1, 7, 1),
('00:09:43', 'Οι κορωνοϊοί είναι μια μεγάλη οικογένεια ιών που μπορούν να προκαλέσουν\r\nλοίμωξη σε ζώα και ανθρώπους. Στους ανθρώπους προκαλούν αναπνευστικές\r\nλοιμώξεις με ποικίλη σοβαρότητα. Εκτιμάται ότι οι κορωνοϊοί είναι υπεύθυνοι\r\nγια ένα πολύ σημαντικό ποσοστό των κοινών κρυολογημάτων σε ενήλικες και\r\nπαιδιά.', 1, 15, 1),
('00:01:53', 'True', 1, 1, 1),
('00:01:58', '5', 2, 5, 1),
('00:01:56', '26', 2, 12, 1),
('00:01:56', '27', 2, 12, 1),
('00:01:56', '29', 2, 12, 1),
('00:01:56', '30', 2, 12, 1),
('00:01:56', '32', 2, 12, 1),
('00:01:58', 'True', 2, 1, 1),
('00:01:57', '12', 2, 7, 1),
('00:09:33', 'Οι κορωνοϊοί είναι μια μεγάλη οικογένεια ιών που μπορούν να προκαλέσουν\r\nλοίμωξη σε ζώα και ανθρώπους.', 2, 15, 1),
('00:01:58', '7', 3, 5, 1),
('00:09:13', 'Οι κορωνοϊοί είναι μία μεγάλη οικογένεια ιών που μπορεί να προκαλέσουν νόσο στον άνθρωπο.', 3, 15, 1),
('00:01:56', 'True', 3, 1, 1),
('00:01:58', '11', 3, 7, 1),
('00:01:58', '32', 3, 12, 1),
('00:01:59', 'True', 4, 1, 1),
('00:09:59', '', 4, 15, 1),
('00:01:57', '7', 4, 5, 1),
('00:01:56', '26', 4, 12, 1),
('00:01:56', '28', 4, 12, 1),
('00:01:56', '29', 4, 12, 1),
('00:01:56', '31', 4, 12, 1),
('00:01:58', '12', 4, 7, 1),
('00:01:58', '12', 5, 7, 1),
('00:01:55', '26', 5, 12, 1),
('00:01:55', '27', 5, 12, 1),
('00:01:55', '28', 5, 12, 1),
('00:01:55', '29', 5, 12, 1),
('00:01:55', '30', 5, 12, 1),
('00:01:55', '31', 5, 12, 1),
('00:07:37', 'Οι κορωνοϊοί είναι μία μεγάλη οικογένεια ιών που μπορεί να προκαλέσουν νόσο τόσο στα ζώα όσο και στον άνθρωπο. Εάν ένα άτομο μολυνθεί από τον ιό, μπορεί να εμφανίσει συμπτώματα τα οποία ποικίλλουν από ήπια,\r\nόπως αυτά του κοινού κρυολογήματος, έως και πολύ σοβαρά.', 5, 15, 1),
('00:01:58', '7', 5, 5, 1),
('00:01:58', '12', 6, 7, 1),
('00:01:57', 'False', 6, 1, 1),
('00:01:58', '7', 6, 5, 1),
('00:01:53', '26', 6, 12, 1),
('00:01:53', '27', 6, 12, 1),
('00:01:53', '28', 6, 12, 1),
('00:01:53', '29', 6, 12, 1),
('00:01:53', '30', 6, 12, 1),
('00:01:53', '31', 6, 12, 1),
('00:01:58', '28', 7, 12, 1),
('00:01:58', '29', 7, 12, 1),
('00:01:58', '30', 7, 12, 1),
('00:01:57', 'False', 7, 1, 1),
('00:01:58', '13', 7, 7, 1),
('00:01:58', 'True', 1, 28, 2),
('00:09:18', 'Ο Ταρζάν στα παιδικά εμφανίζεται ως παιδάκι.', 1, 38, 2),
('00:02:49', 'False', 1, 32, 2),
('00:01:58', '67', 1, 33, 2),
('00:02:57', '78', 1, 36, 2),
('00:02:55', '75', 2, 36, 2),
('00:02:55', '76', 2, 36, 2),
('00:02:55', '77', 2, 36, 2),
('00:02:55', '79', 2, 36, 2),
('00:01:58', 'True', 2, 28, 2),
('00:09:33', 'O ήρωας της ιστορίας παρουσιάζεται στα κινούμενα σχέδια ως παιδί.', 2, 38, 2),
('00:02:56', 'True', 2, 32, 2),
('00:01:58', '68', 2, 33, 2),
('00:01:53', 'False', 3, 28, 2),
('00:02:53', 'False', 3, 32, 2),
('00:01:56', '68', 3, 33, 2),
('00:01:55', 'True', 4, 28, 2),
('00:02:57', '75', 4, 36, 2),
('00:02:57', '76', 4, 36, 2),
('00:02:57', '77', 4, 36, 2),
('00:02:57', '79', 4, 36, 2),
('00:09:47', 'Είχε τριχοφάγο.', 4, 38, 2),
('00:02:55', 'False', 4, 32, 2),
('00:01:58', '68', 4, 33, 2),
('00:02:56', '75', 5, 36, 2),
('00:02:56', '76', 5, 36, 2),
('00:02:56', '77', 5, 36, 2),
('00:02:56', '79', 5, 36, 2),
('00:01:55', 'False', 5, 28, 2),
('00:01:58', '68', 5, 33, 2),
('00:02:57', 'False', 5, 32, 2),
('00:02:58', '77', 6, 36, 2),
('00:01:56', 'False', 6, 28, 2),
('00:02:54', 'False', 6, 32, 2),
('00:02:56', '75', 7, 36, 2),
('00:02:56', '76', 7, 36, 2),
('00:02:56', '77', 7, 36, 2),
('00:01:56', '68', 7, 33, 2),
('00:02:59', 'True', 7, 32, 2),
('00:01:58', 'True', 7, 28, 2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `belongs_to`
--

CREATE TABLE `belongs_to` (
  `id_lesson` int(11) NOT NULL,
  `id_exam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `belongs_to`
--

INSERT INTO `belongs_to` (`id_lesson`, `id_exam`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `contains`
--

CREATE TABLE `contains` (
  `id_exam` int(11) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `contains`
--

INSERT INTO `contains` (`id_exam`, `id_question`) VALUES
(1, 1),
(1, 5),
(1, 7),
(1, 12),
(1, 15),
(2, 28),
(2, 32),
(2, 33),
(2, 36),
(2, 38);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `correction`
--

CREATE TABLE `correction` (
  `id_exam` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `st_grade` float NOT NULL,
  `id_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `correction`
--

INSERT INTO `correction` (`id_exam`, `id_question`, `st_grade`, `id_student`) VALUES
(1, 1, 2, 1),
(1, 5, 2, 1),
(1, 7, 2.5, 1),
(1, 12, 2.5, 1),
(1, 15, 2, 1),
(1, 1, 2, 2),
(1, 5, -0.5, 2),
(1, 7, 2.5, 2),
(1, 12, 1.26, 2),
(1, 15, 1, 2),
(1, 1, 2, 3),
(1, 5, 2, 3),
(1, 7, -1, 3),
(1, 12, -0.42, 3),
(1, 15, 0.5, 3),
(1, 1, 2, 4),
(1, 5, 2, 4),
(1, 7, 2.5, 4),
(1, 12, 1.68, 4),
(1, 15, 0, 4),
(1, 5, 2, 5),
(1, 7, 2.5, 5),
(1, 12, 2.5, 5),
(1, 15, 2, 5),
(1, 1, -0.5, 6),
(1, 5, 2, 6),
(1, 7, 2.5, 6),
(1, 12, 2.5, 6),
(1, 15, 0, 6),
(1, 1, -0.5, 7),
(1, 5, -0.5, 7),
(1, 7, -1, 7),
(1, 12, 1.26, 7),
(1, 15, 0, 7),
(2, 28, 2, 7),
(2, 32, -0.5, 7),
(2, 33, 2, 7),
(2, 36, 1.5, 7),
(2, 38, 0, 7),
(2, 28, -0, 6),
(2, 32, 2, 6),
(2, 33, -0, 6),
(2, 36, 0.5, 6),
(2, 38, 0, 6),
(2, 28, -0, 5),
(2, 32, 2, 5),
(2, 33, 2, 5),
(2, 36, 2, 5),
(2, 38, 0, 5),
(2, 28, 2, 4),
(2, 32, 2, 4),
(2, 33, 2, 4),
(2, 36, 2, 4),
(2, 38, 0, 4),
(2, 28, 2, 2),
(2, 32, -0.5, 2),
(2, 33, 2, 2),
(2, 36, 2, 2),
(2, 38, 2, 2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `create_exam`
--

CREATE TABLE `create_exam` (
  `id_professor` int(11) NOT NULL,
  `id_exam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `create_exam`
--

INSERT INTO `create_exam` (`id_professor`, `id_exam`) VALUES
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `create_lesson`
--

CREATE TABLE `create_lesson` (
  `id_professor` int(11) NOT NULL,
  `id_lesson` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `create_lesson`
--

INSERT INTO `create_lesson` (`id_professor`, `id_lesson`) VALUES
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `enroll_on`
--

CREATE TABLE `enroll_on` (
  `id_lesson` int(11) NOT NULL,
  `id_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `enroll_on`
--

INSERT INTO `enroll_on` (`id_lesson`, `id_student`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `exam`
--

CREATE TABLE `exam` (
  `id_exam` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `date_time` datetime NOT NULL,
  `final_grade` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Άδειασμα δεδομένων του πίνακα `exam`
--

INSERT INTO `exam` (`id_exam`, `time`, `date_time`, `final_grade`) VALUES
(1, '2021-09-22 11:18:00', '2021-09-22 11:00:00', 11),
(2, '2021-09-22 13:20:00', '2021-09-22 13:00:00', 10.5);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `get`
--

CREATE TABLE `get` (
  `id_results` int(11) NOT NULL,
  `id_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `get`
--

INSERT INTO `get` (`id_results`, `id_student`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 7),
(9, 6),
(10, 5),
(11, 4),
(12, 2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `gives`
--

CREATE TABLE `gives` (
  `id_exam` int(11) NOT NULL,
  `id_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `gives`
--

INSERT INTO `gives` (`id_exam`, `id_student`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `has`
--

CREATE TABLE `has` (
  `id_question` int(11) NOT NULL,
  `id_possibleAnswer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `has`
--

INSERT INTO `has` (`id_question`, `id_possibleAnswer`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(5, 6),
(5, 7),
(6, 8),
(6, 9),
(6, 10),
(7, 11),
(7, 12),
(7, 13),
(9, 17),
(9, 18),
(9, 19),
(10, 20),
(10, 21),
(10, 22),
(11, 23),
(11, 24),
(11, 25),
(12, 26),
(12, 27),
(12, 28),
(12, 29),
(12, 30),
(12, 31),
(12, 32),
(13, 33),
(13, 34),
(13, 35),
(13, 36),
(13, 37),
(13, 38),
(13, 39),
(13, 40),
(14, 41),
(14, 42),
(14, 43),
(14, 44),
(14, 45),
(28, 62),
(31, 65),
(32, 66),
(33, 67),
(33, 68),
(34, 69),
(34, 70),
(34, 71),
(35, 72),
(35, 73),
(35, 74),
(36, 75),
(36, 76),
(36, 77),
(36, 78),
(36, 79),
(39, 80),
(39, 81),
(39, 82),
(39, 83),
(39, 84),
(39, 85);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `includes`
--

CREATE TABLE `includes` (
  `id_lesson` int(11) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `includes`
--

INSERT INTO `includes` (`id_lesson`, `id_question`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(2, 26),
(2, 28),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `lesson`
--

CREATE TABLE `lesson` (
  `id_lesson` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(6) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `lesson`
--

INSERT INTO `lesson` (`id_lesson`, `name`, `category`, `semester`) VALUES
(1, 'Προφύλαξη/πρόληψη κορωνοϊό ', 'kormou', 1),
(2, 'Αερολογία', 'bkp', 2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `make`
--

CREATE TABLE `make` (
  `id_professor` int(11) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `make`
--

INSERT INTO `make` (`id_professor`, `id_question`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 26),
(2, 28),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `possible_answer`
--

CREATE TABLE `possible_answer` (
  `id_possibleAnswer` int(11) NOT NULL,
  `text` longtext NOT NULL,
  `is_correct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Άδειασμα δεδομένων του πίνακα `possible_answer`
--

INSERT INTO `possible_answer` (`id_possibleAnswer`, `text`, `is_correct`) VALUES
(1, 'TrueFalse ερώτηση', 1),
(2, 'TrueFalse ερώτηση', 0),
(3, 'TrueFalse ερώτηση', 1),
(4, 'TrueFalse ερώτηση', 0),
(5, 'self-test', 0),
(6, 'rapid-test', 0),
(7, 'μοριακή μέθοδος', 1),
(8, 'περίπου 3 ώρες', 1),
(9, 'περίπου 6 ώρες', 0),
(10, 'περίπου 12 ώρες', 0),
(11, 'SARS-CoV-2 είναι το επίσημο όνομα του νέου κορονοϊού ενώ COVID-19 η συντομογραφία του', 0),
(12, 'SARS-CoV-2 είναι το επίσημο όνομα του νέου κορονοϊού ενώ COVID-19 ονομάζεται η νόσος την οποία προκαλεί ο ιός αυτός.', 1),
(13, 'δεν έχουν καμία ουσιαστική διαφορά', 0),
(17, 'τις δύο δόσεις των εμβολίων δύο δόσεων ή τη μια δόση του μονοδοσικού εμβολίου και έχει παρέλθει χρονικό διάστημα δύο εβδομάδων από την ολοκλήρωση του εμβολιαστικού σχήματος.', 1),
(18, 'τις δύο δόσεις των εμβολίων δύο δόσεων ή τη μια δόση του μονοδοσικού εμβολίου', 0),
(19, 'του έχει χορηγηθεί τουλάχιστον μία δόση οποιουδήποτε εμβολίου', 0),
(20, 'από χρονικό διάστημα 90 ημερών από τη θεραπεία.', 1),
(21, 'από χρονικό διάστημα 120 ημερών από τη θεραπεία.', 0),
(22, 'από χρονικό διάστημα 100 ημερών από τη θεραπεία.', 0),
(23, 'το άτομο είχε αλλεργική αντίδραση από την πρώτη δόση', 1),
(24, 'το άτομο είχε θρομβώσεις σε μεγάλα αγγεία', 1),
(25, 'το άτομο αποφάσισε να αλλάξει εμβόλιο', 0),
(26, 'πυρετός', 1),
(27, 'βήχας', 1),
(28, 'πονόλαιμος', 1),
(29, 'ρινική καταρροή', 1),
(30, 'δυσκολία αναπνοής', 1),
(31, 'μυαλγίες.', 1),
(32, 'λιποθυμίες', 0),
(33, 'Πλένετε τα χέρια σας σε τακτά χρονικά διαστήματα με τρεχούμενο νερό και σαπούνι για τουλάχιστον 20 δευτερόλεπτα.', 1),
(34, 'Χρησιμοποιείτε αντισηπτικό αλκοολούχο διάλυμα.', 1),
(35, 'Να κάνετε συχνή χρήση αλκοολούχων ποτών ώστε να γίνεται αποστείρωση του λαιμού.', 0),
(36, 'Όταν βήχετε ή φτερνίζεστε χρησιμοποιείτε χαρτομάντηλα μιας χρήσης και πετάτε τα χρησιμοποιημένα χαρτομάντηλα σε κλειστό κάδο απορριμμάτων ή χρησιμοποιήστε το εσωτερικό του αγκώνα σας', 1),
(37, 'Να κάνετε μπάνιο σε υψηλές θερμοκρασίες.', 0),
(38, 'Αποφύγετε την επαφή χεριών με το στόμα, τη μύτη και τα μάτια σας.', 1),
(39, 'Κρατάτε απόσταση ενός μέτρου από ένα άτομο που φαίνεται να είναι άρρωστο με συμπτώματα γρίπης.', 1),
(40, 'Μείνετε ενημερωμένοι για τις τελευταίες εξελίξεις σχετικά με το COVID-19.', 1),
(41, 'Pfizer', 1),
(42, 'Moderna', 1),
(43, 'Janssen/Johnson & Johnson', 1),
(44, 'Astrazeneca', 1),
(45, 'Elvive', 0),
(62, 'TrueFalse ερώτηση', 1),
(65, 'TrueFalse ερώτηση', 1),
(66, 'TrueFalse ερώτηση', 0),
(67, 'της αναλήψεως', 0),
(68, 'της καταθέσεως', 1),
(69, 'τσεμπέρια', 0),
(70, 'σκούφους', 0),
(71, 'κράνος', 1),
(72, 'πίσω από τις λέξεις', 1),
(73, 'στους φράκτες', 0),
(74, 'σε αποθήκες με σοκολάτες', 0),
(75, 'it', 1),
(76, 'To κοράκι', 1),
(77, 'Κάρι', 1),
(78, 'Αιχμηρά αντικείμενα', 0),
(79, 'Μίζερι', 1),
(80, 'Τα κεριά', 1),
(81, 'Απ’ τες εννιά', 1),
(82, 'Άξιον εστί', 0),
(83, 'Όσο μπορείς', 1),
(84, 'Το Μονόγραμμα', 0),
(85, 'Ο Ήλιος ο Ηλιάτορας', 0);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `text` longtext NOT NULL,
  `type` varchar(25) NOT NULL,
  `difficulty_level` varchar(25) NOT NULL,
  `chapter` int(11) NOT NULL,
  `time` varchar(8) DEFAULT NULL,
  `grade` float NOT NULL,
  `negative_grade` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Άδειασμα δεδομένων του πίνακα `question`
--

INSERT INTO `question` (`id_question`, `text`, `type`, `difficulty_level`, `chapter`, `time`, `grade`, `negative_grade`) VALUES
(1, 'Μπορώ να δω αν έχω περάσει κορονοϊό κάνοντας εξέταση με κλασικό ορολογικό τεστ.', 'True-False', 'easy', 1, '00:02:00', 2, 0.5),
(2, 'Η πιο αξιόπιστη μέθοδος διάγνωσης κορονοϊού είναι τα self-test.', 'True-False', 'medium', 1, '00:02:00', 2, 0),
(3, 'Μπορούμε να κολλήσουμε τον κορωνοϊό  αγγίζοντας μολυσμένες επιφάνειες.', 'True-False', 'difficult', 3, '00:02:00', 2, 0),
(4, 'Εάν εκθέτουμε το σώμα μας στον ήλιο σε θερμοκρασίες υψηλότερες από 25oC δεν υπάρχει κίνδυνος να κολλήσουμε τον Covid-19.', 'True-False', 'easy', 6, '00:02:00', 2, 0.5),
(5, 'Διαλέξτε την πιο αξιόπιστη μέθοδο εξέτασης Covid-19', 'Multiple Choice', 'easy', 2, '00:02:00', 2, 0.5),
(6, 'Πόσο χρόνο χρειάζεται για να ολοκληρωθεί η εξέταση', 'Multiple Choice', 'medium', 3, '00:04:00', 2, 0.5),
(7, 'Τι διαφορά έχει ο COVID-19 από τον SARS-CoV-2;', 'Multiple Choice', 'difficult', 2, '00:02:00', 2.5, 1),
(9, 'Πλήρως εμβολιασμένο άτομο έναντι της νόσου COVID-19, θεωρείται το άτομο που έχει λάβει ', 'Multiple Choice', 'medium', 2, '00:04:00', 2, 0.5),
(10, 'Αν έχετε νοσήσει από COVID-19 και έχετε λάβει θεραπεία με πλάσμα αναρρωνυόντων μπορείτε να εμβολιασθείτε μετά από', 'Multiple Choice', 'medium', 3, '00:02:00', 2, 0),
(11, 'Σε ποιες περιπτώσεις η δεύτερη δόση μπορεί να μην επαναλαμβάνεται με το ίδιο εμβόλιο', 'Multiple Choice More', 'medium', 2, '00:02:00', 1, 0.5),
(12, 'Ποια είναι τα συμπτώματα της λοίμωξης COVID-19;', 'Multiple Choice More', 'medium', 3, '00:02:00', 2.5, 0),
(13, 'Τι μπορώ να κάνω για να προστατευθώ και να αποτρέψω την εξάπλωση του ιού;', 'Multiple Choice More', 'difficult', 5, '00:05:00', 2, 0),
(14, 'Τα διαθέσιμα εμβόλια είναι:', 'Multiple Choice More', 'medium', 2, '00:04:00', 2, 0),
(15, 'Τi είναι οι κορωνοϊοί;', 'Ελευθέρου κειμένου', 'easy', 3, '00:10:00', 2, 0),
(16, 'Είναι ο καινούργιος ιός ίδιος με τον ιό του SARS;', 'Ελευθέρου κειμένου', 'medium', 3, '00:10:00', 2, 0),
(17, 'Μπορώ να κολλήσω 2019-nCoV από το κατοικίδιο μου;', 'Ελευθέρου κειμένου', 'medium', 3, '00:10:00', 2, 0),
(26, 'Τι σημαίνει “Κοίτα να δεις”;', 'Ελευθέρου κειμένου', 'easy', 2, '00:10:00', 2, 0),
(28, 'Οι λάμπες βγάζουν φως.', 'True-False', 'easy', 2, '00:02:00', 2, 0),
(31, 'Το σύμπαν δημιουργήθηκε στο Big Bang.', 'True-False', 'medium', 2, '00:02:00', 2, 0),
(32, 'Το σύμπαν δεν διαστέλλεται.', 'True-False', 'easy', 7, '00:03:00', 2, 0.5),
(33, 'Τα ΑΤΜ γιορτάζουν', 'Multiple Choice', 'easy', 2, '00:02:00', 2, 0),
(34, 'Οι Καμικάζι φορούσαν', 'Multiple Choice', 'medium', 2, '00:03:00', 2, 0.5),
(35, 'Που κρυβόταν ο Αλέξης;', 'Multiple Choice', 'difficult', 2, '00:03:00', 2, 0.5),
(36, 'Επιλέξτε τα βιβλια του Στίβεν Κινγκ', 'Multiple Choice More', 'difficult', 3, '00:03:00', 2, 0),
(37, 'Γιατί λέμε \"κοιμάται σαν μωρό\", όταν τα μωρά ξυπνάνε κάθε δύο ώρες;', 'Ελευθέρου κειμένου', 'medium', 5, '00:10:00', 2, 0),
(38, ' Γιατί δεν έχει μούσι ο Ταρζάν;', 'Ελευθέρου κειμένου', 'difficult', 6, '00:10:00', 2.5, 0),
(39, 'Επιλέξτε τα ποιήματα του καβάφη', 'Multiple Choice More', 'medium', 3, '00:05:00', 3, 0);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `results`
--

CREATE TABLE `results` (
  `id_results` int(11) NOT NULL,
  `final_grade` float NOT NULL,
  `exam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Άδειασμα δεδομένων του πίνακα `results`
--

INSERT INTO `results` (`id_results`, `final_grade`, `exam`) VALUES
(1, 11, 1),
(2, 6.26, 1),
(3, 3.08, 1),
(4, 8.18, 1),
(5, 9, 1),
(6, 6.5, 1),
(7, -0.74, 1),
(8, 5, 2),
(9, 2.5, 2),
(10, 6, 2),
(11, 8, 2),
(12, 7.5, 2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `user_professor`
--

CREATE TABLE `user_professor` (
  `id_professor` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Άδειασμα δεδομένων του πίνακα `user_professor`
--

INSERT INTO `user_professor` (`id_professor`, `name`, `surname`, `email`, `phone_number`, `username`, `password`) VALUES
(1, 'Νίκος', 'Νίκου', 'niknik@uop.gr', '6910010010', 'nik', 'nik100@@'),
(2, 'Νικολέτα', 'Νικολέτου', 'nikoletou@go.uop.gr', '6910010015', 'nikoletou', 'NIKOLETOU999**'),
(3, 'Victor', 'Victorou', 'victor@uop.gr', '6983000003', 'victor', 'victor12$#');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `user_student`
--

CREATE TABLE `user_student` (
  `id_student` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `surname` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `AM` varchar(13) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Άδειασμα δεδομένων του πίνακα `user_student`
--

INSERT INTO `user_student` (`id_student`, `name`, `surname`, `email`, `AM`, `phone_number`, `username`, `password`) VALUES
(1, 'Σταμάτης', 'Σταματίου', 'dit17024@go.uop.gr', '2022201700000', '6910010011', 'stamatiou', 'stamatis999@'),
(2, 'Σάκης', 'Σακάκης', 'sakakis@uop.gr', '2022201710000', '6910010012', 'sakakis', 'sakakis999@'),
(3, 'Μύρων', 'Μύρωνας', 'mir@uop.gr', '2022201720000', '6910010013', 'muron', 'muron188@'),
(4, 'Marina', 'Marinaki', 'marina@go.uop.gr', '2022201740000', '6910010014', 'marinamar', 'marinamar!!11'),
(5, 'Mαρια', 'Μαρακη', 'maraki@go.uop.gr', '2022201760000', '6910010015', 'maraki', 'maraki199**'),
(6, 'Ισμήνη ', 'Ισμήνου', 'dit0ism@go.uop.gr', '2022201798000', '6910010089', 'ismin98', 'ismi12#$'),
(7, 'Chara', 'Charakou', 'char@uop.gr', '2022201798001', '6983700000', 'chara', 'chara123#@!');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `wants`
--

CREATE TABLE `wants` (
  `id_professor` int(11) NOT NULL,
  `id_results` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `wants`
--

INSERT INTO `wants` (`id_professor`, `id_results`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `belongs_to`
--
ALTER TABLE `belongs_to`
  ADD PRIMARY KEY (`id_lesson`,`id_exam`);

--
-- Ευρετήρια για πίνακα `contains`
--
ALTER TABLE `contains`
  ADD PRIMARY KEY (`id_exam`,`id_question`);

--
-- Ευρετήρια για πίνακα `create_exam`
--
ALTER TABLE `create_exam`
  ADD PRIMARY KEY (`id_professor`,`id_exam`);

--
-- Ευρετήρια για πίνακα `create_lesson`
--
ALTER TABLE `create_lesson`
  ADD PRIMARY KEY (`id_professor`,`id_lesson`);

--
-- Ευρετήρια για πίνακα `enroll_on`
--
ALTER TABLE `enroll_on`
  ADD PRIMARY KEY (`id_lesson`,`id_student`);

--
-- Ευρετήρια για πίνακα `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id_exam`);

--
-- Ευρετήρια για πίνακα `get`
--
ALTER TABLE `get`
  ADD PRIMARY KEY (`id_results`,`id_student`);

--
-- Ευρετήρια για πίνακα `gives`
--
ALTER TABLE `gives`
  ADD PRIMARY KEY (`id_exam`,`id_student`);

--
-- Ευρετήρια για πίνακα `has`
--
ALTER TABLE `has`
  ADD PRIMARY KEY (`id_question`,`id_possibleAnswer`);

--
-- Ευρετήρια για πίνακα `includes`
--
ALTER TABLE `includes`
  ADD PRIMARY KEY (`id_lesson`,`id_question`);

--
-- Ευρετήρια για πίνακα `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id_lesson`);

--
-- Ευρετήρια για πίνακα `make`
--
ALTER TABLE `make`
  ADD PRIMARY KEY (`id_professor`,`id_question`);

--
-- Ευρετήρια για πίνακα `possible_answer`
--
ALTER TABLE `possible_answer`
  ADD PRIMARY KEY (`id_possibleAnswer`);

--
-- Ευρετήρια για πίνακα `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`);

--
-- Ευρετήρια για πίνακα `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id_results`);

--
-- Ευρετήρια για πίνακα `user_professor`
--
ALTER TABLE `user_professor`
  ADD PRIMARY KEY (`id_professor`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Ευρετήρια για πίνακα `user_student`
--
ALTER TABLE `user_student`
  ADD PRIMARY KEY (`id_student`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `AM` (`AM`);

--
-- Ευρετήρια για πίνακα `wants`
--
ALTER TABLE `wants`
  ADD PRIMARY KEY (`id_professor`,`id_results`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `exam`
--
ALTER TABLE `exam`
  MODIFY `id_exam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT για πίνακα `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id_lesson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT για πίνακα `possible_answer`
--
ALTER TABLE `possible_answer`
  MODIFY `id_possibleAnswer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT για πίνακα `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT για πίνακα `results`
--
ALTER TABLE `results`
  MODIFY `id_results` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT για πίνακα `user_professor`
--
ALTER TABLE `user_professor`
  MODIFY `id_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT για πίνακα `user_student`
--
ALTER TABLE `user_student`
  MODIFY `id_student` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
