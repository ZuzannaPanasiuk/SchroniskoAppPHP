# SchroniskoAppPHP
https://foka.umg.edu.pl/~s47549/schronisko/schronisko/public/domowa</br>
--PL--

Projekt applikacji webowej wspomagającej korzystanie z bazy danych potencjalnego Schroniska dla zwierząt. Aplikacja zrobiona na potrzeby przedmiotu Projektowanie Stron Internetowych, stworzony w frameworku Laravel języka PHP oraz oparty o bazę danych utworzoną w PostgreSQL.

*Uwaga* - pliki przedstawione poniżej nie zawierają prawdziwych danych do logowania, niezbędnych do odtworzenia tego projektu, w związku z czym, aplikacja nie działa. Działanie aplikacji, można zaobserwować poprzez otworzenie linku znajdującego się na górze dokumentu.

Baza zawiera tabele:</br>
&nbsp;&nbsp;&nbsp;&nbsp; Zwierzeta - opisuje zwierzęta znajdujące się w schronisku;</br>
&nbsp;&nbsp;&nbsp;&nbsp; Klienci - opisuje osoby, które decydują się na adopcję;</br>
&nbsp;&nbsp;&nbsp;&nbsp; Wolontariusze - opisuje osoby, które udzielają się wolontaryjnie w schronisku;</br>
&nbsp;&nbsp;&nbsp;&nbsp; Adopcje - opisuje adopcje - kto, jakie zwierze i kiedy adoptował;</br>
&nbsp;&nbsp;&nbsp;&nbsp; Tymczas - opisuje pobyt zwierząt w domu tymczasowym - kto i jakie zwierze tymczasowo przygarnął;</br>

Aplikacja wspomaga wszystkie podstawowe operacje na bazie - edycję, dodawanie i usuwanie rekordów każdej z tabel. Ponadto, widok podzielony jest na widok klienta (góra) i widok admina (dół) - klient może przeglądać zwierzęta obecne w schronisku czy wysłać formularz zgłoszeniowy w celu zostania wolontariuszem. Admin natomiast, ma pełny dostęp do każdej z tabel w bazie.

Dane do logowania, w celu podejżenia widoku admina:</br>
Login: admin@admin</br>
Hasło: adminadmin


--ANG--

Web application project supporting the administrative use of a database of an animal shelter. The application was made for Design of Web Pages classes, developed using Laravel - a PHP framework, supported by a database made using PostgreSQL.

*Warning* - the files of in this repo don't contain the correct login nor password, that are nessesary for this app to work, therefore it doesn't work. You can observe the app in working by opening the link at the beginning of this document.

Database consists of tables:</br>
&nbsp;&nbsp;&nbsp;&nbsp; Zwierzeta - stores properties of animals in the shelter;</br>
&nbsp;&nbsp;&nbsp;&nbsp; Klienci - stores information about clients who decide to adopt;</br>
&nbsp;&nbsp;&nbsp;&nbsp; Wolontariusze - stores information about volunteers of the shelter;</br>
&nbsp;&nbsp;&nbsp;&nbsp; Adopcje - describes adoptions - who adopted which animal and when;</br>
&nbsp;&nbsp;&nbsp;&nbsp; Tymczas - describes the stay of an animal in the home of a volunteer - who, which animal was temporarily taken into temporary care;</br>

The app supports all basic operations with the database - editing, adding and deleting records from any table. Moreover, the view is seperated - the top menu on page is designed for a client and the bottom one - for the admin. Client has the ability to look through all animals within the Shelter and to fill out a form if they wish to become a volonteer in the Shelter. The admin has unobstructed view of the database and can make changes in every table within the database.

If you'd like to check out the admin's view:
Login: admin@admin
Password: adminadmin
