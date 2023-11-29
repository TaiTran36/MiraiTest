<template>
    <div class="box-checkbox">
        <div>
            <input type="checkbox"
                   @change="emitChange"
                   v-model="valueInput"
                   :checked="checked"
            >
        </div>
        <div>{{label}}</div>
    </div>
</template>

<script>
export default {
    name: "InputCheckboxComponent",
    props: {
        label: {
            type: String,
            required: false,
            default: () => ''
        },
        checked: {
            type: Boolean,
                required: false,
            default: () => false
        }
    },
    created() {
        if (this.checked) {
            this.valueInput = true
        }
    },
    data() {
        return {
            valueInput: false
        }
    },
    watch: {
        checked() {
            this.valueInput = this.checked
        }
    },
    methods: {
        emitChange() {
            this.$emit('inputValue', this.valueInput)
        }
    }
}
</script>

<style lang="scss" scoped>
.box-checkbox {
    display: flex;
    gap: 5px;
    align-items: baseline;
}
</style>
