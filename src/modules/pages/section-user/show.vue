<template>
    <form-show parent="system-section-user" param-key="section-user">
        <template v-slot:default="{ record }">
            <v-form ref="form">
                <v-card flat rounded="lg">
                    <v-card-text>
                        <v-row dense>
                            <v-col cols="12">
                                <v-text-field
                                    label="Email User"
                                    v-model="record.email"
                                >
                                </v-text-field>
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-form>
        </template>
    </form-show>
</template>
