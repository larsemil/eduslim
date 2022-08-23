{{-- Extend layout.main.blade.php --}}
@extends('layout.main')


{{-- Insert this content --}}
@section('main')
    <div class="wrapper">
        <div class="left">
            <h1>Hello EduSlim</h1>
            <p><strong>EduSlim</strong> är ett väldigt enkelt ramverk för att skapa PHP-applikationer.
            Tanken är att erbjuda ett enkelt och smidigt ramverk som är lätt att förstå. Inlärningskurvan ska vara låg.
            </p>

            <p>
                Samtidigt ska det innehålla de saker som ett ramverk behöver för att vara smidigt att jobba med. 
                Därför finns <strong>routing</strong>, <strong>controllers</strong>, <strong> views </strong> och <strong>modeller</strong>.

            </p>
            <p>Allt är composerbaserat och modulärt med inlånade saker från andra ramverk. (<i>Blade</i>, <i>dd</i>, <i>Whoops</i>)
            
        </div>

        <div class="right">
            <h3>Komma igång: </h3>
                <ul>
                    <li>Börja i <strong>Routes.php</strong></li>
                    <li>Där finns exempel på några olika sorters routes.</li>
                    <li>De länkar till en <strong>Controller</strong>.</li>
                    <li>Controllern i sin tur kan använda en <strong>View</strong> för att presentera innehållet.</li>
                </ul>
        </div>

    </div>
@endsection