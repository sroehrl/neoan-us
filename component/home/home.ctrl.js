
ScrollReveal().reveal('.reveal',{delay:500});

/*tab card*/
const tabSystem = {
    init(){
        document.querySelectorAll('.tabs-menu').forEach(tabMenu => {
            Array.from(tabMenu.children).forEach((child, ind) => {
                child.addEventListener('click', (ev) => {
                    ev.preventDefault();
                    tabSystem.toggle(child.dataset.target);
                });
                if(child.className.includes('bg-accent')){
                    tabSystem.toggle(child.dataset.target);
                }
            });
        });
    },
    toggle(targetId){
        document.querySelectorAll('.tabs-content').forEach(contentElement=>{
            contentElement.style.display = contentElement.id === targetId ? 'block' : 'none';
            document.querySelector(`[data-target="${contentElement.id}"]`).classList[contentElement.id === targetId ? 'add' : 'remove']('bg-accent');
        })
    },
};
/* same height */
let highest = 300;
const sameHeightElements = document.querySelectorAll('.same-height');
const calcList = document.querySelectorAll('.calc-list');
sameHeightElements.forEach(element => {
    console.log(element.clientHeight)
    if(element.clientHeight>highest){

        highest = element.clientHeight;
    }
})
sameHeightElements.forEach(element => {
    element.style.height = highest + 'px';
})
calcList.forEach(element => {
    element.style.height = (highest - 160) + 'px';
})
tabSystem.init();
