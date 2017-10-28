<template>
    <div class="container">
        <vuetable ref="vuetable"
                  api-url="http://127.0.0.1:8000/admin/users/listUsers"
                  :fields="fields"
                  pagination-path="6"
                  @vuetable:pagination-data="onPaginationData"
        ></vuetable>

        <div class="vuetable-pagination ui basic segment grid">
            <vuetable-pagination-info ref="paginationInfoTop"
            ></vuetable-pagination-info>
            <vuetable-pagination ref="pagination"
                                 @vuetable-pagination:change-page="onChangePage"
            ></vuetable-pagination>
        </div>
    </div>
</template>

<script>
    import accounting from 'accounting'
    import moment from 'moment'
    import Vuetable from 'vuetable-2/src/components/Vuetable'
    import VuetablePagination from 'vuetable-2/src/components/VuetablePaginationDropdown'

    import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'


    export default {
        components: {
            Vuetable,
            VuetablePagination,
            VuetablePaginationInfo
        },
        data() {
            return {
                fields: [
                    {
                        name: 'name',
                        title: 'Nome',
                        sortField: 'name'

                    },
                    {
                        name: 'email',
                        titleClass: 'center aligned',
                        dataClass: 'left aligned',
                        title: 'E-mail'
                    },
                    {
                        name: 'role',
                        titleClass: 'center aligned',
                        dataClass: 'left aligned',
                        title: 'Tipo',
                        callback: 'allcap'
                    },
                    {
                        name: 'city',
                        titleClass: 'center aligned',
                        dataClass: 'right aligned',
                        title: 'Cidade'

                    },
                    {
                        name: 'active_user',
                        title: 'Opções',
                        callback: 'activeLabel'
                    }

                ]
            }
        },
        methods: {
            onPaginationData(paginationData) {
                this.$refs.paginationTop.setPaginationData(paginationData)
                this.$refs.paginationInfoTop.setPaginationData(paginationData)

                this.$refs.pagination.setPaginationData(paginationData)
                this.$refs.paginationInfo.setPaginationData(paginationData)
            },
            onChangePage(page) {
                this.$refs.vuetable.changePage(page)
            },

            allcap(value) {
                return value.toUpperCase()
            },
            activeLabel(value) {
                return value == '1'
                    ? '<a  href="users/active/+u.id" class="btn btn-danger"><span class="fa fa-lock fa-lg"> </span></a>'
                    : '<a  href="users/desactive/+u.id" class="btn btn-success"><span class="fa fa-unlock fa-lg"> </span></a>'

            }
        }
    }
</script>
