{{-- Extend layout.main.blade.php --}}
@extends('layout.main')


{{-- Insert this content --}}
@section('main')
    <div class="wrapper">
        <div class="left">
            <h1><i class="bi bi-arrow-through-heart-fill"></i> Hello EduSlim </h1>
            <p><strong>EduSlim</strong> är ett väldigt enkelt ramverk för att skapa PHP-applikationer.
            Tanken är att erbjuda ett enkelt och smidigt ramverk som är lätt att förstå. Inlärningskurvan ska vara låg.
            </p>

            <p>
                Samtidigt ska det innehålla de saker som ett ramverk behöver för att vara smidigt att jobba med. 
                Därför finns <strong>routing</strong>, <strong>controllers</strong>, <strong> views </strong> och <strong>modeller</strong>.
                <i class="bi bi-emoji-heart-eyes"></i>
            </p>
            <p>Allt är composerbaserat och modulärt med inlånade saker från andra ramverk. (<i>Blade</i>, <i>dd</i>, <i>Whoops</i>)
            
        </div>

        <div class="right">
            <h3>Komma igång: <i class="bi bi-airplane-engines-fill right"></i>
            </i>
            </h3>
                <ul>
                    <li>Börja i <strong>Routes.php</strong></li>
                    <li>Där finns exempel på några olika sorters routes.</li>
                    <li>De länkar till en <strong>Controller</strong>.</li>
                    <li>Controllern i sin tur kan använda en <strong>View</strong> för att presentera innehållet.</li>
                    <li>Det finns ett mallspråk med som heter <strong>Blade</strong> som du kan använda i dina views. </li>
                </ul>
        </div>

    </div>

    <div class="wrapper">
        <div class="big dark">
            <h2>Routing</h2>
            <p>Skapa en route i <strong>Routes.php</strong> så här: </p>
            <pre><code class="language-php">Router::addRoute('GET', '/',[TestController::class,'show'] );</code></pre>
            <p>Det skapar en route på urlen / (rooten) som går till funktionen show i klassen TestController. Se nedan hur man går vidare. 
            <p>Eller så här(för urlen /test): </p>
            <pre><code class="language-php">Router::addRoute('GET', '/test',[TestController::class,'test'] );</code></pre>
            <p>Skapar en route för pathen /test som går till methoden test i klassen TestController</p>
        </div>
    </div>
    <div class="wrapper">
        <div class="big dark">
            <h2>Controllers</h2>
            <p>Använd en controller för att ta hand om requestet: </p>
            <pre><code class="language-php">class TestController{
    public static function show(Request $request){
        return blade('hello');      
    }
}</code></pre>

<p>Ovanstående kod laddar filen <strong>Views/hello.blade.php</strong></p>
<p>En controllers metod ska alltid returnera något. </p>
        </div>
    </div>
@endsection