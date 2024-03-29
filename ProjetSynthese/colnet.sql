create database colnet;

use colnet;

create table utilisateurs(
	id int Unsigned auto_increment  Not null primary key,
    nomComplet varchar(30) not null,
    username varchar(30) not null,
    codePostal varchar(7) not null,
    email varchar(50) not null,
    motDePasse varchar(30) not null
);

create table groupe(
	code varchar(7) primary key,
    nom varchar(50) not null,
    type varchar(30) not null
);

create table etudiant(
    codePermanent varchar(10) primary key,
    nomComplet varchar(30) not null,
    adresse varchar(50) not null,
    telephone varchar(12) not null,
    moyenne double not null, 
    codeGroupe varchar(7) not null,
    foreign key (codeGroupe)
    references groupe(code)
);

insert into groupe values
    ('WEBA21L', 'Techniques de développement web A21', 'En ligne'),
    ('WEBA21C', 'Techniques de développement web A21', 'En classe'),
    ('WEBA21H', 'Techniques de développement web A21', 'Hybride');


insert into etudiant values
    ('PRAS261188', 'Samuel Pratte', '1400 Rue Hart', '514-431-3975', 18.75, 'WEBA21L'),
    ('BERK110998', 'Kim Bergeron', '1300 Rue des Ursulines', '418-332-3985', 17.75, 'WEBA21L'),
    ('HEWD231298', 'Danny Hewitt', '22 Rue des Forges', '514-222-3475', 20, 'WEBA21L'),
    ('DUFS230192', 'Simon Dufour', '15 Avenue de la Liberté', '514-998-1265', 8.5, 'WEBA21L'),
    ('SAVA091193', 'Alain Savoie', '20 Rue Simonne-Monet-Chartrand', '438-499-9987', 13, 'WEBA21C'),
    ('PERG080294', 'Gilles Perrond', '20 Rue Saint-Denis', '438-599-7787', 12.25, 'WEBA21C'),
    ('CREF031192', 'Francis Crevier', '22 Rue Sherbrooke', '514-479-5582', 7, 'WEBA21C'),
    ('BOUM091193', 'Mélanie Boutin', '1400 Rue Sherbrooke', '438-500-1265', 20, 'WEBA21C'),
    ('TURS091193', 'Simon Turmel', '1200 Rue Papineau', '418-399-1187', 19.5, 'WEBA21H'),
    ('FREJ221192', 'Johanne Frechette', '1300 Rue Labrecques', '418-122-4423', 8.25, 'WEBA21H'),
    ('BERS031293', 'Sonia Bergeron', '500 Rue Saint-Jean', '418-999-1133', 18.5, 'WEBA21H'),
    ('LAMA041190', 'Alain Lamelin', '1800 Rue des Sentinelles', '418-554-1255', 11.5, 'WEBA21H');