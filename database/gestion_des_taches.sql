-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 07 nov. 2023 à 08:44
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_des_taches`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `entreprise` varchar(50) NOT NULL,
  `departement` varchar(100) NOT NULL,
  `logo` varchar(1500) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `email`, `telephone`, `entreprise`, `departement`, `logo`, `isDeleted`) VALUES
(1, 'ADERAB', 'el mehdi', 'elmehdi.aderab@gmail.com', '614160086', 'Apes', 'IT', 'images/programmer.png', 0),
(2, 'Lkihal', 'riad', 'lkihal@gmail.com', '785129625', 'akreos', 'Marketing', 'images/Python-logo-notext.svg.png', 0),
(3, 'sadiki', 'anas', 'anas@gmail.com', '629526315', 'SQL', 'Data', 'images/programmer.png', 0),
(4, 'ADERAB', 'ZAID', 'zaid@gmail.com', '614160086', 'yazaki', 'markenting', 'images/man.png', 0),
(5, 'Lkihal', 'mouad', 'mouad@gmail.com', '0614160086', 'pl sql', 'data', 'images/man-character_665280-46970.png', 0);

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

DROP TABLE IF EXISTS `projets`;
CREATE TABLE IF NOT EXISTS `projets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `progress` int(11) DEFAULT '0',
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `id_client` int(11) NOT NULL,
  `isDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`id`, `titre`, `progress`, `description`, `date_debut`, `date_fin`, `id_client`, `isDeleted`) VALUES
(1, 'Application web', 40, 'Lorem ipsum dolor sit amet. Ut unde error eos fuga repudiandae hic perferendis quos aut rerum praesentium aut molestiae praesentium cum deleniti optio aut laborum galisum. Cum rerum blanditiis aut enim praesentium aut eius voluptatum qui sapiente debitis non sapiente quibusdam ea enim voluptates.', '2023-09-01', '2023-10-31', 1, 0),
(2, 'Application Mobile', 100, 'Lorem ipsum dolor sit amet. Ut unde error eos fuga repudiandae hic perferendis quos aut rerum praesentium aut molestiae praesentium cum deleniti optio aut laborum galisum. Cum rerum blanditiis aut enim praesentium aut eius voluptatum qui sapiente debitis non sapiente quibusdam ea enim voluptates.', '2023-09-01', '2023-10-01', 2, 0),
(4, 'Gestion BibliothÃ©que', 0, 'Lorem ipsum dolor sit amet. Ut unde error eos fuga repudiandae hic perferendis quos aut rerum praesentium aut molestiae praesentium cum deleniti optio aut laborum galisum. Cum rerum blanditiis aut enim praesentium aut eius voluptatum qui sapiente debitis non sapiente quibusdam ea enim voluptates.', '2023-09-09', '2023-12-01', 2, 0),
(5, 'tram', 0, 'Lorem Ipsum Dolor Sit Amet. Ut Unde Error Eos Fuga Repudiandae Hic Perferendis Quos Aut Rerum Praesentium Aut Molestiae Praesentium Cum Deleniti Optio Aut Laborum Galisum. Cum Rerum Blanditiis Aut Enim Praesentium Aut Eius Voluptatum Qui Sapiente Debitis Non Sapiente Quibusdam Ea Enim Voluptates.\r\n\r\n', '2023-10-03', '2023-11-25', 4, 0),
(6, 'Conception', 0, 'Lorem Ipsum Dolor Sit Amet. Ut Unde Error Eos Fuga Repudiandae Hic Perferendis Quos Aut Rerum Praesentium Aut Molestiae Praesentium Cum Deleniti Optio Aut Laborum Galisum. Cum Rerum Blanditiis Aut Enim Praesentium Aut Eius Voluptatum Qui Sapiente Debitis Non Sapiente Quibusdam Ea Enim Voluptates.\r\n', '2023-10-05', '2023-11-02', 5, 0),
(7, 'Conception', 0, 'Lorem ipsum dolor sit amet. Ut unde error eos fuga repudiandae hic perferendis quos aut rerum praesentium aut molestiae praesentium cum deleniti optio aut laborum galisum. Cum rerum blanditiis aut enim praesentium aut eius voluptatum qui sapiente debitis non sapiente quibusdam ea enim voluptates.', '2023-10-05', '2023-11-02', 5, 0),
(8, 'gestion ecole', 0, 'Lorem ipsum dolor sit amet. Ut unde error eos fuga repudiandae hic perferendis quos aut rerum praesentium aut molestiae praesentium cum deleniti optio aut laborum galisum. Cum rerum blanditiis aut enim praesentium aut eius voluptatum qui sapiente debitis non sapiente quibusdam ea enim voluptates.', '2023-10-04', '2023-11-05', 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

DROP TABLE IF EXISTS `taches`;
CREATE TABLE IF NOT EXISTS `taches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `etat` varchar(50) DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `projet_id` int(11) NOT NULL,
  `isDeleted` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `projet_id` (`projet_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `taches`
--

INSERT INTO `taches` (`id`, `titre`, `description`, `date_debut`, `date_fin`, `etat`, `user_id`, `projet_id`, `isDeleted`) VALUES
(1, 'Conception', '- Merise\r\n- Uml', '2023-09-03', '2023-09-11', '52', 30, 1, 1),
(6, 'login', 'dsfd', '2024-02-12', '2024-02-14', '70', 16, 1, 1),
(7, 'Debbugin', 'Lorem Ipsum Dolor Sit Amet. Ut Unde Error Eos Fuga Repudiandae Hic Perferendis Quos Aut Rerum Praesentium Aut Molestiae Praesentium Cum Deleniti Optio Aut Laborum Galisum. Cum Rerum Blanditiis Aut Enim Praesentium Aut Eius Voluptatum Qui Sapiente Debitis Non Sapiente Quibusdam Ea Enim Voluptates. ', '2023-09-09', '2023-10-01', '100', 1, 2, 0),
(8, 'jfjgfj', 'Lorem Ipsum Dolor Sit Amet. Ut Unde Error Eos Fuga Repudiandae Hic Perferendis Quos Aut Rerum Praesentium Aut Molestiae Praesentium Cum Deleniti Optio Aut Laborum Galisum. Cum Rerum Blanditiis Aut Enim Praesentium Aut Eius Voluptatum Qui Sapiente Debitis Non Sapiente Quibusdam Ea Enim Voluptates.\r\n\r\n', '2023-09-15', '2023-10-01', '0', 16, 2, 0),
(9, 'Conception', 'Lorem Ipsum Dolor Sit Amet. Ut Unde Error Eos Fuga Repudiandae Hic Perferendis Quos Aut Rerum Praesentium Aut Molestiae Praesentium Cum Deleniti Optio Aut Laborum Galisum. Cum Rerum Blanditiis Aut Enim Praesentium Aut Eius Voluptatum Qui Sapiente Debitis Non Sapiente Quibusdam Ea Enim Voluptates.', '2023-10-05', '2023-11-03', '40', 1, 4, 0),
(10, 'code', 'php', '2023-11-05', '2023-10-27', '12', 2, 4, 0),
(11, 'grgr', 'regreg', '2023-10-13', '2023-10-12', '0', 16, 6, 0),
(12, 'sdg', 'gsdgs', '2023-10-12', '2023-10-11', '0', 32, 6, 0),
(13, 'Dashboard', 'count ', '2023-10-08', '2023-10-22', '0', 29, 4, 0),
(14, 'Dashboard', 'count ', '2023-10-08', '2023-10-22', '0', 29, 4, 0),
(15, 'Dashboard', 'Lorem ipsum dolor sit amet. Ut unde error eos fuga repudiandae hic perferendis quos aut rerum praesentium aut molestiae praesentium cum deleniti optio aut laborum galisum. Cum rerum blanditiis aut enim praesentium aut eius voluptatum qui sapiente debitis non sapiente quibusdam ea enim voluptates.', '2023-10-27', '2023-11-03', '10', 31, 8, 0),
(16, 'login', 'Lorem ipsum dolor sit amet. Ut unde error eos fuga repudiandae hic perferendis quos aut rerum praesentium aut molestiae praesentium cum deleniti optio aut laborum galisum. Cum rerum blanditiis aut enim praesentium aut eius voluptatum qui sapiente debitis non sapiente quibusdam ea enim voluptates.', '2023-11-05', '2023-10-10', '5.5', 30, 8, 0),
(17, 'Logout', 'Lorem Ipsum Dolor Sit Amet. Ut Unde Error Eos Fuga Repudiandae Hic Perferendis Quos Aut Rerum Praesentium Aut Molestiae Praesentium Cum Deleniti Optio Aut Laborum Galisum. Cum Rerum Blanditiis Aut Enim Praesentium Aut Eius Voluptatum Qui Sapiente Debitis Non Sapiente Quibusdam Ea Enim Voluptates.\r\n\r\n', '2023-10-21', '2023-10-25', '20', 32, 5, 0),
(18, 'test', 'Lorem Ipsum Dolor Sit Amet. Ut Unde Error Eos Fuga Repudiandae Hic Perferendis Quos Aut Rerum Praesentium Aut Molestiae Praesentium Cum Deleniti Optio Aut Laborum Galisum. Cum Rerum Blanditiis Aut Enim Praesentium Aut Eius Voluptatum Qui Sapiente Debitis Non Sapiente Quibusdam Ea Enim Voluptates.\r\n\r\n', '2023-10-13', '2023-10-22', '80', 29, 5, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `profession` varchar(50) DEFAULT NULL,
  `date_naissance` date NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(25) NOT NULL,
  `isDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `profession`, `date_naissance`, `telephone`, `image`, `email`, `password`, `role`, `isDeleted`) VALUES
