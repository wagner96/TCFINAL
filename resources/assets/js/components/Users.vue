<script>
    import Modal from './Modal';

    export default {
        props: ['users'],
        components:
            {
                Modal
            },
        data() {
            return {
                pesq: '',
                list: [],
                showModal: false,
                clickedUser: ''
            }
        },
        methods: {

            openModal() {
                this.showModal = true;
            },
            closeModal() {
                this.showModal = false;
            },
            selectUser(user) {
                this.clickedUser = user;
            }
        },
        mounted() {
            this.list = JSON.parse(this.users)

        }
        ,
        computed: {
            listBypesq() {
                if (this.pesq) {
                    return this.list.filter(u => u.name.toLowerCase().indexOf(this.pesq.toLowerCase()) !== -1)
                }
                return this.list
            }
        }
    }
</script>

<template>
    <div>


        <div class="form-group">
            <div class="col-9 ">
                <div class="input-group">
    <span class="input-group-addon" id="basic-addon1" style="font-size: 10px"><i
            class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" v-model="pesq" placeholder="Digite o nome...">
                </div>

            </div>
        </div>


        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Cidade</th>
                <th>Tipo</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>

            <tr v-for="u in list">
                <td>{{u.id}}</td>
                <td>{{u.name}}</td>
                <td>{{u.city}}</td>
                <td>{{u.role}}</td>

                <td align="center">
                    <a class="btn btn-success" @click="openModal(); selectUser(u)"><span class="fa fa-eye fa-lg"></span></a>
                    <a v-bind:href="'users/edit/'+ u.id" class="btn btn-primary"><span
                            class="fa fa-pencil-square-o fa-lg"></span></a>

                    <a v-if="u.active_user == 1" v-bind:href="'users/active/'+u.id" class="btn btn-danger"><span
                            class="fa fa-lock fa-lg"> </span></a>

                    <a v-if="u.active_user == 0" v-bind:href="'users/desactive/'+u.id" class="btn btn-success"><span
                            class="fa fa-unlock fa-lg"> </span></a>


                </td>


            </tr>

            </tbody>
        </table>


        <modal v-if="showModal">
            <h3 slot="header" class="modal-title">
                {{clickedUser.name}}
            </h3>

            <div slot="body">
                <div class="row">
                    <div class="col-md-6">
                        <p>Nome: <b>{{clickedUser.name}}</b></p>
                        <p v-if="clickedUser.role != 'ong'">Sexo: <b>{{clickedUser.breed}}</b></p>
                        <p>Estado: <b>{{clickedUser.state}}</b></p>
                        <p v-if="clickedUser.role == 'ong'">Bairro: <b>{{clickedUser.district}}</b></p>
                        <p v-if="clickedUser.role == 'ong'">Facebook: <b>{{clickedUser.social_network}}</b></p>
                        <p v-if="clickedUser.role == 'ong'">Início das Atividades: <b>{{clickedUser.birth_date}}</b></p>
                        <p v-if="clickedUser.role != 'ong'">Data de Nascimento: <b>{{clickedUser.birth_date}}</b></p>
                        <p>Tipo de usuário: <b>{{clickedUser.role}}</b></p>

                    </div>
                    <div class="col-md-6">
                        <p>E-mail: <b>{{clickedUser.email}}</b></p>
                        <p>Contato: <b>{{clickedUser.phone}}</b></p>
                        <p>Cidade: <b>{{clickedUser.city}}</b></p>
                        <p v-if="clickedUser.role == 'ong'">Complemento: <b>{{clickedUser.complement}}</b></p>
                        <p v-if="clickedUser.role == 'ong'">
                            Descrição das Ações:<b>{{clickedUser.description_actions}}</b></p>
                        <p>Cadastro criado em: <b>{{clickedUser.created_at}}</b></p>

                    </div>
                </div>
            </div>
            <div slot="footer">
                <button type="button" class="btn btn-danger" @click="closeModal()"> Fechar </button>
            </div>
        </modal>
    </div>
</template>

<style scoped=""></style>