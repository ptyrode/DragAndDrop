DROP TABLE IF EXISTS contient;
DROP TABLE IF EXISTS commande;
DROP TABLE IF EXISTS relais;
DROP TABLE IF EXISTS produit;
DROP TABLE IF EXISTS categorie;
DROP TABLE IF EXISTS adresse;
DROP TABLE IF EXISTS utilisateur;
	
CREATE TABLE utilisateur(
	id_utilisateur INT NOT NULL AUTO_INCREMENT,
	nom VARCHAR(250),
	email VARCHAR(250),
	mdp VARCHAR(250),
	statut ENUM('0', '1'),
	PRIMARY KEY (id_utilisateur));
	
CREATE TABLE adresse(
	id_adresse INT NOT NULL AUTO_INCREMENT,
	nom_adresse VARCHAR(250),
	prenom_adresse VARCHAR(250),
	rue_adresse VARCHAR(250),
	code_adresse VARCHAR(250),
	ville_adresse VARCHAR(250),
	tel_adresse VARCHAR(250),
	etat ENUM('0', '1', '2'),
	id_utilisateur INT NOT NULL,
	PRIMARY KEY (id_adresse),
	FOREIGN KEY (id_utilisateur) references utilisateur(id_utilisateur));

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
	
CREATE TABLE relais(
	id_relais INT NOT NULL AUTO_INCREMENT,
	libelle_relais VARCHAR(250),
	latitude VARCHAR(250),
	longitude VARCHAR(250),
	PRIMARY KEY (id_relais));

CREATE TABLE commande(
	id_commande INT NOT NULL AUTO_INCREMENT,
	id_utilisateur INT NOT NULL,
	total FLOAT,
	valide ENUM('0', '1'),
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

INSERT INTO adresse VALUES
(null, 'Tyrode', 'Pierrick', '27 rue du moulin', '25520', 'Ouhans', '0381699270', '0', 2),
(null, 'Tyrode', 'Pierrick', '27 rue du moulin', '25520', 'Ouhans', '0381699270', '1', 2),
(null, 'Tyrode', 'Pierrick', '27 rue du moulin', '25520', 'Ouhans', '0381699270', '2', 2);

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

INSERT INTO relais VALUES
(null, 'Restaurant l\'Oignon', '48.581430', '7.741366'),
(null, 'Le Pont Tournant', '48.580550', '7.742021'),
(null, 'Régent Petite France', '48.580792', '7.742225'),
(null, 'La Corde A Linge', '48.581530', '7.741849'),
(null, 'La Petite France', '48.581452', '7.741726'),
(null, 'Restaurant Le Madras', '48.581253', '7.742938');

INSERT INTO commande VALUES
(null, 2, 467, '0'),
(null, 2, 879, '1'),
(null, 3, 987, '0'),
(null, 2, 343, '1'),
(null, 3, 123, '1'),
(null, 2, 109, '0'),
(null, 3, 678, '1'),
(null, 3, 432, '0');