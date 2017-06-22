--------------------DATA BASE--------------------------

--------------------Npm de la base : jeux--------------

/* STRUCTURE DE LA BASE : */

Create table Utilisateur(
	id varchar(5),
	username varchar(20),
	email varchar(20),
	password varchar(20),
	admini boolean,
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
	description varchar(255),
	categorie varchar(5),
	constructeur varchar(5),
	dateSortie date,
	image varchar(255),
	lien varchar(255),
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

create table Image(
	id varchar(5),
	jeu varchar(5),
	nom varchar(50),
	PRIMARY KEY(id),
	FOREIGN KEY(jeu) REFERENCES Jeu(id)
);

/* DONNEES DE TESTS UNITAIRES : */

insert into Utilisateur values('U0001', 'Gimmy', 'gimmy@mail.com', 'gptitu','true');
insert into Utilisateur values('U0002', 'Pao', 'paopao@mail.com', 'gptitu','true');
insert into Utilisateur values('U0003', 'Tiantsoa', 'tiantsoa@mail.com', 'gptitu','true');

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

insert into Jeu values('J0001', 'Overwatch', 'Overwatch est un jeu vidéo de tir en vue subjective en ligne développé et publié par Blizzard Entertainment.', 'CA001', 'CO002', '24-05-2016', 'ow.jpg', 'https://www.youtube.com/watch?v=FqnKB22pOC0', '5.0', '39.99');
insert into Jeu values('J0002', 'Fifa 17', 'FIFA 17 est un jeu vidéo de football développé par EA Canada et édité par Electronic Arts.', 'CA002', 'CO003', '27-09-2016', 'ff17.jpg', 'https://www.youtube.com/watch?v=yYjD78X1d9Q', '4.5', '19.99');
insert into Jeu values('J0003', 'Assassins Creed Syndicate', 'Assassins Creed Syndicate est un jeu vidéo d action-aventure et d infiltration développé par Ubisoft Québec et édité par Ubisoft.', 'CA003', 'CO001', '23-10-2015', 'asscs.jpg', 'https://www.youtube.com/watch?v=WTBbwgsyxvg', '4.0', '39.99');
insert into Jeu values('J0004', 'The Division', 'Tom Clancy’s The Division est un jeu vidéo en ligne à monde ouvert de tir tactique et d action-RPG développé par Ubisoft.', 'CA003', 'CO001', '08-03-2016', 'td.jpg', 'https://www.youtube.com/watch?v=yPq_NVi-TC4', '4.0', '49.99');
insert into Jeu values('J0005', 'Watch Dogs 2', 'Watch Dogs 2, typographié WATCH_DOGS 2, est un jeu vidéo d action-aventure et d infiltration développé par le studio Ubisoft Montréal et édité par Ubisoft.', 'CA008', 'CO001', '29-11-2016', 'wd2.jpg', 'https://www.youtube.com/watch?v=ixDxJ_X1pfo', '4.5', '59.99');
insert into Jeu values('J0006', 'Far Cry Primal', 'Far Cry Primal est un jeu vidéo d action-aventure à la première personne développé par Ubisoft Montréal se déroulant dans un monde ouvert à l Âge de la pierre.', 'CA004', 'CO001', '23-02-2016', 'fcp.jpg', 'https://www.youtube.com/watch?v=LJ2iH57Fs3M', '4.0', '49.99');
insert into Jeu values('J0007', 'Call of Duty: Infinite Warfare', 'Call of Duty: Infinite Warfare est un jeu vidéo de tir à la première personne développé par Infinity Ward et édité par Activision.', 'CA001', 'CO004', '04-11-2016', 'cod.jpg', 'https://www.youtube.com/watch?v=EeF3UTkCoxY', '4.5', '59.99');
insert into Jeu values('J0008', 'Counter-Strike: Global Offensive', 'Counter-Strike: Global Offensive est un jeu de tir à la première personne multijoueur en ligne basé sur le jeu d équipe développé par Valve Corporation.', 'CA001', 'CO008', '21-08-2012', 'csgo.jpg', 'https://www.youtube.com/watch?v=edYCtaNueQY', '4.0', '14.99');
insert into Jeu values('J0009', 'Dota', 'Dota 2 est un jeu vidéo de type arène de bataille en ligne multijoueur développé et édité par Valve Corporation.', 'CA006', 'CO008', '09-07-2013', 'dota.jpg', 'https://www.youtube.com/watch?v=-cSFPIwMEq4', '4.0', '0.00');
insert into Jeu values('J0010', 'NBA 2k17', 'NBA 2K17 est un jeu vidéo de basket-ball dévéloppé par Visual Concepts et édité par 2K Sports.', 'CA002', 'CO013', '20-09-2016', 'nba2k17.jpg', 'https://www.youtube.com/watch?v=cQKDcMxTAfw', '4.5', '59.99');
insert into Jeu values('J0011', 'Titanfall 2', 'Titanfall 2 est un jeu vidéo de tir en vue à la première personne développé par Respawn Entertainment et édité par Electronic Arts.', 'CA001', 'CO003', '28-10-2016', 'tf2.jpg', 'https://www.youtube.com/watch?v=EXwdWuSuiYA', '4.0', '39.99');
insert into Jeu values('J0012', 'Dirt 4', 'Dirt 4 est un jeu vidéo de course de rallye automobile et il est le quatrième de la série DiRT développé et publié par Codemasters.', 'CA009', 'CO011', '09-06-2017', 'dirt4.jpg', 'https://www.youtube.com/watch?v=uPGxOIXSAG4', '4.5', '59.99');
insert into Jeu values('J0013', 'Outlast 2', 'Outlast 2 est un jeu vidéo de survival horror en vue à la première personne développé et édité par Red Barrels.', 'CA005', 'CO001', '25-04-2017', 'ol2.jpg', 'https://www.youtube.com/watch?v=EOrTuPljfPU', '4.0', '29.99');
insert into Jeu values('J0014', 'Battlefield 1', 'Battlefield 1 est un jeu vidéo de tir à la première personne développé par DICE.', 'CA001', 'CO005', '21-10-2016', 'bf1.jpg', 'https://www.youtube.com/watch?v=O3zza3ofZ0Q', '4.0', '23.99');
insert into Jeu values('J0015', 'Mirrors Edge Catalyst', 'Mirrors Edge Catalyst est un jeu vidéo développé par DICE et édité par Electronic Arts.', 'CA003', 'CO005', '09-06-2016', 'mec.jpg', 'https://www.youtube.com/watch?v=r6GQEtUREWY', '3.5', '12.99');
insert into Jeu values('J0016', 'Grand Theft Auto V', 'Grand Theft Auto V est un jeu vidéo d action-aventure édité Rockstar Games', 'CA004', 'CO010', '17-09-2013', 'gta5.jpg', 'https://www.youtube.com/watch?v=QkkoHAzjnUs', '4.0', '59.99');
insert into Jeu values('J0017', 'Tekken 7', 'Tekken 7 est un jeu vidéo de combat de la série Tekken développé et édité par Bandai Namco Games.', 'CA010', 'CO007', '02-06-2017', 't7.jpg', 'https://www.youtube.com/watch?v=uEnz36xOSs4', '4.5', '49.99');
insert into Jeu values('J0018', 'NieR Automata', 'Nier: Automata est un jeu vidéo de type action-RPG édité par Square Enix.', 'CA007', 'CO006', '23-02-2017', 'na.jpg', 'https://www.youtube.com/watch?v=VtakOsHZPDE', '5.0', '59.99');
insert into Jeu values('J0019', 'Final Fantasy XIV', 'Final Fantasy XIV : A Realm Reborn est un jeu de rôle en ligne massivement multijoueur sur PC développé par Square Enix', 'CA011', 'CO006', '27-08-2013', 'ff14.jpg', 'https://www.youtube.com/watch?v=39j5v8jlndM', '4.0', '19.99');
insert into Jeu values('J0020', 'Rise of the Tomb Raider', 'Rise of the Tomb Raider est un jeu vidéo d action-aventure de Square Enix', 'CA004', 'CO006', '13-11-2015', 'rottr.jpg', 'https://www.youtube.com/watch?v=WZhb8ZipUyc', '5.0', '59.99');

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

insert into Image values('IM001' , 'J0001', '');

/* Sequences ;  */

create Sequence seqUtilisateur START 4;
create Sequence seqJeu START 21;
create Sequence seqConstructeur START 14;
create Sequence seqCom START 7;
create Sequence seqCategorie START 12;
create Sequence seqAchat START 7;