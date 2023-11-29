<template>
    <div class="range-box">
        <div class="rate" :style="{width: rateUsed + '%'}"></div>
    </div>
</template>

<script>
export default {
    name: "RangerSliderImportComponent",
    props: ['rate'],
    data() {
        return {
            rateUsed: '50'
        }
    },
    created() {
        this.rateUsed = this.rate
    }
}
</script>

<style lang="scss" scoped>
.range-box {
    width: 100%;
    height: 10px;
    background: #ffffff;
    border: 1px solid #cccccc;
    border-radius: 20px;
    .rate {
        height: 10px;
        background: #00bfff;
        border-radius: 20px;
    }
}
</style>
