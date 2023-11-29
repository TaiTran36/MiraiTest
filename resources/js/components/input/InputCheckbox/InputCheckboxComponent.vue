<template>
    <div class="box-checkbox">
        <div>
            <input type="checkbox" value="val">
        </div>
        <div>{{label}}</div>
    </div>
</template>

<script>
export default {
    name: "InputCheckboxComponent",
    props: ['label'],
    created() {

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
