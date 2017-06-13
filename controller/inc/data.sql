--------------------DATA BASE--------------------------

--------------------Npm de la base : jeux--------------

/* STRUCTURE DE LA BASE : */

Create table Utilisateur(
	id varchar(5),
	username varchar(20),
	email varchar(20),
	password varchar(20),
	PRIMARY KEY(id)
);

Create table Constructeur(
	id varchar(5),
	nom varchar(20),
	PRIMARY KEY(id)
);

Create table Categorie(
	id varchar(5),
	categorie varchar(20),
	PRIMARY KEY(id)
);

Create table Jeu(
	id varchar(5),
	nom varchar(50),
	categorie varchar(5),
	constructeur varchar(5),
	dateSortie date,
	image varchar(255),
	note numeric(2, 1),
	prix numeric(10, 2),
	PRIMARY KEY(id),
	FOREIGN KEY(constructeur) REFERENCES Constructeur(id),
	FOREIGN KEY(categorie) REFERENCES Categorie(id)
);

Create table Commentaire(
	id varchar(5),
	utilisateur varchar(5),
	jeu varchar(5),
	dateCom date,
	commentaire varchar(200),
	PRIMARY KEY(id),
	FOREIGN KEY(utilisateur) REFERENCES Utilisateur(id),
	FOREIGN KEY(jeu) REFERENCES Jeu(id)
);

Create table Achat(
	id varchar(5),
	utilisateur varchar(5),
	jeu varchar(5),
	datePayement date,
	pu numeric(10,2),
	PRIMARY KEY(id),
	FOREIGN KEY(utilisateur) REFERENCES Utilisateur(id),
	FOREIGN KEY(jeu) REFERENCES Jeu(id)
);


/* DONNEES DE TESTS UNITAIRES : */

insert into Utilisateur values('U0001', 'Gimmy', 'gimmy@mail.com', 'gptitu');
insert into Utilisateur values('U0002', 'Pao', 'paopao@mail.com', 'gptitu');
insert into Utilisateur values('U0003', 'Tiantsoa', 'tiantsoa@mail.com', 'gptitu');

insert into Constructeur values('CO001', 'Ubisoft');
insert into Constructeur values('CO002', 'Blizzard');
insert into Constructeur values('CO003', 'Electronic Arts');
insert into Constructeur values('CO004', 'Activision');
insert into Constructeur values('CO005', 'DICE');
insert into Constructeur values('CO006', 'Square Enix');
insert into Constructeur values('CO007', 'Namco Bandai');
insert into Constructeur values('CO008', 'Valve');
insert into Constructeur values('CO009', 'Konami');
insert into Constructeur values('CO010', 'Rockstar Games');
insert into Constructeur values('CO011', 'Codemasters');
insert into Constructeur values('CO012', 'Red Barrels');
insert into Constructeur values('CO013', '2K Sports');

insert into Categorie values('CA001', 'FPS');
insert into Categorie values('CA002', 'Sport');
insert into Categorie values('CA003', 'Action');
insert into Categorie values('CA004', 'Aventure');
insert into Categorie values('CA005', 'Survival Horror');
insert into Categorie values('CA006', 'MOBA');
insert into Categorie values('CA007', 'Beat Them all');
insert into Categorie values('CA008', 'Infiltration');
insert into Categorie values('CA009', 'Course');
insert into Categorie values('CA010', 'Combat');
insert into Categorie values('CA011', 'MMORPG');

