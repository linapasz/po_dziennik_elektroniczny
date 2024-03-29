-- Generated by Oracle SQL Developer Data Modeler 21.4.1.349.1605
--   at:        2022-01-16 16:43:32 CET
--   site:      Oracle Database 11g
--   type:      Oracle Database 11g



-- predefined type, no DDL - MDSYS.SDO_GEOMETRY

-- predefined type, no DDL - XMLTYPE

CREATE DATABASE edziennik;
USE edziennik;

CREATE TABLE klasa (
    idklasy      CHAR(10) NOT NULL,
    nazwaklasy   CHAR(3),
    wychowawcaid CHAR(10)
);

ALTER TABLE klasa ADD CONSTRAINT klasa_pk PRIMARY KEY ( idklasy );

CREATE TABLE lekcje (
    idlekcji                INTEGER NOT NULL AUTO_INCREMENT,
    datalekcji              DATETIME,
    przedmioty_idprzedmiotu CHAR (15) NOT NULL,
PRIMARY KEY ( idlekcji )
);



CREATE TABLE obecnosci (
    idobecnosci                INTEGER NOT NULL AUTO_INCREMENT,
    lekcje_idlekcji            INTEGER,
    uczniowie_uzytkownicy_iduz CHAR(10),
    obecnosc INT,
PRIMARY KEY ( idobecnosci )
);


CREATE TABLE ocenyczastkowe (
    idoceny        INTEGER NOT NULL AUTO_INCREMENT,
    wartoscoceny   INTEGER,
    wagaoceny      INTEGER,
    idnauczyciela  CHAR(10),
    datawpisania   DATE,
    uczniowie_iduz CHAR(10) NOT NULL,
PRIMARY KEY ( idoceny )
);


CREATE TABLE ocenykoncowe (
    idoceny                   INTEGER NOT NULL AUTO_INCREMENT,
    uczniowie_iduz CHAR(10) NOT NULL,
    ocenakoncowa               INTEGER,
    idprzedmiotu              CHAR(15),
PRIMARY KEY ( idoceny )
);


CREATE TABLE przedmioty (
    idprzedmiotu     CHAR (15) NOT NULL,
    nazwaprzedmiotu  CHAR(25),
    rokrealizacji    INTEGER,
    uzytkownicy_iduz CHAR(10) NOT NULL,
    klasa_idklasy    CHAR(10) NOT NULL
);

ALTER TABLE przedmioty ADD CONSTRAINT przedmioty_pk PRIMARY KEY ( idprzedmiotu );

CREATE TABLE rodzice (
    idrodzica        CHAR(10) NOT NULL,
    uzytkownicy_iduz CHAR(10) NOT NULL
);

CREATE UNIQUE INDEX rodzice__idx ON
    rodzice (
        uzytkownicy_iduz
    ASC );

ALTER TABLE rodzice ADD CONSTRAINT rodzice_pk PRIMARY KEY ( idrodzica );

CREATE TABLE uczniowie (
    uzytkownicy_iduz CHAR(10) NOT NULL,
    klasa_idklasy    CHAR(10) NOT NULL,
    sklasyfikowany   CHAR(1)
);

ALTER TABLE uczniowie ADD CONSTRAINT uczniowie_pk PRIMARY KEY ( uzytkownicy_iduz );

CREATE TABLE uzytkownicy (
    iduz                CHAR(10) NOT NULL,
    imie                CHAR(25) NOT NULL,
    nazwisko            CHAR(25) NOT NULL,
    dataurodzenia       DATE,
    pesel               INTEGER,
    miejscezamieszkania CHAR(25),
    telefonkontaktowy   INTEGER,
    typuzytkownika      CHAR(10) NOT NULL,
    aktywny             BOOL
);

ALTER TABLE uzytkownicy ADD CONSTRAINT uzytkownicy_pk PRIMARY KEY ( iduz );

CREATE TABLE wiadomosci (
    idwiadomosci     INTEGER NOT NULL AUTO_INCREMENT,
    temat            CHAR(30),
    idnadawcy        CHAR(10),
    datawyslania     DATE,
    tresc            VARCHAR(4000),
    uzytkownicy_iduz CHAR(10) NOT NULL,
PRIMARY KEY ( idwiadomosci )
);


