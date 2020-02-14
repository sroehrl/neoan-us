let contactForm = document.querySelector('#contact-form');
if(contactForm){
    contactForm.addEventListener('submit',(ev)=>{
        ev.preventDefault();
        // quick check
        let body = {};
        [...contactForm.elements].forEach(ele=>{
            if(ele.name.length>1){
                if(typeof ele.options !== 'undefined'){
                    body[ele.name] = [];
                    for(let i = 0; i < ele.options.length;i++){
                        if(ele.options[i].selected){
                            body[ele.name].push(ele.options[i].value);
                        }
                    }

                } else {
                    body[ele.name] = ele.value;
                }

            }
        });

        axios.post('{{base}}api.v1/contact',body).then(res=>{
            alert('Thank you. I will get back to you as soon as possible.');
            contactForm.style.display = 'none';
        }).catch(err=>{
            alert('ERROR: '+err.response.data.error)})
    });
}


const burgers = document.querySelectorAll('.navbar-burger');
burgers.forEach(e =>{
    e.addEventListener('click',_=>{
        const target = document.getElementById(e.dataset.target);
        e.classList.toggle('is-active');
        target.classList.toggle('is-active');
    })
});
