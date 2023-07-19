-- create database clinique;
-- create role clinique login password 'clinique';
-- alter database clinique owner to clinique;

-- drop view vue_bord_benefice;
-- drop view vue_benefice;
-- drop view vue_bord_depense;
-- drop view vue_bord_recette;
-- drop view v_date_recette;
-- drop view v_date_depense;
-- drop view vue_recettes;
-- drop view vue_facture_patient;
-- drop view v_depenses;
-- drop view v_patient_genre;
-- drop table recette;
-- drop table facturerecette;
-- drop table depense;
-- drop table typeRecette;
-- drop table typeDepense;
-- drop table patient;
-- drop table genre;
-- drop table utilisateur;
-- drop table administrateur;




create table administrateur (
    idadministrateur serial primary key not null,
    email varchar ,
    mdp varchar
);

insert into administrateur(email,mdp) values ('admin@gmail.com','admin');

create table utilisateur(
    idutilisateur serial primary key not null,
    email varchar,
    mdp varchar
);
insert into utilisateur(email,mdp)values ('larry@gmail.com','larry');

create table genre (
    idgenre serial primary key not null,
    sexe varchar
);
insert into genre(sexe) values ('feminin'),('masculin');


create table patient(
    idpatient serial primary key not null,
    nom varchar not null,
    date_naissance date not null ,
    remboursement boolean not null,
    idgenre int references genre(idgenre) not null
);

create table typeDepense(
    idtypedepense serial primary key not null,
    nom varchar not null,
    "type" varchar not null,
     budget  Decimal(15,2) default 0 check (budget>=0),
     code varchar not null

);

create table typeRecette (
    idtyperecette serial primary key not null,
    nom varchar not null,
    "type" varchar not null,
    budget Decimal(15,2) default 0 check(budget>=0),
    code varchar not null
);


create table depense (
    iddepense serial primary key not null,
    idtypedepense int references typeDepense (idtypedepense) not null,
    date_depense date not null,
    nombre int default 1,
    montant Decimal(15,2) default 0 check (montant>=0)
);

create table facturerecette(
    idfacturerecette serial primary key not null,
    idpatient int references patient (idpatient) not null,
    date_facture date not null
);

create table recette (
    idrecette serial primary key not null,
    idtyperecette int references typeRecette (idtyperecette) not null,
    nombre int default 1,
    idfacturerecette int references facturerecette(idfacturerecette) not null,
    montant Decimal(15,2) default 0 check (montant>=0)
);


--view entre genre et patient , pour afficher la liste des patients (1)
CREATE VIEW v_patient_genre AS
SELECT patient.idpatient, patient.nom, patient.date_naissance, patient.remboursement,genre.sexe
FROM patient
JOIN genre ON patient.idgenre = genre.idgenre;

--view entre type depense et depense
CREATE or replace VIEW v_depenses AS
SELECT d.iddepense,td.nom AS nom_typedepense, td."type",td.budget as budget,td.code,
d.date_depense,
d.nombre,
d.montant,
td.idtypedepense,
(d.nombre * d.montant) as montant_total
FROM typeDepense td
JOIN depense d ON td.idtypedepense = d.idtypedepense;


--view entre facture et patient
CREATE VIEW vue_facture_patient AS
SELECT fr.idfacturerecette, fr.date_facture,
       p.idpatient, p.nom, p.date_naissance, p.remboursement, p.idgenre
FROM facturerecette fr
JOIN patient p ON fr.idpatient = p.idpatient;


--view entre type recette et recette , facture , patient et genre
CREATE VIEW vue_recettes AS
SELECT   r.idrecette,fr.idfacturerecette, fr.date_facture,
         r.nombre, r.montant,(r.nombre* r.montant) as montant_total,p.nom as nom_patient,
         tr.nom AS nom_typerecette, tr."type" AS type_recette,r.idtyperecette,tr.code,tr.budget as budget
FROM facturerecette fr
JOIN recette r ON fr.idfacturerecette = r.idfacturerecette
JOIN typeRecette tr ON r.idtyperecette = tr.idtyperecette
JOIN patient p ON fr.idpatient = p.idpatient
JOIN genre g ON p.idgenre = g.idgenre;


-- view pour afficher les mois dans depense
create or replace view v_date_depense as
select
    extract(year from date_depense)as annee,
    extract(month from date_depense)as mois,
    td.idtypedepense,
    td.nom,
    round(td.budget/12,2) as budget
from depense d
cross join typeDepense td
group by annee,mois,td.idtypedepense;

-- view pour afficher les mois dans recette
create or replace view v_date_recette as
select
    extract(year from date_facture)as annee,
    extract(month from date_facture)as mois,
    tr.idtyperecette,
    tr.nom,
    round(tr.budget/12,2) as budget
from vue_recettes vr
cross join typeRecette tr
group by annee,mois,tr.idtyperecette;


-- vue tableau de bord recette ,vue entre vuerecettes et v_date_recette
create or replace view vue_bord_recette as
select
    vdr.annee,
    vdr.mois,
    vdr.idtyperecette,
    vdr.nom,
    coalesce(sum(montant_total),0) as reel,
    vdr.budget,
    coalesce(round(sum(montant_total)*100/vdr.budget,0),0) as realisation
from v_date_recette as vdr left join vue_recettes as vr
on vdr.idtyperecette=vr.idtyperecette
    and vdr.annee=extract(year from date_facture)
    and vdr.mois=extract(month from date_facture)
group by vdr.annee,vdr.mois,vdr.idtyperecette,vdr.nom,vdr.budget;

--vue tableau de bord depense, vue entre v_depenses et v_date_depense
create or replace view vue_bord_depense as
select
    vdd.annee,
    vdd.mois,
    vdd.idtypedepense,
    vdd.nom,
    coalesce(sum(montant_total),0) as reel,
    vdd.budget,
    coalesce(round(sum(montant_total)*100/vdd.budget,0),0) as realisation
from v_date_depense as vdd left join v_depenses as vd
on vdd.idtypedepense=vd.idtypedepense
    and vdd.annee=extract(year from date_depense)
    and vdd.mois=extract(month from date_depense)
group by vdd.annee,vdd.mois,vdd.idtypedepense,vdd.nom,vdd.budget;

-- vue tableau de bord benefice tsy mitambatra
create or replace view vue_benefice as
select mois,annee,sum(reel) as recette,(select sum(budget) from v_date_recette group by mois,annee limit 1) as budget_recette,0 as depense,(select sum(budget) from v_date_depense group by mois,annee limit 1) as budget_depense,round(sum(reel)*100/sum(budget),0) as realisation_recette,0 as realisation_depense
from vue_bord_recette
group by mois,annee
union
select mois,annee,0 as recette,(select sum(budget) from v_date_recette group by mois,annee limit 1) as budget_recette,sum(reel) as depense,(select sum(budget) from v_date_depense group by mois,annee limit 1) as budget_depense,0 as realisation_recette,round(sum(reel)*100/sum(budget),0) as realisation_depense
from vue_bord_depense
group by mois,annee;

-- vue tableau de bord benefice final
create or replace view vue_bord_benefice as
select mois,annee,sum(recette) recette,budget_recette,sum(depense) depense, budget_depense,sum(realisation_recette) realisation_recette,sum(realisation_depense) realisation_depense
from vue_benefice
group by mois,annee,budget_recette,budget_depense;



