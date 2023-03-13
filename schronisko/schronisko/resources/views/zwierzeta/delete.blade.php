<!DOCTYPE html>
<html lang="pl">
 @include('partials.head')
 <body>
 @include('partials.navi')
 <div id="zawartosc">
 <h2>Potwierdzenie - Usuń Zwierzaka o Id: {{$zwierze->id}}</h2>
 <form class="form-inline" action="<?=config('app.url'); ?>/zwierzeta/delete/{{$zwierze->id}}" method = "post" >
 @csrf
 <p>
 <label for="imie">Imię</label>
 <input id="imie" name="imie" value="{{$zwierze->imie}}" readonly></input>
 </p>
 <p>
 <label for="gatunek">Gatunek</label>
 <input id="gatunek" name="gatunek" value="{{$zwierze->gatunek}}" readonly></input>
 </p>
 <p>
 <label for="plec">Płeć</label>
 <input id="plec" name="plec" value="{{$zwierze->plec}}" readonly></input>
</select>
 </p>
 <p>
 <label for="rasa">Rasa</label>
 <input id="rasa" name="rasa" value="{{$zwierze->rasa}}" readonly></input>
 </p>
 <p>
 <label for="wiek">Wiek</label>
 <input id="wiek" name="wiek" value="{{$zwierze->wiek}}" readonly></input>
 </p>
 <p>
 <label for="historia">Historia</label>
 <textarea id="historia" name="historia" value="{{$zwierze->historia}}" readonly>{{$zwierze->historia}}</textarea>
 </p>
    <p><button type="submit" class="btn btn-primary mb-2">Usuń</button></p>
</form>

</div>
 </body>
 @include('partials.foot')
</html>