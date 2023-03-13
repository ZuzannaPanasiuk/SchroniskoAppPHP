<!DOCTYPE html>
<html lang="pl">
 @include('partials.head')
 <body>
 @include('partials.navi')
 <div id="zawartosc">
 <h2>Zmień informacje o adopcji</h2>
 <form class="form-inline" action="<?=config('app.url'); ?>/adopcje/update/{{$adopcja->id}}" method = "post" >
 @csrf

    <p>
        <label for="id">Adopcja Id:</label>
        <input id="id" name="id" value="{{$adopcja->id}}" readonly>
    </p>

    <label for="klient_info">Klient w Bazie:</label>
    @foreach ($adopcje as $el)
        @if($el->id === $adopcja->id)
            <p id="klient_info">
                {{$el->imie_klienta}} {{$el->nazwisko}} ({{$el->email}})
            </p>
        @endif
    @endforeach
    
    <select name="klient_id" id="klient_id" required>
    @foreach($klienci as $el)
            <option for="klient_id" value="{{$el->id}}">{{$el->imie}} {{$el->nazwisko}} ({{$el->email}})</option>
    @endforeach
    </select>

    <label for="zwierze_info">Zwierze w Bazie:</label>
    @foreach ($adopcje as $el)
        @if($el->id === $adopcja->id)
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

    <label for="data_info">Data w Bazie:</label>
    @foreach ($adopcje as $el)
        @if($el->id === $adopcja->id)
    <p id="data_info">
        {{$el->data}}
    </p>
    @endif
    @endforeach

    <p>
        <label for="data">Data Adopcji</label>
        <input type="date" id="data" name="data">
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