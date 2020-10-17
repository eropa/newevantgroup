<template>
    <div>
        <div v-if="loadFoto==0">
            <div class="spinner-border text-warning" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="gallery__list"  v-if="loadFoto==1">
            <div class="gallery__list__item" v-for="item in listfoto">
                <div class="gallery__list__inner">
                    <div class="gallery__list__text">
                        <div class="gallery__list__title">Название</div>
                        <div class="gallery__list__subtitle">Эта книга посвящена теории колорита в живописи. Но возможна ли вообще такая теория? Чувство цвета едва ли не самое</div>
                    </div>
                </div>
            </div>

            <div class="gallery__list__item">
                <div class="gallery__list__inner">
                    <div class="gallery__list__text">
                        <div class="gallery__list__title">Название222</div>
                        <div class="gallery__list__subtitle">Эта книга посвящена теории колорита в живописи. Но возможна ли вообще такая теория? Чувство цвета едва ли не самое</div>
                    </div>
                </div>
            </div>


        </div>
        <div class="gallery__background" v-if="loadFoto==1"></div>
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
