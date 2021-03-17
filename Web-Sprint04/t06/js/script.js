document.addEventListener("DOMContentLoaded", function() {
    let lazy = document.querySelectorAll("img.lazy");    
    let timeout;
    let num = document.getElementById('num');
    let images = document.getElementsByTagName('img');
    let collection;
    let check = true;
        
    function lazyload () {
        if(timeout)
            clearTimeout(timeout);
          
        timeout = setTimeout(function() {
            let scrollTop = window.pageYOffset;
            lazy.forEach(function(img) {
                if(img.offsetTop < (window.innerHeight + scrollTop)) {                
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    collection = document.getElementsByClassName('lazy');
                    num.innerHTML = '';
                    num.insertAdjacentHTML('beforeend', `${images.length - collection.length}`);
                    if (check && collection.length === 0) {
                        check = false;
                        let label = document.getElementsByTagName('label')[0];
                        label.classList.add('finish');
                        setTimeout(function() { label.style.display = 'none'; }, 3000);
                    }
                }
            });
            if(lazy.length == 0) { 
                document.removeEventListener("scroll", lazyload);
            }
        }, 250);
    }
    document.addEventListener("scroll", lazyload);
});
