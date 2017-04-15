Vue.component('modal', {
  template: '#modal-template',
  props: ['show'],
  methods: {
    savePost: function () {
      // Insert AJAX call here...
      this.show = false;
    }
  }
});

new Vue({
  el: '#app',
  data: {
    showModal: false
  }
});
