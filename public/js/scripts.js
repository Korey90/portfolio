function animateProgressBar(e){var t=parseFloat(e.querySelector(".progress-bar").getAttribute("data-final-width")),r=e.querySelector(".progress-bar"),s=0,a=15,o=t/a,n=setInterval(function(){s>=t?clearInterval(n):(s+=o,r.style.width=s+"%")},10)}document.addEventListener("DOMContentLoaded",function(){document.querySelectorAll("li").forEach(function(e){e.addEventListener("mouseenter",function(){e.classList.add("hover"),animateProgressBar(e)}),e.addEventListener("mouseleave",function(){e.classList.remove("hover");var t=e.querySelector(".progress-bar");t.style.width="0%"})})});var link=document.createElement("link");link.rel="stylesheet",link.type="text/css",link.href="https://unpkg.com/aos@2.3.1/dist/aos.css",document.head.appendChild(link),AOS.init();
/*
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