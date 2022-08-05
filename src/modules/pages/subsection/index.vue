<template>
    <page-data
        slug="subsection" parent="system-section" title="Data Sub Bidang"
    > 
        <template v-slot:toolbar_selected="{ theme, record }">
                    <moui-button
                        :color="theme"
                        icon="arrow_forward_ios"
                        tooltip="User"
                        @click="openUser(record)"
                    ></moui-button>
                </template>
                <moui-table></moui-table>
            </page-data>
        </template>

<script>
export default {
    setup() {},

    methods: {
        openUser(record) {
            this.$router.push({
                name: "system-user",
                params: {
                    subsection: record.id,
                }
            })
        },
    },
};
</script>