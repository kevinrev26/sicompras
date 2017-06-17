Array.prototype.remove = function (id){
  let arreglo = this;
  let indice;
  for(let i=0; i < arreglo.length; i++  ){
    if( id === arreglo[i].id ){
      let indice = i;
    }
  }

  //this = arreglo.splice(indice, 1);
  this.splice(indice,1);
};

let vm = new Vue({
  el: '#solicitudes',
  data: {
    equipo: '',
    equipments : [],
  },
  methods : {
    addEquip : function (e){
      e.preventDefault();
      let valores = this.equipo.split('-');
      let _equipo = {
        id : valores[0],
        nombre: valores[1]
      }

      this.equipments.push(_equipo);

    },
    removeEquip : function (id) {
      this.equipments.remove(id);
    },
    checkEquip: function (e) {
      if (!this.equipments.length > 0){
        e.preventDefault();
        alert("No se han agregado equipos");
      }
      if (this.equipments.length > 1){
        e.preventDefault();
        alert("La Solicitud de Mantenimiento solo admite un equipo");
      }
      }
    }
  }
);
