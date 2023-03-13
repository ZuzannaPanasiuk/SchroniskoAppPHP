<!DOCTYPE html>
<html lang="pl">
 @include('partials.head')
 <body>
 @include('partials.navi')
 <div id="zawartosc">
 <h2>Potwierdzenie - Usuń Tymczas o Id: {{$tymczas->id}}</h2>
 <form class="form-inline" action="<?=config('app.url'); ?>/tymczas/delete/{{$tymczas->id}}" method = "post" >
 @csrf
    <p>
        <label for="id">Tymczas Id:</label>
        <input id="id" name="id" value="{{$tymczas->id}}" readonly>
    </p>

    <label for="wolontariusz_info">Wolontariusz:</label>
    @foreach ($tymczasy as $el)
        @if($el->id === $tymczas->id)
            <input id="wolontariusz_info" size="35" value="{{$el->imie_wolontariusza}} {{$el->nazwisko}} ({{$el->nr_tel}})" readonly> <br><br>
        @endif
    @endforeach

    <label for="zwierze_info">Zwierze:</label>
    @foreach ($tymczasy as $el)
        @if($el->id === $tymczas->id)
            <input id="zwierze_info" value="{{$el->imie_zwierzecia}}" readonly> <br><br>
        @endif
    @endforeach

    <label for="data_info">Data Początkowa:</label>
    @foreach ($tymczasy as $el)
        @if($el->id === $tymczas->id)
            <input id="data_poczatkowa_info" value="{{$el->data_poczatkowa}}" readonly> 
        @endif
    @endforeach

    <label for="data_info">Data Końcowa:</label>
    @foreach ($tymczasy as $el)
        @if($el->id === $tymczas->id)
            <input id="data_poczatkowa_info" value="{{$el->data_koncowa}}" readonly> 
        @endif
    @endforeach

    <p><button type="submit" class="btn btn-primary mb-2">Usuń</button></p>
</form>

</div>
 </body>
 @include('partials.foot')
</html>