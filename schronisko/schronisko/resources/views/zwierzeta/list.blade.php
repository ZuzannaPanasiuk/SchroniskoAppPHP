<!DOCTYPE html>
<html lang="pl">
 @include('partials.head')
 <body>
 @include('partials.navi')
 <div id="zawartosc">
 <h2>Lista zwierząt</h2>
 <table>
 <thead>
 <tr> <th>Imię</th> <th>Gatunek</th> <th>Płeć</th> <th>Rasa</th> <th>Wiek</th> <th>Historia</th> </tr>
 </thead>
 <tbody>
 @foreach($zwierze as $el)
 <tr> <td>{{$el->imie}}</td> <td>{{$el->gatunek}}</td> <td>{{$el->plec}}</td> <td>{{$el->rasa}}</td> <td>{{$el->wiek}}</td> <td>{{$el->historia}}</td> </tr>
 @endforeach
 </tbody>
 </table>
 </div>
 @include('partials.foot')
 </body>
</html>