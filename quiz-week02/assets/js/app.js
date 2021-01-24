new Vue({
  el: "#app",
  data: {
    key: "",
    buttonLabel: "Add",
    user: "",
    users: [
      {
        name: "Dian",
      },
      {
        name: "Imam",
      },
      {
        name: "Deni",
      },
    ],
  },
  methods: {
    addEdit: function (key) {
      if (this.buttonLabel === "Add") {
        const newUser = { name: this.user };
        this.users.push(newUser);
        this.user = "";
      } else {
        const updatedUser = { name: this.user };
        this.users[key] = updatedUser;
        this.buttonLabel = "Add";
        this.user = "";
      }
    },
    deleteUser: function (index) {
      this.users.splice(index, 1);
    },
    showUser: function (index) {
      this.user = this.users[index].name;
      this.buttonLabel = "Update";
      this.key = index;
    },
  },
});
