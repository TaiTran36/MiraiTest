<template>
    <div class="button-import"> {{ textButton }}</div>
</template>

<script>
export default {
    name: "ButtonImportComponent",
    props: ['text'],
    data() {
        return {
            textButton: ''
        }
    },
    created() {
        this.textButton = this.text
    }
}
</script>

<style scoped>
.button-import {
    width: 150px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: deepskyblue;
    color: #ffffff;
    border-radius: 10px;
}
</style>
