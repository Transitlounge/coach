<template>
  <li>{{ title }}<button class="btn btn-primary float-right" v-on:click="$emit('remove')">Remove</button></li>
</template>

<script>
    export default {
			props: ['title']
    }
</script>