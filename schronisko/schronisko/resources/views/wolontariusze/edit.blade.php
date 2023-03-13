<!DOCTYPE html>
<html lang="pl">
 @include('partials.head')
 <body>
 @include('partials.navi')
 <div id="zawartosc">
 <h2>Zmień informacje o wolontariuszu</h2>
 <form class="form-inline" action="<?=config('app.url'); ?>/wolontariusze/update/{{$wolontariusz->id}}" method = "post" >
 @csrf
    <p>
        <label for="id">Id Wolontariusza:</label>
        <input id="id" name="id" value="{{$wolontariusz->id}}"readonly>
    </p>
    <p>
        <label for="imie">Imię Wolontariusza:</label>
        <input id="imie" name="imie" value="{{$wolontariusz->imie}}">
    </p>
    <p>
        <label for="nazwisko">Nazwisko Wolontariusza:</label>
        <input id="nazwisko" name="nazwisko" value="{{$wolontariusz->nazwisko}}">
    </p>
    <p>
    <p>
        <label for="nr_tel">Nr Telefonu:</label>
        <input id="nr_tel" name="nr_tel" size="12" value="{{$wolontariusz->nr_tel}}" required>
    </p>
    <p>
        <label for="rola">Rola:</label>
        <input type="radio" name="rola" id="rola" value='wyprowadzacz psów' @if($wolontariusz->rola == 'wyprowadzacz psów') checked @endif required>
        <label for="rola">Wyprowadzacz psów</label>

        <input type="radio" name="rola" id="rola" value='dom tymczasowy' @if($wolontariusz->rola == 'dom tymczasowy') checked @endif required>
        <label for="rola">Dom tymczasowy</label>
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