<template layout="admin">
  <Head title="Badge" />

  <PageSection header="Badge Page">
    <PageTitle>Badge</PageTitle>
    <PageDescription>Badge usage example.</PageDescription>

    <div class="row">
      <div class="col-12">
        <BKCard header="Badge">
          <BKBadge class="mr-2">Primary</BKBadge>
          <BKBadge type="secondary" class="mr-2">Secondary</BKBadge>
          <BKBadge type="success" class="mr-2">Success</BKBadge>
          <BKBadge type="danger" class="mr-2">Danger</BKBadge>
          <BKBadge type="warning" class="mr-2">Warning</BKBadge>
          <BKBadge type="info" class="mr-2">Info</BKBadge>
          <BKBadge type="light" class="mr-2">Light</BKBadge>
          <BKBadge type="dark" class="mr-2">Dark</BKBadge>
          <BKBadge type="transparent" class="mr-2">Transparent</BKBadge>
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
