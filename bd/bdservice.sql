-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 02 mai 2019 à 20:11
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdservice`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `idAnnonce` int(11) NOT NULL,
  `idDemandeur` int(11) NOT NULL,
  `idService` int(11) NOT NULL,
  `Titre` varchar(100) NOT NULL,
  `listeAchat` text NOT NULL,
  `codePostale` varchar(50) NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `pochette` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`idAnnonce`, `idDemandeur`, `idService`, `Titre`, `listeAchat`, `codePostale`, `statut`, `pochette`, `date`) VALUES
(1, 2, 1, '', 'lait\r\noeufs\r\npain au chocolat\r\n', 'h4ebd5', 0, '', '0000-00-00'),
(2, 3, 2, '', 'couches bébé taille 3\r\nAdvil', 'h7n3u9', 0, '', '0000-00-00'),
(3, 1, 1, 'achat chez maxi', '-lait', 'h3h3l3', 0, 'achat.jpeg', '2019-05-02'),
(4, 1, 1, 'achat chez maxi', '-Lait', 'h3h3l3', 0, 'avatar.jpeg', '2019-05-02'),
(5, 1, 1, 'achat chez maxi', '-Lait', 'h3h3l3', 0, 'avatar.jpeg', '2019-05-02'),
(6, 1, 1, 'Pharmaprix', '-Advil', 'h3h2j3', 0, 'avatar.jpeg', '2019-05-02'),
(7, 1, 2, 'achat chez Pharmaprix', '-Advil', 'J4J 3L3', 0, 'avatar.jpeg', '2019-05-02'),
(8, 1, 1, 'achat chez maxi', '-couches\r\n-lait\r\n-fromage', 'h3h3k3', 0, 'b19b23dfd370e4784237b037d1689df3cb64f8f4', '2019-05-02'),
(9, 4, 1, 'achat chez Metro', 'vous trouverez la liste sur la photo', 'h0h2a5', 0, '5f3c07a562b0ab06079bda0999ead9a880b8ef2b', '2019-05-02'),
(10, 1, 2, 'achat chez maxi', '- lait', 'h3h3l3', 0, 'b5f988605b39bf3339ea963d80f4251ec8b7c97a', '2019-05-02');

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `courriel` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`courriel`, `mdp`, `idUser`) VALUES
('emna.kh@gmail.com', 'leyane', 1),
('britanicus@hotmail.com', '123456', 2),
('admin@gmail.com', '123456', 4);

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `idLivraison` int(11) NOT NULL,
  `idLivreur` int(11) NOT NULL,
  `idAnnonce` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `idService` int(11) NOT NULL,
  `nomService` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`idService`, `nomService`) VALUES
(1, 'epicerie'),
(2, 'pharmacie'),
(3, 'autres');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUser` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `dateNaissance` date NOT NULL,
  `ville` varchar(50) NOT NULL,
  `codePostale` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `nom`, `prenom`, `dateNaissance`, `ville`, `codePostale`, `telephone`) VALUES
(1, 'Emna', 'khelifi', '1989-11-25', 'tunisie', 'h7n3t9', '514789789'),
(2, 'Mélanie', 'joly', '1980-05-14', 'Montreal', 'h3t1n9', '514252252'),
(3, 'sofiane', 'Bourbit', '1990-03-12', 'Montreal', 'y4r5n6', '514147789'),
(4, 'administrateur', 'master', '1982-04-10', 'Montreal', '', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`idAnnonce`),
  ADD KEY `user_offreD` (`idDemandeur`),
  ADD KEY `service-offreD` (`idService`);

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`courriel`),
  ADD KEY `utilisateur-connexion` (`idUser`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`idLivraison`),
  ADD KEY `annonce_livraison` (`idAnnonce`),
  ADD KEY `annonce-utilisateur` (`idLivreur`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`idService`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `idAnnonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `idLivraison` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `idService` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
