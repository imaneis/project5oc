-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 15 mars 2019 à 15:07
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@email.fr', '$2y$10$j8tN3wcAMbDcA1qgBPGRquW0f4N5vlgjPruPQ8SRcv3bxnNIHm9SO');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `approvement` int(11) NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `approvement`, `comment_date`) VALUES
(6, 5, 'visiteur', 'Valider\r\n', 1, '2019-02-08 17:05:44'),
(2, 3, 'mon nom', 'comment', 1, '2018-11-10 23:16:04'),
(5, 5, 'visiteur', '1\r\n', 0, '2019-02-04 22:31:48'),
(7, 11, 'name', 'comment', 0, '2019-03-06 20:12:15'),
(8, 10, 'name', 'again', 0, '2019-03-06 20:51:15'),
(9, 11, 'name2', 'comment', 0, '2019-03-06 20:52:03'),
(10, 10, 'name2', 'comment 2', 1, '2019-03-07 01:30:23');

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL,
  `approvement` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `pseudo`, `pass`, `email`, `date_inscription`, `approvement`) VALUES
(6, 'd', '$2y$10$vGX4J3jD3LFrp45FTVFDkOmNJ16ORrdaWp3CKsqiZ/9', 'email2', '2019-03-08', 1),
(5, 'c', '$2y$10$vGX4J3jD3LFrp45FTVFDkOmNJ16ORrdaWp3CKsqiZ/9', 'email', '2019-03-08', 0),
(3, 'php', '$2y$10$IPhXl7SxKiVFx7uxXL7ph.wmPDrGd6wN2bYHM4tG3iUtbF7.NEV.u', 'php@php.com', '2019-03-08', 1),
(4, 'a', '$2y$10$vGX4J3jD3LFrp45FTVFDkOmNJ16ORrdaWp3CKsqiZ/9vl/b5DYwfa', 'n', '2019-03-08', 1),
(7, 'e', '$2y$10$vGX4J3jD3LFrp45FTVFDkOmNJ16ORrdaWp3CKsqiZ/9', 'email3', '2019-03-08', 0),
(8, 'f', '$2y$10$vGX4J3jD3LFrp45FTVFDkOmNJ16ORrdaWp3CKsqiZ/9', 'email4', '2019-03-08', 0);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `author`, `content`, `creation_date`, `update_date`) VALUES
(1, 'Mon parcours sur OC', 'Admin', '<p> <strong> OpenClassrooms est une école en ligne qui propose à ses membres des cours certifiant et des parcours débouchant sur un métier d’avenir, réalisé en interne, par des écoles, des universités, ou encore par des entreprises partenaires comme Microsoft ou IBM.</strong> </p>\r\n                  <p>J’ai débuté en janvier 2018 l’aventure avec OpenClassrooms, ce qui a attiré mon attention en premier c’était l’administration qui été a l’écoute, cela m’a permis d’être dirigé vers un mentor adapté a mes attentes.Le mentor est la personne chargée de me suivre pendant ma formation, avec ces conseils et recommandations, j’arrive à avancer dans les projets qui permettent l’obtention de mon diplôme.La communauté d’étudiant est très réactive, sous la surveillance des mentors les échanges sont fluides et chacun avance à son rythme. Les cours sont très bien expliqués, et le format vidéo qui en général ne dépasse pas 10 minutes permet d’assimiler les points importants et de voir en temps réel, les consignes a suivre pour avoir le résultat rechercher. Pour toutes personnes souhaitant effectuer une reconversion professionnelle ou simplement intéresser par une formation flexible, je conseille sans hésitation OpenClassrooms.</p>', '2018-11-10 20:41:45', NULL),
(2, 'Mon avis sur le e-learning', 'Admin', '<p> <strong> L’e-learning est un mode de formation à distance qui s’appuie sur un certain nombre de ressources (Internet, intranet, CD-ROM) et dispensé à partir d’un ordinateur. L’e-learning peut mobiliser un certain nombre d’outils 2.0 (wiki, vidéo, podcast…). Les modules les plus développés permettent une certaine interaction entre apprenants et tuteurs. </strong> </p>\r\n                  <p>Depuis janvier 2018, j’ai commencé la formation Développeur d’application - PHP/Symfony, qui est en cours, cette expérience est très enrichissante, j’ai développer une autonomie dans la prise de mes décisions et la recherche de solutions aux problèmes qui empêche l’aboutissement de mon projet. C’est une opportunité pour toute personne souhaitant ce reconvertir professionnellement ou encore débuté des études dans le domaine de l’informatique et du multimédia, à travers les parcours vous aller adopté des qualités indispensables telles que : l’autonomie, l’organisation, la flexibilité, la curiosité, être entreprenant, l’adaptabilité, et j’en passe ce format de formation, enrichie votre expérience ce qui est un atout incontournable pour votre futur poste.</p>', '2018-11-10 20:41:46', NULL),
(3, 'Mes projet réaliser sur OpenClassrooms', 'Admin', '<p> <strong> OpenClassrooms est une école en ligne qui propose à ses membres des cours certifiant et des parcours débouchant sur un métier d’avenir, réalisé en interne, par des écoles, des universités, ou encore par des entreprises partenaires comme Microsoft ou IBM.</strong> </p>\r\n                  <p>J’ai été amené a réaliser jusqu’à présent 3 projets différents, qui demande chacune des compétences particulières et une grande flexibilité, dans le premier j’ai été amené a créer un site pour une agence de ventes et locations de chalet, qui souhaite permettre a ces clients de consulter les disponibilités et contacter l’agence pour un achat ou réservation. Dans le second j’ai été amené à créer un site pour une association qui souhaite organiser une séance de film en plein air, qui souhaite proumoivoir cet événement et permettre aux visiteurs de se préinscrire, et avoir connaissance des horaires pour la diffusion. Pour le 3 ème projet une jeune startup ExpressFood, qui ambitionne de livrer des plats de qualité à domicile en moins de 20 minutes grâce à un réseau de livreurs à vélo. M’a chargé de créer une base de données pour leurs applications, celle-ci devait contenir : la liste des clients, la liste des différents plats du jour, la liste des commandes passées, la liste des livreurs, avec leur statut (libre, en cours de livraison) et leur position. À travers ces projets, j’ai acquis plusieurs compétences telles que : comprendre un cahier des charges, répondent aux attentes des clients, être flexible.</p>', '2018-11-10 20:41:47', NULL),
(4, '5 sites pour un CV pro', 'Admin', '<p> <strong> Le CV est ta carte de visite professionnelle. Il doit permettre à une entreprise d’avoir une vue d’ensemble de ton profil, de tes principales qualifications et lui donner envie de te rencontrer. C’est ton image de marque, ton argument de « vente ». </strong> </p>\r\n                  <p>Le CV étant une étape indispensable dans l’obtention de votre futur emploi, et ayant passé sur plusieurs sites gratuits a la recherche d’une solution professionnelle, je vous liste ci-dessous 5 sites à voir : \r\n                    <a href=\"https://www.canva.com\">Canva</a>\r\n                    /<a href=\"https://www.cv-en-ligne.org\">CV en ligne</a>\r\n                    /<a href=\"https://www.webself.net\">WebSelf</a>\r\n                    /<a href=\"https://moncvmodele.com \">Mon CV modèles</a>\r\n                    /<a href=\"https://www.cvmaker.fr\">CV Maker</a>\r\n                  </p>', '2018-11-10 20:41:48', NULL),
(5, '8 raisons de choisir Wordpress en tant que CMS', 'Admin', '<p> <strong> WordPress est LE CMS le plus répandu à l’heure actuelle ! Bien que tous les programmeurs ne soient pas forcément partisans de cette plateforme, elle a le mérite d’être extrêmement intuitive et de placer la gestion de contenu web à la portée de tous. WordPress a su se démarquer de ses concurrents (Joomla, Magento, Drupal) par la force de sa communauté et les innombrables thèmes qu’elle propose. </strong> </p>\r\n                  <p>Vous pouvez utiliser WordPress pour tous types de besoins.Car WordPress est adapté aussi bien à des sites e-commerce, des blogues ou des sites vitrine. Le seul véritable inconvénient de WordPress est qu’il va demander plus de ressources qu’un site codé en dur, surtout si vous installez de nombreux plugins (programmes permettant de rajouter des fonctionnalités comme un formulaire de contact, un système de chat, la gestion d’une newsletter, des boutons vers vos réseaux sociaux, un système de commentaires, etc.). Voici 8 raisons de choisir Wordpress, en tant que CMS :\r\n                     <ul class=\"list-inline\">\r\n                       <li>Facilité de gestion et d’utilisation</li>\r\n                       <li>Facilité pour le référencement</li>\r\n                       <li>WordPress est totalement personnalisable</li>\r\n 					   <li>Rapidité et fluidité dans la navigation</li>\r\n  					   <li>Une interface adaptée aux mobiles</li>\r\n 					   <li>La simplicité et la faciliter de maitrise</li>\r\n  					   <li>La possibilité du multi-auteur pour un site</li>\r\n  					   <li>Une configuration simple des adresses URL</a></li>\r\n					 </ul></p>', '2019-02-08 13:26:44', NULL),
(10, 'ddfgdg', 'dgdffdgdg', 'kjsdfkskjkfjsksfjkjfdkfdj', '2019-02-11 15:51:49', NULL),
(11, '5554', '777', 'lklklkl', '2019-02-11 15:51:49', NULL),
(12, 'djsslfjl', 'slsjlfkslfj', 'sfsdljlsdjlfjsjfd', '2019-02-11 15:51:49', NULL),
(13, 'dkdkdk', 'ncncncn', '5455454', '2019-02-11 15:51:49', NULL),
(14, 'ieieie', 'mqmqmqm', '88888', '2019-02-11 15:51:49', NULL),
(16, 'dfdsf', 'php', 'qdfsdsdfsdfsdfsfsf', '2019-03-08 19:19:19', '2019-03-08 19:19:19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
