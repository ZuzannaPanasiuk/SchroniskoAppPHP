<!DOCTYPE html>
<html>
@include('partials.head')
<body>
 @include('partials.navi')
 <div id="zawartosc">
 <form class="form-inline" action ="<?=config('app.url'); ?>/zwierzeta/save" method = "post" >
 @csrf
 <p>
 <label for="imie">Imię</label>
 <input id="imie" name="imie" size="20" required></input>
 </p>
 <p>
 <label for="gatunek">Gatunek</label>
 <input id="gatunek" name="gatunek" size="10" placeholder="kot" required></input>
 </p>
 <p>
 <select name="plec" id="plec" required>
 <option for="plec" value='K'>K</option>
 <option for="plec" value='M'>M</option>
 <option for="plec" value='?'>?</option>
</select>
 </p>
 <p>
 <label for="rasa">Rasa</label>
 <input id="rasa" name="rasa" size="35" required></input>
 </p>
 <p>
 <label for="wiek">Wiek</label>
 <input id="wiek" name="wiek" size="4" required></input>
 </p>
 <p>
 <label for="historia">Historia</label>
 <textarea id="historia" name="historia" placeholder="Historia zwierzęcia" required></textarea>
 </p>
 <p><button type="submit" class="btn btn-primary mb-2">Dodaj</button></p>
</div>
 </form>
</body>
@include('partials.foot')
</html>