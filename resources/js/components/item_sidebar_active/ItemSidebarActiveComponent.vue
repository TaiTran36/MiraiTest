<template>
    <div class="item-box" :style="{width: withItem + '%'}">
        <div class="left">
            <IconArrowUpComponent></IconArrowUpComponent>
            <IconFolderBoldComponent></IconFolderBoldComponent>
            <div>{{labelItem}}</div>
        </div>
        <div class="right">
            <div class="total">12</div>
        </div>
    </div>
</template>

<script>
import IconArrowUpComponent from "../icons/IconArrowUp/IconArrowUpComponent";
import IconFolderBoldComponent from "../icons/IconFolderBold/IconFolderBoldComponent";
import {useFolderStore} from "../../stores/folder";
export default {
    name: "ItemSidebarActiveComponent",
    props: ['label', 'width'],
    components: {
        IconArrowUpComponent,
        IconFolderBoldComponent
    },
    data() {
        return {
            labelItem: '',
            withItem: '0'
        }
    },
    setup() {
        const folderStore = useFolderStore()
        return {
            folderStore
        }
    },
    created() {
        this.labelItem = this.label
        this.withItem = this.width
    }
}
</script>

<style lang="scss" scoped>
.item-box {
    display: flex;
    gap: 6px;
    align-items: center;
    height: 30px;
    padding-left: 10px;
    justify-content: space-between;
    .left {
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .total {
        padding: 2px;
        border-radius: 5px;
        width: 20px;
        height: 20px;
        background: #0a53be;
        color: #fff;
        font-size: 12px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
}
</style>
