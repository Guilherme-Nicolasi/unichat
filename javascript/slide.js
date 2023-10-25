document.addEventListener('DOMContentLoaded', (event)=>{
    const form = document.querySelectorAll('.form');
    if(form) {
        form.forEach(form => {
            form.style.opacity = '1';
            form.style.transform = 'translateX(0%)';
        });
    }
});