ALTER TABLE lekcje
    ADD CONSTRAINT lekcje_przedmioty_fk FOREIGN KEY ( przedmioty_idprzedmiotu )
        REFERENCES przedmioty ( idprzedmiotu );


ALTER TABLE obecnosci
    ADD CONSTRAINT obecnosci_lekcje_fk FOREIGN KEY ( lekcje_idlekcji )
        REFERENCES lekcje ( idlekcji );

ALTER TABLE obecnosci
    ADD CONSTRAINT obecnosci_uczniowie_fk FOREIGN KEY ( uczniowie_uzytkownicy_iduz )
        REFERENCES uczniowie ( uzytkownicy_iduz );

ALTER TABLE przedmioty
    ADD CONSTRAINT przedmioty_klasa_fk FOREIGN KEY ( klasa_idklasy )
        REFERENCES klasa ( idklasy );

ALTER TABLE przedmioty
    ADD CONSTRAINT przedmioty_uzytkownicy_fk FOREIGN KEY ( uzytkownicy_iduz )
        REFERENCES uzytkownicy ( iduz );

ALTER TABLE rodzice
    ADD CONSTRAINT rodzice_uzytkownicy_fk FOREIGN KEY ( uzytkownicy_iduz )
        REFERENCES uzytkownicy ( iduz );

ALTER TABLE uczniowie
    ADD CONSTRAINT uczniowie_klasa_fk FOREIGN KEY ( klasa_idklasy )
        REFERENCES klasa ( idklasy );

ALTER TABLE uczniowie
    ADD CONSTRAINT uczniowie_uzytkownicy_fk FOREIGN KEY ( uzytkownicy_iduz )
        REFERENCES uzytkownicy ( iduz );

ALTER TABLE wiadomosci
    ADD CONSTRAINT wiadomosci_uzytkownicy_fk FOREIGN KEY ( uzytkownicy_iduz )
        REFERENCES uzytkownicy ( iduz );



INSERT INTO uzytkownicy VALUES ('admin1', 'Adam', 'Pierwszy', '1980-12-01', '80959595874', 'Krasne 155A','111222333', 'admin', 1 );
INSERT INTO uzytkownicy VALUES ('uczen1', 'Urszula', 'Pierwsza', '1999-12-01', '99959595874', 'Krasne 15','111222333', 'uczen', 1 );
INSERT INTO uzytkownicy VALUES ('uczen2', 'Jan', 'Drugi', '2001-12-01', '21959595874', 'Krasne 33','111222333', 'uczen', 1 );
INSERT INTO uzytkownicy VALUES ('uczen3', 'Aleksander', 'Trzeci', '2003-12-01', '23959595874', 'Krasne 54C','111222333', 'uczen', 1 );
INSERT INTO uzytkownicy VALUES ('uczen4', 'Katarzyna', 'Czwarta', '2004-12-01', '24959595874', 'Krasne 356','111222333', 'uczen', 1 );
INSERT INTO uzytkownicy VALUES ('uczen5', 'Krzysztof', 'Piatek', '2005-12-01', '25959595874', 'Krasne 3A','111222333', 'uczen', 1 );
INSERT INTO uzytkownicy VALUES ('naucz1', 'Witold', 'Witkowski', '1977-12-01', '77959595874', 'Rzeszow, ul.Okulickiego 3A','111222333', 'nauczyciel', 1 );
INSERT INTO uzytkownicy VALUES ('rodzi1', 'Krzysztof', 'Drugi', '2056-12-01', '56959595874', 'Krasne 15','111222333', 'naucz1', 1 );
INSERT INTO uzytkownicy VALUES ('naucz2', 'Janina', 'Kapec', '1977-12-01', '77959595874', 'Rzeszow, ul.Okulickiego 33A','111222333', 'nauczyciel', 1 );

INSERT INTO rodzice VALUES ('rodzic1', 'uczen2');

