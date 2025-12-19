// Small helper JS for interactive lists
(function(){
    // Add accessible role and keyboard support to rows that have onclick
    document.addEventListener('DOMContentLoaded', function(){
        var rows = document.querySelectorAll('tr[onclick]');
        rows.forEach(function(r){
            r.classList.add('clickable');
            r.setAttribute('role','link');
            r.setAttribute('tabindex','0');
            r.addEventListener('keydown', function(e){
                if(e.key === 'Enter' || e.key === ' ') {
                    // emulate click
                    r.click();
                    e.preventDefault();
                }
            });
        });
    });
})();
