<template>
    <div class="item-box" :style="{width: withItem + '%'}">
        <div class="left">
            <div class="arrow" :class="{activeParent: folderStore.folder[labelItem].isActive && !folderStore.folder[labelItem].isChild}" >
                <IconArrowRightComponent :color="folderStore.folder[labelItem].color"></IconArrowRightComponent>
            </div>
            <IconFolderComponent :color="folderStore.folder[labelItem].color"></IconFolderComponent>
            <div class="label" :class="{labelActive: folderStore.folder[labelItem].isActive && folderStore.folder[labelItem].isChild}">{{labelItem}}</div>
        </div>
        <div class="right">
            <div class="total" :class="{totalActive: folderStore.folder[labelItem].isActive && folderStore.folder[labelItem].isChild}">{{totalItem}}</div>
        </div>
    </div>
</template>

<script>
import IconArrowRightComponent from "../../components/icons/IconArrowRight/IconArrowRightComponent.vue";
import IconFolderComponent from "../../components/icons/IconFolder/IconFolderComponent.vue";
import { useFolderStore } from "../../stores/folder";
export default {
    name: "ItemSidebarComponent",
    props: ['label', 'width', 'total'],
    components: {
        IconArrowRightComponent,
        IconFolderComponent,
    },
    data() {
        return {
            labelItem: '',
            withItem: '0',
            totalItem: 0
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
        this.totalItem = this.total
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
        .arrow {
            transition: transform 0.5s;
        }
        .labelActive {
            color: #0a53be;
        }
        .activeParent {
            transform: rotate(-90deg);
        }
    }
    .total, .totalActive {
        border-radius: 5px;
        width: 20px;
        height: 20px;
        background: #8c8c8c;
        color: #000;
        font-weight: bold;
        font-size: 12px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .totalActive {
        background: #0a53be;
        color: #fff;
    }
}

</style>
