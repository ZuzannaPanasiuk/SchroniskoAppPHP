<footer>
    <div>
        @if(Auth::check())
        <a href="<?=config('app.url'); ?>/wyloguj">Wyloguj</a>
        @else
        <a href="<?=config('app.url'); ?>/loguj">Zaloguj</a>
        @endif
        <a href="<?=config('app.url'); ?>/zwierzeta/list_admin">Zwierzęta</a>
        <a href="<?=config('app.url'); ?>/klienci/list">Klienci</a>
        <a href="<?=config('app.url'); ?>/wolontariusze/list">Wolontariusze</a>
        <a href="<?=config('app.url'); ?>/adopcje/list">Adopcje</a>
        <a href="<?=config('app.url'); ?>/tymczas/list_current">Domy tymczasowe</a>
    </div>
</footer>