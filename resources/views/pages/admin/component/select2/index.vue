<template layout="admin">
  <Head title="Select2" />

  <PageSection header="Select2 Page" :back-link="$route('admin.dashboard')">
    <PageTitle>Select2</PageTitle>
    <PageDescription>Select2 component usage example.</PageDescription>

    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4>Select 2</h4>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>Default select</label>
              <BKSelect v-model="selectDefault" :data-placeholder="'This is placeholder'">
                <option v-for="option in options" :key="option.id" :value="option.id">{{ option.text }}</option>
              </BKSelect>
            </div>
            <div class="form-group">
              <label>Select using option property</label>
              <BKSelect
                :options="{
                  data: options,
                  placeholder: 'This is placeholder',
                  allowClear: true
                }"
                allow-empty />
            </div>
            <div class="form-group">
              <label>Select multiple</label>
              <BKSelect
                :options="{
                  data: options,
                  placeholder: 'This is placeholder',
                  allowClear: true
                }"
                multiple />
            </div>
          </div>
        </div>
      </div>
    </div>
  </PageSection>
</template>

<script setup lang="ts">
import PageDescription from "@components/admin/layout/Page/PageDescription.vue";
import PageSection from "@components/admin/layout/Page/PageSection.vue";
import PageTitle from "@components/admin/layout/Page/PageTitle.vue";
import { Head } from "@inertiajs/vue3";
import { ref, watch } from 'vue';

const selectDefault = ref(2);

const options = ref([
  {id: 1, text: "Option 1"},
  {id: 2, text: "Option 2"},
  {id: 3, text: "Option 3"},
  {id: 4, text: "Option 4"}
]);

watch(selectDefault, (newSelectDefault) => {
  console.log(`Default select is ${newSelectDefault}`)
})
</script>

<style scoped></style>
