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