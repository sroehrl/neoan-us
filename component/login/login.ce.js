
new Vue({
    el:'#login-form',
    data:{
        username:'',
        password:'',
        loggedIn:localStorage.token,
        valid:true
    },
    mounted(){
        if(this.loggedIn){
            // check if still valid token
            api.get('register').catch(e=>{
                this.logout();
            })
        }
    },
    methods:{
        login(){
            this.valid = true;
            api.post('login',this._data).then(res=>{
                this.updateStatus(res.data.token);
            }).catch(err=>{
                this.valid = false;
            })
        },
        toRegistration(){
            window.location.href = '{{base}}register'
        },
        updateStatus(token){
            console.log(token);
            if(token){
                localStorage.token = token;
                this.loggedIn = token;
            } else {
                delete localStorage.token;
                this.loggedIn = false;
            }
        }
    },
    template:document.querySelector('#login').innerHTML
});
