<!DOCTYPE html>
<html>
@include('partials.head')
<body>
 @include('partials.navi')
 <div id="zawartosc">
 <h2>Zmień informacje o zwierzęciu</h2>
 <form class="form-inline" action ="<?=config('app.url'); ?>/zwierzeta/update/{{$zwierze->id}}" method = "post" >
 @csrf
 <p>
 <label for="imie">Imię</label>
 <input id="imie" name="imie" size="20" value="{{$zwierze->imie}}" required></input>
 </p>
 <p>
 <label for="gatunek">Gatunek</label>
 <input id="gatunek" name="gatunek" size="10" value="{{$zwierze->gatunek}}" required></input>
 </p>
 <p>
 <select name="plec" id="plec" required>
 <option for="plec" value='K' @if($zwierze->plec == 'K') checked @endif>K</option>
 <option for="plec" value='M' @if($zwierze->plec == 'M') checked @endif>M</option>
 <option for="plec" value='?' @if($zwierze->plec == '?') checked @endif>?</option>
</select>
 </p>
 <p>
 <label for="rasa">Rasa</label>
 <input id="rasa" name="rasa" size="35" value="{{$zwierze->rasa}}" required></input>
 </p>
 <p>
 <label for="wiek">Wiek</label>
 <input id="wiek" name="wiek" size="4" value="{{$zwierze->wiek}}" required></input>
 </p>
 <p>
 <label for="historia">Historia</label>
 <textarea id="historia" name="historia" value="{{$zwierze->historia}}" required>{{$zwierze->historia}}</textarea>
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