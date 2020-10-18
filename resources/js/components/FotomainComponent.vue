<template>
    <div>
        <div v-if="loadFoto==0">
            <div class="spinner-border text-warning" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="gallery__list"  v-if="loadFoto==1">
            <div class="gallery__list__item" v-for="item in listfoto"
                 v-bind:style="{ backgroundImage: 'url(fotomain/' + item.file_name + ')', backgroundSize:'cover'}"
                >
                <div class="gallery__list__inner"
                     v-on:click="showFoto(item.file_name)"
                     style="background-color: #cea50e;
                    cursor: pointer;">
                    <div class="gallery__list__text">
                        <div class="gallery__list__title">{{item.name}}</div>
                        <div class="gallery__list__subtitle">{{item.about}}</div>
                    </div>
                </div>
            </div>



        </div>
        <div class="gallery__background"></div>


    </div>

</template>

<script>
    export default {
        name: "FotomainComponent",
        data() {
            return {
                loadFoto:0,
            }
        },
        methods: {
            showFoto:function (urlname) {
               //alert(urlname)
              //  $('#modalFotoIndex').modal('show')
                window.open("/fotomain/"+urlname);
            }
        },
        created() {
            axios.post('/api/get_foto', {
            }).then(response => {
                console.log(response.data);
                this.listfoto=response.data;
                this.loadFoto=1;
            }).catch(error => console.log(error));
        }
    }
</script>

<style scoped>

</style>
