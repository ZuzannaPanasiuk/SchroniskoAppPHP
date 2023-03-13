<!DOCTYPE html>
<html lang="pl">
 @include('partials.head')
 <body>
 @include('partials.navi')
 <div id="zawartosc">
 <h2>Error Message</h2>
 <p>{{$message}}</p>
</div>
 </body>
 @include('partials.foot')
</html>