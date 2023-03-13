<!DOCTYPE html>
<html lang="pl">
 @include('partials.head')
 <body>
 @include('partials.navi')
 <div id="zawartosc">
 <h2>Lista kont klientów</h2>
 <table>
 <thead>
 <tr> <th>Id</th> <th>Imię</th> <th>Nazwisko</th> <th>Email</th> </tr>
 </thead>
 <tbody>
 @foreach($klient as $el)
    <tr> <td>{{$el->id}}</td> <td>{{$el->imie}}</td> <td>{{$el->nazwisko}}</td> <td>{{$el->email}}</td> 
 <td><a href="<?=config('app.url'); ?>/klienci/edit/{{$el->id}}">Edycja</a></td>
 <td><a href="<?=config('app.url'); ?>/klienci/show/{{$el->id}}">Usuwanie</a></td> 
    </tr>
@endforeach
 </tbody>
 </table>
 <a href="<?=config('app.url'); ?>/klienci/add">Dodawanie</a>
 </div>
 @include('partials.foot')
 </body>
</html>