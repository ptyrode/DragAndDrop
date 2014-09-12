DROP TABLE IF EXISTS contient;
DROP TABLE IF EXISTS commande;
DROP TABLE IF EXISTS produit;
DROP TABLE IF EXISTS categorie;
DROP TABLE IF EXISTS utilisateur;
	
CREATE TABLE utilisateur(
	id_utilisateur INT NOT NULL AUTO_INCREMENT,
	nom VARCHAR(250),
	email VARCHAR(250),
	mdp VARCHAR(250),
	statut ENUM('0','1'),
	PRIMARY KEY (id_utilisateur));

CREATE TABLE categorie(
	id_categorie INT NOT NULL AUTO_INCREMENT,
	libelle_categorie VARCHAR(250),
	mini_categorie VARCHAR(250),
	PRIMARY KEY (id_categorie));
	
CREATE TABLE produit(
	id_produit INT NOT NULL AUTO_INCREMENT,
	libelle_produit VARCHAR(250),
	id_categorie INT NOT NULL,
	image VARCHAR(250),
	prix FLOAT,
	PRIMARY KEY (id_produit),
	FOREIGN KEY (id_categorie) references categorie(id_categorie));

CREATE TABLE commande(
	id_commande INT NOT NULL AUTO_INCREMENT,
	id_utilisateur INT NOT NULL,
	valide ENUM('0','1'),
	PRIMARY KEY (id_commande),
	FOREIGN KEY (id_utilisateur) references utilisateur(id_utilisateur));

CREATE TABLE contient(
	id_commande INT NOT NULL,
	id_produit INT NOT NULL,
	FOREIGN KEY (id_commande) references commande(id_commande),
	FOREIGN KEY (id_produit) references produit(id_produit));

INSERT INTO utilisateur VALUES
(null, 'Pierrick', 'pierrick.tyrode@gmail.com', 'dac0b7162f804b82429712476b6f7d9f', '1'),
(null, 'Michel', 'michel@gmail.com', '1354c5c626dfe462f9f18b9352d93c8f', '0'),
(null, 'Roger', 'roger@gmail.com', '1494c5e663559353b12c68b0f62289e8', '0');

INSERT INTO categorie VALUES
(null, 'Ballons', 'ballons'),
(null, 'Fruits' , 'fruits'),
(null, 'Véhicules', 'vehicules'),
(null, 'Apple', 'apple');

INSERT INTO produit VALUES
(null, 'Baseball', 1, 'ballons/baseball.png', 4.95),
(null, 'Basketball', 1, 'ballons/basketball.png', 6.60),
(null, 'Football', 1, 'ballons/football.png', 12.8),
(null, 'Golf', 1, 'ballons/golf.png', 1.02),
(null, 'Soccer', 1, 'ballons/soccer.png', 5.99),
(null, 'Tennis', 1, 'ballons/tennis.png', 8.90),
(null, 'Volleyball', 1, 'ballons/volleyball.png', 9.10);

INSERT INTO produit VALUES
(null, 'Ananas', 2, 'fruits/ananas.png', 1.99),
(null, 'Banane', 2, 'fruits/banane.png', 0.90),
(null, 'Fraise', 2, 'fruits/fraise.png', 2.05),
(null, 'Orange', 2, 'fruits/orange.png', 1.54),
(null, 'Papaye', 2, 'fruits/papaye.png', 1.89),
(null, 'Pasteque', 2, 'fruits/pasteque.png', 0.99),
(null, 'Pomme', 2, 'fruits/pomme.png', 1.06),
(null, 'Raisin', 2, 'fruits/raisin.png', 1.53);

INSERT INTO produit VALUES
(null, 'Cabriolet', 3, 'vehicules/cabriolet.png', 23.87),
(null, 'Camion', 3, 'vehicules/camion.png', 34.03),
(null, 'Pelleteuse', 3, 'vehicules/pelleteuse.png', 23.50),
(null, 'Pickup', 3, 'vehicules/pickup.png', 19.99),
(null, 'Police', 3, 'vehicules/police.png', 15.65),
(null, 'Pompiers', 3, 'vehicules/pompiers.png', 32.04),
(null, 'Poubelles', 3, 'vehicules/poubelles.png', 21.01),
(null, 'Quad', 3, 'vehicules/quad.png', 6.89);

INSERT INTO produit VALUES
(null, 'iMac', 4, 'apple/imac.png', 2000),
(null, 'iPhone', 4, 'apple/iphone.png', 700),
(null, 'iPod', 4, 'apple/ipod.png', 350),
(null, 'Macbook', 4, 'apple/macbook.png', 1500),
(null, 'Macpro', 4, 'apple/macpro.png', 2500),
(null, 'Macmini', 4, 'apple/macmini.png', 1200);

INSERT INTO commande VALUES
(null, 2, '0'),
(null, 2, '1'),
(null, 3, '0'),
(null, 2, '1'),
(null, 3, '1'),
(null, 2, '0'),
(null, 3, '1'),
(null, 3, '0');