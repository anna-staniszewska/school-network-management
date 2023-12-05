DROP schema siecszkol;
create schema siecszkol;

USE siecszkol;


-- Table: Kandydaci
CREATE TABLE Kandydaci (
    IdKandydata int  NOT NULL,
    Stanowisko nvarchar(50)  NOT NULL,
    Imie nvarchar(50)  NOT NULL,
    Nazwisko nvarchar(50)  NOT NULL,
    DataUrodzenia date  NOT NULL,
    Pesel char(11)  NOT NULL,
    NrTelefonu char(12)  NULL,
    Email nvarchar(50)  NOT NULL,
    Miejscowosc nvarchar(50)  NULL,
    Ulica nvarchar(50)  NULL,
    NrBudynku nvarchar(5)  NULL,
    NrLokalu nvarchar(5)  NULL,
    CONSTRAINT Kandydaci_pk PRIMARY KEY (IdKandydata)
);



-- Table: Pracownicy
CREATE TABLE Pracownicy (
    IdPracownika int  NOT NULL,
    IdSzkoly int  NOT NULL,
    Stanowisko nvarchar(50)  NOT NULL,
    Imie nvarchar(50)  NOT NULL,
    Nazwisko nvarchar(50)  NOT NULL,
    DataUrodzenia date  NOT NULL,
    Pesel char(11)  NOT NULL,
    NrTelefonu char(12)  NULL,
    Email nvarchar(50)  NOT NULL,
    Login nvarchar(50)  NOT NULL,
    HasloHash char(32)  NOT NULL,
    Miejscowosc nvarchar(50)  NULL,
    Ulica nvarchar(50)  NULL,
    NrBudynku nvarchar(5)  NULL,
    NrLokalu nvarchar(5)  NULL,
    CONSTRAINT Pracownicy_pk PRIMARY KEY (IdPracownika)
);

-- Table: Produkty
CREATE TABLE Produkty (
    IdProduktu int  NOT NULL,
    IdZamowienia int  NOT NULL,
    Nazwa nvarchar(50)  NOT NULL,
    Ilosc int  NOT NULL,
    CenaNetto decimal(10,2)  NOT NULL,
    CenaBrutto decimal(10,2)  NOT NULL,
    VAT varchar(3)  NOT NULL,
    CONSTRAINT Produkty_pk PRIMARY KEY (IdProduktu)
);

-- Table: Rozmowy
CREATE TABLE Rozmowy (
    IdRozmowy int  NOT NULL,
    IdSali varchar(6)  NOT NULL,
    IdKandydata int NOT NULL,
    GodzinaRozpoczecia time  NOT NULL,
    GodzinaZakonczenia time  NOT NULL,
    Data date  NOT NULL,
    CONSTRAINT Rozmowy_pk PRIMARY KEY (IdRozmowy)
);

-- Table: Sale
CREATE TABLE Sale (
    IdSali varchar(6)  NOT NULL,
    IdSzkoly int  NOT NULL,
    CONSTRAINT Sale_pk PRIMARY KEY (IdSali)
);

-- Table: Szkola
CREATE TABLE Szkola (
    IdSzkoly int  NOT NULL,
    Nazwa varchar(50)  NOT NULL,
    Miejscowosc nvarchar(50)  NULL,
    Ulica nvarchar(50)  NULL,
    NrBudynku nvarchar(5)  NULL,
    CONSTRAINT Szkola_pk PRIMARY KEY (IdSzkoly)
);

-- Table: Zamowienia
CREATE TABLE Zamowienia (
    IdZamowienia int  NOT NULL,
    IdSzkoly int  NOT NULL,
    Data date  NOT NULL,
    Stan nvarchar(30)  NOT NULL,
    Dostarczony char(3)  NOT NULL,
    CONSTRAINT Zamowienia_pk PRIMARY KEY (IdZamowienia)
);

-- Table: Zgloszenia
CREATE TABLE Zgloszenia (
    IdZgloszenia int  NOT NULL,
    IdSzkoly int  NOT NULL,
    Nazwa nvarchar(100)  NOT NULL,
    Data date  NOT NULL,
    Zweryfikowano char(3)  NOT NULL,
    CONSTRAINT Zgloszenia_pk PRIMARY KEY (IdZgloszenia)
);

-- foreign keys
-- Reference: Produkty_Zamowienia (table: Produkty)
ALTER TABLE Produkty ADD CONSTRAINT Produkty_Zamowienia FOREIGN KEY Produkty_Zamowienia (IdZamowienia) 
    REFERENCES Zamowienia (IdZamowienia);

-- Reference: Rozmowy_Kandydaci (table: Rozmowy)
ALTER TABLE Rozmowy ADD CONSTRAINT Rozmowy_Kandydaci FOREIGN KEY Rozmowy_Kandydaci (IdKandydata)
    REFERENCES Kandydaci (IdKandydata);

-- Reference: Rozmowy_Sale (table: Rozmowy)
ALTER TABLE Rozmowy ADD CONSTRAINT Rozmowy_Sale FOREIGN KEY Rozmowy_Sale (IdSali)
    REFERENCES Sale (IdSali);

-- Reference: Sale_Szkola (table: Sale)
ALTER TABLE Sale ADD CONSTRAINT Sale_Szkola FOREIGN KEY Sale_Szkola (IdSzkoly)
    REFERENCES Szkola (IdSzkoly);

-- Reference: Szkola_Pracownicy (table: Pracownicy)
ALTER TABLE Pracownicy ADD CONSTRAINT Szkola_Pracownicy FOREIGN KEY Szkola_Pracownicy (IdSzkoly)
    REFERENCES Szkola (IdSzkoly);

-- Reference: Zamowienia_Szkola (table: Zamowienia)
ALTER TABLE Zamowienia ADD CONSTRAINT Zamowienia_Szkola FOREIGN KEY Zamowienia_Szkola (IdSzkoly)
    REFERENCES Szkola (IdSzkoly);

-- Reference: Zgloszenia_Szkola (table: Zgloszenia)
ALTER TABLE Zgloszenia ADD CONSTRAINT Zgloszenia_Szkola FOREIGN KEY Zgloszenia_Szkola (IdSzkoly)
    REFERENCES Szkola (IdSzkoly);
