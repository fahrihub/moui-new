<template>
    <form-show
        parent="system-schedule" param-key="schedule"
    >
        <template
            v-slot:default="{ record }"
        >
            <v-form ref="form">
                <v-card flat rounded="lg">
                    <v-card-text>
                        <v-row dense>
                            
                            <v-col cols="12">
                                <v-textarea
                                    label="Nama Kegiatan"
                                    v-model="record.name"
                                    rows="2"
                                    prepend-inner-icon="browse_activity"
                                    readonly
                                >
                                </v-textarea>
                            </v-col>
                            <v-col cols="12">
                                <v-text-field
                                    label="Nama Tempat"
                                    v-model="record.location"
                                    prepend-inner-icon="pin_drop"
                                    readonly
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
                                            label="Tanggal Kegiatan"
                                            readonly
                                            v-bind="attrs"
                                            v-on="on"
                                            @click:clear="date=null"
                                        >
                                        </v-text-field>
                                    </template>
                                    <v-date-picker
                                        v-model="record.created"
                                        @input="menu=false"
                                        :readonly="true"
                                    >
                                    </v-date-picker>
                                </v-menu>
                            </v-col>
                            <!-- <v-col cols="12">
                                <v-textarea
                                    label="Laporan Kegiatan"
                                    v-model="record.report"
                                    rows="1"
                                    prepend-inner-icon="print"
                                    readonly
                                >
                                </v-textarea>
                            </v-col> -->
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-form>
        </template>
    </form-show>
</template>

