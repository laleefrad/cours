-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 18 sep. 2020 à 17:34
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eboutique`
--
CREATE DATABASE IF NOT EXISTS `eboutique` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `eboutique`;

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE `actualite` (
  `id_actualite` int(5) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `image` text NOT NULL,
  `date_enregistrement` datetime NOT NULL,
  `titre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `actualite`
--

INSERT INTO `actualite` (`id_actualite`, `pseudo`, `contenu`, `image`, `date_enregistrement`, `titre`) VALUES
(1, 'Bot', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque id libero non elit blandit finibus eget id ligula. Duis lacinia elementum orci ac finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus in semper justo. In nec tortor turpis. Proin nec orci ex. Ut et interdum nulla. Sed viverra blandit sodales. Donec quis posuere diam, et aliquam neque. Phasellus lectus nulla, vehicula non luctus quis, aliquam a ex.\r\n<br><br>\r\nUt accumsan libero neque, eleifend facilisis dui porta ut. Praesent dignissim, diam in dapibus fringilla, enim purus venenatis justo, a varius leo elit mattis nisi. Curabitur nibh lorem, tristique id mauris eu, pellentesque vestibulum diam. In non semper leo, id venenatis dolor. Aenean malesuada, lectus ut gravida vestibulum, arcu velit vehicula sapien, eget pulvinar sem neque eget arcu. Nullam sit amet sagittis erat. Pellentesque leo augue, dictum quis fringilla id, sagittis quis arcu. Ut nibh risus, vulputate convallis leo eget, ultricies congue elit. Proin vestibulum lobortis massa sed pulvinar. Vivamus metus eros, dignissim et neque sit amet, congue cursus dolor. Pellentesque justo quam, ullamcorper non aliquet sed, varius ut lectus. Phasellus sit amet turpis nec metus varius mattis. Vivamus aliquam vulputate egestas.\r\n<br><br>\r\nAenean tristique dui malesuada dolor ultrices semper. Nulla malesuada, tortor sed malesuada lobortis, nisi urna rhoncus erat, id varius erat augue at eros. Donec maximus facilisis massa non gravida. Nam nec mauris tempor, pulvinar elit non, ornare metus. Quisque cursus porta eros id porttitor. Mauris malesuada ac urna et consequat. Curabitur efficitur quis libero dignissim mattis. Nunc at imperdiet dolor.', 'https://cdn.pixabay.com/photo/2013/10/09/02/26/landscape-192987_1280.jpg', '2020-09-18 15:41:23', 'Voyage en Ecosse'),
(2, 'Bot', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque id libero non elit blandit finibus eget id ligula. Duis lacinia elementum orci ac finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus in semper justo. In nec tortor turpis. Proin nec orci ex. Ut et interdum nulla. Sed viverra blandit sodales. Donec quis posuere diam, et aliquam neque. Phasellus lectus nulla, vehicula non luctus quis, aliquam a ex.\r\n<br><br>\r\nUt accumsan libero neque, eleifend facilisis dui porta ut. Praesent dignissim, diam in dapibus fringilla, enim purus venenatis justo, a varius leo elit mattis nisi. Curabitur nibh lorem, tristique id mauris eu, pellentesque vestibulum diam. In non semper leo, id venenatis dolor. Aenean malesuada, lectus ut gravida vestibulum, arcu velit vehicula sapien, eget pulvinar sem neque eget arcu. Nullam sit amet sagittis erat. Pellentesque leo augue, dictum quis fringilla id, sagittis quis arcu. Ut nibh risus, vulputate convallis leo eget, ultricies congue elit. Proin vestibulum lobortis massa sed pulvinar. Vivamus metus eros, dignissim et neque sit amet, congue cursus dolor. Pellentesque justo quam, ullamcorper non aliquet sed, varius ut lectus. Phasellus sit amet turpis nec metus varius mattis. Vivamus aliquam vulputate egestas.\r\n<br><br>\r\nAenean tristique dui malesuada dolor ultrices semper. Nulla malesuada, tortor sed malesuada lobortis, nisi urna rhoncus erat, id varius erat augue at eros. Donec maximus facilisis massa non gravida. Nam nec mauris tempor, pulvinar elit non, ornare metus. Quisque cursus porta eros id porttitor. Mauris malesuada ac urna et consequat. Curabitur efficitur quis libero dignissim mattis. Nunc at imperdiet dolor.', 'https://cdn.pixabay.com/photo/2017/03/19/20/03/montpellier-2157437_1280.jpg', '2020-09-18 15:42:54', 'Passage sur Montpellier'),
(3, 'Bot', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque id libero non elit blandit finibus eget id ligula. Duis lacinia elementum orci ac finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus in semper justo. In nec tortor turpis. Proin nec orci ex. Ut et interdum nulla. Sed viverra blandit sodales. Donec quis posuere diam, et aliquam neque. Phasellus lectus nulla, vehicula non luctus quis, aliquam a ex.\r\n<br><br>\r\nUt accumsan libero neque, eleifend facilisis dui porta ut. Praesent dignissim, diam in dapibus fringilla, enim purus venenatis justo, a varius leo elit mattis nisi. Curabitur nibh lorem, tristique id mauris eu, pellentesque vestibulum diam. In non semper leo, id venenatis dolor. Aenean malesuada, lectus ut gravida vestibulum, arcu velit vehicula sapien, eget pulvinar sem neque eget arcu. Nullam sit amet sagittis erat. Pellentesque leo augue, dictum quis fringilla id, sagittis quis arcu. Ut nibh risus, vulputate convallis leo eget, ultricies congue elit. Proin vestibulum lobortis massa sed pulvinar. Vivamus metus eros, dignissim et neque sit amet, congue cursus dolor. Pellentesque justo quam, ullamcorper non aliquet sed, varius ut lectus. Phasellus sit amet turpis nec metus varius mattis. Vivamus aliquam vulputate egestas.\r\n<br><br>\r\nAenean tristique dui malesuada dolor ultrices semper. Nulla malesuada, tortor sed malesuada lobortis, nisi urna rhoncus erat, id varius erat augue at eros. Donec maximus facilisis massa non gravida. Nam nec mauris tempor, pulvinar elit non, ornare metus. Quisque cursus porta eros id porttitor. Mauris malesuada ac urna et consequat. Curabitur efficitur quis libero dignissim mattis. Nunc at imperdiet dolor.', 'https://cdn.pixabay.com/photo/2015/05/30/01/18/vegetables-790022_1280.jpg', '2020-09-18 15:51:19', 'Mon potager ...'),
(4, 'Bot', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque id libero non elit blandit finibus eget id ligula. Duis lacinia elementum orci ac finibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus in semper justo. In nec tortor turpis. Proin nec orci ex. Ut et interdum nulla. Sed viverra blandit sodales. Donec quis posuere diam, et aliquam neque. Phasellus lectus nulla, vehicula non luctus quis, aliquam a ex.\r\n<br><br>\r\nUt accumsan libero neque, eleifend facilisis dui porta ut. Praesent dignissim, diam in dapibus fringilla, enim purus venenatis justo, a varius leo elit mattis nisi. Curabitur nibh lorem, tristique id mauris eu, pellentesque vestibulum diam. In non semper leo, id venenatis dolor. Aenean malesuada, lectus ut gravida vestibulum, arcu velit vehicula sapien, eget pulvinar sem neque eget arcu. Nullam sit amet sagittis erat. Pellentesque leo augue, dictum quis fringilla id, sagittis quis arcu. Ut nibh risus, vulputate convallis leo eget, ultricies congue elit. Proin vestibulum lobortis massa sed pulvinar. Vivamus metus eros, dignissim et neque sit amet, congue cursus dolor. Pellentesque justo quam, ullamcorper non aliquet sed, varius ut lectus. Phasellus sit amet turpis nec metus varius mattis. Vivamus aliquam vulputate egestas.\r\n<br><br>\r\nAenean tristique dui malesuada dolor ultrices semper. Nulla malesuada, tortor sed malesuada lobortis, nisi urna rhoncus erat, id varius erat augue at eros. Donec maximus facilisis massa non gravida. Nam nec mauris tempor, pulvinar elit non, ornare metus. Quisque cursus porta eros id porttitor. Mauris malesuada ac urna et consequat. Curabitur efficitur quis libero dignissim mattis. Nunc at imperdiet dolor.', 'https://cdn.pixabay.com/photo/2015/10/12/15/01/cat-984097_1280.jpg', '2020-09-18 15:52:47', 'Un chat c\'est sympa !');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(5) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `couleur` varchar(255) NOT NULL,
  `taille` varchar(5) NOT NULL,
  `sexe` enum('m','f') NOT NULL,
  `photo` varchar(255) NOT NULL,
  `prix` double(7,2) NOT NULL,
  `stock` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(5) NOT NULL,
  `id_membre` int(5) DEFAULT NULL,
  `montant` double(7,2) NOT NULL,
  `date` datetime NOT NULL,
  `etat` enum('En cours de traitement','Envoyé','Livré') NOT NULL DEFAULT 'En cours de traitement'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

CREATE TABLE `details_commande` (
  `id_details_commande` int(5) NOT NULL,
  `id_commande` int(5) NOT NULL,
  `id_article` int(5) NOT NULL,
  `quantite` int(3) NOT NULL,
  `prix` double(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(5) NOT NULL,
  `pseudo` varchar(15) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sexe` enum('f','m') NOT NULL,
  `ville` varchar(255) NOT NULL,
  `cp` int(5) UNSIGNED ZEROFILL NOT NULL,
  `adresse` text NOT NULL,
  `statut` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `sexe`, `ville`, `cp`, `adresse`, `statut`) VALUES
(2, 'admin', '$2y$10$qDeBxGm8IYoIugW4QclI6ePVAmgnsnUqoP7TRm9CipwNb8hD0iZdq', 'Nom_admin', 'Prénom_admin', 'admin@mail.fr', 'm', 'Paris', 75000, 'rue du tertre.', 2),
(3, 'test', '$2y$10$ki3t0N7y9ETROuaoqaY8x.x18bp0u.VwmuJ5Uj1qisLQ84Bq4zuWq', 'Nom_test', 'Prénom_test', 'test@mail.fr', 'm', 'Paris', 75000, 'rue du tertre.', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`id_actualite`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD UNIQUE KEY `reference` (`reference`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`);

--
-- Index pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD PRIMARY KEY (`id_details_commande`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `id_actualite` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `details_commande`
--
ALTER TABLE `details_commande`
  MODIFY `id_details_commande` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
