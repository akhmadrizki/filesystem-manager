<script setup lang="ts">
import BaseTable from "@components/admin/table/BaseTable.vue";
import PageSection from "@components/admin/layout/Page/PageSection.vue";
import TableHeader from "@components/admin/table/TableHeader.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template layout="admin">
  <Head title="Ini halaman 2" />

  <PageSection
    header="Project"
    :back-link="$route('admin.dashboard')"
    :full-width="true"
  >
    <div class="card">
      <div class="card-header">
        <h4>Ini project</h4>
      </div>

      <BaseTable class="mt-3" colspan="7" :with-iteration="true">
        <template #thead>
          <TableHeader>Name</TableHeader>
          <TableHeader>Name</TableHeader>
          <TableHeader>Name</TableHeader>
          <TableHeader>Name</TableHeader>
          <TableHeader name="status"> Status </TableHeader>
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
</template>

<style scoped></style>
