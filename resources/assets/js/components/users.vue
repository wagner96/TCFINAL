<script>
    import VcPagination from './pagination.vue'

    export default {
        components:
            {
                VcPagination

            },
        data() {

            return {
                pesq: '',
                pagination: {},
                users: []
            }
        },
        methods: {
            navigate(page) {
                this.$http.get('/admin/users/listUsers?page='+page).then((req) => {
                    this.users = req.data.data
                    this.pagination = req.data
                })
            }
        },

        mounted() {
            //  this.list = JSON.parse(this.users)
            this.$http.get('/admin/users/listUsers').then((req) => {
                this.users = req.data.data
                this.pagination = req.data
            })

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

            <tr v-for="u in users">
                <td>{{u.id}}</td>
                <td>{{u.name}}</td>
                <td>{{u.city}}</td>
                <td>{{u.role}}</td>

                <td align="center">
                    <a v-bind:href="'users/edit/'+ u.id" class="btn btn-primary"><span class="fa fa-pencil-square-o"> Editar</span></a>

                    <a v-if="u.active_user == 1" v-bind:href="'users/active/'+u.id" class="btn btn-danger"><span
                            class="fa fa-lock"> </span></a>

                    <a v-if="u.active_user == 0" v-bind:href="'users/desactive/'+u.id" class="btn btn-success"><span
                            class="fa fa-unlock"> </span></a>


                </td>


            </tr>

            </tbody>
        </table>
        <div class="text-center">
            <vc-pagination :source="pagination" @navigate="navigate"></vc-pagination>
        </div>
    </div>
</template>
<style scoped=""></style>