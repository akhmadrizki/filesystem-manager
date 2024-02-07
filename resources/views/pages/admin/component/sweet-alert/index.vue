<template layout="admin">
  <Head title="Sweet Alert" />

  <PageSection header="Sweet Alert Page">
    <PageTitle>Sweet Alert</PageTitle>
    <PageDescription>Sweet Alert usage example.</PageDescription>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Sweet Alert</h4>
          </div>
          <div class="card-body">
            <BKButton
              class="mr-2"
              color="primary"
              @click="defaultAlert"
            >
              Default
            </BKButton>
            <BKButton class="mr-2" color="success" @click="success">
              Success
            </BKButton>
            <BKButton class="mr-2" color="warning" @click="warning">Warning</BKButton>
            <BKButton class="mr-2" color="danger" @click="error">Error</BKButton>
            <BKButton class="mr-2" color="info" @click="info">Info</BKButton>
          </div>
        </div>
      </div>
    </div>
  </PageSection>
</template>

<script setup lang="ts">
import { useSweetAlert } from '@timedoor/baskito-ui'
import PageDescription from "@/views/components/admin/layout/Page/PageDescription.vue";
import PageSection from "@/views/components/admin/layout/Page/PageSection.vue";
import PageTitle from "@/views/components/admin/layout/Page/PageTitle.vue";
import { Head } from "@inertiajs/vue3";

const {
  successAlert,
  warningAlert,
  errorAlert,
  infoAlert,
  sweetAlert
} = useSweetAlert();

const success = () => {
  successAlert({
    title: "Success!",
    text: "You clicked the button!",
  });
};

const warning = () => {
  warningAlert({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
  });
};

const error = () => {
  errorAlert({
    title: "Oops...",
    text: "Something went wrong!",
  });
};

const info = () => {
  infoAlert({
    title: "Info",
    text: "You clicked the button!",
  });
};

const defaultAlert = () => {
  sweetAlert({
    title: "Default",
    text: "You clicked the button!",
  });
};
</script>
