<script>
    import VcPagination from './Pagination.vue'

    export default {
        components:
            {
                VcPagination

            },
        data() {

            return {
                pesq: '',
                pagination: {},
                ad_Pets: []
            }
        },
        methods: {
            navigate(page) {
                this.$http.get('/admin/abandoned/disappeared/listAd?page='+page).then((req) => {
                    this.ad_Pets = req.data.data
                    this.pagination = req.data
                })
            }
        },

        mounted() {
            //  this.list = JSON.parse(this.users)
            this.$http.get('/admin/abandoned/disappeared/listAd').then((req) => {
                this.ad_Pets = req.data.data
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
                    <input type="text" class="form-control" v-model="pesq" placeholder="Digite o nome do animal...">
                </div>

            </div>
        </div>


        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Nome do Animal</th>
                <th>Espécie</th>
                <th>Nome do Anunciante</th>
                <!--<th>Tipo</th>-->
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>

            <tr v-for="pet in ad_Pets">
                <td>{{pet.name_pet}}</td>
                <td v-if="pet.species_pet == 'dog'">Cachorro</td>
                <td v-if="pet.species_pet == 'cat'">Gato
                <td v-if="pet.species_pet != 'cat' && pet.species_pet != 'dog'">Outros</td>
                <td>{{pet.user.name}}</td>
                <!--<td>{{pet.role}}</td>-->

                <td align="center">
                    <a class="btn btn-success"><span class="fa fa-eye fa-lg"></span></a>
                    <a v-bind:href="'abandoned/edit/'+ pet.id" class="btn btn-primary"><span class="fa fa-pencil-square-o fa-lg"></span></a>

                    <a v-if="pet.active_pet == 1" v-bind:href="'abandoned/disappeared/active/'+pet.id" class="btn btn-danger"><span
                            class="fa fa-lock"> </span></a>

                    <a v-if="pet.active_pet == 0" v-bind:href="'abandoned/disappeared/desactive/'+pet.id" class="btn btn-success"><span
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