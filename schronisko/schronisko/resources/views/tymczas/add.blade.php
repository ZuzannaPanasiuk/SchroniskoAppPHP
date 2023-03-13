<!DOCTYPE html>
<html>
@include('partials.head')
<body>
 @include('partials.navi')
 <div id="zawartosc">
 <form class="form-inline" action ="<?=config('app.url'); ?>/tymczas/save" method = "post" >
 @csrf

 <select name="wolontariusz_id" id="wolontariusz_id" required>
 @foreach($wolontariusz as $el)
            <option for="wolontariusz_id" value="{{$el->id}}">{{$el->imie}} {{$el->nazwisko}} ({{$el->nr_tel}})</option>
 @endforeach
 </select>

 <select name="zwierze_id" id="zwierze_id" required>
 @foreach($zwierzeta as $el)
            <option for="zwierze_id" value="{{$el->id}}">{{$el->id}} {{$el->imie}}</option>
 @endforeach
 </select>

 <p>
 <label for="data_poczatkowa">Data początkowa Tymczasu</label>
 <input type="date" id="data_poczatkowa" name="data_poczatkowa">
 </p>

 <p>
 <label for="data_koncowa">Data końcowa Tymczasu</label>
 <input type="date" id="data_koncowa" name="data_koncowa">
 </p>

 <p><button type="submit" class="btn btn-primary mb-2">Dodaj</button></p>
 </form>
</div>
</body>
@include('partials.foot')
</html>