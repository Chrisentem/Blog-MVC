-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 09 juil. 2018 à 16:20
-- Version du serveur :  10.1.32-MariaDB
-- Version de PHP :  7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mvc_poo`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_comment`
--

CREATE TABLE `t_comment` (
  `com_id` int(11) NOT NULL,
  `com_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `com_author` varchar(100) NOT NULL,
  `com_content` varchar(200) NOT NULL,
  `post_id` int(11) NOT NULL,
  `com_date_moderate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_comment`
--

INSERT INTO `t_comment` (`com_id`, `com_date`, `com_author`, `com_content`, `post_id`, `com_date_moderate`) VALUES
(7, '2018-06-16 21:05:40', 'Jim', 'Très intéressant !', 21, '0000-00-00 00:00:00'),
(8, '2018-06-18 16:59:45', 'John', 'Très bon texte !', 19, '0000-00-00 00:00:00'),
(9, '2018-06-18 21:41:20', 'Steve', 'Bravo continuez !', 21, '2018-06-25 23:49:43'),
(10, '2018-06-18 21:41:47', 'Marie', 'Vraiment bien', 21, '0000-00-00 00:00:00'),
(11, '2018-06-18 21:42:33', 'Pierre', 'J\'attend le suivant avec impatience', 21, '0000-00-00 00:00:00'),
(12, '2018-06-18 21:42:48', 'Bob', 'Moi de même', 21, '0000-00-00 00:00:00'),
(14, '2018-06-18 21:43:29', 'Marc', 'Vivement le prochain', 21, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `t_comment_report`
--

CREATE TABLE `t_comment_report` (
  `report_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `date_report` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_pages`
--

CREATE TABLE `t_pages` (
  `page_id` int(11) NOT NULL,
  `page_title` text NOT NULL,
  `page_content` text NOT NULL,
  `page_date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `page_date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_pages`
--

INSERT INTO `t_pages` (`page_id`, `page_title`, `page_content`, `page_date_creation`, `page_date_modified`) VALUES
(1, 'A propos de l\'auteur', '<h2>Qui est Jean Forteroche?</h2>\r\n<p>N&eacute; quelque part entre les ann&eacute;es Giscard et Star Wars Jean n\'&eacute;tait pas vraiment destin&eacute; &agrave; une carri&egrave;re d\'&eacute;crivain. Ce n\'est que lors de l\'&eacute;preuve du Bac de fran&ccedil;ais qu\'il aura la r&eacute;v&eacute;lation suite aux appr&eacute;ciations des professeurs sur sa sensibilit&eacute; et son talent potentiel. Son &acirc;me d\'aventurier et son int&eacute;r&ecirc;t pour la d&eacute;couverte d\'autres cultures le pousse tr&egrave;s t&ocirc;t au voyage. Il y puisera ainsi l\'inspiration pour ses ouvrages...</p>\r\n<h3>Ces ouvrages :</h3>\r\n<ul class=\"list-group\">\r\n<li class=\"list-group-item\">&laquo; Le journal d&rsquo;un &eacute;crivain baroudeur &raquo; (&Eacute;ditions de l\'Aventurier, f&eacute;vrier 2008) : Prix Ansel Adams du 1er Roman 2008</li>\r\n<li class=\"list-group-item\">Nouvelle &laquo; Visages lointains &raquo; (&Eacute;ditions Montgolfi&egrave;re, octobre 2009)</li>\r\n<li class=\"list-group-item\">&laquo; L\'arriv&eacute;e au d&eacute;part &raquo; (Ben&amp;Mike, d&eacute;cembre 2010)</li>\r\n<li class=\"list-group-item\">&laquo; Chemins perdus &raquo; (Nouvelles aux &eacute;ditions Skywrite, mars 2011)</li>\r\n<li class=\"list-group-item\">&laquo; L\'inconnu du phare ouest &raquo; (Ben&amp;Mike, juillet 2012)</li>\r\n<li class=\"list-group-item\">&laquo; A travers la plaine Itude &raquo; (&Eacute;ditions St Oliver, Janvier 2013)</li>\r\n<li class=\"list-group-item\">&laquo; Les myst&egrave;res de Mumford &raquo; (&Eacute;ditions de l\'Aventurier, &eacute;t&eacute; 2014)</li>\r\n<li class=\"list-group-item\">&laquo; D&eacute;tours inconnus &raquo; (Billbox, hiver 2015)</li>\r\n<li class=\"list-group-item\">&laquo; Automne sans fin &raquo; (&Eacute;ditions Montgolfi&egrave;re, hiver 2016)</li>\r\n<li class=\"list-group-item\">&laquo; L\'&icirc;le du Faon Tastik &raquo; (&Eacute;ditions de l\'Aventurier, hiver 2017)</li>\r\n<li class=\"list-group-item list-group-item-primary\">En cours d\'&eacute;criture et &agrave; d&eacute;couvrir sur le blog son dernier roman \"Billet simple pour l\'Alaska\"</li>\r\n</ul>', '2018-07-07 20:13:11', '2018-07-08 15:19:07'),
(2, 'Contact', '<p>Vous pouvez me contacter à tout moment à l\'adresse suivante, et je me ferai un plaisir de vous répondre:</p>\r\n<address><a href=\"mailto:jean.forteroche@gmail.com\">Jean Forteroche</a></address>', '2018-07-07 20:16:41', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `t_post`
--

CREATE TABLE `t_post` (
  `post_id` int(11) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_title` varchar(100) NOT NULL,
  `post_content` varchar(3000) NOT NULL,
  `post_date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_post`
--

INSERT INTO `t_post` (`post_id`, `post_date`, `post_title`, `post_content`, `post_date_modified`) VALUES
(1, '2018-06-11 11:26:37', 'Premier billet', 'Bonjour monde ! Ceci est le premier billet sur mon blog.', NULL),
(16, '2018-06-16 16:08:52', 'Cigognes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui', NULL),
(17, '2018-06-16 16:08:52', 'La discorde', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui', NULL),
(18, '2018-06-16 16:08:52', 'L\'été indien', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui', NULL),
(19, '2018-06-16 16:08:52', 'Beau fix', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui', NULL),
(21, '2018-06-18 17:25:24', 'Reflexions 3', '<p><strong>Lorem ipsum dolor</strong> sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL),
(23, '2018-06-26 00:03:26', 'Reflexions 5', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL),
(25, '2018-07-02 14:43:21', 'Reflexion 7', '<p style=\"text-align: justify;\">At vero eos et <strong><em>accusamus</em></strong> et iusto odio dignissimos ducimus qui <em>blanditiis</em> praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.<u></u></p>', '2018-07-07 16:39:47'),
(26, '2018-07-08 12:36:16', 'Reflexion 9', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', '2018-07-08 12:42:27');

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE `t_user` (
  `USER_ID` int(11) NOT NULL,
  `USER_LOGIN` varchar(100) NOT NULL,
  `USER_PW` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_user`
--

INSERT INTO `t_user` (`USER_ID`, `USER_LOGIN`, `USER_PW`) VALUES
(1, 'admin', '$2y$10$hC3/3Zf1DncBjg5QS.fzhutNqLfxYfIShwkobmAiJB/G/da.emWom');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_comment`
--
ALTER TABLE `t_comment`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `t_comment_report`
--
ALTER TABLE `t_comment_report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `com_id` (`com_id`);

--
-- Index pour la table `t_pages`
--
ALTER TABLE `t_pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Index pour la table `t_post`
--
ALTER TABLE `t_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Index pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_comment`
--
ALTER TABLE `t_comment`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `t_comment_report`
--
ALTER TABLE `t_comment_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_pages`
--
ALTER TABLE `t_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `t_post`
--
ALTER TABLE `t_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_comment`
--
ALTER TABLE `t_comment`
  ADD CONSTRAINT `t_comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `t_post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `t_comment_report`
--
ALTER TABLE `t_comment_report`
  ADD CONSTRAINT `t_comment_report_ibfk_1` FOREIGN KEY (`com_id`) REFERENCES `t_comment` (`com_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
