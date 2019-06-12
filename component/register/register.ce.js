let $storage = window.localStorage;

const registerForm = {
    name: 'register-form',
    data:()=>{
        return {
            username:'',
            password:'',
            acceptTAC:false,
            loggedIn:$storage.token
        }
    },
    created(){
        console.log($storage);
    },

    methods:{
        register(){

            console.log(this);
        }
    },
    template:document.querySelector('#register').innerHTML
};
