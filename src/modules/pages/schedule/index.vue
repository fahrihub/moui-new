<template>
    <page-data
        slug="schedule" parent="system-dashboard" title="Agenda Kegiatan"
    > 
    <template v-slot:toolbar_default="{ theme, record }">
            <moui-button
                :color="theme"
                icon="file_download"
                tooltip="Download Excel"
                @click="exportExcel(record)"
            ></moui-button>
        </template>
        <moui-table></moui-table>
    </page-data>
</template>

<script>
export default {
    setup() {},

    methods: {
        exportExcel(record) {
            this.$router.push({
                // name: "system-subsection",
                params: {
                    section: record.id,
                }
            })
        },
    },
};
</script>