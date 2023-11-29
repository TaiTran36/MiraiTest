<template>
    <div class="container-box">
        <table class="table table-hover" v-if="folderStore.listItemFolder.length > 0">
            <thead>
            <tr>
                <th scope="col"><InputCheckboxComponent :label="'Select all'"></InputCheckboxComponent></th>
                <th scope="col">Content</th>
                <th scope="col">Name</th>
                <th scope="col">Dimmension</th>
                <th scope="col">Size</th>
            </tr>
            </thead>
            <tbody>
            <tr class="item-folder" v-for="item in folderStore.listItemFolder">
                <th scope="row"><InputCheckboxComponent></InputCheckboxComponent></th>
                <td><div class="img-box" style=""><img :src="item.url" alt=""></div></td>
                <td>{{item.name}}</td>
                <td>{{item.dimmension}}</td>
                <td>{{(item.size / Math.pow(10,3)).toFixed(1)}} kB</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { useFolderStore } from "../../stores/folder";
import InputCheckboxComponent from "../../components/input/InputCheckbox/InputCheckboxComponent.vue";
export default {
    name: "ContainerDev",
    components: {
        InputCheckboxComponent

    },
    setup() {
        const folderStore = useFolderStore()
        return {
            folderStore
        }
    },
}
</script>

<style lang="scss" scoped>
.container-box {
    width: calc(100% - 300px);
    height: 100%;
    padding: 50px;
    table {
        .item-folder {
            cursor: pointer;
            .img-box {
                width: 400px;
                height: 100px;
                img {
                    width: 100%;
                    height: 100%;
                }
            }
        }
    }
}
</style>
