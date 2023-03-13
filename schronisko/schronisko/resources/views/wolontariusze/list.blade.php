<!DOCTYPE html>
<html lang="pl">
 @include('partials.head')
 <body>
 @include('partials.navi')
 <div id="zawartosc">
 <h2>Lista Wolontariuszy</h2>
 <table>
 <thead>
 <tr> <th>Id</th> <th>Imię</th> <th>Nazwisko</th> <th>Nr telefonu</th> <th>Rola</th></tr>
 </thead>
 <tbody>
 @foreach($wolontariusz as $el)
 <tr> 
 <td>{{$el->id}}</td> <td>{{$el->imie}}</td> <td>{{$el->nazwisko}}</td> <td>{{$el->nr_tel}}</td> <td>{{$el->rola}}</td> 
 <td><a href="<?=config('app.url'); ?>/wolontariusze/edit/{{$el->id}}">Edycja</a></td>
 <td><a href="<?=config('app.url'); ?>/wolontariusze/show/{{$el->id}}">Usuwanie</a></td>
</tr>
 @endforeach
 </tbody>
 </table>
 </div>
 @include('partials.foot')
 </body>
</html>