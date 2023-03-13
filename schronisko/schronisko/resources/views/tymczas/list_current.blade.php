<!DOCTYPE html>
<html lang="pl">
 @include('partials.head')
 <body>
 @include('partials.navi')
 <div id="zawartosc">
 <h2>Zwierzęta aktualnie będące w domu tymczasowym</h2>
 <table>
 <thead>
 <tr> <th>Id</th> <th>Imię i Nazwisko Klienta</th> <th>Imie Zwierzaka</th> <th>Data początkowa</th> <th>Data końcowa</th> </tr>
 </thead>
 <tbody>
 @foreach($tymczas as $el)
 <?php
 if($el->data_koncowa > date("Y-m-d"))
 {
    ?>
    <tr> <td>{{$el->id}}</td> <td>{{$el->imie_wolontariusza}} {{$el->nazwisko}}</td>
    <td>{{$el->imie_zwierzecia}}</td> <td>{{$el->data_poczatkowa}}</td> <td>{{$el->data_koncowa}}</td>
    <td><a href="<?=config('app.url'); ?>/tymczas/edit/{{$el->id}}">Edycja</a></td>
    <td><a href="<?=config('app.url'); ?>/tymczas/show/{{$el->id}}">Usuwanie</a></td> 
    </tr> 
    <?php
 }
 ?>
 @endforeach
 </tbody>
 </table>
 <a href="<?=config('app.url'); ?>/tymczas/add">Dodawanie</a>
 </div>
 <a href="<?=config('app.url'); ?>/tymczas/list_archive">
 <button class="przycisk">Archiwum</button>
 </a>
 @include('partials.foot')
 </body>
</html>