insert into Jeu values('J0001', 'Overwatch', 'CA001', 'CO002', '24-05-2016', 'ow.jpg', '5.0', '39.99');
insert into Jeu values('J0002', 'Fifa 17', 'CA002', 'CO003', '27-09-2016', 'ff17.jpg', '4.5', '19.99');
insert into Jeu values('J0003', 'Assassins Creed Syndicate', 'CA003', 'CO001', '23-10-2015', 'asscs.jpg', '4.0', '39.99');
insert into Jeu values('J0004', 'The Division', 'CA003', 'CO001', '08-03-2016', 'td.jpg', '4.0', '49.99');
insert into Jeu values('J0005', 'Watch Dogs 2', 'CA008', 'CO001', '29-11-2016', 'wd2.jpg', '4.5', '59.99');
insert into Jeu values('J0006', 'Far Cry Primal', 'CA004', 'CO001', '23-02-2016', 'fcp.jpg', '4.0', '49.99');
insert into Jeu values('J0007', 'Call of Duty: Infinite Warfare', 'CA001', 'CO004', '04-11-2016', 'cod.jpg', '4.5', '59.99');
insert into Jeu values('J0008', 'Counter-Strike: Global Offensive', 'CA001', 'CO008', '21-08-2012', 'csgo.jpg', '4.0', '14.99');
insert into Jeu values('J0009', 'Dota', 'CA006', 'CO008', '09-07-2013', 'dota.jpg', '4.0', '0.00');
insert into Jeu values('J0010', 'NBA 2k17', 'CA002', 'CO013', '20-09-2016', 'nba2k17.jpg', '4.5', '59.99');
insert into Jeu values('J0011', 'Titanfall 2', 'CA001', 'CO003', '28-10-2016', 'tf2.jpg', '4.0', '39.99');
insert into Jeu values('J0012', 'Dirt 4', 'CA009', 'CO011', '09-06-2017', 'dirt4.jpg', '4.5', '59.99');
insert into Jeu values('J0013', 'Outlast 2', 'CA005', 'CO001', '25-04-2017', 'ol2.jpg', '4.0', '29.99');
insert into Jeu values('J0014', 'Battlefield 1', 'CA001', 'CO005', '21-10-2016', 'bf1.jpg', '4.0', '23.99');
insert into Jeu values('J0015', 'Mirrors Edge Catalyst', 'CA003', 'CO005', '09-06-2016', 'mec.jpg', '3.5', '12.99');
insert into Jeu values('J0016', 'Grand Theft Auto V', 'CA004', 'CO010', '17-09-2013', 'gta5.jpg', '4.0', '59.99');
insert into Jeu values('J0017', 'Tekken 7', 'CA010', 'CO007', '02-06-2017', 't7.jpg', '4.5', '49.99');
insert into Jeu values('J0018', 'NieR Automata', 'CA007', 'CO006', '23-02-2017', 'na.jpg', '5.0', '59.99');
insert into Jeu values('J0019', 'Final Fantasy XIV', 'CA011', 'CO006', '27-08-2013', 'ff14.jpg', '4.0', '19.99');
insert into Jeu values('J0020', 'Rise of the Tomb Raider', 'CA004', 'CO006', '13-11-2015', 'rottr.jpg', '5.0', '59.99');

insert into Commentaire values('CM001', 'U0001', 'J0002', '12-12-2016', 'Nice game');
insert into Commentaire values('CM002', 'U0003', 'J0003', '11-01-2017', 'Super, jadore');
insert into Commentaire values('CM003', 'U0002', 'J0001', '02-02-2017', 'Je suis satisfait');
insert into Commentaire values('CM004', 'U0003', 'J0012', '02-02-2017', 'Trop Chere xD');
insert into Commentaire values('CM005', 'U0002', 'J0007', '02-02-2017', 'Il est pas mal');
insert into Commentaire values('CM006', 'U0002', 'J0020', '02-02-2017', 'GG WP');

insert into Achat values('A0001', 'U0001', 'J0002', '10-12-2016', '19.99');
insert into Achat values('A0002', 'U0003', 'J0003', '08-01-2017', '39.99');
insert into Achat values('A0003', 'U0001', 'J0002', '02-02-2017', '39.99');
insert into Achat values('A0004', 'U0002', 'J0005', '05-05-2017', '59.99');
insert into Achat values('A0005', 'U0003', 'J0010', '10-06-2017', '59.99');
insert into Achat values('A0006', 'U0002', 'J0018', '22-02-2017', '59.99');