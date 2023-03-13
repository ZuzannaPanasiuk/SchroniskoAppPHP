<!DOCTYPE html>
<html lang="pl">
 @include('partials.head')
 <body>
 @include('partials.navi')
 <div id="zawartosc">
 <h2>Zmień informacje o tymczasie (pobycie zwierzaka w domu tymczasowym)</h2>
 <form class="form-inline" action="<?=config('app.url'); ?>/tymczas/update/{{$tymczas->id}}" method = "post" >
 @csrf

    <p>
        <label for="id">Tymczas Id:</label>
        <input id="id" name="id" value="{{$tymczas->id}}" readonly>
    </p>

    <label for="wolontariusz_info">Wolontariusz w Bazie:</label>
    @foreach ($tymczasy as $el)
        @if($el->id === $tymczas->id)
            <p id="wolontariusz_info">
                {{$el->imie_wolontariusza}} {{$el->nazwisko}} ({{$el->nr_tel}})
            </p>
        @endif
    @endforeach

    <select name="wolontariusz_id" id="wolontariusz_id" required>
    @foreach($wolontariusze as $el)
            <option for="wolontariusz_id" value="{{$el->id}}">{{$el->imie}} {{$el->nazwisko}} ({{$el->nr_tel}})</option>
    @endforeach
    </select>

    <label for="zwierze_info">Zwierze w Bazie:</label>
    @foreach ($tymczasy as $el)
        @if($el->id === $tymczas->id)
            <p id="zwierze_info">
                {{$el->imie_zwierzecia}}
            </p>
        @endif
    @endforeach

    <select name="zwierze_id" id="zwierze_id" required>
    @foreach($zwierzeta as $el)
            <option for="zwierze_id" value="{{$el->id}}">{{$el->id}} {{$el->imie}}</option> 
    @endforeach
    </select>

    <label for="data_info">Data Początkowa w Bazie:</label>
    @foreach ($tymczasy as $el)
        @if($el->id === $tymczas->id)
    <p id="data_info">
        {{$el->data_poczatkowa}}
    </p>
    @endif
    @endforeach

    <p>
        <label for="data_poczatkowa">Data Początkowa:</label>
        <input type="date" id="data_poczatkowa" name="data_poczatkowa">
    </p>


    <label for="data_info">Data Końcowa w Bazie:</label>
    @foreach ($tymczasy as $el)
        @if($el->id === $tymczas->id)
    <p id="data_info">
        {{$el->data_koncowa}}
    </p>
    @endif
    @endforeach

    <p>
        <label for="data_koncowa">Data Końcowa:</label>
        <input type="date" id="data_koncowa" name="data_koncowa">
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