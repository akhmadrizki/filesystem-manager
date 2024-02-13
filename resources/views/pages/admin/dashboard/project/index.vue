<script setup lang="ts">
import BaseTable from "@components/admin/table/BaseTable.vue";
import PageSection from "@components/admin/layout/Page/PageSection.vue";
import TableHeader from "@components/admin/table/TableHeader.vue";
import { Head, useForm } from "@inertiajs/vue3";
import InvalidFeedback from "@/views/components/admin/form/InvalidFeedback.vue";
import { useSweetAlert } from "@timedoor/baskito-ui";
import { ref } from "vue";
import { useRoute } from "@/scripts/utils/ziggy/useRoute";

const { route } = useRoute();
const { errorAlert, successAlert } = useSweetAlert();

const projectForm = useForm({
  name: "",
});

const reset = () => {
  projectForm.reset();

  projectForm.clearErrors();
};

const isLoading = ref(false);

const save = () => {
  const options = {
    preserveScroll: true,
    onError: () => {
      errorAlert({ title: "Error", text: "Oppss, please check your input!" });
    },
    onSuccess: () => {
      let modalName = "#" + "projectFormModal";
      $(modalName).modal("hide");
    },
    onFinish: () => {
      isLoading.value = false;

      successAlert({
        icon: "success",
        text: "Project has been created!",
      });
    },
  };

  if (!isLoading.value) {
    isLoading.value = true;
    projectForm.post(route("admin.dashboard.project.store"), options);
  }
};
</script>

<template layout="admin">
  <Head title="Project Lists" />

  <PageSection
    header="Projects List"
    :back-link="$route('admin.dashboard')"
    :full-width="true"
  >
    <div class="card">
      <div class="card-header justify-content-between">
        <h4 class="text-capitalize">project</h4>

        <BKButton data-toggle="modal" data-target="#projectFormModal">
          Create New Project
        </BKButton>
      </div>

      <BaseTable class="mt-3" colspan="7" :with-iteration="true">
        <template #thead>
          <TableHeader>Project Name</TableHeader>
          <TableHeader></TableHeader>
        </template>
        <template #tbody="slotProps">
          <td width="300">
            <UserShortDetail :user="slotProps.data" />
          </td>
          <td><UserTypeBadge :type="slotProps.data.type" /></td>
          <td>{{ slotProps.data.email }}</td>
          <td>{{ slotProps.data.region.name }}</td>
          <td>
            <UserStatusBadge :user="slotProps.data" />
          </td>
          <td width="220">
            <UserActionButton :user="slotProps.data" />
          </td>
        </template>
      </BaseTable>
    </div>
  </PageSection>

  <Teleport to="body">
    <BKModal
      id="projectFormModal"
      title="Create New Project"
      @submit="save()"
      @hide="reset()"
    >
      <BKInput
        v-model="projectForm.name"
        type="text"
        placeholder="Project Name"
        :class="{
          'is-invalid': projectForm.errors['name'],
        }"
      />
      <InvalidFeedback :error="projectForm.errors[`name`]" />
    </BKModal>
  </Teleport>
</template>

<style scoped></style>
