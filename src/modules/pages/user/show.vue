<template>
    <form-show parent="system-user" param-key="user">
        <template v-slot:default="{ record }">
            <v-form ref="form">
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
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-form>
        </template>
    </form-show>
</template>

<script>
export default {
    setup() {},
};
</script>
