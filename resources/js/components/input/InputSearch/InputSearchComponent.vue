<template>
    <input class="form-control" type="text" :placeholder=placeholder>
</template>

<script>
export default {
    name: "InputSearchComponent",
    data() {
        return {
            placeholder: 'e.g. image.png'
        }
    }
}
</script>

<style scoped>

</style>
