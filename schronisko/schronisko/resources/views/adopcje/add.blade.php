<!DOCTYPE html>
<html>
@include('partials.head')
<body>
 @include('partials.navi')
 <div id="zawartosc">
 <form class="form-inline" action ="<?=config('app.url'); ?>/adopcje/save" method = "post" >
 @csrf

 <select name="klient_id" id="klient_id" required>
 @foreach($klienci as $el)
            <option for="klient_id" value="{{$el->id}}">{{$el->imie}} {{$el->nazwisko}} ({{$el->email}})</option>
 @endforeach
 </select>

 <select name="zwierze_id" id="zwierze_id" required>
 @foreach($zwierzeta as $el)
            <option for="zwierze_id" value="{{$el->id}}">{{$el->id}} {{$el->imie}}</option>
 @endforeach
 </select>

 <p>
 <label for="data">Data Adopcji</label>
 <input type="date" id="data" name="data">
 </p>

 <p><button type="submit" class="btn btn-primary mb-2">Dodaj</button></p>
 </form>
</div>
</body>
@include('partials.foot')
</html>