<template>
  <li :class="{ active: active }">
    <Link class="nav-link" :href="href"
      ><i v-if="icon" :class="icon"></i><span><slot /></span
    ></Link>
  </li>
</template>

<script setup lang="ts">
import { Link } from "@inertiajs/vue3";

defineProps<{
  href: string,
  icon?: string,
  active?: boolean,
}>();
</script>

<style scoped></style>
