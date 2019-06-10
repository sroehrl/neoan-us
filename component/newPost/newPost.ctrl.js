tinymce.init({
    selector: '#new-post-editor'
});

let posting = new Vue({el: '#posting', data: {
    category:'',
    categories:[
        {name:'Other'}
    ]
    }});
