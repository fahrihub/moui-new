<template>
    <form-show
    parent="system-employee" param-key="employee">
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
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-form>
        </template>
    </form-show>
</template>
