import Vue from '{{vue}}';

Vue.component('registration-form', {
    data:()=>{
        return {
            username:'',
            password:''
        }
    },
    methods:{
        register(){

            console.log(this.password);
        }
    },
    template:document.querySelector('#register').innerHTML
});

new Vue({
    el: '#registration',
    data:{
        username:'choose',
        password:''
    }
});