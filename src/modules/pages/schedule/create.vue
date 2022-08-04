<template>
    <form-create>
        <template
            v-slot:default="{ combos: { section, subsection }, record, theme }"
        >
            <v-form ref="form">
                <v-card flat rounded="lg">
                    <v-card-text>
                        <v-row dense>
                            <v-col cols="12">
                                <v-select
                                    :items="section"
                                    label="Nama Bidang"
                                    v-model="record.section"
                                    :rules="[val => (val || '').length > 0 || 'Silahkan Pilih Bidang']"
                                ></v-select>
                            </v-col>
                            <v-col cols="12">
                                <v-select
                                    :items="subsection"
                                    label="Nama SubBidang"
                                    v-model="record.subsection"
                                    :color="theme"
                                    :rules="[val => (val || '').length > 0 || 'Silahkan Pilih SubBidang']"
                                ></v-select>
                            </v-col>
                            <v-col cols="12">
                                <v-textarea
                                    label="Nama Kegiatan"
                                    v-model="record.name"
                                    clearable
                                    rows="2"
                                    prepend-inner-icon="browse_activity"
                                    :rules="[val => (val || '').length > 0 || 'Harap Masukan Nama Kegiatan']"
                                >
                                </v-textarea>
                            </v-col>
                            <v-col cols="12">
                                <v-text-field
                                    label="Nama Tempat"
                                    v-model="record.location"
                                    prepend-inner-icon="pin_drop"
                                    :rules="[val => (val || '').length > 0 || 'Harap Masukan Tempat']"
                                >
                                </v-text-field>
                            </v-col>
                            <v-col cols="12">
                                <v-menu
                                    v-model="menu"
                                    :close-on-content-click="false"
                                    max-width="290"
                                >
                                    <template v-slot:activator="{ on, attrs }">
                                        <v-text-field
                                            v-model="record.created"
                                            prepend-inner-icon="event_available"
                                            clearable
                                            label="Tanggal Kegiatan"
                                            readonly
                                            v-bind="attrs"
                                            v-on="on"
                                            @click:clear="date=null"
                                            :rules="[val => (val || '').length > 0 || 'Harap Masukan Tanggal']"
                                        >
                                        </v-text-field>
                                    </template>
                                    <v-date-picker
                                        v-model="record.created"
                                        @input="menu=false"
                                    >
                                    </v-date-picker>
                                </v-menu>
                            </v-col>
                            <v-col cols="12">
                                <v-textarea
                                    label="Laporan Kegiatan"
                                    v-model="record.report"
                                    clearable
                                    rows="4"
                                    prepend-inner-icon="print"
                                    :rules="[val => (val || '').length > 0 || 'Harap Masukan Laporan']"
                                >
                                </v-textarea>
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-form>
        </template>
    </form-create>
</template>
