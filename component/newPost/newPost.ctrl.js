tinymce.init({
    selector: '#new-post-editor'
});

let posting = new Vue({
    el: '#posting', data: {
        category: '',
        public:true,
        isDraft:true,
        name:'',
        keywords:'',
        categories: [
            {name: 'Other'}
        ]
    },
    methods:{
        saveDraft(){
            let obj = this._data;
            obj.action = 'draft';
            api.post('newPost',obj).then(res=>{

            })
        }
    }

});
