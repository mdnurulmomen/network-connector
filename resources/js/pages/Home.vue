<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <three-grids-and-add-button-component
                            :has-add-button="false"
                        />
                    </div>

                    <div class="card-body">
                        <index-table-component
                            :column-names="['name', 'email']"
                            :has-actions="false"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

    import { onMounted, ref } from 'vue';
    import { useHomeStore } from '@/stores/home';
    import { useGeneralStore } from '@/stores/general';

    const homeStore = useHomeStore();
    const generalStore = useGeneralStore();

    homeStore.fetchIndexContents();
    generalStore.currentEntityName = 'user';    // has to be lowercase

    onMounted(() => {
        // console.log('Home mounted.')
        // fetchIndexContents();
    })
</script>
