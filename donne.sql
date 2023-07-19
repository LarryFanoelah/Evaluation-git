-- Insérer des données de test dans la table "patient"
INSERT INTO patient (nom, date_naissance, remboursement, idgenre) VALUES
    ('Alice', '1990-05-15', true, 1),
    ('Bob', '1985-09-10', false, 2),
    ('Charlie', '1992-12-03', true, 1),
    ('David', '1988-07-22', true, 2),
    ('Eve', '1995-02-28', false, 1);



insert into typeDepense (nom , "type",budget,code) values ('loyer','mois',1000000.00,'LOY'),('reparation','mois',200000.00,'REP'),('salaire','jour',3990.00,'SAL');
insert into typeRecette (nom , "type",budget,code) values ('consultation','heure',1000000.00,'CONS'),('Medicament','heure',1000000.00,'MED'),('analyse','jour',1000000.00,'ANAL');

INSERT INTO depense (idtypedepense, date_depense, nombre, montant) VALUES
(1, '2023-01-01', 10, 100.00),
(2, '2023-01-02', 5, 50.00),
(1, '2023-01-03', 3, 30.00),
(3, '2023-01-04', 8, 80.00);

-- Générer des données pour la table "facturerecette"
INSERT INTO facturerecette (idpatient, date_facture) VALUES
    (1, '2023-01-01'),
    (2, '2023-01-02'),
    (3, '2023-01-03'),
    (4, '2023-01-04'),
    (5, '2023-01-05');

-- Générer des données pour la table "recette"
INSERT INTO recette (idtyperecette, nombre, idfacturerecette, montant) VALUES
    (1, 3, 1, 50.00),
    (2, 2, 2, 30.00),
    (1, 5, 3, 80.00),
    (3, 1, 4, 20.00),
    (2, 4, 5, 60.00);

