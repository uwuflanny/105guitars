drop DATABASE if EXISTS 105guitars;
create DATABASE if not EXISTS 105guitars;
use 105guitars;

create table modello(
    codice int not null AUTO_INCREMENT,
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
    CONSTRAINT ID_COPIA PRIMARY key (seriale)
);

CREATE table utente(
    email varchar(40) unique not null,
    passw varchar(40) not null,
    nome varchar(40) not null,
    cognome varchar(40) not null,
    isadmin boolean not null,
    CONSTRAINT ID_UTENTE PRIMARY key (email, passw)
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
    CONSTRAINT ID_ORDINE PRIMARY key (codice_ordine)
);

create table oggetto_in_ordine(
    ID_COPIA int not null,
    ID_ORDINE int not null,
    CONSTRAINT ID_OGGETTO_ORDINE PRIMARY key (ID_COPIA, ID_ORDINE)
);

create table notifica_fine_prodotti(
	codice int not null AUTO_INCREMENT,
	descrizione varchar(256) not null,
	MODELLO_RELATIVO int not null,
	CONSTRAINT ID_NOTIF_FINE PRIMARY key (codice)
);

create table notifica_ordine(
	codice int not null AUTO_INCREMENT,
	descrizione varchar(256) not null,
	ORDINE_RELATIVO int not null,
	CONSTRAINT ID_NOTIF_ORD PRIMARY key (codice)
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
-- notifica fine prodotti
alter table notifica_fine_prodotti add constraint FK_ID_MODELLO_ID foreign key(MODELLO_RELATIVO) references modello(codice);
-- notifica ordine 
alter table notifica_ordine add constraint FK_ID_ORDINE_ID foreign key (ORDINE_RELATIVO) references ordine(codice_ordine);
