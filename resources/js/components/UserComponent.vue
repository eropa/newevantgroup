<template>
    <div>
        <div>
            <div class="alert alert-danger" role="alert" v-if="showError">
                {{textError}}
            </div>
            <div class="alert alert-success" role="alert" v-if="showYes">
                {{textYes}}
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="spinner-border text-primary" role="status" v-if="loadUser==0">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <button class="btn btn-success"
                            v-on:click="showModalAdd()"
                            v-if="loadUser>0">Добавить пользовател</button>
                    <table class="table table-hover" v-if="loadUser>0">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Роль</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr  v-for="item in listdatas" >
                            <td>{{item.id}}</td>
                            <td>{{item.name}}</td>
                            <td>{{item.role}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade"
             id="addNewUser"
             tabindex="-1"
             role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Создать новый пользователь</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="nameUser">Ф.И.О</label>
                                <input type="text"
                                       class="form-control"
                                       id="nameUser"
                                       v-model="addName"
                                       placeholder="Иванов Иван Иванович">
                            </div>
                            <div class="form-group">
                                <label for="emailUser">Email</label>
                                <input type="email"
                                       class="form-control"
                                       id="emailUser"
                                       v-model="addEmai"
                                       placeholder="name@example.com">
                            </div>
                            <div class="form-group">
                                <label for="passwordUser">Пароль</label>
                                <input type="password"
                                       class="form-control"
                                       id="passwordUser"
                                       v-model="addPassword"
                                       placeholder="Тут пароль">
                            </div>
                            <div class="form-group">
                                <label for="roleUser">Роль</label>
                                <select class="form-control" id="roleUser" v-model="addRole">
                                    <option value="" >Выберите роль</option>
                                    <option value="user" >User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </form>

                        <button class="btn btn-success" v-on:click="sendAddUser()" v-if="loadAdd==0">Добавить</button>
                        <div class="spinner-border text-success" role="status" v-if="loadAdd">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    </div>
                </div>
            </div>
        </div>




    </div>
</template>

<script>
    export default {
        name: "UserComponent",
        data() {
            return {
                loadUser:0,
                loadAdd:0,
                showError:0,
                textError:"",
                showYes:0,
                textYes:"",
                listdatas:[],
                addName:"",
                addEmai:"",
                addPassword:"",
                addRole:"",
            }
        },
        methods: {
            showModalAdd:function() {
                $('#addNewUser').modal('show')
            },
            sendAddUser:function(){
                this.loadAdd=1;
                axios.post('/api/user_add', {
                    'addName':this.addName,
                    'addEmai':this.addEmai,
                    'addPassword':this.addPassword,
                    'addRole':this.addRole,
                }).then(response => {
                    console.log(response.data);
                    this.showYes=1;
                    this.textYes="Пользователь создан";
                    $('#addNewUser').modal('hide');

                    this.loadUser=0;
                    axios.post('/api/user_list', {
                    }).then(response => {
                        console.log(response.data);
                        this.listdatas=response.data;
                        this.loadUser=1;
                    }).catch(error => console.log(error));

                }).catch(error => {
                    this.showError=1;
                    this.textError=error;
                    $('#addNewUser').modal('hide');
                });
            }
        },
        created() {
            axios.post('/api/user_list', {
            }).then(response => {
                console.log(response.data);
                this.listdatas=response.data;
                this.loadUser=1;
            }).catch(error => console.log(error));
        }
    }
</script>

<style scoped>

</style>
