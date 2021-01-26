<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="app">
        <label for="user">Nama</label>
        <input type="text" v-model="user">
        <button @click="addEdit()">@{{ buttonLabel }}</button>
        <br />
        <ul>
            <li v-for="(usr, index) in users">
                @{{ usr.name }} <button @click="deleteUser(usr, index)">Delete</button> || <button @click="showUser(usr, index)">Edit</button>
            </li>
        </ul>
    </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>
<script>
    new Vue({
        el: "#app",
        data: {
            key: '',
            buttonLabel: "Add",
            userId: 0,
            user: "",
            users: [],
        },
        methods: {
            addEdit: function() {
                if (this.user !== '') {
                    const user = {
                        name: this.user
                    };

                    if (this.buttonLabel === "Add") {
                        this.$http.post('/api/users', user).then(response => {
                            this.users.unshift(response.body.data);
                            this.user = "";
                        })
                    } else {
                        this.$http.put(`/api/users/${this.userId}`, user).then(response => {
                            this.users[this.key] = user;
                            this.buttonLabel = "Add";
                            this.user = "";
                        })
                    }
                } else {
                    alert('Nama harus diisi')
                }
            },
            deleteUser: function(user, index) {
                this.$http.delete(`/api/users/${user.id}`).then(response => {
                    this.users.splice(index, 1);
                })
            },
            showUser: function(user, index) {
                this.user = this.users[index].name;
                this.buttonLabel = "Update";
                this.key = index;
                this.userId = user.id;
            },
        },
        mounted: function() {
            this.$http.get('/api/users').then(response => {
                this.users = response.body.data;
            })
        }
    });
</script>
