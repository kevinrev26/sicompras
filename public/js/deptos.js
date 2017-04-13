let application = new Vue({
  el: '#departamentos',
  data : {
    identificador : 0,
    departamentos: "",
  },
  watch: {
    'identificador' : function (newVal, oldVal) {
      //console.log("Seleccionado: " + newVal);
      this.$http.get('institutions/' + newVal + '/deparments').then( resp => {
        /*Succes*/
        //console.log(resp.body);
        if( resp.body.length >0 ){
          console.log(resp.status);
          this.departamentos = resp.body;

        } else {
          console.log("No existen departamentos en esa institucion");
        }
      }, resp => {
        /*Fail*/
        console.log(resp.body);
      } );
    }
  }
});
