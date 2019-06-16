new Vue({
    el:'#profile',
    data:{
        tabs:[
            {name:'My articles',hash:'articles'},
            {name:'API',hash:'api'},
            {name:'Settings',hash:'settings'},
        ],
        currentTab:'articles',
        author:{}
    },
    created(){
        this.author = JSON.parse(localStorage.user);
        this.getHash();
    },
    methods:{
        getHash(){
            if(window.location.hash){
                this.setHash(window.location.hash.substring(1));
            } else {
                this.setHash('articles')
            }
        },
        setHash(hash){
            this.currentTab = hash;
            window.location.hash = hash;
        }
    }

});