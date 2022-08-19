<template>
    <page-base>
        <template v-slot:drawer>
            <v-list-item :to="{ name: 'system-dashboard' }">
                <v-list-item-icon>
                    <v-icon>dashboard</v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-title>Beranda</v-list-item-title>
                </v-list-item-content>
            </v-list-item>

            <v-list-item :to="{ name: 'system-schedule' }">
                <v-list-item-icon>
                    <v-icon>event_available</v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-title>Agenda Kegiatan</v-list-item-title>
                </v-list-item-content>
            </v-list-item>

            <!-- <v-list-item :to="{ name: 'system-employee' }">
                    <v-list-item-icon>
                        <v-icon>diversity_2</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-title>Data Pegawai</v-list-item-title>
                    </v-list-item-content>
                </v-list-item> -->

            <v-list-item
                :to="{ name: 'system-section' }"
                v-if="is_administrator"
            >
                <v-list-item-icon>
                    <v-icon>diversity_2</v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-title>Data Bidang</v-list-item-title>
                </v-list-item-content>
            </v-list-item>

            <v-list-item :to="{ name: 'system-setting' }">
                <v-list-item-icon>
                    <v-icon>settings</v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-title>Pengaturan</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </template>
    </page-base>
</template>

<script>
export default {
    data: () => ({
        is_administrator: false,
    }),
    mounted() {
        this.is_administrator = this.$storage.getItem("is_administrator");
    },
};
</script>
