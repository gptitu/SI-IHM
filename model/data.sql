--------------------DATA BASE--------------------------

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
	prix numeric(10, 2),
	PRIMARY KEY(id),
	FOREIGN KEY(constructeur) REFERENCES Constructeur(id),
	FOREIGN KEY(categorie) REFERENCES Categorie(id)
);

Create table Commentaire(
	id varchar(5),
	jeu varchar(5),
	dateCom date,
	commentaire varchar(200),
	PRIMARY KEY(id),
	FOREIGN KEY(jeu) REFERENCES Jeu(id)
);

Create table Note(
	id varchar(5),
	jeu varchar(5),
	note numeric(2, 0),
	PRIMARY KEY(id),
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