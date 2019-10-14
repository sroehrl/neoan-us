let contactForm = document.querySelector('#contact-form');
contactForm.addEventListener('submit',(ev)=>{
    ev.preventDefault();
    // quick check
    let body = {};
    [...contactForm.elements].forEach(ele=>{
        if(ele.name.length>1){
            body[ele.name] = ele.value;
        }
    });

    axios.post('{{base}}api.v1/contact',body).then(res=>{
        alert(res.body);
    }).catch(err=>{
        alert('ERROR: '+err.response.data.error)})
});

const burgers = document.querySelectorAll('.navbar-burger');
burgers.forEach(e =>{
    e.addEventListener('click',_=>{
        const target = document.getElementById(e.dataset.target);
        e.classList.toggle('is-active');
        target.classList.toggle('is-active');
    })
})