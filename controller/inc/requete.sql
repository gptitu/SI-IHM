/* REQUETES : */

SELECT jeu.* FROM Jeu jeu
ORDER BY jeu.note DESC
LIMIT 1;

SELECT jeu, COUNT(*) as nb
FROM Achat GROUP BY jeu
ORDER BY nb DESC
LIMIT 3;

SELECT jeu.* FROM Jeu jeu
ORDER BY jeu.dateSortie DESC
LIMIT 3;

SELECT jeu.* FROM Jeu jeu
WHERE categorie='' AND nom LIKE '%%';

SELECT achat.* FROM Achat achat, Jeu jeu
WHERE achat.jeu=jeu.id AND jeu.nom LIKE '%%';

SELECT date_part('month', now()) FROM Achat;

SELECT SUM(pu) as montant FROM Achat
WHERE date_part('month', datePayement)=date_part('month', now());

SELECT COUNT(id) as nb FROM Achat
WHERE date_part('month', datePayement)=date_part('month', now());

SELECT jeu.* FROM Jeu jeu
WHERE date_part('month', datePayement)=date_part('month', now())
ORDER 