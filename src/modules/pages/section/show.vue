<template>
    <form-show
        parent="system-section" param-key="section"
    >
        <template v-slot:toolbar="{ theme }">
            <moui-button
                :color="theme"
                icon="person"
                tooltip="User"
                @click="openUser"
            ></moui-button>
            <moui-button
                :color="theme"
                icon="folder_open"
                tooltip="SubBidang"
                @click="openSubsection"
            ></moui-button>
        </template>
        <template v-slot:default="{ record }">
            <v-form ref="form">
                <v-card flat rounded="lg">
                    <v-card-text>
                        <v-row dense>
                            <v-col cols="12">
                                <v-text-field
                                    disabled
                                    label="nama bidang"
                                    v-model="record.name"
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

    methods: {
        openSubsection() {
            this.$router.push({ name: "system-subsection" });
        },

        openUser(){
            this.$router.push({ name: "system-section-user" });
        }
    },
};
</script>