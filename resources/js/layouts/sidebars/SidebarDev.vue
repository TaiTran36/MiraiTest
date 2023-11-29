<template>
    <div class="container-sidebar-box">
        <div class="sidebar-top">
            <ButtonImportComponent text='Import documents'></ButtonImportComponent>
        </div>
        <div class="sidebar-bottom">
            <div class="storage">
                <div class="label-box">
                    <div class="label">Storage</div>
                    <div class="change-plan"><a href="javascript:void(0)">Change Plan</a></div>
                </div>
                <div class="range-slider-storage">
                    <RangerSliderImportComponent :rate="folderStore.usedCapacityRate"></RangerSliderImportComponent>
                </div>
                <div class="storage-content">
                    <span class="rate">{{folderStore.usedCapacityRate}}%</span> used of 2GB
                </div>
            </div>
            <div class="search">
                <div class="label">Search</div>
                <div>
                    <InputSearchComponent></InputSearchComponent>
                </div>
            </div>
            <div class="folders">
                <div class="label-box">
                    <div class="label">Folders</div>
                    <div class="add-folder"><a href="javascript:void(0)">New folder</a></div>
                </div>
                <div class="list-folders">
                    <div v-for="item in dataFolders" :key="item.id">
                        <div class="item" @click="toggleActiveItem(item.name)">
                            <ItemSidebarComponent
                                                  :label="item.name"
                                                  :width="60"
                                                  :total="item.children.length"
                            ></ItemSidebarComponent>
                        </div>
                        <div v-show="item.children.length > 0 && folderStore.folder[item.name].isActive" class="itemChild" v-for="itemChild in item.children" :key="itemChild.id" @click="toggleActiveItem(itemChild.name, itemChild.children)">
                            <ItemSidebarComponent
                                                    :label="itemChild.name"
                                                    :width="80"
                                                    :total="itemChild.children.length"
                            ></ItemSidebarComponent>
                        </div>
                    </div>
                </div>
            </div>
            <div class="members">
                <div class="label-box">
                    <div class="label">Members</div>
                    <div class="change-plan"><a href="javascript:void(0)">Select all</a></div>
                </div>
                <div class="member-content">
                    <div>
                        <InputCheckboxComponent label="All"></InputCheckboxComponent>
                    </div>
                    <div>
                        <InputCheckboxComponent label="Admin"></InputCheckboxComponent>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ButtonImportComponent from "../../components/button/ButtonImport/ButtonImportComponent";
import RangerSliderImportComponent from "../../components/range_sliders/RangeSliderImport/RangerSliderImportComponent";
import InputSearchComponent from "../../components/input/InputSearch/InputSearchComponent";
import IconArrowRightComponent from "../../components/icons/IconArrowRight/IconArrowRightComponent";
import IconFolderComponent from "../../components/icons/IconFolder/IconFolderComponent";
import ItemSidebarComponent from "../../components/Item_sidebar/ItemSidebarComponent";
import { dataFolders } from "../../data/DataFolders";
import { useFolderStore } from "../../stores/folder";
import {APP_CONSTANTS} from "../../uitls/constansts";
import InputCheckboxComponent from "../../components/input/InputCheckbox/InputCheckboxComponent.vue";
export default {
    name: "SidebarDev",
    components: {
        InputCheckboxComponent,
        ButtonImportComponent,
        RangerSliderImportComponent,
        InputSearchComponent,
        IconArrowRightComponent,
        IconFolderComponent,
        ItemSidebarComponent
    },
    data() {
        return {
            dataFolders
        }
    },
    setup() {
        const folderStore = useFolderStore()
        return {
            folderStore
        }
    },
    created() {
        this.folderStore.folder['Uploads'].isActive = true
        this.folderStore.folder['Uploads'].color = APP_CONSTANTS.COLOR_ITEM_SIDEBAR_PARENT_ACTIVE
    },
    methods: {
        toggleActiveItem(name, listChild = []) {
            Object.keys(this.folderStore.folder).forEach((item) => {
                if(item === name) {
                    this.folderStore.folder[name].isActive = !this.folderStore.folder[name].isActive
                    this.folderStore.folder[name].color = APP_CONSTANTS.COLOR_ITEM_SIDEBAR_PARENT_ACTIVE
                    this.calculateUsedCapacity(listChild)
                    if(this.folderStore.folder[name].isChild) {
                        this.folderStore.folder[name].color = APP_CONSTANTS.COLOR_ITEM_SIDEBAR_CHILD_ACTIVE
                    }
                    if(!this.folderStore.folder[name].isActive) {
                        this.folderStore.folder[name].color = APP_CONSTANTS.COLOR_ITEM_SIDEBAR
                    }
                }else if((this.folderStore.folder[item].isParent && this.folderStore.folder[name].parent !== item) || this.folderStore.folder[item].isChild) {
                        this.folderStore.folder[item].isActive = false
                        this.folderStore.folder[item].color = APP_CONSTANTS.COLOR_ITEM_SIDEBAR
                }
            });
        },
        calculateUsedCapacity(listChild) {
            this.folderStore.listItemFolder = listChild
            let sizeUsed = 0.00
            if(listChild.length > 0) {
                listChild.forEach((item) => {
                    sizeUsed += parseFloat(item.size)
                })
            }
            this.folderStore.usedCapacityRate = (sizeUsed / Math.pow(10,9) * 100).toFixed(1)
        }
    }
}
</script>

<style lang="scss" scoped>
.container-sidebar-box {
    width: 250px;
    min-width: 250px;
    height: 100%;
    border-right: 1px solid #5c636a;
    .sidebar-top {
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .sidebar-bottom {
        padding: 0 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        .storage {
            display: flex;
            flex-direction: column;
            gap: 10px;
            .label-box {
                display: flex;
                justify-content: space-between;
                .add-folder {
                    a {
                        color: #000;
                    }
                }
            }
            .storage-content {
                font-weight: bold;
                .rate {
                    color: #00bfff;
                }
            }
        }
        .folders {
            display: flex;
            flex-direction: column;
            gap: 10px;
            .label-box {
                display: flex;
                justify-content: space-between;
                .change-plan {
                    a {
                        color: #000;
                    }
                }
            }
            .list-folders {
                .item {
                    cursor: pointer;
                    margin-bottom: 5px;
                    &:hover {
                        background: #cccccc;
                        border-radius: 5px;
                    }
                }
                .itemChild {
                    cursor: pointer;
                    padding-left: 10px;
                    margin-bottom: 5px;
                    &:hover {
                        background: #cccccc;
                        border-radius: 5px;
                    }
                }
            }
        }
        .members {
            display: flex;
            flex-direction: column;
            gap: 10px;
            .label-box {
                display: flex;
                justify-content: space-between;
            }
            .member-content {
                display: flex;
                flex-direction: column;
            }
        }
    }
}
</style>
