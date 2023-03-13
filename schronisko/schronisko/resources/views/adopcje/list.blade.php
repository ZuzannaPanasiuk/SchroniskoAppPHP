<!DOCTYPE html>
<html lang="pl">
 @include('partials.head')
 <body>
 @include('partials.navi')
 <div id="zawartosc">
 <h2>Lista Adopcji</h2>
 <table>
 <thead>
 <tr> <th>Id</th> <th>Imię i Nazwisko Klienta</th> <th>Imię Zwirzęcia</th> <th>Data Adopcji</th> </tr>
 </thead>
 <tbody>
 @foreach($adopcja as $el)
    <tr> <td>{{$el->id}}</td> <td>{{$el->imie_klienta}} {{$el->nazwisko}}</td> <td>{{$el->imie_zwierzecia}}</td>
    <td>{{$el->data}}</td>
    <td><a href="<?=config('app.url'); ?>/adopcje/edit/{{$el->id}}">Edycja</a></td>
    <td><a href="<?=config('app.url'); ?>/adopcje/show/{{$el->id}}">Usuwanie</a></td> 
    </tr>
 @endforeach
 </tbody>
 </table>
 <a href="<?=config('app.url'); ?>/adopcje/add">Dodawanie</a>
 </div>
 @include('partials.foot')
 </body>
</html>