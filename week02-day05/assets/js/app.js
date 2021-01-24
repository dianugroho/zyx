Vue.component('comments', {
  template: `
    <div>
      <button>+</button><br />
      <br />
      <button>-</button>
    </div>
  `
});

new Vue({
  el: "#app",
  data: {
    commentText: '',
  }
});
