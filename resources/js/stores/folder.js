import { defineStore } from 'pinia'

export const useFolderStore = defineStore('folder', {
    state: () => {
        return {
            folder : {
                Uploads : {
                    isActive: false,
                    isDropdown: true,
                    isChild: false
                },
                Sources : {
                    isActive: false,
                    isDropdown: false,
                    isChild: false
                },
                Shared : {
                    isActive: false,
                    isDropdown: false,
                    isChild: false
                },
                Images : {
                    isActive: false,
                    isDropdown: false,
                    isChild: true
                },
                Document : {
                    isActive: false,
                    isDropdown: false,
                    isChild: true
                },
                Videos : {
                    isActive: false,
                    isDropdown: false,
                    isChild: true
                }
            }
        }
    },
    actions: {
        resetMenu() {
            this.leftMenu = {
            };
        }
    }
})
