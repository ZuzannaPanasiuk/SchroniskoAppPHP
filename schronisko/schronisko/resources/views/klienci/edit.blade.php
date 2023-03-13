<!DOCTYPE html>
<html lang="pl">
 @include('partials.head')
 <body>
 @include('partials.navi')
 <div id="zawartosc">
 <h2>Zmień informacje o kliencie</h2>
 <form class="form-inline" action="<?=config('app.url'); ?>/klienci/update/{{$klient->id}}" method = "post" >
 @csrf
    <p>
        <label for="id">Id Klienta:</label>
        <input id="id" name="id" value="{{$klient->id}}"readonly>
    </p>
    <p>
        <label for="imie">Imię Klienta:</label>
        <input id="imie" name="imie" value="{{$klient->imie}}">
    </p>
    <p>
        <label for="nazwisko">Nazwisko Klienta:</label>
        <input id="nazwisko" name="nazwisko" value="{{$klient->nazwisko}}">
    </p>
    <p>
    <p>
        <label for="email">Email:</label>
        <input id="email" name="email" size="12" value="{{$klient->email}}" required>
    </p>
    <p><button type="submit" class="btn btn-primary mb-2">Save</button></p>
</form>

<p>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
 </body>
 @include('partials.foot')
</html>