<template>
  <li class="nav-item dropdown" :class="{ active: active }">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"
      ><i v-if="icon" :class="icon"></i> <span>{{ title }}</span></a
    >
    <ul class="dropdown-menu">
      <slot />
    </ul>
  </li>
</template>

<script setup lang="ts">
defineProps<{
  title: string,
  icon?: string,
  active?: boolean,
}>();
</script>

<style scoped></style>
