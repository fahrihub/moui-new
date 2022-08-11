<template>
    <page-home @initialized="initialized">
        <v-container>
            <v-row>
                <v-row class="fill-height">
                    <!-- kalender -->
                    <v-col cols="12">
                        <v-sheet height="64">
                            <v-toolbar flat>
                                <v-btn
                                    fab
                                    text
                                    small
                                    color="grey darken-2"
                                    @click="prev"
                                >
                                    <v-icon small> skip_previous </v-icon>
                                </v-btn>
                                <v-btn
                                    fab
                                    text
                                    small
                                    color="grey darken-2"
                                    @click="next"
                                >
                                    <v-icon small> skip_next </v-icon>
                                </v-btn>
                                <v-toolbar-title v-if="$refs.calendar">
                                    {{ $refs.calendar.title }}
                                </v-toolbar-title>
                                <v-spacer></v-spacer>
                            </v-toolbar>
                        </v-sheet>
                        <v-sheet>
                            <v-calendar
                                v-model="focus"
                                ref="calendar"
                                color="primary"
                                :events="events"
                                type="month"
                                @change="updateRange"
                            >
                            </v-calendar>
                        </v-sheet>
                    </v-col>

                    <!-- Tabel -->
                    <v-col cols="12" class="mt-1">
                        <v-card class="mx-auto" max-width="100%">
                            <template>
                                <v-simple-table fixed-header height="200px">
                                    <template v-slot:default>
                                        <thead>
                                            <tr>
                                                <th class="text-left">
                                                    Bidang
                                                </th>
                                                <th class="text-left">
                                                    Sub Bidang
                                                </th>
                                                <th class="text-left">
                                                    Nama Kegiatan
                                                </th>
                                                <th class="text-left">
                                                    Laporan Kegiatan
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-if="schedule">
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </template>
                                </v-simple-table>
                            </template>
                        </v-card>
                    </v-col>
                </v-row>
            </v-row>
        </v-container>
    </page-home>
</template>

<script>
export default {
    data: () => ({
        schedule: false,
        events: [],
        focus: "",
        type: "month",
        typeToLabel: {
            month: "Month",
            week: "Week",
            day: "Day",
        },
    }),
    mounted() {
        this.focus = new Date();
        setTimeout(() => {
            // console.log(this.$refs.calendar);
            this.$refs.calendar.checkChange();
        }, 300);
    },

    methods: {
        initialized(response) {
            this.events = response.events;
        },

        updateRange() {},
        prev() {
            // console.log(this.$refs.calendar);
            this.$refs.calendar.prev();
        },

        next() {
            this.$refs.calendar.next();
        },
    },
};
</script>
