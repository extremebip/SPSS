var app = new Vue({
    el: "#app",
    data: {
        editButton : {
            backgroundColor: '#fff',
            borderColor: '#000',
        },
        uneditButton: {
            backgroundColor: '#000',
            borderColor: '#fff',
        },
        editIcon: {
            color: '#000',
        },
        uneditIcon: {
            color: '#fff',
        },
        editableClass: 'form-control',
        uneditableClass: 'form-control-plaintext',
        editable: false
    },
    methods: {
        enableEdit() {
            this.editable = !this.editable
        },
    }
})
