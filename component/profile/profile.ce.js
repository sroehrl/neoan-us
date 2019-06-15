new Vue({
    el:'#profile',
    data:{
        tabs:[
            {name:'My articles'},
            {name:'API'},
            {name:'Settings'},
        ],
        currentTab:0,
        author:{}
    },
    created(){
        this.author = JSON.parse(localStorage.user);
    }

});