<template>
    <form-create>
        <template
            v-slot:default="{ combos: { genders, educations }, record, theme }"
        >
            <v-form ref="form">
                <v-card flat rounded="lg">
                    <v-card-text>
                        <v-row dense>
                            <v-col cols="3">
                                <v-text-field
                                    label="Gelar Depan"
                                    v-model="record.degree_first"
                                >
                                </v-text-field>
                            </v-col>
                            <v-col cols="6">
                                <v-text-field
                                    label="Nama"
                                    v-model="record.name"
                                >
                                </v-text-field>
                            </v-col>

                            <v-col cols="3">
                                <v-text-field
                                    label="Gelar Belakang"
                                    v-model="record.degree_last"
                                >
                                </v-text-field>
                            </v-col>

                            <v-col cols="12">
                                <v-select
                                    :items="genders"
                                    label="Jenis Kelamin"
                                    v-model="record.gender"
                                ></v-select>
                            </v-col>

                            <v-col cols="12">
                                <v-select
                                    :items="educations"
                                    label="Pendidikan"
                                    v-model="record.education"
                                    :color="theme"
                                ></v-select>
                            </v-col>
                            <v-col cols="12">
                                <v-menu
                                    v-model="menu"
                                    :close-on-content-click="false"
                                    max-width="290"
                                >
                                    <template v-slot:activator="{ on, attrs }">
                                        <v-text-field
                                            v-model="record.date"
                                            prepend-inner-icon="event_available"
                                            clearable
                                            label="Tanggal Kegiatan"
                                            readonly
                                            v-bind="attrs"
                                            v-on="on"
                                            @click:clear="date=null"
                                        >
                                        </v-text-field>
                                    </template>
                                    <v-date-picker
                                        v-model="record.date"
                                        @input="menu=false"
                                    >
                                    </v-date-picker>
                                </v-menu>
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-form>
        </template>
    </form-create>
</template>

<style></style>