drop DATABASE if EXISTS 105guitars;
create DATABASE if not EXISTS 105guitars;
use 105guitars;

create table modello(
    codice int not null AUTO_INCREMENT,
    nome varchar(40) not null,
    scala float not null,
    tipo_body varchar(40) not null,
    elettronica varchar(100) not null,
    CONSTRAINT ID_MODELLO PRIMARY key (codice)
);

create table copia(
	seriale int not null AUTO_INCREMENT,
    ID_MODELLO int not null,
    num_corde int not null,
    colore varchar(40) not null,
    materiale varchar(100) not null,
    prezzo int not null,
    front_image varchar(100) not null,
    side_image varchar(100) not null,
    back_image varchar(100) not null,
    sold bit not null,
    CONSTRAINT ID_COPIA PRIMARY key (seriale)
);

CREATE table utente(
    email varchar(40) unique not null,
    passw varchar(256) not null,
    nome varchar(40) not null,
    cognome varchar(40) not null,
    isadmin boolean not null,
    CONSTRAINT ID_UTENTE PRIMARY key (email)
);

create table oggetto_in_carrello(
    ID_UTENTE varchar(40) not null,
    ID_COPIA int not null,
    CONSTRAINT ID_OGGETTO_CARRELLO PRIMARY key (ID_UTENTE, ID_COPIA)
);

create table ordine(
    codice_ordine int not null AUTO_INCREMENT,
    data_ordine date not null,
    ID_UTENTE varchar(40) not null,
    stato ENUM('unprepared', 'unsent', 'sent', 'delivered'),
    CONSTRAINT ID_ORDINE PRIMARY key (codice_ordine)
);

create table oggetto_in_ordine(
    ID_COPIA int not null,
    ID_ORDINE int not null,
    CONSTRAINT ID_OGGETTO_ORDINE PRIMARY key (ID_COPIA, ID_ORDINE)
);

create table notifica(
    codice int not null AUTO_INCREMENT,
    titolo varchar(256) not null,
    descrizione varchar(1024) not null,
    ID_UTENTE varchar(40) not null,
    relativa_carrello boolean not null,
    invio datetime not null,
    CONSTRAINT ID_NOTIF PRIMARY key (codice)
);

create table carta(
    Nome varchar(40) not null,
    Cognome varchar(40) not null,
    Numero varchar(16) not null,
    Scadenza date not null,
    CVV int(3) not null,
    Ammontare_disponibile float,
    Tipo ENUM('credit', 'debit'),
    PRIMARY key(Nome, Cognome, Numero, Scadenza, CVV, Tipo)
);

CREATE TABLE password_dimenticata (
    ID_UTENTE varchar(40) not null,
    codice varchar(5) not null,
    PRIMARY key(ID_UTENTE)
);


-- copia
alter table copia add constraint FK_ID_MODELLO foreign key(ID_MODELLO) references modello(codice);
-- oggetto in carrello
alter table oggetto_in_carrello add constraint FK_ID_UTENTE foreign key(ID_UTENTE) references utente(email);
alter table oggetto_in_carrello add constraint FK_ID_COPIA foreign key(ID_COPIA) references copia(seriale);
-- ordine
alter table ordine add constraint FK_ID_UTENTE_ORD FOREIGN key(ID_UTENTE) references utente(email);
-- oggett in ordine
alter table oggetto_in_ordine add constraint FK_ID_ORDINE foreign key(ID_ORDINE) references ordine(codice_ordine);
alter table oggetto_in_ordine add constraint FK_ID_COPIA_ORD foreign key(ID_COPIA) references copia(seriale);
-- notifica
alter table notifica add constraint FK_ID_UTENT_ID foreign key(ID_UTENTE) references utente(email);


INSERT INTO modello (nome, scala, tipo_body, elettronica) VALUES 
("105 V Spektre", 25.5, "Flying V", "Neck & Bridge: 105 Duncan Alnico; 5-way-blade"),       -- 1
("105 Super Idol", 25.4, "SuperStrat", "Bridge: 105 Duncan Alnico"),                        -- 2
("105 Imposter", 24.75, "Clarus Bass", "Bridge: 105 Aktive precision Hmbucker"),            -- 3
("105 Exodus", 24.75, "Explorer", "Neck & Bridge: EMG 81; evertune bridge"),                -- 4
("105 Contemporary", 24.75, "Tele", "Bridge: 105 Alnico; evertune bridge"),                 -- 5
("105 Stardust", 25.4, "SuperStrat", "Neck & Bridge: premium 105 gold humbs; floyd rose");  -- 6

INSERT INTO copia (ID_MODELLO, num_corde, colore, materiale, prezzo, front_image, side_image, back_image, sold) VALUES
(2, 6, "crimson red","ebony", 1200, "superidol-redebony-front.png","superidol-redebony-side.png","superidol-redebony-back.png", 0),
(2, 8, "black matte","alder", 1000, "superidol-steel-front.png","superidol-steel-side.png","superidol-steel-back.png", 0),
(2, 6, "aurora","alder", 1100, "aurora1.png","aurora2.png","aurora3.png", 0),
(2, 6, "ocean","alder", 1100, "aqua1.png","aqua2.png","aqua3.png", 0),
(2, 6, "blue matte","alder", 1000, "blue1.png","blue2.png","blue3.png", 0),
(2, 6, "pluvial green","alder", 1100, "green1.png","green2.png","green3.png", 0),
(2, 6, "cannibal gray","alder", 1200, "cannibal1.png","cannibal2.png","cannibal3.png", 0),
(1, 7, "red sunburst","swamp ash", 1600, "vspektre-brownsunb-front.png","vspektre-brownsunb-side.png","vspektre-brownsunb-back.png", 0),
(1, 6, "navy green","swamp ash", 1800, "navy1.png","navy2.png","navy3.png", 0),
(3, 4, "lime green","plywood", 100, "imposter-lime-front.png","imposter-lime-side.png","imposter-lime-back.png", 0),
(3, 4, "brown sunburst","ebony", 1200, "imposter-ebony-front.png","imposter-ebony-side.png","imposter-ebony-back.png", 0),
(4, 6, "crimson fade","ebony", 1600, "crimsonfade1.png","crimsonfade2.png","crimsonfade3.png", 0),
(5, 6, "olympic white","pine", 1600, "tele1.png","tele2.png","tele3.png", 0),
(6, 6, "light brown","ebony", 2200, "beige1.png","beige2.png","beige3.png", 0),
(6, 6, "polish red","ebony", 2100, "super1.png","super2.png","super3.png", 0);

INSERT INTO utente () VALUES
("testuser@mail.com", "$2y$10$ZkcEZ33RcH0kUJOlC4g9XO5J9if4RnJepTdlDeOfPqfjgG/l4rj4K", "utente_test", "cognome", 0),
("testadmin@mail.com", "$2y$10$mzyLF5IEP7sEZEZnhe/JC.AwxQRW9qS9SCj2mOT27DiBGMNdO2Joe", "admin_test", "cognome", 1);
 
INSERT INTO carta values ('Nome', 'Cognome', '2403237584767354', '2030-02-01', 123, 10000, 'credit');
INSERT INTO carta values ('Carta', 'Scaduta', '2442562843782389', '2010-02-01', 222, 12000, 'credit');
