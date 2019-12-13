
ScrollReveal().reveal('.reveal',{delay:500});

/*tab card*/
const tabSystem = {
    init(){
        document.querySelectorAll('.tabs-menu').forEach(tabMenu => {
            Array.from(tabMenu.children).forEach((child, ind) => {
                child.addEventListener('click', () => {
                    tabSystem.toggle(child.dataset.target);
                });
                if(child.className.includes('is-active')){
                    tabSystem.toggle(child.dataset.target);
                }
            });
        });
    },
    toggle(targetId){
        console.log(targetId);
        document.querySelectorAll('.tabs-content').forEach(contentElement=>{
            contentElement.style.display = contentElement.id === targetId ? 'block' : 'none';
            document.querySelector(`[data-target="${contentElement.id}"]`).classList[contentElement.id === targetId ? 'add' : 'remove']('is-active');
        })
    },
};
tabSystem.init();
