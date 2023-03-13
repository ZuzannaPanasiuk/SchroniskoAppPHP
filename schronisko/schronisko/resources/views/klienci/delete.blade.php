<!DOCTYPE html>
<html lang="pl">
 @include('partials.head')
 <body>
 @include('partials.navi')
 <div id="zawartosc">
 <h2>Potwierdzenie - Usuń Klienta o Id: {{$klient->id}}</h2>
 <form class="form-inline" action="<?=config('app.url'); ?>/klienci/delete/{{$klient->id}}" method = "post" >
 @csrf
    <p>
        <label for="klient">Id:</label>
        <input id="id" name="id" value="{{$klient->id}}"readonly>
    </p>
    <p>
        <label for="wolontariusz">Imię:</label>
        <input id="imie" name="imie" value="{{$klient->imie}}" readonly>
    </p>
    <p>
        <label for="klient">Nazwisko:</label>
        <input id="nazwisko" name="nazwisko" value="{{$klient->nazwisko}}" readonly>
    </p>
    <p>
        <label for="klient">Email:</label>
        <input id="email" name="email" value="{{$klient->email}}" readonly>
    </p>
    <p><button type="submit" class="btn btn-primary mb-2">Usuń</button></p>
</form>

</div>
 </body>
 @include('partials.foot')
</html>