(1, 'ADERAB', 'EL MEHDI', 'Directeur GÃ©nÃ©ral', '1998-08-01', '+212614160086', 'images/profile-pic1.png', 'elmehdi.aderab@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', 0),
(2, 'Lkihal', 'Riad', 'Chef de projet', '1999-01-05', '0617967852', 'images/riad.png', 'lkihal49@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 0),
(16, 'ADERAB', 'youssef', 'UX designer', '2023-09-08', '+212614160086', 'images/profile_elmehdi_aderab.png', 'elmehdi.aderab@gmail.com', '2e99bf4e42962410038bc6fa4ce40d97', 'User', 0),
(20, 'ADERAB', 'zaid', 'Technicien', '1991-11-02', '0674859642', 'images/650475248a27d9.06522763.jpg', 'zaid.aderab@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 0),
(26, 'ADERAB', 'zaid', 'Technicien', '1991-11-02', '0695632596', 'images/6504760eba4fb6.21364051.jpg', 'zaid.aderab@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc', 'user', 1),
(29, 'ettaoubali', 'anass', 'DÃ©veloppeur web', '2001-02-01', '0662596236', 'images/6511aecc658f60.90175219.jpg', 'anas@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 0),
(30, 'skitiwi', 'oussama', 'DÃ©veloppeur web ', '2002-12-15', '0686147856', 'images/6516c5b677f664.03326535.png', 'oussama@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 0),
(31, 'Lkihal', 'mouad', 'Data science', '1995-07-12', '0662452599', 'images/65196962810b56.33187807.png', 'mouad@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 0),
(32, 'Benhmidi', 'MEHDI', 'DÃ©veloppeur full stack', '2001-02-01', '0662452596', 'images/6519b17fb57723.15509380.png', 'benhmidi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 0),
(33, 'Benhmidi', 'MEHDI', 'DÃ©veloppeur full stack', '2001-02-01', '0662452596', 'images/6519b21c493bd0.22795854.png', 'benhmidi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 1),
(34, 'idhammou', 'othman', 'IngÃ©nieur informatique et rÃ©seaux', '1992-01-02', '0661259632', 'images/651b34050fc782.43330781.png', 'othman@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 0),
(35, 'oumoudid', 'youssef', 'DÃ©veloppeur full stack', '2002-01-02', '0662548596', 'images/6549f2b8015b64.38869856.png', 'oumoudid@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `projets`
--
ALTER TABLE `projets`
  ADD CONSTRAINT `projets_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `taches`
--
ALTER TABLE `taches`
  ADD CONSTRAINT `taches_ibfk_1` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`),
  ADD CONSTRAINT `taches_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `utilisateurs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
