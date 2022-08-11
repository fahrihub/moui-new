<template>
    <v-app v-cloak>
        <v-main>
            <v-row no-gutters style="height: 100%">
                <v-col
                    class="blue-grey lighten-3 d-flex flex-column align-center justify-center"
                    cols="6"
                >
                    <v-card elevation="10" flat width="600">
                        <v-img src="/img/20943642.jpg"></v-img>
                    </v-card>

                    <a
                        class="caption absolute"
                        href="https://www.freepik.com/vectors/agenda"
                        style="bottom: 8px"
                        >time-management-calendar vector created by
                        www.freepik.com</a
                    >
                </v-col>

                <v-col
                    class="grey lighten-5 d-flex flex-column align-center justify-center"
                    cols="6"
                >
                    <v-card elevation="10" width="400" rounded="lg">
                        <div
                            class="font-fredoka-one blue--text text-center mt-4"
                            style="font-size: 48px"
                        >
                            WELCOME TO AgendaKU
                        </div>

                        <v-card-text>
                            <v-form ref="form" v-model="valid" lazy-validation>
                                <v-row no-gutters>
                                    <v-col cols="12">
                                        <v-text-field
                                            v-model="email"
                                            :disabled="disabled"
                                            autocomplete="off"
                                            label="Alamat email"
                                            placeholder="simasten@bantenprov"
                                            ref="email"
                                            outlined
                                            :rules="[
                                                (v) =>
                                                    !!v || 'Email is required',
                                            ]"
                                        ></v-text-field>
                                    </v-col>

                                    <v-col cols="12">
                                        <v-text-field
                                            v-model="password"
                                            :disabled="disabled"
                                            :type="
                                                visiblePassword
                                                    ? 'text'
                                                    : 'password'
                                            "
                                            autocomplete="off"
                                            label="Masukkan sandi Anda"
                                            ref="password"
                                            hide-details
                                            outlined
                                            :rules="[
                                                (v) =>
                                                    !!v ||
                                                    'Password is required',
                                            ]"
                                            @keydown.enter.prevent="
                                                attemptLogin
                                            "
                                        ></v-text-field>
                                    </v-col>

                                    <v-col cols="12">
                                        <v-checkbox
                                            :disabled="disabled"
                                            class="mt-2"
                                            label="Tampilkan sandi"
                                            v-model="visiblePassword"
                                        ></v-checkbox>
                                    </v-col>
                                </v-row>

                                <v-btn
                                    block
                                    color="primary"
                                    depressed
                                    @click="attemptLogin"
                                    >Masuk</v-btn
                                >
                            </v-form>
                        </v-card-text>
                    </v-card>
                </v-col>
            </v-row>
        </v-main>

        <moui-snackbar></moui-snackbar>
    </v-app>
</template>

<script>
import { useSystemStore } from "@stores/systemStore";

export default {
    name: "moui-authent",

    setup() {
        const systemStore = useSystemStore();

        return {
            systemStore,
        };
    },

    data: () => ({
        email: null,
        password: null,
        disabled: false,
        visiblePassword: false,
        valid: true,
    }),

    methods: {
        getUser() {
            this.systemStore
                .$http("/api/userauth", {
                    method: "GET",
                })
                .then(({ is_administrator }) => {
                    this.$storage.setItem("authenticated", true);
                    this.$storage.setItem("is_administrator", is_administrator);
                    this.$router.push({
                        name: process.env.VUE_APP_PAGE_DASHBOARD,
                    });
                });
        },
        attemptLogin() {
            if (!this.$refs.form.validate()) {
                return;
            }
            this.systemStore
                .$http("/login", {
                    method: "POST",
                    params: {
                        email: this.email,
                        password: this.password,
                    },
                })
                .then(() => {
                    this.getUser();
                })
                .catch(({ status, message }) => {
                    if (status === 419 || typeof status === "undefined") {
                        this.systemStore.$http("/sanctum/csrf-cookie", {
                            method: "GET",
                        });
                    }
                    this.systemStore.$snackbar({
                        text: message,
                    });
                });
        },
    },
};
</script>
