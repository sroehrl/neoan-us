new Vue({
    el:'#header',
    data:{
        text:'',
        tests:[1,2,3,4,5]
    },
    watch:{
        text: function (newV,oldV) {
            this.debounceSearch();
        }
    },
    created:function(){
        this.debounceSearch = _.debounce(this.ajaxSearch,300);
    },
    methods:{
        ajaxSearch:function(){
            api.get('search?q='+this.text).then(res=>{
                console.log(res.data);
            })
        }
    }
});
