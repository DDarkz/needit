-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 14 mai 2019 à 21:12
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
(14, 5, 1, 'Épicerie pour personne âgé!!', 'Ma liste d\'achat figure sur la photo de l\'Annonce merci de me contacter \r\npour plus d\'informations supplémentaires !', 'y7h2l6', 0, 'd7e8f83bbfed7ef21a600c2951da2ab79f03e071.jpg', '2019-05-14'),
(13, 1, 1, 'achat bébé', '4 sacs prêt à manger pour bébé comme figure sur la photo de l\'annonce je veux deux de chaque\r\n(marque et type pareil) \r\nmagasin préféré :walmart \r\nmerci!', 'L7k5l8', 0, 'f34d895854341b0400a20b3d50f18f26b88eecfa.jpg', '2019-05-14'),
(12, 2, 1, 'Epicerie', '1kg banane/yogourt 0%/fromage Philadelphia léger pot de 500g', 'h3t1n9', 0, '9ab46523aa15bff4e1c1b8c8eab59ebb60e481dd.png', '2019-05-14'),
(11, 1, 2, 'Achat urgent Jean coutu !', 'Advil Extra fort/ couche bébé taille 4 marque pampers/lait 3.25%', 'h7n3y8', 0, '7877be3b0415ac8358db596a9a969c22a4d33cf7.jpg', '2019-05-14'),
(15, 2, 3, 'Achat souris sans fil !', 'Souris sans fil M325, bleu marque logitech !\r\ncomme la photo!\r\nprix : 19.99$ !\r\nje donne 5$ pour la livraison  Merci!!', 'h3t1n7', 0, '99e9a0d5ae376b3125e8e00bc800187bd357735d.jpg', '2019-05-14'),
(16, 2, 1, 'Achat pain', 'pain toast comme figure sur la photo marque et type . Merci !!', 'h7n3y8', 0, '3cbc4c220dd5c754b22dcfb3f098d7ba91d49115.jpg', '2019-05-14'),
(17, 2, 3, 'Au secours ! Besoin de couche rapidement ! (personne handicapé)', 'besoin de lingettes pour bébé  dans maximum une heure ! \r\nmarque et type comme la photo Merci de me contacter!', 'h3t1n4', 0, '70f01c0bb67132868b6d3cb440d2fd4a38bb5acf.jpg', '2019-05-14'),
(18, 1, 1, 'panier de légumes Bio', '- 3 poivrons(vert,rouge,jaune)\r\n/un brocoli/1kg patates/une boite 250g tomates cerise\r\n/une aubergine/un paquet champignons/2 citrons moyennes/un paquet oignons', 'y4h2l6', 0, '195b55752ce56bcd3c7048bd3f08f58584714968.jpg', '2019-05-14'),
(19, 5, 1, 'Achat Walmart', 'pizza congelé au chocolat / nutella/oeufs un paquet de 12 / 2 tablette chocolats de marque value de walmart (noisette et noire) Merci!', 'L7k5l1', 0, 'badf927bc5db480d7b7834796057319360ad43bf.jpg', '2019-05-14');

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
('admin@gmail.com', '123456', 4),
('live@hotmail.com', '123', 5);

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
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `livreur` varchar(255) NOT NULL,
  `demandeur` varchar(255) NOT NULL,
  `idAnnonce` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `livreur`, `demandeur`, `idAnnonce`, `message`, `date`) VALUES
(28, 'britanicus@hotmail.com', 'emna.kh@gmail.com', 5, 'cc', '2019-05-13');

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
  `sexe` varchar(30) NOT NULL,
  `dateNaissance` date NOT NULL,
  `ville` varchar(50) NOT NULL,
  `codePostale` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `nom`, `prenom`, `sexe`, `dateNaissance`, `ville`, `codePostale`, `telephone`) VALUES
(1, 'Emnaa', 'khelifi', 'F', '1989-11-25', 'tunisie', 'h7n3t9', '514789789'),
(2, 'Mélanie', 'joly', 'F', '1980-05-14', 'Montreal', 'h3t1n9', '514252252'),
(3, 'sofiane', 'Bourbit', 'M', '1990-03-12', 'Montreal', 'y4r5n6', '514147789'),
(4, 'administrateur', 'master', '', '1982-04-10', 'Montreal', '', ''),
(5, 'richard', 'lebien', 'M', '2019-05-07', 'Montreal', 'y4r5n6', '514287785');

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
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `idAnnonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `idLivraison` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `idService` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
