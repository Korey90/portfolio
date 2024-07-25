<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="@yield('meta_description', 'Domyślny opis strony')">
    <meta name="keywords" content="@yield('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')">

    <title>@yield('title', 'Domyślny Tytuł Strony')</title>


    
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- FontsAwsome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- local css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/prismjs@1.29.0/themes/prism.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/prismjs@1.29.0/prism.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    @include('partials.navigation')

    @include('partials.header')

    @yield('content')

    @include('partials.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>


    <script>
/*
        // Tworzenie nowego elementu <link> do załadowania CSS
        var link = document.createElement('link');
        link.rel = 'stylesheet';
        link.type = 'text/css';
        link.href = 'https://unpkg.com/aos@2.3.1/dist/aos.css'; // Ścieżka do pliku CSS

        // Wstawienie elementu <link> do <head>
        document.head.appendChild(link);

        (function() {
            var devtools = false;
            var threshold = 160;
            
            function checkDevTools() {
                var widthThreshold = window.outerWidth - window.innerWidth > threshold;
                var heightThreshold = window.outerHeight - window.innerHeight > threshold;
                if (widthThreshold || heightThreshold) {
                    if (!devtools) {
                        devtools = true;
                        console.log('WYPAD!!!');
                        alert('Narzędzia deweloperskie są otwarte! Za chwile zostaniesz Wyjebany z tąd w pizdu!');
                        window.location.href = 'https://www.google.com'; // Ścieżka do strony z komunikatem o braku internetu
                    }
                } else {
                    devtools = false;
                }
            }
        
            setInterval(checkDevTools, 1000);
        })();
*/
    </script>
</body>
</html>
