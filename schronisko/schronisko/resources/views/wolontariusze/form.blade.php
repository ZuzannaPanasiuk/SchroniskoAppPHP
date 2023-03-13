<!DOCTYPE html>
<html>
@include('partials.head')
<body>
 @include('partials.navi')
 <div id="zawartosc">

 <h2>Kochasz zwierzęta? Masz wolny czas i ogromne serce?</h2>
 <h3>Zapraszamy do wypełnienia formularza poniżej, aby zostać wolontariuszem w naszym schronisku!</h3>
 <form class="form-inline" action ="<?=config('app.url'); ?>/wolontariusze/save" method = "post" >
 @csrf
 <p>
 <label for="imie">Imię</label>
 <input id="imie" name="imie" size="20">
 </p>
 <p>
 <label for="nazwisko">Nazwisko</label>
 <input id="nazwisko" name="nazwisko" size="30">
 </p>

 <p>
 <label for="nr_tel">Nr_tel</label>
 <input id="nr_tel" name="nr_tel" size="9">
 </p>

 <p>Rola:</p>
 <p>
 <input type="radio" name="rola" id="rola"
 value='wyprowadzacz psów' checked>
 <label for="rola">Wyprowadzacz psów</label>
 </p>
 <p>
 <input type="radio" name="rola" id="rola"
 value='dom tymczasowy'>
 <label for="rola">Dom tymczasowy</label>
 </p>

 <p><button type="submit" class="btn btn-primary mb-2">Dodaj</button></p>
 </form>
</div>
</body>
@include('partials.foot')
</html>