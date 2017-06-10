--------------------DATA BASE--------------------------

--------------------NOm de la base : jeux--------------


Create table Utilisateur(
	id varchar(5),
	username varchar(20),
	email varchar(20),
	password varchar(20),
	PRIMARY KEY(id)
);

insert into Utilisateur values('U0001', 'Gimmy', 'gimmy@mail.com', 'gptitu');
insert into Utilisateur values('U0002', 'Pao', 'paopao@mail.com', 'gptitu');
insert into Utilisateur values('U0003', 'Tiantsoa', 'tiantsoa@mail.com', 'gptitu');

Create table Constructeur(
	id varchar(5),
	nom varchar(20),
	PRIMARY KEY(id)
);

insert into Constructeur values('CO001', 'Ubisoft');
insert into Constructeur values('CO002', 'Blizzard');
insert into Constructeur values('CO003', 'EA');

Create table Categorie(
	id varchar(5),
	categorie varchar(20),
	PRIMARY KEY(id)
);

insert into Categorie values('CA001', 'FPS');
insert into Categorie values('CA002', 'Sport');
insert into Categorie values('CA003', 'Action');

Create table Jeu(
	id varchar(5),
	nom varchar(50),
	categorie varchar(5),
	constructeur varchar(5),
	dateSortie date,
	image varchar(255),
	prix numeric(10, 2),
	PRIMARY KEY(id),
	FOREIGN KEY(constructeur) REFERENCES Constructeur(id),
	FOREIGN KEY(categorie) REFERENCES Categorie(id)
);

insert into Jeu values('J0001', 'Overwatch', 'CA001', 'CO002', '24-05-2016', 'ow.jpg', '39.99');
insert into Jeu values('J0002', 'Fifa 17', 'CA002', 'CO003', '27-09-2016', 'ff17.jpg', '19.99');
insert into Jeu values('J0003', 'Assassins Creed Syndicate', 'CA003', 'CO001', '23-10-2015', 'asscs.jpg', '39.99');

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

insert into Commentaire values('CM001', 'U0001', 'J0002', '12-12-2016', 'Nice game');
insert into Commentaire values('CM002', 'U0003', 'J0003', '11-01-2017', 'Super, jadore');
insert into Commentaire values('CM003', 'U0002', 'J0001', '02-02-2017', 'Je suis satisfait');

Create table Note(
	id varchar(5),
	jeu varchar(5),
	note numeric(2, 1),
	PRIMARY KEY(id),
	FOREIGN KEY(jeu) REFERENCES Jeu(id)
);

insert into Note values('N0001', 'J0002', '4');
insert into Note values('N0002', 'J0001', '5');
insert into Note values('N0003', 'J0003', '4.5');

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

insert into Achat values('A0001', 'U0001', 'J0002', '10-12-2016', '19.99');
insert into Achat values('A0002', 'U0003', 'J0003', '08-01-2017', '39.99');
insert into Achat values('A0003', 'U0001', 'J0002', '02-02-2017', '39.99');