INSERT INTO klasa VALUES ('1B21/22', '1B', 'naucz2');
INSERT INTO klasa VALUES ('1A21/22', '1A', 'naucz1');

INSERT INTO przedmioty VALUES ('BIO1A21/22', 'Biologia 1A', '2021/2022', 'naucz1', '1A21/22');
INSERT INTO przedmioty VALUES ('BIO1B21/22', 'Biologia 1B', '2021/2022', 'naucz1', '1B21/22');
INSERT INTO przedmioty VALUES ('ANG1A21/22', 'Angielski', '2021/2022', 'naucz2', '1A21/22');
INSERT INTO przedmioty VALUES ('ANG1B21/22', 'Angielski', '2021/2022', 'naucz2', '1A21/22');

INSERT INTO uczniowie VALUES ('uczen1', '1A21/22', false);
INSERT INTO uczniowie VALUES ('uczen2', '1A21/22', false);
INSERT INTO uczniowie VALUES ('uczen3', '1A21/22', false);
INSERT INTO uczniowie VALUES ('uczen4', '1B21/22', false);
INSERT INTO uczniowie VALUES ('uczen5', '1B21/22', false);


INSERT INTO lekcje VALUES (1, '2022-01-15 08:00:00', 'BIO1A21/22','');
INSERT INTO lekcje VALUES (2, '2022-01-15 08:55:00', 'BIO1B21/22','');
INSERT INTO lekcje VALUES (3, '2022-01-15 08:00:00', 'ANG1B21/22','');
INSERT INTO lekcje VALUES (4, '2022-01-15 08:55:00', 'ANG1A21/22','');

INSERT INTO ocenyczastkowe VALUES (1, 5, 2, 'naucz1', '2022-01-15', 'uczen1');
INSERT INTO ocenyczastkowe VALUES (2, 3, 2, 'naucz1', '2022-01-15', 'uczen2');
INSERT INTO ocenyczastkowe VALUES (3, 5, 2, 'naucz1', '2022-01-15', 'uczen4');
INSERT INTO ocenyczastkowe VALUES (4, 1, 1, 'naucz2', '2022-01-15', 'uczen5');
INSERT INTO ocenyczastkowe VALUES (5, 2, 4, 'naucz2', '2022-01-15', 'uczen3');
INSERT INTO ocenyczastkowe VALUES (6, 6, 3, 'naucz2', '2022-01-15', 'uczen4');

-- Oracle SQL Developer Data Modeler Summary Report: 
-- 
-- CREATE TABLE                            12
-- CREATE INDEX                             2
-- ALTER TABLE                             27
-- CREATE VIEW                              0
-- ALTER VIEW                               0
-- CREATE PACKAGE                           0
-- CREATE PACKAGE BODY                      0
-- CREATE PROCEDURE                         0
-- CREATE FUNCTION                          0
-- CREATE TRIGGER                           0
-- ALTER TRIGGER                            0
-- CREATE COLLECTION TYPE                   0
-- CREATE STRUCTURED TYPE                   0
-- CREATE STRUCTURED TYPE BODY              0
-- CREATE CLUSTER                           0
-- CREATE CONTEXT                           0
-- CREATE DATABASE                          0
-- CREATE DIMENSION                         0
-- CREATE DIRECTORY                         0
-- CREATE DISK GROUP                        0
-- CREATE ROLE                              0
-- CREATE ROLLBACK SEGMENT                  0
-- CREATE SEQUENCE                          0
-- CREATE MATERIALIZED VIEW                 0
-- CREATE MATERIALIZED VIEW LOG             0
-- CREATE SYNONYM                           0
-- CREATE TABLESPACE                        0
-- CREATE USER                              0
-- 
-- DROP TABLESPACE                          0
-- DROP DATABASE                            0
-- 
-- REDACTION POLICY                         0
-- 
-- ORDS DROP SCHEMA                         0
-- ORDS ENABLE SCHEMA                       0
-- ORDS ENABLE OBJECT                       0
-- 
-- ERRORS                                   0
-- WARNINGS                                 0
