<script setup lang="ts">
const props = defineProps<{
  error?: string;
}>();
</script>

<template>
  <div v-if="props.error" class="invalid-feedback">
    {{ props.error }}
  </div>
</template>

<style scoped>
.invalid-feedback {
  display: block;
}
</style>
