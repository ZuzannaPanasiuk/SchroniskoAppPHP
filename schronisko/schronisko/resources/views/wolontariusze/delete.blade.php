<!DOCTYPE html>
<html lang="pl">
 @include('partials.head')
 <body>
 @include('partials.navi')
 <div id="zawartosc">
 <h2>Potwierdzenie - Usuń Wolontariusza o Id: {{$wolontariusz->id}}</h2>
 <form class="form-inline" action="<?=config('app.url'); ?>/wolontariusze/delete/{{$wolontariusz->id}}" method = "post" >
 @csrf
    <p>
        <label for="wolontariusz">Id:</label>
        <input id="id" name="id" value="{{$wolontariusz->id}}"readonly>
    </p>
    <p>
        <label for="wolontariusz">Imię:</label>
        <input id="imie" name="imie" value="{{$wolontariusz->imie}}" readonly>
    </p>
    <p>
        <label for="wolontariusz">Nazwisko:</label>
        <input id="nazwisko" name="nazwisko" value="{{$wolontariusz->nazwisko}}" readonly>
    </p>
    <p>
        <label for="wolontariusz">Nr telefonu:</label>
        <input id="nr_tel" name="nr_tel" value="{{$wolontariusz->nr_tel}}" readonly>
    </p>
    <p>
        <label for="wolontariusz">Rola:</label>
        <input id="rola" name="rola" value="{{$wolontariusz->rola}}" readonly>
    </p>
    <p><button type="submit" class="btn btn-primary mb-2">Usuń</button></p>
</form>

</div>
 </body>
 @include('partials.foot')
</html>