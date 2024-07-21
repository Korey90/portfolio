    // Funkcja do animowania paska postępu
    function animateProgressBar(progressElement) {
        var finalWidth = parseFloat(progressElement.querySelector('.progress-bar').getAttribute('data-final-width'));
        var progressBar = progressElement.querySelector('.progress-bar');
        var progress = 0;
        var speed = 15; // Szybkość animacji (im mniejsza wartość, tym szybciej)
        var increment = finalWidth / speed;
    
        var interval = setInterval(function() {
            if (progress >= finalWidth) {
                clearInterval(interval);
            } else {
                progress += increment;
                progressBar.style.width = progress + '%';
            }
        }, 10); // Interwał czasowy
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        var progressElements = document.querySelectorAll('li');
    
        progressElements.forEach(function(progressElement) {
            progressElement.addEventListener('mouseenter', function() {
                progressElement.classList.add('hover');
                animateProgressBar(progressElement);
            });
    
            progressElement.addEventListener('mouseleave', function() {
                progressElement.classList.remove('hover');
                var progressBar = progressElement.querySelector('.progress-bar');
                progressBar.style.width = '0%'; // Zresetowanie paska postępu po opuszczeniu kursorem
            });
        });
    });

    