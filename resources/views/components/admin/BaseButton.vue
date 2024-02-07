<template>
  <component
    :is="Link"
    :href="props.href"
  >
    <slot />
</component>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  href: {
    type: String,
    required: true
  }
});
</script>
