<template>
    <page-data
        slug="schedule" parent="system-dashboard" title="Agenda Kegiatan"
    > 
    <template v-slot:toolbar_default="{ theme, store }">
            <moui-button
                :color="theme"
                icon="file_download"
                tooltip="Download Excel"
                @click="exportExcel(store)"
            ></moui-button>
        </template>
        <moui-table></moui-table>
    </page-data>
</template>

<script>
export default {
    setup() {},

    methods: {
        exportExcel(store) {
            store.$http('api/schedule/export',{
                method: 'GET',
                responseType: 'blob',
            })

            .then((response) => {
                const url = window.URL
                .createObjectURL(new Blob([response]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', 'Agenda_Kegiatan.xls');
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            })

        },
    },
};
</script>