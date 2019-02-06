-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 10 nov. 2018 à 22:17
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
-- Base de données :  `test`
--

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
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`) VALUES
(1, 5, 'name', 'comment', '2018-11-10 23:00:31'),
(2, 3, 'mon nom', 'comment', '2018-11-10 23:16:04');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `author`, `content`, `creation_date`) VALUES
(1, 'Mon parcours sur OC', 'Admin', '<p> <strong> OpenClassrooms est une école en ligne qui propose à ses membres des cours certifiant et des parcours débouchant sur un métier d’avenir, réalisé en interne, par des écoles, des universités, ou encore par des entreprises partenaires comme Microsoft ou IBM.</strong> </p>\r\n                  <p>J’ai débuté en janvier 2018 l’aventure avec OpenClassrooms, ce qui a attiré mon attention en premier c’était l’administration qui été a l’écoute, cela m’a permis d’être dirigé vers un mentor adapté a mes attentes.Le mentor est la personne chargée de me suivre pendant ma formation, avec ces conseils et recommandations, j’arrive à avancer dans les projets qui permettent l’obtention de mon diplôme.La communauté d’étudiant est très réactive, sous la surveillance des mentors les échanges sont fluides et chacun avance à son rythme. Les cours sont très bien expliqués, et le format vidéo qui en général ne dépasse pas 10 minutes permet d’assimiler les points importants et de voir en temps réel, les consignes a suivre pour avoir le résultat rechercher. Pour toutes personnes souhaitant effectuer une reconversion professionnelle ou simplement intéresser par une formation flexible, je conseille sans hésitation OpenClassrooms.</p>', '2018-11-10 20:41:45'),
(2, 'Mon avis sur le e-learning', 'Admin', '<p> <strong> L’e-learning est un mode de formation à distance qui s’appuie sur un certain nombre de ressources (Internet, intranet, CD-ROM) et dispensé à partir d’un ordinateur. L’e-learning peut mobiliser un certain nombre d’outils 2.0 (wiki, vidéo, podcast…). Les modules les plus développés permettent une certaine interaction entre apprenants et tuteurs. </strong> </p>\r\n                  <p>Depuis janvier 2018, j’ai commencé la formation Développeur d’application - PHP/Symfony, qui est en cours, cette expérience est très enrichissante, j’ai développer une autonomie dans la prise de mes décisions et la recherche de solutions aux problèmes qui empêche l’aboutissement de mon projet. C’est une opportunité pour toute personne souhaitant ce reconvertir professionnellement ou encore débuté des études dans le domaine de l’informatique et du multimédia, à travers les parcours vous aller adopté des qualités indispensables telles que : l’autonomie, l’organisation, la flexibilité, la curiosité, être entreprenant, l’adaptabilité, et j’en passe ce format de formation, enrichie votre expérience ce qui est un atout incontournable pour votre futur poste.</p>', '2018-11-10 20:41:46'),
(3, 'Mes projet réaliser sur OpenClassrooms', 'Admin', '<p> <strong> OpenClassrooms est une école en ligne qui propose à ses membres des cours certifiant et des parcours débouchant sur un métier d’avenir, réalisé en interne, par des écoles, des universités, ou encore par des entreprises partenaires comme Microsoft ou IBM.</strong> </p>\r\n                  <p>J’ai été amené a réaliser jusqu’à présent 3 projets différents, qui demande chacune des compétences particulières et une grande flexibilité, dans le premier j’ai été amené a créer un site pour une agence de ventes et locations de chalet, qui souhaite permettre a ces clients de consulter les disponibilités et contacter l’agence pour un achat ou réservation. Dans le second j’ai été amené à créer un site pour une association qui souhaite organiser une séance de film en plein air, qui souhaite proumoivoir cet événement et permettre aux visiteurs de se préinscrire, et avoir connaissance des horaires pour la diffusion. Pour le 3 ème projet une jeune startup ExpressFood, qui ambitionne de livrer des plats de qualité à domicile en moins de 20 minutes grâce à un réseau de livreurs à vélo. M’a chargé de créer une base de données pour leurs applications, celle-ci devait contenir : la liste des clients, la liste des différents plats du jour, la liste des commandes passées, la liste des livreurs, avec leur statut (libre, en cours de livraison) et leur position. À travers ces projets, j’ai acquis plusieurs compétences telles que : comprendre un cahier des charges, répondent aux attentes des clients, être flexible.</p>', '2018-11-10 20:41:47'),
(4, '5 sites pour un CV pro', 'Admin', '<p> <strong> Le CV est ta carte de visite professionnelle. Il doit permettre à une entreprise d’avoir une vue d’ensemble de ton profil, de tes principales qualifications et lui donner envie de te rencontrer. C’est ton image de marque, ton argument de « vente ». </strong> </p>\r\n                  <p>Le CV étant une étape indispensable dans l’obtention de votre futur emploi, et ayant passé sur plusieurs sites gratuits a la recherche d’une solution professionnelle, je vous liste ci-dessous 5 sites à voir : \r\n                    <a href=\"https://www.canva.com\">Canva</a>\r\n                    /<a href=\"https://www.cv-en-ligne.org\">CV en ligne</a>\r\n                    /<a href=\"https://www.webself.net\">WebSelf</a>\r\n                    /<a href=\"https://moncvmodele.com \">Mon CV modèles</a>\r\n                    /<a href=\"https://www.cvmaker.fr\">CV Maker</a>\r\n                  </p>', '2018-11-10 20:41:48'),
(5, '8 raisons de choisir Wordpress en tant que CMS', 'Admin', '<p> <strong> WordPress est LE CMS le plus répandu à l’heure actuelle ! Bien que tous les programmeurs ne soient pas forcément partisans de cette plateforme, elle a le mérite d’être extrêmement intuitive et de placer la gestion de contenu web à la portée de tous. WordPress a su se démarquer de ses concurrents (Joomla, Magento, Drupal) par la force de sa communauté et les innombrables thèmes qu’elle propose. </strong> </p>\r\n                  <p>Vous pouvez utiliser WordPress pour tous types de besoins. En effet, WordPress est adapté aussi bien à des sites e-commerce, des blogues ou des sites vitrine. Le seul véritable inconvénient de WordPress est qu’il va demander plus de ressources qu’un site codé en dur, surtout si vous installez de nombreux plugins (programmes permettant de rajouter des fonctionnalités comme un formulaire de contact, un système de chat, la gestion d’une newsletter, des boutons vers vos réseaux sociaux, un système de commentaires, etc.). Voici 8 raisons de choisir Wordpress, en tant que CMS :\r\n                     <ul class=\"list-inline\">\r\n                       <li>Facilité de gestion et d’utilisation</li>\r\n                       <li>Facilité pour le référencement</li>\r\n                       <li>WordPress est totalement personnalisable</li>\r\n 					   <li>Rapidité et fluidité dans la navigation</li>\r\n  					   <li>Une interface adaptée aux mobiles</li>\r\n 					   <li>La simplicité et la faciliter de maitrise</li>\r\n  					   <li>La possibilité du multi-auteur pour un site</li>\r\n  					   <li>Une configuration simple des adresses URL</a></li>\r\n					 </ul></p>', '2018-11-10 20:41:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
