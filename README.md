# SchroniskoAppPHP
https://foka.umg.edu.pl/~s47549/schronisko/schronisko/public/domowa
--PL--

Projekt applikacji webowej wspomagającej korzystanie z bazy danych potencjalnego Schroniska dla zwierząt. Aplikacja zrobiona na potrzeby przedmiotu Projektowanie Stron Internetowych, stworzony w frameworku Laravel języka PHP oraz oparty o bazę danych utworzoną w PostgreSQL.

Baza zawiera tabele:
     Zwierzeta - opisuje zwierzęta znajdujące się w schronisku;
     Klienci - opisuje osoby, które decydują się na adopcję;
     Wolontariusze - opisuje osoby, które udzielają się wolontaryjnie w schronisku;
     Adopcje - opisuje adopcje - kto, jakie zwierze i kiedy adoptował;
     Tymczas - opisuje pobyt zwierząt w domu tymczasowym - kto i jakie zwierze tymczasowo przygarnął;

Aplikacja wspomaga wszystkie podstawowe operacje na bazie - edycję, dodawanie i usuwanie rekordów każdej z tabel. Ponadto, widok podzielony jest na widok klienta (góra) i widok admina (dół) - klient może przeglądać zwierzęta obecne w schronisku czy wysłać formularz zgłoszeniowy w celu zostania wolontariuszem. Admin natomiast, ma pełny dostęp do każdej z tabel w bazie.

Dane do logowania, w celu podejżenia widoku admina:
Login: admin@admin
Hasło: adminadmin


--ANG--

Web application project supporting the administrative use of a database of an animal shelter. The application was made for Design of Web Pages classes, developed using Laravel - a PHP framework, supported by a database made using PostgreSQL.

Database consists of tables:
     Zwierzeta - stores properties of animals in the shelter;
     Klienci - stores information about clients who decide to adopt;
     Wolontariusze - stores information about volunteers of the shelter;
     Adopcje - describes adoptions - who adopted which animal and when;
     Tymczas - describes the stay of an animal in the home of a volunteer - who, which animal was temporarily taken into temporary care;

The app supports all basic operations with the database - editing, adding and deleting records from any table. Moreover, the view is seperated - the top menu on page is designed for a client and the bottom one - for the admin. Client has the ability to look through all animals within the Shelter and to fill out a form if they wish to become a volonteer in the Shelter. The admin has unobstructed view of the database and can make changes in every table within the database.

If you'd like to check out the admin's view:
Login: admin@admin
Password: adminadmin
