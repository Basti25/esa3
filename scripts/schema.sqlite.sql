-- scripts/schema.sqlite.sql
--
-- You will need load your database schema with this SQL.

CREATE TABLE guestbook (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    email VARCHAR(32) NOT NULL DEFAULT 'noemail@test.com',
    comment TEXT NULL,
    created DATETIME NOT NULL
);

CREATE INDEX "id" ON "guestbook" ("id");


CREATE TABLE blog (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    title VARCHAR(255) NULL DEFAULT 'Bitte Titel eintragen!',
    text TEXT NULL DEFAULT 'Bitte Text eintragen!',
    created DATETIME NOT NULL
);


CREATE TABLE Internetquelle (
    idInternetquelle INTEGER UNIQUE NOT NULL PRIMARY KEY AUTOINCREMENT,
    Titel VARCHAR(255) NOT NULL,
    URL VARCHAR(255) NOT NULL
);


CREATE TABLE Literatur (
    idLiteratur INTEGER UNIQUE NOT NULL PRIMARY KEY AUTOINCREMENT,
    Verfasser VARCHAR(255) NOT NULL,
    Beitragstitel VARCHAR(255) NOT NULL,
    Buchtitel VARCHAR(255) NOT NULL,
    Herausgeber VARCHAR(255) NOT NULL,
    Verlag VARCHAR(255) NOT NULL,
    Erscheinungsort VARCHAR(255) NOT NULL,
    Erscheinungsjahr INTEGER NOT NULL
);

CREATE TABLE Modul (
  idModul INTEGER UNIQUE NOT NULL PRIMARY KEY AUTOINCREMENT,
  Bezeichnung varchar(255) NOT NULL,
  Kurzbeschreibung TEXT NOT NULL,
  Semester INTEGER NOT NULL,
  Dozent VARCHAR(255) NOT NULL
);

CREATE TABLE Modul_Literatur (
  id INTEGER UNIQUE NOT NULL PRIMARY KEY AUTOINCREMENT,
  idModul INTEGER NOT NULL,
  idLiteratur INTEGER NOT NULL
);

CREATE TABLE Studienarbeit (
  idStudienarbeit INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  Gruppenmitglieder varchar(255) NOT NULL,
  Titel varchar(255) NOT NULL,
  idModul INTEGER NOT NULL
);

CREATE TABLE Studienarbeit_Internetquelle (
  id INTEGER UNIQUE NOT NULL PRIMARY KEY AUTOINCREMENT,
  idStudienarbeit INTEGER NOT NULL,
  idInternetquelle INTEGER NOT NULL
);

CREATE TABLE Studienarbeit_Literatur (
  id INTEGER UNIQUE NOT NULL PRIMARY KEY AUTOINCREMENT,
  idStudienarbeit INTEGER NOT NULL,
  idLiteratur INTEGER NOT NULL
);

CREATE TABLE login (
  email varchar(255) UNIQUE NOT NULL PRIMARY KEY,
  password varchar(255) NOT NULL,
  firstname varchar(255) NOT NULL,
  lastname varchar(255) NOT NULL
)