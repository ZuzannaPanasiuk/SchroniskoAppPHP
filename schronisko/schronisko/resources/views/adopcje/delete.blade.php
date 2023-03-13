<!DOCTYPE html>
<html lang="pl">
 @include('partials.head')
 <body>
 @include('partials.navi')
 <div id="zawartosc">
 <h2>Potwierdzenie - Usuń Adopcję o Id: {{$adopcja->id}}</h2>
 <form class="form-inline" action="<?=config('app.url'); ?>/adopcje/delete/{{$adopcja->id}}" method = "post" >
 @csrf
    <p>
        <label for="id">Adopcja Id:</label>
        <input id="id" name="id" value="{{$adopcja->id}}" readonly>
    </p>

    <label for="klient_info">Klient:</label>
    @foreach ($adopcje as $el)
        @if($el->id === $adopcja->id)
            <input id="klient_info" size="35" value="{{$el->imie_klienta}} {{$el->nazwisko}} ({{$el->email}})" readonly> <br><br>
        @endif
    @endforeach

    <label for="zwierze_info">Zwierze:</label>
    @foreach ($adopcje as $el)
        @if($el->id === $adopcja->id)
            <input id="zwierze_info" value="{{$el->imie_zwierzecia}}" readonly> <br><br>
        @endif
    @endforeach

    <label for="data_info">Data:</label>
    @foreach ($adopcje as $el)
        @if($el->id === $adopcja->id)
            <input id="data_info" value="{{$el->data}}" readonly> 
        @endif
    @endforeach

    <p><button type="submit" class="btn btn-primary mb-2">Usuń</button></p>
</form>

</div>
 </body>
 @include('partials.foot')
</html>