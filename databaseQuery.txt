USE siecszkol;


-- Table: kandydaci
CREATE TABLE kandydaci (
    IdKandydata int  NOT NULL,
    Stanowisko varchar(50) CHARACTER SET utf8 NOT NULL,
    Imie varchar(50) CHARACTER SET utf8 NOT NULL,
    Nazwisko varchar(50) CHARACTER SET utf8 NOT NULL,
    DataUrodzenia date  NOT NULL,
    Pesel char(11)  NOT NULL,
    NrTelefonu char(12)  NULL,
    Email varchar(50)  NOT NULL,
    Miejscowosc varchar(50) CHARACTER SET utf8 NULL,
    Ulica varchar(50) CHARACTER SET utf8 NULL,
    NrBudynku varchar(5) CHARACTER SET utf8 NULL,
    NrLokalu varchar(5)  NULL,
    CONSTRAINT Kandydaci_pk PRIMARY KEY (IdKandydata)
);



-- Table: pracownicy
CREATE TABLE pracownicy (
    IdPracownika int  NOT NULL,
    IdSzkoly int  NOT NULL,
    Stanowisko varchar(50) CHARACTER SET utf8  NOT NULL,
    Imie varchar(50) CHARACTER SET utf8 NOT NULL,
    Nazwisko varchar(50) CHARACTER SET utf8 NOT NULL,
    DataUrodzenia date  NOT NULL,
    Pesel char(11)  NOT NULL,
    NrTelefonu char(12)  NULL,
    Email varchar(50)  NOT NULL,
    Login varchar(50)  NOT NULL,
    HasloHash varchar(255)  NOT NULL,
    Miejscowosc varchar(50) CHARACTER SET utf8 NULL,
    Ulica varchar(50) CHARACTER SET utf8 NULL,
    NrBudynku varchar(5)  NULL,
    NrLokalu varchar(5)  NULL,
    CONSTRAINT Pracownicy_pk PRIMARY KEY (IdPracownika)
);

-- Table: produkty
CREATE TABLE produkty (
    IdProduktu int  NOT NULL,
    IdZamowienia int  NOT NULL,
    Nazwa varchar(50) CHARACTER SET utf8 NOT NULL,
    Ilosc int  NOT NULL,
    CenaNetto decimal(10,2)  NOT NULL,
    CenaBrutto decimal(10,2)  NOT NULL,
    VAT int  NOT NULL,
    CONSTRAINT Produkty_pk PRIMARY KEY (IdProduktu)
);

-- Table: rozmowy
CREATE TABLE rozmowy (
    IdRozmowy int  NOT NULL,
    IdSali varchar(6)  NOT NULL,
    IdKandydata int NOT NULL,
    GodzinaRozpoczecia time  NOT NULL,
    GodzinaZakonczenia time  NOT NULL,
    Data date  NOT NULL,
    CONSTRAINT Rozmowy_pk PRIMARY KEY (IdRozmowy)
);

-- Table: sale
CREATE TABLE sale (
    IdSali varchar(6)  NOT NULL,
    IdSzkoly int  NOT NULL,
    CONSTRAINT Sale_pk PRIMARY KEY (IdSali)
);

-- Table: szkola
CREATE TABLE szkola (
    IdSzkoly int  NOT NULL,
    Nazwa varchar(50)  NOT NULL,
    Miejscowosc varchar(50) CHARACTER SET utf8 NULL,
    Ulica varchar(50) CHARACTER SET utf8 NULL,
    NrBudynku varchar(5)  NULL,
    CONSTRAINT Szkola_pk PRIMARY KEY (IdSzkoly)
);

-- Table: zamowienia
CREATE TABLE zamowienia (
    IdZamowienia int  NOT NULL,
    IdSzkoly int  NOT NULL,
    Data date  NOT NULL,
    Stan varchar(30) CHARACTER SET utf8 NOT NULL,
    Komentarz text CHARACTER SET utf8 NULL,
    Dostarczony bool  NOT NULL,
    CONSTRAINT Zamowienia_pk PRIMARY KEY (IdZamowienia)
);

-- Table: zgloszenia
CREATE TABLE zgloszenia (
    IdZgloszenia int  NOT NULL,
    IdSzkoly int  NOT NULL,
    Nazwa varchar(100) CHARACTER SET utf8 NOT NULL,
    Data date  NOT NULL,
    Zweryfikowano bool  NOT NULL,
    CONSTRAINT Zgloszenia_pk PRIMARY KEY (IdZgloszenia)
);

-- foreign keys
-- Reference: Produkty_Zamowienia (table: Produkty)
ALTER TABLE produkty ADD CONSTRAINT Produkty_Zamowienia FOREIGN KEY Produkty_Zamowienia (IdZamowienia) 
    REFERENCES zamowienia (IdZamowienia);

-- Reference: Rozmowy_Kandydaci (table: Rozmowy)
ALTER TABLE rozmowy ADD CONSTRAINT Rozmowy_Kandydaci FOREIGN KEY Rozmowy_Kandydaci (IdKandydata)
    REFERENCES kandydaci (IdKandydata);

-- Reference: Rozmowy_Sale (table: Rozmowy)
ALTER TABLE rozmowy ADD CONSTRAINT Rozmowy_Sale FOREIGN KEY Rozmowy_Sale (IdSali)
    REFERENCES sale (IdSali);

-- Reference: Sale_Szkola (table: Sale)
ALTER TABLE sale ADD CONSTRAINT Sale_Szkola FOREIGN KEY Sale_Szkola (IdSzkoly)
    REFERENCES szkola (IdSzkoly);

-- Reference: Szkola_Pracownicy (table: Pracownicy)
ALTER TABLE pracownicy ADD CONSTRAINT Szkola_Pracownicy FOREIGN KEY Szkola_Pracownicy (IdSzkoly)
    REFERENCES szkola (IdSzkoly);

-- Reference: Zamowienia_Szkola (table: Zamowienia)
ALTER TABLE zamowienia ADD CONSTRAINT Zamowienia_Szkola FOREIGN KEY Zamowienia_Szkola (IdSzkoly)
    REFERENCES szkola (IdSzkoly);

-- Reference: Zgloszenia_Szkola (table: Zgloszenia)
ALTER TABLE zgloszenia ADD CONSTRAINT Zgloszenia_Szkola FOREIGN KEY Zgloszenia_Szkola (IdSzkoly)
    REFERENCES szkola (IdSzkoly);
