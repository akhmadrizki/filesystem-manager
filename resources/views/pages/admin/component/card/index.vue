<template layout="admin">
  <Head title="Card" />

  <PageSection header="Card Page">
    <PageTitle>Card</PageTitle>
    <PageDescription>Card usage example.</PageDescription>

    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        <BKCard header="Card Title" footer="Footer Card">
          This is some text within a card body.
        </BKCard>
        <BKCard header="Card Action Button">
          This is some text within a card body.
          <template #footer>
            <div class="text-right">
              <button class="btn btn-primary">Submit</button>
            </div>
          </template>
        </BKCard>
      </div>
      <div class="col-12 col-md-6 col-lg-6">
        <BKCard footer="Footer Card" footer-bg-variant="whitesmoke">
          <template #header>
            <h4>Footer <code>bg-whitesmoke</code></h4>
          </template>
          <template #default>
            This is some text within a card body.
          </template>
        </BKCard>
        <BKCard header="Card Header" variant="success">
          <p>Card <code>.card-success</code></p>
        </BKCard>
      </div>
    </div>
  </PageSection>
</template>

<script setup lang="ts">
import PageDescription from "@/views/components/admin/layout/Page/PageDescription.vue";
import PageSection from "@/views/components/admin/layout/Page/PageSection.vue";
import PageTitle from "@/views/components/admin/layout/Page/PageTitle.vue";
import { Head } from "@inertiajs/vue3";
</script>
