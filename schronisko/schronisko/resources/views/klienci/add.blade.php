<!DOCTYPE html>
<html>
@include('partials.head')
<body>
 @include('partials.navi')
 <div id="zawartosc">
 <form class="form-inline" action ="<?=config('app.url'); ?>/klienci/save" method = "post" >
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
 <label for="email">Adres email</label>
 <input id="email" name="email" size="20">
 </p>

 <p><button type="submit" class="btn btn-primary mb-2">Dodaj</button></p>
 </form>
</div>
</body>
@include('partials.foot')
</html>