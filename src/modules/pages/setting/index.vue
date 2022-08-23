<template>
    <form-show disable-edit disable-delete title="Ubah Sandi">
        <template>
            <v-form ref="form" v-model="valid" lazy-validation>
                <v-card flat rounded="lg">
                    <v-card-text>
                        <v-row dense>
                            <v-col cols="12">
                                <v-text-field
                                    :type="show ? 'text' : 'password'"
                                    label="Masukan Sandi Lama"
                                    v-model="current_password"
                                >
                                </v-text-field>
                            </v-col>
                            <v-col cols="12">
                                <v-text-field
                                    label="Masukan Sandi Baru"
                                    v-model="password"
                                    :type="show ? 'text' : 'password'"
                                >
                                </v-text-field>
                            </v-col>
                            <v-col cols="12">
                                <v-text-field
                                    label="Konfirmasi Masukan Sandi Baru"
                                    v-model="password_confirmation"
                                    :type="show ? 'text' : 'password'"
                                >
                                </v-text-field>
                            </v-col>
                        </v-row>
                    </v-card-text>
                    <v-container>
                        <v-card-actions>
                            <v-switch
                                v-model="show"
                                inset
                                label="Lihat Sandi"
                            ></v-switch>
                            <v-spacer></v-spacer>
                            <v-btn depressed color="primary" @click="ubah"
                                >Ubah Password</v-btn
                            >
                        </v-card-actions>
                    </v-container>
                </v-card>
            </v-form>
        </template>
    </form-show>
</template>

<script>
import { storeToRefs } from 'pinia';
import { useSystemStore } from '@stores/systemStore';

export default {
    setup() {
        const systemStore = useSystemStore();
        const { combos, currentRecord, theme } = storeToRefs(systemStore);

        return {
            systemStore,
            combos, currentRecord, theme
        }  
    },

    data() {
        return {
            current_password: null,
            password: null,
            password_confirmation: null,
            show: false,
            valid: true,
        };
    },

    methods: {
        ubah() {
            this.$http("user/password", {
                method: "PUT",
                params: {
                    current_password: this.current_password,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                },
            }).then(() => {
                this.$router.push({ name: "system-dashboard" });

                this.systemStore.$snackbar({
                    color: 'success',
                    text: 'Password berhasil diubah'
                })
            });
        },
    },
};
</script>
