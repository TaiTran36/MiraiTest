import { defineStore } from 'pinia'

export const useFolderStore = defineStore('folder', {
    state: () => {
        return {
            folder : {
                Uploads : {
                    isActive: false,
                    isParent: true,
                    color: '#8c8c8c'
                },
                Sources : {
                    isActive: false,
                    isParent: true,
                    color: '#8c8c8c'
                },
                Shared : {
                    isActive: false,
                    isParent: true,
                    color: '#8c8c8c'
                },
                Images : {
                    isActive: false,
                    isChild: true,
                    parent: 'Uploads',
                    color: '#8c8c8c'
                },
                Document : {
                    isActive: false,
                    isChild: true,
                    parent: 'Uploads',
                    color: '#8c8c8c'
                },
                Videos : {
                    isActive: false,
                    isChild: true,
                    parent: 'Uploads',
                    color: '#8c8c8c'
                }
            },
            usedCapacityRate: 0.00,
            listItemFolder: []
        }
    },
    actions: {
    }
})
