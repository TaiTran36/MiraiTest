<template>
    <input class="form-control" type="text" :placeholder=placeholder v-model="value" @change="emitChange">
</template>

<script>
export default {
    name: "InputSearchComponent",
    data() {
        return {
            value: ''
        }
    },
    props: {
        valueDefault: {
            type: String,
            required: false,
            default: () => null
        },
        placeholder: {
            type: String,
            required: false,
            default: () => null
        }
    },
    created() {
        if (this.valueDefault) {
            this.value = this.valueDefault
        }
    },
    watch: {
        value() {
            this.$emit('inputValue', this.value)
        },
        valueDefault() {
            this.value = this.valueDefault
        }
    },
    methods: {
        emitChange() {
            this.$emit('value', this.value)
        }
    }
}
</script>

<style scoped>

</style>
