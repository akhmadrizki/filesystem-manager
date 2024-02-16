<script setup lang="ts">
import BaseTable from "@components/admin/table/BaseTable.vue";
import PageSection from "@components/admin/layout/Page/PageSection.vue";
import { Head, useForm } from "@inertiajs/vue3";
import InvalidFeedback from "@/views/components/admin/form/InvalidFeedback.vue";
import { useConfiguredSwal } from "@/scripts/utils/alerts/useConfiguredSwal";
import { useSweetAlert } from "@timedoor/baskito-ui";
import { ref } from "vue";
import { useRoute } from "@/scripts/utils/ziggy/useRoute";

const { route } = useRoute();
const { errorAlert, successAlert } = useSweetAlert();
const { confirmationAlert } = useConfiguredSwal();

defineProps({
  projects: {
    type: Object,
    required: true,
  },
});

const formFilter = useForm({
  query: "",
});

const submitFilter = function () {
  formFilter.get(route("admin.dashboard.project.index"), {
    preserveState: true,
    preserveScroll: true,
    only: ["projects"],
  });
};

const projectForm = useForm({
  name: "",
});

const reset = () => {
  projectForm.reset();

  projectForm.clearErrors();
};

const isLoading = ref(false);

const copy = (token: string) => {
  navigator.clipboard
    .writeText(token)
    .then(() => {
      successAlert({
        icon: "success",
        text: "Token copied to clipboard!",
      });
    })
    .catch(() => {
      errorAlert({
        title: "Error",
        text: "Failed to copy token to clipboard!",
      });
    });
};

async function save() {
  const options = {
    preserveScroll: true,
    onError: () => {
      errorAlert({ title: "Error", text: "Oppss, please check your input!" });
    },
    onSuccess: () => {
      let modalName = "#" + "projectFormModal";
      $(modalName).modal("hide");

      successAlert({
        icon: "success",
        text: "Project has been created!",
      });
    },
    onFinish: () => {
      isLoading.value = false;
    },
  };

  if (!isLoading.value) {
    isLoading.value = true;
    try {
      await projectForm.post(route("admin.dashboard.project.store"), options);
    } catch (error) {
      errorAlert({ title: "Error", text: "Failed to create project" });
    } finally {
      isLoading.value = false;
    }
  }
}

async function regenerateToken(id: number) {
  const confirmed = await confirmationAlert({
    title: "Confirmation",
    text: "Are you sure you want to regenerate the token?",
    icon: "warning",
  });

  if (confirmed) {
    const options = {
      preserveScroll: true,
      onError: () => {
        errorAlert({ title: "Error", text: "Oppss, please check your input!" });
      },
      onSuccess: () => {
        successAlert({
          icon: "success",
          text: "Token has been regenerated!",
        });
      },
      onFinish: () => {
        isLoading.value = false;
      },
    };

    if (!isLoading.value) {
      isLoading.value = true;
      projectForm.post(
        route("admin.dashboard.project.regenerate", id),
        options,
      );
    }
  }
}
</script>

<template layout="admin">
  <Head title="Project Lists" />

  <PageSection header="Projects List" :full-width="true">
    <div class="card">
      <div class="card-header justify-content-between">
        <h4 class="text-capitalize">project</h4>

        <div class="card-header-form mr-3 ml-auto">
          <form @submit.prevent="submitFilter">
            <div class="input-group">
              <BKInput
                v-model="formFilter.query"
                type="text"
                class="form-control"
                placeholder="Search project name"
              />
              <div class="input-group-btn search-btn">
                <BKButton type="submit"><i class="fas fa-search"></i></BKButton>
              </div>
            </div>
          </form>
        </div>

        <BKButton data-toggle="modal" data-target="#projectFormModal">
          Create New Project
        </BKButton>
      </div>

      <div class="card-body p-0">
        <BaseTable :paginated-collection="projects">
          <template #thead>
            <th>Project Name</th>
            <th>Token</th>
            <th>Action</th>
          </template>

          <template #tbody="slotProps">
            <td>{{ slotProps.data.name }}</td>
            <td>
              <BKButton @click.prevent="copy(slotProps.data.token)">
                <i class="fas fa-copy"></i>
              </BKButton>
            </td>
            <td>
              <BKButton
                color="warning"
                @click.prevent="regenerateToken(slotProps.data.id)"
              >
                <i class="fas fa-recycle"></i>
                Regenearete Token
              </BKButton>
            </td>
          </template>

          <template #empty>
            <td colspan="6">
              <p class="text-center">Data not found</p>
            </td>
          </template>
        </BaseTable>
      </div>
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

<style scoped>
.card-header h4 + .card-header-form .btn {
  border-radius: 0 30px 30px 0 !important;
}
</style>
