<template>
    <page-data
        slug="section" parent="system-dashboard" title="Data Bidang"
    > 
        <template v-slot:toolbar_selected="{ theme }">
            <moui-button
                :color="theme"
                icon="person"
                tooltip="User"
                @click="openUser"
            ></moui-button>
        </template>
        <moui-table></moui-table>
    </page-data>
</template>

<script>
export default {
    setup() {},

    methods: {
        openUser() {
            this.$router.push({ name: "system-user" });
        },
    },
};
</script>