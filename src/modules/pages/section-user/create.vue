<template>
    <form-create
        slug="user" parent="system-section-user" title="Data Pegawai"
    >
        <template v-slot:default="{ record }">
            <v-form 
                ref="form"
                v-model="valid"
                lazy-validation
            >
                <v-card flat rounded="lg">
                    <v-card-text>
                        <v-row dense>
                            <v-col cols="12">
                                <v-text-field
                                    label="Nama User"
                                    v-model="record.name"
                                >
                                </v-text-field>
                            </v-col>
                            <v-col cols="12">
                                <v-text-field
                                    label="Email User"
                                    v-model="record.email"
                                >
                                </v-text-field>
                            </v-col>
                            <v-col cols="12">
                                <v-text-field
                                    label="Password"
                                    v-model="record.password"
                                >
                                </v-text-field>
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-form>
        </template>
    </form-create>
</template>
