<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <three-grids-and-add-button-component
                            @show-store-form="skillStore.showStoreForm"
                        />
                    </div>

                    <div class="card-body">
                        <index-table-component
                            :column-names="['name']"
                            :has-actions="true"
                            :action-button-names="['edit', 'delete']"
                            :action-button-class-names="['btn-outline-primary', 'btn-outline-danger']"
                            :action-button-emitting-method-names="['showContentEditForm', 'showContentDeleteConfirmationForm']"

                            @show-content-edit-form="generalStore.showContentEditForm"
                            @show-content-delete-confirmation-form="generalStore.showContentDeleteConfirmationForm"
                        />
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <dynamic-create-update-form-modal-component
                @store-content="skillStore.storeContent"
			    @update-content="skillStore.updateContent"
            />
        </div>

        <div class="row">
            <delete-confirmation-component
                @emit-delete-method="skillStore.deleteContent"
            />
        </div>
    </div>
</template>

<script setup>
    import { onMounted } from 'vue';
    import { Modal } from 'bootstrap';
    // import { storeToRefs } from 'pinia';
    import { useSkillStore } from '@/stores/skill';
    import { useGeneralStore } from '@/stores/general';

    // onCreated equivalent
    const skillStore = useSkillStore();
    const generalStore = useGeneralStore();

    // importing state-variables with ref()
    // const { createOrEditModal, deleteConfirmationModal } = storeToRefs(skillStore)

    skillStore.fetchIndexContents();

    generalStore.currentEntityName = 'skill';    // has to be lowercase

    onMounted(async () => {
        // console.log('Skill List mounted.')
        generalStore.currentEntityShowableFieldObjects = [
            {
                name:'name',
                type:'text'
            },
        ];

        generalStore.currentEntityRequiredFields = ['name'];
        generalStore.createOrEditModal = new Modal('#dynamic-form-modal', {});
        generalStore.deleteConfirmationModal = new Modal('#delete-confirmation-modal', {});
    })
</script>
