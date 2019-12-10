const app = new Vue({
    el: '#app',
    data: {
        menu: true,
        respuesta: '',
        listar: [],
        buscar: '',
        itemId: '',
        formEditar: {},
        userPost: ''
    },
    created() {
        this.getCategoria()
        this.getUser()
        this.getId()
    },
    computed: {
        datosFiltrados() {
            return this.listar.filter((filtro) => {
                return filtro.titulo.toUpperCase().match(this.buscar.toUpperCase()) || filtro.descripcion.toUpperCase().match(this.buscar.toUpperCase())
            })
        }
    },
    methods: {
        alta() {
            const form = document.getElementById('altaPost')
            axios.post('../api/crud/altaPost.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    if (res.data == 'success') {
                        swal({
                            title: 'Buen trabajo',
                            text: 'Post Guardado!!',
                            icon: 'success',
                            button: 'Ok!'
                        })
                        form.reset()
                    } else {
                        swal('El post no se pudo guardar')
                    }
                })
        },
        getId() {
            let uri = window.location.href.split('?');
            if (uri.length == 2) {
                let vars = uri[1].split('&');
                let getVars = {};
                let tmp = '';
                vars.forEach(function(v) {
                    tmp = v.split('=');
                    if (tmp.length == 2) {
                        getVars[tmp[0]] = tmp[1];
                    }
                });
                this.itemId = getVars
                console.log(this.itemId.id)
                axios.get('http://localhost/snippets/api/crud/getId.php?id=' + this.itemId.id)
                    .then(res => {
                        this.formEditar = res.data
                    })
            }
        },
        editar() {
            const form = document.getElementById('editarPost')
            axios.post('../api/crud/editarPost.php', new FormData(form))
                .then(res => {
                    this.respuesta = res.data
                    if (res.data == 'success') {
                        location.href = 'index.php'
                    } else {
                        swal('El post no se pudo editar')
                    }
                })
        },
        eliminar(id) {
            swal({
                    title: 'Seguro que deseas eliminar el post',
                    text: 'Al eliminarlo no podras recuperarlo',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((aceptar) => {
                    if (aceptar) {
                        axios.get('http://localhost/snippets/api/crud/eliminar.php?id=' + id)
                            .then(res => {
                                if (res.data == 'success') {
                                    swal('post eliminado')
                                    this.getCategoria()
                                } else {
                                    swal('post no eliminado')
                                }
                            })
                    } else {
                        return false
                    }
                })
        },
        getUser() {
            axios.get('http://localhost/snippets/api/crud/getUser.php')
                .then(res => {
                    this.userPost = res.data
                })
        },
        getCategoria() {
            let uri = window.location.href.split('?');
            if (uri.length == 2) {
                let vars = uri[1].split('&');
                let getVars = {};
                let tmp = '';
                vars.forEach(function(v) {
                    tmp = v.split('=');
                    if (tmp.length == 2) {
                        getVars[tmp[0]] = tmp[1];
                    }
                });
                this.itemId = getVars
                console.log(this.itemId.id)
                axios.get('http://localhost/snippets/api/crud/getCategoria.php?cat=' + this.itemId.cat)
                    .then(res => {
                        this.listar = res.data
                    })
            } else {
                axios.get('http://localhost/snippets/api/crud/getPost.php')
                    .then(res => {
                        this.listar = res.data
                    })
            }
        }
    }
})