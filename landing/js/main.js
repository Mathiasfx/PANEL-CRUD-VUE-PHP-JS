var app = new Vue({

    el: '#app',
    data: {
        productos:[],
    },

    mounted: function(){
        this.ObtenerProductos();
    },

    methods: {

        ObtenerProductos() {
            axios.get("read.php?action=read").then(function (response) {
               
                    app.productos = response.data.productos;
                
            })
        },
      
    }



});