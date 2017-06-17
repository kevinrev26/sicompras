console.log("WUUU");
let application = new Vue({
  el: '#empleados',
  data : {
    identificador : 0,
    empleados: "",
  },
  watch: {
    'identificador' : function (newVal, oldVal) {

      this.$http.get('/api/' + newVal + '/employees').then( resp => {
        //console.log('Nuevo valor: ' +newVal);
        /*Succes*/
        //console.log(resp.body);
        if( resp.body.length >0 ){
          console.log(resp.status);
          this.empleados = resp.body;

        } else {
          console.log("No existen empleados en esa institucion");
          this.empleados = "";
        }
      }, resp => {
        /*Fail*/
        console.log(resp.status);
      } ); //$http
    }//identificador
  }//watch
});
