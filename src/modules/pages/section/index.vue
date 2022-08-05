<template>
    <page-data
        slug="section" parent="system-dashboard" title="Data Bidang"
    > 
        <template v-slot:toolbar_selected="{ theme, record }">
            <moui-button
                :color="theme"
                icon="arrow_forward_ios"
                tooltip="SubBidang"
                @click="openSubsection(record)"
            ></moui-button>
        </template>
        <moui-table></moui-table>
    </page-data>
</template>

<script>
export default {
    setup() {},

    methods: {
        openSubsection(record) {
            this.$router.push({
                name: "system-subsection",
                params: {
                    section: record.id,
                }
            })
        },
    },
};
</script>